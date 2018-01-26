<?php  
 include 'connect.php' ;
 $sonuc = "DELETE FROM ogrenci WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($baglan_vt, $sonuc))  
 {  
      echo 'Kayıt Silindi';  
 }  
 ?>