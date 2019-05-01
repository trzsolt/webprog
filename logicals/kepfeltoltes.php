<?php
$target_dir = "images/galeria/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Nem képfájl!";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Már létezik ilyen nevű fájl a galériában. ";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "A képet sajnos nem sikerült feltölteni.<br /><br />";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "A(z) ". basename( $_FILES["fileToUpload"]["name"]). " kép sikeresen feltöltésre került.<br /><br />";
    } else {
        echo "Hiba történt a kép feltöltése során.<br /><br />";
    }
}
?>