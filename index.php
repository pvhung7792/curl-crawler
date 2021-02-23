
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
    <button>Get content</button>

    <!-- show error -->
    <?php if(isset($_GET['error'])): ?>
        <p style="color:red"><?= $_GET['error']; ?></p>
    <?php endif ?>
    
    <!-- Show link -->
    <?php if(isset($_SESSION['link'])): ?>
        <h4>Link</h4>
        <p><?= $_SESSION['link'] ?></p>
    <?php endif ?>

    <!-- Show title -->
    <?php if(isset($_SESSION['title'])): ?>
        <h4>Title</h4>
        <p><?= $_SESSION['title'] ?></p>
    <?php endif ?>

    <!-- Show date -->
    <?php if($_SESSION['date']): ?>
        <h4>Date</h4>
        <p><?= $_SESSION['date'] ?></p>
    <?php endif ?>

    <!-- Show content -->
    <?php if($_SESSION['content']): ;?>
        <h4>Content</h4>
        <?php foreach($_SESSION['content'] as $content): ?>
        <p><?= $content ?></p>
        <?php endforeach ;?>
    <?php endif ;?>
</form>
</body>
</html>