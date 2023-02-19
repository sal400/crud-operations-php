<?php
include('database.php');
$obj = new queryz();

//By default field will be empty. 
$name = '';
$email = '';
$mobile = '';
$id = '';

//update:
if(isset($_GET['id']) && $_GET['id'] !=''){ //if id is not empty then it will update, otherwise insert.
	$id = $obj->get_safe_str($_GET['id']);	//fetch id from url
	
	$condition_arr = array('id'=>$id);
	$result = $obj->getData('user', '*', $condition_arr);
	$name = $result[0]['name'];
	$email = $result[0]['email'];
	$mobile = $result[0]['mobile'];
	
	
}

//insert:
if(isset($_POST['submit'])){
	$name = $obj->get_safe_str($_POST['name']);	//fetch data from form's post method.
	$email = $obj->get_safe_str($_POST['email']);
	$mobile = $obj->get_safe_str($_POST['mobile']);
	
	$condition_arr = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile);
	
	if($id==''){
		$obj->insertData('user', $condition_arr);
	}else{
		$obj->updateData('user', $condition_arr, 'id', $id);
	}
?>
	<script>
	window.location.href='users.php';
	</script>
<?php
}
?>
<!doctype html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Manage User - Add/Edit</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	  <style>
		.container{margin-top:100px;}
	  </style>
   </head>
   <body>
      
      <div class="container">
         <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
            <div class="card-body">
               <div class="col-sm-6">
                  <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                  <form method="post">
                     <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="<?php echo $name; ?>">
                     </div>
                     <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required value="<?php echo $email; ?>">
                     </div>
                     <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="mobile" id="mobile"  placeholder="Enter mobile" required value="<?php echo $mobile; ?>">
                     </div>
                     <div class="form-group">
                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> Add/Edit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
   </body>
</html>