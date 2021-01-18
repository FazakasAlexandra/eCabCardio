<?php namespace App\Controllers;
use App\Models\ExaminationsModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('templates/header.php');
		echo view('pages/admin.php');
		echo view('templates/footer.php');
	}


	public function examinations(){
	
		echo view('templates/header.php');
		
		
		$examinationmodel = new ExaminationsModel();
		$data = $examinationmodel->getExaminations();
<<<<<<< HEAD
				
		$experiment = [
			'meta' => 'Codeigniter 4 Post Page',
			'title' => 'This is a Awesome blog',
=======
		
		$info = [
			'title' => 'Modify and examination',
>>>>>>> b5a4962bfedc50c725256ce8265d32ec2bf4dd43
			'data' => $data
		];

		return view('pages/examinations.php', $info);

		echo view('templates/footer.php');

	}
}
