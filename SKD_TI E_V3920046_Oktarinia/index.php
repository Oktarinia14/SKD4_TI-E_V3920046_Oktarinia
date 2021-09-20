<?php

// Membuat inisialisasi pada variable yg akan digunakan
$key = "";
$text = "";
$error = "";


// deklarasikan enkripsi dan deskripsi
require_once('vigenere.php');

$key = $_POST['key'];
$text = $_POST['text'];


if (isset($_POST['encrypt'])) { //jika klik tombol enkripsi
	$text = encrypt($key, $text);
	$error = "Text berhasil di enkripsi!";
}


if (isset($_POST['decrypt'])) { //jika klik tombol dekripsi
	$text = decrypt($key, $text);
	$error = "Text berhasil di dekripsi!";
}

?>

<html>

<head>
	<title>SKD4</title>
	<!-- ===================== FORM INPUTAN ===================== -->
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<main role="main" class="container " >
<form action="index.php" method="post">	

	<body>
		<br><br><br><br><br>
		<h2 style="text-align: center;">Sistem Keamanan Data</h2>
		<h2 style="text-align: center;">Vigenere Cipher</h2>
	
			<div class="form-group">
				<label for="Kunci">Key</label>
				<input type="text" class="form-control" name="key" id="kunci" aria-describedby="inputKunci" placeholder="Masukkan Kunci" value="<?php echo $key; ?>">
			</div>
			<div class="form-group">
				<label for="Plaintext">Plaintext</label>
				<textarea class="form-control" name="text" id="text" rows="5"><?php echo $text; ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="encrypt" value="Encrypt">Enkripsi</button>
			<button type="submit" class="btn btn-warning" name="decrypt" value="Decrypt">Deskripsi</button>
		</form>
		</div>

		<strong><?php echo $error; ?></strong>
		</div>
		</div>
		</div>
		</div>
</main>
<!-- ===================== END FORM INPUTAN  ===================== -->

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>