<?php
header('content-type:text/html; charset=utf-8');
$upload_dir = './upload/';

foreach( $_FILES['FilePath']['error'] as $key => $err) {
    if( $err == UPLOAD_ERR_OK) {
        move_uploaded_file( $_FILES['FilePath']['tmp_name'][$key], 
        $upload_dir . $_FILES['FilePath']['name'][$key]);
        echo $_FILES['FilePath']['name'][$key] . ' successfully uploaded.<br/>';
    }else if($err == UPLOAD_ERR_NO_FILE){
        echo 'Please select a file.<br/>';
    }else{
        echo 'Failed to upload...<br/>';
    }
}

?>
