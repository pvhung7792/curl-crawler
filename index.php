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
    <?php if(isset($_GET['error'])): ?>
        <p style="color:red"><?= $_GET['error']; ?></p>
    <?php endif ?>
    <?php if(isset($title)): ?>
        <h4>Title</h4>
        <p><?= $title ?></p>
    <?php endif ?>
    <!-- Show date -->
    <?php if(isset($date)): ?>
        <h4>Date</h4>
        <p><?= $date ?></p>
    <?php endif ?>
    <!-- Show content -->
    <?php if(isset($content)): ;?>
        <h4>Content</h4>
        <?php foreach($content as $contentDetail): ?>
        <p><?= $contentDetail ?></p>
        <?php endforeach ;?>
    <?php endif ;?>
</form>
</body>
</html>