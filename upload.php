<?php
    $folderName1 = 'uploads/docs';
    $folderName2 = 'uploads/images';

    if (!is_dir($folderName1)) {
        if (mkdir($folderName1,0777, true)) {

        }
    }
    if (!is_dir($folderName2)) {
        if (mkdir($folderName2,0777, true)) {

        }
    }
// 1. Перевірити, чи була натиснута кнопка "submit" на формі
    if(!isset($_POST["submit"])){
        header("Location: index.php");
    }
    $new_name = isset($_POST['newFileName']) ? $_POST['newFileName'] : null;
    if ($new_name==False){
    // 2. Отримаємо ім'я файлу, який користувач вибрав для завантаження
    $currentdata = date('Y-m-d_H-i-s');
    $fileName = $_FILES["fileToUpload"]["name"];
    $fileInfo = pathinfo($fileName);
    $name = $fileInfo['filename'];
    $extension = $fileInfo['extension'];
    $fileName = $name.'_'.$currentdata.'.'.$extension;
    $fileSize = $_FILES["fileToUpload"]["size"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));}
    else {
        $currentdata = date('Y-m-d_H-i-s');
        $fileName = $_FILES["fileToUpload"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileName = $new_name.'_'.$currentdata.'.'.$fileExtension;
        $fileSize = $_FILES["fileToUpload"]["size"];
    }

    $fileExtensions = ['xls', 'xlsx', 'ppt', 'pptx',
       'txt', 'doc', 'docx', 'pdf',  'jpg', 'jpeg', 'png', 'gif'];

    // 3. Перевірити, чи файл вже існує в папці "uploads"
    if(file_exists("uploads/" . $fileName)){
        echo "Файл з ім'ям $fileName вже існує.";
    }
    // 4. Перевірити чи це текстовий файл
    elseif(!in_array($fileExtension, $fileExtensions)){
        echo "Цей тип файлу не підтримується.";
    }
    // 5. Перевірити розмір файлу
    elseif($fileSize > 10000000){
        echo "Файл занадто великий. Максимальний розмір файлу - 10MB.";
    }
    elseif($fileExtension=='txt'||  $fileExtension=='doc'|| $fileExtension=='docx'
        || $fileExtension=='pdf'){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/docs/" . $fileName);
    }
    elseif($fileExtension=='jpg'||  $fileExtension=='jpeg'|| $fileExtension=='png'
        || $fileExtension=='gif'){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/images/" . $fileName);
    }
    // Все ОК, завантажуємо файл
    else{
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $fileName);
        echo "Файл $fileName успішно завантажено.";
    }

    $baseDirectory = 'uploads';
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($baseDirectory),
        RecursiveIteratorIterator::SELF_FIRST
    );


    echo "All the files are:<br>";
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            echo $file->getPathname() . "<br>";
        }
    }

?>
    <p>
        <a href="index.php">Go home</a>
    </p>

