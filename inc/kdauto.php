<?php
function kdauto($tabel,$inisial){
	
	$struktur=mysql_query("SELECT * FROM $tabel");
	$field=mysql_field_name($struktur,0);
	$panjang=mysql_field_len($struktur,0);
	
	$qry=mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
	$data=mysql_fetch_array($qry);
	
	if($data[0]=="")
	{
		$angka=0;
	}else
	{
		$angka=substr($data[0],strlen($inisial));
	}
	$angka++;
	$angka=strval($angka);
	$tmp="";
	
	for($i=1;$i<=($panjang-strlen($inisial)-strlen($angka));$i++)
	{
		$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;

}


?>
