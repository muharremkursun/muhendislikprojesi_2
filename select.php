 
 <?php  
 include 'connect.php'; //bu dosyadaki yapılan değişiklikleri veri tabanına kaydetmek için veri tabanına bağlama dosyasına gönderiliyor
 $cikti = '';  //boş bir string değerinie sahip cikti adında bir değişken tanımlanıyor
 $sonuc = "SELECT * FROM ogrenci"; //veri tabanından ogrenci  tablosu getiriliyor
 $deger = mysqli_query($baglan_vt, $sonuc); //yapılan sorgu sonucunu veri tabanıdan cekiyoruz
 $cikti .= '  
      <div>  
           <table class="table table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Isim</th>  
                     <th width=40%>Soyisim</th>  
                     <th></th>  
                </tr>'; 

 if(mysqli_num_rows($deger) > 0) //eger sorgu sonucunda gelen degerlerin sayısı 0 dan buyukse bu koşul sağlanır 
 {  
      while($satır = mysqli_fetch_array($deger))//burada veriler indexlenir eğer sonuç true ie dongüye girilir  
      {  
           $cikti .= '  
                <tr>  
                     <td>'.$satır["id"].'</td>  
                     <td class="isim" data-id1="'.$satır["id"].'" contenteditable>'.$satır["isim"].'</td>  
                     <td class="soyisim" data-id2="'.$satır["id"].'" contenteditable>'.$satır["soyisim"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$satır["id"].'" class="btn  btn-danger btn_delete">Sil</button></td>  
                </tr>  
           ';  
      }  
      $cikti .= '  
           <tr>  
                <td></td>  
                <td id="isim" contenteditable></td>  
                <td id="soyisim" contenteditable></td>  
                <td><button type="button"  id="btn_ekle" class="btn  btn-success">Ekle</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $cikti .= '<tr>  
                          <td colspan="4">Kayıtlı Veri Bulunamadı</td>  
                     </tr>';  
 }  
 $cikti .= '</table>  
      </div>';  
 echo $cikti;  
 ?>