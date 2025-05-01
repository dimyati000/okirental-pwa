<?php namespace App\Models;
use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = "tb_pelanggan";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 
        'nik', 
        'nama', 
        'no_telp', 
        'alamat', 
        'foto_ktp', 
        'created_at', 
        'updated_at'
    ];
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    function listCount($key=""){
        $query = $this->db->query("
            select count(*) as jml from tb_pelanggan p
            where p.deleted_at is null 
            and concat(p.nik, p.nama, p.no_telp, p.alamat) like '%$key%'
        ")->getRowArray();
        return $query;
    }

    function listData($key="", $column="", $sort="", $limit="", $offset=""){
        $query = $this->db->query("
            select p.* from tb_pelanggan p
            where p.deleted_at is null 
            and concat(p.nik, p.nama, p.no_telp, p.alamat) like '%$key%'
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }
}
?>