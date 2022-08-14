<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Borrower List
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_borrower"><i class="fa fa-plus"></i> New Borrower</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="borrower-list">
					<colgroup>
					    <col width="10%">
						<col width="30%">
						<col width="30%">
						<col width="20%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Borrower</th>
							<th class="text-center">Loan Info</th>
							<th class="text-center">Ongoing Loan</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
							$qry = $conn->query("SELECT * FROM borrowers order by id desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<p><small> Name:<?php echo ' '.ucwords($row['name']) ?></small></p>
						 		<p><small>Address:<?php echo ' '.$row['address'] ?></small></p>
								<p><small>Username:<?php echo ' '.$row['username'] ?></small></p>
						 		<p><small>Contact #:<?php echo ' '.'0'.$row['contact'] ?></small></p>
						 		<p><small>Email: <?php echo ' '.$row['email'] ?></small></p>
						 		<p><small>Voters ID: <?php echo ' '.$row['voters_id'] ?></small></p>
						 	</td>
							 <td>
						 		<p><small>Loan Type: <?php echo ' '.ucwords($row['type_name']) ?></small></p>
						 		<p><small>Month/s: <?php echo ' '.$row['months']. 'Months' ?></small></p>
								 <p><small>Group <b><?php echo ' '.$row['group_name'].''?></b><small> At</small><b><?php echo' '.$row['meeting_place'] ?></b></small></p>
						 		<p><small>Officer Name: <?php echo $row['officer_name'] ?></small></p>
						 		<p><small>Amount Requesting: <?php echo ' '.'GHS'.' '.$row['amount_needed'] ?></small></p>
						 		<p><small>Date Requested: <?php echo ' '.$row['date_created'] ?></small></p>
					
							</td>
							<?php  $sel = $conn->query("SELECT amount FROM loan_list where id =".$row['id']); ?>
						    <td class="text-center">
								<?php
							   
							        while($row = $sel->fetch_assoc()):
										echo 'Ghs '.$row['amount'];
										?>
                            <?php endwhile?> </td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_borrower" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_borrower" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#borrower-list').dataTable()
	$('#new_borrower').click(function(){
		uni_modal("","manage_borrower.php",'mid-large')
	})
	$('.edit_borrower').click(function(){
		uni_modal("Edit borrower","manage_borrower.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_borrower').click(function(){
		_conf("Are you sure to delete this borrower?","delete_borrower",[$(this).attr('data-id')])
	})
function delete_borrower($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_borrower',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("borrower successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>