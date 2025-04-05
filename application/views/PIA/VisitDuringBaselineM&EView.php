<div class="container mt-4 mb-5 p-4 border rounded shadow bg-white">
    <h4 class="mb-4 fw-bold text-center">School M&E Activity Form</h4>

    <!-- Take Selfie with School -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Take Selfie with School (with Location)</label>
        <input type="file" accept="image/*" capture="environment" class="form-control" name="selfie_location">
    </div>

    <!-- Start My Task -->
    <div class="mb-3">
        <button type="button" class="btn btn-success" id="startTaskBtn">Start My Task</button>
    </div>

    <!-- Task Content Fields -->
    <div id="taskContent" class="d-none mt-4">

        <div class="row g-3">
            <!-- Session Videos -->
            <div class="col-md-6">
                <label class="form-label">Running 1st Session</label>
                <input type="file" accept="video/*" class="form-control" name="session1">
            </div>
            <div class="col-md-6">
                <label class="form-label">Running 2nd Session</label>
                <input type="file" accept="video/*" class="form-control" name="session2">
            </div>
            <div class="col-md-6">
                <label class="form-label">Running 3rd Session</label>
                <input type="file" accept="video/*" class="form-control" name="session3">
            </div>
            <div class="col-md-6">
                <label class="form-label">Running 4th Session</label>
                <input type="file" accept="video/*" class="form-control" name="session4">
            </div>
            <div class="col-md-6">
                <label class="form-label">Running 5th Session</label>
                <input type="file" accept="video/*" class="form-control" name="session5">
            </div>

            <!-- Teacher Reviews -->
            <div class="col-md-6">
                <label class="form-label">1st Teacher Review</label>
                <input type="file" class="form-control" name="teacher_review1">
            </div>
            <div class="col-md-6">
                <label class="form-label">2nd Teacher Review</label>
                <input type="file" class="form-control" name="teacher_review2">
            </div>
            <div class="col-md-6">
                <label class="form-label">3rd Teacher Review</label>
                <input type="file" class="form-control" name="teacher_review3">
            </div>

            <!-- Student Reviews -->
            <div class="col-md-6">
                <label class="form-label">1st Student Review</label>
                <input type="file" class="form-control" name="student_review1">
            </div>
            <div class="col-md-6">
                <label class="form-label">2nd Student Review</label>
                <input type="file" class="form-control" name="student_review2">
            </div>
            <div class="col-md-6">
                <label class="form-label">3rd Student Review</label>
                <input type="file" class="form-control" name="student_review3">
            </div>

            <!-- M&E Letter -->
            <div class="col-md-6">
                <label class="form-label">Upload Baseline M&E Letter</label>
                <input type="file" class="form-control" name="baseline_letter">
            </div>

            <!-- Call with Reporting Manager -->
            <div class="col-md-6 d-flex align-items-end">
                <a href="tel:+911234567890" class="btn btn-outline-primary">
                    <i class="bi bi-telephone-forward-fill"></i> Call with Reporting Manager
                </a>
            </div>

            <!-- Final Selfie After Completion -->
            <div class="col-md-6">
                <label class="form-label">Completed My Task (Take Selfie with School)</label>
                <input type="file" accept="image/*" capture="environment" class="form-control" name="completed_selfie">
            </div>

            <!-- Add More Media -->
            <div class="col-12 mt-3">
                <label class="form-label fw-semibold">Add More Media</label>
                <input type="file" class="form-control" name="additional_media[]" multiple>
            </div>
        </div>