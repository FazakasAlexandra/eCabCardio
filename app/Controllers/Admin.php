<?php

namespace App\Controllers;

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

	public function examinations()
	{

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

	public function updexam()
	{

		echo view('templates/header.php', $this->logo);
		if ($this->request->getMethod() == 'post') {
			$model = new ExaminationsModel();
			$newdata = [
				'id' => $_POST['idReceived'],
				'examination' => $_POST['newExam'],
				'price' => $_POST['newPrice']
			];
			$model->save($newdata);
		}

		$data = $model->getExaminations();

		$info = [
			'title' => 'Modify an examination',
			'data' => $data,
			'message' => 'Your modifications have been submitted successfully!'
		];

		return view('pages/examinations.php', $info);
	}


	public function dltexam($id)
	{

		echo view('templates/header.php', $this->logo);
		$model = new ExaminationsModel();
		$exam = $model->find($id);
		if ($exam) {
			$model->delete($id);
		};

		$data = $model->getExaminations();
		$info = [
			'title' => 'Modify an examination',
			'data' => $data,
			'message' => 'The entry has been successfully deleted!'
		];

		return view('pages/examinations.php', $info);
	}

	public function addexam()
	{

		echo view('templates/header.php', $this->logo);

		if ($this->request->getMethod() == 'post') {
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

	public function users()
	{

		echo view('templates/header.php', $this->logo);

		$usersmodel = new UsersModel();
		$data = $usersmodel->getUsers();

		$info = [
			'data' => $data,
			'message' => ''
		];

		return view('pages/users.php', $info);
	}

	public function updaterole($id)
	{

		echo view('templates/header.php', $this->logo);

		$model = new UsersModel();
		$user = $model->find($id);


		if ($this->request->getMethod() == 'post') {

			if (empty($_POST)) {
				$user['is_admin'] = 0;
			} else if ($_POST['input-' . $id] == "on") {
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

	public function dltuser($id)
	{

		echo view('templates/header.php', $this->logo);
		$model = new UsersModel();
		$user = $model->find($id);

		if ($user) {
			$model->delete($id);
		};

		$data = $model->getUsers();

		$info = [
			'data' => $data,
			'message' => 'The entry has been successfully deleted!'
		];

		return view('pages/users.php', $info);
	}


	/********************ADMIN OPTION TO MODIFY THE DATA OF THE CLINIC *************************/

	public function clinic()
	{

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

	public function updclinic()
	{

		$model = new ClinicModel();

		$request = $this->request->getPost(); // same as $_POST

		if ($request) {
			// $newData declared only once
			$newdata = [
				// $this->logo is array, you need a string 
				// $this->logo --> wrong
				// $this->logo['logo'] --> good
				'logo' => $this->logo['logo'],

				'clinic_name' => $request['name'],
				'id' => 1,
				'fiscal_number' => $request['fiscal-no'],
				'orc_number' => $request['orc-no'],
				'phone' => $request['tel-no'],
				'fax' => $request['fax-no'],
				'bank_account' => $request['bank-account'],
				'bank' => $request['bank'],
				'vat' => $request['vat-no'],
				'receipt_series' => $request['receipt-series'],
				'address' => $request['address']
			];

			$file = $this->request->getFile('logo');

			// !$request['logo'] same result as $_POST['logo'] == ''
			if (!$file->getName()) {
				$model->save($newdata);
			} else {
				// should set rules for other fields 
				// no empty fields allowed
				$rules = [
					'logo' => [
						'rules' => 'ext_in[logo,png,jpg]',
						'label' => 'logo'
					]
				];

				$validation =  \Config\Services::validation();
				$validation->setRules($rules);

				if ($validation->run(['logo' => $file])) {
					// $this->request->getFiles is array, but you need a file object to use file methods on it
					// $this->request->getFiles returns array --> wrong
					// $this->request->getFile(labelName) returns object --> good
					$fileName = $file->getName();
					$file->move('assets', $fileName);
					$newdata['logo'] = $fileName;
					$model->save($newdata);
				} else {
					// return clinic view with error message
					// return view('pages/clinic.php', $info); 
				}
			}
			$data = $model->getClinicData();

			$info = [
				'data' => $data,
				'message' => 'The data has been successfully updated',
				// change the logo with the new one : no $this->logo, but $newdata['logo']
				'logo' => $newdata['logo']
			];
			
			// change the logo with the new one : no $this->logo, but $newdata['logo']
			echo view('templates/header.php', ['logo' => $newdata['logo']]);
			return view('pages/clinic.php', $info);
		}
	}
}
