
<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get content</title>
</head>
<body>
<form method="POST" action="./Parser/index.php?controller=Parser&action=parserData">
    <label for="">Available website : VnExpress, VietNamNet, DanTri</label>
    <input type="text" name="url">
    <button>Get content</button><br>
</form>
</body>
</html>