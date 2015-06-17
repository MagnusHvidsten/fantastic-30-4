<?php 	
		function CreateSitteeContractTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT Name, Address, SitterID, AvailabilityID, StartDate, EndDate, Compensation	
					FROM contracttositter c, user u
					WHERE '$userID' = c.OwnerID and c.Status = 1 and u.userID = c.SitterID";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				echo "<p align='center' style='font-size:20'>You have no contracts in this category</p>";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "Name";
			echo '</th>';

			echo '<th>';
			echo "Address";
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

			// echo '<th>';
			// echo "Delete";
			// echo '</th>';
			

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['Name'];
				echo '</td>';

				echo '<td>';
				echo $row['Address'];
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

				// echo "<td><form action='../removeContractSitter.php' method='post'><input type='image' name='AvailabilityID' alt='Remove pet' src='./remove.png' width='18px' type='submit' value='";
				// echo $row['AvailabilityID'];
				// echo "'/></form></td></tr>";
			

				echo '</tr>';
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
	function CreateSitterContractTable() {
		try{
			$userID = $_COOKIE['userID'];
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = "SELECT Name, Address, RequestID, StartDate, EndDate, Compensation	
					FROM contracttoowner c, user u
					WHERE '$userID' = c.SitterID and c.Status = 1 and u.UserID = c.OwnerID";
			$row = $db->query($sql);
			
			// If there are no sitters, display a different message.
			if($row->rowCount() < 1) {
				echo "<p align='center' style='font-size:20'>You have no contracts in this category";
				return;
			}

			echo '<table class="table table-striped">';
			echo '<th>';
			echo "Name";
			echo '</th>';

			echo '<th>';
			echo "Address";
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
			
			// 	echo '<th>';
			// 	echo "Delete";
			// 	echo '</th>';
		

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['Name'];
				echo '</td>';

				echo '<td>';
				echo $row['Address'];
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
				
				// echo "<td><form action='../removeContractSitter.php' method='post'><input type='image' name='petid' alt='Remove pet' src='./remove.png' width='18px' type='submit' value='";
				// echo $row['AvailabilityID'];
				// echo "'/></form></td></tr>";

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
  			<h1 style="color:white">Pet Sitters</h1>
  			<p style="color:white">
  					Here you can view your current contracts.
  			</p>
  		</div>
	</div>
	<div class="container">
		<font size="4"face="verdana" color="orange">Contract with people whos pet you are scheduled to look after</font>
		<?php CreateSitterContractTable();?>
	</br></br>
		<font size="4" face="verdana" color="blue">Contract with people who are scheduled to take care of your pet </font>
		<?php CreateSitteeContractTable();?>
	</div>

</body>
