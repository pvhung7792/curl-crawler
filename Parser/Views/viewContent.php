
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get content</title>
</head>
<body>


<form action="./index.php?controller=Content&action=storeContent" method="POST">
    <button type="submit">Save</button>
    <button type="button"><a href="../">Return</a></button>
    <!-- Show link -->
    <?php if(isset($data['link'])): ?>
        <h4>Link</h4>
        <input type="text" name="link" value="<?= $data['link'] ?>" hidden>
        <p><?= $data['link'] ?></p>
    <?php endif ?>

    <!-- Show title -->
    <?php if(isset($data['title'])): ?>
        <h4>Title</h4>
        <input type="text" name="title" value="<?= $data['title'] ?>" hidden>
        <p><?= $data['title'] ?></p>
    <?php endif ?>

    <!-- Show date -->
    <?php if($data['date']): ?>
        <h4>Date</h4>
        <input type="text" name="date" value="<?= $data['date'] ?>" hidden>
        <p><?= $data['date'] ?></p>
    <?php endif ?>

    <!-- Show content -->
    <?php if($data['content']): ;?>
        <h4>Content</h4>
        
        <textarea name="content" cols="140" rows="70" hidden>
            <?php foreach($data['content'] as $content): ?>
                <?php echo $content ?>
            <?php endforeach ;?>
        </textarea>
        <div style="width:800px">
        <?php foreach($data['content'] as $content): ?>
            <?php echo $content."<br><br>"; ?>
        <?php endforeach ;?>
        </div>
    <?php endif ;?>

</form>
</body>
</html>