<?php
// require_once'../controllers/dbConn.php';
// session_start();
if(isset($_SESSION['username']) && isset($_SESSION['name'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
</body>
</html>
<?php
}else {
    echo 'ddddddddd';
    exit();
}
?>