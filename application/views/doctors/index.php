<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<a href="<?php echo base_url('doctors/form');?>"><i class="fa fa-tachometer"></i>Input Master</a>
							<a href="<?php echo base_url('doctors');?>"><i class="fa fa-list"></i>Daftar Dokter</a>
						</div>
						<div class="card-body">
							<?php if($doctors):?>
								<div class="table-responsive">
									<table class="table table-bordered data-table-basic">
										<thead>
										<tr>
											<th>Kode Dokter</th>
											<th>Nama Dokter</th>
											<th>Kategori</th>
											<th>Spesialis</th>
											<th>User</th>
											<td></td>
										</tr>
										</thead>
										<tbody>
										<?php foreach ($doctors as $doctor):?>
											<tr>
												<td><?php echo $doctor->KdDoc;?></td>
												<td><?php echo $doctor->NmDoc;?></td>
												<td><?php echo $doctor->Kategori;?></td>
												<td><?php echo $doctor->Spesialis;?></td>
												<td><?php echo $doctor->Validuser;?></td>
												<td>
													<a class="fa fa-pencil" href="<?php echo base_url('doctors/form/'.$doctor->KdDoc);?>"></a>
													<button type="button" class="fa fa-trash btn-delete" data-code="<?php echo $doctor->KdDoc;?>"></button>
												</td>
											</tr>
										<?php endforeach;?>
										</tbody>
									</table>
								</div>
							<?php else:?>
								<span class="alert alert-info">No Data Obat</span>
							<?php endif;?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
