<nav class="mb-1 navbar navbar-expand-sm navbar-dark secondary-color px-5 pt-2 pb-0 fixed-top" style="background: #2196f3 !important">
  <a class="navbar-brand mt-2 nav_a" href="#">DIS <label style="">Q</label> US &minus; P <label>R</label> O</a>
<?php 
  if(@$_SESSION['status']){
?>
  <input type="hidden" id="user_name" name="id" value="<?php echo @ucfirst($_SESSION['username']); ?>">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto mb-1">
      <li class="nav-item active">
        <a class="nav-link d-inline-flex pb-0" href="?page=home"> 
          <i class="mr-2"><img src="static/img/home-icon-silhouette.svg" height="25 " width="25  "></i>
          <label class="font_size-18">Home</label>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link d-inline-flex pb-0" href="?page=blog">
          <i class="mr-2"><img src="static/img/blogger-letter-logotype.svg" height="25  " width="25 "></i>
          <label class="font_size-18">Blog</label>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar dropdown d-flex pb-1">
        
        <div class="pt-2 pb-2 pr-3 pl-3" data-toggle="modal" data-target="#fullWidth" id="user_profile" style="background: #f5f5f5;font-size: 20px;cursor: pointer; border-radius: 50%;box-shadow: 0px 0px 02px 1px #fff;">
          <?php echo strtoupper(substr($_SESSION['username'],0,1)); ?> 
        </div>
        <!-- <a class="nav-link dropdown-toggle pb-0">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg"  class="rounded-circle z-depth-0"  alt="avatar image">
        </a> -->
      </li>
    </ul>
  </div>
<?php 
  }
?>
</nav>


<!-- <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <div class="modal-dialog modal-fluid" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <div class="container">
          <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 pt-3 pb-3">
          
          <div class="container pl-0 ml-0">
              <div class="row pl-0 ml-0">
                <div class="col-md-4 editable_modal-profile">
                    <div class="container pl-0">
                      <div class="input">
                        <div class="container pl-0 text-center">
                          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="" alt="Uploaded file" id="uploadImg" height="200" width="200">
                          <input name="input" id="file" type="file">
                          <button class="btn btn-primary btn-sm" value="UPLOAD PROFILE" id="upload">
                            <img src="static/img/photo-camera.svg" height="20" width="20">&nbsp;&nbsp;CHOOSE PROFILE PHOTO 
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 editable_modal-profile">
                    <div class="container pl-0">
                      
                    </div>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer" style="border-top: 0 !important;">
        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->