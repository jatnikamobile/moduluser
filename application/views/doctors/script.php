<script>
	$(document).on('submit','.form-input', function (e) {
		e.preventDefault();
		$.ajax({
			url:"<?php echo base_url('api/master/doctors/form');?>",
			type:'post',
			dataType:'JSON',
			data:$(this).serialize(),
			success:function (response) {
				swal('Success Menyimpan Data Dokter');
				window.location.href = '<?php echo base_url('doctors/index');?>';
			},
			completed:function () {

			}
		});
	});
	if($('[name="KdDoc"]').val()){
		$.ajax({
			url:"<?php echo base_url('api/master/doctors/show/');?>"+$('[name="KdDoc"]').val(),
			type:'get',
			dataType:'JSON',
			success:function (response) {
				console.log(response);
				var data = response.data;
				$('[name="NmDoc"]').val(data.NmDoc);
				$('[name="Spesialis"]').val(data.Spesialis);
				$('[name="Kategori"]').val(data.Kategori);
				$('[name="Sex"]').val(data.Sex);
				$('[name="SipDoc"]').val(data.NoPraktek);
				$('[name="Address"]').val(data.Address);
				$('[name="City"]').val(data.City);
				$('[name="kdPos"]').val(data.KdPos);
				$('[name="KdPoli"]').val(data.KdPoli);
				$('[name="Phone"]').val(data.Phone);
			}
		});
	}
	$(document).on('click', '.btn-delete', function () {
		var kdobat = $(this).attr('data-code');
		var deleted = $(this).parents('tr');
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url:'<?php echo base_url('api/master/obat/delete');?>',
						type:'post',
						dataType:'json',
						data:{kdobat:kdobat},
						success:function (response) {
							console.log(response);
							deleted.remove();
						},
						error:function (response) {
							console.log(response);
						},
					});
					swal("Poof! Your imaginary file has been deleted!", {
						icon: "success",
					});
				} else {
					swal("Your imaginary file is safe!");
				}
			});
	});

</script>
