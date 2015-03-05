<?php foreach ($items as $item): ?>
    <a href="?act=One&id=<?php echo $item->id;?>"><?php echo $item->title; ?></a> | [<a href="?ctrl=Admi&act=Update&id=<?php echo $item->id;?>">редактировать</a>] - [<a href="?ctrl=Admin&act=Del&id=<?php echo $item->id;?>">удалить</a>]<br />
<?php endforeach; ?>

<p><a href="?ctrl=Admin&act=Add">Добавить новость</a></p>