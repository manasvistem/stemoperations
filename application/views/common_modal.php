<div class="mt-4">
                      
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBothNotification" aria-labelledby="offcanvasBothLabel">
                          <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <div class="text-center">
                                <img src="<?=base_url()?>assets/img/notification.webp" width="200" alt="pendingtasklist">
                            </div>
                            <hr>
                            <?php 
                            $getnotifications =  $this->Menu_model->GetTodaysNotiifications($user['id'],date("Y-m-d"));
                            $getnotificationscnt = sizeof($getnotifications);
                            if($getnotificationscnt > 0){
                                $addclass = 'text-danger';
                            }else{
                                $addclass = '';
                            }
                            ?>
                            <center>
                                <h5 id="offcanvasBothLabel" class="offcanvas-title <?= $addclass; ?>">Notification 
                                    (<span id="notifymodal"><?= $getnotificationscnt;?></span>)
                                </h5>
                            </center>
                            <hr>
                            <div class="list-group">
                        <?php foreach($getnotifications as $getnotification):

                            $noti_id                    = $getnotification->id;
                            $noti_created_at            = $getnotification->created_at;
                            $current_time               = date('Y-m-d H:i:s');
                            $notifi_datetime1           = new DateTime($noti_created_at);
                            $notify_datetime2           = new DateTime($current_time);
                            $notify_interval            = $notifi_datetime1->diff($notify_datetime2);
                            $notify_interval_message    = $notify_interval->h . " hours and " . $notify_interval->i . " minutes.";
                            ?>

                            <div class="bs-toast toast fade show p-3" role="alert" aria-live="assertive" aria-atomic="true" style="    background: aliceblue;">
                                <div class="toast-header">
                                    <i class="bx bx-bell me-2 text-danger"></i>
                                    <div class="me-auto fw-medium"><?= $getnotification->type;?></div>
                                    <button type="button" class="btn-close close-notification" data-id="<?= $noti_id ?>" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    <?= $getnotification->message;?>
                                    <hr>
                                    <small><?= $notify_interval_message;?> ago</small>
                                </div>
                            </div>
                            <br>
                          <?php endforeach; ?>
                        </div>
                            
                          </div>
                        </div>
                      </div>