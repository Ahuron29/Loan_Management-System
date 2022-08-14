<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Payment List</b>
					<button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button" id="new_payments"><i class="fa fa-plus"></i> New Payment</button>
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="loan-list">
					<colgroup>
						<col width="5%">
						<col width="18%">
						<col width="22%">
						<col width="15%">
						<col width="10%">
						<col width="20%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Account No.</th>
							<th class="text-center">Payee</th>
							<th class="text-center">Amount</th>
							<th class="text-center">Savings</th>
							<th class="text-center">Date</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$i=1;
							
							$qry = $conn->query("SELECT p.*,l.ref_no,concat(b.name,', ',b.username) as name, b.contact, b.address from payments p inner join loan_list l on l.id = p.loan_id inner join borrowers b on b.id = l.borrower_id  order by p.id asc");
							while($row = $qry->fetch_assoc()):
						 ?>
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<?php echo $row['ref_no'] ?>
						 	</td>
						 	<td>
						 		<?php echo $row['payee'] ?>
						 		
						 	</td>
						 	<td>
						 		<?php echo number_format($row['amount'],2) ?>
						 		
						 	</td>
							 <td>
						 		<?php echo number_format($row['savings'],2) ?>
						 		
						 	</td>
							 <td>
								 
						 		<?php $date = $row['date_created'];
								 echo date($date) ?>
						 		
						 	</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_payment" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_payment" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				<table class="table table-bordered" id="loan-list"><br><br>
					<colgroup>
						<col width="10%">
						<col width="50%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
						<?php 
                        $amount = $conn->query("SELECT sum(amount) as total FROM payments ");
						$amount =  $amount->num_rows > 0 ? $amount->fetch_array()['total'] : "0";
						$payments = $conn->query("SELECT sum(savings) as total FROM payments ");
						$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                    ?>
						<tbody>
							<td></td><td><b> Total</b></td>
							<td> <b><?php echo $amount; ?></b></td>
							<td><b><?php echo $payments; ?></b></td>
							<td></td>
						</tbody>
					</colgroup>
				<table>
                      <tr>
					  </tr>
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
	$('#loan-list').dataTable()
	$('#new_payments').click(function(){
		uni_modal("New Payment","manage_payment.php",'mid-large')
	})
	$('.edit_payment').click(function(){
		uni_modal("Edit Payment","manage_payment.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_payment').click(function(){
		_conf("Are you sure to delete this data?","delete_payment",[$(this).attr('data-id')])
	})
function delete_payment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Payment successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>