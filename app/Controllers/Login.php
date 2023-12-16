<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use Google_Client;
use App\Models\LoginModel;

class Login extends BaseController
{

    protected $googleClient;

    public function __construct()
    {
        // $this->googleClient = new Google_Client();
        // //--------------------------------------------
        // $this->googleClient->setClientId('673961797078-og7012uh5mtki1trn0big7cqh6bl0bug.apps.googleusercontent.com');
        // $this->googleClient->setClientSecret('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');
        // $this->googleClient->setRedirectUri('http://localhost/rent/login-proses');
        // $this->googleClient->addScope('email');
        // $this->googleClient->addScope('profile'); 

        //--------------------------------------
        $this->login = new LoginModel();
    }


    public function index()
    {
        // $session = \Config\Services::session();
        // $isLoggedIn = $session->get('login') === 'logged_in';
    
        // if ($isLoggedIn) {
        //     return redirect()->to('dashboard'); 
        //  }
        $data = [
                    'form'      => null,
                ];
         $content = [
            'title'     => 'Gamebox | Login',
            'banner'    => null,
            'footer'    => null,
            'page'      => view('front/login/login_page', $data)
        ];
        
        return view('templates/frontEnd/index', $content);
    }

   

    public function sign_in()
	{
		$username      	= $this->request->getPost('email');
		$user       	= $this->login->get_where($username);
		if ($user!=null) {
			$this->_login();
			} else {
				echo json_encode(array(
					"statusCode"=>500,
					"pesan"     => "Sign-in Gagal, Akun Anda belum terdaftar!"
				));
			}
	}


    private function _login()
    {
        $username      	= $this->request->getPost('email');
        $password   	= $this->request->getPost('password');
        $user       	= $this->login->get_where($username);
        $verify         = password_verify($password, $user['Password']);            
            if ($verify) {
                if($user['Status']!='Aktif')
                {
					echo json_encode(array(
					"statusCode"=>400,
						"pesan"     => "Sign-in Gagal, Account Anda telah dinonaktifkan!"
					));
                }else{
                $data = [
                    'id_user'       => $user['Id_User'],
                    'username'      => $user['Username'],
                     'email'        => $user['Email'],
                    'password'      => $password,
                    'status'        => $user['Status'],
                    'level'         => $user['Level'],
                    'login'         => 'logged_in',
                ];
                    $session = session();
                    $session->set($data);
                    if($user['Level']=='Administrator')
                    {
                           echo json_encode(array(
                             "statusCode"   =>200,
                             "pesan"        => "Sukses, Sign-in Berhasil!",
                             "level"        => $user['Level'],
                         ));
                   }else{
                           echo json_encode(array(
                             "statusCode"   =>200,
                             "pesan"        => "Sukses, Sign-in Berhasil!",
                             "level"        => $user['Level'],
                         ));

                         
                    }
                }
               
            } else {
				echo json_encode(array(
					"statusCode"=>400,
						"pesan"     => "Sign-in Gagal, Email atau Password Salah!"
					));
            }
       
    }
}