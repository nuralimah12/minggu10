<?php
include "myconnection.php";

$name = $_POST["myname"];
$address = $_POST["myaddress"];
$foto=$_FILES['foto']['name'];



    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, 'image/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    $query = "INSERT INTO student (myname, myaddress, foto) VALUES ('$name', '$address', '$nama_gambar_baru')";
                    $result = mysqli_query($connect, $query);
                    // periska query apakah ada error
                    if($result){
                      echo"Data berhasil ditambahkan)";
                    } else {
                      echo"Data baru gagal di tambahkan<br>".mysqli_error($connect);
                    }
                } else {     
                    echo"Anda Salah memasukkan ekstensi";
                   }
mysqli_close($connect);

?>

