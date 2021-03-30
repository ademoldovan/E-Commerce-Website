<?php
	//database connection
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'shop_project');
	
	//Get everything from database
	$sql = "SELECT * FROM produse ORDER BY id LIMIT 16";
	$query = mysqli_query($con, $sql);
	$result = mysqli_num_rows($query);
	$index = 0;
	$stoc = "";
	
	//Get 18 results
	while($row = mysqli_fetch_array($query)){
		if($index==0){echo "<div class = 'row'>";}
		if($row['stoc']!=0){
			$stoc = "<b><p style='color: green; text-align:center'>In stoc: ".$row['stoc']."</p></b>";
		}else{
			$stoc = "<b><p style='color: red; text-align:center'>Nu se afla in stoc!</p></b>";
		}
		if($row['stoc']==1){
			$stoc = "<b><p style='color: white; padding:2px; background-color:orange; text-align:center; border-radius:10px'>Ultimul produs pe stoc!</p></b>";
		}
		echo
		"<div class='col-6 col-sm-6 col-md-6 col-lg-3'>
			<div class='card'>
				<img class='card-img-top' src='img/products/".$row['id'].".png' alt='Card image cap'>
				<div class='card-body'>
					<h5 class='card-title'>".$row['nume']."</h5>
					<p class='card-text'>".$row['nume']."</p>
					<script>generateItems('card-text','<b>Specificatii:</b> ,".$row['specificatii']."', '".$index."')</script>
					<p> PRET: ".$row['pret']." LEI</p>"
					.$stoc."
					<center>
					";
					if($_SESSION['loggedin'] == false){
					echo
					"<span data-toggle='modal' data-target='#myAccount'>";
					}else{
					echo 
					"<span ";if($row['stoc']!=0){echo "data-toggle='modal' ";} echo "data-target='#addToCart' data-item-id='".$row['id']."' data-item='".$row['nume']."'>";
					}
					echo
					"<button class='btn btn-primary";if($row['stoc']==0){echo " disabled";} echo "'>Cumpara acum!</button>
					</span>
					</center>
				</div>
			</div>
		</div>";
		$index++;
		if($index%4==0){
			echo "</div>";
			if($index!=$result){
				echo "<div class='row'>";
			}
		}		
	}
?>