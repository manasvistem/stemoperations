<!-- Button to Open Modal -->
 <form action="updateTask" method="post" name="call_inauguration">
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actionModal">Call</button>
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
<!-- Modal -->
<div class="container mt-5">
    
    <h3 class="text-center mb-4">Call & Action</h3>
    <input type="hidden" name="task_id" value="<?php echo $taskDetails['id']; ?>"/>

    <!-- Call Button -->
    <button class="btn btn-success w-100 mb-3" onclick="makeCall('+1234567890')">Call</button>
    
    <!-- Action Radio Buttons -->
    <div class="mb-3">
        <label class="form-label fw-bold">Action:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="action" value="yes" id="actionYes" name="actionYes" onclick="togglePurpose(true); toggleRemark('action', false)">
            <label class="form-check-label" for="actionYes">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="action" value="no" id="actionNo" name="actionNo" onclick="togglePurpose(false); toggleRemark('action', true)">
            <label class="form-check-label" for="actionNo">No</label>
        </div>
    </div>

    <!-- Action No Remark Field (Hidden by Default) -->
    <div class="mb-3 d-none" id="actionRemarkSection">
        <label class="form-label fw-bold">Action No Remark</label>
        <textarea class="form-control" id="actionRemarkField" name="actionRemarkField" rows="3" placeholder="Enter remark for Action No"></textarea>
    </div>

    <!-- Purpose Radio Buttons (Hidden by Default) -->
    <div class="mb-3 d-none" id="purposeSection">
        <label class="form-label fw-bold">Purpose:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="yes" id="purposeYes" name="purposeYes" onclick="toggleRemark('purpose', false)">
            <label class="form-check-label" for="purposeYes">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="no" id="purposeNo" name="purposeNo" onclick="toggleRemark('purpose', true)">
            <label class="form-check-label" for="purposeNo">No</label>
        </div>
    </div>

    <!-- Purpose No Remark Field (Hidden by Default) -->
    <div class="mb-3 d-none" id="purposeRemarkSection">
        <label class="form-label fw-bold">Purpose No Remark</label>
        <textarea class="form-control" id="purposeRemarkField" rows="3" name="purposeRemarkField" placeholder="Enter remark for Purpose No"></textarea>
    </div>
    
    <div class="text-center">
        <button type="submit" class="btn btn-dark">Submit</button>
    </div>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function makeCall(phoneNumber) {
        if (/Mobi|Android/i.test(navigator.userAgent)) {
            window.location.href = `tel:${phoneNumber}`;
        } else {
            alert("Calling is only available on mobile devices.");
        }
    }

    function togglePurpose(show) {
        document.getElementById("purposeSection").classList.toggle("d-none", !show);
    }

    function toggleRemark(type, show) {
        if (type === 'action') {
            document.getElementById("actionRemarkSection").classList.toggle("d-none", !show);
        } else if (type === 'purpose') {
            document.getElementById("purposeRemarkSection").classList.toggle("d-none", !show);
        }
    }
</script>
