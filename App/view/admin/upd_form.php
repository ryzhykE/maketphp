<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?echo $title; ?></title>
</head>
<body>
<h2>Обновить новость</h2>
<form action="#" method="post">
    <p>Заголовок</p>
    <input type="text" name="title" placeholder="" value="<?echo $article->title; ?>">
    <p>Текст новости</p>
    <input type="text" name="article" placeholder="" value="<?echo $article->article; ?>">
    <p>ИД автора</p>
    <input type="text" name="idauthor" placeholder="" value="<?echo $article ->author_id; ?>">
    <br><br>
    <input type="submit" name="submit" value="Сохранить">
</form>
</body>
</html>

