<!-- User details -->
  <div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body card-body">  
   <div >
   <center><h5>Create Plan</h5></center><hr>
           
   <?php
   date_default_timezone_set('Asia/Kolkata');
   $today = date('Y-m-d');
   $uid= $user['id'];
   ?>
   <?=form_open('Menu/setaction')?>
   <input type="hidden" id="taskid" name="taskid">
   <input type="hidden" id="uid" name="uid" value="<?=$uid?>">
   <input type="datetime-local" name="date" class="form-control p-3 mt-2 mb-2" placeholder="Date" min="<?=$today?>">
   <select type="text" class="form-control" id="action" name="action" required>
       <option>Select Action Type</option>
       <?php $this->load->model('Menu_model'); 
       $data=$this->Menu_model->get_action();
       foreach($data as $d){ 
       ?>
       <option value="<?=$d->name;?>"><?=$d->name;?></option>
       <?php } ?>
    </select>
   <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
   </form>
  </div>
  
  </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
                </div></div></div>
 
  

  <!-- Script -->
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  
 $(document).ready(function(){	
     
     $('#other_action').click(function(){
    $('#doaction').modal('show');
    var id = document.getElementById("other_action").value;
    document.getElementById("taskid").value = id;
  });
  
 });
  
  
 </script>