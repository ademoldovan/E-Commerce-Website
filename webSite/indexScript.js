function splitData(data){
	var dataSplited = data.split(',').join("<br/>");
	return dataSplited;
}

function generateItems(className, htmlData, index){
	var items = document.getElementsByClassName(className);
	document.getElementsByClassName(className)[index].innerHTML = splitData(htmlData);
}

window.addEventListener('load', (event) => {
	var loginButton = document.getElementById("login-button");
	var logoutButton = document.getElementById("logout-button");
	var loginPassField = document.getElementsByClassName("input-user")[0];
	var loginUserField = document.getElementsByClassName("input-pass")[0];
	var registerButton = document.getElementById("register-button");

	if(loginUserField != null){
		loginUserField.addEventListener("keyup", function(event){
			if(event.keyCode === 13){
				login(document.getElementsByClassName("input-user")[0].value, document.getElementsByClassName("input-pass")[0].value);
			}
		})
	}

	if(loginPassField != null){
		loginPassField.addEventListener("keyup", function(event){
			if(event.keyCode === 13){
				login(document.getElementsByClassName("input-user")[0].value, document.getElementsByClassName("input-pass")[0].value);
			}
		})
	}

	if(loginButton != null){
		loginButton.addEventListener("click", function(){
  			login(document.getElementsByClassName("input-user")[0].value, document.getElementsByClassName("input-pass")[0].value);
 		 });
	}

	if(logoutButton != null){
		logoutButton.addEventListener("click", function(){
  			logout();
  		})
	}

	if(registerButton != null){
		registerButton.addEventListener("click", function(){
			register(document.getElementById("register-email").value,
					 document.getElementById("register-username").value,
					 document.getElementById("register-password").value,
					 document.getElementById("register-fname").value,
					 document.getElementById("register-lname").value,
					 document.getElementById("register-date").value,
					 document.getElementById("register-phone").value);
		})
	}

});


function login(username, password){
	var req = new XMLHttpRequest();

	req.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText == "1"){
				location.reload();
			}else{
				document.getElementsByClassName("error-message")[0].innerHTML = this.responseText;
				document.getElementsByClassName("error-message")[0].style.display = "block";
			}
		}
	}
	req.open('GET', 'login.php?username='+username+'&password='+password, true);
	req.send();
}

function register(email, username, password, fname, lname, date, phone){
	var req = new XMLHttpRequest();

	req.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementsByClassName("error-message")[0].innerHTML = this.responseText;
			document.getElementsByClassName("error-message")[0].style.display = "block";
		}
	}
	req.open('GET', 'register.php?username='+username+'&password='+password+'&email='+email+'&fname='+fname+'&lname='+lname+'&date='+date+'&phone='+phone, true);
	req.send();
}

function logout(){
	window.location = "logout.php";
	console.log("executed");
}

function AddCartItem(itemID){
	window.location = "cart.php";
}
