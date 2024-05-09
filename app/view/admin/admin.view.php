
<?php require_once view_path("parthian/header"); //header("refresh:5");?>

<div class="container-fluid shadow-sm p-2">
   <center><h2><?=esc(APP_NAME)?></h2></center>

</div>
<center class="my-4"><h2><i class="bi bi-person-gear"></i> Admin </h2></center>
<div class="container-fluid row mx-2">
   <div class="col-12 col-sm-4 col-md-3 col-lg-2">
      <ul class="list-group">

         <a href="index.php?page_name=admin&tab=dashboard"> <li class="list-group-item <?=!$tab|| $tab == 'dashboard'?'active':''?>" ><i class="bi bi-border-all"></i>  Dashboard</li></a>

         <a href="index.php?page_name=admin&tab=user"> <li class="list-group-item <?=$tab =='user'?'active':''?>"><i class="bi bi-person-circle"></i> User</li></a>

         <a href="index.php?page_name=admin&tab=products"> <li class="list-group-item <?=$tab =='products'?'active':''?>"><i class="bi bi-bag-check-fill"></i> Products</li></a>

         <a href="index.php?page_name=logout"> <li class="list-group-item"><i class="bi bi-box-arrow-right"></i> Logout</li></a>
      </ul>
   </div>
   <div class="col">
      <h4><?=strtoupper($tab)?></h4>

      <?php
      switch ($tab) {
         case 'products':
            require_once view_path("admin/products");
            break;
         
         default:
            # code...
            break;
      }
      
      
      ?>
   </div>
</div>

<?php require_once view_path("parthian/footer");?>