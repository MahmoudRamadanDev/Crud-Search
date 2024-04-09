<?php include('inc/header.php'); ?>

<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ./index.php");
}
$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE `user_id` = '$id' ";
mysqli_query($conn, $sql);

?>
<h1 class="text-center col-12 bg-danger py-3 text-white my-2">Delete User</h1>
<?php header("refresh:3;url='index.php'");?>


<?php include('inc/footer.php'); ?>