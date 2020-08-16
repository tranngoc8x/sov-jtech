<?php
	$model = ucfirst(Inflector::singularize($this->params['controller']));
	echo $this->Form->select('status',array(1=>'Không hiển thị',2=>'Hiển thị'),array('selected'=>$this->request->data[$model]['status'],'label'=>false,"class" => "select2"),array('empty'=>false) );?>