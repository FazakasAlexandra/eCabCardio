<?php namespace App\Controllers;
use App\Models\ExaminationsModel;
use App\Models\UsersModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('templates/header.php');
		echo view('pages/home.php');
		echo view('templates/footer.php');
	}

	/********************ADMIN OPTION TO MODIFY THE EXAMINATIONS *************************/

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


	/********************ADMIN OPTION TO MODIFY THE USERS *************************/

	public function users(){
	
		echo view('templates/header.php');
				
		$usersmodel = new UsersModel();
		$data = $usersmodel->getUsers();
		
		$info = [
			'data' => $data,
			'message' => ''
		];

		return view('pages/users.php', $info);

	}

	public function updaterole($id){
	
		echo view('templates/header.php');

		$model = new UsersModel();
		$user = $model->find($id);


		if($this->request->getMethod()=='post'){

			if(empty($_POST))
			{
				$user['is_admin'] = 0;

			}else if($_POST['input-'. $id] == "on"){
				$user['is_admin'] = 1;
			}
			$model->save($user);
		}
				
		$data = $model->getUsers();
		
		$info = [
			'data' => $data,
			'message' => ''
		];

		return view('pages/users.php', $info);

	}

	public function dltuser($id){

		echo view('templates/header.php');
		$model = new UsersModel();
		$user = $model->find($id);

		if($user){
			$model -> delete($id);
		};
		
		$data = $model->getUsers();
		
		$info = [
			'data' => $data,
			'message' => 'The entry has been successfully deleted!'
		];
		
		return view('pages/users.php', $info);
	}

}
	
