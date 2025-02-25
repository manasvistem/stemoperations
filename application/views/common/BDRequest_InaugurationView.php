<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="card">
        <h3 class="text-center mb-3">Inauguration </h3>
        <input type="hidden" name="task_id" value="<?php echo $taskDetails['id']; ?>"/>
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-bold">Project Code</label>
                <input type="text" class="form-control" value="Predefined Project Code" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">School Name</label>
                <input type="text" class="form-control" value="Predefined School Name" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">School Address</label>
                <textarea class="form-control" rows="2" readonly>Predefined School Address</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Upload Video</label>
                <input type="file" class="form-control" name="videoFile" accept="video/*" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Upload Image</label>
                <input type="file" class="form-control" name="imageFile" accept="image/*" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark w-50">Submit</button>
            </div>
        </form>
        <div id="uploadStatus" class="mt-3 text-center"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  /*  $(document).ready(function() {
        $("#uploadForm").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $("#uploadStatus").html("<p class='text-info'>Uploading...</p>");
            $.ajax({
                url: "upload.php", // Change to your PHP upload script
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#uploadStatus").html("<p class='text-success'>" + response + "</p>");
                },
                error: function() {
                    $("#uploadStatus").html("<p class='text-danger'>Upload failed.</p>");
                }
            });
        });
    });*/
</script>
</body>
</html>
