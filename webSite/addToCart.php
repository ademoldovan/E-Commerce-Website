<?php
	session_start();

	if(!isset ($_SESSION['cart_items'])){
		$_SESSION['cart_items'] = array();
		$total_price = 0;
	}

	if(isset($_GET['hidden_id'])){
		array_push($_SESSION['cart_items'], array($_GET['hidden_id'],$_GET['amount']));
		header("Location: ".$_GET['current-page']);
	}
	session_write_close();

?>