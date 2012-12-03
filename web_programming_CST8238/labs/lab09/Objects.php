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
		<b>pg113</b>
		<ol>
			<b><li>What is the main benefit of using a function?</li></b>
				Separates code into similar blocks making code more maintainable. Allows useage of other functions created by other people to be used as well as built in functions that come with the language.
			<b><li>How many values can a function return?</li></b>
				A function can return one value or many if it is an array.
			<b><li>What is the difference between accessing a variable by name and by reference?</li></b>
				<i>name</i> will take the value of the variable being passed into the function</br>
				<i>reference</i> will take the address of the variable being passed into the function
			<b><li>What is the meaning of “scope” in PHP?</li></b>
				A multidimensional array can be created by nesting other arrays inside the main array.
			<b><li>How can you incorporate one PHP file within another?</li></b>
				include it! use include_once or include or require_once
			<b><li>How is an object different from a function?</li></b>
				An object can contain one or more related functions wrapped in a class. When an object is referenced the wrapped functions can be accessed from inside the instance of the class object.
 			<b><li>What syntax would you use to create a subclass from an existing one?</li></b>
			Extend a parent class, example:<br/>class Dad {}<br/> class Son extends Dad{}
			<b><li>How do you create a new object in PHP?</li></b>
			$variableName = new ClassNameHere;
			<b><li>How can you call an initializing piece of code when an object is created?</li></b>
			Use the constructor; A constructor is called when the object is created. The constructor is  a method with the same name as the Class.
			<b><li>Why is it a good idea to explicitly declare properties within a class?</li></b>
				Helps maintain documentation and traceability.
		</ol>
		
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