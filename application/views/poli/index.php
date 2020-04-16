<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Form Poliklinik</h5>
								<form action="<?php echo current_url();?>" method="post" class="form-filter form-input">
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kode Poli</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="KDPoli" readonly>
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Nama Poli</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="NMPoli">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kode Tuju</label>
										<div class="col-md-9">
											<select name="KdTuju" id="" class="form-control">
												<option value="">--Pilih Kode Tuju--</option>
												<?php foreach ($tujus as $tuju):?>
													<option value="<?php echo $tuju->KDTuju;?>"><?php echo $tuju->KDTuju. ' - '.$tuju->NMTuju;?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<button class="btn btn-info pull-right">Save</button>
								</form>
						</div>
					</div>
						<div class="card">
							<div class="card-header">
								<label for="">Daftar Poli</label>
							</div>
							<div class="card-body">
								<?php if($polis):?>
									<div class="table-responsive">
										<table class="table table-bordered data-table-basic">
											<thead>
											<tr>
												<td>Kode Poli</td>
												<td>Nama Poli</td>
												<td>Kode Tuju</td>
												<td></td>
											</tr>
											</thead>
											<tbody>
												<?php foreach ($polis as $poli):?>
													<tr>
														<td class="group-code">
															<?php echo $poli->KDPoli;?>
														</td>
														<td class="group-code">
															<?php echo $poli->NMPoli;?>
														</td>
														<td class="group-code">
															<?php echo $poli->NMTuju;?>
														</td>
														<td>
															<button class="fa fa-pencil btn-edit" data-code="<?php echo $poli->KDPoli;?>"></button>
															<button class="fa fa-trash btn-delete" data-code="<?php echo $poli->KDPoli;?>"></button>
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
