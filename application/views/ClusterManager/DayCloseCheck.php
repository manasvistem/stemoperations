
<div class="wrapper">

  
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Check Day Close</h3>
                  <hr>
                  <?php 
                  
                  if($mdata){?>
                  <form action="<?=base_url();?>Menu/checkdayc" method="post">
                     <input type="hidden" name="udid" value="<?=$mdata[0]->udid?>">
                    <div class="was-validated">
                    <div class="form-group">
                        <?php foreach ($mdata as $md){ 
                        $ustart = $md->ustart;
                        $uclose = $md->uclose;
                        $ustart = date('h:i A', strtotime($ustart));
                        $uclose = date('h:i A', strtotime($uclose));
                        
                        ?>
                            <div class="text-center"><h5><?=$md->name?> Started Their Day @<?=$ustart?></h5></div>
                            <div class="text-center"><h5><?=$md->name?> Closed Their Day @<?=$uclose?></h5></div>
                            <div class="text-center"><h5>Today Working From <?php if($md->wffo=='1'){echo 'Office';}elseif($md->wffo=='2'){echo 'Field';}else{echo 'Field+Office';}?></h5></div>
                            <br>
                            <div class="text-center"><img src="<?=base_url();?><?=$md->ucimg?>" class="img-thumbnail" width="50%"></div>
                            <br>
                            <div class="img-thumbnail" style="height: 300px"><iframe width="100%"  height="100%" src="https://maps.google.com/?q=<?=$md->clatitude?>,<?=$md->clongitude?>&t=k&z=13&ie=UTF8&iwloc=&output=embed"></iframe></div>
                            <br>
                            <div class="from-group">
                                <h5 class="text-center"><input type="hidden" name="que[]" value="Closed at Good Time">Closed at Good Time</h5>
                                <div class="rating">
                                    <input type="radio" name="rat1" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rat1" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rat1" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rat1" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rat1" value="1" id="1"><label for="1">☆</label>
                                </div>
                                
                            </div>
                            
                            <div class="from-group">
                                <h5 class="text-center"><input type="hidden" name="que[]" value="The work planned for today has been completed successfully">The work planned for today has been completed successfully</h5>
                                <div class="rating">
                                    <input type="radio" name="rat2" value="5" id="10"><label for="10">☆</label>
                                    <input type="radio" name="rat2" value="4" id="9"><label for="9">☆</label>
                                    <input type="radio" name="rat2" value="3" id="8"><label for="8">☆</label>
                                    <input type="radio" name="rat2" value="2" id="7"><label for="7">☆</label>
                                    <input type="radio" name="rat2" value="1" id="6"><label for="6">☆</label>
                                </div>
                            </div>
                            
                            <div class="from-group">
                                <h5 class="text-center"><input type="hidden" name="que[]" value="Day Start Image is Good">Day Close Image is Good</h5>
                                <div class="rating">
                                    <input type="radio" name="rat3" value="5" id="11"><label for="11">☆</label>
                                    <input type="radio" name="rat3" value="4" id="12"><label for="12">☆</label>
                                    <input type="radio" name="rat3" value="3" id="13"><label for="13">☆</label>
                                    <input type="radio" name="rat3" value="2" id="15"><label for="14">☆</label>
                                    <input type="radio" name="rat3" value="1" id="14"><label for="15">☆</label>
                                </div>
                            </div>
                            
                            
                            <div class="from-group">
                                <h5 class="text-center"><input type="hidden" name="que[]" value="Day Start Location as per Plan">Day Close Location as per Plan</h5>
                                <div class="rating">
                                    <input type="radio" name="rat4" value="5" id="16"><label for="16">☆</label>
                                    <input type="radio" name="rat4" value="4" id="17"><label for="17">☆</label>
                                    <input type="radio" name="rat4" value="3" id="18"><label for="18">☆</label>
                                    <input type="radio" name="rat4" value="2" id="19"><label for="19">☆</label>
                                    <input type="radio" name="rat4" value="1" id="20"><label for="20">☆</label>
                                </div>
                            </div>
                            
                            <textarea class="form-control" name="sremark" placeholder="Remark" required=""></textarea>
                            
                        <?php } ?>
                            <center><input type="submit" class="btn btn-success mt-3"></center>
                        </div>
                        
                        </div>
                  </form>
                  <?php } else{echo '<b class="text-success">Congratulations, you have successfully completed this task!</b>';}?>
            </div>
          </div>
      </div>   
     </div>     
    </section>


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

</script>

          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<script>
$(function() {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
});
</script>
</body>
</html>