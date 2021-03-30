<?php
	session_start();
	if(!isset($_SESSION['loggedin'])){
		$_SESSION['loggedin'] = false;
	}
	if(!isset($_SESSION['name'])){
		$_SESSION['name'] = '';
	}
?>
<?php
	$idCodes = array(
	'Casti' => 53,
	'Desktop' => 41,
	'Foto' => 80,
	'Gaming' => 70,
	'Laptop' => 10,
	'Microfon' => 54,
	'Monitor' => 41,
	'Mouse' => 51,
	'Tablete' => 20,
	'Tastatura' => 52,
	'Telefoane' => 30,
	'TV' => 60
	);
?>
<!doctype html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="indexStyle.css">
		<script src="indexScript.js"></script>
		<script src="https://kit.fontawesome.com/a577cb0799.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="main-head">
			<div class="search-container">
				<i class="fa fa-search search-icon"></i>
				<form action="produse.php">
					<input class="search-box" type="search" name="search" placeholder="Cautati produse...">
				</form>
			</div>
			<div class="head_button_container">
				<span data-toggle="modal" data-target="#myAccount"><button type="button" class="btn btn-md btn-primary account-button" data-toggle="tooltip" data-placement="bottom"
				title="Acceseaza contul tau de utilizator pentru a beneficia de servicile noastre!"><i class="fas fa-user"></i></button></span>

				<!--LOGIN FORM-->
				<div class="modal fade" id="myAccount" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<?php
									if($_SESSION['loggedin'] == true){ ?>
									<h5 class="modal-title"> Bun venit <?php echo $_SESSION['name'] ?>! </h5>
									<?php } else { ?>
									<h5 class="modal-title"> Conecteaza-te!</h5>
									<?php
									}
								?>
								<button type="button" class="close" data-dismiss="modal" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<center>
									<?php
									if($_SESSION['loggedin'] == false){ ?>
									<!--LOGGED IN FALSE-->
									<div class="error-message"></div>
									<form style="border: 0.5px dashed gray; padding: 10px;" class="login-form">
										<div class="input-group mb-3">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-user-tag"></i></span>
											</div>
											<input type="text" name="username" class="form-control input-user" placeholder="Username">
										</div>
										<div class="input-group mb-3">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="password" name="password" class="form-control input-pass" placeholder="Parola">
										</div>
										<button type="button" class="btn btn-primay login-button" id="login-button">Log-in</button>
									</form>
									<br/>
									<form style="border: 0.5px dashed grey; padding: 10px;" id="register-form" name="register-form">
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="e-mail" name="email" id="register-email" class="form-control input-email-register" placeholder="E-mail" required>
										</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-user-tag"></i></span>
											</div>
											<input type="username" name="username" id="register-username" class="form-control input-user-register" placeholder="Username" required>
										</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="password" name="password" id="register-password" class="form-control input-pass-register" placeholder="Parola" required>
										</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" name="lname" id="register-lname" class="form-control input-lname-register" placeholder="Nume" required>
											<input type="text" name="fname" id="register-fname" class="form-control input-fname-register" placeholder="Prenume" required>
										</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-calendar"></i></span>
											</div>
											<input type="date" name="date" id="register-date" class="form-control input-date-register" placeholder="Data nasterii" required>
										</div>
										<div class="input-group mb-3">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-phone"></i></span>
											</div>
											<input type="number" name="phone" id="register-phone" class="form-control input-phone-register" placeholder="Numar de telefon" required>
										</div>
										<button type="button" id="register-button" class="btn btn-primay register-button" name="register-submit">Register</button>
									</form>	
									<!--LOGGED IN FALSE-->

									<!--LOGGED IN TRUE-->
									<?php } else {?>
										<?php include 'userdata.php'; ?>
										<div class="modal-footer">
											<button type="button" id="logout-button" class="btn btn-primay register-button" name="logout">
												Deconecteaza-te!
											</button>
										</div>
									<?php }?>
									<!--LOGGED IN TRUE-->	

								</center>
							</div>
						</div>
					</div>
				</div>
				<!--LOGIN FORM-->

				<!--SHOPPING CART-->
				<?php if($_SESSION['loggedin'] == false){ ?> 
				<span data-toggle="modal" data-target="#myAccount">
				<?php }?>
				<?php if($_SESSION['loggedin'] == true){ ?> 
				<span data-toggle="modal" data-target="#myCart">
				<?php }?>

				<button type="button" class="btn btn-md btn-primary cart-button" data-toggle="tooltip" data-placement="bottom" 
				title="Vezi ce exista in cosul tau de cumparaturi sau scoate produse din cos cu un singur click!"><i class="fas fa-shopping-cart"></i></button>
				</span>

					<!--SHOPPING CART MODAL-->
					<div class="modal fade" id="myCart" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Cosul tau de cumparaturi</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php include "cart.php" ?>
								</div>
							</div>
						</div>
					</div>
					<!--SHOPPING CART MODAL-->

				<!--SHOPPNG CART-->

				<!--ADD PRODUCT MODAL-->
				<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Adauga un produs</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" enctype="multipart/form-data">
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-image"></i></span>
										</div>
										<div class="custom-file">
											<input lang="en" type="file" accept=".png,.jpg,.gif,.jpeg,.bmp" name="item-image" id="item-image" class="custom-file-input" data-browse-on-zone-click="true" style="overflow: hidden;">
											<label style="overflow: hidden;" class="custom-file-label" for="customFile">Choose file</label>
											<script>
												$('#item-image').on('change',function(){
													var fileName = $(this).val();
													$(this).next('.custom-file-label').html(fileName);
												})
											</script>
										</div>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
										</div>
										<input type="name" name="item-name" id="item-name" class="form-control" placeholder="Denumirea obiectului..." required>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-th"></i></span>
										</div>
										<select class="form-control" id="item-category" name='item-category'>
											<option value="" disabled selected>Categoria obiectului...</option>
											<option value="Casti">Casti</option>
											<option value="Desktop">Desktop</option>
											<option value="Foto">Foto</option>
											<option value="Gaming">Gaming</option>
											<option value="Laptop">Laptop</option>
											<option value="Microfon">Microfon</option>
											<option value="Monitor">Monitor</option>
											<option value="Mouse">Mouse</option>
											<option value="Tablete">Tablete</option>
											<option value="Tastatura">Tastatura</option>
											<option value="Telefoane">Telefoane</option>
											<option value="TV">TV</option>
										</select>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fab fa-apple"></i></span>
										</div>
										<input type="name" name="item-brand" id="item-brand" class="form-control" placeholder="Brand-ul obiectului..." required>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-layer-group"></i></span>
										</div>
										<input type="number" name="item-amount" id="item-amount" class="form-control" placeholder="Cate obiecte de acest tip doriti sa adaugati?" required>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
										</div>
										<input type="number" name="item-price" id="item-price" class="form-control" placeholder="Pretul obiectului..." required>
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-align-left"></i></span>
										</div>
										<textarea name="item-spec" id="item-spec" class="form-control" placeholder="Specificatii..." rows='4' style="resize:none;"></textarea>
									</div>
									<input type="submit" class="btn btn-primay register-button" name='add-button' value='Adauga!'>
								</form>
							</div>
							<?php
							$currentPage = $_SERVER['REQUEST_URI'];
							if(array_key_exists('add-button',$_POST)){
								$generateID = null;

								if(!empty($idCodes[$_POST['item-category']])){
									$index = $_POST['item-category'];
									$generateID = $idCodes[$index]*1000+50;
								}

								$con = mysqli_connect('localhost', 'root', '');
								mysqli_select_db($con, 'shop_project');
								$sql = "INSERT INTO produse (id, nume, categorie, brand, furnizor, stoc, pret, specificatii) VALUES ('".$generateID."','".$_POST['item-name']."','".$_POST['item-category']."','".$_POST['item-brand']."','".$_SESSION['name']."','".$_POST['item-amount']."','".$_POST['item-price']."','".$_POST['item-spec']."');";
								$query = mysqli_query($con, $sql);

								$dir = "img/products/";
								$file = $dir . basename($_FILES["item-image"]["name"]);
								move_uploaded_file($_FILES['item-image']['tmp_name'], $file);
								$extension = pathinfo($file, PATHINFO_EXTENSION);
								rename($file,$dir.$generateID.".png");
								$_POST = array();
								header('Location: '.$currentPage);
							}
							?>
						</div>
					</div>
				</div>
				<!--ADD PRODUCT MODAL-->

			</div>
		</div>
		<nav class="navbar navbar-expand-md sticky-top navbar-dark">
			<a class="navbar-brand" href="index.php">Ossas Electronics</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarToggler">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-home"></i>  Acasa</a></li>
					<li class="nav-item"><a class="nav-link" href="produse.php?category=casti"><i class="fas fa-mobile-alt"></i>  Produse</a></li>
				</ul>
				<?php
				if($_SESSION['loggedin'] == true){ ?>
				<button class="nav-link add-product btn" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus"></i></i>  Adauga produs</a>
				<?php } ?>
			</div>
		</nav>
		
		<!--Carousel-->
		<div id="slides" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1"></li>
				<li data-target="#slides" data-slide-to="2"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/products/53001.png" />
					<div class="test">
						</br><h1>Casti gaming HyperX Cloud II Pro</h1>
						<h3>Indiferent daca aveti nevoie de sunet surround 7.1 sau stereo, exista un model Cloud facut pentru dvs. Fiecare model Cloud este proiectat sa va mentina mai mult timp in joc, oferind confort premiat cu ajutorul spumei de memorie HyperX ™.</h3>
						<button type="button" class="btn btn-lg btn-primary">Cumpara acum!</button>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!--Carousel-->

		<!--Contents-->
			<!--CONTENT MODAL-->
			<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-inline" action="addToCart.php" id="addForm" method="get">
									<input type="number" name="amount" id="item-amount" class="form-control" placeholder="Numarul de bucati" required>
									<button type="submit" id="add-item-button" class="btn btn-primay register-button" name="add-to-cart">
										Adauga!
									</button>
									<input type="hidden" name="hidden_id" value="" id="hidden_id">
									<input type="hidden" name="current-page" value=<?php echo "'".$_SERVER['REQUEST_URI']."'"; ?> >
							</form>
						</div>
					</div>
				</div>
			</div>
			<script>
				$('#addToCart').on('show.bs.modal', function(event){
					if(!$(this).next('.btn').hasClass("disabled")){
						var button = $(event.relatedTarget)
						var recipientName = button.data('item')
						var recipientID = button.data('item-id')
						var modal = $(this)
						modal.find('.modal-title').text("Adauga "+recipientName+" in cos.")
						modal.find('input#hidden_id').val(recipientID)
					}
				})
			</script>
			<!--CONTENT MODAL-->
		<div class="grid-container">
			<?php include 'connect.php'; ?>
		</div>
		<!--Contents-->
		
		<!-- Footer -->
		<footer class="page-footer font-small blue pt-4">
		  <!-- Footer Links -->
		  <div class="container-fluid text-center text-md-left">

			<!-- Grid row -->
			<div class="row">

			  <!-- Grid column -->
			  <div class="col-md-6 mt-md-0 mt-3">

				<!-- Content -->
				<h5 class="text-uppercase"></h5>
				<p></p>

			  </div>
			  <!-- Grid column -->

			  <hr class="clearfix w-100 d-md-none pb-3">

			  <!-- Grid column -->
			  <div class="col-md-3 mb-md-0 mb-3">

				<!-- Links -->
		

			  </div>
			  <!-- Grid column -->

			  <!-- Grid column -->
			  <div class="col-md-3 mb-md-0 mb-3">



			  </div>
			  <!-- Grid column -->

			</div>
			<!-- Grid row -->

		  </div>
		  <!-- Footer Links -->

		  <!-- Copyright -->
		  <div class="footer-copyright text-center py-3">© 2020 Copyright: Adelina si Iuliana
		  </div> 
		  <!-- Copyright -->

		</footer>
		<!-- Footer -->

		<!--Bootstrap javascript required scripts-->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		<script>
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>	
	</body>
</html>