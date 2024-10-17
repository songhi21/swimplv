<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    
    
    <link href="../../../../css/loadingcss.css" rel="stylesheet">
    <link href="../../../../css/cssbuttoncustom.css" rel="stylesheet">

    <link href="../../../../css/btnnavchangecss.css" rel="stylesheet">

    <link href="../../../../css/floatbtnemail.css" rel="stylesheet">
    <link href="../../../../css/aboutcss.css" rel="stylesheet">
    


</head>
<body class="antialiased" style="background-color: rgba(56, 105, 210, 0.293)">
    <div id="loading-overlay">
        <div id="loading-spinner"></div>
    </div>
    <div id="app">
        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="<?php echo e(config('variable.url')); ?>../" style="font-weight:bold!important">
                        <img src="../../../../image/p3.png" width="80" height="60" alt="" >
                        <span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
                        <span style="font-weight: bold; color:rgb(17, 17, 17)">| </span>
                    </a>
                    
                    <span style="font-size: 100%;  color:rgb(17, 17, 17); ">  Storm Water Harvesting Facility Decision Support</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color: rgb(60, 103, 223)!important" >
                    <span class="navbar-toggler-icon " style="background-color: rgb(111, 110, 110)!important"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left-aligned items -->
                    <ul class="navbar-nav me-auto">
                    
                    </ul>
                    <!-- Right-aligned items -->
                    <ul class="navbar-nav text-navconf">
                        <li class="nav-item">
                            <a aria-current="page" href="<?php echo e(config('variable.url')); ?>../../../" class="<?php echo e(Request::segment(1) == '' ? 'bn632-hover bn26' : null); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>../../../about"  class="<?php echo e(Request::segment(1) == 'about' ? 'bn632-hover bn26' : null); ?>">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="<?php echo e(Request::segment(1) == 'maps' ? 'bn632-hover bn26' : null); ?> nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:black!important">Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>../../../maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>../../../mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>
                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>../../../login">Login</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <nav >
            <div class="container">
                
                
                
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
                
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../../../assets/js/forgotpassword.js"></script>
        <script src="../../../../js/loadingjs.js"></script>
        
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/app2.blade.php ENDPATH**/ ?>