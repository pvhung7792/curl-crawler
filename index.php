
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

    <!-- show error -->
    <?php if(isset($_GET['error'])): ?>
        <p style="color:red"><?= $_GET['error']; ?></p>
    <?php endif ?>
    <?php if(isset($_GET['succcess'])): ?>
        <p style="color:green"><?= $_GET['succcess']; ?></p>
    <?php endif ?>
</form>
    
<form action="./Parser/index.php?controller=Content&action=storeContent" method="POST">
    <button type="submit">Save</button>

    <!-- Show link -->
    <?php if(isset($_SESSION['link'])): ?>
        <h4>Link</h4>
        <input type="text" name="link" value="<?= $_SESSION['link'] ?>" hidden>
        <p><?= $_SESSION['link'] ?></p>
    <?php endif ?>

    <!-- Show title -->
    <?php if(isset($_SESSION['title'])): ?>
        <h4>Title</h4>
        <input type="text" name="title" value="<?= $_SESSION['title'] ?>" hidden>
        <p><?= $_SESSION['title'] ?></p>
    <?php endif ?>

    <!-- Show date -->
    <?php if($_SESSION['date']): ?>
        <h4>Date</h4>
        <input type="text" name="date" value="<?= $_SESSION['date'] ?>" hidden>
        <p><?= $_SESSION['date'] ?></p>
    <?php endif ?>

    <!-- Show content -->
    <?php if($_SESSION['content']): ;?>
        <h4>Content</h4>
        
        <textarea name="content" cols="140" rows="70" hidden>
            <?php foreach($_SESSION['content'] as $content): ?>
                <?php echo $content ?>
            <?php endforeach ;?>
        </textarea>
        <div style="width:800px">
        <?php foreach($_SESSION['content'] as $content): ?>
            <?php echo $content."<br><br>"; ?>
        <?php endforeach ;?>
        </div>
    <?php endif ;?>

</form>
</body>
</html>