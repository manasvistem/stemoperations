<!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        
                    <div class="card card-form col-md-12">
                       <div class="card-header bg-info">Create Goals</div>
                        <div class="col-lg-12 card-body">
                           <?=form_open('Menu/GoalsCreate')?>
                           <input type="hidden" name="userid" class="form-control" min="<?=$uid?>">
                           <input type="datetime-local" name="date" class="form-control" min="<?=date('Y-m-d')?>">
                           <select class="form-control" name="tasktype">
                               <option>Call</option>
                               <option>Research</option>
                               <option>Visit</option>
                               <option>Report</option>
                               <option>GMeet</option>
                               <option>Desktop</option>
                           </select>
                           <textarea class="form-control" name="remark" placeholder="Task Detail..."></textarea>
                           <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                           </form>
                        </div>
                        </div>
                    </div>
                </div>
              
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
</section>
