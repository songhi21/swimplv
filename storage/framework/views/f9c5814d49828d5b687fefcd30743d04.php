


<?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

<?php $__env->startSection('content'); ?>

    

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            
                <h3 class="page-title"> Water Sensor Hub</h3>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item active" aria-current="page">Water Sensor Hub</li>
                </ol>
                </nav>
        </div>
            
        <?php echo $__env->make('errortrapping.errortrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Table Links</h4>
                        <p class="card-description"> Manage Water Sensor.
                        </p>
                        <div class="row">
                            <div class="col-lg-6 " >
                                <form action="<?php echo e(route('searching')); ?>" method="get">
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
                                    <a href="<?php echo e(route('hub.index')); ?>" type="button" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-reload d-block mb-1"></i> Clear Result </a>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                                
                            </div>
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->type == "Admin"): ?>
                                    <div class="col-lg-6 textright" >
                                        <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal">
                                            + Create New
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        
                        <br>
                        <br>
                    </div>
                </div>
               
            </div>
        </div>
        <div >
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="row">
                        <?php if(isset($result)): ?>
                            <?php foreach($result as $index=> $data):?>
                                    <?php 
                                        $id = $data['id'];
                                        $name = $data['name'];
                                        $linkage = $data['links'];
                                        $updatedated = $data['updated'];
                                        $created = $data['created'];
                                    ?>

                                    <div class="col-lg-4">
                                        <?php echo $__env->make('wshmodal.cardtable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <br>
                                </div>
                                
                            <?php endforeach; ?>
                           
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12 col-xl-12 text-center">
                            
                            <div class="text-center3 ">
                                <?php if(isset($_GET['searchinput'])): ?>

                                    <?php echo e($hub->appends(['searchinput' => $_GET['searchinput']])->links('pagination::bootstrap-4')); ?>

                                <?php else: ?>
                                    <?php echo e($hub->fragment('tab')->links('pagination::bootstrap-4')); ?>

                                <?php endif; ?>
                            </div>
                            <p> <?php echo e("Showing ".$hub->CurrentPage() ." to ".$hub->lastPage() ." of ". count($hub) . " entries ". " about ".$hub->total()); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('wshmodal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/hub.blade.php ENDPATH**/ ?>