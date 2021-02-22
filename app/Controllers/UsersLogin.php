<?php namespace App\Controllers;

class UsersLogin extends BaseController
{
	public function index()
	{
	  $data =[];
	  helper(['form']);


	  echo view('templates/header_login', $data);
	  echo view('login', $data);
	  echo view('templates/footer_login', $data);

	}
   
	public function register (){

		$data =[];
		helper(['form']);
  
  
		echo view('templates/header_login', $data);
		echo view('register', $data);
		echo view('templates/footer_login', $data);
  
	}

	//--------------------------------------------------------------------

}
