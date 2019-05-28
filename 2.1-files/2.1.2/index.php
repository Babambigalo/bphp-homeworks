<?php 
    $uploads_dir = './uploads';
    if(($_FILES['userfile']['type'] == 'image/png' || $_FILES['userfile']['type'] == 'image/jpeg') && $_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['userfile']['tmp_name'];
        if(is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($_FILES['userfile']['name']);
            if($pathParts['extension'] != 'php') {
                move_uploaded_file(
                    $tmpName,
                    $uploads_dir.'/'.$pathParts['basename']
                );
            }
        }
    }

    $images = scandir($uploads_dir);
    $newArrayImages = array_slice(scandir($uploads_dir),2);
    for($i=0;$i<count($newArrayImages);$i++) {
        echo "<div style='text-align:center;margin:10px'><img style='width:300px;height:200px' src='https://netologylessonsphp.000webhostapp.com/2.1-files/2.1.2/uploads/$newArrayImages[$i]'></div>";
        
    }

?>
