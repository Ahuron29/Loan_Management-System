<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>LMS ASL Online System</title>
    <link rel="shortcut icon" href="../assets/adehyeman-logo.jfif">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mobile-style.css">
</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/adehyeman-logo.jfif" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-align-justify text-light"></i>
        </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Apply for Loan<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Loan<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 highten col-sm-12  text-white">
                </div>
            </div>
        </div>
    </header>
    <footer>
        <div class="container-fluid p-0">
            <div class="row text-left">
                <div class="col-md-12 col-sm-12">
                    <p class="pt-4 text-white">Copyright ©2019 All rights reserved | This project was design by Group <span>Eleven (G11) </span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script>
	
    $('#new_user').click(function(){
        uni_modal('New User','manage_user.php')
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
</body>

</html>