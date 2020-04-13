<style>
	.print{
		font-family: Arial;
		font-size: 11px;
	}

	.print .print-alamat, 	.print .print-phone{
		font-size: 17px;
	}
	.print .table-bio{
		width: 50%;
		padding: 40px;
	}

	.print .print-line-1-top , .print .print-line-3-top{
		border-top: 8px black solid;
		margin-bottom: 3px;
	}
	.print .print-line-1-bottom 	,.print .print-line-3-bottom{
		border-top: 1px black solid;
	}

	.print .print-line-2 h3{
		margin-top: -10px;
		text-transform: uppercase;
	}

	.print .print-table-detail thead tr td{
		border-bottom: 1px #000 solid;
		border-top: 1px #000 solid;

	}

	.print .divisi{
		border: 1px #000 solid;
		border-radius: 5px;
		height: 100px;
		padding: 10px;
	}
	/*.page .table-bio td{*/
	/*	width: 50%;*/
	/*}*/
</style>
<div class="print">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h4><?php echo $profile->Company;?></h4>
							<p class="print-alamat">
								<?php echo $profile->Address1;?>
							</p>
							<p class="print-phone">
								Phone : <?php echo $profile->Phone;?>
							</p>
							<div class="row">
								<div class="col-md-6">
									<div class="print-line-1-top"></div>
									<div class="print-line-1-bottom"></div>
								</div>
								<div class="col-md-4">
									<div class="print-line-2"><h3>Bukti Penerimaan</h3></div></div>
								<div class="col-md-2">
									<div class="print-line-3-top"></div>
									<div class="print-line-3-bottom"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="divisi">
										<table>
											<tr>
												<td>Np BPB</td>
												<td><?php echo $terima->NoBPB;?></td>
											</tr>
											<tr>
												<td>Tanggal</td>
												<td><?php echo $terima->Tanggal;?></td>
											</tr>
											<tr>
												<td>No PO</td>
												<td><?php echo $terima->NOPo;?></td>
											</tr>
											<tr>
												<td>Tanggal PO</td>
												<td><?php echo $terima->TglPO;?></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-6">
									<div class="divisi">
										<table>
											<tr>
												<td>Nama Supplier</td>
												<td><?php echo $supplier->SMName;?></td>
											</tr>
											<tr>
												<td></td>
												<td><?php echo $supplier->SMAddress;?></td>
											</tr>
											<tr>
												<td>No DO/Faktur</td>
												<td><?php echo $terima->NODO;?></td>
												<td><?php echo $terima->TglDO;?></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-12">
									<div class="table-responsive mt-3">
										<table class="print-table-detail table table-borderless">
											<thead>
											<tr>
												<td>No</td>
												<td>Kode</td>
												<td>Nama Obat</td>
												<td>Qty</td>
												<td>Isi</td>
												<td>HNA</td>
												<td>Disc(%)</td>
												<td>Jumlah</td>
											</tr>
											</thead>
											<tbody>
											<?php $i = 0;?>
											<?php $jumlah = 0;?>
											<?php foreach ($details as $detail):?>
												<?php $i++;?>
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $detail->KodeObat;?></td>
													<td><?php echo $detail->NamaObat;?></td>
													<td><?php echo $detail->JmlTerima;?></td>
													<td><?php echo $detail->IsiKemasan;?></td>
													<td><?php echo money_format($detail->hna);?></td>
													<td><?php echo $detail->disc;?></td>
													<td><?php echo money_format($detail->jumlah);?></td>
												</tr>
											<?php endforeach;?>
											</tbody>
											<tfoot>
											<tr>
												<td colspan="7">Total</td>
												<td><?php echo money_format($terima->JumlahHarga);?></td>
											</tr>
											</tfoot>
										</table>
										<hr>
								</div>
									<div class="row">
										<div class="col-md-9">
											<div class="divisi">
												<div class="row">
													<div class="col-md-4">Penerima</div>
													<div class="col-md-4">Yang Menyerahkan</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<table>
												<tr>
													<td>Total : </td>
													<td><?php echo money_format($terima->JumlahHarga);?></td>
												</tr>
												<tr>
													<td>Disc(%) : </td>
													<td><?php echo $terima->Discount;?> <?php echo money_format($terima->JmlDiscount);?></td>
												</tr>
												<tr>
													<td>Ppn(%) : </td>
													<td><?php echo $terima->Ppn;?> <?php echo money_format($terima->JmlPpn);?></td>
												</tr>
												<tr>
													<td>Materai : </td>
													<td><?php echo money_format($terima->Materai);?></td>
												</tr>
												<tr>
													<td>GrandTotal: </td>
													<td><?php echo money_format($terima->TotalHarga);?></td>
												</tr>
											</table>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<div class="card-body">
	<?php if($order):?>
		<div class="table-responsive">
			<table class="table table-borderless table-bio">
				<tr width="40%">
					<td>No PO : </td>
					<td><?php echo $order->NOPo;?></td>
					<td>Kepada : </td>
					<td><?php echo $order->supplier->SMName;?></td>
				</tr>
				<tr>
					<td>Tanggal : </td>
					<td><?php echo date('d/m-Y', strtotime($order->TglPO));?></td>
					<td>NO Izin PBF / IPAK : </td>
					<td></td>
				</tr>
				<tr>
					<td>Due Date :</td>
					<td><?php echo date('d/m/Y', strtotime($order->DueDate));?></td>
					<td>Penanggung Jawab : </td>
					<td></td>
				</tr>
				<tr>
					<td>Tanggal Kirim : </td>
					<td><?php echo date('d/m/Y', strtotime($order->TglKirim));?></td>
					<td>No SIKA :</td>
					<td></td>
				</tr>
				<tr>
					<td>TOP : </td>
					<td><?php echo $order->TermOP;?></td>
				</tr>
			</table>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				<tr style="border-bottom: #0000 5px solid; border-top:#000 5px solid;">
					<td>No</td>
					<td>Kode</td>
					<td>Uraian</td>
					<td>Qty</td>
					<td>Satuan</td>
					<td>Harga</td>
					<td>Disc(%)</td>
					<td>Jumlah</td>
				</tr>
				</thead>
				<tbody>
				<?php $i = 0;?>
				<?php $jumlah = 0;?>
				<?php foreach ($details as $detail):?>
					<?php $jumlah += $detail->JumlahHarga;?>
					<?php $i++;?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $detail->KodeObat;?></td>
						<td><?php echo $detail->NamaObat;?></td>
						<td><?php echo $detail->Qty;?></td>
						<td><?php echo $detail->Kemasan;?></td>
						<td><?php echo money_format($detail->Harga);?></td>
						<td><?php echo $detail->Discount;?></td>
						<td><?php echo money_format($detail->JumlahHarga);?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="7">Total</td>
					<td><?php echo money_format($order->Jumlah);?></td>
				</tr>
				</tfoot>
			</table>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-9">
				<div class="divisi">
					<div class="row">
						<div class="col-md-4">Penanggung Jawab Teknis</div>
						<div class="col-md-4">Direktur</div>
						<div class="col-md-4">Ka.Bagian Farmasi</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<table>
					<tr>
						<td>Total : </td>
						<td><?php echo money_format($order->Jumlah);?></td>
					</tr>
					<tr>
						<td>Disc(%) : </td>
						<td><?php echo $order->Disc;?> <?php echo money_format($order->JmlDisc);?></td>
					</tr>
					<tr>
						<td>Ppn(%) : </td>
						<td><?php echo $order->Ppn;?> <?php echo money_format($order->JmlPpn);?></td>
					</tr>
					<tr>
						<td>Materai : </td>
						<td><?php echo money_format($order->Materai);?></td>
					</tr>
					<tr>
						<td>GrandTotal: </td>
						<td><?php echo money_format($order->Total);?></td>
					</tr>
				</table>
			</div>
		</div>
	<?php else:?>
		<span class="alert alert-info">No Data Purchase Order</span>
	<?php endif;?>
</div>
</div>
-->
<script>
	window.print();
</script>
