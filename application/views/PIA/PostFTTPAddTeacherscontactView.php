<style>
        .teacher-entry {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .remove-teacher {
            cursor: pointer;
            color: #dc3545;
        }
    </style> 
    <style>
        .container { max-width: 800px; margin-top: 20px; }
    </style>
    <div class="container mt-5">
        <form id="teacherForm" class="card p-4 shadow-sm" method="POST" name="teacherForm" action="<?php echo base_url()?>Menu/updateTeacherInformationFTTP">
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>

            <h4 class="text-center mb-4">Teacher Details Form</h4>
            <div class="mb-3">
                <label class="form-label">No. of teachers in the school:</label>
                <div class="input-group">
                    <input type="number" id="teacherCount" min="1" name="teacher_count" class="form-control" placeholder="Enter number" readonly>
                    <div class="input-group-append">
                        <button type="button" id="addTeacher" class="btn btn-primary">Add Teacher</button>
                    </div>
                </div>
            </div>
            <div id="teacherDetails"></div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let teacherIndex = 0;
            // Function to update teacher count
            function updateTeacherCount() {
                $('#teacherCount').val($('.teacher-entry').length);
            }

            // Add Teacher
            $('#addTeacher').click(function() {
                teacherIndex++;
                $('#teacherDetails').append(`
                    <div class="teacher-entry" data-index="${teacherIndex}">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Teacher ${teacherIndex}</h5>
                            <span class="remove-teacher">Remove</span>
                        </div>
                        <div class="form-group">
                            <label>Person Name:</label>
                            <input type="text" name="teacher_name_${teacherIndex}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Designation:</label>
                            <select name="teacher_designation_${teacherIndex}" class="form-control" required>
                                <option value="Teacher">Teacher</option>
                                <option value="Principal">Principal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mobile No:</label>
                            <input type="text" name="teacher_mobile_${teacherIndex}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email ID:</label>
                            <input type="email" name="teacher_email_${teacherIndex}" class="form-control" required>
                        </div>
                    </div>
                `);
                updateTeacherCount();
            });
            // Remove Teacher
            $('#teacherDetails').on('click', '.remove-teacher', function() {
                $(this).closest('.teacher-entry').remove();
                updateTeacherCount();
            });
            // Form Submission
            /*$('#teacherForm').submit(function(e) {
                e.preventDefault();
                // Serialize form data
                var formData    = $(this).serializeArray();
                var formaction  = $(this).attr('action');
                // Convert to JSON
                var jsonData = {};
                $.each(formData, function() {
                    jsonData[this.name] = this.value;
                });
                // Send JSON data to the server
                $.ajax({
                    url: formaction,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(jsonData),
                    success: function(response) {
                        alert('Teachers contact details submitted successfully!');
                        $('#teacherForm')[0].reset();
                        $('#teacherDetails').empty();
                        teacherIndex = 0;
                        updateTeacherCount();
                    },
                    error: function() {
                        alert('Error submitting details');
                    }
                });
            });*/
        });
    </script>