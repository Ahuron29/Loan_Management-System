<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-group">
				<div class="card">
					<div class="card-header">
						   Group Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Group Name</label>
								<input type="text" name="group_name" id="" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">Meeting Place</label>
								<input type="text" class="form-control" name="meeting_place">
							</div>
							<div class="form-group">
								<label class="control-label">Officer Name</label>
								<?php
								$type = $conn->query("SELECT * FROM users where type=2 ");
								?>
									<select name="officer_name" id="officer_name" class="custom-select browser-default select2">
									<option value=""></option>
										<?php while($row = $type->fetch_assoc()): ?>
											<option value="<?php echo $row['name'] ?>" <?php echo isset($officer) && $officer == $row['name'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
										<?php endwhile; ?>
								</select>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Group Details</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$group = $conn->query("SELECT * FROM groups order by id asc");
								while($row=$group->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p><small>Group Name: <b><?php echo $row['group_name'] ?><small></b></p>
										 <p>Meeting Place: <b><?php echo $row['meeting_place'] ?></b></p>
										 <p>Officer Name: <b><?php echo $row['officer_name'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_group" type="button" data-id="<?php echo $row['id'] ?>" data-group_name="<?php echo $row['group_name'] ?>" data-meeting_place="<?php echo $row['meeting_place'] ?>"data-officer_name="<?php echo $row['officer_name'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_group" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	function _reset(){
		$('#cimg').attr('src','');
		$('[name="id"]').val('');
		$('#manage-group').get(0).reset();
	}
	
	$('#manage-group').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_group',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_group').click(function(){
		start_load()
		var group = $('#manage-group')
		group.get(0).reset()
		group.find("[name='id']").val($(this).attr('data-id'))
		group.find("[name='group_name']").val($(this).attr('data-group_name'))
		group.find("[name='meeting_place']").val($(this).attr('data-meeting_place'))
		group.find("[name='officer_name']").val($(this).attr('data-officer_name'))
		end_load()
	})
	$('.delete_group').click(function(){
		_conf("Are you sure to delete this Group?","delete_group",[$(this).attr('data-id')])
	})
	function delete_group($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_group',
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
	$('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>