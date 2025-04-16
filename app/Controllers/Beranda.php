<?php namespace App\Controllers;

class Beranda extends BaseController
{
	public function index()
	{
		$app_config = $this->config->app_config();
		$data['aplikasi'] = $app_config;
		$data['title'] = "Selamat Datang | " . $app_config['nama_sistem'];
		return view('sistem/admin/index') ;
	}
}