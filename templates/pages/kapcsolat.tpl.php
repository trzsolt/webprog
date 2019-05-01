<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include("logicals/db.php");
		$email=$_REQUEST['s_email'];
		$szoveg=$_REQUEST['s_szoveg'];
		$sql = "INSERT INTO emails (email, szoveg) VALUES ('$email', '$szoveg')";
		if ($conn->query($sql) === TRUE) {
			?><!DOCTYPE html>
				<html>
				<head>
				</head>
				<body>
					Feladó:<b><?php echo $email;?> </b><br><br>
					Üzenet:<br>
				<?php echo $szoveg;?> <br><br><br>			
				</body>
				</html>
			<?php
		} else {
			echo "Hiba: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	} 

?>

<div id="Email">
			<form id="email_form" action="" onsubmit="return validateEmailForm()" method="post" enctype="multipart/form-data">	
				Az Ön email címe:<br>
				<input type="text" name="s_email" id="emailcim" value="" />
<br><br>
			Üzenete:<br>
			<textarea name="s_szoveg" id="szoveg" form="email_form"></textarea>	<br><br>
            				<input type="submit" value="Küldés" name="submit">
            			</form>			
		</div>
