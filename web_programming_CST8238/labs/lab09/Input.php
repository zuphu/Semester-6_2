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
			<div style="float:left; width:20%;">
				<form method="post">			
					<table width=30% border=1px>
					<tr>
						<td>		
						First Name:
						</td>
						<td>
						<input type="text" name="txtboxFirstName">
					</tr>
					<tr>
						<td>
						Last Name:
						</td>
						<td>
						<input type="text" name="txtboxLastName">
						</td>
					</tr>
					<tr>
						<td>		
						Telephone Number:
						</td>
						<td>
						<input type="text" name="txtboxTelephoneNumber">
						</td>
					</tr>
					<tr>
						<td>		
						Occupation:
						</td>
						<td>
						<input type="radio" name="radioStudentFacultyGroup" value="Student">Student<br/>
						<input type="radio" name="radioStudentFacultyGroup" value="Staff">Staff<br/>
						<input type="radio" name="radioStudentFacultyGroup" value="Staff">Faculty</br>
						</input>
						</td>
					</tr>
					<tr>
						<td>		
						Video Games:
						</td>
						<td>
							<select name="selectVideoGame">
							<option value="Nothing Selected">Please select...</option>
							<option value="Zelda - Ocarina of Time">Zelda - Ocarina of Time</option>
							<option value="Pong">Pong</option>
							<option value="DoTA 2">Dota 2</option>
							<option value="League of Legends">LoL</option>
							</select>
						</input>
						</td>
					</tr>
					<tr>
						<td>
						1
						</td>
						<td>
							<input type="submit" value="Submit">
						</input>
						</td>
					</tr>
				</table>
				</form>
			</div>
			
			<div style="float:right; width:40%;">
				<?php
				
					if (isset($_POST["txtboxFirstName"]))
						$firstName = $_POST["txtboxFirstName"];
					else
						$firstName = "Nothing entered!!!";
					
					if (isset($_POST["txtboxLastName"]))
						$lastName = $_POST["txtboxLastName"];
					else
						$lastName = "Nothing entered!!!";
						
					if (isset($_POST["txtboxTelephoneNumber"]))
						$telephoneNumber = $_POST["txtboxTelephoneNumber"];
					else
						$telephoneNumber = "Nothing entered!!!";
						
					if (isset($_POST["radioStudentFacultyGroup"]))
						$studentStaffFaculty = $_POST["radioStudentFacultyGroup"];
					else
						$studentStaffFaculty = "Nothing entered!!!";
						
					if (isset($_POST["selectVideoGame"]))
						$videoGame = $_POST["selectVideoGame"];
					else
						$videoGame = "Nothing entered!!!";
						
						
					echo "First Name: " . $firstName . "<br/>";
					echo "Last Name: " . $lastName . "<br/>";
					echo "Telephone #: " . $telephoneNumber . "<br/>";
					echo "Selection: " . $studentStaffFaculty . "<br/>";
					echo "Drop down: " . $videoGame . "<br/>";
			
				?>
			</div>
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