<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Form Bangsal</h5>
								<form action="<?php echo current_url();?>" method="post" class="form-filter form-input">
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kode Ruang Rawat</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="KdBangsal">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Nama Ruang Rawat</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="NmBangsal">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kapasitas</label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="Kapasitas">
										</div>
									</div>
									<button class="btn btn-info pull-right">Save</button>
								</form>
						</div>
					</div>
						<div class="card">
							<div class="card-header">
								<label for="">Daftar Bangsal</label>
							</div>
							<div class="card-body">
								<?php if($bangsals):?>
									<div class="table-responsive">
										<table class="table table-bordered data-table-basic">
											<thead>
											<tr>
												<td>Kode Ruang Rawat</td>
												<td>Nama Ruang Rawat</td>
												<td>Kapasitas</td>
												<td></td>
											</tr>
											</thead>
											<tbody>
												<?php foreach ($bangsals as $bangsal):?>
													<tr>
														<td class="group-code">
															<?php echo $bangsal->KdBangsal;?>
														</td>
														<td class="group-code">
															<?php echo $bangsal->NmBangsal;?>
														</td>
														<td class="group-code">
															<?php echo $bangsal->Kapasitas;?>
														</td>
														<td>
															<button class="fa fa-pencil btn-edit" data-code="<?php echo $bangsal->KdBangsal;?>"></button>
															<button class="fa fa-trash btn-delete" data-code="<?php echo $bangsal->KdBangsal;?>"></button>
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
