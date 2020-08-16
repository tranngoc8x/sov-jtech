<?php 
$this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);

		// define table cells
		$table = array(
		    array('label' => __('User'), 'filter' => true),
		    array('label' => __('Type'), 'filter' => true),
		    array('label' => __('Date')),
		    array('label' => __('Description'), 'width' => 50, 'wrap' => true),
		    array('label' => __('Modified'))
		);

		// add heading with different font and bold text
		$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));


		foreach ($data as $d) {
		    $this->PhpExcel->addTableRow(array(
		        $d['User']['name'],
		        $d['Type']['name'],
		        $d['User']['date'],
		        $d['User']['description'],
		        $d['User']['modified']
		    ));
		}

		// close table and output
		$this->PhpExcel->addTableFooter()
		    ->output();


 ?>