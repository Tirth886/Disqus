<form method="post" enctype="multipart/form-data">
  <div class="cstm_share_container position-fixed px-2 d-none">
      <div class="d-flex">
        <p>Share Link</p>
        <p class="pill cursor_pointer badge-danger p-1 ml-3 pr-2 pl-2" id="remove_share_block" style="border-radius: 8px;font-size: 10px;">cancle</p>
      </div>
      <div class="code" id="share_link" style="background: #f2f2f2;padding: 10px;">
          
      </div>
  </div>
  <div class="modal fade" id="fullWidth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  p-5 modal-fluid modal-left" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <ul class="nav md-pills pills-primary">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
            </li>
            <li class="nav-item friends">
              <a class="nav-link" data-toggle="tab" href="#friends" role="tab">Friends</a>
            </li>
            <li class="nav-item mng_qus">
              <a class="nav-link" data-toggle="tab" href="#manage_qus" role="tab">Manage Qus</a>
            </li>
          </ul>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="tab-content pt-0">

  <!--Panel 1-->
  <div class="tab-pane fade in show active" id="profile" role="tabpanel">
    <div class="row" id="updateform">
            <div class="col-md-6 brdr-right">
              <div class="cstm-profile-img-container">
               <h1><?php echo @$_SESSION["username"]; ?>
                  <small><?php echo @$_SESSION["useremail"]; ?></small>
              </h1>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type="hidden" value="<?php echo @explode("/", $_SESSION['userprofile'])[3]; ?>" id="profile_">
                        <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">

                        <div id="imagePreview" style="background-image: url(<?php echo @$_SESSION['userprofile']; ?>);">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-right">
                <button class="btn btn-danger btn-sm" type="submit" name="logout">Logout</button>
              </div>
              <div class="container">
                <div class="md-form">
                  <i class="fas fa-user prefix"></i>
                  <input type="text" id="user" name="username" class="form-control" value="<?php echo @$_SESSION["username"]; ?>">
                  <label for="user">User</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="email" name="useremail" class="form-control" value="<?php echo @$_SESSION["useremail"]; ?>" readonly>
                  <label for="email">E-mail address</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-phone prefix"></i>
                  <input type="text" id="phone" name="usercontact" class="form-control" value="<?php echo @$_SESSION["usercontact"]; ?>">
                  <label for="phone">Phone</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-key prefix"></i>
                  <input type="password" id="password" name="userpassword" class="form-control" value="<?php echo @$_SESSION["userpassword"]; ?>">
                  <label for="password">Password</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary btn-md" id="update_profile" type="submit">Update</button>
                </div>
              </div>
            </div>
          </div>

  </div>

  <div class="tab-pane fade" id="friends" role="tabpanel">
  
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          
      <?php 
        if($userfrnd_raw_data->num_rows > 0){

        while ($data = $userfrnd_raw_data->fetch_object()) {
      ?>
      <div id="frnd_container-<?php echo @$data->id; ?>" class="brdr-btm brdr-right" >
        <div class='container p-2'>
           <div class="row">
             <div class="col-md-12">
           <div class='position-relative'>
              <img height="50" style="position: absolute;top: 15%;left: 0;border-radius: 50%;" width="50" src="server/utilites/profile/<?php echo @$data->picture; ?>"> 
            </div>
              <div class="py-2 col-md-12 px-3 d-flex justify-content-center">
                <a href="" class='d-flex'>
                  <span><?php echo @$data->username; ?></span>
                </a>
              </div>
              <div class="pb-1    col-md-12 px-3 d-flex justify-content-center">
                <a href="" class='d-flex'>
                  <span><?php echo @$data->useremail; ?></span>
                </a>
              </div>
            </div>
            <div class="col-md-12">
            <div class="row">
              <div class="col-md-12 p-0 d-flex justify-content-center">
                <button class="btn-sm btn-outline-primary float-right btn_setting-hover unfollow_friend" data-frndblock = "frnd_container-<?php echo @$data->id; ?>" data-code="<?php echo @$data->id; ?>" id="follow-<?php echo @$data->id; ?>">Unfollow</button>

               <button class="btn-sm ml-3 btn-outline-primary float-right btn_setting-hover view_profile" data-code=<?php echo @$data->id; ?>>View</button>

              </div>
            </div>
            </div>
          </div>

          </div>
        </div>
        <?php 
          } }else { ?> 
          <div id="frnd_container-<?php echo @$data->id; ?>">
              <div class='container' >
                 <div class='row position-relative'>
                    <div class="col-md-12 p-3 d-flex">
                      NO List 😑
                    </div>
                  </div>
                </div>
              </div>
        <?php  
          }
        ?>

    </div>
    <div class="col-md-6 overflow-auto">
      <div class="container" id="view_profile_container">
        
      </div>
    </div>
    </div>
      </div>
  </div>

  <div class="tab-pane fade" id="manage_qus" role="tabpanel">
    <div class="row">
      <div class="col-md-12" id="manage_qus_container">
        
      </div>
    </div>
  </div>
</div>
        </div>
      </div>
    </div>
  </div>


</form>
