<?php

// membuat fungsi enkripsi
function encrypt($key, $text)
{
	
	// inisialisasi variable
	$ki = 0;
	$kl = strlen($key);
	$length = strlen($text);
	
	//looping setiap alphabet
	for ($i = 0; $i < $length; $i++)
	{
		// jika text merupakan alphabet
		if (ctype_alpha($text[$i]))
		{
			// jika text merupakan huruf kapital (semua)
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($text[$i]) - ord("A") + ord($key[$ki]) - ord("A")) % 26) + ord("A"));
				//teks indeks i dimulai dari 0
				//method 'chr'--> untuk membalikkan nilai ASCII dan mencari nilai karakter dari ASCII tsb
				//'ord' --> merubah sebuah karakter menjadi nilai dari ASCII
				//pada parameter ord memiliki variable text dengan indeks ke i
				//misal nilai B - memiliki nilai ASCII dari A = 66-65 = 1
				// lalu dilakukan penambahan dengan kunci karakter indeks ke ki 
				//ki disini berinilai 0 dan 0 = K (nilai ASCII K = 75)
				//lalu K-A = 75-65 = 10
				// terakhir Ciperteks = (plainteks + key) mod 26 + niali ASCII 26 
				// 					  =  1 + 10 + 65 = 76 (huruf L)

			}
			// jika text merupakan huruf kecil (semua)
			else
			{
				$text[$i] = chr(((ord($text[$i]) - ord("a") + ord($key[$ki]) - ord("a")) % 26) + ord("a"));
				//konsep sama
			}
			
			//perulangan kunci
			// ketika kunci lebih dari sama dengan kl (jml string dari ki)
			// apabila sdh mencapai angka 2 akan kembali lagi ke 0
			// misalnya key madiun 
			// 'M' 'A' 'D' 'I' 'U' 'N'
			//jadi apabila sudah sampai akhir 'N' akan mengulang lagi dari 'm'
			// 'M' 'A' 'D' 'I' 'U' 'N' 'M' 'A' 'D' 'I' 'U' 'N' 'M' 'A' 'D' 'I' 'U' 'N' 
			//dst sampai huruf akhir dari plainteks
			$ki++;
			if ($ki >= $kl)

			{
				$ki = 0;
			}
		}
	}
	
	// mengembalikan nilai text
	return $text;
}

// membuat fungsi dekripsi
function decrypt($key, $text)
{
	// inisialisasi variable
	$ki = 0;
	$kl = strlen($key);
	$length = strlen($text);
	
	// lakukan perulangan untuk setiap abjad
	for ($i = 0; $i < $length; $i++)
	{
		// jika text merupakan alphabet
		if (ctype_alpha($text[$i]))
		{
			// jika text merupakan huruf kapital (semua)
			if (ctype_upper($text[$i]))
			{
				$x = ((ord($text[$i]) - ord("A")) - (ord($key[$ki]) - ord("A")) % 26);
				//konsep sama

				if ($x < 0)
				{ //jika nilai kurang dari 0 maka akan ditambah 26 (karena 26 adalah mod/jumlah dari alphabet)
					$x += 26;
				}
				
				$x = $x + ord("A");
				//menambahkan nilai ASCII dari A
				$text[$i] = chr($x);
				//membalikkan nilai string dari ASCII
				//misalnya X ketemunya 75 jadi dilihat dulu nilai ASCII nya dan didapatkan nilai stringnya K
			}
			
			// jika text merupakan huruf kecil (semua)
			else
			{
				$x = ((ord($text[$i]) - ord("a")) - (ord($key[$ki]) - ord("a")) % 26);
				//konsep sama

				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			$ki++;
			if ($ki >= $kl)//konsep sama
			{
				$ki = 0;
			}
		}
	}
	
	// mengembalikan nilai text
	return $text;
}

?>