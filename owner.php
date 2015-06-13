<?php 	
	
	function getAccommodationRequest() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'SELECT Name, PetName, Species, Size, WithinDistance, StartDate, EndDate, SitterID, AvailabilityID FROM AccommodationRequest a, OwnsPet op, PetOwner po, User u WHERE a.OwnerID = op.OwnerID and a.PetID = op.PetID and op.OwnerID = po.OwnerID and po.OwnerID = u.UserID';
			foreach($db->query($sql) as $row){
				echo $row['Name'];
				echo " ";
				echo $row['PetName'];
				echo " ";
				echo $row['Species'];
				echo " ";
				echo $row['Size'];
				echo " ";
				echo $row['WithinDistance'];
				echo " ";
				echo $row['StartDate'];
				echo " ";
				echo $row['EndDate'];
				echo " ";
				echo $row['SitterID'];
				echo " ";
				echo $row['AvailabilityID'];
				echo '</br>';
			}
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
?>
<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>PetSitter</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<a class="navbar-brand" href="index.php">PETCARE</a>
			<form class="navbar-form navbar-right">
        		<div class="form-group">
         			<input type="text" class="form-control" placeholder="id">
         			<input type="text" class="form-control" placeholder="password">
        		</div>
        		<button type="submit" class="btn btn-default">Submit</button>
      		</form>
      	</div>
	</nav>
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Owners</h1>
  			<p style="color:white">Cras venenatis ullamcorper diam vel accumsan. Morbi elit ipsum, semper vitae erat at, semper finibus risus. In vitae rhoncus ipsum. Aliquam sit amet finibus massa. Morbi non risus eu nibh ullamcorper hendrerit vel vitae mauris. Suspendisse ut felis placerat ante vehicula euismod. Nunc ornare ipsum urna, eget finibus lacus efficitur id. Vivamus dapibus tempor augue at hendrerit. Integer tincidunt, turpis sit amet interdum pellentesque, eros est mollis libero, tempus ullamcorper dui sem a arcu. Maecenas fermentum pellentesque egestas. Aliquam euismod, lectus non elementum posuere, mi turpis interdum velit, quis bibendum ipsum enim vel lacus.</p>
  		</div>
	</div>
	<div class="container">
		<?php
			getAccommodationRequest();
		?>
	</div>
</body>
