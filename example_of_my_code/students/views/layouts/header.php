<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/template/css/bootstrap.css" rel="stylesheet">

    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="/template/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <![endif]-->
    <script src="/template/js/jquery-3.2.1.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">Students</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="/">Home</a></li>
                    <?php if(isset($_SESSION['user'])): ?>
                        <li> <a href="/cabinet">MyAccount</a></li>
                        <li> <a href="/user/logout">Admin(Logout)</a></li>
                    <?php else: ?>
                        <li> <a href="/user/login">Login</a></li>
                        <li> <a href="/user/register/">Register</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
        