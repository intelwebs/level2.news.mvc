<?php
switch ($code) {
    case 404:
        header("HTTP/1.0 404 Not Found");
        break;
    case 403:
        header('HTTP/1.0 403 Forbidden');
        break;
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<h1>Ошибка</h1>
<?php
    echo $message.'<br>';
    echo 'Код ошибки: '.$code;
?>

</body>
</html>
