
<?php //require_once view_path("parthian/header"); //header("refresh:5");?>

<div class="container-fluid row mx-2">

</div>
<div class="table-responsive">
   <table class="table table-striped table-hover">
      <thead>
         <tr>
            <th>Barcode</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Image</th>
            <!-- <th>user id</th>
            <th>views</th> -->
            <th>date</th>
            <th><a href="index.php?page_name=products"class="btn btn-primary shadow-none btn-sm"><i class="bi bi-plus-square-fill"></i> Action</a></th>
         </tr>
      </thead>
      <tbody>
         <?php  if(!empty($products)){
            foreach($products as $product){?>
            <tr>
               <td><?=esc($product['barcode'])?></td>
               <td><a href="index.php?page_name=product-single&id=<?=esc($product['id'])?>"> <?=esc($product['description'])?></a></td>
               <td><?=esc($product['qty'])?></td>
               <td><?=esc($product['amount'])?></td>
               <td><img src="<?=crop($product['image'],400)?>" alt="" srcset="" style=" width:100%; max-width:100px;"></td>
               <!-- <td><?=date('jS M, Y H:i:s a',strtotime($product['date']))?></td> -->
               <td><?=date('jS M, Y',strtotime($product['date']))?></td>
               <td>
                  <a href="index.php?page_name=product-edit&id=<?=esc($product['id'])?>" class="btn btn-success shadow-none btn-sm"><i class="bi bi-pencil-square"></i></a>
                  <a href="index.php?page_name=product-delete&id=<?=esc($product['id'])?>" class="btn btn-danger shadow-none  btn-sm"><i class="bi bi-trash"></i></a>
               </td>
            </tr>
         <?php }}?>
      </tbody>
   </table>
</div>
<?php //require_once view_path("parthian/footer");?>