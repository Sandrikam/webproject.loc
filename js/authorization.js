function getXmlHttp()
{
  var xmlhttp;
  try
  {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }
  catch (e)
  {
    try
    {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (E)
    {
      xmlhttp = false;
    }
  }

  if (!xmlhttp && typeof XMLHttpRequest!='undefined')
  {
    xmlhttp = new XMLHttpRequest();
  }

  return xmlhttp;
}

/**
 * Submit SignIn Form
 */
function SignIn()
{
  $("#SignInForm input").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors)
    {
      // error
    },
    submitSuccess: function($form, event)
    {
      event.preventDefault();

      $("#SignInFormSubmit").prop("disabled", true);

      var Username = $("input#Signin_Username").val();
      var Password = $("input#Signin_Password").val();

      var xmlhttp = getXmlHttp();
      xmlhttp.open('POST', '/scripts/authorization.php', true);
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xmlhttp.send(
        "action=signin" +
        "&username=" + encodeURIComponent(Username) +
        "&password=" + encodeURIComponent(Password)
      );
      xmlhttp.onreadystatechange = function()
      {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          if (xmlhttp.responseText == 'incorectdata')
          {
            FormMessage('SignInMessage', 'danger', 'Incorect Username or Password');
            $("#SignInFormSubmit").prop("disabled", false);
          }
          else if (xmlhttp.responseText == 'accountisinactive')
          {
            FormMessage('SignInMessage', 'danger', 'Your Account is Inactive! Please, activate it.');
            $("#SignInFormSubmit").prop("disabled", false);
          }
          else
              window.location.replace('/user/' + xmlhttp.responseText);
        }
      };
    },
    filter: function()
    {
      return $(this).is(":visible");
    },
  });
}

/**
 * Submit SignUp Form
 */
function SignUp()
{
  $("#SignUpForm input").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors)
    {
      // error
    },
    submitSuccess: function($form, event)
    {
      event.preventDefault();

      var Username = $("input#Signup_Username").val();
      var Email = $("input#Signup_Email").val();
      var Password = $("input#Signup_Password").val();
      var RepPassword = $("input#Signup_RepPassword").val();

      if (Username.length <= 3)
      {
        FormMessage('SignUpMessage', 'danger', 'Username must be at least 3 characters!');
        $("input#Signup_Username").focus();
      }
      else if (Password.length <= 8)
      {
        FormMessage('SignUpMessage', 'danger', 'Password must be at least 8 characters!');
        $("input#Signup_Password").focus();
      }
      else if (Password != RepPassword)
      {
        FormMessage('SignUpMessage', 'danger', 'Passwords don\'t match!');
        $("input#Signup_RepPassword").focus();
      }
      else
      {
        $("#SignUpFormSubmit").prop("disabled", true);

        var xmlhttp = getXmlHttp();
        xmlhttp.open('POST', '/scripts/authorization.php', true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(
          "action=signup" +
          "&username=" + encodeURIComponent(Username) +
          "&email=" + encodeURIComponent(Email) +
          "&password=" + encodeURIComponent(Password)
        );
        xmlhttp.onreadystatechange = function()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            $("#SignUpFormSubmit").prop("disabled", false);
            switch (xmlhttp.responseText)
            {
              case "usernameexists": FormMessage('SignUpMessage', 'danger', 'The Username is alredy exists!'); break;
              case "emailexists": FormMessage('SignUpMessage', 'danger', 'The E-Mail is alredy exists!'); break;
              case "regerror": FormMessage('SignUpMessage', 'danger', 'Registration error!<br />Try again!'); break;
              case "regsuccess": FormMessage('SignUpMessage', 'success', 'Successful registration!<br />Check Your E-Mail to activate Your account.'); break;
            }
          }
        };
      }
    },
    filter: function()
    {
      return $(this).is(":visible");
    },
  });
}

/**
 * Submit Forgot Form
 */
function ForgotPassword()
{
  $("#ForgotForm input").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // error
      alert ("Error");
    },
    submitSuccess: function($form, event) {
      event.preventDefault();

      $("#ForgotFormSubmit").prop("disabled", true);

      var Email = $("input#Forgot_Email").val();

      //Action
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });
}

/**
 * Show Form Submiting Errors and Messages
 *
 * @param {string}   ElementID    Message conteiner
 * @param {string}   MessageType  Alert type (success, danger, warning etc.)
 * @param {string}   MessageText  Text for showing
 */
function FormMessage(ElementID, MessageType, MessageText)
{
  document.getElementById(ElementID).innerHTML = "<div class='alert alert-" + MessageType + "'>"+
  "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
  "<strong>" + MessageText + "</strong></div>";
}
