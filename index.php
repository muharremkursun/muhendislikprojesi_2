<html>  
      <head>  
           <title>KULLANİCİ KAYIT SİSTEMİ</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <style >
             .baslik{
              text-align: center;;
              color: blue;
             }
             .container{
              background-color:#fff;
             }
           </style>
      </head>  
      <body>  
           <div class="container">  
                <br/>  
                <br/>    
                <div>  
                     <h3 class="baslik">KULLANİCİ KAYIT SİSTEMİ</h3><br/>  
                     <div id="tablo"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){   
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#tablo').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_ekle', function(){  
           var isim = $('#isim').text();  
           var soyisim = $('#soyisim').text();  
           if(isim == '')  
           {  
                alert("Lütfen İsminizi Giriniz");  
                return false;  
           }  
           if(soyisim == '')  
           {  
                alert("Lütfen Soyisminizi Gririniz");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{isim:isim, soyisim:soyisim},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function kaydet_veri(id, text, sutunAdi)  
      {  
           $.ajax({  
                url:"update.php",  
                method:"POST",  
                data:{id:id, text:text, sutunAdi:sutunAdi},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.isim', function(){  
           var id = $(this).data("id1");  
           var isim = $(this).text();  
           kaydet_veri(id, isim, "isim");  
      });  
      $(document).on('blur', '.soyisim', function(){  
           var id = $(this).data("id2");  
           var soyisim = $(this).text();  
           kaydet_veri(id,soyisim, "soyisim");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Bu Kaydı Silmek İstediğinizden Eminmisiniz?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>