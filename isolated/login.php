<?php  

if (isset($_POST["login"], $_POST["username"], $_POST["password"], $users)) {
	$uname = trim(strtolower($_POST["username"]));
	if (isset($users[$uname]["password"])) {
		if (password_verify($_POST["password"], $users[$uname]["password"])) {
			setcookie("session", encrypt(json_encode(["user" => $uname]), APP_KEY));
			header("Location: /");
			exit;
		}
	}
	$alert = "Invalid username or password!";
}

?><!DOCTYPE html>
<html>
<head>
	<title>Cloud Storage</title>
	<?php if (isset($alert)) { ?><script type="text/javascript">alert("<?php print $alert; ?>")</script><?php } ?>
</head>
<body>
	<center>
		<h3>Login</h3>
		<form method="post" action="">
			<label>Username</label><br/><input type="text" name="username"><br/>
			<label>Password</label><br/><input type="password" name="password"><br/><br/>
			<input type="submit" name="login" value="Login">
		</form>
	</center>
</body>
</html>