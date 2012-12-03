<?php
	// we always have to start session state
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>Untitled Page</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
    </head>

    <body>
        <div id="header">
        </div>
        <div id="content">
		
			
		   <?php
			$host = "localhost";
			$username = "guev0019";
			$password = "guev001944dga";
			$database = "lab9_guev0019";
			
			$dbConnection = mysql_connect($host, $username, $password);
	
			if(!$dbConnection)
				die("Could not connect to the database. Remember this will only run on the Playdoh server.");
			
			mysql_select_db($database);

			//DELETE
					// $sqlDeleteAll = "DELETE FROM PERSONS";
							// if(mysql_query($sqlDeleteAll))
								// $error = "person successfully added";
							// else
								// $error = "person could not be added ".mysql_error();

			
			$sqlQuery = "SELECT * FROM PERSONS";
			//$sqlQuery = "INSERT INTO person (FirstName, LastName) VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."')";

			$get_firstName = $_POST["firstName"];
			$get_lastName = $_POST["lastName"];
			$get_email = $_POST["email"];
			$get_telephone = $_POST["telephone"];
			$get_sin = $_POST["sin"];
			$get_password = $_POST["password"];
			
			echo  "$get_firstName <br/>";
			echo "$get_lastName <br/>";
			echo "$get_email <br/>";
			echo "$get_telephone <br/>";
			echo "$get_sin <br/>";
			echo "$get_password <br/>";
			
			$redirect = false;
			//$sqlQuery = "INSERT INTO persons(FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password) VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["eMail"]."', '".$_POST["telephone"]."', '".$_POST["sin"]."', '".$_POST["password"]."')";
			$sqlQueryInsert = "INSERT INTO persons(FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password) VALUES('$get_firstName', 
																			'$get_lastName', '$get_email', '$get_telephone', '$get_sin', '$get_password')";
			
			// $sqlDeleteAll = "DELETE FROM PERSONS";
			
			// if(mysql_query($sqlDeleteAll))
				// $error = "Person Successfully Added";
			// else
				// $error = "Person Could not be added ".mysql_error();
		
		
		
				// if(mysql_query($sqlQuery))
					// $error = "Person Successfully Added";
				// else
					// $error = "Person Could not be added ".mysql_error();

			
			if ($get_firstName != "" && $get_lastName != "" && $get_email != "" && $get_telephone != "" && $get_sin != "" && $get_password != "")
			{
				$redirect = true;
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
				}
				else
					$error = "Could not submit data".mysql_error();
					
					
			 }
						
			$result = mysql_query($sqlQuery);
			
			$rowCount = mysql_num_rows($result);
			
			echo "The row count is $rowCount <br />";
			if($rowCount == 0)
				echo "*** There are no rows to display from the Person table ***";
			else
			{
				for($i=0; $i<$rowCount; ++$i)
				{
				$row = mysql_fetch_row($result);
				
				echo "<td>";					
				echo "First Name: ".$row[1]."<br />";
				echo "Last Name: ".$row[2]."<br />";	
				echo "Email: ".$row[3]."<br />";	
				echo "Tele: ".$row[4]."<br />";	
				echo "SIN:".$row[5]."<br />";	
				echo "Password: ".$row[6]."<br />";	
				echo "</td></tr></table>";

				echo "<br />";
				}
				
			mysql_close($dbConnection);
			}
			echo $error;
			
			if ($redirect == true)
				header("Location: ViewAllAccounts.php");
		?>
		
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
			<table>
		</form>
		
		<form action="CreateAccount.php" method="post">
			<input type="submit" id="btnDelete" value="Delete all"  />
		</form>
			
		</div>

    </body>
</html>
