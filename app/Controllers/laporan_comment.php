<?php

namespace App\Controllers;
use App\Models\M_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class laporan_comment extends BaseController

{
    public function index()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            $data['title']='Data Comment';
			$kui['kunci']='print_comment';
            echo view('partial/header_datatable',$data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('filter_comment',$kui);
            echo view('partial/footer_datatable');    
		}else{
			return redirect()->to('/login');
		}
	}
    public function print_windows()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new M_model();
    $awal = $this->request->getPost('awal');
    $akhir = $this->request->getPost('akhir');
    $kui['duar'] = $model->filtersip('comments', $awal, $akhir);
    echo view('v_cm', $kui);
}else{
	return redirect()->to('login');
}
	}
    public function pdf()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2  ){
		$model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $kui['duar'] = $model->filtersip('comments', $awal, $akhir);
		$dompdf = new\Dompdf\Dompdf();
		$dompdf->loadHtml(view('v_cm',$kui));
		$dompdf->setPaper('A4','potrait');
		$dompdf->render();
		$dompdf->stream('my.pdf', array('Attachment'=>0));
	}else{
		return redirect()->to('/login');
	}
	}
    public function excel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
		$model=new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data= $model->filtersip('comments', $awal, $akhir);
        

		$spreadsheet=new Spreadsheet();

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'Nama Buku')
		->setCellValue('B1', 'Nama User')
		->setCellValue('C1', 'Comment');
		
	

		$column=2;
		

		foreach($data as $data){
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'. $column, $data->nama_b)
			->setCellValue('B'. $column, $data->nama)
			->setCellValue('C'. $column, $data->comment);
		
			$column++;
		}
	

		$writer = new XLsx($spreadsheet);
		$fileName = 'Data Laporan Comment';


		header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition:attachment;filename='.$fileName.'.xls');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}else{
		return redirect()->to('/login');
	}
	}
}