<?php
session_start();
require_once "inc/jpgraph_antispam.php";
$rand=new Antispam();
$_SESSION['koderand']=strtoupper($rand->Rand(6));
$rand->Set($_SESSION['koderand']);
$rand->Stroke();

?>