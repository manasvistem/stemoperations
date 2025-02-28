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
                                                <form action="<?=base_url();?>Menu/addwag" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="uid" value="<?=$uid?>">
                                                <input type="hidden" name="sid" id="sid" value="">
                                                <input type="hidden" name="project_code" id="project_code" value="">
                                                <input type="hidden" name="tid" id="tid" value="">
                                                <input type="hidden" name="pid" id="pid" value="">
                                                <input type="Date" name="date" class="form-control p-3  mt-2" value="<?=date('Y-m-d')?>">
                                                <input type="file" class="form-control file-input" name="waimage[]" id="waimage" multiple required>
                                                <section class="progress-area"></section>
                                                <section class="uploaded-area"></section>
                                                <input type="text" list="models" name="model_search[]" class="form-control mt-2" placeholder="Search Model" required multiple>
                                                <datalist id="models">
                                                    <?php $models = $this->Menu_model->get_modelfromf(); foreach($models as $model){?>
                                                        <option value="<?=$model->model_name?>"><?=$model->model_name?></option>
                                                    <?php } ?>
                                                </datalist>

                                                
                                                <select name="teacher" id="teacher" class="form-control mt-2" required></select>
                                                
                                                       <select id="sel" class="form-control mt-2" required>
                                                            <option value="">Select Remark</option>
                                                            <option>Peer to Peer Teaching & Learning</option>
                                                            <option>Peer to Peer Teaching & Learning</option>
                                                            <option>MSC exhibits brought to Classroom</option>
                                                            <option>Students taken to MSC</option>
                                                            <option>Student Learning concepts Independently with MSC exhibits</option>
                                                            <option>Project Created with the help of MSC exhibits</option>
                                                            <option>Teacher to teacher Knowledge Transfer</option>
                                                            <option>Exhibits outside Classroom and MSC</option>
                                                            <option>Exhibits in Classroom</option>
                                                            <option>Other</option>
                                                       </select>
                                                     
                                                 <textarea id="remark" name="remark" class="form-control  p-3  mt-2" placeholder="Remark" readonly required></textarea>
                                                    <div class="card-footer">
                                                      <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                                    </div>
                                                </form>    
                                            </div>
                                            
                                            <div id="research" style="display:none">
                                                <form action="<?=base_url();?>Menu/research" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="rrtid" id="rrtid">
                                                <div class="">
                                                    <span><b>Purpose Completed?</b></span>
                                                    <input type="radio" id="purposeyes" name="purposetaken" Value="yes"> 
                                                    <label for="purposeyes">YES</label>
                                                    <input type="radio" id="purposeno" name="purposetaken" Value="no"> 
                                                    <label for="purposeno">NO</label>
                                                </div>
                                                 <textarea id="remark" name="rtremark" class="form-control  p-3  mt-2" placeholder="Remark" required></textarea>
                                                    <div class="card-footer">
                                                      <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                                    </div>
                                                </form>    
                                            </div>
                                            
                                            
                                            <div id="comm" style="display:none">
                                                <form action="<?=base_url();?>Menu/commwag" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="couid" value="<?=$uid?>">
                                                <input type="hidden" name="cosid" id="cosid" value="">
                                                <input type="hidden" name="coproject_code" id="coproject_code" value="">
                                                <input type="hidden" name="cotid" id="cotid" value="">
                                                <input type="hidden" name="copid" id="copid" value="">
                                                <input type="hidden" name="date" class="form-control p-3  mt-2" value="<?=date('Y-m-d')?>">
                                                <input type="file" class="form-control file-input" name="waimage[]" id="waimage" multiple required>
                                                <section class="progress-area"></section>
                                                 <textarea name="remark" class="form-control  p-3  mt-2" placeholder="Remark" required></textarea>
                                                    <div class="card-footer">
                                                      <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                                    </div>
                                                </form>    
                                            </div>
                                            
                                            
                                            <div id="case" style="display:none">
                                                <form action="<?=base_url();?>Menu/addcase" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="cauid" value="<?=$uid?>">
                                                <input type="hidden" name="casid" id="casid" value="">
                                                <input type="hidden" name="caproject_code" id="caproject_code" value="">
                                                <input type="hidden" name="catid" id="catid" value="">
                                                <input type="hidden" name="capid" id="capid" value="">
                                                <input type="Date" name="cadate" class="form-control p-3  mt-2" value="<?=date('Y-m-d')?>">
                                                <input type="file" class="form-control file-input" name="caimage[]" id="caimage" multiple required>
                                                <section class="progress-area"></section>
                                                <div class="card-footer">
                                                      <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                                    </div>
                                                </form>    
                                            </div>
                                            
                                            <div id="report" style="display:none">
                                                <form action="<?=base_url();?>Menu/reportupload" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="ruid" value="<?=$uid?>">
                                                    <input type="hidden" name="rtid" id="rtid" value="">
                                                    <input type="hidden" name="rsid" id="rsid" value="">
                                                    <input type="hidden" name="rpid" id="rpid" value="">
                                                    <input type="hidden" name="rpcode" id="rpcode" value="">
                                                    <?php $current_year = date('Y') . '-' . substr(date('Y') + 1, -2); ?>
                                                    <input type="hidden" class="form-control  p-3  mt-2" name="year" value="<?=$current_year?>" readonly>
                                                    <lable>Attach Report</lable>
                                                    <input type="file" class="form-control-file" name="filname" accept="application/pdf" required>
                                                 <textarea name="rremark" class="form-control  p-3  mt-2" placeholder="Remark" required></textarea>
                                                 <input type="submit" class="btn-info mt-2">
                                                </form>    
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
</div></div></div>



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
    alert(tid);
    $.ajax({
    url:'<?=base_url();?>Menu/getteacher',
    type: "POST",
    data: {
    tid: tid
    },
    cache: false,
    success: function a(result){
    $("#teacher").html(result);
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
             var pcode = response[0].pcode;
             var action = response[0].action;
             var tid = response[0].tid;
             var pid = response[0].pid;
             var checklist = response[0].checklist;
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
             document.getElementById("rsid").value = sid;
             document.getElementById("cosid").value = sid;
             document.getElementById("casid").value = sid;
             document.getElementById("project_code").value = pcode;
             document.getElementById("rpcode").value = pcode;
             document.getElementById("caproject_code").value = pcode;
             document.getElementById("coproject_code").value = pcode;
             document.getElementById("action").innerHTML = action;
             document.getElementById("tid").value = tid;
             document.getElementById("rtid").value = tid;
             document.getElementById("rrtid").value = tid;
             document.getElementById("cotid").value = tid;
             document.getElementById("catid").value = tid;
             document.getElementById("pid").value = pid;
             document.getElementById("rpid").value = pid;
             document.getElementById("copid").value = pid;
             document.getElementById("capid").value = pid;
           }else{
             document.getElementById("sname").innerHTML = "";
           }
           if(action=='Communication'){$("#comm").show();}
           if(action=='Utilisation'){$("#uti").show();}
           if(action=='CaseStudy'){$("#case").show();}
           if(action=='Report'){$("#report").show();}
           if(action=='Research'){$("#research").show();}
         }
    });
});
  
  

$('#sel').on('change', function a() { 
 var sel = this.value;
 if(sel=='Other'){
     document.getElementById("remark").value = "";
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

</script>