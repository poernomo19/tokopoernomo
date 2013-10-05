 <?php
 session_start();
 include "koneksi.php";
include_once "fungsi_rupiah.php";
 ?>
  <form class="form-search pull-right">
        <div class="input-append">
<span class='add-on'><i class='icon-search'></i></span>
<input type="text" class="input-xxlarge span10" placeholder="Temukan Laptop dan Accesories nya disini">
<button type="submit" class="btn btn-primary">Find Your Item</button>
</div>
</form>
<?php
$id=$_GET['id'];
$detail=mysql_query("SELECT * FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori AND produk.id_produk='$id'") or die(mysql_error());
$data=mysql_fetch_array($detail);
$harga=format_rupiah($data['harga']);
$disc=($data['diskon'] / 100 ) * $data['harga'];
$hargadiskon=number_format(($data['harga']-$disc),0,",",".");
//jumlah komentar
$komentar=mysql_query("SELECT * FROM komentar a,produk b WHERE a.id_produk=b.id_produk AND a.id_produk='$id' ORDER BY a.id_komentar") or die(mysql_error());
$baris=mysql_num_rows($komentar);
echo "<br><br><ul class='breadcrumb'><li><a href='#'>Home</a><span class='divider'>/</span></li>
		<li><a href='#'>$data[nama_kategori]</a><span class='divider'>/</span></li>
		<li><a href='#'>$data[nama_produk]</a><span class='divider'>/</span></li>
	</ul>";
?>
<ul class="thumbnails inline thumbnail">
<li class="span4">

<div class="thumbnail">
<img src="produk/<?php echo $data['gambar']; ?>">
</div>
</li>
<li class="span7">
<div class="caption">
<h2><?php echo $data['nama_produk']; ?></h2>
<small><?php echo $data['produk_seo']; ?></small><hr>
<p class='text-info'><?php echo $data['deskripsi']; ?></p><br>
<h3 class="text-warning">
<?php
if($data['diskon']!="0")
{
echo "<del class='text-error'>Rp.".$harga.",-</del>";
echo "Disc $data[diskon] % <br>"."Rp. $hargadiskon".",-";
}else
{
echo "Rp ". $harga.",-";
}
 ?> </h3><br>
<div class=''>
<a href='#' class='btn btn-inverse'><i class='icon-shopping-cart icon-white'></i>Add to Cart</a> &nbsp;
<div class='pull-right'><span class='badge'><?php echo $baris." Comment"; ?></span><i class='icon-comment'></i>
</div><br>

</div>
<hr>
</div>
</li>
<li>
	<?php $encodedUrl = htmlentities(urlencode($_SERVER['REQUEST_URI'])); ?>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $encodedUrl; ?>
	&amp;layout=standard&amp;show_faces=true&amp;width=400&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:80px;" allowTransparency="true">
</iframe>
</li>
</ul>
<div class='row9 thumbnail'>
	<fieldset>
		<legend>Give Comment in Our Product</legend>
<form method="post" class='form-horizontal' action='index.php?page=simpanbelanja&aksi=simpan'>
<div class='control-group'>
<label class='control-label'>Name :</label>
<div class='controls'>
<input type='text' name='nama' required placeholder='Your Name'>
<input type='hidden' name='id' value="<?php echo $data['id_produk'] ?>">
</div>
</div>
<div class='control-group'>
<label class='control-label'>Email :</label>
<div class='controls'>
<input type='text' name='email' required placeholder='Your Email'>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Comment :</label>
<div class='controls'>
<textarea name='komentar' rows='6' required placeholder='Your Comment'>
</textarea>
</div>
</div>
<div class='form-actions'>
<button type='submit' name='submit' class='btn btn-primary'>Post Comment</button>
</div>
</form>
</fieldset>
</div>
<?php
include "comment.php";
?>
