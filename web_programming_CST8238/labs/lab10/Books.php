<html>
    <head>
        <title>Lab 10</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css">
		</style>
    </head>
	
	<body>
	
        <div id="header">
            <?php
				include "header.php";
			?>
        </div>
		
		<h1>XML Example using the DOM</h1>
		
		<div id="content">
		
		<?php 
			// file_get_contents is a function build into the php runtime
			// it goes to the url and downloads the content of the web page
			// in this case it is downloading the contents of BankNews.xml
			$xml = file_get_contents("http://playdoh.algonquincollege.com/courses/cst8238/books.xml");

			// create a new DOM document object
			// the dom document object has a number of methods to get information from your
			// xml document
			$xmlDoc = new DOMDocument();
			$xmlDoc->loadXML($xml); 
			
			// get the channel element of the xml sheet
			$channel = $xmlDoc->getElementsByTagName('catalog');
			
				echo "<table border='1px'>";
				echo "<tr>";
				echo "<th>Author</th>";
				echo "<th>Title</th>";
				echo "<th>Genre</th>";
				echo "<th>Price</th>";
				echo "<th>Publish Date</th>";
				echo "<th>Description</th>";
				echo "</tr>";
				
				// get the information out of the channel
				// obviously, this loop will only run once			
				foreach($channel as $currentChannel)
				{
					// get all the nodes from the channel
					foreach($currentChannel->childNodes as $node)
					{
						if ($node->nodeName == "book") 
						{
							echo "<tr>";
							foreach($node->childNodes as $itemNode)
							{

								
								if ($itemNode->nodeName=='author')
									echo "<td>" . $itemNode->nodeValue . "</td>";
									
								if ($itemNode->nodeName=='title')
									echo "<td>".$itemNode->nodeValue . "</td>";
									
								if ($itemNode->nodeName=='genre')
									echo "<td>".$itemNode->nodeValue . "</td>";
									
								if ($itemNode->nodeName=='price')
									echo "<td>".$itemNode->nodeValue . "</td>"; 
									
								if ($itemNode->nodeName=='publish_date')
									echo "<td>".$itemNode->nodeValue . "</td>";
									
								if ($itemNode->nodeName=='description')
									echo "<td>" . $itemNode->nodeValue . "</td>";
									
							}
						echo "</tr>";
						}
					}
					echo "</table>";
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