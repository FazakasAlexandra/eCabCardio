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
		
		$info = [
			'title' => 'Modify an examination',
			'data' => $data,
			'message' => ''
		];

		return view('pages/examinations.php', $info);

	}
	
	public function updexam(){

			echo view('templates/header.php');
			if($this->request->getMethod()=='post'){
			$model = new ExaminationsModel();
			$newdata = [
				'id' => $_POST['idReceived'],
				'examination' => $_POST['newExam'],
				'price' => $_POST['newPrice']
			];				
			$model->save($newdata);}

			$data = $model->getExaminations();
		
			$info = [
				'title' => 'Modify an examination',
				'data' => $data,
				'message' => 'Your modifications have been submitted successfully!'
			];

			return view('pages/examinations.php', $info);
	}


	public function dltexam($id){

		echo view('templates/header.php');
		$model = new ExaminationsModel();
		$exam = $model->find($id);
		if($exam){
			$model -> delete($id);
		};
		
		$data = $model->getExaminations();
		$info = [
			'title' => 'Modify an examination',
			'data' => $data,
			'message' => 'The entry has been successfully deleted!'
		];
		
		return view('pages/examinations.php', $info);
	}

	public function addexam(){

        echo view('templates/header.php');

        if($this->request->getMethod()=='post'){
            $model = new ExaminationsModel();
            $newdata = [
                'id' => $_POST['idReceived'],
                'examination' => $_POST['newExam'],
                'price' => $_POST['newPrice']
            ];              
            $model->insert($newdata);
        }

        $data = $model->getExaminations();

        $info = [
            'title' => 'Modify an examination',
            'data' => $data,
            'message' => 'The entry has been successfully added!',
        ];

        return view('pages/examinations.php', $info);
    }

}
	
