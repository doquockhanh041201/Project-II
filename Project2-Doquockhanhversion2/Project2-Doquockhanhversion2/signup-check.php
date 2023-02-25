<?php 
session_start(); 
include "config1.php";

if (isset($_POST['uname']) && isset($_POST['password'])
&&isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);
    $user_data='uname='. $uname. '$name='. $name;
    echo $user_data;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
}else if(empty($re_pass)){
    header("Location: signup.php?error=Re_Password is required");
    exit();
}
else if(empty($name)){
    header("Location: signup.php?error=Name is required");
    exit();
}   
    else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index.php");
		        exit();
            }else{
				header("Location: signup.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: signup.php?error=Incorect User name or password1");
	        exit();
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}