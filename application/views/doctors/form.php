<div class="page">
	<div class="container-fluid">
		<div class="page-content" >
			<div class="row">
				<div class="col-md-12">
					<div class="card ">
						<div class="card-header">
							<a href="<?php echo base_url('doctors/form');?>"><i class="fa fa-tachometer"></i>Input Master</a>
							<a href="<?php echo base_url('doctors');?>"><i class="fa fa-list"></i>Daftar Dokter</a>
						</div>
						<div class="card-body">
							<?php echo form_open_multipart('api/master/doctors/form');?>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<label class="form-group col-md-3">
													Kode Dokter
												</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="KdDoc" readonly value="<?php echo $KdDoc;?>">
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Nama Dokter
												</label>
												<div class="col-md-9">
													<input type="text" name="NmDoc" class="form-control" required>
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													SIP Dokter
												</label>
												<div class="col-md-9">
													<input type="text" name="SipDoc" class="form-control">
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Kategori
												</label>
												<div class="col-md-9">
													<select name="Kategori" id="" class="form-control" required>
														<option value="">--Pilih Kategori--</option>
														<?php foreach ($categories as $category):?>
															<option value="<?php echo $category;?>"><?php echo $category;?></option>
														<?php endforeach;?>
													</select>
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Spesialis
												</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="Spesialis" required>
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Jenis Kelamain
												</label>
												<div class="col-md-9">
													<select name="Sex" id="" class="form-control" required>
														<option value="">--Pilih Jenis Kelamin--</option>
														<?php foreach ($genders as $gender):?>
															<option value="<?php echo $gender;?>"><?php echo $gender;?></option>
														<?php endforeach;?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<label class="form-group col-md-3">
													Alamat
												</label>
												<div class="col-md-9">
													<textarea name="Address" class="form-control"></textarea>
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Kota
												</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="City">
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Kode Pos
												</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="kdPos">
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Telepon
												</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="Phone">
												</div>
											</div>
											<div class="row">
												<label class="form-group col-md-3">
													Poli
												</label>
												<div class="col-md-9">
													<select name="KdPoli" id="" class="form-control" required>
														<option value="">--Pilih Poli--</option>
														<?php foreach ($polis as $poli):?>
															<option value="<?php echo $poli->KDPoli;?>">
																<?php echo $poli->NMPoli;?>
															</option>
														<?php endforeach;?>
													</select>
												</div>
											</div>

											<div class="row">
												<label class="form-group col-md-3">
													Scan TTD
												</label>
												<div class="col-md-9">
											        <div class="form-group">
										                <input type="file" name="Pict" id="Pict" class="form-input" value="<?php echo $file_ttd ?? '' ;?>">
										                <p name ="pict_name" id="pict_name" ></p>
											        </div>
												</div>
											</div>

											<button type="submit" class="btn btn-info ">Simpan</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


