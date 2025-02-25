<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .hidden {
            display: none;
        }
    </style>
<!-- jQuery (Load this first) -->

<!-- Bootstrap (Make sure Bootstrap JS is also included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<body class="bg-light">


<div class="mx-auto" style="width: 800px; margin-top: 5rem;">
<form action="<?php echo base_url();?>/Menu1/updateTask" name="welcome_message" method="post">
        <div class="card shadow p-4">
            <h3 class="text-center mb-3">Inauguration Call</h3>
            <input type="hidden" name="task_id" value="<?php echo $taskDetails['id']; ?>"/>
            <input type="hidden" value="<?php echo $taskDetails['task_action']; ?>"/>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Project Code</label>
                    <input type="text" class="form-control" value="<?php echo $taskDetails['project_code']; ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">School Name</label>
                    <input type="text" class="form-control" value="<?php echo $taskDetails['sname']; ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Client Name</label>
                    <input type="text" class="form-control" value="<?php echo $taskDetails['clientname']; ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Client Contact</label>
                    <input type="text" class="form-control" value="<?php echo $taskDetails['contact_no']; ?>" readonly>
                </div>
                <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">School Address</label>
                    <textarea class="form-control" rows="2" readonly><?php echo $taskDetails['saddress']; ?></textarea>
                </div>
            </div>

            <!-- WhatsApp & Email Buttons (Centered) -->
            <div class="text-center mb-3">
                <button class="btn btn-success me-2" onclick="sendWhatsApp(<?php echo $taskDetails['contact_no']; ?>)">WhatsApp</button>
                <button class="btn btn-primary" onclick="sendEmail()">Email</button>
            </div>

            <!-- Form Fields (2-Column Layout) -->
           
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Action:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="actontaken" value="yes" id="actionYes">
                            <label class="form-check-label" for="actionYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="actontaken" value="no" id="actionNo">
                            <label class="form-check-label" for="actionNo">No</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Purpose:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose_achieved" value="yes" id="purposeYes">
                            <label class="form-check-label" for="purposeYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose_achieved" value="no" id="purposeNo">
                            <label class="form-check-label" for="purposeNo">No</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <button type="button" class="btn btn-warning w-100" onclick="toggleRemarks()">Add Remark</button>
                    </div>
                    <div class="col-md-6 mb-3 d-none" id="remarkSection">
                        <textarea class="form-control" id="remarkField" name="remarks" rows="3" placeholder="Enter your remark"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark w-50">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>