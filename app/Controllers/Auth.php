<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\AuthModel;

class Auth extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		$this->Auth_m = new AuthModel();
	}

	public function index()
	{
		$app_config = $this->config->app_config();
		$data['aplikasi'] = $app_config;
		$data['title'] = "Selamat Datang | " . $app_config['nama_sistem'];
		return view('auth/login', []) ;
	}

	public function check_auth()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib Di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib Di isi'
        ]);
        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/login', $data);
        }else{
            $auth = $this->ModelAuth->cekLogin();
            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password anda salah</strong>. Silahkan coba lagi !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('../Login');
            }else{
                $this->session->set_userdata('idUser', $auth->idUser);
                $this->session->set_userdata('namaUser', $auth->namaUser);
                $this->session->set_userdata('username', $auth->username);                   
                $this->session->set_userdata('roleId', $auth->roleId);
                switch($auth->roleId){
                    case 1 : redirect('../Dashboard');
                    break;
                    case 2 : redirect('../Dashboard');
                    break;
                    default: break; 
                }
            }
        }
		return $this->respond($response, 200);
	}

}
