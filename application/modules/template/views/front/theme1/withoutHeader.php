<?php 

 	if(!isset($view_file)){
			$view_file = '';
		}
	
	$path = 'front/'.$view_file;
	$this->load->view($path);
	
 ?>
