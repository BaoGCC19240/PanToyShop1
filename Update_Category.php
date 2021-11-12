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
		$result = pg_query($conn,"Select * from category Where Cat_ID='$id'");
		$row=pg_fetch_array($result);

   if(isset($_POST["btnUpdate"]))
   {
	   $id=$_POST["txtID"];
	   $name=$_POST["txtName"];
	   $des=$_POST["txtDes"];
	   $name=htmlspecialchars(pg_escape_string($conn,$name));
       $des=htmlspecialchars(pg_escape_string($conn,$des));
	   $err="";
	   if($name==""){
		   $err.="Enter Category Name, please";
	   }
	   if($err!=""){
		   echo "<ul>$err</ul>";
	   }
	   else
	   {
		   $sq="select * from category where Cat_ID !='$id' and Cat_Name='$name'";
		   $result = pg_query($conn,$sq);
		   if(pg_num_rows($result)==0)
		   {

			   pg_query($conn,"UPDATE category Set Cat_Name ='$name',Cat_Desc='$des' where Cat_ID='$id'");
			   echo '<meta http-equiv="refresh" content="0,URL=?page=category_management"/>';
		   }
		   else
		   {
			   echo "<li>Duplication category Name</li>";
		   }
	   }
   }
        ?>  
<div class="container">
	<h2>Updating Product Category</h2>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" readonly 
								  value='<?php echo $row['cat_id'];?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value="<?php echo $row['cat_name'];?>">
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
                                <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description"
                                    value="<?php echo $row['cat_desc']; ?>" />
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=category_management'" />
                              	
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