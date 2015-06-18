<?php 	
	function ContractToSitterTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT c.OwnerID, f.species, f.size, c.AvailabilityID, c.StartDate, c.EndDate, c.Compensation	
					FROM contracttositter c, cantakecareof f
					WHERE '$userID' = c.SitterID and c.Status = 0 and f.availabilityID = c.availabilityID";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "Name Of Owner";
			echo '</th>';

			echo '<th>';
			echo "Pet Type";
			echo '</th>';

			echo '<th>';
			echo "Pet Size";
			echo '</th>';

			echo '<th>';
			echo "Start Date";
			echo '</th>';

			echo '<th>';
			echo "End Date";
			echo '</th>';

			echo '<th>';
			echo "Compensation";
			echo '</th>';

			echo '<th>';
			echo "Accept";
			echo '</th>';
			

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['OwnerID'];
				echo '</td>';

				echo '<td>';
				echo $row['species'];
				echo '</td>';

				echo '<td>';
				echo $row['size'];
				echo '</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';

				echo '<td>';
				echo $row['Compensation'];
				echo '</td>';

				echo "<td><form action='./acceptContractToSitter.php' method='post'><input type='image' name='AvailabilityID' alt='Remove pet' src='../remove.png' width='18px' type='submit' value='";
				echo $row['AvailabilityID'];
				echo "'/></form></td></tr>";
			

				echo '</tr>';
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
	function ContractToOwnerTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT c.SitterID, f.PetName, c.RequestID, c.StartDate, c.EndDate, c.Compensation	
					FROM contracttoowner c, ownspet f
					WHERE '$userID' = c.OwnerID and c.Status = 0 and f.OwnerID = c.OwnerID";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "Name Of Sitter";
			echo '</th>';

			echo '<th>';
			echo "Pet Name";
			echo '</th>';

			echo '<th>';
			echo "Start Date";
			echo '</th>';

			echo '<th>';
			echo "End Date";
			echo '</th>';

			echo '<th>';
			echo "Compensation";
			echo '</th>';
			
			echo '<th>';
			echo "Accept";
			echo '</th>';
		

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['SitterID'];
				echo '</td>';

				echo '<td>';
				echo $row['PetName'];
				echo '</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';

				echo '<td>';
				echo $row['Compensation'];
				echo '</td>';
				
				echo "<td><form action='./acceptContractToOwner.php' method='post'><input type='image' name='RequestID' alt='Remove pet' src='/../remove.png' width='18px' type='submit' value='";
				echo $row['RequestID'];
				echo "'/></form></td></tr>";

				echo '</tr>';
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
?>
<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Inbox</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:5cb85c; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Inbox</h1>
  			<p style="color:white">
  					Here you can view, accept or decline offered contracts.
  			</p>
  		</div>
	</div>
	<div class="container">
		<br><br>
		<font size="5"face="verdana" color="black"><u>Contracts offered by people wanting to take care of your pet</u></font>
		<br>
		<?php ContractToOwnerTable();?>
		<br><br>
		<font size="5"face="verdana" color="black"><u>Contracts offered by people wanting you to take care of their pet</u></font>
		<br>
		<?php ContractToSitterTable();?>
	</div>

</body>
