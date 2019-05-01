<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include("logicals/kepfeltoltes.php"); 
	}
	
	include_once('images/galeria/resources/UberGallery.php');
	$gallery = UberGallery::init()->createGallery('images/galeria');
?>

    <script type="text/javascript">
    $(document).ready(function(){
        $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
    });
    </script>
        
        <div>
			<form action="" method="post" enctype="multipart/form-data">
				<h3>Képfeltöltés</h3><p>Fájl kiválasztása:
				<input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
				<input type="submit" value="Feltöltés" name="submit"></p>
			</form>
		</div>