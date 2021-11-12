     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<div id="top">
        <?php
    include_once("connection.php");
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$result = pg_query($conn,"Select * from shop Where shop_id='$id'");
		$row=pg_fetch_array($result);
		$shop_id=$row['shop_id'];
		$shop_name=$row['shop_name'];
		$shop_address=$row['shop_address'];
		$shop_tel=$row['shop_tel'];
        ?>
        <?php
   if(isset($_POST["btnUpdate"]))
   {
	   $id=$_POST["txtID"];
	   $name=$_POST["txtName"];
	   $address=$_POST["txtAddress"];
	   $tel=$_POST["txtTel"];
	   $err="";
	   if($name==""){
		   $err.="Enter Shop Name, please";
	   }
	   if($address==""){
		   $err.="Enter Shop Address, please";
	   }
	   if($tel==""){
		   $err.="Enter Shop Telephone, please";
	   }
	   if($err!=""){
		   echo "<ul>$err</ul>";
	   }
	   else
	   {
		   $sq="select * from shop where shop_id !='$id' and Shop_Name='$name'";
		   $result = pg_query($conn,$sq);
		   if(pg_num_rows($result)==0)
		   {
			   pg_query($conn,"UPDATE shop Set Shop_Name ='$name',Shop_address='$address' ,Shop_tel ='$tel' where Shop_ID='$id'");
			   echo '<meta http-equiv="refresh" content="0,URL=?page=shop_management"/>';
		   }
		   else
		   {
			   echo "<li>Duplication Shop Name</li>";
		   }
	   }
   }
        ?>  
<div class="container">
	<h2>Updating Product Category</h2>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" readonly 
								  value='<?php echo $shop_id;?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value='<?php echo $shop_name;?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Shop Address(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtAddress" id="txtDes" class="form-control" placeholder="Shop Address" 
								  value='<?php echo $shop_address; ?>'>
							</div>
					</div>
                  <div class="form-group">
                      <label for="txtMoTa" class="col-sm-2 control-label">Shop Tel(*):  </label>
                      <div class="col-sm-10">
                          <input type="text" name="txtTel" id="txtTel" class="form-control" placeholder="Shop Telephone"
                              value='<?php echo $shop_tel; ?>' />
                      </div>
                  </div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=shop_management'" />
                              	
						</div>
					</div>
				</form>
	</div>
    
	 <?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0,URL=?page=category_management"/>';
	}
	?>

 
	 </div> 