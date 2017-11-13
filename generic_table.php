<?php
include 'connect.php';
#TODO: Add delete, edit and create functionality
if (!isset($query)) {
    die("need to set the \$query variable");
}

if (isset($_GET['page'])){
	$page=$_GET['page'];
}
else {
	$page=1;
}

if (isset($_SESSION['pageResults'])){
	$pageResults=$_SESSION['pageResults'];
}
else {
	$pageResults=10;
}

$stmt = $mysql->prepare($query);
if(isset($bindVars)) {
    foreach ($bindVars as $key => $val){
        $stmt->bindParam($key,$value);
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
<script>function delete_row(rowID){
	$.ajax('delete_row.php', 
	{
		method: "POST",
		url: "",
		data: {id: rowID, table: <?php echo "$table" ?>}
	});
}</script>
<div class="row">
<div class="table-container">
<div class="row table-container">
       <table class="table table-hover table-responsive">
       <thead>
       <tr>	   
       <?php foreach ($tableColumns as $column): ?>
       <th class="text-center"><?php echo $column ?></th>
       <?php endforeach; ?>
       <th></th>
	   </tr>
       </thead>
       <tbody>
		<?php
			$paginatedRows = array_slice($tableRows, ((($page*$pageResults))-$pageResults),$pageResults);
			foreach ($paginatedRows as $row):
		?>
<tr>
         <?php foreach ($tableColumns as $column): ?>
       <td class="text-center"><?php echo $row[$column] ?></td>
<?php endforeach; ?>
<?php echo '<td class="text-center"><button id="'.$row["ID"].'" onclick=delete_row(this.id) type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td></tr>';
 endforeach; 
 ?>
       </tbody>
       </table>
	   </div>
	   <div class="row">
	   <ul class="pagination page-list">
	   <?php
		$pages=ceil(count($tableRows)/$pageResults);
		
		for($i=1; $i<=$pages; $i++){
			if($i!=$page)
				echo '<li class="page-item"><a class="page-link" href="'.strtok($_SERVER['REQUEST_URI'], '?').'?page='.$i.'">'.$i.'</a></li>';
			else
				echo '<li class="page-item active"><a class="page-link" href="'.strtok($_SERVER['REQUEST_URI'], '?').'?page='.$i.'">'.$i.'</a></li>';
		}
		?>
		</ul>
		</div>
	   </div>
	   </div>
</body>
