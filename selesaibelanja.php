<?php
session_start();
$sid=session_id();
$sql=mysql_query("SELECT * FROM order_temp a,produk b WHERE a.id_session='$sid' AND a.id_produk=b.id_produk ");
$ketemu=mysql_num_rows($sql);
if($ketemu < 1)
{
	echo "<h3>Troli Pembelian</h3><div class='alert'>Maaf,Troli Anda Masih Kosong <br>Klik <a href='index.php'>disini</a> untuk kembali ke katalog</div>";
}else
{
?>
<div class='alert'><h4>Sign Up Atau Sign In dengan akun anda bro</h4></div>
<div class='row'>
<div class='span4 thumbnail'>
<center>
<span class='center'><br><br>
<br><br>
<b>Belum Punya Akun ?</b><br>
	<a href='index.php?page=finish' class='btn btn-primary'>Sign Up & Bayar</a></span><br><br>
	<i class='icon-shopping-cart'></i>
	<br><br><br><br><br>
</center>
</div>

<div class='span7'>
	<center>
<form method='' action='' class='pull-center'>
<fieldset>
<legend>Pelanggan Tetap?</legend>
<label>Alamat Email</label>
<input type='text' name='email'>
<label>Password</label>
<input type='password' name='password'>
</fieldset>
<button type='submit' name='submit' class='btn btn-inverse'>Sign In</button>

</form>
<img src="img/att.png">
<p>Sorry,this is may be not work.<b>Under Maintenance</b></p>
</center>

</div>

</div>
<?php
}

?>