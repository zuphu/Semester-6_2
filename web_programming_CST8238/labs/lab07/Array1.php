<?php
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
?>