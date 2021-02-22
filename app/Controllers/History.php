<?php namespace App\Controllers;

use App\Models\HistoryModel;

class History extends BaseController
{
	public function __construct()
	{
		$this->historyModel = new HistoryModel();
	}

	public function index()
	{
		echo view('templates/header.php');

		$clinicHistory = $this->historyModel->getClinicHistory();

		echo view('pages/clinic_history.php', [ 'data' => $clinicHistory ]);

		echo view('templates/footer.php');
	}
	

}
