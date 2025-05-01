<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    public function hitungTotalPelangganAktif()
    {
        return $this->db->table('tb_pelanggan')
                        ->where('deleted_at', null)
                        ->countAllResults();
    }
    public function hitungTotalMobilAktif()
    {
        return $this->db->table('tb_mobil')->countAllResults();
    }

}