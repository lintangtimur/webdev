<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Program rekapitulasi dan rencana publikasi ilmiah Sistem Informasi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body>
    <article class="center-block container-login">
      <section>
        <div class="tab-content col-lg-12 col-md-12 col-sm-12">
          <div class="tab-pane fade active in" id="login-access">
            <h2><i class="glyphicon glyphicon-log-in"></i> <b>LOGIN</b></h2>
            <form class="form-horizontal" action="validate.php" method="post" autocomplete="on">
              <div class="form-group input-group">
                <label for="login" class="sr-only">Username</label>
                <input type="text" class="form-control input-lg" name="username" value placeholder="username">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" class="form-control input-lg" name="password" value placeholder="password">
              </div>
              <div class="form-group">
                <button type="submit" name="log-me-in" class="btn btn-lg btn-primary">ENTER</button>
              </div>
              <a href="#" data-toggle="modal" data-target="#myModal">Don't have an account yet?</a>
            </form>
          </div>
        </div>
      </section>
    </article>

    <!--Tampilan Modal-->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <p>Form Registrasi Tampil disini</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
