<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Database;
use App\Libraries\Uuid;

/**
 * Class BaseController
 *
 * BaseController menyediakan tempat yang nyaman untuk memuat komponen
 * dan melakukan fungsi-fungsi yang dibutuhkan oleh semua controller Anda.
 * Perluas class ini di controller baru mana pun:
 * class Home extends BaseController
 *
 * Untuk keamanan, pastikan untuk mendeklarasikan method baru apa pun sebagai protected atau private.
 *
 * @package CodeIgniter
 */
abstract class BaseController extends Controller
{
    /**
     * Instance dari objek Request utama.
     *
     * @var IncomingRequest|CLIRequest
     */
    protected $request;

    /**
     * An array of helpers yang akan dimuat secara otomatis saat
     * instance class. Helper ini akan tersedia
     * untuk semua controller lain yang memperluas BaseController.
     *
     * @var array
     */
    protected $helpers = ['pagination_helper', 'url'];

    /**
     * Judul dasar aplikasi.
     *
     * @var string
     */
    protected $judulDasar = 'Oki Rentcar System'; // Ganti dengan nama aplikasi Anda

    /**
     * Judul halaman spesifik.
     *
     * @var string
     */
    protected $judulHalaman = '';

    /**
     * Instance dari library UUID.
     *
     * @var Uuid
     */
    protected $uuid;

    /**
     * Instance dari model konfigurasi aplikasi.
     *
     * @var \App\Models\ConfigModel
     */
    protected $config;

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload models, libraries, etc. di sini.
        $this->uuid   = new Uuid();
        $this->config = new \App\Models\ConfigModel();
    }

    /**
     * Method untuk mengatur judul halaman.
     *
     * @param string $judul
     * @return void
     */
    protected function setJudulHalaman(string $judul)
    {
        $this->judulHalaman = $judul;
    }

    /**
     * Method untuk mendapatkan judul lengkap untuk view.
     *
     * @return string
     */
    protected function getJudulLengkap(): string
    {
        if (!empty($this->judulHalaman)) {
            return $this->judulHalaman . ' | ' . $this->judulDasar;
        }

        return $this->judulDasar;
    }
}

