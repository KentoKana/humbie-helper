<?php
require_once MODELS . '/upload_db.php';
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//With help from the video linked above

$db = Database::getDatabase();
$f = new File();

$id = filter_input(INPUT_GET, 'id');
$file_title = filter_input(INPUT_POST, 'file_name');
$file_path = filter_input(INPUT_POST, 'file_path');

if (isset($_FILES['upload-file'])){
    //Define List of Acceptable Extentions
    
    $extensions = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'pptx', 'doc', 'txt', 'sql', 'zip');

    //Isolate Extenstion of Uploaded File
    $file_ext = explode('.',$_FILES['upload-file']['name']);
    $file_extension = end($file_ext);

    //Check If Isolated Extension Matches List of Accepted Extentions
    //And Move To Uploaded File
    if(!in_array($file_extension, $extensions)){
        echo 'Invalid file extention. Accepted: jpg, jpeg, gif, png, doc, docx, pptx, ppt, txt, sql, pdf and zip';
    } else {
        echo 'file uploaded';
        move_uploaded_file ($_FILES['upload-file']['tmp_name'], 'uploaded/'.$_FILES['upload-file']['name']);
        $count = $f->addFile($file_title, $file_path, $_SESSION['project_id'], $db);
    }
}
//Listing Uploaded Files
$path = './uploaded';
$files = scandir($path);