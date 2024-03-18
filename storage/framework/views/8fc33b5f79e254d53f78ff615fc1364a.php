<div class="modal fade" id="changepassword<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog textcolorwhite" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form method="POST" action="<?php echo e(route('changepassword')); ?>">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="product_id" value="<?php echo e($id); ?>" />
          <div class="row mb-3">
            <label  class="col-md-4 col-form-label text-md-end">Name</label>

            <div class="col-md-6">
                <input disabled="true" type="text" class="form-control" value=<?php echo e($name); ?> autocomplete="on">
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>

            <div class="col-md-6">
                <input  type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Confirm Password')); ?></label>

              <div class="col-md-6">
                  <input  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="submit btn btn-primary">
                  <?php echo e(__('Reset Password')); ?>

              </button>
            </div>
          </div>
        </form>
      </div> 
      <div class="modal-footer text-center">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/account/changepassword.blade.php ENDPATH**/ ?>