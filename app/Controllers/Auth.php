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
    $validation =  \Config\Services::validation();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $rules = [
        'username' => 'required',
        'password' => 'required'
    ];
    if ($this->validate($rules) == FALSE) {
        session()->setFlashdata('error', 'Username / Password tidak boleh kosong');
        return redirect()->to(base_url('login'));
    }

    // Memanggil method check_auth() dari model
    $cek_login = $this->Auth_m->check_auth($username, $password);

    if ($cek_login) {
        // Jika berhasil login
        $data_user = $cek_login;
        $ses_data = array(
            'auth_id_user' => $data_user->id,
            'auth_nama_user' => $data_user->nama,
            'auth_email' => $data_user->email,
            'auth_username' => $data_user->username,
            'auth_is_login' => TRUE,
            'auth_id_role' => $data_user->id_role,
            'auth_nama_role' => $data_user->nama_role,
        );
        session()->set($ses_data);
        return redirect()->to(base_url('/beranda'));
    } else {
        // Jika login gagal
        session()->setFlashdata('error', 'Username / Password salah');
        return redirect()->to(base_url('login'));
    }
}


public function logout()
{
    // session()->remove([
    //     'auth_id_user',
    //     'auth_nama_user',
    //     'auth_email',
    //     'auth_username',
    //     'auth_is_login',
    //     'auth_id_role',
    //     'auth_nama_role'
    // ]);
    
    session()->destroy(); // Ini hapus semua sesi yang tersisa
    return redirect()->to(base_url('login'))->with('success', 'Berhasil logout.');
}

}
