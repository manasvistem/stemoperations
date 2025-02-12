<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nation STEM Program 2023-24</title>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    
    
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
      <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" class="img-responsive">
</div>
<div class="col-md-8">
        <h1>Nation STEM Program 2023-24</h1>
      </div>
      <div>&nbsp;</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Registration Form</h4>
                </div>
                <div class="card-body">
                    <!-- Registration Form -->
                    <p>(<span class="text-danger">*</span>) Mandatory fields</p>
                    <form action="<?=base_url();?>Competition/submitregistration" id="registrationform" method="post">
                    <div class="form-row">
                    <div class="form-group col-md-6">
      <label for="teachername">Teacher's Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="name" id="name" required />
          </div>
          <div class="form-group col-md-6">
      <label for="teachercontact">Teacher's Contact<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="contact" id="contact" required />
          </div>
</div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
      <label for="zone">Zone<span class="text-danger">*</span></label>
      <select class="form-control" id="zone" name="zone" required>
      <option value="">Select Zone</option>
      <option value="2">East Zone</option>
      <option value="3">West Zone</option>
      <option value="4">North Zone</option>
      <option value="5">South Zone</option>
      <option value="6">Central Zone</option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="state">State<span class="text-danger">*</span></label>
      <select class="form-control" id="state" name="state" required disabled>
      <option value="">Select State</option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="district">District</label>
      <select class="form-control" id="district" name="district" disabled>
      <option value="">Select District</option>
    </select>
    </div>
                    </div>
      <div class="form-group">
        <label for="school">School<span class="text-danger">*</span></label>
        <select class="form-control selectpicker" id="school" name="school" required data-live-search="true">
      <option value="">Select School</option>
    </select>
      </div>
      <div id="schooldetail">
        No school selected
      </div>
      <div>&nbsp;</div>
      <label>Select the Competition You will be participating</label>
      <div class="form-group">
      <div class="form-check">
  <input class="form-check-input checkbox" type="checkbox" value="YES" name="modelcheck" id="modelcheck">
  <label class="form-check-label" for="modelcheck">
  Science & Math Model Making
  </label>
</div>
      </div>

      <div class="row" id="modeldetail" style="display:none; border: 1px solid #888;">
        <div class="col-md-12">
          <h5>Student 1</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="msname1" id="msname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="msstd1" id="msstd1" >
        <option value="7">7 TH</option>
        <option value="8">8 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpname1" id="mpname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpcontact1" id="mpcontact1" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 2</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="msname2" id="msname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="msstd2" id="msstd2"  >
        <option value="7">7 TH</option>
        <option value="8">8 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpname2" id="mpname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpcontact2" id="mpcontact2" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 3</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="msname3" id="msname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="msstd3" id="msstd3"  >
        <option value="7">7 TH</option>
        <option value="8">8 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpname3" id="mpname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="mpcontact3" id="mpcontact3" required />
          </div>
          </div>
        </div>
</div>

      <div class="form-group">
      <div class="form-check">
  <input class="form-check-input checkbox" type="checkbox" value="YES" name="quizcheck" id="quizcheck">
  <label class="form-check-label" for="quizcheck">
  TECH Quiz
  </label>
</div>
      </div>

      <div class="row" id="techdetail" style="display:none; border: 1px solid #888;">
        <div class="col-md-12">
        <h5>Student 1</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tsname1" id="tsname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tsstd1" id="tsstd1"  >
        <option value="6">6 TH</option>
        <option value="7">7 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpname1" id="tpname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpcontact1" id="tpcontact1" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 2</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tsname2" id="tsname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tsstd2" id="tsstd2"  >
        <option value="6">6 TH</option>
        <option value="7">7 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpname2" id="tpname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpcontact2" id="tpcontact2" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 3</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tsname3" id="tsname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tsstd3" id="tsstd3"  >
        <option value="6">6 TH</option>
        <option value="7">7 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpname3" id="tpname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tpcontact3" id="tpcontact3" required />
          </div>
          </div>
        </div>
</div>

      <div class="form-group">
      <div class="form-check">
  <input class="form-check-input checkbox" type="checkbox" value="YES" name="tinkercheck" id="tinkercheck">
  <label class="form-check-label" for="tinkercheck">
  Tinkering
  </label>
</div>
      </div>

      <div class="row" id="tinkerdetail" style="display:none; border: 1px solid #888;">
        <div class="col-md-12">
        <h5>Student 1</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tisname1" id="tisname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tisstd1" id="tisstd1"  >
        <option value="8">8 TH</option>
        <option value="9">9 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipname1" id="tipname1" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipcontact1" id="tipcontact1" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 2</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tisname2" id="tisname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tisstd2" id="tisstd2"  >
        <option value="8">8 TH</option>
        <option value="9">9 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipname2" id="tipname2" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipcontact2" id="tipcontact2" required />
          </div>
          </div>
        </div>

        <div class="col-md-12">
        <h5>Student 3</h5>
          <div class="form-row">
          <div class="form-group col-md-3">
      <label for="studentname">Student Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tisname3" id="tisname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Standard<span class="text-danger">*</span></label>
      <select class="form-control" type="text" name="tisstd3" id="tisstd3"  >
        <option value="8">8 TH</option>
        <option value="9">9 TH</option>
