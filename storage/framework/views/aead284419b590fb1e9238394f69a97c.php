<?php $__env->startComponent('mail::message'); ?>

<span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
<br>
<strong>from: www.swimproject3.com</strong>
<br>
<h2><b>Contact Form Submission</b></h2>
<br>
<b>Name:</b><span><?php echo e($data['name']); ?></span> 
<br>
<b>Email:</b><span><?php echo e($data['email']); ?></span> 
<br>
<br>
<strong>Message:</strong>
<br>
<br>
<p><?php echo e($data['message']); ?></p>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/emails/contact.blade.php ENDPATH**/ ?>