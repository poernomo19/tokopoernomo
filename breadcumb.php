<?php
include "inc/koneksi.php";
if($_GET['page']=="tentangkami")
{
	echo "<ul class='breadcrumb'><li><a href='#'>Home</a><span class='divider'></span></li></ul>";
}else
if($_GET['page']=="detailstore")
{
	$query=mysql_query("SELECT * FROM produk a,kategori b WHERE a.id_kategori=b.id_kategori AND a.id_produk='".$_GET['id']."'") or die(mysql_error());
	$d=mysql_fetch_array($query);
}

?>