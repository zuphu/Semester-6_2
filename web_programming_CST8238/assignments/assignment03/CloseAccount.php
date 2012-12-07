<?php
	session_start();
	require "MySQLConnectionInfo.php";
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

		<div id="content">
			<table style='table-layout:fixed;' width='100%'>
				<tr>
				</tr>
				<tr>
				<td width='50% border='1px'>
				</td>
				<h1>Close Account</h1>
				<td width='50%'>
				<div style="border-style:dotted; padding:5px;">
					<form method="post">
						<table>
						<tr>
						<td>Email: </td><td><input type="text" name="email" /></td>
						</tr>
						<tr>
						<td>Password: </td><td><input type="password" name="pass">
						</tr>
						<tr>
						<td><input type="submit" value="Close Account"></td>
						</tr>
						</table>
						</form>
					</table>
				</div>
				
				<?php
					if (!isset($_SESSION["pid"]))
						header("Location: Login.php");
						
						if ($_POST["email"] != "" && $_POST["pass"] != "")
						{
							$pid = intval($_SESSION["pid"]);
							$loginQuery = "SELECT * FROM PERSONS where EmailAddress = '" . $_POST["email"] . "' AND Password = '" . $_POST["pass"] . "'";
							$deleteTransactions = "DELETE FROM PERSONS where PersonId = " . $pid;
							$deleteAccount = "DELETE FROM transactions where PersonId = " . $pid;
							
							// $sqlDelete = "DELETE FROM PERSONS";
							$sqlQuery = "SELECT * FROM PERSONS";
							// $sqlQueryInsert = "INSERT INTO persons (FirstName, LastName, EmailAddress, Password, SocialInsuranceNumber, TelephoneNumber) VALUES('1', '2', '3', '4', '5', '6')";
							
							$dbConnection = mysql_connect($host, $username, $password);
					
							if(!$dbConnection)
								die("Could not connect to the database. Remember this will only run on the Playdoh server.");
							
							if (mysql_select_db($database) == null)
								echo "oops";

							if($result = mysql_query($loginQuery))
								$error = "Login Success";
							else
								$error = "Login fail".mysql_error();
								
							$rowCount = mysql_num_rows($result);
							echo "Thr tow count:" . $rowCount  . "<br/>";
							$row = mysql_fetch_row($result);
															
							if ($rowCount > 0)
							{	
								if ($row[0] == $pid)
								{
									if($result = mysql_query($deleteTransactions))
										$error = "Login Success";
									else
										$error = "nope".mysql_error();;
									if($result = mysql_query($deleteAccount))
										$error = "Login Success";
									
									session_destroy();
									
									header("Location: Login.php");
								}
							}
							else
								$error = "The login was not successful";

							echo "<font color='red'>" . $error . "</font>";
						}

				?>
			
				</td>
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