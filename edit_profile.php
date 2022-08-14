<?php 
include('db_connect.php');
session_start();
if(isset($_GET['cid'])){
	$qry = $conn->query("SELECT * FROM client where cid=".$_GET['cid']);
   // echo $row['name'];
}
/*
$query = 'SELECT * FROM client WHERE icd='.$_GET['cid'];
	$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
	while($row = mysqli_fetch_array($result)){
		echo $row['cid'];
	}
    $id = $_GET['cid'];*/
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-borrower">
			<input type="hidden" name="cid" value="<?php echo $_GET['cid'] ?>">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="" class="control-label">Name</label>
						<input name="name" class="form-control" required="" value="<?php echo $name ?>">
					</div>
				</div>    
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Userame</label>
						<input name="username" class="form-control" required=""  value="<?php echo $user ?>" ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Gender</label>
						<input name="gender" type="text" class="form-control" >
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Address</label>
							<input name="address" id="" cols="30" rows="2" class="form-control" required="">
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Contact #</label>
						<input type="number" class="form-control" name="contact" >">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Email</label>
							<input type="email" class="form-control" name="email" >">
				</div>
			</div>
            <div class="row form-group">
				<div class="col-md-6">
							<label for="">Password</label>
							<input type="password" class="form-control" name="pass" >">
				</div>
			</div>
            <div class="row form-group">
				<div class="col-md-6">
							<label for="">Confirmed Password</label>
							<input type="password" class="form-control" name="co_pass" >">
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	 $('#manage-borrower').submit(function(e){
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