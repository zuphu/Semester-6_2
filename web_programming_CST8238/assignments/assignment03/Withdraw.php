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
			<H1>Withdraw</H1>
			<?php
				if (!isset($_SESSION["pid"]))
					header("Location: Login.php");
				
				//$loginQuery = "SELECT * FROM PERSONS where EmailAddress = '" . $_POST["email"] . "' AND Password = '" . $_POST["pass"] . "'";
				
				// $sqlDelete = "DELETE FROM PERSONS";
				//$transactionQuery = "SELECT * FROM TRANSACTIONS where PersonId = '" . $_SESSION["pid"] . "'";
				$personId = intval($_SESSION["pid"]);
				$withdrawValue =  floatval($_POST["withdrawValue"]);
				
				//$trasactionDeposit = "INSERT INTO transactions (TransactionId, PersonId, AmountTransferred) VALUES (53, )";
				// $sqlQueryInsert = "INSERT INTO persons (FirstName, LastName, EmailAddress, Password, SocialInsuranceNumber, TelephoneNumber) VALUES('1', '2', '3', '4', '5', '6')";
				
				$dbConnection = mysql_connect($host, $username, $password);
		
				if(!$dbConnection)
					die("Could not connect to the database. Remember this will only run on the Playdoh server.");
				
				if (mysql_select_db($database) == null)
					echo "oops";

				if ($withdrawValue != "" && $withdrawValue > 0)
				{
					$withdrawValue *=  (-1.0);
					$trasactionDeposit = "INSERT INTO transactions (PersonId, AmountTransferred) VALUES (" . $personId . ", " . $withdrawValue . " )";
					
					if($result = mysql_query($trasactionDeposit))
					$error = "The amount of " . $withdrawValue * -1 . " was successfully withdrawn.";
				else
					$error = "Query Fail".mysql_error();
				
				echo "<font color='red'>" . $error . "</font>";		
				}
			?>
			<form method="post" action="Withdraw.php">
				<table width="50%">
					<tr>
					<td>Withdraw: </td>
					<td><input type="text" name="withdrawValue" /></td>
					<td><input type="submit" value="Withdraw"></td>
					</tr>
				</table>
			</form>
		</div>
		
		<div id="footer">
		<?php
			include "footer.php";
		?>
		</div>
		
    </body>
</html>
