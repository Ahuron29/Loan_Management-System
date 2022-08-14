<?php include('db_connect.php'); 

session_start();
/*
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}*/
$sel="SELECT * FROM `client` where username='".$_SESSION['login_name']."'" ;
$str= mysqli_query($conn, $sel);
$rows= mysqli_num_rows($str);
  while($row=mysqli_fetch_array($str)){
   $_SESSION['id'] = $row['id'];
  
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage_client_loan_request">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="control-label">Name</label>
						<input name="name" class="form-control" required="" value="<?php echo $row['name'] ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">User Name</label>
						<input name="username" class="form-control" required="" value="<?php echo $row['username'] ?>">
					</div>
				</div>
                <div class="col-md-4">
					<label for="">Amount</label>
					<input type="number" class="form-control" name="amount_needed" required placeholder="Amount Needed">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Address</label>
							<textarea name="address" cols="30" rows="2" class="form-control" required=""><?php echo $row['address'] ?></textarea>
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Contact #</label>
						<input type="text" class="form-control" name="contact" value="<?php echo '0'.$row['contact'] ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Voters ID</label>
						<input type="text" class="form-control" name="voters_id" value="<?php echo $row['voters_id'] ?>">
					</div>
				</div>
			</div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label class="control-label">Loan Type</label>
					<?php
						$type = $conn->query("SELECT type_name from loan_types");
					?>
					<select name="type_name" id="" class="custom-select browser-default select2">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['type_name'];?>"><?php echo $row['type_name']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
                <div class="col-md-2">
                    <label class="control-label">Months</label>
					<?php
						$type = $conn->query("SELECT months from loan_plan");
					?>
					<select name="months" id="" class="custom-select browser-default select">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['months'];?>"><?php echo $row['months']. ' Months'; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
                <div class="col-md-7">
                    <label class="control-label">Group Name || Meeting Place || Officer</label>
					<?php
						$type = $conn->query("SELECT * from groups");
					?>
					<select class="custom-select browser-default select">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['group_name'].$row['meeting_place'].$row['officer_name'];?>"><?php echo $row['group_name'].' || '.$row['meeting_place'].' || '.$row['officer_name']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
			</div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="" class="text-danger">Select the appoprate detials down below</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <label class="control-label">Group Name</label>
					<?php
						$type = $conn->query("SELECT group_name from groups");
					?>
					<select name="group_name" id="" class="custom-select browser-default select">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['group_name'];?>"><?php echo $row['group_name']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
                <div class="col-md-4">
                    <label class="control-label">Meeting Place</label>
					<?php
						$type = $conn->query("SELECT meeting_place from groups");
					?>
					<select name="meeting_place" id="" class="custom-select browser-default select">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['meeting_place'];?>"><?php echo $row['meeting_place']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
                <div class="col-md-4">
                    <label class="control-label">Officer Name</label>
					<?php
						$type = $conn->query("SELECT officer_name from groups");
					?>
					<select name="officer_name" id="" class="custom-select browser-default select">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['officer_name'];?>"><?php echo $row['officer_name']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
			</div>
            
		</form>
	</div>
</div>
<?php } ?>
<script>
	 $('#manage_client_loan_request').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_borrower',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Request sent successfully.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
	 $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>