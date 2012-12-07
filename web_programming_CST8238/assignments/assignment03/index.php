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
			
			$sqlQuery = "SELECT * FROM PERSONS";
			//$sqlQuery = "INSERT INTO person (FirstName, LastName) VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."')";
			
			$sqlQueryInsert = "INSERT INTO persons (FirstName, LastName) VALUES('SEXY', 'BEAST')";
			$sqlDescribe = "DESCRIBE persons";
			$sqlDeleteAll = "DELETE FROM PERSONS";
			
			if(mysql_query($sqlDeleteAll))
				$error = "Person Successfully Added";
			else
				$error = "Person Could not be added ".mysql_error();
			
			if(mysql_query($sqlQuery))
				$error = "Person Successfully Added";
			else
				$error = "Person Could not be added ".mysql_error();
		
			if(mysql_query($sqlQueryInsert))
				$error = "yesh";
			else
				$error = "neigh".mysql_error();

			$describe = mysql_query($sqlDescribe);
			echo "$describe";
			
			$result = mysql_query($sqlQuery);
			
			$rowCount = mysql_num_rows($result);
			
			
			if($rowCount == 0)
				echo "*** There are no rows to display from the Person table ***";
			else
			{
				for($i=0; $i<$rowCount; ++$i)
				{
				$row = mysql_fetch_row($result);
								
				echo "<table><tr><td>";										
				echo "<br />";					
				echo "<form action=\"MySQLDelete.php\" method=\"post\">";		
				echo "<input type=\"hidden\" name=\"personId\" value=\"".$row[0]."\" />";
				echo "<input type=\"submit\" name=\"deleteButton\" value=\"Delete Person\" />";
				echo "</form>";	

				echo "<form action=\"MySQLUpdate.php\" method=\"post\">";							
				echo "<input type=\"hidden\" name=\"personId\" value=\"".$row[0]."\" />";
				echo "<input type=\"hidden\" name=\"firstName\" value=\"".$row[1]."\" />";	
				echo "<input type=\"hidden\" name=\"lastName\" value=\"".$row[2]."\" />";	
				echo "<input type=\"submit\" name=\"editButton\" value=\"Edit Person\" />";
				echo "</form>";
				echo "</td>";

				echo "<td>";					
				echo "First Name: ".$row[1]."<br />";
				echo "Last Name: ".$row[2]."<br />";	
				echo "</td></tr></table>";

				echo "<br />";
				}
				
			mysql_close($dbConnection);
			}
			echo $error;
		?>
		
		<form action="ViewAllAccounts.php" method="post">
			<table>
				<tr>
				<td>First Name: </td><td><input type="text" name="firstName" /></td>
				</tr>
				<tr>
				<td>Last Name:</td><td><input type="text" name="lastName" /></td>
				</tr>
				<tr>
				<td>E-mail:</td><td><input type="text" name="eMail" /></td>
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
				<td><input type="submit" value="Submit to Database" /></td>
				</tr>
			<table>
		</form>
		
			
		</div>

    </body>
</html>
