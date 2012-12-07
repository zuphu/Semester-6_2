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
		<h1>Home</H1>
		<?php
			if (!isset($_SESSION["pid"]))
				header("Location: Login.php");
			
			//$loginQuery = "SELECT * FROM PERSONS where EmailAddress = '" . $_POST["email"] . "' AND Password = '" . $_POST["pass"] . "'";
			
			// $sqlDelete = "DELETE FROM PERSONS";
			$transactionQueryRecent = "SELECT * FROM TRANSACTIONS where PersonId = '" . $_SESSION["pid"] . "' ORDER BY TransactionId DESC LIMIT 3";
			$transactionQuery = "SELECT * FROM TRANSACTIONS where PersonId = '" . $_SESSION["pid"] . "'";
			
			// $sqlQueryInsert = "INSERT INTO persons (FirstName, LastName, EmailAddress, Password, SocialInsuranceNumber, TelephoneNumber) VALUES('1', '2', '3', '4', '5', '6')";
			
			$dbConnection = mysql_connect($host, $username, $password);
	
			if(!$dbConnection)
				die("Could not connect to the database. Remember this will only run on the Playdoh server.");
			
			if (mysql_select_db($database) == null)
				echo "oops";

			if($result = mysql_query($transactionQueryRecent))
				$error = "Query Success";
			else
				$error = "Query Fail".mysql_error();
			
			if($resultAll = mysql_query($transactionQuery))
				$error = "Query Success";
			else
				$error = "Query Fail".mysql_error();
			
			$rowCount = mysql_num_rows($resultAll);
			
			if ($rowCount > 0)
			{
				for($i=0; $i<$rowCount; ++$i)
				{
					$row = mysql_fetch_row($resultAll);
					$total += $row[2];
				}
			}
			
			echo "<b>Account balance:</b> " . $total;
			
			$rowCount = mysql_num_rows($result);
			
			echo "<table border='1px'>";
			echo "<tr>";
			echo "<th>";
			echo "ID";
			echo "</th>";
			echo "<th>";
			echo "Type";
			echo "</th>";
			echo "<th>";
			echo "Value";
			echo "</th>";
			
			if ($rowCount > 0)
			{
				for($i=0; $i<$rowCount; ++$i)
				{
					$row = mysql_fetch_row($result);

					if ($row[2] > 0)
						$TRANS = "Deposit";
					else
						$TRANS = "Withdraw";
						
					echo "<tr>";
					echo "<td>";
					echo $row[0];
					echo "</td>";
					echo "<td>";
					echo $TRANS;
					echo "</td>";
					echo "<td>";
					echo $row[2];
					echo "</td>";
					echo "</tr>";
				}
			}
			else
			{
				echo "<tr>";
				echo "<td colspan='3'>";
				echo "You have not completed a transaction";
				echo "</td>";
				echo "</tr>";
				
				$error = "There are no entries for this ID";
			}
			
			echo "</table>";
		
			echo "<font color='red'>" . $error . "</font>";
			
		?>
	
		</div>
				<div id="footer">
			<?php
				include "footer.php";
			?>
		</div>
    </body>
</html>
