<?php if($errors->any()): ?>
<div class="alert alert-danger errortraphide" role="alert">
    <?php echo implode('', $errors->all('<div>:message</div>')); ?>

</div>
<?php elseif(session()->has('success')): ?>
<div class="alert alert-success errortraphide" role="alert">
    <?php echo session()->get('success'); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/errortrapping/errortrap.blade.php ENDPATH**/ ?>