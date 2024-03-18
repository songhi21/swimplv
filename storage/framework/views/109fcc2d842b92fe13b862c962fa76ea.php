<link href="<?php echo e(config('variable.url')); ?>css/style.css" rel="stylesheet">
<link href="<?php echo e(config('variable.url')); ?>css/font.css" rel="stylesheet">
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<div class="container" onclick="onclick">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
        <img src="<?php echo e(config('variable.url')); ?>image/p3.png" style="width: 40%"/>
         <h2>SWIM Project 3 Central Hub</h2>
                    
            

            
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <label for="email" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Email Address')); ?></label>

                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                <?php $__errorArgs = ['email'];
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

                <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>

                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red"><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <button type="submit" class="prevent bn5">
                    <?php echo e(__('Login')); ?>

                </button>

                        
                    <a href="<?php echo e(config('variable.url')); ?>/" class="center2">HomePage</a>
                    </div>
                

            </form>
           
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/auth/login.blade.php ENDPATH**/ ?>