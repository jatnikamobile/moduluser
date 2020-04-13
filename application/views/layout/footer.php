	<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/popper.js/dist/umd/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.js');?>"></script>
	<script src="<?php echo base_url('assets/sweetalert/dist/sweetalert.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/app.js');?>"></script>
	<?php if(isset($js)):?>
		<?php include APPPATH.'views/'.$js.'/script.php';?>
	<?php endif;?>
</body>
</html>
