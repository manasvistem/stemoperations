<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <style>
        h3.card-header.text-center {
    background: aliceblue;
}
    </style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h3 class="card-header text-center">Program Timeline Data</h3>
    <hr>
    <div class="table-responsive text-nowrap">
      <?php
        $gettimelinecount =  sizeof($gettimeline);
        if($gettimelinecount > 0){
        ?>
      <table id="example1" class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Project Code</th>
            <th scope="col">WelCome Message</th>
            <th scope="col">1st 5 Communication</th>
            <th scope="col">2nd 5 Communication</th>
            <th scope="col">3rd 5 Communication</th>
            <th scope="col">1st 5 Calls for Utilisation</th>
            <th scope="col">2nd 5 Calls for Utilisation</th>
            <th scope="col">Report Type</th>
            <th scope="col">FTTP</th>
            <th scope="col">RTTP</th>
            <th scope="col">Replacement</th>
            <th scope="col">Maintenance</th>
            <th scope="col">Base Line M&E</th>
            <th scope="col">End Line M&E</th>
            <th scope="col">NSP</th>
            <th scope="col">1st 5 Utilisation</th>
            <th scope="col">2nd 5 Utilisation</th>
            <th scope="col">3rd 5 Utilisation</th>
            <th scope="col">Other Department Call</th>
            <th scope="col">1st 4 OutBond Communication</th>
            <th scope="col">2nd 4 OutBond Communication</th>
            <th scope="col">3rd 4 OutBond Communication</th>
            <th scope="col">Review with BD</th>
            <th scope="col">CaseStudy</th>
            <th scope="col">DIY</th>
            <th scope="col">Client Engagement</th>
            <th scope="col">Expected Status</th>
            <th scope="col">Expected Status Date</th>
            <th scope="col">ZM Visit 10% each</th>
            <th scope="col">PM Visit 10% each</th>
            <th scope="col">Summer Activity</th>
            <th scope="col">winter activity</th>
            <th scope="col">Online Activity</th>
            <th scope="col">Webinar</th>
            <th scope="col">socialMediaPost1</th>
            <th scope="col">socialMediaPost2</th>
            <th scope="col">socialMediaPost3</th>
            <th scope="col">socialMediaPost4</th>
            <th scope="col">Create Date</th>
            <th scope="col">View Details</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i = 1; 
            foreach($gettimeline as $pdata) {
            ?>
          <tr>
            <td><?= $i ?></td>
            <td>
            <a href="<?=base_url().'Menu/CheckProgramTimeline/'.$pdata->id ?>">
                <?= $pdata->projectcode ?>
            </a>
            </td>
            <td><?= $pdata->wmessage ?></td>
            <td><?= $pdata->communication1 ?></td>
            <td><?= $pdata->communication2 ?></td>
            <td><?= $pdata->communication3 ?></td>
            <td><?= $pdata->callsfu1 ?></td>
            <td><?= $pdata->callsfu2 ?></td>
            <td><?php
              if($pdata->reporttype ==8){
                  echo "Monthly";
              }
              if($pdata->reporttype ==4){
                  echo "Quarterly";
              }
              if($pdata->reporttype ==1){
                  echo "Yearly";
              }
              
              ?></td>
            <td><?= $pdata->fttp ?></td>
            <td><?= $pdata->rttp ?></td>
            <td><?= $pdata->replacement ?></td>
            <td><?= $pdata->maintenance ?></td>
            <td><?= $pdata->blmne ?></td>
            <td><?= $pdata->elmne ?></td>
            <td><?= $pdata->nsp ?></td>
            <td><?= $pdata->utilisation1 ?></td>
            <td><?= $pdata->utilisation2 ?></td>
            <td><?= $pdata->utilisation3 ?></td>
            <td><?= $pdata->otherdcall ?></td>
            <td><?= $pdata->outbondc1 ?></td>
            <td><?= $pdata->outbondc2 ?></td>
            <td><?= $pdata->outbondc3 ?></td>
            <td><?= $pdata->bdreview ?></td>
            <td><?= $pdata->casestudy ?></td>
            <td><?= $pdata->diy ?></td>
            <td><?= $pdata->cengagement ?></td>
            <td><?= $pdata->status ?></td>
            <td><?= $pdata->exstatusdt ?></td>
            <td><?= $pdata->zmvisit ?></td>
            <td><?= $pdata->pmvisit ?></td>
            <td><?= $pdata->summeractivity ?></td>
            <td><?= $pdata->winteractivity ?></td>
            <td><?= $pdata->onlineactivity ?></td>
            <td><?= $pdata->webinar ?></td>
            <td><?= $pdata->socialMediaPost1 ?></td>
            <td><?= $pdata->socialMediaPost2 ?></td>
            <td><?= $pdata->socialMediaPost3 ?></td>
            <td><?= $pdata->socialMediaPost4 ?></td>
            <td><?= $pdata->created_at ?></td>
            <td>
                <a href="<?=base_url().'Menu/ViewProgramTimelineData/'.$pdata->id ?>">
                    <span class="p-1 bg-primary text-white">view</span>
                </a>
            </td>
          </tr>
          <?php 
            $i++; 
            } 
            ?>
        </tbody>
      </table>
      <?php } ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>