<?php
include 'connect.php';
$permissions = array(
    "staff"=>1
);
include 'check-authorisation.php';
$query = "USE 17ac3d07; SELECT staff.*, Department.Name AS Dep FROM staff
INNER JOIN Department ON staff.DepartmentID = Department.ID WHERE BranchID = :branchID";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':branchID', $_GET['branchID']);
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Employees</title>
        <?php include 'scripts.html'?>
    </head>
    <body>
        <?php include 'navigation.php'; ?>
        <div id="container">
            <div id="content">
                <div id="main">
                </br>
                </br>
                <div id="bubbleText">
                    <table>
                        <thead>
                            <h2><u> Employees </u></h2>
                </br>
                <table id="basketTable">
                    <thead>
                        <td>Staff ID</td>
                        <td>Department</td>
                        <td>AddressID</td>
                        <td>Frist Name</td>
                        <td>Last Name Name</td>
                    </thead>

                    <tbody?>
                        <?php foreach($stmt->fetchAll() as $result): ?>
                            <tr>
                                <td><?php echo $result['ID']; ?></td>
                                <td><?php echo $result['Dep']; ?></td>
                                <td><?php echo $result['AddressID']; ?></td>
                                <td><?php echo $result['FirstName']; ?></td>
                                <td><?php echo $result['LastName']; ?></td>
                                <td><a href="EditStaff.php?ID=<?php echo $result['ID']; ?>"> Update </a></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
                </br>
                </br>
                </br>
                <div id="footer">
                    Created in 2017 by Team 7
                </div>
    </body>
</html>
