<style>
  .card {
  padding:10px;
  }
  hr {
            border: 1px solid #ddd;
            margin: 15px 0;
        }
        .info {
            font-size: 16px;
            line-height: 1.6;
        }
        .info b {
            color: #333;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header text-center">
        <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <?= $this->session->flashdata('success_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?= $this->session->flashdata('error_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      </h5>
      <div class="text-center p-2" style="background: aliceblue;">
        <h3>Call For Factory and Installation Time Line</h3>
      </div>
      <hr>
      <?php 
    
        $revst = $this->Menu_model->get_joincallstartedWitTaskIds($task_id);

        if($revst){
           $pid = $revst[0]->id;
        }else{
           $pid = 0;
        }
        
        ?>
      <div class="row">
        <div class="col-sm col-md-6 col-lg-6">
          <div class="card shadow-none bg-transparent border border-primary">
            <div class="card-body box-profile">
            <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/man-holding-clock-time-management-concept_23-2148823171.avif" width="250" alt="map-of-india-administrative-regions-image-not-found">
                      </div>
             <hr>
              <h4 class="text-center">TimeLine Setting</h4>
              <hr>
              <p class="info"><b>Project Code :</b> <span class="highlight"><?=$pcode = $revst[0]->projectcode;?></span></p>
        <hr>
        <?php 
            $pdetail    = $this->Menu_model->get_myprogramdetail($pcode); 
            $clientbypc = $this->Menu_model->get_clientbypc($pcode);
           // dd($clientbypc);
        ?>
        <p class="info"><b>Handover Date :</b> <?=$clientbypc[0]->sdatet?></p>
        <p class="info"><b>Client Name :</b> <?=$clientbypc[0]->client_name?></p>
        <p class="info"><b>Mediator :</b> <?=$clientbypc[0]->mediator?></p>
        <p class="info"><b>Location :</b> <?=$clientbypc[0]->location?>, <?=$clientbypc[0]->city?>, <?=$clientbypc[0]->state?></p>
        <p class="info"><b>Expected Installation :</b> <?=$clientbypc[0]->expected_installation_date?></p>
        <p class="info"><b>Project Tenure :</b> <?=$clientbypc[0]->project_tenure?></p>
        <p class="info"><b>Project Type :</b> <?=$clientbypc[0]->project_type?></p>
        <p class="info"><b>Comments :</b> <?=$clientbypc[0]->comments?></p>
        <hr>
        <p class="info"><b>No of Schools :</b> <?=$pdetail[0]->nofs?></p>
        <p class="info"><b>District (<?=$pdetail[0]->cdistrict?>) :</b> <?=$pdetail[0]->district;?></p>
        <p class="info"><b>State (<?=$pdetail[0]->cstate?>) :</b> <?=$pdetail[0]->state;?></p>
        <p class="info"><b>PIA (<?=$pdetail[0]->cpia?>) :</b> <?=$pdetail[0]->pia;?></p>
        <p class="info"><b>Installation Person (<?=$pdetail[0]->cinsp?>) :</b> <?=$pdetail[0]->insp;?></p>
            </div>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-6 m-auto">
          <div class="card shadow-none bg-transparent border border-success">
            <form action="<?=base_url();?>Menu/set_phtimeline" method="post" class="p-3">
            <div class="was-validated">
              <input type="hidden" class="form-control" name="pcode" value="<?=$pcode?>">
              <div class="mb-4">
                <label class="form-label"><b>Artwork Upload Date (Factory)</b></label>
                <input type="date" class="form-control" name="dud" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Artwork Approval Date (Sales)</b></label>
                <input type="date" class="form-control" name="dad" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Printing Date (Factory)</b></label>
                <input type="date" class="form-control" name="pd" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Particle Board Purchase Date (Factory)</b></label>
                <input type="date" class="form-control" name="pbpd" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Packing Date (Factory)</b></label>
                <input type="date" class="form-control" name="pad" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Dispatch Date (Factory)</b></label>
                <input type="date" class="form-control" name="disd" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Delivery Date (Factory)</b></label>
                <input type="date" class="form-control" name="delivery_date" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Transit Process (Factory)</b></label>
                <input type="date" class="form-control" name="transit_process" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Pre Installation Call Both (Operation)</b></label>
                <input type="date" class="form-control" name="pre_install_call" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Installation Date (Operation)</b></label>
                <input type="date" class="form-control" name="insd" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Installation Report Date (Operation)</b></label>
                <input type="date" class="form-control" name="insrd" required>
              </div>
              <div class="mb-4">
                <label class="form-label"><b>Remark</b></label>
                <textarea class="form-control" name="remark" placeholder="Remark..." required></textarea>
              </div>
              <div class="mb-4">
                <label class="form-label"><b><I>A Unique Barcode for Project and School will get created from this page</I></b></label>
                <!-- <input type="button" class="btn btn-warning btn-sm" name="create_barcode" id="create_barcode" value="Create Barcode"/> -->
                <span id="errorMsg"></span>
              </div>
              <br>
              <input type="hidden" id="project_code" name="project_code" value="<?php echo $projectData['projectcode'];?>">
              <input type="hidden" id="school_count" name="school_count" value="<?php echo $projectData['noofschool'];?>">
              <input type="hidden" class="form-control" name="rrd">
              <input type="hidden" class="form-control" name="task_id" value="<?=$revst[0]->task_id;?>">
              <input type="hidden" class="form-control" name="join_call_id" value="<?=$revst[0]->id;?>">
              <input type="submit" class="form-control btn btn-success" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $('#create_barcode').click(function() {
    let project_code = $('#project_code').val();
    let school_count = $('#school_count').val();
    if (project_code && school_count) {
        $.ajax({
            url: 'Menu/createBarcode',
            method: 'POST',
            data: {
                project_code : project_code,
                school_count: school_count
            },
              dataType: 'text',
              success: function(response) {
              $("#errorMsg").html(response);
              alert('Barcode created: ' + response);
            },
            error: function() {
                alert('Error creating barcodes.');
            }
        });
      }
      else 
      {
              alert('Project Code or School Count missing!');
      }
});
</script>
