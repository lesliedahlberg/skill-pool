<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="verify" ng-controller="verifyCtrl" ng-init="title='Verify'">
<? require "inc/head.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>

<body id="body">
  <div class="container" id="container">
      <div class="row">
        <form role="form" id="ver_form" ng-submit="processVerification()">
            <div class="col-md-3"></div>
            <div class="col-md-6" ng-if="success">
              <h2 class="heading" name="verify_message" id="verify_message">Congratulations!<br/> <br/>You can now login using your account<br/> <br/</h2>
              <button class="btn btn-primary" onclick="location.href='login.php'">Click to return to Login</button>
            </div>
            <div class="col-md-6" ng-if="!success">
              <h2 class="heading" name="verify_message" id="verify_message">Something went wrong!<br/> <br/>Please try the verification link again, or contact an admin<br/> <br/</h2>
              <button class="btn btn-primary" onclick="location.href='login.php'">Click to return to Login</button>
            </div>
            <div class="col-md-3"></div>
        </form>
      </div>
  </div>
</body>
<? require "inc/foot.php"; ?>
</html>
