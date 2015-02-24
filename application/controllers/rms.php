<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rms extends MH_Controller {

	public function index()
	{
		$this->load->view('main');
	}
	
	function dashboard(){
		$this->load->view('dashboard');	
	}
	
	function downloadExcel(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
		$filename='just_some_random_name.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
			
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}	
	
	function downloadPdf(){
		
		//error_reporting(0);  //suppress some error message
		$parameters=array(
				'paper'=>'letter',   //paper size
				'orientation'=>'landscape',  //portrait or lanscape
				'type'=>'color',   //paper type: none|color|colour|image
				'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
		);
		$this->load->library('pdf', $parameters);  //load ezPdf library with above parameters
		$this->pdf->selectFont(APPPATH.'/third_party/pdf-php/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
		$this->pdf->ezText('Hello World!',20);  //insert text with size

		/*
		//get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
		$q=$this->db->query('SELECT id, username, role FROM administrator');
		//this data will be presented as table in PDF
		$data_table=array();
		foreach ($q->result_array() as $row) {
			$data_table[]=$row;
		}
		*/
		$data_table = array();
		$data_table[0] = array("id"=>"aaaa", "username"=>"bbb", "role"=>"admin");
		
		//this one is for table header
		$column_header=array(
				'id'=>'User ID',
				'username'=>'User Name',
				'role'=>'Role'
		);
		$this->pdf->ezTable($data_table, $column_header); //generate table
		$this->pdf->ezSetY(480);  //set vertical position
		//$this->load->helper('url');
		//$this->pdf->ezImage(base_url('images/test_noalpha.png'), 0, 100, 'none', 'center');  //insert image
		$this->pdf->ezStream(array('Content-Disposition'=>'just_random_filename.pdf'));  //force user to download the file as 'just_random_filename.pdf'
	
		
	}
}