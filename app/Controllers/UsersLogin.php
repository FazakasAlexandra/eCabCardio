<?php namespace App\Controllers;

class UsersLogin extends BaseController
{
	public function index()
	{
	  $data =[];
	  helper(['form']);

	//echo view('templates/header.php', $this->logo);
	  echo view('templates/header', $data);
	  echo view('login', $data);
	  echo view('templates/footer_login', $data);

	}
   
	public function register (){

		$data =[];
		helper(['form']);
  
		// echo view('templates/header.php', $this->logo);
		echo view('templates/header', $data);
		echo view('register', $data);
		echo view('templates/footer_login', $data);
  
	}

	//--------------------------------------------------------------------

}
