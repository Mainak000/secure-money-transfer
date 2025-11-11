<?php 
// Include config at the very start before any output
require_once('config.php');

// Redirect if already logged in
if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata'])) {
    header("Location: " . base_url . "index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('inc/header.php') ?>
  <link rel="stylesheet" href="css/phonepe-style.css">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Roboto', sans-serif;
    }
    textarea {
      resize: none;
      min-height: 60px;
    }
    textarea::placeholder {
      color: #999;
    }
    .registration_form textarea {
      width: 100%;
      margin-bottom: 10px;
    }
    textarea#biography {
      resize: none;
      min-height: 80px;
      margin-bottom: 10px;
      border-radius: 5px;
      padding: 8px;
    }
    textarea#biography::placeholder {
      color: #999;
    }
    .registration_form textarea.form-control {
      width: 100%;
      margin-bottom: 10px;
    }
    .avatar-section {
      margin: 15px 0;
      text-align: center;
    }
    .avatar-upload {
      position: relative;
      max-width: 165px;
      margin: 10px auto;
    }
    .avatar-upload .avatar-edit {
      position: absolute;
      right: 5px;
      z-index: 1;
      top: 5px;
    }
    .avatar-upload .avatar-edit input {
      display: none;
    }
    .avatar-upload .avatar-edit label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid #d2d6de;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all .2s ease-in-out;
      line-height: 34px;
      text-align: center;
    }
    .avatar-upload .avatar-edit label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }
    .avatar-upload .avatar-preview {
      width: 150px;
      height: 150px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      overflow: hidden;
    }
    #imagePreview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .password-validation-container {
      margin: 10px 0;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background: #fff;
      font-size: 0.9em;
    }
    .validation-criterion {
      margin: 5px 0;
      display: flex;
      align-items: center;
      color: #666;
    }
    .criterion-icon {
      margin-right: 8px;
      font-size: 14px;
    }
    .phone-validation-container {
      margin-top: 5px;
      color: #dc3545;
      font-size: 0.875em;
      display: none;
    }
    .email-validation-container {
      margin-top: 5px;
      color: #dc3545;
      font-size: 0.875em;
      display: none;
    }
    input:invalid {
      border-color: #dc3545;
    }
    input:valid {
      border-color: #28a745;
    }
  </style>
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="forget"></a>

    <div class="login_wrapper">
      <!-- <h1 class="h1 text-center">IIT Hyderabad Money Transfer</h1> -->
      <div id="msg"></div>
      <div class="animate form login_form">
        <section class="login_content">
          <form id="login-frm" action="" method="post">
            <h1 class="form-title">Login</h1>
            <div class="form-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" pattern="^\S+$" title="Username cannot contain spaces" required>
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" pattern="^\S+$" title="Password cannot contain spaces" required>
              <div class="password-validation-container">
                <div class="text-muted mb-2">Password must have:</div>
                <div class="validation-requirements"></div>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-default submit">LOG IN</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">
                <a href="#signup" class="to_register"> Create New Account </a>
              </p>

              <div class="clearfix"></div>
            </div>
          </form>
        </section>
      </div>
      
      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form id="manage-ruser" action="" method="post">
            <h1 class="form-title">Create Account</h1>
            <div class="avatar-section">
              <label for="imageUpload" class="control-label">Profile Picture (Optional)</label>
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type='file' name="img" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="displayImg(this)" />
                  <label for="imageUpload"><i class="fa fa-camera"></i></label>
                </div>
                <div class="avatar-preview">
                  <div id="imagePreview">
                    <img src="<?php echo validate_image('') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                  </div>
                </div>
              </div>
              <small class="text-muted">Click the camera icon to upload your profile picture. Maximum file size: 500KB.</small>
            </div>
              <div id="msg"></div>
              <div>
                <input type="text" name="firstname" id="firstname" class="form-control" required placeholder="First Name">
              </div>
              <div>
                <input type="text" name="lastname" id="lastname" class="form-control" required placeholder="Last Name">
              </div>
              <div>
                <input type="email" name="email" id="email" class="form-control" required 
                  placeholder="Email" pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}"
                  title="Please enter a valid email address">
                <div class="email-validation-container" style="display:none; color: #dc3545; font-size: 0.875em; margin-top: 5px;">
                  Please enter a valid email address
                </div>
              </div>
              <div>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" pattern="^\S+$" title="Username cannot contain spaces" required>
              </div>
              <div>
                <input type="password" name="password" id="register-password" class="form-control" required placeholder="Password" autocomplete="off" pattern="^\S+$" title="Password cannot contain spaces">
                <div class="password-validation-container">
                  <div class="text-muted mb-2">Password must have:</div>
                  <div class="validation-requirements"></div>
                </div>
              </div>
              <div>
                <input type="phone" name="phone" id="phone" placeholder="Phone Number" class="form-control" required autocomplete="off" pattern="[0-9]{10}" maxlength="10">
                <div class="phone-validation-container"></div>
              </div>
              <div>
                <textarea name="biography" id="biography" class="form-control" placeholder="Tell us about yourself (optional)" rows="3"></textarea>
              </div>
              <div style="margin: 0 0 20px;">
                <input type="hidden" name="type" class="custom-select" value="2">
              </div>
              <div>
                <button class="btn btn-default submit register-btn" type="submit">REGISTER</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already have an account?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
              </div>
            </form>
        </section>
      </div>
      
      <div id="forget" class="animate form forget_form">
        <section class="login_content">
          
          <form id="forget-frm" action="" method="post">
            <h1 class="form-title">Forgot Password</h1>
            <div>
              <input type="text" class="form-control" name="email" placeholder="Email" required="" />
            </div>
            <div>
              <button type="submit" class="btn btn-default submit">SUBMIT</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">
                <a href="#signin" class="to_register"> Back to Login </a>
              </p>

              <div class="clearfix"></div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

