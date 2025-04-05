<div class="container">
        <form action="updateCallM&EBaseline" method="POST" name="baselineMnE">
            <div class="mb-3">
                <label class="form-label">Action Completed?</label><br>
                <input type="radio" name="action_completed" value="yes"> Yes
                <input type="radio" name="action_completed" value="no"> No
            </div>

            <div class="mb-3">
                <label class="form-label">Purpose Completed?</label><br>
                <input type="radio" name="purpose_completed" value="yes"> Yes
                <input type="radio" name="purpose_completed" value="no"> No
            </div>

            <div class="mb-3">
                <label class="form-label">What was the Duration of the TTP?</label>
                <input type="text" class="form-control" name="ttp_duration">
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
                <select class="form-control" name="quality_photos">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Has the PIA developed rapport with the teachers during TTP?</label>
                <select class="form-control" name="rapport">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Has the TTP Report been prepared within 48 hours?</label>
                <select class="form-control" name="report_48hrs">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Has the PIA taken 1-2 teachers' TTP experience testimonials via video recording?</label>
                <select class="form-control" name="testimonials">
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
                <select class="form-control" name="whatsapp_group">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Final Remark</label>
                <textarea class="form-control" name="final_remark" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
    <script>
$(document).ready(function () {
    // Initially hide all conditional fields
    let allFollowingFields = $("input[name='ttp_duration'], input[name='concerns_msc'], #resolve_question, select, input[name='training_quality'], textarea[name='final_remark']").closest('.mb-3');
    let purposeSection = $("input[name='purpose_completed']").closest('.mb-3');

    purposeSection.hide();
    allFollowingFields.hide();

    // Show/hide Purpose based on Action Completed
    $("input[name='action_completed']").change(function () {
        if ($(this).val() === "yes") {
            purposeSection.show();
        } else {
            purposeSection.hide();
            allFollowingFields.hide();
        }
    });

    // Show other fields based on Purpose Completed
    $("input[name='purpose_completed']").change(function () {
        if ($(this).val() === "yes") {
            allFollowingFields.show();
        } else {
            allFollowingFields.hide();
        }
    });

    // If concerns_msc is Yes, show "Resolved?" section
    $("input[name='concerns_msc']").change(function () {
        if ($(this).val() === "yes") {
            $("#resolve_question").show();
        } else {
            $("#resolve_question").hide();
        }
    });
});
</script>
