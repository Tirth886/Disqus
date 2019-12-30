<nav class="mb-1 navbar navbar-expand-sm navbar-dark secondary-color px-5 pt-2 pb-0 fixed-top" style="background: #2196f3 !important">
  <a class="navbar-brand mt-2 nav_a" href="?page=home">DIS <label style="">Q</label> US &minus; P <label>R</label> O</a>
<?php 
  if(@$_SESSION['admin_status']){
?>
  <input type="hidden" id="user_name" name="id" value="<?php echo @ucfirst($_SESSION['username']); ?>">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto mb-1 d-flex">
      <li class="nav-item active">
        <a class="nav-link d-inline-flex pb-0" href="?page=users&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>"> 
          <label class="font_size-18">User</label>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link d-inline-flex pb-0" href="?page=question&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>">
          <label class="font_size-18">Question</label>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link d-inline-flex pb-0" href="?page=bookmark&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>">
          <label class="font_size-18">Bookmark</label>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="navbar-nav ml-auto nav-flex-icons text-white" style=""> 
        <a class="nav-link d-inline-flex pb-0" href="" onclick="return false;">
          <label class="font_size-18 text-white">|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @strtoupper(str_replace("_"," ", $_SESSION["admin_username"])); ?></label>
        </a></li>
      <li class="nav-item avatar dropdown d-flex pb-1 text-white">
        <input type="submit" class="btn btn-danger btn-sm" name="admin_logout" value="LOGOUT" />
      </li>
    </ul>
  </div>
<?php 
  }
?>
</nav>