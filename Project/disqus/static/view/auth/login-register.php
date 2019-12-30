<div class="container mt-5 pt-4">
  <div class="cstm-container d-none d-sm-none d-lg-block">
    <div class="cstm_card"></div>
    <div class="cstm_card">
      <h1 class="title">Login</h1>
      <form class="login" method="post">
        <div class="input-container">
          <input type="text" id="loginUser" name="useremail" value="<?php echo @$_COOKIE['useremail']; ?>" />
          <label for="loginUser">Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="loginPassword" name="userpassword" value="<?php echo @$_COOKIE['userpassword']; ?>" />
          <label for="loginPassword">Password</label>
          <div class="bar"></div>
        </div>
        <div class="md-form text-center">
          <p id="loginerr"></p>
          <button id="login" name="login" class="btn btn-primary"><span>Login</span></button>
          <div class="form-check p-0">
            <input type="checkbox" class="form-check-input" name="remember_me" id="materialUnchecked">
            <label class="form-check-label" for="materialUnchecked">Remember me</label>
          </div>
        </div>
        <div class="footer">
          <a href="#" data-toggle="modal" data-target="#message_modal_right" id="user_profile">Forgot your password?</a>
        </div>
      </form>
    </div>
    <div class="cstm_card alt">
      <div class="toggle" data-toggle="tooltip" data-placement="right" title="Create new account">
      </div>
      <h1 class="title">Register
        <div class="close_"></div>
      </h1>
      <form method="post" class="register">
        <div class="input-container">
          <input type="text" id="name"  name="username" />
          <label for="name">Name</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="text" id="email" name="useremail"/>
          <label for="email">Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="text" id="contact" name="usercontact"/>
          <label for="contact">Phone</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password" name="userpassword"/>
          <label for="password">Password</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="repeat_password" name="userpasswordrepeat"/>
          <label for="repeat_password">Repeat Password</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
           <p id="regerr"></p>
          <button id="register"><span>Register</span></button>
        </div>
      </form>
    </div>
  </div>
    <div class="modal fade top" id="message_modal_right" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <form method="post" id="form-frgt-pass">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Forgot Password ?</h4>
            <button type="button" class="close fpclose"  data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="cstm_card modal-body login">
            <div class="input-container">
              <input type="text" id="fpemail-" name="useremail"/>
              <label for="fpemail">Email</label>
              <div class="bar"></div>
            </div>
            <div class="input-container d-none">
              <input type="text" id="fgcontact-" name="usercontact"/>
              <label for="fgcontact-">Phone</label>
              <div class="bar"></div>
            </div>
          </div>
          <div class="modal-footer">
            <p id="error"></p>
            <button type="button" id="forget-password" class="btn btn-primary btn-sm">Send</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- </body>
</html> -->