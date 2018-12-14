<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LinkShare</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="./vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="./css/freelancer.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <?php require_once('./includes/header.tpl'); ?>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <!--<img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">-->
        <h3 class="font-weight-light">Welcome to</h3>
        <h1 class="text-uppercase mb-0">LinkShare</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Online Link Sharing Platform</h2>
      </div>
    </header>

    <!-- Create Link Section -->
    <section class="create" id="create">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Create Link</h2>
        <hr class="star-dark mb-5">
        <!--?php
          if (!(empty($_SESSION['Username']) && empty($_SESSION['User_ID']))) :
            $nav_username = $_SESSION['Username'];
        ?-->
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <table id="TableURLs" class="table order-list">
              <thead>
                <tr>
                  <th scope="col" width="5%">#</th>
                  <th scope="col" width="30%">URL</th>
                  <th scope="col" width="15%">Tag</th>
                  <th scope="col" width="50%">Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><input type="text" class="form-control" name="URL1" /></td>
                  <td><input type="text" class="form-control" name="Tag1" /></td>
                  <td><input type="text" name="Description1" class="form-control" /></td>
                  <td><a class="deleteRow"></a></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <input type="button" class="btn btn-primary" onclick="AddRow()" value="Add New URL" />
                  </td>
                </tr>
                <tr>
                </tr>
              </tfoot>
            </table>

            <form name="ShareURL" id="ShareURL" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Description</label>
                  <textarea class="form-control" id="ShareURLs_Description" rows="2" placeholder="Description"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br />
              <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="ShareURLs()" id="shareUrl">Share URLs</button>
              </div>
            </form>

            <script type="text/javascript">
              var counter = 2;

              function AddRow()
              {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><input type="text" class="form-control" name="URL' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="Tag' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="Description' + counter + '"/></td>';
                cols += '<td><input type="button" class="btn btn-md btn-danger" onClick="RemoveRow(this)" value="Delete"></td>';

                newRow.append(cols);

                $("table.order-list").append(newRow);

                counter++;
              }

              function RemoveRow(act)
              {
                  $(act).closest("tr").remove();
              }

              function ShareURLs()
              {
                var RowsCount = document.getElementById("TableURLs").rows.length-3;
                var ShareURLs_Description = $("textarea#ShareURLs_Description").val();
                var AllURL = '';
                var AllTag = '';
                var AllDescription = '';

                var links = [];

                var i;
                for (i = 1; i <= RowsCount; i++)
                {
                    var index = document.getElementById("TableURLs").rows[i].cells[0].innerHTML;
                    
                    var URLVal = document.getElementsByName("URL"+index)[0].value;
                    var TagVal = document.getElementsByName("Tag"+index)[0].value;
                    var DescriptionVal = document.getElementsByName("Description"+index)[0].value;


             link = {
              url: URLVal,
              tag: TagVal,
              desc: DescriptionVal
              };
          links.push(link)
          console.log(link);
          localStorage.setItem('items', JSON.stringify(links));

                    AllURL += '|~|' + URLVal;
                    AllTag += '|~|' + TagVal;
                    AllDescription += '|~|' + DescriptionVal;
                }

              
                    

              }
              
            </script>
            
              <div class="container " onclick="" id="finish">
              <a href="index.html" target="_blank" class="display-5" id="text">https://www.link-share.com/yourNewurl</a>
                 </div>

          </div>

        <!--</div>
        <h4 class="text-center text-secondary">
          Only authorised users can create links.
          <a class="nav-link portfolio-item py-3 px-0 px-lg-3 rounded" onClick="ShowForm('SigninBox')" href="#authorization-modal">Sign in</a>
          to continue.
        </h4>
      </div>-->
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Trust Us Your Links.
            </p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">We will take care of them :)
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php require_once('./includes/footer.tpl'); ?>

    <!-- Authorization Modal -->
    <div class="portfolio-modal mfp-hide" id="authorization-modal">
      <div class="portfolio-modal-dialog bg-white">

        <div class="container text-center">
          <a class="close-button d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
          </a>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Authorisation</h2>
              <hr class="star-dark mb-5">
              <!-- Sign In Box -->
              <div class="row" id="SigninBox">
                <div class="col-lg-8 mx-auto">
                  <h3 class="text-secondary">Sign In</h3>
                  <form name="SignInForm" id="SignInForm" novalidate="novalidate">
                    <div class="form-group">
                      <div class="col-md-12 control">
                        Don't have an account?
                        <a href="#" onClick="ShowForm('SignupBox')">Sign Up Here</a>
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Username or E-Mail</label>
                        <!--<input class="form-control" id="Signin_Username" type="text" placeholder="Username or E-Mail" required="required" data-validation-required-message="Please enter your Username or E-Mail.">
                        <p class="help-block text-danger"></p>-->
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Password</label>
                        <input class="form-control" id="Signin_Password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your Password.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="col-md-12 control">
                        <a href="#" onClick="ShowForm('ForgotBox')">Forgot password?</a>
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <br>
                    <div id="SignInMessage"></div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-xl" id="SignInFormSubmit" onclick="SignIn()">Login</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Sign In Box -->
              <!-- Sign Up Box -->
              <div id="SignupBox">
                <div class="col-lg-8 mx-auto">
                  <h3 class="text-secondary">Sign Up</h3>
                  <form name="SignUpForm" id="SignUpForm" novalidate="novalidate">
                    <div class="form-group">
                      <div class="col-md-12 control">
                        Have an accout? Don't stay in line, Come on in!
                        <a href="#" onClick="ShowForm('SigninBox')">Sign In Here</a>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Username</label>
                        <input class="form-control" id="Signup_Username" type="text" placeholder="Username" required="required" data-validation-required-message="Please enter your Username.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>E-Mail</label>
                        <input class="form-control" id="Signup_Email" type="email" placeholder="E-Mail" required="required" data-validation-required-message="Please enter your E-Mail.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Password</label>
                        <input class="form-control" id="Signup_Password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your Password.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Repeat Password</label>
                        <input class="form-control" id="Signup_RepPassword" type="password" placeholder="Repeat Password" required="required" data-validation-required-message="Please repeat your Password.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <br>
                    <div id="SignUpMessage"></div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-xl" id="SignUpFormSubmit" onclick="SignUp()">Sign Up</button>
                    </div>

                  </form>
                </div>
              </div>
              <!-- End Sign Up Box -->
              <!-- Forgot Box -->
              <div id="ForgotBox">
                <div class="col-lg-8 mx-auto">
                  <h3 class="text-secondary">Forgot Password</h3>
                  <form name="ForgotForm" id="ForgotForm" novalidate="novalidate">
                    <div class="form-group">
                      <div class="col-md-12 control">
                        <a href="#" onClick="ShowForm('SigninBox')">Sign In</a> |
                        <a href="#" onClick="ShowForm('SignupBox')">Sign Up</a>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>E-Mail Address</label>
                        <input class="form-control" id="Forgot_Email" type="email" placeholder="E-Mail Address" required="required" data-validation-required-message="Please enter your E-Mail Address.">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <br>
                    <div id="ForgotMessage"></div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-xl" id="ForgotFormSubmit" onclick="ForgotPassword()">Forgot</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Forgot Box -->

              <script type="text/javascript">
                function ShowForm(FormID)
                {
                  $("#SigninBox").prop("hidden", true);
                  $("#SignupBox").prop("hidden", true);
                  $("#ForgotBox").prop("hidden", true);

                  $("#"+FormID).prop("hidden", false);
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Authorization Modal -->

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Validation Script -->
    <script src="./js/jqBootstrapValidation.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./js/freelancer.js"></script>
    <!-- <script src="./js/authorization.js"></script> -->
    <script src=".parse.js"></script>

  </body>
</html>
