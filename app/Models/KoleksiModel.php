<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{
    protected $table = 'koleksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'status','created_at'];

    public function getKoleksiById($id_koleksi)
    {
        return $this->find($id_koleksi);
    }

    public function deleteKoleksi($condition)
    {
        // Lakukan proses penghapusan berdasarkan kondisi tertentu
        $this->where($condition)->delete();
    }

    public function insertKoleksi($data)
    {
        return $this->insert($data);
    }

    // Tambahkan metode lain sesuai kebutuhan
}
