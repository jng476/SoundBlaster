<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <?php include 'scripts.html'?>
    </head>
    <body>
            <?php include 'navigation.php'; ?>
                </br>
                </br>
                </br>
                </br>
                <div id="bubbleText">
                </br>
                <h1 class="well"><u>Registration Form</u></h1>
                </br>
                </div>
                <p><b> <?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); } ?> </b></p>
                <div id="bubbleTextRegister">
                    <div class="col-lg-12 well">
                        <div class="row">
                            <form method="post" action="Registeruser.php">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First Name Here.." name="FirstName" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter Last Name Here.." name="LastName" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Username</label>
                                            <input type="text" placeholder="Enter Username Here.." name="Username" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Enter Password Here.." name="Password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea placeholder="Enter Address Here.." rows="3" name="Line1" class="form-control" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>Line2</label>
                                            <input type="text" placeholder="Enter Line2 of Address Here.." name="Line2" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>City</label>
                                            <input type="text" placeholder="Enter City Name Here.." name="City" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" placeholder="Enter Country Here.." name="Country" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" placeholder="Enter Email Address Here.." name="Email" class="form-control" required>
                                    </div>
                                    <input type="submit" class="btn btn-lg btn-info" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </body>
</html>
