<?php
const IMAGE_HANDLERS = [
    IMAGETYPE_JPEG => [
        'load' => 'imagecreatefromjpeg',
        'save' => 'imagejpeg',
        'quality' => 100
    ],
    IMAGETYPE_PNG => [
        'load' => 'imagecreatefrompng',
        'save' => 'imagepng',
        'quality' => 0
    ],
    IMAGETYPE_GIF => [
        'load' => 'imagecreatefromgif',
        'save' => 'imagegif'
    ]
];

function createThumbnail($src, $dest, $targetWidth, $targetHeight = null) {
    $type = exif_imagetype($src);

    if (!$type || !IMAGE_HANDLERS[$type]) {
        return null;
    }

    $image = call_user_func(IMAGE_HANDLERS[$type]['load'], $src);

    if (!$image) {
        return null;
    }
    $width = imagesx($image);
    $height = imagesy($image);

    if ($targetHeight == null) {

        $ratio = $width / $height;
        if ($width > $height) {
            $targetHeight = floor($targetWidth / $ratio);
        }

        else {
            $targetHeight = $targetWidth;
            $targetWidth = floor($targetWidth * $ratio);
        }
    }

    $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

    if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {

        imagecolortransparent(
            $thumbnail,
            imagecolorallocate($thumbnail, 0, 0, 0)
        );

        if ($type == IMAGETYPE_PNG) {
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
        }
    }

    imagecopyresampled(
        $thumbnail,
        $image,
        0, 0, 0, 0,
        $targetWidth, $targetHeight,
        $width, $height
    );

    return call_user_func(
        IMAGE_HANDLERS[$type]['save'],
        $thumbnail,
        $dest,
        IMAGE_HANDLERS[$type]['quality']
    );
}


$target_dir = "images/galeria/";
$target_index = "images/galeria/stamppic/" . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Error: A fájl nem elérhető! ";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Error: A fájl mérete túl nagy! ";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Error: Csak jpg, png, jpeg kiterjesztésű képek engedélyezettek! ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sikertelen képfeltöltés!";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo $target_file;
		echo basename($_FILES["fileToUpload"]["name"]);
		createThumbnail($target_file, $target_index, 150, 112);
        echo "A fájl ". basename( $_FILES["fileToUpload"]["name"]). " feltöltve! ";		
    }
	else 
	{
        echo "Sikertelen képfeltöltés! ";
    }
}
?>
