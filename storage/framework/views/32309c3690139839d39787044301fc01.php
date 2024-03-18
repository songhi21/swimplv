<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head class="border-red">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SwimProject3')); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/aboutcss.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="css/loadingcss.css" rel="stylesheet">
    <link href="css/btnnavchangecss.css" rel="stylesheet">
    <link href="css/cssbuttoncustom.css" rel="stylesheet">
    <link href="css/floatbtnemail.css" rel="stylesheet">
    
</head>
    <body >

        
        <div id="loading-overlay">
            <div id="loading-spinner"></div>
        </div>
        


        
        <button type="button" id="floatBtn" class="btn btn-primary2 float-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <svg xmlns="image/envelope-solid.svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
          </button>
        
        <div class="loading-overlay">
            <div class="loading-spinner"></div>
        </div>
        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    
                    
                        

                    
                    
                    <div class="modal-body">
                        <div class="column" id="main">
                            <h1>Contact Us</h1>
                            <h3>Let's get this conversation started. Tell us a bit about yourself, and well get in touch as soon as we can.</h3>
                            <form id="contactForm">
                                <?php echo csrf_field(); ?>
                              <div class="form-group">
                                <label for="name">Name</label>
                                <input required="true" type="name" class="form-control" id="name" placeholder="Name" name="name">
                              </div>
                              <div class="form-group">
                                <label for="email">Work Email </label>
                                <input required="true" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" name="email">
                              </div>
                              <div class="form-group">
                                <label for="message">Message</label>
                                <textarea required="true" class="form-control" id="message" placeholder="Message" name="message" style="height: 150px"></textarea>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary2">Contact us</button>
                            </form>
                          </div>
                          <div>
                            <?xml version="1.0" encoding="UTF-8"?>
                            <svg width="67px" height="578px" viewBox="0 0 67 578" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 53.2 (72643) - https://sketchapp.com -->
                                <title>Path</title>
                                <desc>Created with Sketch.</desc>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path d="M11.3847656,-5.68434189e-14 C-7.44726562,36.7213542 5.14322917,126.757812 49.15625,270.109375 C70.9827986,341.199016 54.8877465,443.829224 0.87109375,578 L67,578 L67,-5.68434189e-14 L11.3847656,-5.68434189e-14 Z" id="Path" fill="#F9BC35"></path>
                                </g>
                            </svg>
                          </div>
                          <div class="column" id="secondary">
                            <a type="button" class="btn-close xcustm" data-bs-dismiss="modal">
                            </a>
                            <div class="sec-content">
                                <img src="image/p3.png" width="110" height="80" alt="" class="iconimagemodal">
                                <h2>We're here for you'</h2>
                                <h3>Questions?We have answer.</h3>
                                <h3 >project.swim3@isu.edu.ph</h3>
                            </div>
                          </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="<?php echo e(config('variable.url')); ?>/" style="font-weight:bold!important">
                        <img src="image/p3.png" width="80" height="60" alt="" >
                        <span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
                        <span style="font-weight: bold; color:rgb(17, 17, 17)">| </span>
                    </a>
                    
                    <span style="font-size: 100%;  color:rgb(17, 17, 17); ">  Storm Water Harvesting Facility Decision Support</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left-aligned items -->
                    <ul class="navbar-nav me-auto">
                    
                    </ul>
                    <!-- Right-aligned items -->
                    <ul class="navbar-nav text-navconf">
                        <li class="nav-item">
                            <a aria-current="page" href="<?php echo e(config('variable.url')); ?>/" class="<?php echo e(Request::segment(1) == '' ? 'bn632-hover bn26' : null); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>about"  class="<?php echo e(Request::segment(1) == 'about' ? 'bn632-hover bn26' : null); ?>">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="<?php echo e(Request::segment(1) == 'maps' ? 'bn632-hover bn26' : null); ?> nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:black!important">Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>
                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>login">Login</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/scrolltext.js"></script>
            <script src="js/loadingjs.js"></script>
            <script src="js/floatbuttonmodalmail.js"></script>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/aboutlayout.blade.php ENDPATH**/ ?>