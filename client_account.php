<?php include('db_connect.php'); 

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
    <?php
$loan = $conn->query("SELECT amount as total from payements p inner join borrowers b on b.id = p.borrower_id");
foreach($loan->fetch_array() as $k => $v){
	$meta[$k] = $v;
}
//echo $username;
/*$sel="SELECT * FROM `client` where username='".$_SESSION['login_name']."'" ;
$str= mysqli_query($conn, $sel);
$rows= mysqli_num_rows($str);
  while($row=mysqli_fetch_array($str)){
   $_SESSION['id'] = $row['id'];
  */
?>
	<div class="row">
    <div class="col-lg-12">

    </div>
    </div>
    <br>
    <div class="row">
    <div class="card col-lg-12">
                <div class="card-body">
                  <table class="table-striped table-bordered col-md-12">
                    <thead>
                      <th class="text-center col-md-6">Name</th>
                      <th class="text-center col-md-6">Username</th>
                    </thead>
                    <tbody>
                      <td class="text-center col-md-6"><?php echo $meta['username']  ?></td>
                      <td class="text-center col-md-6"><?php //echo $meta['username']  ?></td>
                    </tbody>
                  </table><br><br>
                  <table class="table-striped table-bordered col-md-12">
                    <thead>
                      <th class="text-center col-md-6">Emaiil</th>
                      <th class="text-center col-md-6">Voters ID</th>
                    </thead>
                    <tbody>
                      <td class="text-center col-md-6"><?php //echo $meta['email']  ?></td>
                      <td class="text-center col-md-6"><?php //echo $met['voters_id']  ?></td>
                    </tbody>
                  </table><br><br>
                  <table class="table-striped table-bordered col-md-12">
                    <thead>
                      <th class="text-center col-md-6">Contact</th>
                      <th class="text-center col-md-6">Address</th>
                    </thead>
                    <tbody>
                      <td class="text-center col-md-6"><?php //echo '0'.$meta['contact']  ?></td>
                      <td class="text-center col-md-6"><?php// echo $meta['address']  ?></td>
                    </tbody>
                  </table><br>
                </div>
            </div>
	</div>

</div>
    </main>    <?php // } ?>
<script>
	$('#manage_profile').click(function(){
	uni_modal('Edit your Crendentials here','manage_profile.php')
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
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Update</button>
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
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>	
</html>