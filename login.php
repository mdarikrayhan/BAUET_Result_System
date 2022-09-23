<?php
	session_start();
	include 'db.php';
    $errors=array();
    function test_input($data) {
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data);  
	return $data;
	}
        if(isset($_POST['login'])){

        	$username=mysqli_real_escape_string($connection, $_POST['username']);
	        $password=mysqli_real_escape_string($connection, $_POST['pass']);

	        $username=test_input($username);
	        $password=test_input($password);

        	if(empty($_POST['username']))
           		$errors['username']="Please Enter Username";
	       	else
	            $username=test_input($_POST['username']);
	       	if(empty($_POST['pass']))
	            $errors['pass']="Please Enter Password";
	        else
	            $password=test_input($_POST['pass']);
	



	     if(count($errors)==0)
	     {

	           $sql1="SELECT a.username,a.password,a.user_type_id FROM  faculty a JOIN user_type b WHERE username='$username' AND a.user_type_id=b.user_type_id";

				
	           if($result=mysqli_query($connection,$sql1)){

	             if(mysqli_num_rows($result)>0){
	
		                while($row=mysqli_fetch_assoc($result)){

		                   
							
					         if(password_verify($password,$row['password']))
					         {     

					         	    $_SESSION['username']=$username;
					        

									header('Location:faculty/faculty_home.php');
									exit();
							         
							  }
							  else{

							  	$errors["wrong_pass"]="You have entered wrong password";							  }
							
						   }	
				    	}
					}



			 $sql2="SELECT a.username,a.password,a.user_type_id FROM admin a JOIN user_type b WHERE username='$username'  AND a.user_type_id=b.user_type_id ";

						if($result2=mysqli_query($connection,$sql2)){

							if(mysqli_num_rows($result2) > 0){

								while($row2=mysqli_fetch_assoc($result2)){

									if(password_verify($password,$row2['password']))
								    {

									    $_SESSION['username']=$username;
										header('Location:admin/admin_dashboard.php');
							
										exit();
									}
									else
										$errors["wrong_pass"]="You have entered wrong password";
								}
							}
						}
						else
							$errors["wrong_pass"]="No user found"; 
				}
			
			}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 4px 0 1px 0;
}

img.avatar {
  width: 8%;
  border-radius: 12%;
  padding-bottom: 20px;
}

.container {
  margin-left: 30%;
  margin-right: 30%;

}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
  
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>



	<form method="POST">
	
	<div class="imgcontainer">
    <img src="images/BAUETLOGO.png" alt="Avatar" class="avatar">
  	</div>

	  <div class="container">
	  			<label for="username"><b>Username</b></label>
				<input type="text" name="username" value="<?php if(isset($username)) echo $username;?>">
  				<?php if(isset($errors['username'])) echo $errors['username'];?>

  				<label for="pass"><b>Password</b></label>
				<input type="password" name="pass">
				<?php if(isset($errors['pass'])) echo $errors['pass']; if(isset($errors['wrong_pass'])) echo $errors['wrong_pass'];?>

	      
    			<button type="submit" id="btn" class="btn btn btn-danger btn-md" name="login">Login</button>
		</div>

	
	</form>
	<br>
	<br>




</body>
</html>
