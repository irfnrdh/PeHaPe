<?php
$response = array();
$image = $_FILES['file'];

$imageName = $image['name'];
$imageTmpName = $image['tmp_name'];
$imageSize = $image['size'];
$imageError = $image['error'];
$imageType = $image['type'];

$fileExt = explode('.', $imageName);
$fileActualExt = strtolower(end($fileExt));

//$allowed = array('jpg', 'jpeg', 'png');
$allowed = array('jpg', 'jpeg', 'png', 'exe','txt','pdf');
if(in_array($fileActualExt, $allowed)){
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = 'images/'.$fileNameNew;
    $newDestination = move_uploaded_file($imageTmpName, $fileDestination);
    $response['error'] = false;
    $response['message'] = "Upload Image Successful";
}else{
    $response['error'] = true;
    $response['message'] = "You cannot upload files of this type!";
}
echo json_encode($response);
