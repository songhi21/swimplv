<link href="<?php echo e(config('variable.url')); ?>css/style.css" rel="stylesheet">
<link href="<?php echo e(config('variable.url')); ?>css/font.css" rel="stylesheet">

<?php $__env->startSection('content'); ?>
<div class="container" onclick="onclick" >
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
        <br>
        <br>
        <br>
        <br>
        <img src="<?php echo e(config('variable.url')); ?>image/p3.png" style="width: 40%"/>
         <h2>SWIMP3 CentralHub</h2>
                    
            

            
                <form id="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address" required autofocus ><br>
                    <span id="email-error" class="invalid-feedback"></span><br>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                        <span class="invalid-feedback">
                            <strong class="errormessagecolor"><?php echo e($message); ?></strong>
                        </span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input id="password" type="password" name="password" placeholder="Password"  required><br>
                    <span id="password-error" class="invalid-feedback"></span><br>
                
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
                    


                
                    <div class="recaptcha-container">
                        <!-- HTML code for the reCAPTCHA widget and error message -->
                        <?php echo NoCaptcha::renderJs(); ?>

                        <div id="recaptcha-container" class="g-recaptcha centerbox" data-sitekey="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" ></div>
                        <span id="captcha-error" class="invalid-feedback" style="color: red"></span><br> <!-- Error message for reCAPTCHA -->
                        <!-- Reset reCAPTCHA button -->
                        <button id="reset-recaptcha" type="button" class="btn btn-primary btn-lg float-end">Reset</button>

                    </div>
                    <button type="submit" class="prevent bn5" id="btnsubmit">
                        <?php echo e(__('Login')); ?>

                    </button>
                </form>

                <?php if(Route::has('password.request')): ?>
                    <div  style=" text-align: center; margin-bottom: 10px;">    
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                    </div>
                <?php endif; ?>
                <div style=" text-align: center; margin-bottom: 10px;">
                    <a href="<?php echo e(config('variable.url')); ?>/" >HomePage</a>
                </div>
                

            </form>
           
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginlayouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/auth/login.blade.php ENDPATH**/ ?>