<!DOCTYPE html>
<html>
<head>
	<title>SIGNUP</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGNUP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
         <label>Name</label>
     	<input type="text" name="name" placeholder="Name"><br>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>
         <label>Re Password</label>
     	<input type="password" name="re_password" placeholder="Re_Password"><br>
     	<button type="submit">Sign Up</button>
		<a href="loginuser.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>
 