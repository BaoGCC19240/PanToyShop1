<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<div id="top">
    <?php
 if(isset($_POST['btnRegister']))
 {
     $us=$_POST['txtUsername'];
     $fullname=$_POST['txtFullname'];
     $pass1=$_POST['txtPass1'];
     $pass2=$_POST['txtPass2'];
     $email=$_POST['txtEmail'];
     $tel=$_POST['txtTel'];
     $address=$_POST['txtAddress'];

     if(isset($_POST['grpRender']))
     {
         $sex=$_POST['grpRender'];
     }
          $err="";
          if($us==""||$fullname==""||$pass1==""||$pass2==""||$email=="" ||$address==""||!isset($sex))
     {
         $err.="<li>Enter fields with mark(*),please</li>";
     }
     if(strlen($pass1)<=5){
         $err.="<li>Password must be greater than 5 characters</li>";
     }
     if($pass1!=$pass2){
        $err.="<li>Password and confirm password are not the same</li>";
    }
    if($err!=""){
        echo $err;
    }
    else{
        include_once('connection.php');
        $pass=md5($pass1);
        $sq="select * from customer where username='$us' or cust_email='$email'";
        $res=pg_query($conn,$sq);
        if(pg_num_rows($res)==0){
            pg_query($conn,"Insert into customer (username, cust_name, password, cust_email, cust_tel, cust_address, gender, state) values('$us','$fullname','$pass','$email','$tel','$address','$sex',0)");
            echo"You have registered successfully";
        }
        else{
            echo"Username or password already exists";
        }
    }
 }
    ?>
<div class="container">
        <h2>Member Registration</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label bre">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtUsername" id="txtUsername" class="form-control bre" placeholder="Username" value=""/>
							</div>
                      </div>  
                      
                      <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label bre">Full name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control bre" placeholder="Enter Fullname"/>
							</div>
                       </div> 

                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label bre">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control bre" placeholder="Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label bre">Confirm Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control bre" placeholder="Confirm your Password"/>
							</div>
                       </div>     
                       
                       
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label bre">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control bre" placeholder="Email"/>
							</div>
                       </div>  

                       <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label bre">Telephone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="" class="form-control bre" placeholder="Telephone" />
							</div>
                         </div> 
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label bre">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="" class="form-control bre" placeholder="Address"/>
							</div>
                        </div>  
                        
                         
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label bre">Gender(*):  </label>
							<div class="col-sm-10 bre">                              
                                      <label class="radio-inline bre"><input type="radio" name="grpRender" value="0" id="grpRender"  />
                                      Male</label>
                                    
                                      <label class="radio-inline bre"><input type="radio" name="grpRender" value="1" id="grpRender" />
                                      
                                      Female</label>
							</div>
                          </div> 
                          
                          
					<div class="form-group">
						<div class="col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              <input type="button" name="btnCancel"  class="btn btn-primary bre" id="btnCancel" value="Cancel" onclick="window.location='index.php'" />	
						</div>
                     </div>
				</form>
</div>
</div>
    

