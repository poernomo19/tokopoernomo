<div class='well'>
<?php
include_once "inc/koneksi.php";
include_once "inc/fungsi_rupiah.php";
$query=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 12") or die(mysql_error());
$i=0;
$kolom=4;
echo "<table>";
while($data=mysql_fetch_array($query))
{
$harga=format_rupiah($data['harga']);
$diskon=($data['diskon'] / 100) * $data['harga'];
$hargadiskon=number_format(($data['harga']-$diskon),0,",",".");

$stok=$data['stok'];
$tombolbeli="<a class='btn btn-inverse' href='index.php?page=simpanbelanja&aksi=tambah&id=$data[id_produk]' id='tombolbeli' rel='tooltip' data-title='Beli yuk'><i class='icon-shopping-cart icon-white'></i>Add To Cart</a>";
$tombolhabis="<a class='btn btn-danger disabled' href='#' id='tombolhabis' rel='tooltip' data-title='Stok Habis'><i class='icon-warning-sign icon-white'></i>Sale is Off &nbsp;&nbsp;</a>";
if($stok != "0")
{
	$shop=$tombolbeli;
}else
{
	$shop=$tombolhabis;
}
$d=$data['diskon'];
$hargatetap="<div class=''><b>Rp. $hargadiskon,-</b><br><br></div>";
$hargadiskon="<div class=''><del>Rp. $harga</del> Disc $data[diskon] % 
<b>Rp.$hargadiskon</b>
</div>";
if($d!="0")
{
	$divharga=$hargadiskon;
}else
{
	$divharga=$hargatetap;
}
if($i >= $kolom)
{
	echo "</tr><tr>";
	$i=0;
}
$i++;
echo "<td><ul class='thumbnails'>";
echo "<li class='span3'><div class='thumbnail'>";
?>
<?php
echo "<img class='img-polaroid' src=produk/$data[gambar] width='150px' height='300px'>";
echo "<div class='caption'><h4 align='center'>$data[nama_produk]</h4><center>$divharga</center><p align='center'>$shop
<a class='btn btn-info' href='index.php?page=detailstore&id=$data[id_produk]'>Detail&nbsp;</a></p>";
echo "</div></div></li></ul>";
echo "</td>";
}
echo "</tr>";
echo "</table>";
?>





</div>
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
    			  $("#tombolbeli").tooltip({placement:'bottom',trigger:'hover'});
                $("#tombolhabis").tooltip({placement:'bottom',trigger:'hover'});
              
    	});
    </script>