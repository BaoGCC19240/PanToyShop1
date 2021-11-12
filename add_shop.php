     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <div id="top">   
        <?php
	include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id =$_POST["txtID"];
		$name = $_POST["txtName"];
		$des = $_POST["txtDes"];
		$tel = $_POST["txtTel"];
		$err="";
		if($id==""){
			$err.="<li>Enter Shop ID, please</li>";
		}
		if($name==""){
			$err.="<li>Enter Shop Name, please</li>";
		}
		if($tel==""){
			$err.="<li>Enter Shop telephone, please</li>";
		}
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$id=htmlspecialchars(pg_escape_string($conn,$id));
			$name=htmlspecialchars(pg_escape_string($conn,$name));
			$des=htmlspecialchars(pg_escape_string($conn,$des));
			$tel=htmlspecialchars(pg_escape_string($conn,$tel));
			$sq="Select * from shop where shop_id='$id' or shop_name='$name'";
			$result=pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn,"INSERT INTO shop (shop_id, shop_name,shop_address,shop_tel)
				VALUES ('$id','$name','$des','$tel')");
				echo '<meta http-equiv="refresh" content="0,URL=?page=shop_management"/>';
			}
			else
			{
				echo "<li>Duplication Shop ID or Name</li>";
			}
		}

	}


        ?>

<div class="container">
	<h2>Adding Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Shop Address" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                  <div class="form-group">
                      <label for="txtMoTa" class="col-sm-2 control-label">Telephone(*):  </label>
                      <div class="col-sm-10">
                          <input type="text" name="txtTel" id="txtTel" class="form-control" placeholder="Shop Telephone" value='<?php echo isset($_POST["txtTel"])?($_POST["txtTel"]):"";?>' />
                      </div>
                  </div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=shop_management'" />
                              	
						</div>
					</div>
				</form>
	</div>
	</div>