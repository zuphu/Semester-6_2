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
				<div style="overflow: auto;">
							<?php
				$xml = file_get_contents("BankNews.xml");
				// create a new DOM document object
				// the dom document object has a number of methods to get information from your
				// xml document
				$xmlDoc = new DOMDocument();
				$xmlDoc->loadXML($xml); 
				
				$channel = $xmlDoc->getElementsByTagName('channel');
				
				foreach($channel as $currentChannel)
				{
					// get all the nodes from the channel
					foreach($currentChannel->childNodes as $node)
					{
						if ($node->nodeName == "title")
							echo "Title: " . $node->nodeValue . "<br />";

						if ($node->nodeName == "description")
							echo "Description: " . $node->nodeValue . "<br />";

						if ($node->nodeName == "link")
							echo "Link: " . $node->nodeValue . "<br /><br />";

						if ($node->nodeName == "item") 
						{
							foreach($node->childNodes as $itemNode)
							{
								if ($itemNode->nodeName=='title')
									echo "<b>Title</b>: " . $itemNode->nodeValue . "<br />";
									
								if ($itemNode->nodeName=='description')
									echo "<b>Description</b>: " . $itemNode->nodeValue ."<br />";
									
								if ($itemNode->nodeName=='link')
									echo "<b>Link</b>: " . $itemNode->nodeValue . "<br /><br />";
							}
						}

					}
				}
			?>
				</div>
				</td>
				

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
						<td><input type="submit" value="Login"></td>
						</tr>
						</table>
						</form>

						<form action="CreateAccount.php" method="post">
						<table>
						<tr>
						<td><input type="submit" value="Create Account"></td>
						</tr>
					</table>
				</div>
				
				<?php
						
						if ($_POST["email"] != "" && $_POST["pass"] != "")
						{
							$loginQuery = "SELECT * FROM PERSONS where EmailAddress = '" . $_POST["email"] . "' AND Password = '" . $_POST["pass"] . "'";
							
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
							
							if ($rowCount > 0)
							{
								$row = mysql_fetch_row($result);
								
								$_SESSION["pid"] = $row[0];
								$_SESSION["fn"] = $row[1];
								$_SESSION["ln"] = $row[2];
								$_SESSION["ea"] = $row[3];
								$_SESSION["p"] = $row[4];
								$_SESSION["sin"] = $row[5];
								$_SESSION["tn"] = $row[6];
								header("Location: Home.php");
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