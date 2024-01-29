<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\M_book;
use App\Models\KoleksiModel;
class koleksi extends BaseController
{

public function index()
    {
        if (session()->get('id') > 0) {
        $model=new M_model();
        $on = 'koleksi.book_id = book.id_book';
        $on1 = 'koleksi.user_id = user.id_user';
        $data['a'] = $model->join3('koleksi', 'book','user', $on,$on1);
 
        $data['title']='Koleksi';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('koleksi/view', $data);
        echo view('partial/footer_datatable');
    }else {
        return redirect()->to('login');
    }
}
}