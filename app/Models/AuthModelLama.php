<?php namespace App\Models;
use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = "users";
    public function check_auth($username, $pass=""){
        $query  = $this->db->query("
                select u.id, u.nama, u.username, u.email, u.no_telp, u.status, u.id_role, r.nama nama_role from users u
                left join roles r on u.id_role = r.id
                where (u.email = '$username' or u.username = '$username') and u.password = MD5('$pass')
                limit 1
        ");
        return $query;
    }
}
?>