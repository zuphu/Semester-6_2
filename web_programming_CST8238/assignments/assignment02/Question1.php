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
			
			$pattern = array(1, 3, 5, 7 , 9, 11, 11, 9, 7, 5, 3, 1);
			$spaces = array(11, 9, 7, 5 , 3, 1, 1, 3, 5, 7, 9, 11);
			
			echo "<h1>For Loop</H1>";
			$LIMIT = 10;
			for ($i = 0; $i < 10; $i++)
			{
				for ($ii = 0; $ii < $LIMIT; $ii++)
				{
					echo "*";
				}
				echo "<br />";
				$LIMIT--;
			}
			
			echo "<h1>While Loop</H1>";
			$j = 0;
			$i = 0;
			$ii = 0;
			$iii = 0;
			$LIMIT = 10;
			$CALCLIMIT = 10;
			while ($i < 10)
			{
				$j = 0;
				while ($j < $i)
				{
					echo "&nbsp&nbsp";
					$j++;
				}
				
				$ii = 0;
				$CALCLIMIT = $LIMIT - $j;
				while ($ii < $CALCLIMIT)
				{
					echo "*";
					$ii++;
				}
				echo "<br />";
				$i++;
			}
			
			echo "<br />";
			
			echo "<h1> Do While loop </h2>";
			

			$i = 0;
			$ii = 0;
			$c = 0;
			do
			{
				$ii = 0;
				$c = 0;
				
				do
				{
					echo "&nbsp";
					$c++;
				} while ($c < $spaces[$i]);
				
				do
				{
					echo "*";
					$ii++;
				} while ($ii < $pattern[$i]);
				echo "<br />";
				$i++;
			} while($i < 12);
			

						
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


<?php
/*
		define("MAX_MONTH", 12);
		
		define("JAN", 	0);
		define("FEB", 	1);
		define("MAR", 	2);
		define("APR", 	3);
		define("MAY", 	4);
		define("JUN",		5);
		define("JUL",	 	6);
		define("AUG",	7);
		define("SEP",	8);
		define("OCT", 	9);
		define("NOV",	10);
		define("DEC", 	11);																		
	
		$calendar = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$sortedCalendar = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		
		echo "<h1>The contents are:</h1>";
		print_r($calendar);
		
		echo "<br/><br/><h1>FOR loop:</h1>";
		
		$i = 0;
		for($j = 0; $j < MAX_MONTH; $j++)
		{
			echo ($j + 1). ": " . $calendar[$j] . "</br>";
		}
		

		sort($sortedCalendar);
		
		//echo "<br/><br/><h1>Sorted:</h1>";
		//print_r($calendar);
		
		echo "<br/><br/><h1>FOREACH loop:</h1>";
		
		$i = 0;
		foreach($sortedCalendar as $monthName)
		{
			echo ($i + 1). ". $monthName </br>";
			++$i;
		}
		
		
		echo "<br/><br/><h1>WHILE loop, <b>switch</b>:</h1>";
		
		$i = 0;
		while ($i < MAX_MONTH)
		{
			echo ($i + 1) . ". " . $calendar[$i] . " has ";
			switch($i)
			{
				case JAN:
					echo "  31 days</br>";
					break;
					
				case FEB:
					echo "  28 or 29 days</br>";
					break;
					
				case MAR:
					echo "  31 days</br>";
					break;
					
				case APR:
					echo "  30 days</br>";
					break;
					
				case MAY:
					echo "  31 days</br>";
					break;

				case JUN:
					echo "  30 days</br>";
					break;

				case JUL:
					echo "  31 days</br>";
					break;

				case AUG:
					echo "  31 days</br>";
					break;

				case SEP:
					echo "  30 days</br>";
					break;

				case OCT:
					echo "  31 days</br>";
					break;

				case NOV:
					echo "  30 days</br>";
					break;
					
				default: //December
					echo "  31 days</br>";
					break;
			}
			++$i;
		}
		
	echo "<br/><br/>";
*/?>