<?php
//Found help in these sources
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//https://stackoverflow.com/questions/19041755/how-to-delete-a-file-from-upload-folder
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/upload_db.php';

$db = Database::getDatabase();
$f = new File();
//Returns file by id
$fileById = $f->getFileById(filter_input(INPUT_GET, 'id'), Database::getDatabase());

$id = filter_input(INPUT_GET, 'id');

if (isset($_FILES['uploadFile'])){

    $fileName = filter_input(INPUT_POST, 'fileName');
    $filePath = $_FILES['uploadFile']['name']; 
    
    //Define List of Acceptable Extentions
    $extensions = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'pptx', 'doc', 'txt', 'sql', 'zip');

    //Isolate Extenstion of Uploaded File
    $fileExt = explode('.',$_FILES['uploadFile']['name']);
    $fileExtension = end($fileExt);

    //Check If Isolated Extension Matches List of Accepted Extentions
    //And Move To Uploaded File
    if(!in_array($fileExtension, $extensions)){
        echo 'Invalid file extention. Accepted: jpg, jpeg, gif, png, doc, docx, pptx, ppt, txt, sql, pdf and zip';
    } else {
        echo 'file uploaded';
        move_uploaded_file ($_FILES['uploadFile']['tmp_name'], 'uploaded/'.$_FILES['uploadFile']['name']);
        $count = $f->addFile($fileName, $filePath, $_SESSION['project_id'], $db);
        if($count){
            header('Location: list-files.php');
        } else {
            echo "Problem uploading file.";
        }
    }
}

if (isset($_POST['deleteFile'])) {
    //File name as uploaded
    $filePath = $fileById->file_path;
    //Path to uploaded folder
    $folderPath = realpath('uploaded/');
    //Adding above for full path
    $fullPath = $folderPath . "\\" . $filePath;
    //Delete file from server
    unlink($fullPath);
    //Remove entry from Database
    $count = $f->deleteFile($id, $db);
    //Check if file deleted
    if (!unlink($toDelete)) {
        header('Location: list-files.php');
    } else {
        echo "Problem deleting file.";
    }
}

//Download file
if (isset($_POST['downloadFile'])) {
    $filePath = $fileById->file_path;
    $folderPath = realpath('uploaded/');
    $fullPath = $folderPath . "\\" . $filePath;
    if(!file_exists($folderPath)){ // file does not exist
        die('file not found');
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