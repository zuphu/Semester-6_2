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
		
		 <?php
			$dataStream = "This is a test";

			echo strtoupper($dataStream) . "<br />";
			echo strtolower($dataStream). "<br />";
			echo "The str len is " . strlen($dataStream). "<br />";
			$splits =  str_split($dataStream);
			print_r($splits);
			echo "<br/>";
			echo $dataStream . ' of the emergency broadcast system. <br/>';
			$exploding = explode (" ", $dataStream);
			print_r($exploding);
		?>

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