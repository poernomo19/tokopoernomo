<?php
session_start();
include_once "inc/fungsi_rupiah.php";
$sid=session_id();
$keranjang=mysql_query("SELECT * FROM produk a,order_temp b WHERE id_session='$sid' AND a.id_produk=b.id_produk ") or die(mysql_error());
$ketemu=mysql_num_rows($keranjang);
if($ketemu==0)
{
	echo "<div class='alert'><a class='close' data-dismiss='alert' href='#''>&times;</a>Troli Pembelian Masih Kosong</div>";

}else
{
	echo "<div class='well well-small'>Barang Berhasil di tambahkan ke Troli Belanja Anda</div>";
	echo "<i class='icon-shopping-cart'></i><h3>Troli Pembelian</h3>";
	echo "<div class='thumbnail'>
			<form method='post' action='index.php?page=simpanbelanja&aksi=update'>
			<table class='table table-striped'>
			<thead>
			<tr class='well'><td>Pesanan</td><td>Jumlah</td><td>Harga Total</td><td>Hapus</td></tr>
			</thead>";
$no=1;
while($data=mysql_fetch_array($keranjang))

{
	$disc=($data['diskon'] / 100) * $data['harga'];
	$hargadiskon=number_format(($data['harga']-$disc),0,",",".");
	$subtotal=($data['harga']-$disc) * $data['qty'];
	$total=$total+$subtotal;
	$sub_rp=format_rupiah($subtotal);
	$total_rp=format_rupiah($total);
	$harga=format_rupiah($data['harga']);

	echo "<tbody>
			<tr><input type='hidden' name='id[$no]' value=$data[id_order_temp]>
			<td><img src='produk/$data[gambar]' class='img-polaroid span1' width='100px' height='100px'><h4>$data[nama_produk]</h4>
			<p align='justify'>$data[deskripsi]</p>
			<blockquote>Berat : $data[berat] Kg  <b class='label'>Diskon : $data[diskon] %</b> </blockquote>
			</td>
			<td><input type='text' id='jumlah' name=jml[$no] value=$data[qty] class='input-mini'><br>
			<span id='notif'></span>
			";
			?>


<?php
			echo "</td>
			<td>Rp $sub_rp</td>
			<td><a href='index.php?page=simpanbelanja&aksi=delete&id=$data[id_order_temp]' class='btn btn-danger'><i class='icon-trash'></i></a></td>
			</tr></tbody>
	";
$no++;
}
echo "<tr>
			<td colspan=4>
			<b>Ongkos Kirim Gratis</b> <h3 class='pull-right'>Total Rp . $total_rp</h3>
			</td>
			</tr>";
echo "</table>
	<div class='form-actions'>
	<i class='icon-warning-sign'></i><span class='text-danger'> Perhatian!!</span> <br>
	Setelah Mengganti Jumlah Barang Yang Akan Dibeli Harus Menekan Tombol Update Troli<br>
	<a href='#' class='btn btn-large' onclick='self.history.back();'>Lanjutkan Belanja</a>
	<input type='submit' value='Update Troli' class='btn btn-large btn-info'>
	<a href='index.php?page=checkout' class='btn btn-inverse pull-right btn-large'>Bayar Sekarang</a>
	</div>
</form>";
echo	"</div>";
}
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(function(){
			$("#jumlah").keypress(function(data)
			{
				if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
				{
					$("#notif").html("Isian angka").show().fadeOut("slow");
					return false;
				}
			});
	});
</script>