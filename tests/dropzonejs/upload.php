<!-- https://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php -->

<?php

$uploadDir = 'uploads';

if (!empty($_FILES))
    {
    $tmpFile = $_FILES['file']['tmp_name'];
    $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
    move_uploaded_file($tmpFile,$filename);
    }

echo "plop";

?>

