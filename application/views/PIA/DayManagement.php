
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php if($do==0){?>
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/daysc" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="hidden" name="ustart" value="<?=date('Y-d-m H:i:s')?>">
                        <p>You Are Starting Day at <b><?=date('H:i:s');?></b><br><br>
                        <div class="mb-4">
                            <!-- <select class="form-control" name="wffo">
                                <option value="1">Work From Office</option>
                                <option value="2">Work From Field</option>
                                <option value="3">Work From Field+Office</option>
                            </select> -->
                            <select class="form-control" name="wffo" id="wffo" style="width:400px" required>
                              <option value="">Start Your Day</option>
                                <?php foreach($userdfrom as $udfrom){ ?>
                                <option value="<?= $udfrom->ID; ?>"><?= $udfrom->TYPE; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="border" id="blah" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="your image" style="width:150px;height:250px"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                            </div>
                        </div>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                        <input type="hidden" name="do" value="<?=$do?>">
                    </div>
                    <div id="location">
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                          <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" id="submitButton" >Start Your Day</button>
                        <center>
                        <p id="goodmessage"></p>
                        </center>                        
                      </div>
                    </div>
                  </form>
            </div>
          </div>
      </div>   
     </div>     
    </section>
    <?php } if($do==1){?>
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/daysc" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <p>You have Started your Day at <b><?=$ustart=$mdata[0]->ustart?></b></p>
                        <p>You have Started your Day from <b><?php if($mdata[0]->wffo==1){echo'Work From Office';}if($mdata[0]->wffo==2){echo'Work From Field';}if($mdata[0]->wffo==3){echo'Work From Field+Office';}?></b></p>
                        <p>You have Closing your Day at <b><?=$cdate=date('H:i:s');?></b></p>
                        <p>Time diffrence is <b><?=$this->Menu_model->timediff($ustart,$cdate);?></b></p>
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="border" id="blah" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="your image" style="width:150px;height:250px"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                            </div>
                        </div>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                        <input type="hidden" name="do" value="<?=$do?>">
                    </div>
                    <div id="location">
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                          <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger" onclick="this.form.submit(); this.disabled = true;">Close Your Day</button>
                    </div>
                    </div>
                    
                  </form>
            </div>
          </div>
      </div>   
     </div>     
    </section>
  <?php } if($do==2){?>
  <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <p>You Are Started Day at <b><?=$mdata[0]->ustart?></b></p>
                        <p>You Are Closed Day at <b><?=$mdata[0]->uclose?></b></p>
                    </div>
            </div>
          </div>
      </div>   
     </div>     
    </section>
  <?php }?>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
document.getElementById("location").style.display = "none";
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file);
    document.getElementById("location").style.display = "block";
  }
}


var x = document.getElementById("lat");
var y = document.getElementById("lng");
var z = document.getElementById("mylocation");
$(document).ready(function(){
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.value = "Geolocation is not supported by this browser.";
  }
});
function showPosition(position) {
  x.value = position.coords.latitude; 
  y.value = position.coords.longitude;
  var a = position.coords.latitude;
  var b = position.coords.longitude;
  mylocation.src = "https://maps.google.com/?q="+a+","+b+"&t=k&z=13&ie=UTF8&iwloc=&output=embed";
}




$('#task_subtype').on('change', function() {
   var tst = this.value;
   var tt = document.getElementById("task_type").value;
   if(tt=="VISIT"){
       if(tst=="New Client"){
          $("#box1").show();
          $("#box2").hide(); 
       }
       if(tst=="Onboard Client" || tst=="Inauguration"){
          $("#box2").show();
          $("#box1").hide();
       }
   }
   if(tt=="TTP"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="M&E"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="DIY"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Utilisation"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Call"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Email"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Whatsapp"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Other"){
      $("#box2").hide();
      $("#box1").hide();
   }
});

$('#region').on('change', function b() {
var dep = document.getElementById("dep").value;
var region = document.getElementById("region").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getuserbydr',
type: "POST",
data: {
dep: dep,
region: region
},
cache: false,
success: function a(result){
$("#to_user").html(result);
}
});
});


$('#task_type').on('change', function c() {
var tt = document.getElementById("task_type").value;
$.ajax({
url:'<?=base_url();?>Menu/getpitst',
type: "POST",
data: {
tt: tt
},
cache: false,
success: function a(result){
$("#task_subtype").html(result);
}
});
});

$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdbypcs',
type: "POST",
data: {
pcode: pcode
},
cache: false,
success: function a(result){
$("#spd_id").html(result);
}
});
});

$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdbypcs',
type: "POST",
data: {
pcode: pcode
},
cache: false,
success: function a(result){
$("#spd_id1").html(result);
}
});
});

$('#submitButton').click(function(event) {
              var fileInput = $('#imgInp');
              if (fileInput.val() === '') {
                  alert('Please Select Your Picture.');
                  event.preventDefault();
                  return false;
              }
          });
</script>
<script type='text/javascript'>
      document.getElementById("location").style.display = "none";
      imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          blah.src = URL.createObjectURL(file);
          document.getElementById("location").style.display = "block";
        }
      }
      var x = document.getElementById("lat");
      var y = document.getElementById("lng");
      var z = document.getElementById("mylocation");
      $(document).ready(function(){
          if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.value = "Geolocation is not supported by this browser.";
        }
      });
      function showPosition(position) {
        x.value = position.coords.latitude; 
        y.value = position.coords.longitude;
        var a = position.coords.latitude;
        var b = position.coords.longitude;
        mylocation.src = "https://maps.google.com/?q="+a+","+b+"&t=k&z=13&ie=UTF8&iwloc=&output=embed";
      }
      $('#lat').on('change', function() {
         document.getElementById("closebtn").disabled = true;
      });
    </script>
          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
