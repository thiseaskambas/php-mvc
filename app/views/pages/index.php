<?php require APPROOT . '/views/inc/header.php' ?>
<h1><?php echo $data['title']; ?></h1>
<?php echo '<pre>';
var_dump($data);
echo '</pre>'; ?>
<?php require APPROOT . '/views/inc/footer.php' ?>