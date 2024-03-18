<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog textcolorwhite" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update Information</h5>
        <button style="background-color: red" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" aria-label="Close"></button>
          
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('useraccount.update',$id)); ?>" method="POST" class="formsurv">
          <?php echo method_field("PUT"); ?>
          <?php echo csrf_field(); ?>
          <div class="mb-3">
            <label for="namehubedit" class="form-label">Name</label>
            <input required="true" name="name" type="text" class="submit form-control" placeholder="Name" value="<?php echo $name?>">
            <label for="linkhubedit" class="form-label">Email</label>
            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo $email ?>" required autocomplete="email">
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="submit btn btn-primary">Submit</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/account/modaleditwsh.blade.php ENDPATH**/ ?>