<script>
// Debug: Log base URL
console.log("Base URL:", _base_url_);

function displayImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
            console.log("Image preview loaded");
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        console.log("No file selected or file selection failed");
    }
}

// Email validation
document.getElementById('email').addEventListener('input', function(e) {
    const email = e.target.value;
    const emailRegex = /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/;
    const emailValidationContainer = document.querySelector('.email-validation-container');
    
    if (email && !emailRegex.test(email)) {
        e.target.style.borderColor = '#dc3545';
        emailValidationContainer.style.display = 'block';
    } else {
        e.target.style.borderColor = email ? '#28a745' : '#ced4da';
        emailValidationContainer.style.display = 'none';
    }
});

$('#manage-ruser').submit(function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    start_loader();
    
    // Debug: Log form data (excluding the binary file content)
    console.log("Form data being submitted:");
    for (var pair of formData.entries()) {
        if (pair[0] !== 'img') {
            console.log(pair[0] + ': ' + pair[1]);
        } else {
            console.log('img: [File object]');
        }
    }
    
    // Add biography field if it's missing
    if (!formData.has('biography')) {
        console.log("Adding empty biography field");
        formData.append('biography', '');
    }
    
    // Ensure branch_id is set
    if (!formData.has('branch_id') || formData.get('branch_id') === '') {
        console.log("Setting default branch_id to 1");
        formData.set('branch_id', '1');
    }
    
    $.ajax({
        url: _base_url_ + 'classes/Users.php?f=rsave',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            console.log("Server response:", resp);
            try {
                if(resp) {
                    var response = JSON.parse(resp);
                    console.log("Parsed response:", response);
                    
                    if (response.status === 'success') {
                        location.replace('./');
                    } else if (response.status === 'error') {
                        if (response.errors) {
                            // Display specific field errors
                            var errorMsg = '';
                            for (var field in response.errors) {
                                errorMsg += response.errors[field] + '<br>';
                            }
                            $('#msg').html('<div class="alert alert-danger">' + errorMsg + '</div>');
                        } else if (response.msg) {
                            $('#msg').html('<div class="alert alert-danger">' + response.msg + '</div>');
                        } else {
                            $('#msg').html('<div class="alert alert-danger">Registration failed. Please try again.</div>');
                        }
                    } else {
                        $('#msg').html('<div class="alert alert-danger">Unexpected response from server</div>');
                    }
                } else {
                    $('#msg').html('<div class="alert alert-danger">Empty response from server</div>');
                }
            } catch (e) {
                console.error("Error parsing response:", e, "Raw response:", resp);
                $('#msg').html('<div class="alert alert-danger">Failed to create account. Please try again.</div>');
            }
            end_loader();
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
            console.log("Response:", xhr.responseText);
            $('#msg').html('<div class="alert alert-danger">Server error: ' + error + '</div>');
            end_loader();
        }
    });
});

// Add form submission debugging
$('#login-frm').on('submit', function(e) {
    e.preventDefault();
    console.log("Form submitted");
    
    // Log form data
    var formData = $(this).serialize();
    console.log("Form data:", formData);
    
    start_loader();
    if($('.err_msg').length > 0)
        $('.err_msg').remove();
        
    // Add CSS for register-btn
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .register-btn {
                background-color:rgb(17, 65, 117);
                color: #fff;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .register-btn:hover {
                background-color: #0056b3;
            }
        `)
        .appendTo('head');

    $.ajax({
        url: _base_url_ + 'classes/Login.php?f=login',
        method: 'POST',
        data: formData,
        error: function(xhr, status, error) {
            console.error("Login error:", error);
            console.error("Response:", xhr.responseText);
            var _frm = $('#login-frm');
            var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> An error occurred. Please try again.</div>";
            _frm.prepend(_msg);
            end_loader();
        },
        success: function(resp) {
            console.log("Login response:", resp);
            try {
                if(resp) {
                    resp = JSON.parse(resp);
                    console.log("Parsed response:", resp);
                    if (resp.status === 'success') {
                        location.replace(_base_url_);
                    } else if (resp.status === 'incorrect' || resp.status === 'failed') {
                        var _frm = $('#login-frm');
                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> " + ( resp.message || "Incorrect username or password") + "</div>";
                        _frm.prepend(_msg);
                        _frm.find('input').addClass('is-invalid');
                        $('[name="username"]').trigger('focus');
                    }
                } else {
                    throw new Error('Empty response');
                }
            } catch(e) {
                console.error("Error processing response:", e);
                var _frm = $('#login-frm');
                var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> An error occurred. Please try again.</div>";
                _frm.prepend(_msg);
            }
            end_loader();
        }
    });
});
</script>

  <!-- Include password and phone validation scripts -->
  <script src="<?php echo base_url ?>js/password-validation.js"></script>
  <script src="<?php echo base_url ?>js/phone-validation.js"></script>
</body>

</html>
