<?php include('inc/header.php'); ?>
<?php require dirname(__DIR__) . "../crud-design-master/inc/validation.php"; ?>

<?php
if (isset($_POST['submit'])) {

    $name = santizeInput($_POST['name']);
    $email = santizeEmail($_POST['email']);
    $password = santizeInput($_POST['password']);
    if (requireInput($name) && requireInput($email) && requireInput($password)) {
        if (minInput($name, 3) && maxInput($password, 20)) {
            if (validEmail($email)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_name` , `user_email` , `user_password`) 
                VALUES ('$name','$email','$hashed_password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $success = "data added successfully";
                    header("refresh:3;url= ./index.php");
                }
            } else {
                $error = "Please Type  Valid Email";
            }
        } else {
            $error = "Please Type Name Greater Than 3 Characters / Password Less Than 20 Characters";
        }
    } else {
        $error = "please fill All fields";
    }
}

?>
<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<?php if (!empty($error)) : ?>
    <h4 class="alert alert-danger text-center" role="alert">
        <?php echo $error; ?>
    </h4>
<?php endif; ?>
<?php if (!empty($success)) : ?>
    <h4 class="alert alert-success text-center" role="alert">
        <?php echo $success; ?>
    </h4>
<?php endif; ?>
<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<?php include('inc/footer.php'); ?>