<?php
$permissions = array(
    "group" => 3
);
include "check-authorisation.php";
include "connect.php";
$stmt = $mysql->prepare("USE 17ac3d07; SELECT * FROM permission");
$stmt->execute();
$permissionResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST'): {
    $stmt = $mysql->prepare("INSERT INTO usergroup (Name, Description) values (:name, :description);");
    $stmt -> bindValue(":name", $_POST["groupName"]);
    $stmt -> bindValue(":description", $_POST["groupDescription"]);
    $stmt -> execute();
    $groupID = $mysql->lastInsertId();
    foreach($_POST as $key=>$value){
        if(substr($key, 0, 11) == "permission-" && $value != -1){
            $permissionID = ltrim($key, "permission-");
            $stmt = $mysql->prepare("USE 17ac3d07; INSERT INTO usergrouppermission (UserGroupID, PermissionID, AccessLevel) values (:groupID, :permissionID, :accessLevel);");
            $stmt->bindValue(":groupID", $groupID, PDO::PARAM_INT);
            $stmt->bindValue(":permissionID", $permissionID, PDO::PARAM_INT);
            $stmt->bindValue(":accessLevel", $value, PDO::PARAM_INT);
            if(!$stmt->execute()){
                echo "$groupID $key $value $permissionID";
                echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Group Creation Failed</strong></div>';
                exit();
            }
        }
    }
}
?>
    
    <div class="alert alert-success alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <strong>Group Created!</strong>
    </div>
<?php exit(); endif ?>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Create Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <form id="createGroup" action="create_group.php" method="post">
                <div class="container">
                    <div class="form-group">
                        <label for="groupName">Group Name</label>
                        <input type="text" class="form-control" name="groupName" id="groupName" placeholder="Enter a Group Name" required />
                    </div>
                    <div class="form-group">
                        <label for="groupDescription">Group Description</label>
                        <input type="text" class="form-control" name="groupDescription" id="groupDescription" placeholder="Enter a Description" required />
                    </div>

                    <div class="container">
                        <div class="row">
                            <label class="col-sm-2">Permissions</label>
                            <label class="col-md-6">Description</label>
                            <label class="col-sm-3">Access Level</label>
                        </div>
                        <?php
                        foreach($permissionResults as $permission):?>
                            <div id="permissions" class="row form-group">
                                <label class="col-sm-2" for="accessLevel-"><?php echo ucfirst($permission['Name']) ?></label> <label for="accessLevel-" class="col-md-6"><?php echo $permission['Description'] ?></label>
                                 <?php if($permission['Name']!="admin"): ?>
                                    <select name="permission-<?php echo $permission['ID'] ?>" class="custom-select col-sm-4">
                                        <option value="-1">No Access</option>
                                        <option value="1">Read</option>
                                        <option value="2">Read & Edit</option>
                                        <option value="3">Read, Edit & Create</option>
                                        <option value="4">Read, Edit, Create & Delete</option>
                                    </select>
                                <?php else: ?>
                                    <select name="permission-<?php echo $permission['ID'] ?>" class="custom-select col-sm-4">
                                        <option value="-1">No Access</option>
                                        <option value="0">Read, Edit Create & Delete</option>
                                    </select>
                                <?php endif ?>
                            </div>

                        <?php endforeach ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
 $(function(){
     $("#createGroup").submit(function(e){
         $.ajax({
             method: "POST",
             url: "create_group.php",
             data: $("#createGroup").serialize(),
             success: function(result){
                 $("#permissions>select").val(-1)
                 $("input").val("");
                 $("#addModal").modal('hide');
                 $("#alertContainer").append(result).fadeIn(400).delay(4000).fadeOut(600);
             }
         });
         e.preventDefault();
     })});
</script>
