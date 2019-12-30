<main class="mt-3 pt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 mb-0 pl-0 d-none d-xl-block d-md-block" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px;height:100vh;overflow: auto;">
        <div class="cstm_card_home ml-3">
          <div class="media mt-1 p-2 bg-white pb-0 pl-3 pr-3 text-white" style="font-size: 16px;font-weight: 600;background: #2196f3 !important;">
            <span>Suggested Friend<span>
          </div>
          <div class="container-fluid p-0 bg-white" id="">
              <?php 
                if($frnd_raw_data->num_rows > 0){

                while ($data = $frnd_raw_data->fetch_object()) {
              ?>
            <div id="frnd_container-<?php echo @$data->id; ?>">
              <div class='container' >
                 <div class='row position-relative'>
                    <!-- <div class="col-md-12">  -->
                        <img height="50" style="position: absolute;top: 15%;left: 2%;border-radius: 50%;" width="50" src="server/utilites/profile/<?php echo $data->picture; ?>" >
                      <!-- <div class="pt-2 pb-2 pr-3 pl-3 position-absolute user-profile-setting"  id="user_profile">
                        <?php echo strtoupper(substr($data->username,0,1)); ?> 
                      </div> -->
                    <!-- </div> -->
                    <div class="py-2 col-md-12 px-3 d-flex justify-content-center">
                      <a href="" class='d-flex'>
                        <span><?php echo @strtoupper($data->username); ?></span>
                      </a>
                    </div>
                    <div class="pb-1    col-md-12 px-3 d-flex justify-content-center">
                      <a href="" class='d-flex'>
                        <span><?php echo @$data->useremail; ?></span>
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-0 d-flex justify-content-center">
                      <button class="btn-sm btn-outline-primary float-right btn_setting-hover follow_friend" data-frndblock = "frnd_container-<?php echo @$data->id; ?>" data-code="<?php echo @$data->id; ?>" id="follow-<?php echo @$data->id; ?>">Follow</button>

                      <button class="btn-sm btn-outline-danger ml-3 float-right cancle_block" data-frndcontainer="frnd_container-<?php echo @$data->id; ?>" id=cancle-<?php echo @$data->id; ?>>Cancel</button>

                    </div>
                  </div>
              </div>
          <hr>
            </div>
            <?php } }else{ ?> 

              <div id="frnd_container-<?php echo @$data->id; ?>">
              <div class='container' >
                 <div class='row position-relative'>
                    <div class="col-md-12 p-3 d-flex">
                      NO List 😑
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 p-0" id="question_answer" style="">
        <div class="cstm_card_home">
          <div class="media mt-1 p-2 bg-white pb-0 pt-4 pl-3 pr-3">
            <img class="d-flex rounded-circle avatar mr-3" src="<?php echo @$_SESSION['userprofile']; ?>" height="50" width="50" alt="Generic placeholder image">
            <div class="media-body">
              <div class="form-group basic-textarea rounded-corners">
                <textarea  class="form-control" id="question_input" rows="3" placeholder="Ask Question..." name="question"></textarea>
                <div id="suggested_keywords">
                  <!-- <span class="badge badge-primary" id="catagory">Primary</span> -->
                </div>
                <div class="text-right">
                  <button type="button" class="btn btn-primary btn-sm" id="ask_question" style="background: #AA22CC !important;">Ask question</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="append_question">
          
        </div>
      </div>
      <div class="col-md-3 d-none d-xl-block d-md-block">
        <div class="cstm_card_home">
          <div class="media mt-1 p-2 bg-white pb-0 pl-3 pr-3 text-white" style="font-size: 16px;font-weight: 600;background: #2196f3 !important;">
            <span>Bookmarks<span>
          </div>
          <div class="container-fluid p-0 bg-white" id="append_bookmark">
           
          </div>
        </div>
      </div>
  </div>
</main>