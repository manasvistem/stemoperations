<div class="container my-5">
    
<form name="uploadUtilisation" action="<?php echo base_url();?>Menu/updateUploadutilisationData" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="taskId" id="taskId" value="<?php echo $taskId;?>" >
<input type="hidden" name="tasktypeid" id="tasktypeid" value="<?php echo $tasktypeid;?>" >
            <div class="row g-4">
                <!-- Date Picker -->
                <div class="col-md-6">
                    <label for="selectDate" class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="selectDate" name="selectDate" required>
                </div>

                <!-- Image Upload -->
                <div class="col-md-6">
                    <label for="utilisationUpload" class="form-label">Upload Utilisation</label>
                    <input type="file" class="form-control" id="utilisationUpload" name="utilisationImage" accept="image/*" required>
                </div>
                <!-- Model Multi-Select -->
                <div class="row g-4">
    <?php for ($class = 5; $class <= 10; $class++) { ?>
        <div class="col-md-6">
            <label for="modelSelect_<?php echo $class; ?>" class="form-label">Class <?php echo $class; ?> - Select Models</label>
            <select class="form-select model-select" id="modelSelect_<?php echo $class; ?>" name="models[<?php echo $class; ?>][]" multiple="multiple">
            <?php foreach ($getFactoryModelList as $val) { ?>
                        <option value="<?php echo $val['model_name']; ?>"><?php echo $val['model_name']; ?></option>
                    
                <?php } ?>
            </select>
        </div>
    <?php } ?>
</div>
                <!-- Teacher Dropdown -->
            <div class="col-md-6"><?php $getTeachers =getTeachersByTask($taskId); ?>
                    <label for="teacherSelect" class="form-label">Select Teacher</label>
                    <select class="form-select" id="teacherSelect" name="teacher">
                        <option value="">-- Select --</option>
                        <?php 
                        if(isset($getTeachers)){
                        foreach($getTeachers as $key=>$val){
                            ?>
                            <option value="<?php echo $key;?>"><?php echo $val['contact_name']?></option>
                            <?php
                        }
                    }?>
                        <!-- Add more teachers as needed -->
                    </select>
                </div>
                <!-- Remark Dropdown -->
                <div class="col-md-6">
                    <label for="remarkSelect" class="form-label">Remark</label>
                    <select class="form-select" id="remarkSelect" name="remark" required>
                        <option value="">-- Select Remark --</option>
                        <option value="Peer">Peer to Peer Teaching & Learning</option>
                        <option value="MSCClassroom">MSC exhibits brought to Classroom</option>
                        <option value="StudentMSC">Students taken to MSC</option>
                        <option value="IndependentLearning">Student Learning concepts Independently with MSC exhibits</option>
                        <option value="ProjectMSC">Project Created with the help of MSC exhibits</option>
                        <option value="KnowledgeTransfer">Teacher to teacher Knowledge Transfer</option>
                        <option value="OutsideMSC">Exhibits outside Classroom and MSC</option>
                        <option value="InClassroom">Exhibits in Classroom</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <!-- Conditional Other Remark Textarea -->
                <div class="col-md-6" id="otherRemarkBox" style="display:none;">
                    <label for="otherRemark" class="form-label">Other Remark</label>
                    <textarea class="form-control" id="otherRemark" name="otherRemark" rows="3"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>

            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            // Show/hide textarea based on "Other" remark
            $('#remarkSelect').on('change', function () {
                if ($(this).val() === 'Other') {
                    $('#otherRemarkBox').slideDown();
                    $('#otherRemark').attr('required', true);
                } else {
                    $('#otherRemarkBox').slideUp();
                    $('#otherRemark').removeAttr('required');
                }
            });
        });

        $(document).ready(function () {
            // Populate Teacher Dropdown from API
            $.ajax({
                url: '<?php echo base_url();?>Menu/getFTTPTeacherData/<?php echo $taskId;?>', // adjust as per your route
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                let dropdown = $('#teacherSelect');
                dropdown.empty().append('<option value="">-- Select --</option>');
                    $.each(data, function (index, teacher) {
                        dropdown.append(`<option value="${teacher}">${teacher}</option>`);
                    });
                }
            });
    // Existing Select2 + Other Remark logic
});

    </script>