<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();	
?>
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
		   if ($_SESSION["firstName"] == "")
		   {
			echo "you must log in dude.";
		   }
				$host = "localhost";
				$username = "guev0019";
				$password = "guev001944dga";
				$database = "lab9_guev0019";
				
				$dbConnection = mysql_connect($host, $username, $password);
		
				if(!$dbConnection)
					die("Could not connect to the database. Remember this will only run on the Playdoh server.");
				
				mysql_select_db($database);
				
				$sqlQuery = "SELECT * FROM PERSONS";
							
				$get_firstName = $_SESSION["firstName"];
				$get_lastName = $_SESSION["lastName"];
				$get_email = $_SESSION["email"];
				$get_telephone = $_SESSION["telephone"];
				$get_sin = $_SESSION["sin"];
				$get_password = $_SESSION["password"];
				
				echo "<b><h1>Session Variables:</h1></b><br />";
				echo  "First Name: $get_firstName <br/>";
				echo "Last Name: $get_lastName <br/>";
				echo "Email: $get_email <br/>";
				echo "Telephone: $get_telephone <br/>";
				echo "Sin: $get_sin <br/>";
				echo "Password: $get_password <br/><br/>";
				
				$result = mysql_query($sqlQuery);
				
				$rowCount = mysql_num_rows($result);
				
				echo "<hr>";
				echo "<b><h1>Database:</h1></b><br/>";
				echo "The number of entries: $rowCount <br /><br />";
				
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo	"<th>Email</th>";
				echo	"<th>Telephone</th>";
				echo	"<th>SIN</th>";
				echo	"<th>Password</th>";
				echo "</tr>";
				  
				if($rowCount == 0)
					echo "*** There are no rows to display from the Person table ***";
				else
				{

					for($i=0; $i<$rowCount; ++$i)
					{
						$row = mysql_fetch_row($result);

						echo "<tr>";		
						echo "<td>" .$row[1] . "</td>";				
						echo "<td>" .$row[2] . "</td>";
						echo "<td>" .$row[3] . "</td>";
						echo "<td>" .$row[4] . "</td>";
						echo "<td>" .$row[5] . "</td>";
						echo "<td>" .$row[6] . "</td>";
						echo "</tr>";
					}
					
				echo "</table>";
				mysql_close($dbConnection);
				}
				
			?>
			
		</div>

    </body>
</html>
