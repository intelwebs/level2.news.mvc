<?php foreach ($items as $item): ?>
    <a href="?dir=news&view=one&ctrl=News&act=One&id=<?php echo $item->id;?>"><?php echo $item->title; ?></a><br />
<?php endforeach; ?>

<p><a href="?dir=news&view=add">Добавить новость</a></p>