</select>
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Parent Name<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipname3" id="tipname3" required />
          </div>
          <div class="form-group col-md-3">
      <label for="studentname">Contact Number<span class="text-danger">*</span></label>
      <input class="form-control" type="text" name="tipcontact3" id="tipcontact3" required />
          </div>
          </div>
        </div>
</div>

                    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" name="invalidCheck" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        All the provided information are valid.
      </label>
    </div>
  </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" id="submit" class="btn btn-primary" >Register</button>
                        </div>
                    </form>
                    <!-- End Registration Form -->
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script>
  $(document).ready(function(){
      
      
      $('.selectpicker').selectpicker();
      
    $('#tinkerdetail :input').attr("required",false);
    $('#modeldetail :input').attr("required",false);
    $('#techdetail :input').attr("required",false);
  $('#zone').on('change',function(){
    var zone=$(this).val();
    if(zone!=""){
  $.ajax({
url:'<?=base_url();?>Competition/getstatebyzone',
type: "POST",
data: {
  zone: zone
},
cache: false,
success: function a(result){
  $("#state").attr("disabled",false);
$("#state").html(result);
}
});
    } else {
      $("#state").attr("disabled","disabled");
      $("#state").html("<option value=''>Select State</option>");
    }
});

$('#state').on('change',function(){
    $("#school").removeClass('selectpicker');
    var zone=$('#zone').val();
    var state=$('#state').val();
    if(state!=""){
  $.ajax({
url:'<?=base_url();?>Competition/getdistrictbystateandzone',
type: "POST",
data: {
  zone: zone,
  state:state
},
cache: false,
success: function a(result){
  $("#district").attr("disabled",false);
$("#district").html(result);
}
});
$.ajax({
url:'<?=base_url();?>Competition/getschoolbyzonestate',
type: "POST",
data: {
  zone: zone,
  state:state
},
cache: false,
success: function a(result){
//   $("#school").attr("disabled",false);
$("#school").html(result);
$("#school").addClass('selectpicker');
$('.selectpicker').selectpicker("refresh");
}
});
    } else {
      $("#district").attr("disabled","disabled");
      $("#district").html("<option value=''>Select District</option>");
    }
});

$('#district').on('change',function(){
    var zone=$('#zone').val();
    var state=$('#state').val();
    var district=$('#district').val();
    if(district!=""){
  $.ajax({
url:'<?=base_url();?>Competition/getschoolbyzonestatedistrict',
type: "POST",
data: {
  zone: zone,
  state:state,
  district:district
},
cache: false,
success: function a(result){
//   $("#school").attr("disabled",false);
$("#school").html(result);
$('.selectpicker').selectpicker("refresh");
}
});
    } else {
      $.ajax({
url:'<?=base_url();?>Competition/getschoolbyzonestate',
type: "POST",
data: {
  zone: zone,
  state:state
},
cache: false,
success: function a(result){
//   $("#school").attr("disabled",false);
$("#school").html(result);
$('.selectpicker').selectpicker("refresh");
}
});
    }
});

$('#school').on('change',function(){
  var id=$(this).val();
  if(id!=""){
    $.ajax({
url:'<?=base_url();?>Competition/displayschooldetails',
type: "POST",
data: {
  id:id
},
cache: false,
success: function a(result){
$("#schooldetail").html(result);
}
});
  } else {
    $("#schooldetail").html("No school selected")
  }
});

$("#modelcheck").on('change',function(){
  if($(this).prop('checked')){
    $("#modeldetail").show();
    $('#modeldetail :input').attr("required","required");
  } else {
    $("#modeldetail").hide();
    $('#modeldetail :input').attr("required",false);
  }
})

$("#quizcheck").on('change',function(){
  if($(this).prop('checked')){
    $("#techdetail").show();
    $('#techdetail :input').attr("required","required");
  } else {
    $("#techdetail").hide();
    $('#techdetail :input').attr("required",false);
  }
})

$("#tinkercheck").on('change',function(){
  if($(this).prop('checked')){
    $("#tinkerdetail").show();
    $('#tinkerdetail :input').attr("required","required");
  } else {
    $("#tinkerdetail").hide();
    $('#tinkerdetail :input').attr("required",false);
  }
})

$("#registrationform").on('submit', function(e){
  
  if ($('.checkbox:checked').length > 0) {
      //$("#registrationform").submit();
  } else {
      alert('Please select at least one Competition.');
      e.preventDefault();
      return false;
  }
})

});
  </script>

</body>
</html>
