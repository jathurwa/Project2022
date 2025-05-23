<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Voting System</title>
 	          

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<!-- <style>
	body{
		width: 100%;
	    height: calc(100%);
	    background: #00FFFF;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:#e8f5e8;
	}
	#login-right{
		position: absolute;
		background-color:c0c0c0;
		right:0;
		width:40%;
		height: calc(100%);
		background:#95a195;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#74c079;
		display: flex;
		align-items: center;
	}
	
	#login-right .card{
		div{
			position: center;
			padding:50px;
			margin:20px;
			border:6px ridge black;
			width :300px;
			float:left;
			height:150px;
		}
		p{font-size:25px;}
		#card{border-radius:35px 10cm 10%};
		background:#808080;
		
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    /*background: #ff0000;*/
    /*padding: .5em 0.8em;*/
    /*border-radius: 50% 50%;*/
    color: #000000b3;
} ---->
  <style>
    body{
      width: 100%;
      height: 100vh;
      background: linear-gradient(to right, #74c079, #95a195);
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin: 0;
    }
    main#main{
      width: 50%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #login-left{
		width: 50%;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
	.logo{
		position: absolute;
		left:0;
		/*width:60%;*/
		height: calc(100%);
		background:#74c079;
		display: flex;
		align-items: center;
	}
    #login-right{
		position: center;
			padding:20px;
			margin:20px;
			align-items: center;
			border:6px ridge black;
			width :300px;
			float:left;
			height:150px;
      /*width: 100%;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;*/
    }
    .card{
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 100%;
    }
    .form-group{
      margin-bottom: 15px;
    }
    .form-control{
      border-radius: 5px;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
    }
    .btn-primary{
      background-color: #007bff;
      border-color: #007bff;
      color: #fff;
    }
    .btn-primary:hover{
	}
      
</style>

<body>
  <main id="main" class=" alert-info">
  		<div id="login-left">
  			<div class="logo">
  				<h1>MKENYA Online Voting System</h1>
  				<img src="C:\xampp\htdocs\2022election\kenya.jpg" alt="..." width="100%">
  			</div>
  		</div>
		
  		<div id="login-right" class="bg-warning">
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>