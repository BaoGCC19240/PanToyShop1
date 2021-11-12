   <link rel="stylesheet" href="css/bootstrap.css">
   <div id="top">
        <form name="frm" method="post" action="">
        <h1>Shop Management</h1>
        <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_shop"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="90%">
            <thead>
                <tr>
                    <th align="center"><strong>No.</strong></th>
                    <th align="center">
                        <strong>Shop Name</strong>
                    </th>
                    <th align="center">
                        <strong>Address</strong>
                    </th>
                    <th align="center">
                        <strong>Tel</strong>
                    </th>
                    <th align="center">
                        <strong>Edit</strong>
                    </th>
                    <th align="center">
                        <strong>Delete</strong>
                    </th>
                </tr>
             </thead>

			<tbody>
            <script language="javascript">
            function deleteConfirm(){
                if(confirm("Are you sure to delete!")){
                    return true;
                }
                else{
                    return false;
                }
            }
            </script>
            <?php
            include_once("connection.php");
            if(isset($_GET["function"])=="del"){
                if(isset($_GET['id'])){
                    $id=$_GET["id"];
                    pg_query($conn,"Delete from shop where shop_id ='$id'");
                    
                }
            } 
            ?>
                <?php
            include_once("connection.php");
            $No=1;
            $result =pg_query($conn,"Select * from shop");
            while($row=pg_fetch_array($result))
            {
                ?>
			<tr>
                <td class="cotCheckBox">
                    <?php echo $No;?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['shop_name']; ?>
                </td>
              
                <td class="cotCheckBox">
                    <?php echo $row['shop_address']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['shop_tel']; ?>
                </td>

              <td style='text-align:center'><a href="?page=update_shop&&id=<?php echo $row['shop_id'];?>"><img src='images/edit.png' border='0' /></a></td>
              <td style='text-align:center'>
              <a href="?page=shop_management&&function=del&&id=<?php echo $row['shop_id']; ?>" onclick="return deleteConfirm()">
              <img src='images/delete.png' border='0' /></td>
            </tr>
            <?php
                $No++;
                }
            ?>
			</tbody>
        </table>  
        
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>
            </div>

   