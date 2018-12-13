<?php
  if ($_GET['act'] == '404')
  {
    $PageTitle1 = "404";
    $PageTitle2 = "404 Page Not Found!";
  }
  else if ($_GET['act'] == 'activation')
  {
    $PageTitle1 = "Account Activation";
    $PageTitle2 = $PageTitle1;
  }
  else
  {
    $PageTitle1 = "404";
    $PageTitle2 = "404 Page Not Found!";
  }

  require_once("./scripts/db.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LinkShare - <?php echo $PageTitle2; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/css/freelancer.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <?php require_once('./includes/header.tpl'); ?>

    <section>
      <div class="container">
        <br /><br />
        <h2 class="text-center text-uppercase text-secondary mb-0"><?php echo $PageTitle1; ?></h2>
        <hr class="star-dark mb-5">

        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div id="404Section">
              <?php if ($_GET['act'] == '404'): ?>
              <h3 class="text-center text-secondary">Oops!</h3>
              <h4 class="text-center text-uppercase text-secondary">Error 404: Page Not Found!</h4>
            </div>
            <div id="ActivationSection">
              <?php
                elseif ($_GET['act'] == 'activation'):
                  $ActivationCodeFromUrl = $_GET['code'];
                  $result = mysql_query("SELECT User_Status FROM users WHERE User_Activation = '$ActivationCodeFromUrl'");
                  $row = mysql_fetch_array($result);

                  $ActivationMessageText = '';
                  if ($row['User_Status'] == null || $ActivationCodeFromUrl == null)
                    $ActivationMessageText = "Invalid Activation Code.";
                  else if ($row['User_Status'])
                    $ActivationMessageText = "Your account is already activated.";
                  else
                  {
                    $update = mysql_query ("UPDATE users SET User_Status = 1 WHERE User_Activation = '$ActivationCodeFromUrl'");

                    if ($update)
                      $ActivationMessageText = "Your account has been activated successfully!<br />You can Sign In using your Username (or E-Mail) and password.";
                    else
                      $ActivationMessageText = "Verification Error!";
                  }
              ?>
              <h3 class="text-center text-secondary"><?php echo $ActivationMessageText; ?></h3>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <?php require_once('./includes/footer.tpl'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Validation Script -->
    <script src="/js/jqBootstrapValidation.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/freelancer.js"></script>
    <script src="/js/authorization.js"></script>
  </body>
</html>
