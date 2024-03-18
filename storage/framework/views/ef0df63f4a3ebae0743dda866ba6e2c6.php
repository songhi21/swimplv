<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create a Link</h1>
          <button style="background-color: red" type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(route('cctvview.store')); ?>" method="POST" class="formsurv">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="linkname" class="form-label">Name</label>
                    <input required="true" name="name" type="text" class="form-control" id="linkname" aria-describedby="linkname" placeholder="Name">
                    <?php $__errorArgs = ['namehub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                          <span class="invalid-feedback" >
                              <strong class="errormessagecolor"><?php echo e($message); ?></strong>
                          </span>

                      </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div id="linkname" class="form-text textcolorwhite">Input the link Name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input required="true" name="link" type="Url" class="form-control" id="link" value="https://" placeholder="Example: https://www.example.com">
                        <div id="link" class="form-text textcolorwhite">Paste Link Url.</div>
                    </div>
                    <div class="mb-3 form-check">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button type="submit" class="prevent btn btn-primary submit">Submit</button>
            </div>
        </form>
     


      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/cctvviewmodal/createmodal.blade.php ENDPATH**/ ?>