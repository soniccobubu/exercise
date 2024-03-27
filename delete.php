<?php
include 'upload.php';
if(isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    $folder1 = 'uploads/docs';
    $folder2 = 'uploads/images';
    $folder3 = 'uploads';
    $true = 0;
    if ($true == 0){
    $filePath = $folder1 . '/' . $filename;
        if(file_exists($filePath)) {
            $true+=1;
        }
}
    if ($true == 0){
        $filePath = $folder2 . '/' . $filename;
        if(file_exists($filePath)) {
            $true+=1;
        }
    }
    if ($true == 0){
        $filePath = $folder3 . '/' . $filename;
        if(file_exists($filePath)) {
            $true+=1;
        }
    }
    unlink($filePath);


}
?>