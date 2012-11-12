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
			$dataStream = array(9, 3, 1, 0, 99, 2, 5, 6, 32, 1, 55);
			$dataStream2 = array(9, 18, 1, 0, 23, 22, 4, 6, 5, 32, 55);
			$average;
			$highest;
			
			echo "<b>Array1:</b> <br/>";
			print_r($dataStream);
			echo "<br/>";
			echo "<b>Array2:</b><br/>";
			print_r($dataStream2);
			echo "<br/>";
			
			calculateAverage($dataStream, $average);
			echo "<br />The average is: ";
			printf("%.2f", $average);
			echo "<br />";

			highestValue($dataStream, $highest);
			echo "<br />The highest number is: ";
			printf("%d", $highest);
			echo "<br /></br />";	
			
			testArrays($dataStream, $dataStream2);
			
			function calculateAverage($dataSource, &$result)
			{
				$total = 0;
				
				for ($i = 0; $i < sizeof($dataSource); $i++)
					$total += $dataSource[$i];
				
				$result = ( $total / sizeof($dataSource) );
			}
			
			function highestValue($dataSource, &$result)
			{
				$result = $dataSource[0];
				
				for ($i = 0; $i < sizeof($dataSource); $i++)
				{
						$currentData =  $dataSource[$i];
						
						if ($currentData > $result)
							$result = $currentData;
				}
			}
			
			function testArrays($dataSource1, $dataSource2)
			{	
				for ($i = 0; $i < sizeof($dataSource1); $i++)
				{
						if ($dataSource1[$i] == $dataSource2[$i])
							echo "index " . $i . " is the same (" . $dataSource1[$i]  . ")<br />";
				}
			}
			
			
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