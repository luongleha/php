      
    <?php 
      include_once('views/layout/headerol.php');
      // var_dump($_SESSION['customer']);
      // die;
     ?>
        
        
        <div  class =container>
         		 <h2 style="text-align: center;">Thông tin</h2>
         		 <?php if(isset($_SESSION['customer'])){ ?>
                <h3 style="text-align: center;"> Tên khách hàng :<?php echo $_SESSION['customer']['name'] ?></h3> 
                 <h3 style="text-align: center;"> Email:  <?php echo $_SESSION['customer']['email'] ?></h3>
                  <h3 style="text-align: center;"> SĐT :<?php echo $_SESSION['customer']['address']?></h3>
                 <!--   <img src="public/image/customer_image/<?= $_SESSION['customer']['image'] ?> " width=200px; height=300px;> -->
                 <?php } ?>