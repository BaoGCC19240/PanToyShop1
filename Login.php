
<link rel="stylesheet" href="css/bootstrap.min.css">
<div id="top">
    <?php
if(isset($_POST['btnLogin'])){
    $us =$_POST['txtUsername'];
    $pa=$_POST['txtPass'];

    $err="";
    if($us==""){
        $err.="Enter Username, please<br/>";
    }
    else if($pa==""){
        $err.="Enter Password, please<br/>";
    }

   if($err != ""){
        echo $err;
   }
    else{
        include_once('connection.php');
        $us=pg_escape_string($us);
        $pass=md5("$pa");
        $sq = "Select username, password, state from customer where username='$us' and password='$pass'";
        $res= pg_query($conn,$sq);
        $check = pg_num_rows($res);
        $row = pg_fetch_row($res);
        if($check==1)
        {
            $_SESSION["us"]=$us;
            $_SESSION["admin"]=$row[2];
            echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';

        }
        else
        {
            echo "Username or password is incorrect, please login again";
        }
    }
}

    ?>

<form id="form1" name="form1" method="POST">

<div class="container">	
<h1>Login</h1>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Username(*)</label>
  <input type="text" name="txtUsername" id="txtUsername" class="form-control" id="exampleFormControlInput1" placeholder="Username">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Password(*)</label>
  <input type="password" name="txtPass" id="txtPass" class="form-control" id="exampleFormControlInput1" placeholder="Password">
</div>
<div class="form-group"> 
        <div class="col-sm-10">
        	<input type="submit" name="btnLogin"  class="btn btn-primary bre" id="btnLogin" value="Login"/>
            <input type="button" name="btnCancel"  class="btn btn-primary bre" id="btnCancel" value="Cancel" onclick="window.location='index.php'" />
		</div>  
	</div>
</div>

</form>
</div>


   