<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>Untitled Page</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
		</style>
    </head>

	    <body>
        <div id="header">
            <?php
				include "header.php";
			?>
        </div>
		<?php
			$host = "localhost";
			$username = "guev0019";
			$password = "guev001944dga";
			$database = "lab9_guev0019";
			
			$dbConnection = mysql_connect($host, $username, $password);
	
			if(!$dbConnection)
				die("Could not connect to the database. Remember this will only run on the Playdoh server.");
			
			mysql_select_db($database);

			$redirect = false;
			
			$email = $_POST["email"];
			$passwd = $_POST["pass"];
			
			if ($email != "" && password != "")
			{
				$loginQuery = "SELECT * FROM PERSONS where EmailAddress = '$email' AND Password = '$passwd' ";

				if($result = mysql_query($loginQuery))
					$error = "";
				else
					$error = "Unable to login ".mysql_error();
				
				$rowCount = mysql_num_rows($result);
				$row = mysql_fetch_row($result);
				
				if ($rowCount > 0)
				{
					$redirect = true;

					$_SESSION["firstName"] = $row[1];
					$_SESSION["lastName"] = $row[2];
					$_SESSION["email"] = $row[3];
					$_SESSION["telephone"] = $row[4];
					$_SESSION["sin"] = $row[5];
					$_SESSION["password"] = $row[6];
				}
				else
					echo "<font color='red'><h1>Invalid login credentials</h1></font>";
			}

			
			if ($redirect == true)
				header("Location: ViewAllAccounts.php");
				
			echo $error;
				
		?>
		<div id="content">
		<form method="post">
			<table>
				<tr>
				<td>Email: </td><td><input type="text" name="email" /></td>
				</tr>
				<tr>
				<td>Password: </td><td><input type="password" name="pass">
				</tr>
				<tr>
				<td><input type="submit" value="Login"></td>
				</tr>
			</table>
		</form>
		
		<form action="CreateAccount.php" method="post">
			<table>
			<tr>
			<td><input type="submit" value="Register"></td>
			</tr>
			</table>
			
		</div>

        <div id="footer">
			<?php
				include "footer.php";
			?>
		</div>
		
		<div id="topMenu">
			<?php
				include "menu.php";
			?>
		</div>
		
    </body>
</html>