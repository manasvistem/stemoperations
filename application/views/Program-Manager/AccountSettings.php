<?php $this->load->view('nav'); ?>
<style>
  .card {
  padding:10px;
  }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header-text text-center">
        <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <?= $this->session->flashdata('success_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?= $this->session->flashdata('error_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      </h5>
      <?php 
        // dd($uData);
        
        $country      = $uData[0]->country;
        $ustate       = $uData[0]->state;
        $udistrict    = $uData[0]->district;
        $ucity        = $uData[0]->city;
        $photo        = $uData[0]->photo;
        
        ?>
      <div class="row">
        <div class="col-md-12">
            <div class="crad p-1" style="background: aliceblue;">
            <h3 class="text-center">Profile Settings</h3>
            </div>
          <hr>
          <div class="card mb-6">
            <!-- Account -->
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                    <?php if($photo ==''){ ?>
                    <img src="<?=base_url()?>assets/img/profile.jpg" 
                      alt="user-avatar" class="d-block w-px-100 h-px-100 rounded-circle imgpreviewPrf" id="item-img-output">
                    <?php }else{ ?>
                    <img src="<?=base_url().$photo;?>" 
                      alt="user-avatar" class="d-block w-px-100 h-px-100 rounded-circle imgpreviewPrf" id="item-img-output">
                    <?php } ?>
                    <div class="button-wrapper">
                      <form action="<?= base_url('Menu/UpdateUserProfilePicture') ?>" method="post" enctype="multipart/form-data">
                        <label for="upload" class="btn btn-outline-secondary me-3 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" name="profile_picture" hidden accept="image/png, image/jpeg">
                        </label>
                        <button type="submit" class="btn btn-primary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Change Profile</span>
                        </button>
                      </form>
                      <div>Allowed JPG, PNG. Max size of 800KB</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="change-password-section" style="justify-content:right; display:flex;">
                  <span class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" style="width: 100px;" >
                  Change Password
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body pt-4">
              <form action="<?=base_url().'Menu/UpdateUserProfile'?>" id="formAccountSettings" method="post">
                <div class="row g-6">
                  <div class="col-md-4">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input class="form-control" type="text" id="full_name" name="full_name" value="<?=$uData[0]->fullname;?>" placeholder="Deepak" autofocus="" required>
                  </div>
                  <div class="col-md-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?=$uData[0]->email;?>"  placeholder="deepak.kumar.@gmail.com" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IN (+91)</span>
                      <input type="text" id="phoneNumber" name="phoneNumber" value="<?=$uData[0]->phoneno;?>" class="form-control" placeholder="Phone Number" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label" for="country">Country</label>
                    <select id="country" name="country" class="select2 form-select" required>
                      <option selected value="India">India</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="state" class="form-label">State</label>
                    <select class="select2 form-select" name="state" id="userslsctstate" required>
                      <option>Select State</option>
                      <?php foreach($usersstates as $usersstate) {
                        if($ustate == $usersstate->state_title){
                            $selectedstate = 'selected';
                        }else{
                            $selectedstate = '';
                        }
                        
                        ?>
                      <option <?=$selectedstate?> value="<?= $usersstate->state_title ?>">
                        <?= $usersstate->state_title ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="state" class="form-label">District</label>
                    <select  class="select2 form-select" id="select_district" name="district" required>
                      <option value="<?=$udistrict;?>"><?=$udistrict;?></option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="state" class="form-label">City</label>
                    <select class="select2 form-select" id="select_city" name="city" required>
                      <option value="<?=$ucity;?>"><?=$ucity;?></option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="basic-default-message" name="address" class="form-control" placeholder="Address" required><?=$uData[0]->address;?></textarea>
                  </div>
                </div>
                <hr>
                <div class="mt-6 text-center">
                  <button type="submit" class="btn btn-primary me-3">Save changes</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4">
      <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
          <div class="text-center">
            <img src="<?=base_url()?>assets/img/reset-password.avif" width="300" alt="pendingtasklist">
          </div>
          <hr>
          <center>
            <h5 id="offcanvasBothLabel" class="offcanvas-title">Change Password</h5>
          </center>
          <hr>
          <form action="<?=base_url().'Menu/UpdatePassword'?>" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Old Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" name="old_password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">New Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="new_password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Confirm New Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="confirm_new_password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Change Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
  $(document).ready(function() {
    $('#userslsctstate').on('change', function() {
                  var userslsctstate = $(this).val();
                  $.ajax({
                          url:'<?=base_url();?>Menu/GetDistrictINState',
                          type: "POST",
                          data: {
                              userslsctstate: userslsctstate
                          },
                          cache: false,
                          success: function a(result){
                              $('#select_district').html(result);
                          }
                          });
                  });
                  $('#select_district').on('change', function() {
                  var selectdistrict = $(this).val();
                  $.ajax({
                          url:'<?=base_url();?>Menu/GetCityInDistrict',
                          type: "POST",
                          data: {
                              selectdistrict: selectdistrict
                          },
                          cache: false,
                          success: function a(result){
                              $('#select_city').html(result);
                          }
                          });
                  });
  });
  
  
  $(document).ready(function() {
    $("#upload").change(function(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#item-img-output").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
  
    $("#reset-img").click(function() {
        $("#upload").val(""); // Clear file input
        $("#item-img-output").attr("src", "http://localhost/stemoperations/assets/assets/img/avatars/1.png");
    });
  });
  
</script>
<?php $this->load->view('footer'); ?>