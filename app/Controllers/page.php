<?php

namespace App\Controllers;
use App\Models\M_kategori;
use App\Models\M_model;
use App\Models\M_book;

class page extends BaseController
{

    public function index()
    {
      
        
        $postModel = new M_book();
        $albumModel = new M_kategori();

        $data = [
            'albums' => $this->getAlbumsWithPosts($postModel, $albumModel),
        ];
        echo view('partial/header_datatable');
       
        echo view('page/view', $data);
        echo view('partial/footer_datatable');
    
}
 private function getAlbumsWithPosts(M_book $postModel, M_kategori $albumModel)
    {
        $albums = [];
    
        $allAlbums = $albumModel->findAll();
    
        foreach ($allAlbums as $album) {
            $albumData = [  
                'id_kategori' => $album['id_kategori'],
                'nama_k' => $album['nama_k'],
                'books' => $postModel->getPostsByAlbum($album['id_kategori']),
            ];
    
            $albums[] = $albumData;
        }
    
        return $albums;
    }
    public function viewBooks($id_album)
    {
        $postModel = new M_book();
       
        
        // Mendapatkan data kategori
        $kategoriModel = new M_kategori();
        $kategoriInfo = $kategoriModel->getKategoriById($id_album); // Sesuaikan dengan model dan metode yang sesuai
        
        $data = [
            'id_kategori' => $id_album,
            'nama_k' => $kategoriInfo['nama_k'], // Menggunakan informasi nama_k dari hasil query
            'photos' => $postModel->getPostsByAlbumm($id_album),
        ];
    
        echo view('partial/header_datatable');
       
        echo view('page/viewbook', $data);
        echo view('partial/footer_datatable');
  
    }
    
}