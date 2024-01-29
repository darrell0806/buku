<?php

namespace App\Controllers;
use App\Models\M_kategori;
use App\Models\M_model;


class kategori extends BaseController
{

    public function index()
    {
        if (session()->get('id') > 0) {
        $model=new M_model();
        $data['jojo']=$model->tampil('kategori');
        $data['title']='Data Kategori';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('kategori/view', $data);
        echo view('partial/footer_datatable');
    }else {
        return redirect()->to('login');
    }
}
public function tambah() {
        
        $model = new M_model();
        if (session()->get('id') > 0) {
            
      
        $data['title'] = 'Tambah Kategori';
        echo view('partial/header_datatable',$data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('kategori/tambah', $data);
        echo view('partial/footer_datatable');
        }
  
}

public function aksi_tambah()
{
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('nama_k');
       

       
        $data1=array(
            'nama_k'=>$a,
            'created_at'=>date('Y-m-d H:i:s')
        );
        $model=new M_model();
        $model->simpan('kategori', $data1);
       
        return redirect()->to('kategori');
    }else {
        return redirect()->to('login');
    }
}
public function edit($id)
{
   
        $model=new M_model();
        $where=array('id_kategori'=>$id);
        $data['a']=$model->getWhere('kategori',$where);
        $data['title']='Data Kategori';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('kategori/edit',$data);
        echo view('partial/footer_datatable');    
   
}


public function aksi_edit($id)
{
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('nama_k');
        $id= $this->request->getPost('id');
      
        $where=array('id_kategori'=>$id);
        $data1=array(
           'nama_k'=>$a,
          
       );
        $model=new M_model();
        $model->qedit('kategori', $data1, $where);
        return redirect()->to('kategori');
   
    }else {
       return redirect()->to('login');
   }
   }
   
   public function delete($id)
   { 
       if(session()->get('level')== 1) {
        $model=new m_model();
		$where=array('id_kategori'=>$id);
		$model->hapus('kategori',$where);
		return redirect()->to('kategori');
       }else {
           return redirect()->to('login');
       }
   }
}