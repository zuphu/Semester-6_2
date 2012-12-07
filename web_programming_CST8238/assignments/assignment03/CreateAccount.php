<?php
	// we always have to start session state
	session_start();
	require "MySQLConnectionInfo.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>Untitled Page</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
    </head>
		
    <body>
	
		</div>
		
        <div id="header">
			<?php
				include "header.php";
			?>
        </div>
			
		<div id="topMenu">
			<?php
				include "menu.php";
			?>
		</div>
		
		<div id="content">	
			<form action="CreateAccount.php" method="post">
				<table>
					<tr>
					<td>First Name: </td><td><input type="text" name="firstName" /></td>
					</tr>
					<tr>
					<td>Last Name:</td><td><input type="text" name="lastName" /></td>
					</tr>
					<tr>
					<td>E-mail:</td><td><input type="text" name="email" /></td>
					</tr>
					<tr>
					<td>Telephone:</td><td><input type="text" name="telephone" /></td>
					</tr>
					<tr>
					<td>SIN #:</td><td><input type="text" name="sin" /></td>
					</tr>
					<td>Password:</td><td><input type="text" name="password" /></td>
					</tr>
					<tr>
					<td><input type="submit" value="Create Account" /></td>
					</tr>
				</table>
			</form>
		


		
		 <?php			
			$dbConnection = mysql_connect($host, $username, $password);
	
			if(!$dbConnection)
				die("Could not connect to the database. Remember this will only run on the Playdoh server.");
			
			mysql_select_db($database);

					// $sqlDeleteAll = "DELETE FROM PERSONS";
							// if(mysql_query($sqlDeleteAll))
								// $error = "person successfully added";
							// else
								// $error = "person could not be added ".mysql_error();

			
			$get_firstName = $_POST["firstName"];
			$get_lastName = $_POST["lastName"];
			$get_email = $_POST["email"];
			$get_telephone = $_POST["telephone"];
			$get_sin = $_POST["sin"];
			$get_password = $_POST["password"];
			
						// $sqlQueryInsert = "INSERT INTO persons (FirstName, LastName, EmailAddress, Password, SocialInsuranceNumber, TelephoneNumber) VALUES('1', '2', '3', '4', '5', '6')";
						
			$sqlQueryInsert = "INSERT INTO persons(FirstName, LastName, EmailAddress, Password, SocialInsuranceNumber, TelephoneNumber) VALUES('$get_firstName', 
																			'$get_lastName', '$get_email', '$get_telephone', '$get_sin', '$get_password')";
				
			if ($get_firstName != "" && $get_lastName != "" && $get_email != "" && $get_telephone != "" && $get_sin != "" && $get_password != "")
			{
				header("Location: Login.php");
				if(mysql_query($sqlQueryInsert))
				{
					$error = "Data was submitted";

					if(isset($_POST["lastName"]))
					{
						$_SESSION["lastName"] = $_POST["lastName"];
					}
					if(isset($_POST["firstName"]))
					{
						$_SESSION["firstName"] = $_POST["firstName"];
					}
					if(isset($_POST["email"]))
					{
						$_SESSION["email"] = $_POST["email"];
					}
					if(isset($_POST["telephone"]))
					{
						$_SESSION["telephone"] = $_POST["telephone"];
					}
					if(isset($_POST["sin"]))
					{
						$_SESSION["sin"] = $_POST["sin"];
					}
					if(isset($_POST["password"]))
					{
						$_SESSION["password"] = $_POST["password"];
						exit;
					}
					$result = mysql_query($sqlQueryInsert);
				}
			 }
			 
			mysql_close($dbConnection);
		?>
		</div>
				<div id="footer">
			<?php
				include "footer.php";
			?>
		</div>
    </body>
</html>
