<?php

namespace App\Controllers;
use App\Models\M_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class laporan_user extends BaseController

{
    public function index()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            $data['title']='Data User';
			$kui['kunci']='print_user';
            echo view('partial/header_datatable',$data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('filter_user',$kui);
            echo view('partial/footer_datatable');    
		}else{
			return redirect()->to('/Home');
		}
	}
    public function print_windows()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new M_model();
    $awal = $this->request->getPost('awal');
    $akhir = $this->request->getPost('akhir');
    $kui['duar'] = $model->filter2('user', $awal, $akhir);
    echo view('v_u', $kui);
}else{
	return redirect()->to('login');
}
	}
    public function pdf()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2  ||  session()->get('level')==3 ||  session()->get('level')==4){
		$model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $kui['duar'] = $model->filter2('user', $awal, $akhir);
		$dompdf = new\Dompdf\Dompdf();
		$dompdf->loadHtml(view('v_u',$kui));
		$dompdf->setPaper('A4','potrait');
		$dompdf->render();
		$dompdf->stream('my.pdf', array('Attachment'=>0));
	}else{
		return redirect()->to('/Home');
	}
	}
    public function excel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
		$model=new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data= $model->filter2('user', $awal, $akhir);
        

		$spreadsheet=new Spreadsheet();

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'Nama')
		->setCellValue('B1', 'Username')
		->setCellValue('C1', 'E-Mail')
		->setCellValue('D1', 'Level');
	

		$column=2;
		

		foreach($data as $data){
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'. $column, $data->nama)
			->setCellValue('B'. $column, $data->username)
			->setCellValue('C'. $column, $data->email)
			->setCellValue('D'. $column, $data->nama_level);
		
			$column++;
		}
	

		$writer = new XLsx($spreadsheet);
		$fileName = 'Data Laporan User';


		header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition:attachment;filename='.$fileName.'.xls');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}else{
		return redirect()->to('/Home');
	}
	}
}