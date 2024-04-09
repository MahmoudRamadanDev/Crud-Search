<?php include('inc/header.php'); ?>
<?php require dirname(__DIR__) . "../crud-design-master/inc/validation.php"; ?>

<?php
if (isset($_POST['submit'])) {

    $name = santizeInput($_POST['name']);

    $email = santizeEmail($_POST['email']);

    // $password = santizeInput($_POST['password']);

    if (requireInput($name) && requireInput($email)) {

        if (minInput($name, 3)) {

            if (validEmail($email)) {
                $id = $_POST['id'];
                if ($password) {

                    $password = santizeInput($_POST['password']);

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "UPDATE `users` SET `user_name` = '$name' , `user_email` = '$email' ,`user_password` = '$password' 
                    WHERE `user_id` = '$id' ";
                }else {
                    $sql = "UPDATE `users` SET `user_name` = '$name' , `user_email` = '$email' 
                    WHERE `user_id` = '$id' ";
                }

                $result = mysqli_query($conn, $sql);

                if ($result) {

                    $success = "data added successfully";
                    header("refresh:3;url='index.php'");
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

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>

<?php if (!empty($error)) : ?>
    <h4 class="alert alert-danger text-center" role="alert">
        <?php echo $error; ?>
    </h4>
    <a href="javascript:history.go(-1)" class="btn btn-info"><< Go Back</a>
    <?php endif; ?>
<?php if (!empty($success)) : ?>
    <h4 class="alert alert-success text-center" role="alert">
        <?php echo $success; ?>
    </h4>
<?php endif; ?>

<?php include('inc/footer.php'); ?>