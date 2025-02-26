<?php $this->load->view('nav'); ?>


<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<?php  
              $request_type = $reqData[0]->request_type;
              $color_code = $reqData[0]->color_code;
              ?>
<div class="card">
    <div style='background-color:<?=$color_code;?>'>


    <h5 class="card-header text-center"><?=$request_type?></h5>
                <?php 
                if($code == 1){
                  echo "<h6 class='text-center'>All</h5>";
                }else if($code == 2){
                  echo "<h6 class='text-center'>Pending</h5>";
                }else if($code == 3){
                  echo "<h6 class='text-center'>Open</h5>";
                }else if($code == 4){
                  echo "<h6 class='text-center'>Close</h5>";
                }
                ?>
                    </div>
    <hr>
             
              


                                <div class="table-responsive">
                                  <?php if($rtype=="Demo"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php 
                                            if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php 
                                            echo $d->assignstatus;
                                            if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="Inauguration"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="DIY"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="NCSV"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="NCR"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="OnBoardVisit"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="OnBoardClientVisit"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="Report"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>Attachment</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td>
                                          <?php if($attech[0]->att==''){echo 'Not Available';}
                                            else{
                                               $atte = $attech[0]->att;
                                               $atte = preg_split ("/\,/", $atte);
                                               $l=sizeof($atte);
                                               for($k=1;$k<$l;$k++){?>
                                          <a href="https://stemoppapp.in/<?=$atte[$k]?>" target="_blank">
                                            <p>Download</p>
                                          </a>
                                          <?php }}?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="SSCHOOLID"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>noofschool</th>
                                        <th>Location</th>
                                        <th>Attachment</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->noofschool?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td>
                                          <?php if($attech[0]->att==''){echo 'Not Available';}
                                            else{
                                               $atte = $attech[0]->att;
                                               $atte = preg_split ("/\,/", $atte);
                                               $l=sizeof($atte);
                                               for($k=1;$k<$l;$k++){
                                               if($atte[$k]!=''){
                                               ?>
                                          <a href="https://stemoppapp.in/<?=$atte[$k]?>" target="_blank">
                                            <p>Download</p>
                                          </a>
                                          <?php }}}?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <!-- <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button> -->
                                          <a class="btn btn-primary p-2" href="<?=base_url()?>Menu/TheAssigningProcess/<?=$rtype?>/<?=$tid?>">Assign</a>  <hr>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <!-- <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button> -->
                                          <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            id="add_comment<?=$i?>"
                                            value="<?=$tid?>"
                                            data-bs-target="#modalCenter">
                                            Comment
                                            </button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="EmployeeEngagement"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>noofschool</th>
                                        <th>Location</th>
                                        <th>Attachment</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->noofschool?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td>
                                          <?php if($attech[0]->att==''){echo 'Not Available';}
                                            else{
                                               $atte = $attech[0]->att;
                                               $atte = preg_split ("/\,/", $atte);
                                               $l=sizeof($atte);
                                               for($k=1;$k<$l;$k++){?>
                                          <a href="https://stemoppapp.in/<?=$atte[$k]?>" target="_blank">
                                            <p>Download</p>
                                          </a>
                                          <?php }}?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="RTTP"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>noofschool</th>
                                        <th>Location</th>
                                        <th>Attachment</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->noofschool?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td>
                                          <?php if($attech[0]->att==''){echo 'Not Available';}
                                            else{
                                               $atte = $attech[0]->att;
                                               $atte = preg_split ("/\,/", $atte);
                                               $l=sizeof($atte);
                                               for($k=1;$k<$l;$k++){?>
                                          <a href="https://stemoppapp.in/<?=$atte[$k]?>" target="_blank">
                                            <p>Download</p>
                                          </a>
                                          <?php }}?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="SMaintenance"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Total Logs</th>
                                        <th>Logs Detail</th>
                                        <th>Assign/Status/Logs</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $tid = $d->id;
                                        $logs=$this->Menu_model->get_bdrequestlog($tid);
                                        $attech=$this->Menu_model->get_bdrequestattech($tid);
                                        $j = sizeof($logs);
                                        $j = $j-1;
                                        ?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <th>Total <?=sizeof($logs)?> Logs</th>
                                        <td>
                                          <?php $olddate=''; foreach($logs as $log){
                                            if($olddate==''){$olddate=$log->sdatet;}
                                            $newddate = $log->sdatet;
                                            $timed = $this->Menu_model->timediff($newddate, $olddate);
                                            ?>
                                          <b><?=is_numeric($log->tby)?$log->fullname:$log->tby?></b><br><?=$log->sdatet?><br>
                                          <b><?=$timed?></b><br><b>Detail:</b> <?=$log->detail?>
                                          <hr>
                                          <?php $olddate=$newddate;} ?>
                                        </td>
                                        <td>
                                          <?php if($d->assignstatus=='0'){?>
                                          <button type="button" id="assign_to<?=$i?>" value="<?=$tid?>">Click</button>
                                          <?php }else{
                                            if($d->status=='1'){ echo 'Request Closed'; }
                                            else{
                                                $rid = $d->id;
                                                $logs = $this->Menu_model->get_bdrtotallogs($rid);
                                            ?>
                                          <a href="<?=base_url();?>Menu/bdrequestlogs/<?=$rid?>"> Total <?=sizeof($logs)?> Logs </a>
                                          <?php }}?>
                                          <button type="button" id="add_comment<?=$i?>" value="<?=$tid?>">Comment</button>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                </div>
                                </div>
                                </div>
                    

  <!-- Modal -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">ADD COMMENTS</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                              <?=form_open('Menu/bdrcomment')?>
                                <input type="hidden" id="rid" name="rid">
                                
                                <div class="row">
                                  <div class="col mb-12 text-center">
                                    <label for="nameWithTitle" class="form-label">Comments</label>
                                    <textarea rows="10" name="rcomment" class="form-control" required></textarea>
                                    <hr>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                  </div>
                                </div>
                               
                                </form>
                              </div>
                            
                            </div>
                          </div>
                        </div>



                        <script>
                             $('[id^="add_comment"]').on('click', function() {
          var rid = this.value;
          $('#modalCenter').modal('show');
          document.getElementById("rid").value = rid;
      });
                        </script>
<?php $this->load->view('footer'); ?>