
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
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
       <div class="row p-3">
           <?php $revst = $this->Menu_model->get_joincallstarted();
           if($revst){$pid = $revst[0]->id;}else{$pid=0;}
           if($pid==0){?>
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Create Join Call For Factory and Installation Time Line</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/planjoincall" method="post">
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uid" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <lable><b>Join Call Start Date</b></lable>
                        <input type="datetime-local" name="plandate" value="<?=date('Y-m-d H:i:s')?>" class="form-control" required="">
                        <div class="invalid-feedback">Please provide Plan Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <lable><b>Select Project Code</b></lable>
                            <select class="form-control" name="pcode" required="">
                                <?php $pcode = $this->Menu_model->get_handovernoins();
                                 foreach($pcode as $pcode){
                                    $pcode = $pcode->projectcode;
                                    $jcpc = $this->Menu_model->get_joincallpcode($pcode);
                                    if(!$jcpc){?>
                                 <option><?=$pcode?></option>
                                 <?php }} ?>
                            </select>
                        </div>
                        <div class="mt-4">
                            <input type="text" name="meetlink" placeholder="Meeting Link" class="form-control" required="">
                            <div class="invalid-feedback">Please provide Meeting LInk.</div>
                        <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Create Plan</button>
                    </div>
                    </div>
                  </form>
            </div>
          </div>
      </div> 
      
      <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Start Join Call</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/startjoincall" method="post">
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uida" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="datetime-local" name="startt" value="<?=date('Y-m-d H:i:s')?>" class="form-control" readonly>
                        <div class="invalid-feedback">Please provide Start Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" name="reviewid" required="">
                                <?php $reviewid = $this->Menu_model->get_joincall();
                                foreach($reviewid as $rev){?>
                                <option value="<?=$rev->id?>"><?=$rev->projectcode?> (<?=$rev->plant?>)</option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Create Plan First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Srart Review</button>
                    </div>
                  </form>
            </div>
          </div>
      </div>
     </div>  
     <?php }else{ ?>
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h4 class="text-center">TimeLine Setting</h4><hr>
                    <b>Project Code : <?=$pcode=$revst[0]->projectcode;?></b><hr>
                    <?php $pdetail=$this->Menu_model->get_myprogramdetail($pcode); 
                    $clientbypc=$this->Menu_model->get_clientbypc($pcode);?>
                    Handover Date : <?=$clientbypc[0]->sdatet?><br>
                    Client Name : <?=$clientbypc[0]->client_name?><br>
                    Mediator : <?=$clientbypc[0]->mediator?><br>
                    Location : <?=$clientbypc[0]->location?>, <?=$clientbypc[0]->city?>, <?=$clientbypc[0]->state?><br>
                    Expected Installation : <?=$clientbypc[0]->expected_installation_date?><br>
                    Project Tenure : <?=$clientbypc[0]->project_tenure?><br>
                    Project Type : <?=$clientbypc[0]->project_type?><br>
                    Comments : <?=$clientbypc[0]->comments?><hr>
                    No of School : <?=$pdetail[0]->nofs?><br>
                    District (<?=$pdetail[0]->cdistrict?>) : <?=$pdetail[0]->district;?><br>
                    State (<?=$pdetail[0]->cstate?>) : <?=$pdetail[0]->state;?><br>
                    PIA (<?=$pdetail[0]->cpia?>) : <?=$pdetail[0]->pia;?><br>
                    Installation Person (<?=$pdetail[0]->cinsp?>) : <?=$pdetail[0]->insp;?><br>
              </div>
         </div>
     </div>
     
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
             <form action="<?=base_url();?>Menu/phtimeline" method="post" class="p-3">
                 <input type="hidden" class="form-control" name="pcode" value="<?=$pcode?>">
                 <lable><b>Artwork Upload Date (Factory)</b></lable>
                 <input type="date" class="form-control" name="dud">
                 <lable><b>Artwork approval Date (Sales)</b></lable>
                 <input type="date" class="form-control" name="dad">
                 <lable><b>Printing Date(Factory)</b></lable>
                 <input type="date" class="form-control" name="pd">
                 <lable><b>Partical Board Purchase Date (Factory)</b></lable>
                 <input type="date" class="form-control" name="pbpd">
                 <lable><b>Packing Date (Factory)</b></lable>
                 <input type="date" class="form-control" name="pad">
                 <lable><b>Dispatch Date (Factory)</b></lable>
                 <input type="date" class="form-control" name="disd">
                 <lable><b>Delivery Date (Factory)</b></lable>
                 <input type="date" class="form-control" >
                 <lable><b>Transit Process (Factory)</b></lable>
                 <input type="date" class="form-control" >
                 <lable><b>Pre Installation Call Both (Operation)</b></lable>
                 <input type="date" class="form-control" name="insd">
                 <lable><b>Installation Date (Operation)</b></lable>
                 <input type="date" class="form-control" name="insd">
                 <lable><b>Installation Report Date (Operation)</b></lable>
                 <input type="date" class="form-control" name="insrd">
                 <textarea type="date" class="form-control" name="remark" placeholder="Remark..."></textarea>
                 <input type="hidden" class="form-control" name="rrd">
                 <input type="submit" class="form-control">
            </form>
          </div>
      </div>
     
     
         </div>
     </div>
     
     </div></div>
     <?php } ?>
</section>
