<?php namespace App\Controllers;
use App\Models\ExaminationsModel;
use App\Models\UsersModel;
use App\Models\ClinicModel;


class Admin extends BaseController
{
	
	public function index()
	{
		echo view('templates/header.php', $this->logo);
		echo view('pages/home.php');
		echo view('templates/footer.php');
	}

	/********************ADMIN OPTION TO MODIFY THE EXAMINATIONS *************************/

	public function examinations(){
	
		echo view('templates/header.php', $this->logo);
		
		
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

			echo view('templates/header.php', $this->logo);
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

		echo view('templates/header.php', $this->logo);
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

        echo view('templates/header.php', $this->logo);

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
	
		echo view('templates/header.php', $this->logo);
				
		$usersmodel = new UsersModel();
		$data = $usersmodel->getUsers();
		
		$info = [
			'data' => $data,
			'message' => ''
		];

		return view('pages/users.php', $info);

	}

	public function updaterole($id){
	
		echo view('templates/header.php', $this->logo);

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

		echo view('templates/header.php', $this->logo);
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

	
/********************ADMIN OPTION TO MODIFY THE DATA OF THE CLINIC *************************/

	public function clinic(){
		
		echo view('templates/header.php', $this->logo);
				
		$clinicmodel = new ClinicModel();
		$data = $clinicmodel->getClinicData();
		// var_dump($data);
		$info = [
		 	'data' => $data,
		 	'message' => '',
			'logo' => $this->logo
		 ];

		return view('pages/clinic.php', $info);

	}

	public function updclinic(){

		$model = new ClinicModel();
		if($this->request->getMethod()=='post'){

			if($_POST['logo'] == ''){
				$newdata = [
					'logo' => $this->logo,
					'clinic_name' => $_POST['name'],
					'id' => 1,
					'fiscal_number' => $_POST['fiscal-no'],
					'orc_number' => $_POST['orc-no'],
					'phone' => $_POST['tel-no'],
					'fax' => $_POST['fax-no'],
					'bank_account' => $_POST['bank-account'],
					'bank' => $_POST['bank'],
					'vat' => $_POST['vat-no'],
					'receipt_series' => $_POST['receipt-series'],
					'address' => $_POST['address']
				];
			}else{


				//$rules = [
				// 	'logo' => [
				//		 'rules' => 'uploaded[theFile]',
				//		 'label' => 'The Logo'
				//	 ]
				//];	
				
				//$validation->setRules([
				// 	'logo' => 'is_image[logo]',
				// ]);
				// $validation =  \Config\Services::validation();
				// $result = $validation->check($_POST['logo'], 'ext_in[logo, png]');
				// var_dump($result);
				// die();
				//if($this->validate($rules)){
				//$file = $this->request->getFile('logo');
				$newdata = [
					'logo' => $_POST['logo'],
					'clinic_name' => $_POST['name'],
					'id' => 1,
					'fiscal_number' => $_POST['fiscal-no'],
					'orc_number' => $_POST['orc-no'],
					'phone' => $_POST['tel-no'],
					'fax' => $_POST['fax-no'],
					'bank_account' => $_POST['bank-account'],
					'bank' => $_POST['bank'],
					'vat' => $_POST['vat-no'],
					'receipt_series' => $_POST['receipt-series'],
					'address' => $_POST['address']
				];	
					// var_dump($newdata);
					// die();
				//}else{

				// 	var_dump($this->validator);
				// 	die();
				// 	$data = $model->getClinicData();
				// 	$info = [
				// 		'data' => $data,
				// 		'message' => 'error',
				// 		'logo' => $this->logo
				// 	];

				// 	echo view('templates/header.php', $this->logo);
				// 	return view('pages/clinic.php', $info);
				// 	die();
				// }
			}

			$model->save($newdata);}

			$data = $model->getClinicData();

		$info = [
			'data' => $data,
			'message' => 'The data has been successfully updated',
		    'logo' => $this->logo
		];
		echo view('templates/header.php', $this->logo);
		return view('pages/clinic.php', $info);
	}
}