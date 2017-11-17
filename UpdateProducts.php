<?php
include 'connect.php';
$permissions = array(
    "product"=>3
);
include 'check-authorisation.php';
$query = "USE 17ac3d07; SELECT product.* FROM product ";
if(isset($_GET['ID'])){
    $query = $query."where product.ID = :id";
}
$stmt = $mysql->prepare($query);
$stmt->bindParam(':id', $_GET['ID']);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit/ADD Product</title>
        <?php include 'scripts.html'?>
        <link rel="stylesheet" type="text/css" href="style.css" />
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
                            <h2><u> Products Details </u></h2>
                </br>
                <table id="basketTable">
                        </thead>
                        <tr>
                            <form method="post" action="UpdateProduct.php<?php if(isset($_GET['ID'])){ echo "?ID=".$_GET['ID']; } ?>" >
                                <?php if(isset($_GET['ID'])){
                                    foreach($stmt->fetchAll() as $result): ?>
                                    <td>ID: <?php echo $result['ID']; ?> </td>
                        </tr>
                        <tr>
                                <?php endforeach; } ?>
                                <tr>
                                    <td>Supplier: <select name="Supplier" <?php if(isset($_GET['ID'])){ ?> value= <?php echo $result['SupplierID']; } ?> >
                                        <?php for($i=1; $i<26; $i++){ ?>
                                            <option value=<?php echo $i; ?> ><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Category: <select name="Category" <?php if(isset($_GET['ID'])){ ?> value = '<?php echo $result['CategoryID']; }?>' >
                                        <option value=1>earphones</option>
                                        <option value=2>headphones</option>
                                        <option value=3>speakers</option>
                                        <option value=4>Bluetooth speaker</option>
                                        <option value=5>LED cube speaker</option>
                                        <option value=6>BoomBox speaker</option>
                                        <option value=7>Multiroom Speaker</option>
                                        <option value=8>Subwoofer</option>
                                        <option value=9>Radio</option>
                                        <option value=10>Record Player</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Name: <input type="text" name="Name" <?php if(isset($_GET['ID'])){ ?>value=<?php echo $result['Name']; }?> /></td>
                                </tr>
                                <tr>
                                    <td>Description: <input type="text" name="Description" <?php if(isset($_GET['ID'])){ ?>value=<?php echo $result['Description']; }?> /></td>
                                </tr>
                                <tr>
                                    <td>Brand: <input type="text" name="Brand" <?php if(isset($_GET['ID'])){ ?>value=<?php echo $result['Brand'];} ?> /></td>
                                </tr>
                                <tr>
                                    <td>Supplier Price: <input type="number" name="SupplierPrice" <?php if(isset($_GET['ID'])){ ?>value=<?php echo $result['SupplierCost']; }?> /></td>
                                </tr>
                                <tr>
                                    <td>Online Price: <input type="number" name="OnlinePrice" <?php if(isset($_GET['ID'])){ ?>value=<?php echo $result['OnlinePrice']; }?> /></td>
                                </tr>
                                <tr>
                                    <td>Is Available: <select name="Available" <?php if(isset($_GET['ID'])){ ?> value = <?php echo $result['Available']; }?> >
                                        <option value='Yes' >Yes</option>
                                        <option value='No'>No</option>
                                    </select></td>
                                </tr>
                        </tr>
                        <tr>

                            <td><input type="submit" value=<?php if(isset($_GET['ID'])){ echo "Update"; }else{ echo "ADD";  } ?> ><a href="AvailableProducts.php?"> Cancel </a></td>
                            </form>
                        </tr>
                </table>
                    </table>
    </body>
</html>
