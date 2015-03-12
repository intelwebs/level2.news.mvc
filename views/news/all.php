<?php foreach ($items as $item): ?>
    <a href="news/one?id=<?php echo $item->id;?>"><?php echo $item->title; ?></a> | [<a href="admin/update?id=<?php echo $item->id;?>">редактировать</a>] - [<a href="admin/del?id=<?php echo $item->id;?>">удалить</a>]<br />
<?php endforeach; ?>

<p><a href="admin/add">Добавить новость</a></p>