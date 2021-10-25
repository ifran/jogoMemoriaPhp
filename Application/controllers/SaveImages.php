<?php
    include('../core/Inc.php');

    print_r($_FILES);

    // Generate a unique name for the image 
    // to prevent overwriting the existing image
    $sCartaName = rand(10000, 990000). '_'. time().'.png';
    $filePath = '../../public/assets/imgGame/'. $sCartaName;
    if (move_uploaded_file( $_FILES["carta_nova"]["tmp_name"], $filePath)) {
        $sql = "INSERT INTO carta (carta_img) VALUES ('" . $sCartaName . "')";
        $oCon = new Database();
        echo $sql;
        $oCon->executeQuery($sql);
    } else {
        $msg = errorMessage( "Problem in uploading file");
    }

    header('location:../../RegisterCard');
    die();
?>