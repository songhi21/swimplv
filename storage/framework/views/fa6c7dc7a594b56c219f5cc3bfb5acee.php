

<div class="card" >
  <div class="card-body">
    
      <div class="firstlettereach" id=<?php echo $id ?>>
        <div class="row ">
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-self-end textright">
            <?php if(Auth::check()): ?>
              <?php if(Auth::user()->type == "Admin"): ?>
                <button type="button" data-toggle="modal" data-target="#edit<?php echo $id ?>" class="btn btn-outline-info btn-icon-text">
                  <i class="mdi mdi-pen"></i>
                </button>
                <button type="button" data-toggle="modal" data-target="#delete<?php echo $id ?>" class="btn btn-outline-danger btn-icon-text">
                  <i class="mdi mdi-delete"></i>
                </button>
                <br>
                <br>
              <?php endif; ?>
            <?php endif; ?>
          </div>


          
  
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 align-self-end textcenter ">
            
            <iframe width="100%" height="315" src=<?php echo $linkage?> frameborder="0" allowfullscreen></iframe>
            </iframe>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 textcenter">
            <h3 class="card-description">
              <div class="label" style="font-weight: bold; text-transform: uppercase" id='child<?php echo $id ?>' ><?php echo $name ?></div>
            </h3>
          </div>
          <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12 textcenter">
            <a href=<?php echo $linkage?> type="button" target="_blank" class="btn btn-primary btn-block  ">
              Launch
            </a>
            <p class="text-muted mb-0">Click the here to redirect to the website</p>
          </div>
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="text-muted mb-0 textcenter " >Updated <?php echo $updatedated ?> | Created <?php echo $created ?></div>
          </div>
        </div>
      </div>
  </div>
</div>

<?php echo $__env->make('cctvviewmodal.deletemodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('cctvviewmodal.editmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/cctvviewmodal/cardtable.blade.php ENDPATH**/ ?>