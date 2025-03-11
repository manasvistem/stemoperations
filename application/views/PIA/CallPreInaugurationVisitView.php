<div class="container mt-5">
    <h3 class="text-center mb-4"><?php // echo $taskstatus ?>Pre-Inauguration Task</h3>
    
    <div class="card">
        <h3 class="text-center mb-3" >Inauguration Visit</h3>
        <form id="uploadForm" action="updateTask" enctype="multipart/form-data" style="padding:30px;" method="post">
        <input type="hidden" name="task_id" value="<?php echo $taskDetails['id']; ?>"/>
            <div class="mb-3">
                <label class="form-label fw-bold">Project Code</label>
                <input type="text" class="form-control" name="projectcode" value="Predefined Project Code" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">School Name</label>
                <input type="text" class="form-control" name="schoolname" value="Predefined School Name" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">School Address</label>
                <textarea class="form-control" name="schooladdr" rows="2" readonly>Predefined School Address</textarea>
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
