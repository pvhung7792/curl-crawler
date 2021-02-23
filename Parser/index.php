<?php 
// require_once './Models/BaseModel/Parser.php';

require_once './route.php';


if(!$_POST['url'] || !$_GET['action']){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$route = new route($_GET['controller'], $_GET['action']);
$route->excecute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parser</title>
</head>
<body>
    <a href="../">Return</a>
    <!-- Show title -->
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
</body>
</html>