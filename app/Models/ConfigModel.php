<?php namespace App\Models;
use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = "app_config";

    public function app_config()
    {
        $data = array(
          'id' => 'CONF1',
          'nama_sistem' => 'Oki Rentcar System',
          'tagline' => 'ORS',
          'Usaha' => 'Rent Car',
          'status' => '1',
          'favicon' => 'logo_okirentcar.png',
          'logo' => 'logo_okirentcar.png',
          'child_logo' => 'logo_okirentcar.png',
          'email' => 'okirentcar@gmail.com',
          'pass_email' => '',
          'url_root' => 'http://localhost:8080',
          'jalan' => 'Jl. Semolowaru Elok',
          'kelurahan' => 'Semolowaru',
          'kecamatan' => 'Sukolilo',
          'kabupaten' => 'Surabaya',
          'provinsi' => 'Jawa Timur',
          'kode_pos' => '60119',
          'telp' => '0822-3057-0996',
          'fax' => '',                                          
        );
        return $data;
    }
}
?>