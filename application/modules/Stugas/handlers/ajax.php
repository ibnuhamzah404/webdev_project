<?php 


if (isset($_REQUEST['action'])) {
	
	switch ($_REQUEST['action']) {
		case 'SendMessage':
			echo'hello';
			break;
		
		default:
			# code...
			break;
	}
}