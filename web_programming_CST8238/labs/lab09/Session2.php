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
		`
		<div id="content">
			<div style="float:left; width:20%;">
			</div>
			
			<div style="float:right; width:40%;">
			</div>
			
			<?php

				// again, make sure the session is available for use
				session_start();
				
				echo "Your first name is ". $_SESSION["firstName"] . "<br />";
				echo "Your last name is ". $_SESSION["lastName"] . "<br />";
				echo "Your phone numberis ". $_SESSION["phoneNumber"] . "<br />";
				echo "The radio button selected is ". $_SESSION["radioGroup"] . "<br />";
				echo "The video game selected is ". $_SESSION["videoGame"] . "<br />";

				?>
				
			</div>
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