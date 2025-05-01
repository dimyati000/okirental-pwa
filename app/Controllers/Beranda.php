<?php
namespace App\Controllers;

use App\Models\BerandaModel;

use CodeIgniter\HTTP\RequestInterface; // Tambahkan ini
use CodeIgniter\HTTP\ResponseInterface; // Tambahkan ini
use Psr\Log\LoggerInterface; // Tambahkan ini

class Beranda extends BaseController
{

    public function __construct()
	{
		$this->setJudulHalaman('Beranda');
		$this->MBeranda = new BerandaModel();
	}

    public function index()
    {
        $totalPelanggan = $this->MBeranda->hitungTotalPelangganAktif();
        $totalMobil     = $this->MBeranda->hitungTotalMobilAktif();

        $data = [
            'judul'           => $this->getJudulLengkap(),
            'total_pelanggan' => $totalPelanggan,
            'total_mobil'     => $totalMobil,
        ];

        return view('sistem/beranda/index', $data);
    }
}
