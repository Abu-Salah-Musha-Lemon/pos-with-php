<?php require_once view_path("parthian/header");
//header("refresh:5");
?>

   <div class="container-fluid col-lg-5 shadow-sm mt-4 ">
      <center><h2><i class="bi bi-person-circle"></i> User Sign up </h1></center>
      
      <div class="container p-4">

         <form action="#" method="post">
            <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">User Name</label>
                  <input value="<?=set_value('username')?>" type="text" class="form-control shadow-none <?=!empty($errors['username'])?'border-danger':''?>" id="exampleFormControlInput1" placeholder="USER Name" name="username">
                  <?php if (!empty($errors['username'])) {?>
                     <small class="text-danger"><?=$errors["username"]?></small>
                  <?php }?>
            </div>

            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Email address</label>
               <input value="<?=set_value('email')?>" type="email" class="form-control shadow-none <?=!empty($errors['email'])?'border-danger':''?>" id="exampleFormControlInput1" placeholder="email address" name="email">
               <?php if (!empty($errors['email'])) {?>
                     <small class="text-danger"><?= $errors["email"]?></small>
                  <?php }?>
            </div>
         
            <div class="input-group mb-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
               <input value="<?=set_value('password')?>" type="password" class="form-control shadow-none <?=!empty($errors['password'])?'border-danger':''?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Password" name="password">
               <?php if (!empty($errors['password'])) {?>
                    <br> <small class="text-danger col-12"><?= $errors["password"]?></small>
                  <?php }?>
            </div>
            
            <div class="input-group mb-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Retype  Password</span>
               <input type="password" class="form-control shadow-none <?=!empty($errors['repassword'])?'border-danger':''?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Retype Password" name="repassword">
               <?php if (!empty($errors['repassword'])) {?>
                  <br><small class="text-danger col-12"><?= $errors["repassword"]?></small>
                  <?php }?>
            </div>
         
            <button type="submit"  class="btn btn-primary float-end">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
         </form>
            
      </div>
   </div>




<?php require_once view_path("parthian/footer");?>