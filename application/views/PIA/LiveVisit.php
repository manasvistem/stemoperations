<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile row">
                                        <?php 
                                        date_default_timezone_set("Asia/Kolkata");
                                        $date = date('Y-m-d', strtotime('+0 day')); 
                                        $nxtdtask=$this->Menu_model->get_livevisit('1',$date);
                                        foreach($nxtdtask as $md){
                                            $plant = $md->plandate;
                                            $plan = date('d-m-Y  h:i A', strtotime($plant));
                                            $sid = $md->spd_id; echo '<br>';
                                            $tid = $md->tid;
                                            $page = $md->checklist;
                                            if($md->user_id==$uid){
                                            ?>
                                            <div class="col-12 card p-4"><?=$md->fullname?> | <?=$plant?> | <?=$md->project_code?> | <?=$md->sname?> | <?=$md->task_type?> | <?=$md->taskname?></div>
                                            <?php
                                            $pagetask = $this->Menu_model->get_visitsubtask($page);
                                            foreach($pagetask as $pt){ 
                                            $que = $pt->que;
                                            $vu = $this->Menu_model->get_visitstupdate($sid,$tid,$que);
                                            if($vu){$color="bg-success";
                                                $sdatet = $vu[0]->sdatet;
                                                if($vu[0]->ans1!=''){$url1 = "https://stemoppapp.in/".$vu[0]->ans1;}else{$url1="";}
                                                if($vu[0]->ans2!=''){$url2 = "https://stemoppapp.in/".$vu[0]->ans2;}else{$url2="";}
                                                if($vu[0]->ans3!=''){$url3 = $vu[0]->ans3;}else{$url3="";}
                                            }
                                                else{$color="bg-danger";
                                                $sdatet = "";
                                                $url1="";$url2="";$url3="";}?>
                                           <div class="col-lg-2 col-md-3 col-sm-12 <?=$color?> card p-3 border border-white"><center><b><?=$pt->que?><hr><?=$sdatet?></b></center><hr>
                                           <?php if($vu){if($vu[0]->ans1!=''){?><a href="#" class="pop1"><img src="<?=$url1?>" class="img-thumbnail"></a><?php }}?>
                                           <?php if($vu){if($vu[0]->ans2!=''){?><a href="#" class="pop2"><video class="embed-responsive-item img-thumbnail" src="<?=$url2?>" height="300" muted controls></video></a><?php }}?>
                                           <?=$url3?>
                                           </div>
                                    <?php }}} ?>
                            </div>
                        </div>
              </div>
     </div></div>
    </section>
    
<div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview1" style="width: 100%;" >
      </div>
      </div>
  </div>
</div>
<script type='text/javascript'>

$(function() {
		$('.pop1').on('click', function() {
			$('.imagepreview1').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal1').modal('show');   
		});	
		$('.pop2').on('click', function() {
			$('.imagepreview2').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal2').modal('show');   
		});	
});

</script>