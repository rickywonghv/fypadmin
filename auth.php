<?php
session_start();
if(!isset($_SESSION['secret'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="asset/css/login.css" rel="stylesheet" type="text/css">
    <script src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap-theme.min.css">
    <script src="asset/js/authlogin.js" charset="utf-8"></script>
    <link rel="icon" href="favicon.ico">
    <title>MusixCloud Dashboard Login</title>
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#code").focus();
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
                      <h1 class="text-muted"><i class="fa fa-tachometer"></i> MusixCloud</h1>
                      <h3 class="text-muted">Admin Dashboard Login</h3>
                      <h3 class="text-muted">2-step Authentication</h3>
                      <form class='form-inline form-horizontal ' id="authform" role="form" action="" method="POST">
                        <input type="text" name="code" id="code" class="form-control input-block input-lg" placeholder="Please enter the 6 digit">
                      <button type="button" id="authsub" class="btn btn-block btn-info btn-lg">Confirm</button>
                      <a href="" data-toggle="modal" data-target="#another">Another authentication method</a>

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
      <div class="modal fade" id="another" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id=""></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"></button>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
