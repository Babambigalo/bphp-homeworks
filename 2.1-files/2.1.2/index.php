<?php 
    // $uploads_dir = './uploads';
    // if(($_FILES['userfile']['type'] == 'image/png' || $_FILES['userfile']['type'] == 'image/jpeg') && $_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
    //     $tmpName = $_FILES['userfile']['tmp_name'];
    //     if(is_uploaded_file($tmpName)) {
    //         $pathParts = pathinfo($_FILES['userfile']['name']);
    //         if($pathParts['extension'] != 'php') {
    //             move_uploaded_file(
    //                 $tmpName,
    //                 $uploads_dir.'/'.$pathParts['basename']
    //             );
    //         }
    //     }
    // }

    // $images = scandir($uploads_dir);
    // $newArrayImages = array_slice(scandir($uploads_dir),2);
    // for($i=0;$i<count($newArrayImages);$i++) {
    //     echo "<div style='text-align:center;margin:10px'><img style='width:300px;height:200px' src='https://netologylessonsphp.000webhostapp.com/2.1-files/2.1.2/uploads/$newArrayImages[$i]'></div>";
        
    // }

    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
    $directory = preg_replace('/\/[a-z0-9-_\.]+\.php$/i', '/', $_SERVER['REQUEST_URI']);
    define('TASK_DOMAIN', $protocol . $_SERVER['SERVER_NAME'] . $directory . 'uploads');
    define('TASK_PATH', __DIR__ . '/uploads/');

    if (($_FILES['userfile']['type'] == 'image/png' || $_FILES['userfile']['type'] == 'image/jpeg') && $_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['userfile']['tmp_name'];
        if (is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($_FILES['userfile']['name']);
            if ($pathParts['extension'] != 'php') {
                move_uploaded_file(
                    $tmpName,
                    TASK_PATH . '/' . $pathParts['basename']
                );
            }
        }
    }

    $images = scandir(TASK_PATH);
    $newArrayImages = array_slice(scandir(TASK_PATH), 2);
    for ($i = 0; $i < count($newArrayImages); $i++) {
        echo '<div style="text-align:center;margin:10px"><img style="width:300px;height:200px" src="' . TASK_DOMAIN . "/$newArrayImages[$i]\"></div>";
    }

?>
