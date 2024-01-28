<?php

namespace App\Models;
use CodeIgniter\Model;

class M_kategori extends Model
{		
	protected $table      = 'kategori';
	protected $primaryKey = 'id_kategori';
	protected $allowedFields = ['nama_k','created_at'];


	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}
	public function getKategoriById($id)
    {
        return $this->find($id);
    }
}