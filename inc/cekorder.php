<?php
session_start();
include "koneksi.php";
?>
<ul class='nav nav-tabs'>
<li>
<a href='#tab-konfirm' data-toggle='tab'>KONFIRMASI BANK TRANSFER</a>
</li>
<li class='active'><a href='#tab-cek' data-toggle='tab'>CEK STATUS ORDER</a></li>

</ul>
<div class="tab-content">
	<div class="tab-pane" id="tab-konfirm">
		<center>
			<p>Terima kasih telah berbelanja di <b>Toko Laptop Sip</b>!<br>
				Bila Anda telah melakukan pembayaran secara Bank transfer,konfirmasikan pembayaran Anda 
				disini  agar segera kami proses 
			</p>
		<form class="" method='post' enctype="multipart/form-data" action="">
			<div class='control-group'>
				<label class='control-label'>No. Order</label>
				<div class='controls'><input type="text" name="order" required placeholder="Your Number Order">
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Bank Tujuan</label>
				<div class='controls'>
					<select name='banksaya' required>
						<option value='0' selected>Pilihan Bank</option>
						<?php
							$bank=mysql_query("SELECT * FROM bank");
							while($data=mysql_fetch_array($bank))
							{
								echo "<option value=$data[id_bank]>$data[nama_bank]</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Bank Anda</label>
				<div class='controls'><input type="text" name='bankanda' required placeholder='Your Name Bank'>
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Rekening atas nama</label>
				<div class='controls'><input type="text" name="namarekening" required placeholder="Your Name Account">
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Nominal Transfer</label>
				<div class='controls'><input type="text" name="nominaltransfer" required placeholder="Your Nominal Transfer">
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Nomor Rekening</label>
				<div class='controls'><input type="text" name="nomor-rek" required placeholder="Your Account Number">
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Tanggal Transfer</label>
				<div class='controls'>
					<input class='input-mini' required placeholder="Tgl"><input class='input-mini' required placeholder='Bln'>
					<input class='input-small' required placeholder="Tahun">
				</div>
			</div>
			<div class='control-group'>
				<label class='control-label'>Upload Bukti Slip</label>
				<div class='controls'><input type="file" name="bukti" class='btn'>
				</div>
			</div>
			<div class='form-actions'>
				<button type="submit" class="btn btn-warning btn-large">Konfirmasi Pembayaran</button>
			</div>
		</form>
		</center>
	</div>
	<!--cek order -->

	<div class="tab-pane active" id="tab-cek">
			<center>
		<p>Masukkan 8 digit No. Order Anda untuk melihat status Pengiriman Barang Anda.<br>
			Untuk melihat No. Order silahkan cek Email Anda.
		</p>
		<form class='form-horizontal'>
			<div class="control-group">
				<label class='control-label'><b>No. Order</b></label>
				<div class='controls'><input type="text" name="no-order" required placeholder="8 Digit Number" class="input-xlarge">
					<button type="submit" name="submit" class='btn btn-warning btn-large'>Cek Order</button>
				</div>
			</div>
		</form>
	</center>
	</div>
</div>