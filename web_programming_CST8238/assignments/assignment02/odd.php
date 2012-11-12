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
		define("TEN_BOTTLE", 10);
		
		bottlesOfBeerOdd();
		
		function bottlesOfBeerOdd()
		{
			for ($i=99; $i > 0 ; $i-=2)
			{
				$evenOrOdd = $i % 2;
				
				if (($evenOrOdd) == 1)
				{
					if ($i == 1)
					{
						echo "There is only 1 bottle left!<br/>";
					}
					else
					{
						echo "$i bottles of beer on the wall...<br/>
						$i bottles of beer...<br/>";
					}
					
					echo "You take one down you pass it around ...<br/>";
					
					if ( $i == 1)
					{
						echo $i-1 . " bottles of beer on the wall.<br/><br/>";
					}
					else
					{
						echo $i-2 . " bottles of beer on the wall.<br/><br/>";
					}
					
				}
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