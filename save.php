<?php
// Получаем данные комментария из формы
$commentName = $_POST['commentName'];
$commentBody = $_POST['commentBody'];

// Создаем строку с комментарием
$comment = $commentName . ' - ' . $commentBody . PHP_EOL;

// Открываем файл в режиме добавления данных
$file = fopen('comments.txt', 'a');

// Записываем комментарий в файл
fwrite($file, $comment);

// Закрываем файл
fclose($file);

// Возвращаемся на предыдущую страницу
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
