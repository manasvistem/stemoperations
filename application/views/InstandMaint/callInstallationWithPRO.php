<div class="container mt-4">
    <h4 class="text-center">Call - Installation With PRO</h4>
    <form name="callInstallation" id="callInstallation" method="post" action="<?php echo base_url();?>/Menu/updateCallPreIntervention" >
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
        <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
        <!-- Action Completed Section -->
        <!-- Purpose Completed Section -->
        <div class="mb-3">
            <label><strong>Upload Delivery Challan</strong></label><br>
            <input type="file" name="deliverychallan" value="" id="deliverychallan">
        </div>
        <div class="mb-3">
            <label><strong>Upload Installation Letter</strong></label><br>
            <input type="file" name="installationletter" value="" id="installationletter">
        </div>
        <div class="">
            <input type="submit" value="submit" class="btn btn-primary"/>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

    });
</script>