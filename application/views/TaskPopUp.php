<div class="mt-4">
    <!-- Modal -->
    <div class="modal fade" id="modalCenterTimeLine" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitleTimeLine">Join Call For Factory and Installation Time Line</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <hr>
          <div class="modal-body">

          <form action="<?=base_url();?>Menu/JoinCallForFactoryAndInstallationTimeLine" method="post">
                    <div class="mb-4">
                    <input type="hidden" name="time_line_task_id" id="time_line_task_id" class="form-control" required="">
                        <label for="time_line_project_code" class="form-label">Project Code</label>
                        <select class="form-select" name="pcode" id="time_line_project_code" aria-label="Default select example" required>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label for="datetime-local-timeline-planning" class="form-label">Join Call Start Date</label>
                        <input type="datetime-local" class="form-control" name="plandate" id="datetime-local-timeline-planning" value="<?=date("Y-m-d H:i:s");?>" readonly required />
                      </div>
                      <div class="mt-4">
                      <label for="google_meetings_links" class="form-label">* Goolge Meeting Links: </label>
                        <input type="text" name="meetlink" placeholder="Meeting Link" id="google_meetings_links" class="form-control" required="">
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Join Call</button>
                    </div>
                  </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCenterProgramTimeLine" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterProgramTitleTimeLine"> Program Time Line Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <hr>
          <div class="modal-body">

          <form action="<?=base_url();?>Menu/JoinProgramTimeLine" method="post">
                    <div class="mb-4">
                    <input type="hidden" name="time_line_task_id" id="program_time_line_task_id" class="form-control" required="">
                        <label for="program_time_line_project_code" class="form-label">Project Code</label>
                        <select class="form-select" name="pcode" id="program_time_line_project_code" aria-label="Default select example" required>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label for="datetime-local-timeline-planning" class="form-label">Join Call Start Date</label>
                        <input type="datetime-local" class="form-control" name="plandate" id="datetime-local-timeline-planning" value="<?=date("Y-m-d H:i:s");?>" readonly required />
                      </div>
                      <div class="mt-4">
                      <label for="google_meetings_links" class="form-label">* Goolge Meeting Links: </label>
                        <input type="text" name="meetlink" placeholder="Meeting Link" id="google_meetings_links" class="form-control" required="">
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Join Call</button>
                    </div>
                  </form>
          </div>
        </div>
      </div>
    </div>


        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <hr>
          <div class="modal-body">

            <div class="row">
              <div class="col mb-6">
                <label for="nameWithTitle" class="form-label">Name</label>
                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
              </div>
            </div>
            <div class="row g-6">
              <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Email</label>
                <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
              </div>
              <div class="col mb-0">
                <label for="dobWithTitle" class="form-label">DOB</label>
                <input type="date" id="dobWithTitle" class="form-control">
              </div>
            </div>
            <hr>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>



    

  </div>