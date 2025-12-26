<html>
    <head>
          <title></title>
		  <style>
			th{
				font-size: 14px;
				font-family: sans-sarif;;
			}
		  </style>
</head>
<body>

         <table width="750" border="0">
           <tr>
             <td style="text-align: center; font-size: 24px; font-weight: bold; font-family: sans-serif;">Laporan Transaksi</td>
           </tr>
		</table>

	<table width="750" border="0">
           <tr>
             <td style="text-align: center; font-size: 16px; font-family: sans-serif;">Dari Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_mulai'));?> sampai tanggal <?= mediumdate_indo($this->session->userdata('tanggal_ahir'));?></td>
           </tr>
		</table> <br><br>

		<table whidth="750" border="1">
			<tr>
				<th> Tanggal masuk </th>
				<th> kode Transaksi</th>
				<th> Konsumen</th>
				<th>Paket</th>
				<th>Berat (KG)</th>
				<th>Grand Total</th>
				<th>Status</th>
			</tr>
		</table>

	</body>
</html>
