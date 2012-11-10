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
		<b>pg128</b>
		<ol>
			<b><li>What is the difference between a numeric and an associative array?</li></b>
				Numeric array - data in the array is accessed by referencing an index that returns a value stored in that location<br/>
				Associative array - data in the array is accessed by referencing a name instead of an index.
			<b><li>What is the main benefit of the array keyword?</li></b>
				array keyword will build an array for you more quickly with less code.
			<b><li>What is the difference between foreach and each?</li></b>
				<i>foreach</i> will loop each element of the array</br>
				<i>each</i> will return the key value pair of an element
			<b><li>How can you create a multidimensional array?</li></b>
				A multidimensional array can be created by nesting other arrays inside the main array.
			<b><li>How can you determine the number of elements there are in an array?</li></b>
				The size of an array can be determined by using the sizeof function.
			<b><li>What is the purpose of the explode function?</li></b>
				This function allows a user to split up a string into substrings delimited by a specific string and store these substrings in a array.
			<b><li>How can you set PHP’s internal pointer into an array back to the first element of the array?</li></b>
				reset($arrayname);
		</ol>
		
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