<?php include('db_connect.php'); 
/*
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}*/
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-borrower">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="" class="control-label">Name</label>
						<input name="name" class="form-control" required placeholder="Name" value="<?php echo isset($name) ? $name : '' ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">User Name</label>
						<input name="username" class="form-control" placeholder="Username" required="" value="<?php echo isset($username) ? $username : '' ?>">
					</div>
				</div>
                <div class="col-md-3">
					<label for="">Amount GHS</label>
					<input type="number" class="form-control" name="amount_needed" required placeholder="Amount Needed" value="<?php echo isset($amount_needed) ? $amount_needed : '' ?>">
				</div>
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
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="">Address</label>
					<textarea name="address" id="" cols="30" rows="2" class="form-control" required=""><?php echo isset($address) ? $address : '' ?></textarea>
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Contact #</label>
						<input type="text" placeholder="Contact Number" class="form-control" name="contact" value="<?php echo isset($contact) ? $contact : '' ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<label for="">Email</label>
					<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($email) ? $email : '' ?>">
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Voters ID</label>
						<input type="text" class="form-control" placeholder="Voters ID Number" name="voters_id" value="<?php echo isset($voters_id) ? $voters_id : '' ?>">
					</div>
				</div>
			</div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label class="control-label">Months</label>
					<?php
						$type = $conn->query("SELECT months from loan_plan");
					?>
					<select name="months" id="" class="custom-select browser-default select2">
                        <option value=""><!--Select Group name here--></option>
							<?php while($row = $type->fetch_assoc()): ?>
						<option value="<?php echo $row['months'];?>"><?php echo $row['months']. ' Months'; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
                <div class="col-md-9">
                    <label class="control-label">Check -> Group Name || Meeting Place || Officer</label>
					<?php
						$type = $conn->query("SELECT * from groups");
					?>
					<select class="custom-select browser-default select2">
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
					<select name="group_name" id="" class="custom-select browser-default select2">
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
					<select name="meeting_place" id="" class="custom-select browser-default select2">
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
					<select name="officer_name" id="" class="custom-select browser-default select2">
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
	 				alert_toast("Borrower Created successfully.","success");
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