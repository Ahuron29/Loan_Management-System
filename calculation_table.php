<?php 
include('db_connect.php');
extract($_POST);

$monthly = ($amount + ($amount * ($interest/100))) / $months;

?>
<hr>
<table width="100%">
	<tr>
		<th class="text-center" width="33.33%">Total Payable Amount</th>
		<th class="text-center" width="33.33%">Monthly Payable Amount</th>
		<th class="text-center" width="33.33%">Weekly Amount</th>
	</tr>
	<tr>
		<td class="text-center"><small><?php $month_cal=$amount/100; echo number_format($monthly * $months,2) ?></small></td>
		<td class="text-center"><small><?php echo number_format($monthly,2) ?></small></td>
		<td class="text-center"><small><?php $month_cal=$amount/100; $total_pa=$monthly * $months; $week=4; $weeks=$week*$months; echo number_format($total_pa/$weeks,2)?></small></td>
	</tr>
</table>
<hr>
