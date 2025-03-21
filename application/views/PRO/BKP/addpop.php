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
                                
                                
                                </div>
                                <div class="card row m-2">
                                  <div class="col-12 col-md-12">
                                    <div class="card-header bg-info">Project Code : <lable id="ppcode"></lable></div>
                                    <div class="card-header bg-info">Current Action : <lable id="action"></lable></div>
                                    
                                            
                                            <div id="report" style="display:none">
                                                <form action="<?=base_url();?>Menu/reportupload" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="ruid" value="<?=$uid?>">
                                                    <input type="hidden" name="rtid" id="rtid" value="">
                                                    <input type="hidden" name="rsid" id="rsid" value="0">
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
        $.ajax({
         url:'<?=base_url();?>Menu/cctdp',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#sname').text('');
           if(len > 0){
             
             var pcode = response[0].pcode;
             var action = response[0].action;
             var tid = response[0].tid;
             var pid = response[0].pid;
             
             document.getElementById("ppcode").innerHTML = pcode;
             document.getElementById("action").innerHTML = action;
             document.getElementById("rtid").value = tid;
             document.getElementById("rpid").value = pid;
             document.getElementById("rpcode").value = pcode;
             
             
           }else{
             document.getElementById("sname").innerHTML = "";
           }
           
           if(action=='Utilisation'){$("#uti").show();}
           if(action=='CaseStudy'){$("#case").show();}
           if(action=='Report'){$("#report").show();}
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