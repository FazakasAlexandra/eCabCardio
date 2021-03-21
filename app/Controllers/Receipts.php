<?php

namespace App\Controllers;

use App\Models\ReceiptsModel;
use App\Models\ClinicModel;
use App\Models\CompaniesModel;
use App\Models\PatientsModel;
use App\Models\ReceiptsLineModel;
use App\Models\CitysModel;
use App\Models\CountysModel;
use App\Models\ConsultsExaminationsModel;
use Dompdf\Dompdf;
use CodeIgniter\API\ResponseTrait;

class Receipts extends BaseController
{
	use ResponseTrait;

	public function view($consult_id)
	{
		$receipts = new ReceiptsModel();
		$receiptsLines = new ReceiptsLineModel();

		$receipt = $receipts->getConsultReceipt($consult_id);
		$receipt->receipt_line = $receiptsLines->getReceiptLine($receipt->receipt_id);
		$this->calculateTotalPrice($receipt);
		$this->checkBuyerType($receipt);
		$this->generatePDF($receipt);
	}

	public function calculateTotalPrice($receipt)
	{
		$receipt->total_before_vat = 0;
		$receipt->total_vat = 0;
		$receipt->total_after_vat = 0;

		foreach ($receipt->receipt_line as $receiptLine) {
			$receipt->total_before_vat += $receiptLine['price_before_vat'];
			$receipt->total_vat += $receiptLine['vat'];
			$receipt->total_after_vat += $receiptLine['price_with_vat'];
		}
	}

	public function checkBuyerType($receipt)
	{
		$cityModel = new CitysModel();

		$receipt->company_buyer = true;

		if ($receipt->patient_name) {
			$receipt->company_buyer = false;
			$receipt->patient_city = $cityModel->getSingle($receipt->patient_city_id)->city;
		}
	}

	public function generatePDF($receipt)
	{
		$dompdf = new Dompdf();
		$dompdf->getOptions()->setChroot('/wamp64/www/ecabcardio/public');
		$dompdf->loadHtml(view('pages/receipt_view.php', ['receipt' => $receipt]));
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream();
	}

	public function create($consult_id = 1, $patient_id = 1)
	{
		$receiptsModel = new ReceiptsModel();

		if ($this->request->getJSON()) {
			$receiptsModel->insertReceipt($this->request->getJSON('true'));
			return $this->respond([
				'status' => 201,
				'error' => null,
				'message' => 'Receipt was successfully created !'
			]);
		}

		$clinicModel = new ClinicModel();
		$companiesModel = new CompaniesModel();
		$patientsModel = new PatientsModel();
		$countiesModel = new CountysModel();
		$clinic = $clinicModel->getClinicData();

		$receiptNumber = count($receiptsModel->getReceipts()) + 1;

		$data = (object)[
			'counties' => $countiesModel->getCounties(),
			'companies' => $companiesModel->getCompanies(),
			'patient' => $patientsModel->getSingle($patient_id),
			'clinic' => $clinic,
			'receipt_number' => $receiptNumber,
			'receipt_series' => $clinic->receipt_series . $receiptNumber,
			'consult_id' => $consult_id
		];
		$data->receipt_line = $this->generateReceiptLine($consult_id, $clinic->vat);
		$this->calculateTotalPrice($data);

		echo view('templates/header.php');
		echo view('pages/receipt_form.php', ['receipt' => $data]);
		echo view('templates/footer.php');
	}

	public function generateReceiptLine($consult_id, $vat)
	{
		$receiptLine = array();
		$conultExamsModel = new ConsultsExaminationsModel();
		$examinations = $conultExamsModel->getExaminations($consult_id);

		foreach ($examinations as $exam) {
			$line = array();
			$line['examination_name'] = $exam['name'];
			$line['price_before_vat'] = $exam['price'];
			$line['vat'] = (($exam['price'] * $vat) / 100);
			$line['price_with_vat'] = $exam['price'] * (1 + ($vat / 100));
			$line['quantity'] = 1;
			$line['measurement'] = 'unit';
			array_push($receiptLine, $line);
		}

		return $receiptLine;
	}
}
