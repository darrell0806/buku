<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\M_book;
use App\Models\KoleksiModel;
class book extends BaseController
{
    
    public function index()
    {
        if (session()->get('id') > 0) {
            $model = new M_model();
               
            $on = 'book.kategori = kategori.id_kategori';
            $data['a'] = $model->join2('book', 'kategori', $on);
            $data['title'] = 'Data Buku';
    
            // Dapatkan status koleksi dari database
            $statusKoleksi = $model->getStatusKoleksi(session()->get('id'));
            $data['statusKoleksi'] = $statusKoleksi;
    
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('book/view', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }
    
public function tambah() {
        
    $model = new M_model();
    if (session()->get('level') == 1 ||  session()->get('level')==2) {
        $data['a'] = $model->tampil('kategori');
    } else {
        return redirect()->to('Login');
    }
    $data['title'] = 'Tambah Buku';
    echo view('partial/header_datatable',$data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('book/tambah', $data);
    echo view('partial/footer_datatable');

}

public function aksi_tambah()
{
            if(session()->get('level')==1||  session()->get('level')==2){
            $Model= new M_book();
            $data = $this->request->getPost();
            $photo = $this->request->getFile('cover');
            $Model->insertt($data, $photo);
        return redirect()->to('/book/index/');
    }else{
        return redirect()->to('Login');
    }
}
public function edit($id)
{
    $userLevel = session()->get('level');
    
    if ($userLevel == 1) {
        $model = new M_book();
        $model2 = new M_Model();
        $data['a'] = $model->getById($id); // Mendapatkan data pengguna berdasarkan $id
        
        if (!$data['a']) {
            return redirect()->to('/book/index');
        }
        
        if ($userLevel == 1) {
            $data['kategori'] = $model2->tampil('kategori');
        } 
       
        $data['title'] = 'Edit Buku';
        echo view('partial/header_datatable',$data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('book/edit', $data);
        echo view('partial/footer_datatable');
    } else {
        return redirect()->to('Login');
    }
}


public function update($id)
{
    if(session()->get('level')==1||  session()->get('level')==2){
    $Model = new M_book();
    $data = $this->request->getPost();
    $photo = $this->request->getFile('cover');

   
    if ($photo->isValid() && ! $photo->hasMoved()) {
       
        $Model->updateP($id, $data, $photo);
    } else {
       
        $Model->update($id, $data);
    }

    return redirect()->to('/book/index');
}else{
    return redirect()->to('Login');
}
}
public function delete($id)
{
    if(session()->get('level')==1){
    $Model = new M_book();
    $Model->deletee($id);
    return redirect()->to('/book/index/');
}else{
    return redirect()->to('Login');
}
}
public function detail($id) {
    $model = new M_book();
    $data['title'] = 'Detail Buku';
    $data['book'] = $model->getBookById($id);

    echo view('partial/header_datatable',$data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
    echo view('book/detail', $data);
    echo view('partial/footer_datatable');
}


public function batalkan_koleksi($id_book)
{
    $model = new KoleksiModel();
    $id_user = session()->get('id');
    $condition = ['book_id' => $id_book, 'user_id' => $id_user];
    $model->deleteKoleksi($condition);

    // Redirect atau tampilkan pesan sukses
    return redirect()->to('/book');
}

    public function masukkan_koleksi($id_book)
    {
        $model = new KoleksiModel();
        $id_user = session()->get('id'); // Ganti sesuai dengan bagaimana Anda mengelola user session
        $data = [
            'book_id' => $id_book,
            'user_id' => $id_user,
            'status'  => 'Masuk',
        ];

        $model->insertKoleksi($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/book');
    }

}