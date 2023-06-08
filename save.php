<?php
// Путь к JSON-файлу
$jsonFile = 'files.json';

// Функция для сохранения файла в JSON-файл
function saveFile($filename, $title, $description, $file_path) {
    // Получаем текущий список файлов из JSON-файла
    $files = getFilesFromJson();

    // Создаем новую запись файла
    $newFile = [
        'filename' => $filename,
        'title' => $title,
        'description' => $description,
        'file_path' => $file_path
    ];

    // Добавляем новую запись в список файлов
    $files[] = $newFile;

    // Сохраняем обновленный список файлов в JSON-файле
    saveFilesToJson($files);
}

// Функция для получения списка файлов из JSON-файла
function getFilesFromJson() {
    global $jsonFile;

    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        $files = json_decode($jsonContent, true);
        if ($files === null) {
            $files = []; // Если JSON-файл пустой или содержит некорректные данные, создаем пустой список
        }
    } else {
        $files = []; // Если JSON-файл не существует, создаем пустой список
    }

    return $files;
}

// Функция для сохранения списка файлов в JSON-файле
function saveFilesToJson($files) {
    global $jsonFile;

    $jsonContent = json_encode($files, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $jsonContent);
}

// Пример использования
$filename = 'file1.txt';
$title = 'My File 1';
$description = 'This is my first file';
$file_path = 'path/to/file1.txt';

// Сохраняем файл в JSON-файле
saveFile($filename, $title, $description, $file_path);
?>
