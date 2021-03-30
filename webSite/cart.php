<?php
if(array_key_exists('buy-button',$_POST)){
	header('Location: '.$_SERVER['REQUEST_URI']);
}
if(isset($_SESSION['cart_items'])){
?>
<table style='width:100%;'>
	<tr>
		<th>
			Produs
		</th>
		<th>
			Cantitate
		</th>
		<th>
			Pret
		</th>
	</tr>
<?php } else{
	echo "Cosul dumneavoastra este gol!";
} ?>
<?php
	$totalPrice = 0;
	if(isset($_SESSION['cart_items'])){

	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'shop_project');

		$itemArray = $_SESSION['cart_items'];
		foreach($itemArray as $value){
			$sql = "SELECT * FROM produse WHERE id = '".$value[0]."'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			echo "
				<tr>
					<td>
					".$row['nume']." 
					</td>
					<td>
					".$value[1]."
					</td>
					<td>
					".$row['pret']."
					</td>
					<td>
						lei
					</td>
				</tr>";
			$totalPrice += $row['pret']*$value[1];
		}
	}
?>

<?php
if(isset($_SESSION['cart_items'])){
?>
	<tr class="total-row">
		<th>Total:</th>
		<td></td>
		<td><b><?php echo $totalPrice ?></b></td>
		<td>lei</td>
	</tr>
</table>
<br>
<div class="modal-footer">
	<form method="post">
		<input type="submit" class="btn btn-primay register-button" name='buy-button' value='Cumpara!'>
	</form>
	<?php
	if(array_key_exists('buy-button',$_POST)){
		$con = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($con, 'shop_project');
		$sql = "UPDATE produse SET stoc = stoc - ".$value[1]." WHERE id = '".$value[0]."'";
		$query = mysqli_query($con, $sql);
		unset($_SESSION['cart_items']);
		$itemArray = array();
	}
	?>
</div>

<?php }  ?>