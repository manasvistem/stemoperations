<div class="container my-5">
        <form id="mscForm" enctype="multipart/form-data">
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
                <div class="col-md-6">
                    <label for="modelSelect" class="form-label">Select Model</label>
                    <select class="form-select" id="modelSelect" name="models[]" multiple="multiple" required>
                        <option value="Model1">Model 1</option>
                        <option value="Model2">Model 2</option>
                        <option value="Model3">Model 3</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <!-- Teacher Dropdown -->
                <div class="col-md-6">
                    <label for="teacherSelect" class="form-label">Select Teacher</label>
                    <select class="form-select" id="teacherSelect" name="teacher" required>
                        <option value="">-- Select --</option>
                        <option value="Teacher1">Teacher 1</option>
                        <option value="Teacher2">Teacher 2</option>
                        <option value="Teacher3">Teacher 3</option>
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
            // Initialize select2
            $('#modelSelect').select2({
                placeholder: "Select models",
                allowClear: true
            });

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
    </script>