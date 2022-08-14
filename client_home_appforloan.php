<?php
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Client Page | Adehyeman Savings and Loan </title>
 	
  <?php  include ('links.php'); ?>
    <main id="view-panel" >
    <div class="container-fluid">

	<div class="row">
    <div class="col-lg-12">
        <a  style="margin-top:10px;" class="btn btn-primary float-right btn-sm" id="new_borrower"><i class="fa fa-plus"></i> Apply loan here</a>
    </div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
        <h3 class="text-center">Loan Information Details</h3>
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
          <th class="text-center">ID</th>
					<th class="text-center">Loan Types</th>
					<th class="text-center">Decription</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM loan_types");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr><td class="text-center"> <?php echo $i++ ?></td>
				 	<td class="text-center">
				 		<?php echo $row['type_name'] ?>
				 	</td>
				 	<td class="text-center">
				 		<?php echo $row['description'] ?>
				 	</td>
           </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
    <br><br>
    <div class="text-center"><h3 class="text-center">Loan Information Details</h3></div>
    <table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
          <th class="text-center">ID</th>
					<th class="text-center">Months</th>
					<th class="text-center">Interest (%)</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM loan_plan");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr><td class="text-center"> <?php echo $i++ ?></td>
				 	<td class="text-center">
				 		<?php echo $row['months'] ?>
				 	</td>
				 	<td class="text-center">
				 		<?php echo $row['interest_percentage'] ?>
				 	</td>
           </tr>
				<?php endwhile; ?>
			</tbody>
    </table>
			</div>
		</div>
	</div>

</div>
    </main>
<script>
	$('#new_borrower').click(function(){
		uni_modal("","manage_borrower_client.php",'mid-large')
	})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>  	

  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
</body>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>	
</html>