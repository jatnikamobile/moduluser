<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Form Unit</h5>
								<form action="<?php echo current_url();?>" method="post" class="form-filter form-input">
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Kode Unit</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="id">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Nama Unit</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="UnitName">
										</div>
									</div>
									<button class="btn btn-info pull-right">Save</button>
								</form>
						</div>
					</div>
						<div class="card">
							<div class="card-header">
								<label for="">Daftar Unit</label>
							</div>
							<div class="card-body">
								<?php if($units):?>
									<div class="table-responsive">
										<table class="table table-bordered data-table-basic">
											<thead>
											<tr>
												<td>Kode Unit</td>
												<td>Nama Unit</td>
												<td></td>
											</tr>
											</thead>
											<tbody>
												<?php foreach ($units as $unit):?>
													<tr>
														<td class="group-code">
															<?php echo $unit->id;?>
														</td>
														<td class="group-code">
															<?php echo $unit->UnitName;?>
														</td>
														<td>
															<button class="fa fa-pencil btn-edit" data-code="<?php echo $unit->id;?>"></button>
															<button class="fa fa-trash btn-delete" data-code="<?php echo $unit->id;?>"></button>
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
