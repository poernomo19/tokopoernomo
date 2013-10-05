<div class='thumbnail'>
<ul class='unstyled'>
	<?php
		include_once 'koneksi.php';
		$komentar=mysql_query("SELECT * FROM komentar a,produk b WHERE a.id_produk=b.id_produk AND a.id_produk='$id' ORDER BY a.id_komentar") or die(mysql_error());
		$baris=mysql_num_rows($komentar);
		for($i=0;$i<$baris;$i++)
		{
			$data=mysql_fetch_assoc($komentar);
	?>
<li><img src="img/<?php echo $data['gambar']; ?>" class='img-polaroid'></li>
	<li><h4><?php echo $data['nama']; ?></h4><br>
		<?php echo "<small class='text-info'>Comment at &nbsp;".$data['tgl']."</small>"; ?> <br>
		<?php echo "<p>".$data['isi']."</p>"; ?>
	</li>
<?php
}
?>
</ul>
</div>