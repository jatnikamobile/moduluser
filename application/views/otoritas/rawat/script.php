<script>
	$('.form-input').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url:"<?php echo base_url('api/otoritas/rawat/form');?>",
			type:'POST',
			dataType:'JSON',
			data:$(this).serialize(),
			success:function (response) {
				if(response.data){
					window.location.reload();
				}else{
					swal('Error Request');
				}
			},
		});
	});

	$(document).on('click', '.btn-edit', function () {
		var code = $(this).data('code');
		$.ajax({
			url:'<?php echo base_url('api/otoritas/rawat/show/');?>'+code,
			type:'get',
			dataType:'json',
			success:function (response) {
				$('[name="NamaUser"]').val(response.data.NamaUser);
				$('[name="oLevel"]').val(response.data.oLevel);
				$('[name="KdBangsal"]').val(response.data.KdBangsal);
				$('[name="Password"]').val(response.data.Password);
			},
			error:function (response) {
				console.log(response);
			},
		});

	});

	$(document).on('click', '.btn-delete', function () {
		var deleted = $(this).parents('tr');
		code = $(this).data('code');
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
						url:'<?php echo base_url('api/otoritas/rawat/delete/');?>'+code,
						type:'get',
						dataType:'json',
						success:function (response) {
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
