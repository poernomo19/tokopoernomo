<?php
session_start();
$sid=session_id();
include_once "inc/fungsi_rupiah.php";

$query=mysql_query("SELECT * FROM order_temp a,produk b WHERE a.id_produk=b.id_produk AND a.id_session='$sid' ") or die(mysql_error());
$ketemu=mysql_num_rows($query);
if($ketemu == 0)
{
	echo "<h3>Troli Pembelian</h3><div class='alert'>Maaf,Troli Anda Masih Kosong <br>Klik <a href='index.php'>disini</a> untuk kembali ke katalog</div>";
}else
{
?>
<div class='row'>
<div class='span6'>
<h4>Informasi Anda</h4>
<form method='post' action='index.php?page=simpantransaksi' class='form-horizontal pull-left'>
<div class='control-group'>
<label class='control-label'>Password</label>
<div class='controls'>
	<input type='password' name='password' required placeholder='Password'>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Nama Lengkap</label>
<div class='controls'>
	<input type='text' name='nama' required placeholder='Nama Lengkap'>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Alamat Lengkap</label>
<div class='controls'>
	<textarea name='alamat' required>
	</textarea>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Alamat Lengkap 2</label>
<div class='controls'>
	<textarea name='alamat2' required>
	</textarea>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Email</label>
<div class='controls'>
	<input type='text' name='email' required placeholder='Email'>
</div>
</div>
<div class='control-group'>
<label class='control-label'>No. Handphone</label>
<div class='controls'>
	<input type='text' name='telp' required placeholder='Handphone'>
</div>
</div>
<div class='control-group'>
<label class='control-label'>Pilih Jasa Kirim</label>
<div class='controls'>
	<select name='jasa' required>
		<option value='0' selected>--Pilihan Jasa Kirim--</option>
		<?php
		$kirim=mysql_query("SELECT * FROM jasa_kirim") or die(mysql_error());
		while($jasa=mysql_fetch_array($kirim))
		{
			echo "<option value=$jasa[id_jasa]>$jasa[id_jasa] $jasa[nama]</option>";
		}
		?>

	</select>
</div>
</div>
<div class='form-actions'>
<button class='btn btn-primary' type='submit'>Bayar Sekarang</button>
</div>
</form>
</div>
<div class='span6'>
<h4>Konfirmasi Pemesanan</h4>
<table class='table'>
<thead>
<tr>
<th>Produk</th>
<th>Jumlah</th><th>Harga</th>
</tr>
</thead>
<?php
while($data=mysql_fetch_array($query))
{
	$disc=($data['diskon'] / 100) * $data['harga'];
	$hargadiskon=number_format(($data['harga']-$disc),0,",",".");
	$subtotal=($data['harga']-$disc) * $data['qty'];
	$total=$total+$subtotal;
	$sub_rp=format_rupiah($subtotal);
	$total_rp=format_rupiah($total);
	$harga=format_rupiah($data['harga']);
?>
<tbody>
<tr>
<td><img src="produk/<?php echo $data['gambar'] ?>" class='img-circle' width='70px' height='50px'><br>
<b><?php echo $data['nama_produk']; ?></b><br>
<em><?php echo $data['produk_seo'] ?></em>
</td>
<td><span class='badge badge-info'><?php echo $data['qty'] ?></span></td>
<td><b>Rp. <?php echo $harga; ?> ,00 </b></td>
</tr>

<?php
}
?>
<tr>
	<td></td>
	<td></td>
<td colspan=2>Harga : Rp. <?php  echo $total_rp; ?> ,00</td>
</tr>
<tr>
	<td>Pajak 5%</td>
<td colspan=3><h4 class='pull-right'>Total: Rp. <?php  echo $total_rp; ?>,00</h4></td>
</tr>
</tbody>
</table>
</div>
</div>
<?php
}

?>