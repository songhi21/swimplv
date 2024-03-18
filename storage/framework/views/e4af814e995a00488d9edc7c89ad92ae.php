<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title textcolorwhite" id="exampleModalLabel">Update Information</h5>
          <button style="background-color: red" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('hub.update',$id)); ?>" method="POST" class="formsurv">
            <?php echo method_field("PUT"); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="namehubedit" class="form-label">Name</label>
                <input required="true" name="name" type="text" class="form-control" placeholder="Name" value='<?php echo $name?>'>
                
                <div id="linkname" class="textcolorwhite form-text">Input the link Name.</div>
                </div>
                <div class="mb-3">
                    <label for="linkhubedit" class="textcolorwhite form-label">Link</label>
                    <input require="true" name="link" type="Url" class="form-control" id="linkhubeidit" value='<?php echo $linkage?>' placeholder="Example: https://www.example.com">
                    <div id="link" class="textcolorwhite form-text">Paste Link Url.</div>
                </div>
                <div class="mb-3 form-check">
                </div>
                <button type="submit" class="submit btn btn-primary">Submit</button>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Close</button>
              
            </div>
          </form>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/wshmodal/modaleditwsh.blade.php ENDPATH**/ ?>