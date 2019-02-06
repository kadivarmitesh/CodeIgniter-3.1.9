<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>


<div class="container">
<?php if($users!=null && $users!=""){  foreach ($users as $user){ ?>
<h1 style="display: inline;">Welcome</h1> <h3 style="display: inline; margin-left: 10px; color: red;"><?php echo $user->name; ?></h3>
				
	<label style="color: blue; display: block;">You email :- </label><h4><?php echo $user->email; ?></h4>
	<?php  $path = $user->filename ?>

	<img src="<?php echo base_url(); ?>uploads/<?php echo $path; ?>" width="110px;" height="120px;">
	<h3><?php echo anchor('dashboard/logout', 'Logout') ?>
</h3>

<?php  }} ?>

</div>
<hr>
<!--Table-->
<table class="table table-striped1 w-auto " style="margin-left:450px;">

  <!--Table head-->
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>MobileNo</th>
      <th>City</th>
      <th>Avtar</th>
      <th>Action</th>
    </tr>
  </thead>
  <!--Table head-->

  <!--Table body-->
  <tbody>
    <?php $no=1;

    foreach ($members as $member) {
      if($no%2 != 0)
      {
      ?>
      <tr class="table-info">
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $member->name; ?></td>
      <td><?php echo $member->email; ?></td>
      <td><?php echo $member->mobile;?></td>
      <td><?php echo $member->address;?></td>
      <td><?php $path = $member->filename;?><img src="<?php base_url(); ?>uploads/<?php echo $path; ?>" alt="" style="width: 50px; height: 50px;"></td>
      <td><button type="button" class="btn btn-danger" onclick="deleteuser()">Delete</button></td>
      </tr>
    <tr>
      <?php
      }  
      else
      {
      ?>
      <tr style="background: #f2f2f2;">
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $member->name; ?></td>
      <td><?php echo $member->email; ?></td>
      <td><?php echo $member->mobile;?></td>
      <td><?php echo $member->address;?></td>
      <td><?php $path = $member->filename;?><img src="<?php base_url(); ?>uploads/<?php echo $path; ?>" alt="" style="width: 50px; height: 50px;"></td>
      <td><button type="button" class="btn btn-danger" onclick="deleteuser(<?php echo $member->id; ?>)">Delete</button>
</td>
      </tr>
      <?php
      }

      $no++;
    }

    ?>
    
  </tbody>
  <!--Table body-->


</table>
<!--Table-->

<hr>	
	<div class="container">
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">
  Add Brand
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form action="brand/addbrand" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Brand</label>
		    <?php echo form_error('brand'); ?>
		    <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand"><?php echo form_error('brand'); ?>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		  <button type="reset" class="btn btn-default">Reset</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>		

	</div>

  <div class="container box">
   <h1 align="center">Display Brand</h1>
   <br />
   <!-- Sucess message  -->
  
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-success" id="update">
                  Brand Updated Successfully
              </div>
              
            </div>
          </div>
  <!-- End flashdata for sucess message -->
   <div class="table-responsive">
   <br />
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Brand Name</th>
       <th>Delete</th>
      </tr>
      </thead>
      <tbody>
            <?php foreach ($brand as $row){ ?>
      	<tr id="<?php echo $row->id; ?>" class="edit_tr">

      		<td class="edit_td">
            <span id="first_<?php echo $row->id; ?>" class="text"><?php echo $row->brand_name; ?></span>
            <input type="text" value="<?php echo $row->brand_name; ?>" class="editbox" id="first_input_<?php echo $row->id; ?>">

            <!-- <?php //echo $row->brand_name; ?>          -->
          </td>
      		<td><a href="#" onclick="DELETE(<?php echo $row->id; ?>)">Delete</a></td>
     
      	</tr>
 <?php } ?>
    </tbody>
    </table>
   </div>
  </div>

</body>
</html>
<script type="text/javascript">

  $(document).ready( function () {
    $('#user_data').DataTable();
  });

  function DELETE(id)
  {
  	var url="<?php echo base_url();?>";
  	var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"dashboard/deletebrand/"+id;
        else
          return false;
   }


  $(".edit_tr").click(function()
  {
    var ID=$(this).attr('id');
    $("#first_"+ID).hide();
    $("#first_input_"+ID).show();

  }).change(function()
  {
    var ID=$(this).attr('id');
    var first=$("#first_input_"+ID).val();
    //var dataString = 'id='+ ID +'&firstname='+first;
    //$("#first_"+ID).html('<img src="load.gif" />'); // Loading image

    if(first.length>0)
    {

    $.ajax({  
    type: "POST",
    url: "<?php echo base_url(); ?>dashboard/Editdata",
   /* dataType : "json",*/
    data: {"<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>","id" : ID, "firstname" : first},
    cache: false,
    success: function(html)
    {
    $("#first_"+ID).html(first);
    $("#update").show();
    }
    });
   
    }
    /*else
    {
    alert('Enter something.');
    }*/

  });

  // Edit input box click action
  $(".editbox").mouseup(function() 
  {
    return false
  });
 $(".editbox").hide();
 $("#update").hide();
  // Outside click action
  $(document).mouseup(function()
  {
    $(".editbox").hide();
    $(".text").show();
  });


  function deleteuser(id)
  {
    var url="<?php echo base_url();?>";
    var r=confirm("Do you want to delete this User?")
        if (r==true)
          window.location = url+"dashboard/deleteuser/"+id;
        else
          return false;
         
  }


</script>
