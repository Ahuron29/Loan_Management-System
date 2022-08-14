<?php include 'db_connect.php' ?>
<?php 
//extract($_POST);
if(isset($id)){
	$qry = $conn->query("SELECT * FROM payments where id=".$_POST['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}
$loan = $conn->query("SELECT l.*,concat(b.name,', ',b.username)as name, b.username,  b.contact, b.address from loan_list l inner join borrowers b on b.id = l.borrower_id where l.id = ".$_POST['loan_id']);
foreach($loan->fetch_array() as $k => $v){
	$meta[$k] = $v;
}
$type_arr = $conn->query("SELECT * FROM loan_types where id = '".$meta['loan_type_id']." ' ")->fetch_array();

$plan_arr = $conn->query("SELECT * /*,concat(months,' month/s [ ',interest_percentage,'%, ',penalty_rate,' ]') as plan*/ FROM loan_plan where id  = '".$meta['plan_id']."' ")->fetch_array();
$monthly = ($meta['amount'] + ($meta['amount'] * ($plan_arr['interest_percentage']/100))) / $plan_arr['months'];
//$penalty = $monthly * ($plan_arr['penalty_rate']/100);
$payments = $conn->query("SELECT * from payments where loan_id =".$_POST['loan_id']);
$paid = $payments->num_rows;
$offset = $paid > 0 ? " offset $paid ": "";


?>
<div class="col-lg-12">
<hr>
<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			<label for="">Payee</label>
			<input name="payee" class="form-control" required="" value="<?php echo isset($payee) ? $payee : (isset($meta['name']) ? $meta['name'] : '') ?>">
		</div>
	</div>
	
</div>
<hr>
<div class="row">
	<div class="col-md-5">
		<p><small>Weekly Amount: <b><?php echo number_format($monthly/4,2) ?></b></small></p>
		<p><small>Total Savings: <b><?php echo "10 - 100"; ?></b></small></p>
		<p><small>Payable Amount: <b><?php echo number_format($monthly,2) ?></b></small></p>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="">Amount</label>
			<input type="number" name="amount" class="form-control text-left" required="" value="<?php echo number_format($monthly/4,2) ?>">
			<label for="">Savings</label>
			<input type="number" name="savings" step="any" min="10" class="form-control text-right" required="" value="<?php echo isset($savings) ? $savings : '' ?>">
			<input type="hidden" name="loan_id" value="<?php echo $_POST['loan_id'] ?>">
			<input type="hidden" name="overdue" value="<?php echo $add > 0 ? 1 : 0 ?>">
			<input type="hidden" name="username" value="<?php echo $meta['username']; ?>">
		</div>
	</div>
</div>
</div>