<?php  
 include 'connect.php' ; 
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $sutunAdi = $_POST["sutunAdi"];  
 $sonuc = "UPDATE ogrenci SET ".$sutunAdi."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($baglan_vt, $sonuc))  
 {  
      echo 'Kayıt Güncellendi';  
 }  
 ?>