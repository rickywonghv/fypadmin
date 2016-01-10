<?php
    session_start();

    if(isset($_SESSION['username'])&&isset($_SESSION['type'])){
            header('Location:index.php');
    }else{
      session_destroy();
    	session_unset();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
        <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
        <script src="https://www.google.com/jsapi"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="asset/css/login.css" rel="stylesheet" type="text/css">
        <script src="asset/js/login.js"></script>
        <link rel="icon" href="favicon.ico">
        <title>MusixCloud Dashboard Login</title>
        <script type="text/javascript">
          $(document).ready(function() {
              $("#username").focus();
          });

        </script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="padding-top:0px"><img height="50" alt="Brand" src="asset/img/logo.png"></span></a>

                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-muted"><i class="fa fa-tachometer"></i> Musix Cloud</h1>
                        <h3 class="text-muted">Admin Dashboard Login</h3>
                        <form role="form">
                            <div class="form-group has-feedback">

                                <input class="form-control input-lg" id="username"  placeholder="Username" type="text">
                            </div>
                            <div class="form-group">

                                <input class="form-control input-lg" id="pwd" placeholder="Password" type="password">
                            </div>
                            <button type="submit" class="btn btn-block btn-info btn-lg" id="loginbtn">Login</button>

                        </form>
                        <div id="message"></div>
                    </div>
                    <div class="col-md-6">
                        <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="hidden-xs hidden-sm img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <footer class="section section-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Musix Cloud</h1>
                        <p>Provide service like Youtube, but it provide Music that you upload.</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-info text-right">
                            <br>
                            <br>
                        </p>
                        <div class="row">
                            <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 hidden-xs text-right">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


</body></html>
