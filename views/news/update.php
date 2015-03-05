<form method="post">
    <label for="date">Дата</label>
    <input type="text" id="date" name="date" value="<?=date("Y-m-d H:i:s");?>">
    <label for="title">Заголовок новости</label>
    <input type="text" id="title" name="title" value="<?=$item->title;?>">
    <label for="content">Содержание</label>
    <textarea id="content" name="content"><?=$item->content;?></textarea>
    <input type=submit value="Сохранить" name="save">
</form>

<p><a href="/">вернуться к списку новостей сайта</a></p>