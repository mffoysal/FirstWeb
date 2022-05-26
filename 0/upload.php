<?php
    if(isset($_FILES['upload']['name'])){
        $file=$_FILES['upload']['tmp_name'];
        $file_name=$_FILES['upload']['name'];
        $file_name_array = explode(".", $file_name);
        $extention = end($file_name_array);
        $new_image_name = rand() . '.' . $extention;
        chmod('upload', 0777);
        $allowed_extention = array("jpg","gif","png");
        if(in_array($extention, $allowed_extention)){
            move_uploaded_file($file, 'image/' . $new_image_name);
            $function_number = $_GET['CKEditorFuncNum'];
            $url = 'image/' . $new_image_name;
            $message ='';
            echo $url;
            // echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$message')</script>";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }
?>