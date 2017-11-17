<?php
include 'connect.php';
#TODO: Add  edit and create functionality
$can_edit = FALSE;
$can_create = FALSE;
$can_delete = FALSE;

#If the user is admin they automatically have the required tablepermission
if(isset($_SESSION['permissions']['admin']))
    $_SESSION['permissions'][$tablePermission] = 0;

if(isset($_SESSION['permissions'][$tablePermission])){
    switch ($_SESSION['permissions'][$tablePermission]) {
        case 0:
            #0 for permissions like admin where the permission itself enables them to edit everything.
        case 4:
            $can_delete = TRUE;
        case 3:
            $can_create = TRUE;
        case 2:
            $can_edit = TRUE;
    }
}
if (!isset($query)) {
    die("need to set the \$query variable");
}

#Handles Pagination
if (isset($_GET['page'])){
    $page=$_GET['page'];
}
else {
    $page=1;
}

#Determines the number of results shown per page.
if (isset($_SESSION['pageResults'])){
    $pageResults=$_SESSION['pageResults'];
}
else {
    $pageResults=25;
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
<script>
 function delete_row(rowID){
     $.ajax('delete.php',
            {
                method: "POST",
                url: "delete.php",
                data: {id: rowID, table: <?php echo "\"$table\"" ?>}
            });
     $("tr>td>button#"+rowID).parent().parent().remove();
 }</script>

            <div id="alertContainer" style="position: fixed; width:100%;">

            </div>

<div class="row" style="margin-top:5%">
    <div class="table-container" style="width:80%">
        <?php if($can_create){
            echo '<button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success" style="width: 100%">Create '.$prettyName.'</button>';
            include "$create_page";
        }
        ?>
        <div class="row table-container">
           
            <table class="table table-hover table-responsive" style="margin-bottom:0px" >
                <thead>
                    <tr>
                        <?php foreach ($tableColumns as $column):
                        if($column == 'ID'):
                        ?>
                            <th class="col-md-1 text-center"><?php echo $column ?></th>
                            <?php else: ?>
                            <th class="col-md-6 text-center"><?php echo $column ?></th>
                            <?php endif ?>
                        <?php endforeach;
                        if($can_delete) echo '<th></th>'; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $paginatedRows = array_slice($tableRows, ((($page*$pageResults))-$pageResults),$pageResults);
                    if (count($paginatedRows) == 0){ echo '<tr><td class="align-center" colspan=5>No Results</td></tr>';}
                    foreach ($paginatedRows as $row):
                    ?>
                        <tr id="<?php $row["ID"] ?>">
                            <?php foreach ($tableColumns as $column): ?>
                                <td class="text-center"><?php echo $row[$column] ?></td>
                            <?php endforeach; ?>
                    <?php if($can_delete){
                        echo '<td class="text-center"><button id="'.$row["ID"].'" onclick=delete_row(this.id) type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td></tr>'; }
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
