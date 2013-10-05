<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Created By Adi Purnomo 2013 
	purnomo jaya studio -->
<title>Toko Laptop Sip</title>
<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
<style type="text/css">
</style>
</head>
<body>
    <div class='modal hide fade' id="warning">
             <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>Under Construction</h3>
</div>
<div class="modal-body">
<p><img src="img/warning.png"></p>
</div>
<div class="modal-footer">
&copy; Adi Purnomo Udinus 2013
</div>
    </div>
    <div class="container">
<span class='pull-right'>
    <a class='brand' href="index.php?page=keranjangbelanja" id="shop" rel="popover" data-title="Your Cart"><i class='icon-shopping-cart'></i>
<?php
include_once "inc/koneksi.php";
$sid=session_id();
$query=mysql_query("SELECT COUNT(*) as jumlah FROM order_temp WHERE id_session='$sid'") or die(mysql_error());
$data=mysql_fetch_array($query);
echo "<span class='badge'>".$data['jumlah']."</span>";
?>
     Item on Shopping Cart</a> |
     <a href='#' id="example" rel="popover"  data-title="Sign In Here">
        <i class='icon-user'></i>Sign In</a>
</span>
<!-- -->
<!--  -->
    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <br>
    <ul class="nav nav-tabs">
    <li class="active"><a href="index.php" id="profil" rel="tooltip" data-title="Semua Tentang Toko Laptop Sip">Home</a></li>
    <li><a href="#tab2" id="laptop" rel="tooltip" data-title="Jualan Laptop Baru" data-toggle="tab">Laptop</a></li>
    <li><a href="#tab3" id="assesor" rel="tootltip" data-title="Semua Accesories ada disini" data-toggle="tab">Accesories</a></li>
    <li><a href="#tab4" id="pemesanan" rel="tooltip" data-title="Peraturan Pemesanan anda" data-toggle="tab">Peraturan Pemesanan</a></li>
    <li><a href="index.php?page=cekorder" id="cek" rel="tooltip" data-title="Cek Order Barang Anda ">Cek Order & Pembayaran</a></li>
    <li><a href="#tab5" id="kontak" rel="tooltip" data-title="Hubungi Kami Yuk" data-toggle="tab">Kontak Kami</a></li>
    </ul>
    <div class="tab-content">
    
    <div class="tab-pane" id="tab2">
    <ul class='inline'>
      <div class='alert'>
    <p>Toko Laptop Sip didirikan pada 3 Maret 2013 pada pukul 21.00 WIB oleh febri.toko ini telah mendapat kepercayaan 
        dari beberapa mahasiswa mahasiswi Universitas Dian Nuswantoro untuk menyetok persedian peralatan komputer.
    </p>
    </div>

    </ul>
    </div>
    <div class='tab-pane' id="tab3">
    <ul class='inline'>
       <div class='alert'>
    <p>Toko Laptop Sip didirikan pada 3 Maret 2013 pada pukul 21.00 WIB oleh febri.toko ini telah mendapat kepercayaan 
        dari beberapa mahasiswa mahasiswi Universitas Dian Nuswantoro untuk menyetok persedian peralatan komputer.
    </p>
    </div>

    </ul>
    </div>
    <div class="tab-pane" id="tab4">
    <ul class='inline'>
      <div class='alert'>
    <p>
    Klik pada tombol Beli pada produk yang ingin Anda pesan.
    Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.
    Jika sudah selesai, klik tombol Selesai Belanja, maka akan tampil form untuk pengisian data kustomer/pembeli.
    Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran.
    Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan. 
        </p>
    </div>

    </ul>
    </div>
      <div class="tab-pane" id="tab5">
    <ul class='inline'>
      <div class='alert'>
        <b>Hubungi Kami</b><br>
        <address>
        <strong>Jalan MT Hayono</strong><br>
        No.XII Paragon,5934<br>
        Semarang, Jawa Tengah<br>
        <a href=''><i class='icon-envelope'></i>Send Email</a>
        </address>
    <p>
        </p>
    </div>

    </ul>
    </div>
    </div>
    </div>
</div>
<!-- end navbar -->
<div class='container'>   
<?php include "breadcumb.php"; ?> 

  <!-- TAB -->
