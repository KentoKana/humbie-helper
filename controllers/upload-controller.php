<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/upload_db.php';
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//With help from the video linked above
$db = Database::getDatabase();
$f = new File();

$id = filter_input(INPUT_GET, 'id');

if (isset($_FILES['uploadFile'])){

    $fileName = filter_input(INPUT_POST, 'fileName');
    $filePath = $_FILES['uploadFile']['name']; 
    
    //Define List of Acceptable Extentions
    $extensions = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'pptx', 'doc', 'txt', 'sql', 'zip');

    //Isolate Extenstion of Uploaded File
    $file_ext = explode('.',$_FILES['uploadFile']['name']);
    $file_extension = end($file_ext);

    //Check If Isolated Extension Matches List of Accepted Extentions
    //And Move To Uploaded File
    if(!in_array($file_extension, $extensions)){
        echo 'Invalid file extention. Accepted: jpg, jpeg, gif, png, doc, docx, pptx, ppt, txt, sql, pdf and zip';
    } else {
        echo 'file uploaded';
        move_uploaded_file ($_FILES['uploadFile']['tmp_name'], 'uploaded/'.$_FILES['uploadFile']['name']);
        $count = $f->addFile($fileName, $filePath, $_SESSION['project_id'], $db);
    }
}

if (isset($_POST['deleteFile'])){
    $count = $f->deleteFile($id, $db);
    if($count){
        header('Location: list-files.php');
    } else {
        echo "There was a problem deleting quote.";
    }
}