<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>Untitled Page</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
    </head>

    <body>
        <div id="header">
            <?php
				include "header.php";
			?>
        </div>
        <div id="content">
<?php
	
		define("TEN_BOTTLE", 10);
		
		bottlesOfBeerTen();
		
		function bottlesOfBeerTen()
		{
			for ($i=100; $i > 0 ; $i -= TEN_BOTTLE)
			{
				if ($i == 10)
				{
					echo "There are only $i bottles left!<br/>";
				}
				else
				{
					echo "$i bottles of beer on the wall...<br/>";
					echo "$i bottles of beer...<br/>";
				}
				
				echo "You take one down you pass it around ...<br/>" . ($i - TEN_BOTTLE) . " bottles of beer on the wall.<br/><br/>";
			}
		}
?>


        </div>
        <div id="footer">
			<?php
				include "footer.php";
			?>
		</div>

        <div id="getHelp">
			<?php
				include "menu.php";
			?>
        </div>
    </body>
</html>