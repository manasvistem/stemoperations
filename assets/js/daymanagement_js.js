


// var x = document.getElementById("lat");
// var y = document.getElementById("lng");
// var z = document.getElementById("mylocation");
// $(document).ready(function(){
//     if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else { 
//     x.value = "Geolocation is not supported by this browser.";
//   }
// });
// function showPosition(position) {
//   x.value = position.coords.latitude; 
//   y.value = position.coords.longitude;
//   var a = position.coords.latitude;
//   var b = position.coords.longitude;
//   mylocation.src = "https://maps.google.com/?q="+a+","+b+"&t=k&z=13&ie=UTF8&iwloc=&output=embed";
// }




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


    