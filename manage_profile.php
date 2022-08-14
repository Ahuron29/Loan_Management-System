<?php include 'db_connect.php';
session_start();
$sel="SELECT * FROM `client` where username='".$_SESSION['login_name']."'" ;
$str= mysqli_query($conn, $sel);
$rows= mysqli_num_rows($str);
  while($row=mysqli_fetch_array($str)){
   $_SESSION['id'] = $row['id'];
  
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage_profile_acc">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="control-label">Name</label>
						<input name="name" class="form-control" required="" value="<?php echo $row['name'] ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">User Name</label>
						<input name="username" class="form-control" required="" value="<?php echo $row['username'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Contact</label>
						<input name="contact" class="form-control" required="" value="<?php echo '0'.$row['contact'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Contact</label>
						<input name="contact" class="form-control" required="" value="<?php echo '0'.$row['contact'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Voters ID</label>
						<input name="voter_id" class="form-control" required="" value="<?php echo $row['voters_id'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" required="" value="<?php echo $row['email'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Address</label>
						<input name="address" class="form-control" required="" value="<?php echo $row['address'] ?>">
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" required="" value="<?php echo $row['password'] ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php } ?>
<script>
    
	 $('#manage_profile_acc').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_borrower',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Borrower data successfully saved.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
</script>