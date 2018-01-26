<?php  
  include 'connect.php';
 $sonuc = "INSERT INTO ogrenci(isim, soyisim) VALUES('".$_POST["isim"]."', '".$_POST["soyisim"]."')";  
 if(mysqli_query($baglan_vt, $sonuc))  
 {  
      echo 'Kayıt Eklendi';  
 }  
 ?> 