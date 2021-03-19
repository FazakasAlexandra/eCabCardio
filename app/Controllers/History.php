<?php

namespace App\Controllers;

use App\Models\HistoryModel;
use App\Models\ReceiptsModel;

class History extends BaseController
{
	public function __construct()
	{
		$this->historyModel = new \App\Models\HistoryModel();
	}

	public function index($error = null)
	{
		echo view('templates/header.php');

		$receiptsModel = new ReceiptsModel();

		$clinicHistory = $this->historyModel->getClinicHistory();
		$total = 0;

		foreach ($clinicHistory as &$history) {
			$history['receipt'] = $receiptsModel->getConsultReceipt($history['consult_id']);
			if($history['receipt']) $total += (int)$history['total'];
		}

		echo view('pages/clinic_history.php', [
			'data' => $clinicHistory,
			'total' => $total,
			'pager' => $this->historyModel->pager,
			'dateFrom' => end($clinicHistory)['date'],
			'dateTo' => $clinicHistory[0]['date'],
			'error' => $error
		]);

		echo view('templates/footer.php');
	}

	public function search()
	{
		$req = 	$this->request->getGet();

		if($req['date_from'] > $req['date_to']) {
			$this->index("Start date must be earlier than end date !");
			return;
		}

		$receiptsModel = new ReceiptsModel();

		$clinicHistory = $this->historyModel->getClinicHistoryInterval($req['date_from'], $req['date_to']);
		$total = 0;
		
		foreach ($clinicHistory as &$history) {
			$history['receipt'] = $receiptsModel->getConsultReceipt($history['consult_id']);
			if($history['receipt']) $total += (int)$history['total'];
		}

		echo view('templates/header.php');

		echo view('pages/clinic_history.php', [
			'data' => $clinicHistory,
			'total' => $total,
			'pager' => null,
			'dateFrom' => $clinicHistory[0]['date'],
			'dateTo' => end($clinicHistory)['date'],
			'error' => null
		]);

		echo view('templates/footer.php');
	}
}
