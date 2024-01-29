<?php

namespace App\Models;
use CodeIgniter\Model;

class M_book extends Model
{		
	protected $table      = 'book';
	protected $primaryKey = 'id_book';
	protected $allowedFields = ['nama_b','cover', 'penulis', 'penerbit', 'tahun', 'sipnopsis','stok','link','kategori','created_at'];


	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}

	public function qedit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
	
    public function getPostsByAlbumm($id_album)
    {
        $builder = $this->db->table('book');
        $builder->select('book.*, koleksi.status AS like_status, kategori.nama_k');
        $builder->join('koleksi', 'koleksi.book_id = book.id_book', 'left');
        $builder->join('kategori', 'kategori.id_kategori = book.kategori', 'left'); // Join dengan tabel kategori
        $builder->where('book.kategori', $id_album);
        return $builder->get()->getResult();
    }
    
    
    public function getPostsByAlbum($id_album)
    {
        return $this->where('kategori', $id_album)->findAll();
    }
    public function getBookById($id) {
        return $this->join('kategori', 'kategori.id_kategori = book.kategori')
                    ->where('id_book', $id)
                    ->first();
    }
	
    public function getById($id)
    {
        $data = $this->find($id);
        if (!$data) {
            throw new \Exception('Data not found');
        }
        return $data;
    }

    public function insertt($data, $photo)
    {
        if ($photo && $photo->isValid()) {
            $imageName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/images', $imageName);
            $data['cover'] = $imageName;
        } else {
            $data['cover'] = 'default.png'; 
        }
    
        // Tambahkan created_at dengan waktu sekarang
        $data['created_at'] = date('Y-m-d H:i:s');
    
        return $this->insert($data);
    }
    
    public function updateP($id, $data, $photo)
    {
        $findd = $this->find($id);
        $currentImage = $findd['cover'];
        if ($photo != null) {
            $newImageName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/images', $newImageName);
            $data['cover'] = $newImageName;
        } else {
            $data['cover'] = $currentImage;
        }
        return $this->update($id, $data);
    }
    public function getPostById($postId)
    {
        return $this->find($postId);
    }
    public function deletee($id)
    {
        return $this->delete($id);
    }
    public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}
  
}