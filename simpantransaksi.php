<?php
session_start();
include_once "inc/koneksi.php";
$password=$_POST['password'];
$nama=$_POST['nama'];
$alamat1=$_POST['alamat'];
$alamat2=$_POST['alamat2'];
$email=$_POST['email'];
$telp=$_POST['telp'];
$jasa=$_POST['jasa'];


if(empty($password) || empty($nama) || empty($alamat1) || empty($alamat2) || empty($email) || empty($telp) || empty($jasa))
{
	echo "<div class='alert'>Maaf,Data Isian Belum Lengkap Silahkan Ulangi</div>";
	echo "<meta http-equiv=refresh content=2;url=index.php?page=finish>";
}else
{
	function isi_troli()
	{
		$isikeranjang=array();
		$sid=session_id();
		$troli=mysql_query("SELECT * FROM order_temp WHERE id_session='$sid'") or die(mysql_error());
		while($r=mysql_fetch_array($troli))
		{
			$isikeranjang[]=$r;
		}
		return $isikeranjang;
	}
$tgl=date('Y-m-d');
$jam=date('H:i:s');
$token=rand(time(),true);
$_SESSION['token']=$token;
$kunci=$_SESSION['token'];

$custom=mysql_query("INSERT INTO customer (id_jasa,password,nama_lengkap,alamat,alamat2,email,telpon)
			VALUES ('$jasa','$password','$nama','$alamat1','$alamat2','$email','$telp')") or die(mysql_error());
$id_custom=mysql_insert_id();
$isikeranjang=isi_troli();
$jml=count($isikeranjang);

	for($i=0;$i<$jml;$i++)
	{
	mysql_query("INSERT INTO order_pesan 
		VALUES ('','$kunci','0','$tgl','$jam',{$isikeranjang[$i]['id_produk']},{$isikeranjang[$i]['qty']},'$id_custom')") or die(mysql_error());

	mysql_query("DELETE FROM order_temp WHERE id_order_temp={$isikeranjang[$i][id_order_temp]}");
?>
<h3><i class='icon-shopping-cart'></i>Transaksi Selesai</h3>
<p>Pelanggan Terhormat, Terima kasih telah menggunakan jasa penjualan kami. Untuk data lengkap and dapat dilihat dibawah ini :</p>
<h4>No. Order : <?php echo $kunci; ?></h4>
<div class='thumbnail'>
<table class='table'>
<thead>
<tr>
<th>#</th>
<th>Nama</th>
<th>Alamat</th>
<th>Email</th>
<th>Telepon</th>
</tr>
</thead>
<?php
$order=mysql_query("SELECT * FROM customer a,order_pesan b,produk c WHERE a.id_customer=b.id_customer 
	AND b.id_produk=c.id_produk AND a.id_customer='$id_custom'") or die(mysql_error());
$t=mysql_fetch_array($order);

?>
<tbody>
<tr>
<td></td>
<td><?php echo $t['nama_lengkap'];  ?></td>
<td><?php echo $t['alamat'];  ?></td>
<td><?php echo $t['email'];  ?></td>
<td><?php echo $t['telpon'];  ?></td>
</tr>
</tbody>

<?php
?>
</table>
</div>
<div class='thumbnail'>
<h4>Data Order Produk</h4>
<table class='table table-hover'>
<thead>
<tr>
<th>#</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Tgl Order</th>
<th>Status Order</th>
</tr>
</thead>
<tbody>
<tr>
<td></td>
<td><img src="produk/<?php echo $t['gambar']; ?>" width='80px' height='60px' class='img-polaroid'>
<br><h4><?php echo $t['nama_produk']; ?></h4>
</td>
<td><?php echo $t['jumlah']; ?></td>
<td><?php
	$harga=$t['harga'] * $t['jumlah'];
	echo "Rp.".$harga;
?></td>
<td><?php echo $t['tgl_order']; ?></td>
<td>
<?php  
if($t['status_order']=='0')
{
	$st="Belum di Proses";
}
echo "<b class='text-info'>".$st."</b>";

$pesan="<br>Kepada Pelanggan  Yth.'".$t['nama_lengkap']."',<br><br>
		Kami dari Toko Laptop Sip Semarang .<br> Terima kasih atas kepercayaan  anda untuk memilih kami
		sebagai media belanja online terpercaya <br>
		No. Order : '".$kunci."'<Br> Berikut adalah data alamat pengiriman barang anda yang tercatat di kami :<br>
		'".$t['alamat']."' <br>
		<b>Apabila ada perbedaan alamat pengiriman bisa di tanyakan di customer service kami Barang yang dibeli apabila tidak melakukan

		Pembayaran selama lebih 3 hari otomatis akan di batalkan</b>
		<br>Untuk mengecek Status Order anda ,anda dapat mengecek nya di menu cek order
		<br>
		Salam Hangat <br>
		Customer Service  
";
$subjek="Order Number :".$kunci."Pembayaran Transfer";
$dari="From: TokoLaptopsip@adipurnomo.com \n";
$dari .= "Content-type: text/html \r\n";
//mail($t['email'],$subjek,$pesan,$dari);
//mail("purnomo.dinus@gmail.com",$subjek,$pesan,$dari);
?>
</td>
</tr>
</tbody>
</table>
<p>Silahkan cek email anda, untuk mengetahui cara melakukan pembayaran .<b>Customer Service (024) 99998</b></p>
</div>
<?php
	$cek=mysql_query("SELECT * FROM order_pesan WHERE no_order='$id_custom'") or die(mysql_error());
	if(mysql_num_rows($cek)<1)
	{
		//echo "<meta http-equiv=refresh content=0;url=index.php?page=finish>";
	}
}

}
?>