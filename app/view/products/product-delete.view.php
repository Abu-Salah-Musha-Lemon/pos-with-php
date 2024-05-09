
<?php require_once view_path("parthian/header"); //header("refresh:5");?>

<div class="container-fluid shadow-sm p-2">
   <center><h2><?=esc(APP_NAME)?></h2></center>

</div>
<div class="container-fluid col-6">
   <?php if(!empty($row)):?>
      <form class="row shadow-sm m-4 ms-auto" method="post" enctype='multipart/form-data'>

         <div class="card">
            <div class="card-body">
               <center><h2><i class="bi bi-trash"></i>  Delete  Product </h1></center>
               <div class="alert alert-danger text-center">Are you sure Delete  the Product </div>

               

               <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input name="description"  value="<?=set_value('description',$row['description'])?>"  type="text" class="form-control shadow-none <?=!empty($errors['description'])?'border-danger':''?>" id="description" name ="description" disabled>
                  <?php if (!empty($errors['description'])) {?>
                    <br> <small class="text-danger col-12"><?= $errors["description"]?></small>
                  <?php }?>
               </div>

               <div class="mb-3">
                  <label for="products_barcode" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                  <input type="text" value="<?=set_value('barcode',$row['barcode'])?>" name="" class="form-control shadow-none <?=!empty($errors['barcode'])?'border-danger':''?>" id="products_barcode" name ="products_barcode" disabled>
                  <?php if (!empty($errors['barcode'])) {?>
                    <br> <small class="text-danger col-12"><?= $errors["barcode"]?></small>
                  <?php }?>
               </div>



               <button type="submit" class="btn btn-danger  shadow-none float-end">Delete <i class="bi bi-trash"></i></button>

               <a href="index.php?page_name=admin&$tab=products"class="btn btn-primary shadow-none"> <i class="bi bi-arrow-left-square"></i> Cancel</a>
            </div>
         </div>

      </form>
      <?php else:?>
         <div class="mb-3 mx-2 my-2">
            The product is not found . <br>
            <a href="index.php?page_name=admin&$tab=products"class="btn btn-danger shadow-none  btn-sm">Back to products</a>
         </div>
      <?php endif;?>
</div>

<?php require_once view_path("parthian/footer");?>