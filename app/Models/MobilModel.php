<?php namespace App\Models;
use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table = "tb_mobil";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 
        'nik', 
        'nama', 
        'jenis', 
        'merk', 
        'nopol', 
        'tahun', 
        'harga12',
        'harga14',
        'bahan_bakar',
        'warna',
        'seat',
        'denda',
        'gambar-mobil'
    ];
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    function listCount($key=""){
        $query = $this->db->query("
            select count(*) as jml from tb_mobil m 
            where concat(m.nama, m.jenis, m.merk) like '%$key%'
        ")->getRowArray();
        return $query;
    }

    function listData($key="", $column="", $sort="", $limit="", $offset=""){
        $query = $this->db->query("
            select m.* from tb_mobil m
            where concat(m.nama, m.jenis, m.merk) like '%$key%'
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }
}
?>