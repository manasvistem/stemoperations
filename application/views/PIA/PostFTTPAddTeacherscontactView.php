<div class="container mt-5">
    <form id="teacherForm" class="card p-4 shadow-sm" action="updateTeacherInfo">
        <h4 class="text-center mb-4">Teacher Details Form</h4>
        <div class="mb-3">
            <label class="form-label">No. of teachers in the school:</label>
            <div class="input-group">
                <input type="number" id="teacherCount" min="1" name="teacher_count" class="form-control" placeholder="Enter number">
                <button type="button" id="generateFields" class="btn btn-primary">Generate Fields</button>
            </div>
        </div>
        
        <div id="teacherDetails"></div>
        
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>


<script>
$(document).ready(function() {
    $('#generateFields').click(function() {
        let count = $('#teacherCount').val();
        let teacherDetails = $('#teacherDetails');
        teacherDetails.empty();
        
        for (let i = 1; i <= count; i++) {
            teacherDetails.append(`
                <div class="teacher-entry">
                    <h3>Teacher ${i}</h3>
                    <label>Person Name:</label>
                    <input type="text" name="teacher_name_${i}">
                    <label>Designation:</label>
                    <select name="teacher_designation_${i}">
                        <option value="Teacher">Teacher</option>
                        <option value="Principal">Principal</option>
                    </select>
                    <label>Mobile No:</label>
                    <input type="text" name="teacher_mobile_${i}">
                    <label>Email ID:</label>
                    <input type="email" name="teacher_email_${i}">
                </div>
            `);
        }
    });
    
    $('#teacherForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'your_backend_endpoint.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Teachers contact details submitted successfully!');
                $('#teacherForm')[0].reset();
            },
            error: function() {
                alert('Error submitting details');
            }
        });
    });
});
</script>
