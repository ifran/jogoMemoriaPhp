<?php
    include('../core/Inc.php');

    print_r($_FILES);

    // Generate a unique name for the image 
    // to prevent overwriting the existing image
    $filePath = '../../public/assets/imgGame/'. rand(10000, 990000). '_'. time().'.png';
    if (move_uploaded_file( $_FILES["carta_nova"]["tmp_name"], $filePath)) {
        $sql = "INSERT INTO carta VALUES (nova_carta)";

        echo $sql;
    } else {
        $msg = errorMessage( "Problem in uploading file");
    }
?>