<!-- span 9 -->
<?php
switch($_GET['page'])
{
case "keranjangbelanja":include("keranjangbelanja.php");break;
case "checkout":include("selesaibelanja.php");break;
case "finish":include("finish.php");break;
case "simpantransaksi":include("simpantransaksi.php");break;
case "cekorder":include("inc/cekorder.php");break;

case "tentangkami":include("inc/tentangkami.php");break;
case "kontak":include("inc/kontak.php");break;
case "bantuan":include("inc/bantuan.php");break;
case "privasi":include("inc/privasi.php");break;
case "peraturan":include("inc/peraturan.php");break;
case "detailstore":include("inc/detailstore.php");break;
case "simpanbelanja":include("simpanbelanja.php");break;
default:
?>
 <div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item">
        <img src='img/i.png'>
    </div>
    <div class="item"><img src='img/j.png'></div>
    <div class="item"><img src='img/l.jpg'></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    <hr>
          <form class="form-search pull-right">
        <div class="input-append">
<span class='add-on'><i class='icon-search'></i></span>
<input type="text" class="input-xxlarge span10" placeholder="Temukan Laptop dan Accesories nya disini">
<button type="submit" class="btn btn-primary">Find Your Item</button>
</div>
</form>
<!--
<p><i class='icon-th-list'></i><b>View Categories</b></p>
    <div class="row">
    <div class="span3"><i class='icon-th'></i>Buku
        <ul class='nav'>
            <li><a href=''><i class='icon-fire'></i>Buku Web</a></li>
            <li><a href=''><i class='icon-fire'></i>Buku Java</a></li>
            <li><a href=''><i class='icon-fire'></i>Buku Android</a></li>
            <li><a href=''><i class='icon-fire'></i>Buku Visual Basic</a></li>
        </ul>
    </div>
    <div class="span3"><i class='icon-th'></i>Komputer
        <ul class='nav'>
            <li><a href=''><i class='icon-fire'></i>Zyrex</a></li>
            <li><a href=''><i class='icon-fire'></i>Acer</a></li>
            <li><a href=''><i class='icon-fire'></i>Apple</a></li>
            <li><a href=''><i class='icon-fire'></i>Custom</a></li>
        </ul>
    </div>
    <div class="span3"><i class='icon-th'></i>Laptop
            <ul class='nav'>
            <li><a href=''><i class='icon-fire'></i>Acer</a></li>
            <li><a href=''><i class='icon-fire'></i>Appler</a></li>
            <li><a href=''><i class='icon-fire'></i>Xeon</a></li>
            <li><a href=''><i class='icon-fire'></i>Custom</a></li>
        </ul>
    </div>
    <div class='span3'><i class='icon-th'></i>Accesories
        <ul class='nav'>
            <li><a href=''><i class='icon-fire'></i>Keyboard</a></li>
            <li><a href=''><i class='icon-fire'></i>Mouse</a></li>
            <li><a href=''><i class='icon-fire'></i>Monitor</a></li>
            <li><a href=''><i class='icon-fire'></i>Lain-lain</a></li>
        </ul>
    </div>
    </div>
-->
<hr>
<br><br>
<?php
include "store.php";
?>
<?php
break;
}
?>
<!-- end span 9  -->
<hr>
 <div class="footer">
        <p>&copy; Adi Purnomo Udinus 2013</p>
      </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap-transition.js"></script>
    <script type="text/javascript" src="js/bootstrap-alert.js"></script>
    <script type="text/javascript" src="js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="js/bootstrap-scrollspy.js"></script>
    <script type="text/javascript" src="js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="js/bootstrap-popover.js"></script>
    <script type="text/javascript" src="js/bootstrap-button.js"></script>
    <script type="text/javascript" src="js/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="js/bootstrap-carousel.js"></script>
    <script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
    <script type="text/javascript">
        $(function(){
               // $("#warning").modal();
                var img='<table><tr><td>Username</td></tr><tr><td><input type="text" class="input-medium" name="username"></td></tr><tr><td>Password</td></tr><tr><td><input type="text" name="password" class="input-medium"></td></tr><tr><td><button type="submit" class="btn btn-primary">Sign In</button></td></tr><hr></table>';
                $("#example").popover({placement:'bottom',content:img,html:true}).mouseenter(function(e){$(this).popover('show');});
                $("#shop").popover({placement:'bottom',html:true,trigger:'hover',content:'<i class=icon-home></i>'});
                $("#profil").tooltip({placement:'bottom',animation:'true'});
                $("#laptop").tooltip({placement:'bottom',animation:'true'});
                $("#assesor").tooltip({placement:'bottom',animation:'true'});
                $("#pemesanan").tooltip({placement:'bottom',animation:'true'});
                $("#cek").tooltip({placement:'bottom'});
                $("#kontak").tooltip({placement:'bottom',animation:'true'});
              
        });
    </script>
</html>