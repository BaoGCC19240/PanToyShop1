

<div class="row">
                <div class="col-2">
                    <h1>Toys for teenagers<br> High Quality</h1>
                    <p>Toys bring positive benefits to teenagers in their physical and intellectual development.</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/background.png">
                </div>
            </div>

            </div>

            </div>

<h2 class="title">Latest Products</h2>
<div class="row">
    <?php
    include_once('connection.php');
    if(isset($_GET['id'])){
        $cat= $_GET['id'];
        
        $sq= "Select * from product where cat_id ='$cat'";
        $res = pg_query($conn,$sq);
        while($row = pg_fetch_array($res)){
    ?>
    <div class="col-4">
        <img src="images/<?php echo $row['pro_image'];?> " width="200" height="300">
        <h4><?php echo $row['pro_name'];?></h4>
        <p>$<?php echo $row['pro_price'];?></p>
        <a href="add.php?id=<?php echo $row['pro_id'];?>&action=add&page=index" class="btn">Buy Now &#8594;</a>
    </div>

 <?php
        }
    }
 ?>
   
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/Apan.png">
                </div>
                <div class="col-5">
                    <img src="images/jokejolly.png">
                </div>
                <div class="col-5">
                    <img src="images/bandai.png">
                </div>
                <div class="col-5">
                    <img src="images/marvel.png">
                </div>
                <div class="col-5">
                    <img src="images/loz.png">
                </div>
            </div>
        </div>
    </div>
</div>