<?php foreach ($items as $item): ?>
    <a href="?act=One&id=<?php echo $item->id;?>"><?php echo $item->title; ?></a><br />
<?php endforeach; ?>

<p><a href="?ctrl=Admin&act=Add">Добавить новость</a></p>