<?php
    include('../core/Inc.php');
    
    $sCartaName = rand(10000, 990000). '_'. time().'.png';
    $filePath = '../../public/assets/imgGame/'. $sCartaName;
    
    if (move_uploaded_file( $_FILES["carta_nova"]["tmp_name"], $filePath)) {
        $sql = "INSERT INTO carta (carta_img) VALUES ('" . $sCartaName . "')";
        $oCon = new Database();
        $oCon->executeQuery($sql);
    } else {
        $msg = errorMessage( "Problem in uploading file");
    }
    echo "<script>window.location.href = '" . '../../RegisterCard' . "' </script>";
    die();
?>