<?php namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\MobilModel;

class Mobil extends BaseController
{
	use ResponseTrait;
	private $nama_menu = 'Mobil';
	public function __construct()
	{
		$this->MobilM = new MobilModel();
	}

	public function index()
	{
		return view('sistem/mobil/index') ;
	}

	public function fetchData()
	{
		$key	= ($this->request->getGet('q') != "") ? strtoupper($this->request->getGet('q')) : "";
		$pg	= ($this->request->getGet('page')) ? $this->request->getGet('page') : 1;
		$limit	= ($this->request->getGet('count')) ? $this->request->getGet('count') : 10;
		$sortBy	= ($this->request->getGet('sortBy') != "") ? $this->request->getGet('sortBy') : 'created_at';
		$sortType = ($this->request->getGet('sortType') != "") ? $this->request->getGet('sortType') : 'asc';
		$offset = ($limit * $pg) - $limit;

		$page              = array();
		$page['limit']     = $limit;
		$page['count_row'] = $this->MPelanggan->listCount($key)['jml'];
		$page['current']   = $pg;
		$page['list']      = gen_paging($page);
		$data['paging']    = $page;
		$data['list']      = $this->MPelanggan->listData($key, $sortBy, $sortType, $limit, $offset)->getResult();

		return view('sistem/mobil/list_data', $data);
	}
}