<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Form Rawat Inap</h5>
								<form action="<?php echo current_url();?>" method="post" class="form-filter form-input">
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Nama User</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="NamaUser">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" name="Password">
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Bangsal</label>
										<div class="col-md-9">
											<select name="KdBangsal" id="" class="form-control">
												<?php foreach ($masterpolis as $masterpoli):?>
													<option value="<?php echo $masterpoli->KDPoli;?>"><?php echo $masterpoli->NMPoli;?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<label for="kode-group" class="col-md-3">Level</label>
										<div class="col-md-9">
											<select name="oLevel" class="form-control" id="">
												<option value="0">Administrator</option>
												<option value="2">User</option>
											</select>
										</div>
									</div>
									<button class="btn btn-info pull-right">Save</button>
								</form>
						</div>
					</div>
						<div class="card">
							<div class="card-header">
								<label for="">Daftar Rawat Inap</label>
							</div>
							<div class="card-body">
								<?php if($rawats):?>
									<div class="table-responsive">
										<table class="table table-bordered data-table-basic">
											<thead>
											<tr>
												<td>Nama User</td>
												<td>Password</td>
												<td>Level</td>
												<td>Bangsal</td>
												<td></td>
											</tr>
											</thead>
											<tbody>
												<?php foreach ($rawats as $rawat):?>
													<tr>
														<td class="group-code">
															<?php echo $rawat->NamaUser;?>
														</td>
														<td class="group-name">
															<?php echo $rawat->Password;?>
														</td>
														<td>
															<?php if($rawat->oLevel == '0'):?>
																User
															<?php else:?>
																Administrator
															<?php endif;?>
														</td>
														<td>
															<?php echo $rawat->NMPoli;?>
														</td>
														<td>
															<button class="fa fa-pencil btn-edit" data-code="<?php echo $rawat->NamaUser;?>"></button>
															<button class="fa fa-trash btn-delete" data-code="<?php echo $rawat->NamaUser;?>"></button>
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
