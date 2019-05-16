<?php
// help from the following sources:
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//https://stackoverflow.com/questions/19041755/how-to-delete-a-file-from-upload-folder
//https://stackoverflow.com/questions/12094080/download-files-from-server-php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/upload_db.php';

// connect and construct
$db = Database::getDatabase();
$f = new File();

// returns file by id
$fileById = $f->getFileById(filter_input(INPUT_GET, 'id'), Database::getDatabase());
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (isset($_FILES['uploadFile'])){
    // get user entered upload name
    $fileName = filter_input(INPUT_POST, 'fileName', FILTER_SANITIZE_STRING);
    // get name of file with extension
    $filePath = $_FILES['uploadFile']['name'];
    // list of accepted file extensions
    $extensions = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'pptx', 'doc', 'txt', 'sql', 'zip');
    // isolate extention of upload file
    $fileExt = explode('.',$_FILES['uploadFile']['name']);
    $fileExtension = end($fileExt);
    // check if extention matches something in array then move to uploaded folder
    if(!in_array($fileExtension, $extensions)){
        echo 'Invalid file extension. Accepted: jpg, jpeg, gif, png, doc, docx, pptx, ppt, txt, sql, pdf and zip';
    } else {
        move_uploaded_file ($_FILES['uploadFile']['tmp_name'], 'uploaded/'.$_FILES['uploadFile']['name']);
        $count = $f->addFile($fileName, $filePath, $_SESSION['project_id'], $db);
        if($count){
            header('Location: list-files.php');
        } else {
            echo "Problem uploading file.";
        }
    }
}
// deleting file
if (isset($_POST['deleteFile'])) {
    // file name as uploaded
    $filePath = $fileById->file_path;
    // path to uploaded folder
    $folderPath = realpath('uploaded/');
    // adding above for full path
    $fullPath = $folderPath . "/" . $filePath;

    // delete file from server

    // check if file deleted
    if (unlink($fullPath)) {
        header('Location: list-files.php');
    } else {
        echo "Problem deleting file.";
    }
    // remove entry from Database
    $count = $f->deleteFile($id, $db);
}
// downloading file
if (isset($_POST['downloadFile'])) {
    $filePath = $fileById->file_path;
    $folderPath = realpath('uploaded/');
    $fullPath = $folderPath . "/" . $filePath;
    // check if file exits
    if(!file_exists($folderPath)){
        echo "Problem finding file.";
    } else {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filePath");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        // read the file from disk
        readfile($filePath);
    }
}
// pagination logic
//$totalFiles =
