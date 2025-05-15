<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = "users";

    public function check_auth($username, $pass = "")
    {
        // Menggunakan query builder untuk mencegah SQL injection
        $builder = $this->db->table('users u'); // Alias u untuk users
        $builder->select('u.id, u.nama, u.username, u.email, u.no_telp, u.status, u.id_role, r.nama as nama_role, u.password');
        $builder->join('roles r', 'u.id_role = r.id', 'left');
        $builder->where('u.email', $username);
        $builder->orWhere('u.username', $username);
        $builder->limit(1);  // Pastikan hanya satu baris yang diambil

        // Cek hasil query
        $query = $builder->get();
        $user = $query->getRow();  // Menggunakan getRow untuk mengambil satu baris hasil

        if ($user) {
            // Verifikasi password menggunakan MD5
            // if (md5($pass) == $user->password) {
            //     // Jika MD5 cocok, hash password baru dengan bcrypt dan simpan ke database
            //     $newHashedPassword = password_hash($pass, PASSWORD_DEFAULT);
            //     $builder->set('password', $newHashedPassword);
            //     $builder->where('id', $user->id);
            //     $builder->update();
                
            //     return $user;  // Kembalikan data user setelah password diupdate
            // }

            // Verifikasi password dengan hash yang sudah ada
            if (password_verify($pass, $user->password)) {
                return $user;
            }
        }

        return null; // User tidak ditemukan atau password salah
    }

    // Fungsi Lama
    // protected $table = "users";
    // public function check_auth($username, $pass=""){
    //     $query  = $this->db->query("
    //             select u.id, u.nama, u.username, u.email, u.no_telp, u.status, u.id_role, r.nama nama_role from users u
    //             left join roles r on u.id_role = r.id
    //             where (u.email = '$username' or u.username = '$username') and u.password = MD5('$pass')
    //             limit 1
    //     ");
    //     return $query;
    // }
}
