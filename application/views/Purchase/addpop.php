<?php $uid=$user['id'];?>
<div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-standard-title1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- // END .modal-header -->
            <div class="modal-body">
                <div class="card card-form col-md-12">
                   <div class="card-header bg-info">Create Plan</div>
                   <h6 class="text-center mt-1" id="cmpname"></h6>
                    <div class="col-lg-12 card-body">
                        <?php $today = date('Y-m-d H:i:s'); ?>
                       <?=form_open('Menu/setaction')?>
                       <input type="hidden" id="taskid" name="taskid">
                       <input type="hidden" value="<?=$uid?>" name="uid">
                       <lable>Select Date Time</lable>
                       <input type="datetime-local" name="date" class="form-control p-3 mt-2 mb-2" placeholder="Date" value="<?=$today?>">
                       <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                       </form>
                    </div>
                    </div>
                        </div>
                    </div>
            </div> 
            
</div></div></div>



<div id="add_note" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="d-lg-block d-sm-none d-md-none text-danger p-3 m-3 text-center"><b>Only For Mobile Use</b></div>
                <div class="modal-body"><!-- d-lg-none d-sm-block d-md-none-->
                    <div id="noprc"></div>
                                <div class="card row m-2" id="dv2">
                                  <div class="col-12 col-md-12">
                                    <div class="card-header bg-info"><a id="snlink" target="_blank" href=""><lable id="sname"></lable></a></div>
                                    <div class="card-body">
                                        <div class="col-sm">Address : <lable id="saddress"></lable></div>
                                        <div class="col-sm">State : <lable id="sstate"></lable></div>
                                        <div class="col-sm">Current Status : <lable id="cstatus"></lable></div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="card row m-2">
                                  <div class="col-12 col-md-12">
                                    <div class="card-header bg-info">Primary Contact Person</div>
                                    <div class="card-body">
                                        <div class="col-sm">Name : <lable id="cp"></lable></div>
                                        <div class="col-sm">Designation : <lable id="designation"></lable></div>
                                        <div class="col-sm">Phone No : <lable id="cno"></lable></div>
                                        <div class="col-sm">Email id : <lable id="email"></lable></div>
                                            <span>
                                                <a id="clink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                                                <img src="https://stemlearning.in/opp/assets/image/icon/call.png" style="height:30px;"></a>
                                                <a id="wlink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                                                <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                                                <a id="wglink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                                                <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                                                <a id="glink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                                                <img src="https://mailmeteor.com/logos/assets/PNG/Gmail_Logo_512px.png" style="height:20px;"></a>
                                            </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="card row m-2">
                                  <div class="col-12 col-md-12">
                                    <div class="card-header bg-info">Current Action : <lable id="action"></lable></div>
                                    <div class="card-body">
                                            <div id="uti" style="display:none">
                                                <form action="<?=base_url();?>Menu/submittask" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="uid" value="<?=$uid?>">
                                                <input type="hidden" name="sid" id="sid" value="">
                                                <input type="hidden" name="tid" id="tid" value="">
                                                <input type="hidden" name="pid" id="pid" value="">
                                                <input type="Date" name="date" class="form-control p-3  mt-2" value="<?=date('Y-m-d')?>">
                                                       <input type="file" class="form-control file-input" name="waimage[]" id="waimage" multiple required>
                                                        <section class="progress-area"></section>
                                                        <section class="uploaded-area"></section>
                                                       <select id="sel" class="form-control  p-3  mt-2">
                                                            <option>Peer to Peer Teaching & Learning</option>
                                                            <option>MSC exhibits brought to Classroom</option>
                                                            <option>Students taken to MSC</option>
                                                            <option>Student Learning concepts Independently with MSC exhibits</option>
                                                            <option>Project Created with the help of MSC exhibits</option>
                                                            <option>Teacher to teacher Knowledge Transfer</option>
                                                            <option>Exhibits outside Classroom and MSC</option>
                                                            <option>Other</option>
                                                       </select>
                                                       <textarea id="remark" name="remark" class="form-control  p-3  mt-2" placeholder="Remark" readonly required></textarea>
                                                    <div class="card-footer">
                                                      <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                </form>
                                </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
