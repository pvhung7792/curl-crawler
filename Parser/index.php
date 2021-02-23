<?php 
require_once './Parser.php';

$list = ["vietnamnet", "dantri", "vnexpress"];

if ($_POST['url']) {
    // Parser url to get website name
    $url = $_POST['url'];
    $arrayUrl = explode("/", $url);
    $website = explode(".",$arrayUrl[2]);

    //return back if website it not on available list
    if (!in_array($website[0], $list)) {
        header('Location: ' . $_SERVER['HTTP_REFERER'].'?error=notinlist');
    }

    // Call class
    $class = $website[0].'Parser';
    require_once $class.'.php';
    $parser = new $class($url);
    
    //Get data
    $title = $parser->getTittle();
    $date = $parser->getDate();
    $content = $parser->getContent();

    echo $arrayUrl[2];
}

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