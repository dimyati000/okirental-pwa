<?php namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\MobilModel;
date_default_timezone_set('Asia/Jakarta');

class Mobil extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		$this->setJudulHalaman('Mobil');
		$this->MobilM = new MobilModel();
	}

	public function index()
	{
		return view('sistem/mobil/index', ['judul' => $this->getJudulLengkap(),]);
	}

	public function fetchData()
	{
		$key	= ($this->request->getGet('q') != "") ? strtoupper($this->request->getGet('q')) : "";
		$pg	= ($this->request->getGet('page')) ? $this->request->getGet('page') : 1;
		$limit	= ($this->request->getGet('count')) ? $this->request->getGet('count') : 10;
		$sortBy	= ($this->request->getGet('sortBy') != "") ? $this->request->getGet('sortBy') : 'created_at';
		$sortType = ($this->request->getGet('sortType') != "") ? $this->request->getGet('sortType') : 'desc';
		$offset = ($limit * $pg) - $limit;

		$page              = array();
		$page['limit']     = $limit;
		$page['count_row'] = $this->MobilM->listCount($key)['jml'];
		$page['current']   = $pg;
		$page['list']      = gen_paging($page);
		$data['paging']    = $page;
		$data['list']      = $this->MobilM->listData($key, $sortBy, $sortType, $limit, $offset)->getResult();

		return view('sistem/mobil/list_data', $data);
	}

	public function loadModal()
	{
		$id = $this->request->getPost('id');
		if ($id != "") {
			$data['mode'] = "UPDATE";
			$data['data'] = $this->MobilM->find($id);	
		} else {
			$data['mode'] = "ADD";
		}
		return view('sistem/mobil/modal', $data);
	}

	public function save()
	{
		try {
			$id = $this->request->getPost('id');
			$nik = $this->request->getPost('nik');
			$nama = $this->request->getPost('nama');
			$noTelp = $this->request->getPost('noTelp');
			$alamat = $this->request->getPost('alamat');
			$uuid_v4 = $this->uuid->v4();

			if($id==""){
				$this->MobilM->insert([
					"id" => $uuid_v4,
					"nik" => $nik,
					"nama" => $nama,
					"no_telp" => $noTelp, 
					"alamat" => $alamat, 
				]);
	
				$response['success'] = TRUE;
				$response['message'] = "Data Berhasil Disimpan !";
			}else{
				$this->MobilM->update($id, [
					"nik" => $nik,
					"nama" => $nama,
					"no_telp" => $noTelp, 
					"alamat" => $alamat, 
				]);
	
				$response['success'] = TRUE;
				$response['message'] = "Data Berhasil Diubah !";
			}
			return $this->respond($response, 200);
		} catch (\Exception $e) {
			return $this->respond($e->getMessage(), 500);
		}
	}

	public function delete()
	{
		try {
			if($this->request->getPost('id')){
				date_default_timezone_set('Asia/Jakarta');
				$id = $this->request->getPost('id');
				$this->MPelanggan->delete($id);

				$response['success'] = true;
				$response['message'] = "Data berhasil dihapus !";
			}else{
				$response['success'] = false;
				$response['message'] = "Data tidak ditemukan !";
			}
			return $this->respond($response, 200);
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = "Hapus data gagal !";
			return $this->respond($response, 200);
		}
	}
}