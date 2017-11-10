<?php
include 'connect.php';

if (!isset($query)) {
    die("need to set the \$query variable");
}



$stmt = $mysql->prepare($query);
if(isset($bindVars)) :
    foreach ($bindVars as $key -> $val){
        stmt->bindParam($key,$value);
    }
}
$stmt->execute();

$tableRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$tableColumns=[];
for ($i=0 ; $i < $stmt -> columnCount(); $i++) {
    $colDetails = $stmt->getColumnMeta($i);
    array_push($tableColumns, $colDetails['name']);
}
?>
<body>
<head><?php include "scripts.html";?></head>
<div class="container">
       <div class="box">
       <div class="table-responsive">
       <table class="table table-hover">
       <thead>
       <tr>
       <?php foreach ($tableColumns as $column): ?>
       <th><?php echo $column ?></th>
       <?php endforeach; ?>
       </tr>
       </thead>
       <tbody>
       <?php foreach ($tableRows as $row): ?>
<tr class="">
         <?php foreach ($tableColumns as $column): ?>
       <th><?php echo $row[$column] ?></th>
<?php endforeach; ?>
<?php endforeach; ?>
       </tbody>
       </table>
       </div>
       </div>
       </div>
</body>
