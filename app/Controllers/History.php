<?php namespace App\Controllers;

use App\Models\HistoryModel;

class History extends BaseController
{
	public function __construct()
	{
		$this->historyModel = new \App\Models\HistoryModel();
	}

	public function index()
	{
		echo view('templates/header.php');

		$clinicHistory = $this->historyModel->getClinicHistory();
		$total = 0;

		foreach ($clinicHistory as $history) {
			$total += (int)$history['total'];
		}

		echo view('pages/clinic_history.php', [ 'data' => $clinicHistory,
		                                        'total' => $total,
												'pager' => $this->historyModel->pager
		                                      ]);

		echo view('templates/footer.php');
	}

	public function search(){
		echo view('templates/header.php');

		$req = 	$this->request->getGet();
		$clinicHistory = $this->historyModel->getClinicHistoryInterval($req['date_from'], $req['date_to']);
		$total = 0;

		foreach ($clinicHistory as $history) {
			$total += (int)$history['total'];
		}

		echo view('pages/clinic_history.php', [ 'data' => $clinicHistory,
		                                        'total' => $total,
												'pager' => $this->historyModel->pager
		                                      ]);

		echo view('templates/footer.php');
	}
	

}
