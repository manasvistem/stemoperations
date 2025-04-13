
<style>
        .container { max-width: 800px; margin-top: 20px; }
    </style>

    <div class="container">
        <form class="needs-validation" novalidate action="<?php echo base_url()?>Menu/updateFTTPReviewCallZM" method="POST" >
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>

            <div class="mb-3">
                <label class="form-label">Action Completed?</label><br>
                <input type="radio" name="action_completed" value="yes" id="action_yes"> Yes
                <input type="radio" name="action_completed" value="no" id="action_no"> No
            </div>

            <div class="mb-3" id="purpose_section" style="display: none;">
                <label class="form-label">Purpose Completed?</label><br>
                <input type="radio" name="purpose_completed" value="yes" id="purpose_yes"> Yes
                <input type="radio" name="purpose_completed" value="no" id="purpose_no"> No
            </div>

            <div id="form_section" style="display: none;">
                <div class="mb-3">
                    <label class="form-label">What was the Duration of the TTP?</label>
                    <input type="text" class="form-control" name="ttp_duration" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Does the teachers have any concerns related to MSC?</label><br>
                    <input type="radio" name="concerns_msc" value="yes" id="concern_yes"> Yes
                    <input type="radio" name="concerns_msc" value="no" id="concern_no"> No
                </div>

                <div class="mb-3" id="resolve_question" style="display: none;">
                    <label class="form-label">If yes, have you Resolved?</label><br>
                    <input type="radio" name="resolved" value="yes"> Yes
                    <input type="radio" name="resolved" value="no"> No
                </div>

                <div class="mb-3">
                    <label class="form-label">Has the PIA taken Quality Photographs and Video of the training?</label>
                    <select class="form-select" name="quality_photos">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Has the PIA developed rapport with the teachers during TTP?</label>
                    <select class="form-select" name="rapport">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Has the TTP Report been prepared within 48 hours?</label>
                    <select class="form-select" name="report_48hrs">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Has the PIA taken 1-2 teachers' TTP experience testimonials via video recording?</label>
                    <select class="form-select" name="testimonials">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate the overall training quality:</label>
                    <input type="number" class="form-control" name="training_quality" min="1" max="5" placeholder="Rate from 1 to 5">
                </div>

                <div class="mb-3">
                    <label class="form-label">Has he created the WhatsApp group?</label>
                    <select class="form-select" name="whatsapp_group">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Final Remark</label>
                    <textarea class="form-control" name="final_remark" rows="3"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $('input[name="action_completed"]').change(function() {
                if ($('#action_yes').is(':checked')) {
                    $('#purpose_section').show();
                } else {
                    $('#purpose_section').hide();
                    $('#form_section').hide();
                }
            });

            $('input[name="purpose_completed"]').change(function() {
                if ($('#purpose_yes').is(':checked')) {
                    $('#form_section').show();
                } else {
                    $('#form_section').hide();
                }
            });

            $('input[name="concerns_msc"]').change(function() {
                if ($('#concern_yes').is(':checked')) {
                    $('#resolve_question').show();
                } else {
                    $('#resolve_question').hide();
                }
            });
        });
    </script>

