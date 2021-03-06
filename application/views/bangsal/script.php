<script>
	$('.form-input').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url:"<?php echo base_url('api/master/bangsal/form');?>",
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
			url:'<?php echo base_url('api/master/bangsal/show/');?>'+code,
			type:'get',
			dataType:'json',
			success:function (response) {
				$('[name="NmBangsal"]').val(response.data.NmBangsal);
				$('[name="KdBangsal"]').val(response.data.KdBangsal);
				$('[name="Kapasitas"]').val(response.data.Kapasitas);
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
						url:'<?php echo base_url('api/master/bangsal/delete/');?>'+code,
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
