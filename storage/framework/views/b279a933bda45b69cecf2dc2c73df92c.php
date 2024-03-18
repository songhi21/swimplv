

<?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
      <div class="page-header">
          
            <h3 class="page-title"> Accounts </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">User Account /</li>
              </ol>
            </nav>
      </div>
      
      <?php echo $__env->make('errortrapping.errortrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage User account</h4>
                <p class="card-description"> Create, remove and update User account.
                </p>
                <div class="row">
                    <div class="col-lg-6 " >
                        <form action="<?php echo e(route('searchuser')); ?>" method="get">
                            <?php echo method_field("PUT"); ?>
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input name="searchinput" type="text" class="form-control" placeholder="Search.." value="<?php echo e(isset($_GET['searchinput']) ? $_GET['searchinput'] : ''); ?>" id="searchinput">
                                <div class="input-group-prepend">
                                    <?php if(isset($_GET['searchinput'])): ?>
                                        
                                        
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                        <?php if(isset($_GET['searchinput'])): ?>
                            <a href="<?php echo e(route('useraccount.index')); ?>" type="button" class="btn btn-outline-secondary">
                                <i class="mdi mdi-reload d-block mb-1"></i> Clear Result </a>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 textright" >
                        <a type="button" class="btn btn-outline-success btn-fw" href="<?php echo e(config('variable.url')); ?>register">
                            + Create New
                        </a>
                    </div>
                </div>
                
            </div>
          </div>   
        </div>
      </div>
      <div >
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">List of Account</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      
                        
                      
                      <th> User Name </th>
                      <th> Email </th>
                      <th> Created </th>
                      <th> Updated </th>
                      <th> Type </th>
                      <th> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($result)): ?>
                        <?php foreach($result as $index=> $data):?>
                                <?php 
                                    $id = $data['id'];
                                    $name = $data['name'];
                                    $type = $data['type'];
                                    $email = $data['email'];
                                    $updatedated = $data['updated'];
                                    $created = $data['created'];
                                ?>
                                  <tr>
                                        
                                        <td>
                                            
                                            <span class="pl-2"><?php echo e($name); ?></span>
                                        </td>
                                        <td> <?php echo e($email); ?> </td>
                                        <td> <?php echo e($created); ?> </td>
                                        <td> <?php echo e($updatedated); ?> </td>
                                        <td> <?php echo e($type); ?> </td>
                                        <td>
                                              <button type="button" data-toggle="modal" data-target="#edit<?php echo $id ?>" class="btn btn-outline-info btn-icon-text">
                                                <i class="mdi mdi-pen"></i>
                                              </button>
                                              <button type="button" data-toggle="modal" data-target="#changepassword<?php echo $id ?>" class="btn btn-outline-success btn-icon-text">
                                                <i class="mdi mdi-key"></i>
                                              </button>
                                              <button type="button" data-toggle="modal" data-target="#delete<?php echo $id ?>" class="btn btn-outline-danger btn-icon-text">
                                                <i class="mdi mdi-delete"></i>
                                              </button>

                                        </td>
                                        <?php echo $__env->make('account.changepassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('account.deletewsh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('account.modaleditwsh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                  </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-xl-12">
              <div class="row">
                      <div class="row text-center">
                          <div class="col-lg-12 col-xl-12 text-center">
                              
                              <div class="text-center3 ">
                                  <?php if(isset($_GET['searchinput'])): ?>

                                      <?php echo e($User->appends(['searchinput' => $_GET['searchinput']])->links('pagination::bootstrap-4')); ?>

                                  <?php else: ?>
                                      <?php echo e($User->fragment('tab')->links('pagination::bootstrap-4')); ?>

                                  <?php endif; ?>
                              </div>
                              <p> <?php echo e("Showing ".$User->CurrentPage() ." to ".$User->lastPage() ." of ". count($User) . " entries ". " about ".$User->total()); ?></p>
                          </div>
                      </div>

              </div>

          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/account.blade.php ENDPATH**/ ?>