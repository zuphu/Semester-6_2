<?php
		define("TEN_BOTTLE", 10);
		
		bottlesOfBeerAll();
		function bottlesOfBeerAll()
		{
			for ($i=99; $i > 0 ; $i--)
			{	
				echo "$i bottles of beer on the wall...<br/>
				$i bottles of beer...<br/> 
				You take one down you pass it around ...<br/>";
				echo $i-1 . " bottles of beer on the wall.<br/><br/>";
			}
				echo "There are no more bottles of beer";
		}
?>