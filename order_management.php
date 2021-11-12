   <link rel="stylesheet" href="css/bootstrap.css">
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
   <div id="top">
        <form name="frm" method="post" action="">
        <h1>Order Management</h1>
        
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="90%">
            <thead>
                <tr>
                    <th align="center"><strong>No.</strong></th>
                    <th align="center">
                        <strong>Order Date</strong>
                    </th>
                    <th align="center">
                        <strong>Order Id</strong>
                    </th>
                    <th align="center">
                        <strong>Customer Name</strong>
                    </th>
                    <th align="center">
                        <strong>Customer Address</strong>
                    </th>
                    <th align="center">
                        <strong>Customer Tel</strong>
                    </th>
                    <th align="center">
                        <strong>Product Name</strong>
                    </th>
                    <th align="center">
                        <strong>Product Quantity</strong>
                    </th>

                    <th align="center">
                        <strong>Order total</strong>
                    </th>
                    <th align="center">
                        <strong>Order status</strong>
                    </th>
                    <th align="center">
                        <strong>Confirm</strong>
                    </th>
                    <th align="center">
                        <strong>Delete</strong>
                    </th>
                    
                </tr>
             </thead>

			<tbody>
            
                <?php
            include_once("connection.php");
            if(isset($_GET["function"])){
                if(isset($_GET['id'])){
                    $id=$_GET["id"];}
                if($_GET["function"]=="del"){
                    pg_query($conn,"Delete from orderdetail where or_id ='$id'");
                    var_dump($_GET["function"]);
                }
                if($_GET["function"]=="confirm"){
                    pg_query($conn,"update orderdetail set or_status ='confirmed' where or_id =$id");
                    var_dump($_GET["function"]);
                }
            }
                ?>
                <?php
            include_once("connection.php");
            $No=1;
            $result =pg_query($conn,"Select or_date, or_id, ord.username, cust_address, cust_tel, pro_name ,or_qty,
or_amount, or_status from orderdetail ord , product pr ,customer cus
where ord.username = cus.username and pr.pro_id = ord.pro_id
order by or_id DESC");
            while($row=pg_fetch_array($result))
            {
                ?>
			<tr>
                <td class="cotCheckBox">
                    <?php echo $No;?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['or_date']; ?>
                </td>
              
                <td class="cotCheckBox">
                    <?php echo $row['or_id']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['username']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['cust_address']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['cust_tel']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['pro_name']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['or_qty']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['or_amount']; ?>
                </td>
                <td class="cotCheckBox">
                    <?php echo $row['or_status']; ?>
                </td>

              <td style='text-align:center'><a href="?page=order_management&&function=confirm&&id=<?php echo $row['or_id']; ?>">
    <img src='images/tick.png' border='0' filter: blur(5px); />
</a></td>
              <td style='text-align:center'>
              <a href="?page=order_management&&function=del&&id=<?php echo $row['or_id']; ?>" onclick="return deleteConfirm()"/>
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

   