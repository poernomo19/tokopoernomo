<?php
session_start();
include_once "inc/koneksi.php";

$hal=$_GET['page'];
$aksi=$_GET['aksi'];

if($hal=="simpanbelanja" && $aksi=='tambah')
{
	$sid=session_id();
	$id=$_GET['id'];
	$query=mysql_query("SELECT * FROM produk WHERE id_produk='$id' ")or die(mysql_error());
	$d=mysql_fetch_array($query);
	$stok=$d['stok'];
	if($stok =="0")
	{
		echo "<div class='alert alert-warning'>
		<a class='close' data-dismiss='alert' href='#'>&times;</a>
		Maaf,Stok Barang ini Habis</div>";
	}else
	{
		$belanja=mysql_query("SELECT id_produk FROM order_temp WHERE id_produk='".$_GET['id']."' AND id_session='$sid'") or die(mysql_error());
		$ketemu=mysql_num_rows($belanja);
		if($ketemu == 0)
		{
			mysql_query("INSERT INTO order_temp (id_produk,id_session,qty,tgl_order_temp,jam_order_temp,stok_temp)
			 VALUES('".$_GET['id']."','$sid','1','".date('Y-m-d')."','".date('H:i:s')."','$stok')") or die(mysql_error());
			

		}else
		{
			mysql_query("UPDATE order_temp SET qty=qty+1 WHERE id_session='$sid' AND id_produk='".$_GET['id']."'") or die(mysql_error());
		}
		//header("Location:index.php?page=keranjangbelanja");
		hapustroli();
		echo "<meta http-equiv=refresh content=0;url=index.php?page=keranjangbelanja>";
	}

}else
if($hal=="simpanbelanja" && $aksi=="delete")
{
	$id=$_GET['id'];
	$query=mysql_query("DELETE FROM order_temp WHERE id_order_temp='$id'");
	if($query)
	{
		echo "<div class='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Troli Belanja  Berkurang dihapus</div>";
		echo "<meta http-equiv=refresh content=2;url=index.php?page=keranjangbelanja>";
	}else
	{
		echo "<div class='alert'><button type='button' class='close' data-dismiss='alert'>x</button>Troli Belanja Gagal dihapus</div>";
	}
}else
if($_GET['page']=="simpanbelanja" && $_GET['aksi']=="simpan")
{
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$coment=$_POST['komentar'];

	$query=mysql_query("INSERT INTO komentar (id_produk,nama,email,isi)
	 VALUES('$id','$nama','$email','$coment')")or die(mysql_error());
	if($query)
	{
		echo "<span class='alert'>Comment hass been Add Succesfully</span>";
		echo "<meta http-equiv=refresh content=3;url=index.php?page=detailstore&id=$id>";
	}else
	{
		echo "<div class='alert'>Comment failed to Add</div>";
	}
}else
if($hal=="simpanbelanja" && $aksi=="update")
{
	$id=$_POST[id];
	$jml_data=count($id);

	$jumlah=$_POST[jml];
	for($i=1;$i<=$jml_data;$i++)
	{
		
		$query=mysql_query("SELECT stok_temp FROM order_temp WHERE id_order_temp='".$id[$i]."'") or die(mysql_error());
		while($data=mysql_fetch_array($query))
		{
			
			if($jumlah[$i] > $data['stok_temp'])
			{
				echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>x</button>
					Maaf,Jumlah yang anda beli melebihi stok kami
				</div>";
			}else if($jumlah[$i]=="0")
			{
				echo "<div class='alert'><button type='button' class='close' data-dismiss='alert'>x</button>Maaf,Jumlah tidak boleh angka 0</div>";
			}else
			{
				mysql_query("UPDATE order_temp SET qty='".$jumlah[$i]."' WHERE id_order_temp='".$id[$i]."'") or die(mysql_error());
				echo "sukses";
			echo "<meta http-equiv=refresh content=0;url=index.php?page=keranjangbelanja>";
			}
		}
	}
}
function hapustroli(){
	$kemarin=date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')));
	mysql_query("DELETE FROM order_temp WHERE tgl_order_temp < '$kemarin'") or die(mysql_error());
}


?>