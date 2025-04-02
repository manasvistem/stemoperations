<form id="teacherForm">
    <div>
        <label>No. of teachers in the school:</label>
        <input type="number" id="teacherCount" min="1" name="teacher_count">
        <button type="button" id="generateFields">Generate Fields</button>
    </div>
    
    <div id="teacherDetails"></div>
    
    <button type="submit">Submit</button>
</form>

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