</div></div></div>












<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

$('[id^="add_plan"]').on('click', function() {
    $('#doaction').modal('show');
    var tid = this.value;
    document.getElementById("taskid").value = tid;
    $.ajax({
         url:'<?=base_url();?>Menu/cctd',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#cname').text('');
           if(len > 0){
             // Read values
             var cname = response[0].cname;
             document.getElementById("cmpname").innerHTML = cname;
           }
         }
       });
});


$('[id^="add_act"]').on('click', function() {
    $('#add_note').modal('show');
    var tid = this.value;
        $.ajax({
         url:'<?=base_url();?>Menu/cctd',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#sname').text('');
           if(len > 0){
             var sname = response[0].sname;
             var saddress = response[0].saddress;
             var sstate = response[0].sstate;
             var wglink = response[0].wanamelink;
             var cstatus = response[0].name;
             var cp = response[0].contact_name;
             var designation = response[0].designation;
             var cno = response[0].contact_no;
             var email = response[0].email;
             var sid = response[0].sid;
             var action = response[0].action;
             var tid = response[0].tid;
             var pid = response[0].pid;
             document.getElementById("sname").innerHTML = sname;
             document.getElementById("saddress").innerHTML = saddress;
             document.getElementById("sstate").innerHTML = sstate;
             document.getElementById("cstatus").innerHTML = cstatus;
             document.getElementById("cp").innerHTML = cp;
             document.getElementById("designation").innerHTML = designation;
             document.getElementById("cno").innerHTML = cno;
             document.getElementById("email").innerHTML = email;
             document.getElementById("snlink").href = "school_detail/"+sid;
             document.getElementById("clink").href = "tel:+91"+cno;
             document.getElementById("wlink").href = "https://wa.me/91"+cno;
             document.getElementById("wglink").href = wglink;
             document.getElementById("glink").href = "mailto:"+email;
             document.getElementById("sid").value = sid;
             document.getElementById("action").innerHTML = action;
             document.getElementById("tid").value = tid;
             document.getElementById("pid").value = pid;
             
           }else{
             document.getElementById("sname").innerHTML = "";
           }
           
           if(action=='Utilisation'){$("#uti").show();}
         }
    });
});
  
$('#sel').on('change', function a() { 
 var sel = this.value;
 if(sel=='Other'){
     document.getElementById("remark").readOnly = false;
 }else{
 document.getElementById("remark").value = sel;}
});


let resul = document.querySelector('#resul');
document.body.addEventListener('change', function (f) {
    let target = f.target;
    let message;
    switch (target.id) {
        case 'presolved':
            $("#ifyes").show();
            $("#ifno").hide();
            var cstatus = document.getElementById("cstatus").value;
                $.ajax({
                url:'<?=base_url();?>Menu/getstatusbd',
                type: "POST",
                data: {
                cstatus: cstatus
                },
                cache: false,
                success: function a(result){
                $("#ystatus").html(result);
                }
                });
                callab();
            break;
        case 'pnresolved':
            $("#ifno").show();
            $("#ifyes").hide();
            var status_id = document.getElementById("cstatus").value;
                $.ajax({
                url:'<?=base_url();?>Menu/mainremark',
                type: "POST",
                data: {
                status_id: status_id
                },
                cache: false,
                success: function a(result){
                $("#tremark").html(result);
                }
                });
            callab();
            break;
    }
    resul.textContent = message;
});
  

});

  



 $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});



const form = document.querySelector("form"),
fileInput = document.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");



fileInput.onchange = ({target})=>{
  let file = target.files[0];
  if(file){
    let fileName = file.name;
    if(fileName.length >= 12){
      let splitName = fileName.split('.');
      fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    }
    uploadFile(fileName);
  }
}

function uploadFile(name){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/upload.php");
  xhr.upload.addEventListener("progress", ({loaded, total}) =>{
    let fileLoaded = Math.floor((loaded / total) * 100);
    let fileTotal = Math.floor(total / 1000);
    let fileSize;
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;
    if(loaded == total){
      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
    }
  });
  let data = new FormData(form);
  xhr.send(data);
}
 </script>
 
 
 
 <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
 <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>