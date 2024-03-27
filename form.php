<form action="upload.php" method="post" enctype="multipart/form-data">

    <!-- Виберіть файл для завантаження: -->
    <label for="fileToUpload">Виберіть файл для завантаження:<br>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </label>
    <br>
    <label for="newFileName">Введіть нове ім'я файлу (необов'язково):<br>
        <input type="text" name="newFileName" id="newFileName">
    </label>
    <!-- Кнопка для завантаження файлу -->
    <input type="submit" value="Завантажити файл" name="submit">

</form>
