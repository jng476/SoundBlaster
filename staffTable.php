
<?php
SESSION_START();
#$permissions = array();
include 'check-authorisation.php';
include 'connect.php';
?>
<!doctype html>
<html>
	<head>
		<title>Staff Table</title>
		<?php include 'scripts.html'?>
	</head>
<body>
	<?php
	include "navigation.php";
	$query="SELECT s.ID, s.FirstName as 'First Name', s.LastName as 'Last Name', d.Name as 'Department Name' FROM STAFF as s JOIN department as d on d.ID = s.DepartmentID ORDER BY s.ID";
	#$query=$query="SELECT ID, FirstName as First Name, Last Name as Surname,  FROM STAFF join on ";
	$table="STAFF";
	echo '<div class="container"><div class="row"><h2>Staff</h2></div>';
	include "generic_table.php";
	echo '</div>'
	?>
</body>
</html>
