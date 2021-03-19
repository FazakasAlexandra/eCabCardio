<?php

namespace App\Controllers;

use App\Models\ReceiptsModel;
use App\Models\ClinicModel;
use App\Models\CompaniesModel;
use App\Models\PatientsModel;
use App\Models\ReceiptsLineModel;
use App\Models\CitysModel;
use Dompdf\Dompdf;

class Receipts extends BaseController
{
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

	public function create($consult_id, $patient_id)
	{
		$receiptsModel = new ReceiptsModel();
		$clinicModel = new ClinicModel();
		$companiesModel = new CompaniesModel();
		$patientsModel = new PatientsModel();

		$clinic = $clinicModel->getClinicData();
		$receiptNumber = count($receiptsModel->getReceipts()) + 1;

		$data = [
			'companies' => $companiesModel->getCompanies(),
			'patient' => $patientsModel->getSingle($patient_id),
			'clinic' => $clinic,
			'receipt_number' => $receiptNumber,
			'receipt_series' => $clinic->receipt_series . $receiptNumber
		];

		echo view('templates/header.php');
		echo view('pages/receipt_form.php');
		echo view('templates/footer.php');
	}


	public function removeBuyerFields($object, $fields)
	{
		foreach ($fields as &$field) {
			unset($object[$field]);
		}
	}
}
