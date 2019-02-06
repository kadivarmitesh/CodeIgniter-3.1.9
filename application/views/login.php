<html>
<head>
<title>Insert Data Into Database Using CodeIgniter Form</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'/>
<style type="text/css">
	
	#container {
width:960px;
height:610px;
margin:50px auto
}
.error {
color:red;
font-size:13px;
margin-bottom:-15px
}
form {
width:345px;
padding:0 50px 20px;
background:linear-gradient(#fff,#FF94BB);
border:1px solid #ccc;
box-shadow:0 0 5px;
font-family:'Marcellus',serif;
float:left;
margin-top:10px
}
h1 {
text-align:center;
font-size:28px
}
hr {
border:0;
border-bottom:1.5px solid #ccc;
margin-top:-10px;
margin-bottom:30px
}
label {
font-size:17px
}
input {
width:100%;
padding:10px;
margin:6px 0 20px;
border:none;
box-shadow:0 0 5px
}
input#submit {
margin-top:20px;
font-size:18px;
background:linear-gradient(#22abe9 5%,#36caf0 100%);
border:1px solid #0F799E;
color:#fff;
font-weight:700;
cursor:pointer;
text-shadow:0 1px 0 #13506D
}
input#submit:hover {
background:linear-gradient(#36caf0 5%,#22abe9 100%)
}

</style>
</head>
<body>

<div id="container">
<?php echo form_open('Welcome/Login'); ?>
<h1>Login </h1><hr/>
<?php
   if($this->session->flashdata('email_sent'))
   {
      echo $this->session->flashdata('email_sent');
      echo "<br>";
   }
?>
<?php if (isset($message)) { ?>	
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
 <?php
          if($error=$this->session->flashdata('log_fail')):
          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-danger">
                <?= $error; ?>
              </div>
              
            </div>
          </div>
         <?php endif; ?>
<?php echo form_label('Student Email :'); ?> <?php echo form_error('demail'); ?><br />
<?php echo form_input(array('id' => 'demail', 'name' => 'demail', 'value'=>set_value('demail'))); ?><br />

<?php echo form_label('Student Password :'); ?> <?php echo form_error('dpass'); ?><br />
<?php echo form_password(array('id' => 'dpass', 'name' => 'dpass', 'value'=>set_value('dpass'))); ?><br />

<?php echo form_submit(array('id' => 'submit', 'value' => 'Login')); ?>

<?php echo anchor('Welcome', 'Signup', 'class="link-class"') ?>


<?php echo form_close(); ?><br/>
<div id="fugo">

</div>
</div>
</body>
</html>

