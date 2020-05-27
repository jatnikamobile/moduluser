<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Form Kelas Perawat</h5>
								<form action="<?php echo current_url();?>" method="post" class="form-filter form-input">
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kode Kelas</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="KDKelas" readonly>
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Keterangan Kelas</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="Kode">
										</div>
										<div class="col-md-6">
											<select type="text" class="form-control" name="NMKelas">
												<?php foreach ($kodekelases as $kodekelase):?>
													<option value="<?php echo $kodekelase->Keterangan;?>" data-kd="<?php echo $kodekelase->Kode;?>"><?php echo $kodekelase->Keterangan;?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Ruang Rawat</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="KDRrawat">
										</div>
										<div class="col-md-6">
											<select type="text" class="form-control" name="NMRrawat">
												<?php foreach ($ruangrawats as $ruangrawat):?>
													<option value="<?php echo $ruangrawat->NmBangsal;?>" data-kd="<?php echo $ruangrawat->KdBangsal;?>"><?php echo $ruangrawat->NmBangsal;?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Tarif</label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="ByTarif">
										</div>
									</div>
									<button class="btn btn-info pull-right">Save</button>
								</form>
						</div>
					</div>
						<div class="card">
							<div class="card-header">
								<label for="">Daftar Kelas Perawat</label>
							</div>
							<div class="card-body">
								<?php if($kelases):?>
									<div class="table-responsive">
										<table class="table table-bordered data-table-basic">
											<thead>
											<tr>
												<td>Kode Kelas</td>
												<td>Nama Kelas</td>
												<td>Tarif</td>
												<td>User</td>
												<td></td>
											</tr>
											</thead>
											<tbody>
												<?php foreach ($kelases as $kelas):?>
													<tr>
														<td class="group-code">
															<?php echo $kelas->KDKelas;?>
														</td>
														<td class="group-code">
															<?php echo $kelas->NMKelas;?>
														</td>
														<td class="text-right">
															<?php echo money_format($kelas->ByTarif);?>
														</td>
														<td class="group-code">
															<?php echo $kelas->ValidUser;?>
														</td>
														<td>
															<button class="fa fa-pencil btn-edit" data-code="<?php echo $kelas->KDKelas;?>"></button>
															<button class="fa fa-trash btn-delete" data-code="<?php echo $kelas->KDKelas;?>"></button>
														</td>
													</tr>
												<?php endforeach;?>
											</tbody>
										</table>
									</div>
								<?php else:?>
									<span class="alert alert-info">No Data Purchase Order</span>
								<?php endif;?>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
