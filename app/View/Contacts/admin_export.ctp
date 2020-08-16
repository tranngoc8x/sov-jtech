<?php 
$this->PhpExcel->createWorksheet();

		// define table cells
		///$table = array(
		 //   array('label' => "Ten"),
		//    array('label' => "Ngay sinh"),
		//    array('label' => "Phu huynh")
		//);

		// add heading with different font and bold text
		//$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));


		//foreach ($data as $d) {
		 //   $this->PhpExcel->addTableRow(array(
		 //       $d['Contact']['name'],
		 //       $d['Contact']['parents'],
		 //       $d['Contact']['phone']
		//    ));
		//}

		// close table and output
		//$this->PhpExcel->addTableFooter()->output();
 
$this->PhpExcel->output('invoice.xlsx');
$this->PhpExcel->freeMemory();
 ?>