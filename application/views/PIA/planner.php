<script>
  $(document).ready(function() {
  
        $('#planningStart1').hide();
        $('#planningStart2').hide();
        $('#plantimerBox').hide();
        $('#planningStartbtn').show();

        $('#example1_session').DataTable({
              dom: 'Bfrtip',
              buttons: ['copy', 'excelFlash', 'excel', 'pdf', 'print'],
              paging: true,           // Enable pagination
              pageLength: 5,         // Number of rows per page
              // lengthMenu: [10, 25, 50, 100], // Options for number of rows per page
              ordering: true,         // Enable sorting
              searching: true         // Enable search box
          });

  
     
          
    
          var timerInterval;
          var startTime;
          // Function to update the timer every second
          function updateTimer() {
          clearInterval(timerInterval); // Clear any existing interval to prevent multiple intervals
          timerInterval = setInterval(function() {
              var currentTime = new Date();
              var elapsedTime = currentTime - startTime;
              var seconds = Math.floor((elapsedTime / 1000) % 60);
              var minutes = Math.floor((elapsedTime / (1000 * 60)) % 60);
              var hours = Math.floor((elapsedTime / (1000 * 60 * 60)) % 24);
              $('#timer').text(
                  (hours < 10 ? "0" + hours : hours) + ":" +
                  (minutes < 10 ? "0" + minutes : minutes) + ":" +
                  (seconds < 10 ? "0" + seconds : seconds)
              );
          }, 1000);
          }
          // Function to show/hide the form based on timer status
          function toggleFormVisibility() {
           
          if (startTime) {
              $('#planningStart1').show();
              $('#planningStart2').show();
              $('#plantimerBox').show();
              $('#planningStartbtn').hide();
              var plannersession = '<?= $planSessionDatacnt; ?>';
              $("#PlannerSessionStimer").text('Session : ' + plannersession);
              
            //   $('nav > ul> li > a').on('click', function(e) {
            //     e.preventDefault();
            //     alert('You must click "Stop Planning" before moving to another Page.');
            // });
            // window.oncontextmenu = function () {
            //   return false;
            //   }
            //   $(document).keydown(function (event) {
            //   if (event.keyCode == 123) {
            //   return false;
            //   }
            //   else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
            //   return false;
            //   }
            //   else if (event.ctrlKey && event.keyCode == 85) {
            //   return false;
            //   }
            //   })
            //   function onKeyDown() {
            //   var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
            //   if (event.ctrlKey && (pressedKey == "c" || pressedKey == "v" || pressedKey=="j" )) {
            //   event.returnValue = false;
            //   }
            //   }
            // $(document).on('keydown', function(e) {
            //     // 9 is the keycode for "Tab" key
            //     if (e.keyCode === 9) {
            //         e.preventDefault();
            //         alert('You must click "Stop Planning" before switching tabs.');
            //     }
            // });
          
          } else {
              $('#planningStart1').hide();
              $('#planningStart2').hide();
              $('#plantimerBox').hide();
              $('#planningStartbtn').show();
              // $('nav > ul> li > a').off('click'); 
              // $(document).off('keydown');  // Allow tab switching
              // const targetUrl = "<?=base_url();?>Menu/Dashboard";  // New URL to set
             
          }
          }
          // Initialize the timer from local storage if the start button was previously clicked
          if (localStorage.getItem('timerStartTime')) {
          startTime = new Date(localStorage.getItem('timerStartTime'));
        
          updateTimer();
          toggleFormVisibility();
          }
          // Start button click event
          $('#start').click(function() {
          
          // resetTimer();
          // alert(startTime);
          // return false;
  
          if (!startTime) {
              startTime = new Date();
              localStorage.setItem('timerStartTime', startTime);
              updateTimer();
              toggleFormVisibility();
              alert("Planner Timer started!");
              
              var plannersession = <?= $planSessionDatacnt; ?>;
                  plannersession  = plannersession+1;
              $("#PlannerSessionStimer").text('Session : ' + plannersession);
              $.ajax({
                  url:'<?=base_url();?>Menu/session_plan_time_start',
                  type: "POST",
                  data: {
                    start: 'start',
                  },
                  cache: false,
                  success: function a(result){
                  }
                  });
                var pageLoadTime = new Date().getTime() - 0;
                var x = setInterval(function() {
                var now = new Date().getTime();
                var timeSpent = now - pageLoadTime;
                var hours = Math.floor((timeSpent / 1000) / 3600);
                var minutes = Math.floor(((timeSpent / 1000) % 3600) / 60);
                var seconds = Math.floor((timeSpent / 1000) % 60);
                var formattedTimeSpent =
                (hours < 10 ? "0" : "") + hours + ":" +
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds;
                document.getElementById("demo").innerHTML = "Time Spent in Task Planning: " + formattedTimeSpent;
                document.getElementById("tptime").value=formattedTimeSpent;
                }, 1000);
          }
          });
          // Stop button click event
          $('#stop').click(function() {
          if (startTime) {
          var totalttasktime = parseInt($("#totalttasktime").val());
          var plannerremTime = parseInt($("#plannerremTime").val());
          if(totalttasktime >= plannerremTime){
            var timerval = $("#timer").text();
              resetTimer();
              alert("Planner Timer stopped and reset!");
              $.ajax({
                  url:'<?=base_url();?>Menu/session_plan_time_close',
                  type: "POST",
                  data: {
                    close: timerval,
                  },
                  cache: false,
                  success: function a(result){
                    location.reload();
                  }
                  });
                  clearInterval(x);
                  document.getElementById("demo").innerHTML = "Time Spent in Task Planning: " + "00:00:00";
          
          }else{
          var avremtime = plannerremTime - totalttasktime;
          if (avremtime < 60) {
          alert("You need to plan "+avremtime +" minutes task to stop the session");
          } else {
          var avre_hours = Math.floor(avremtime / 60);
          var avre_minutes = avremtime % 60;
          alert("You need to plan hours " + avre_hours + " and " + avre_minutes + " minutes task to stop the session");
          }
          
          }
          
          }
          });
          
          // Function to reset the timer
          function resetTimer() {
          clearInterval(timerInterval); // Stop the timer
          startTime = null;
          localStorage.removeItem('timerStartTime'); // Clear the start time from local storage
          $('#timer').text("00:00:00"); // Reset the timer display
          toggleFormVisibility();
          }
        }); 
</script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const startTimeInput = document.getElementById('start-time');
    const endTimeInput = document.getElementById('end-time');

    if (startTimeInput) {
        startTimeInput.setAttribute('min', '16:00');
        startTimeInput.setAttribute('max', '19:00');
        startTimeInput.addEventListener('change', validateTimeInputAuto);
    }

    if (endTimeInput) {
        endTimeInput.setAttribute('min', '16:00');
        endTimeInput.setAttribute('max', '19:00');
        endTimeInput.addEventListener('change', validateTimeInputAuto);
    }
});

  
       <?php
      if(sizeof($getplandt) == 1){
          $stime = explode(":", $getplandt[0]->stime);
          $endtime = explode(":", $getplandt[0]->etime);
      
          $starttime = $stime[0].':'.$stime[1];
          $endtime = $endtime[0].':'.$endtime[1];
      
      ?>
  function validateTimeInputMeet(event) {
            const input = event.target;
            const timeValue = input.value;
            const minTime = "10:00";
            const maxTime = "19:00";
            const restrictedStartTime = "<?=$starttime?>";
            const restrictedEndTime = "<?=$endtime ?>";
            
            if ((timeValue >= restrictedStartTime && timeValue <= restrictedEndTime) || timeValue < minTime || timeValue > maxTime) {
                alert("Try to Diffrent between 10:00 AM to 7:00 PM (<?=$starttime?> to <?=$endtime ?> time is booked for auto task)");
                input.value = "";
            }else{
          
            }
        }
        
       function validateTimeInputAuto(event) {
           const input = event.target;
           const timeValue = input.value;
           const minTime = "16:00";
           const maxTime = "19:00";
       
           if (timeValue < minTime || timeValue > maxTime) {
               alert("Please enter a time between 04:00 PM and 7:00 PM.");
               input.value = "";
           }
       }
       <?php } ?>
       function validateTimeInputAuto(event) {
           const input = event.target;
           const timeValue = input.value;
           const minTime = "16:00";
           const maxTime = "19:00";
       
           if (timeValue < minTime || timeValue > maxTime) {
               alert("Please enter a time between 04:00 PM and 7:00 PM.");
               input.value = "";
           }
       }
        $('#end-time').on('change', function() {
       <?php  $checkHalfDayLeave = checkHalfDayLeave($uid,$adate);
       $checkHalfDayLeavecnt = sizeof($checkHalfDayLeave);
       if($checkHalfDayLeavecnt > 0){
        $partOfleave = $checkHalfDayLeave[0]->halfday_leaveType;
        echo "var partOfleave = '" . addslashes($partOfleave) . "';";
       }else{
        echo "var partOfleave = '';";
       }

    ?>
       var autotaskTime = 90;
       if (partOfleave == 1 || partOfleave == 2 ) {
           autotaskTime = 45;
       }
       
       var startTime = $('#start-time').val();
       if (startTime === '') {
           alert("Please Enter Start Time");
           $('#end-time').val('');
       } else {
               var endTime = $(this).val();
               var startTimeMinutes = convertTimeToMinutes(startTime);
               var endTimeMinutes = convertTimeToMinutes(endTime);
               // Check if the difference is more than 90 minutes
               if ((endTimeMinutes - startTimeMinutes) > autotaskTime || (endTimeMinutes - startTimeMinutes) < autotaskTime) {
                   alert('Auto Task Max Time is Only 90 Minutes');
                   $('#end-time').val('');
               }
           }
       });
       function convertTimeToMinutes(time) {
                 var timeParts = time.split(':');
                 var hours = parseInt(timeParts[0], 10);
                 var minutes = parseInt(timeParts[1], 10);
                 return (hours * 60) + minutes;
             }
  
      $('#end-time').on('change', function() {
               let endTime = $(this).val();
               if (endTime) {
                   // Convert endTime to a Date object
                   let endDateTime = new Date('1970-01-01T' + endTime + ':00');
                   let startDateTime = new Date(endDateTime.getTime() + 0 * 60000);
                   let startHours = ('0' + startDateTime.getHours()).slice(-2);
                   let startMinutes = ('0' + startDateTime.getMinutes()).slice(-2);
                   $('#start_tttpft').val(startHours + ':' + startMinutes);
                   // Increment by 1 hour for end_tttpft
                   let endTttPftDateTime = new Date(endDateTime.getTime() + 1 * 3600000);
                   let endTttPftHours = ('0' + endTttPftDateTime.getHours()).slice(-2);
                   let endTttPftMinutes = ('0' + endTttPftDateTime.getMinutes()).slice(-2);
                   $('#end_tttpft').val(endTttPftHours + ':' + endTttPftMinutes);
               }
           });
  
           $('#autoplan_submit').click(function(event) {
                  var endTime = $('#end_tttpft').val();
                  var time = new Date('1970-01-01T' + endTime + 'Z');
                  var limitTime = new Date('1970-01-01T19:00:00Z');
                  // Compare the times
                  if (time > limitTime) {
                      event.preventDefault();
                      // Show an alert
                      alert('The time cannot be later than 7 PM.');
                      $('#end_tttpft').css('border', '2px solid red');
                      // $('#end-time').val('');
                  }else{
                    $('#end_tttpft').css('border', '');
                  }
              });
              function updateCountdown() {
                      var now = new Date();
                      var targetTime = new Date();
                      
                      var phours  = $("#phours").val();
                      var pminutes = $("#pminutes").val();
                      var pseconds = $("#pseconds").val();
                      targetTime.setHours(phours);
                      targetTime.setMinutes(pminutes);
                      targetTime.setSeconds(pseconds);
                      
                      var timeDifference = targetTime - now;
                      
                      if (timeDifference <= 0) {
                          $('#planertime').text('Now Start Your Next Day Planning');
                          $('#yndpt').text('Now Plan Your Next Day Task : ');
                          $('#rtsyndp').hide();
                          clearInterval(countdownInterval);
                          return;
                      }
                      
                      var hours = Math.floor(timeDifference / (1000 * 60 * 60));
                      var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                      var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
                      
                      $('#planertime').text(hours + "h " + minutes + "m " + seconds + "s ");
                  }
                  // Update the countdown every second
                  var countdownInterval = setInterval(updateCountdown, 1000);
                  $(window).on('popstate', function() {
                      alert("You can't go back to the previous page!");
                  }); 
                  window.history.pushState(null, null, window.location.href);


// Start Planner Filter Code 


$(document).ready(function() {

  $('#maintaskcard').hide();
  $('#taskplanning_loader').hide();
  $('#OldPendingTaskCard').hide();
  $('#todaysPendingTaskCard').hide();
  $('#task_action_card').hide();

  $('#projectCodeTaskCard').hide();
  $('#sPDOrSIDTaskCard').hide();
  $('#school_status_Card').hide();
  $('#school_task_action_card').hide();
  $('#school_region_card').hide();
  $('#school_zone_card').hide();
  $('#school_targte_date_card').hide();

var radioButtons = document.querySelectorAll('input[name="types_filter_radio"]');
radioButtons.forEach(function(radio) {
    radio.addEventListener('change', function() {
        var selectedFilter = radio.value;
        $("#selectby").val(selectedFilter);
        $("#tasktype").text(' - ' + selectedFilter).css('color', 'green');
        if(selectedFilter  == 'Old Pending Task'){
          $('#OldPendingTaskCard').fadeIn();
          $('#defaultTaskCard').hide();
          $('#task_action_card').hide();
          $('#oldpendingTasksList').change(function() {
                  var task_action_name = $(this).val(); // Get the selected value

                  $('#taskplanningimg').hide();
                  $('#taskplanning_loader').fadeIn();
                  $('#updatetasklists').html('');

                  $.ajax({
                      url: '<?=base_url();?>Menu/GetOldPendingTaskOnPlannerPageBYTaskName',
                      type: "POST",
                      data: {
                          task_action_name: task_action_name
                      },
                      cache: false,
                      success: function a(result) {
                          $('#taskplanning_loader').hide();
                          if (result !== '') {

                              $('#maintaskcard').fadeIn();
                              $('#updatetasklists').html(result);
                          }
                          var optionCount = $('#updatetasklists').find('option').length;
                          $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                      }
                  });
            });
        }else{
          $('#OldPendingTaskCard').hide();
        }

        if(selectedFilter  == 'Plan But Not Initiated'){

          $('#todaysPendingTaskCard').fadeIn();
          $('#defaultTaskCard').hide();
          $('#task_action_card').hide();

          $('#todayspendingTasksList').change(function() {
                  var task_action_name = $(this).val(); // Get the selected value
                  $('#taskplanningimg').hide();
                  $('#taskplanning_loader').fadeIn();
                  $('#updatetasklists').html('');

                  $.ajax({
                      url: '<?=base_url();?>Menu/GetTodaysOldPendingTaskOnPlannerPageBYTaskName',
                      type: "POST",
                      data: {
                          task_action_name: task_action_name
                      },
                      cache: false,
                      success: function a(result) {
                          $('#taskplanning_loader').hide();
                          if (result !== '') {

                              $('#maintaskcard').fadeIn();
                              $('#updatetasklists').html(result);
                          }
                          var optionCount = $('#updatetasklists').find('option').length;
                          $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                      }
                  });
            });
        }else{
          $('#todaysPendingTaskCard').hide();
        }

        // Start Project Code 
        if(selectedFilter  == 'Project Code'){
         
          $('#projectCodeTaskCard').fadeIn();
          $('#defaultTaskCard').hide();
          $('#task_action_card').fadeIn();  

          $('#projectCodeLists').change(function() {
                  var project_code = $(this).val(); // Get the selected value
                  $('#selectSpdTask').text("Select School");
                  $('#taskplanningimg').hide();
                  $('#taskplanning_loader').fadeIn();
                  $('#updatetasklists').html('');
                  $.ajax({
                      url: '<?=base_url();?>Menu/GetSPDBYProjectCode',
                      type: "POST",
                      data: {
                        project_code: project_code
                      },
                      cache: false,
                      success: function a(result) {
                          $('#taskplanning_loader').hide();
                          if (result !== '') {
                              $('#maintaskcard').fadeIn();
                              $('#updatetasklists').html(result);
                              $('#taskplanning_loader').hide();
                          }
                          var optionCount = $('#updatetasklists').find('option').length;
                          $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                      }
                  });
            });
        }else{
          $('#projectCodeTaskCard').hide();
        }
        // End Project Code
        // Start School Name
        if(selectedFilter  == 'School Name'){
          $('#sPDOrSIDTaskCard').fadeIn();
          $('#defaultTaskCard').hide();
          $('#task_action_card').fadeIn();  
          $('#search_sid').on('input', function() {
                var inputVal = $(this).val();
                var options = $('#data').find('option').map(function() {
                    return $(this).val();
                }).get();
                var selectedId = null;
                options.forEach(function(option) {
                    if (option.startsWith(inputVal)) {
                        selectedId = option.split(' ')[0];
                    }
                });
                if (selectedId) {
                    $('#selectSpdTask').text("Select School");
                    $('#taskplanningimg').hide();
                    $('#taskplanning_loader').fadeIn();
                    $('#updatetasklists').html('');
                    $.ajax({
                      url: '<?=base_url();?>Menu/GetSPDBYSID',
                      type: "POST",
                      data: {
                        selectedId: selectedId
                      },
                      cache: false,
                      success: function a(result) {
                          $('#taskplanning_loader').hide();
                          if (result !== '') {
                              $('#maintaskcard').fadeIn();
                              $('#updatetasklists').html(result);
                              $('#taskplanning_loader').hide();
                          }
                          var optionCount = $('#updatetasklists').find('option').length;
                          $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                      }
                  });
                }
            });
        }else{
          $('#sPDOrSIDTaskCard').hide();
        }
        // End School Name

         // Start Project Code 
         if(selectedFilter  == 'Status'){
         
         $('#school_status_Card').fadeIn();
         $('#defaultTaskCard').hide();
         $('#task_action_card').fadeIn();  

         $('#school_status_list').change(function() {
                 var school_status = $(this).val(); // Get the selected value
                 $('#selectSpdTask').text("Select School");
                 $('#taskplanningimg').hide();
                 $('#taskplanning_loader').fadeIn();
                 $('#updatetasklists').html('');
                 $.ajax({
                     url: '<?=base_url();?>Menu/GetSPDBYStatus',
                     type: "POST",
                     data: {
                        school_status: school_status
                     },
                     cache: false,
                     success: function a(result) {
                         $('#taskplanning_loader').hide();
                         if (result !== '') {
                             $('#maintaskcard').fadeIn();
                             $('#updatetasklists').html(result);
                             $('#taskplanning_loader').hide();
                         }
                         var optionCount = $('#updatetasklists').find('option').length;
                         $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                     }
                 });
           });
       }else{
         $('#school_status_Card').hide();
       }
       // End Project Code

         // Start Task Action
         if(selectedFilter  == 'Task Action'){
         
         $('#school_task_action_card').fadeIn();
         $('#defaultTaskCard').hide();
         $('#task_action_card').fadeIn();  

         $('#school_task_action_list').change(function() {
                 var task_action_type = $(this).val(); // Get the selected value
                 $('#selectSpdTask').text("Select School");
                 $('#taskplanningimg').hide();
                 $('#taskplanning_loader').fadeIn();
                 $('#updatetasklists').html('');
                 $.ajax({
                     url: '<?=base_url();?>Menu/GetSPDWithTaskActionTypeList',
                     type: "POST",
                     data: {
                        task_action_type: task_action_type
                     },
                     cache: false,
                     success: function a(result) {
                         $('#taskplanning_loader').hide();
                         if (result !== '') {
                             $('#maintaskcard').fadeIn();
                             $('#updatetasklists').html(result);
                             $('#taskplanning_loader').hide();

                              $("#taskTypeListByDepartmentID").val(task_action_type).prop('disabled', true); // Get the selected value

                                $.ajax({
                                url: '<?=base_url();?>Menu/GetTaskActionListUsingTaskTypeName',
                                type: "POST",
                                data: {
                                    task_type_name: task_action_type
                                },
                                cache: false,
                                success: function a(result) {
                                    $('#taskActionListByDepartmentID').html(result);
                                    
                                }
                            });

                         }
                         var optionCount = $('#updatetasklists').find('option').length;
                         $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                     }
                 });
           });
       }else{
         $('#school_task_action_card').hide();
         $("#taskTypeListByDepartmentID").prop('disabled', false);
       }
       // End Task Action

    
         // Start Region
         if(selectedFilter == 'Region'){
       
         $('#school_region_card').fadeIn();
         $('#defaultTaskCard').hide();
         $('#task_action_card').fadeIn();  

         $('#school_school_region_list').change(function() {
                 var task_Region = $(this).val(); // Get the selected value
                 $('#selectSpdTask').text("Select School");
                 $('#taskplanningimg').hide();
                 $('#taskplanning_loader').fadeIn();
                 $('#updatetasklists').html('');
                 
                 $.ajax({
                     url: '<?=base_url();?>Menu/GetSPDWithTaskActionRegionList',
                     type: "POST",
                     data: {
                        task_Region: task_Region
                     },
                     cache: false,
                     success: function a(result) {
                         $('#taskplanning_loader').hide();
                         if (result !== '') {
                             $('#maintaskcard').fadeIn();
                             $('#updatetasklists').html(result);
                             $('#taskplanning_loader').hide();
                         }
                         var optionCount = $('#updatetasklists').find('option').length;
                         $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                     }
                 });
           });
       }else{
         $('#school_region_card').hide();
       }
       // End Region
         // Start zone
         if(selectedFilter == 'zone'){
       
         $('#school_zone_card').fadeIn();
         $('#defaultTaskCard').hide();
         $('#task_action_card').fadeIn();  

         $('#school_school_zone_list').change(function() {
                 var task_zone = $(this).val(); // Get the selected value
                 $('#selectSpdTask').text("Select School");
                 $('#taskplanningimg').hide();
                 $('#taskplanning_loader').fadeIn();
                 $('#updatetasklists').html('');
                 
                 $.ajax({
                     url: '<?=base_url();?>Menu/GetSPDWithTaskActionZoneList',
                     type: "POST",
                     data: {
                        task_zone: task_zone
                     },
                     cache: false,
                     success: function a(result) {
                         $('#taskplanning_loader').hide();
                         if (result !== '') {
                             $('#maintaskcard').fadeIn();
                             $('#updatetasklists').html(result);
                             $('#taskplanning_loader').hide();
                         }
                         var optionCount = $('#updatetasklists').find('option').length;
                         $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                     }
                 });
           });
       }else{
         $('#school_zone_card').hide();
       }
         // Closed  zone
         // Start school_targte_date_card
         if(selectedFilter == 'Target Date'){
       
         $('#school_targte_date_card').fadeIn();
         $('#defaultTaskCard').hide();
         $('#task_action_card').hide();  
         $('#next2DaysPendingTasksList').change(function() {
            var task_action_name = $(this).val(); // Get the selected value
                  $('#taskplanningimg').hide();
                  $('#taskplanning_loader').fadeIn();
                  $('#updatetasklists').html('');

                  $.ajax({
                      url: '<?=base_url();?>Menu/GetNext2DaysPendingTaskOnPlannerPageBYTaskName',
                      type: "POST",
                      data: {
                          task_action_name: task_action_name,
                          nextDay2: '<?=$nextDay2;?>'
                      },
                      cache: false,
                      success: function a(result) {
                          $('#taskplanning_loader').hide();
                          if (result !== '') {

                              $('#maintaskcard').fadeIn();
                              $('#updatetasklists').html(result);
                          }
                          var optionCount = $('#updatetasklists').find('option').length;
                          $("#updatetasklists_text").text('Total Task : ' + optionCount).css('color', 'green');
                      }
                  });
           });
       }else{
         $('#school_targte_date_card').hide();
       }
       // End zone



        
      


        $('#taskTypeListByDepartmentID').change(function() {
              var task_type_name = $(this).val(); // Get the selected value
              $.ajax({
                  url: '<?=base_url();?>Menu/GetTaskActionListUsingTaskTypeName',
                  type: "POST",
                  data: {
                      task_type_name: task_type_name
                  },
                  cache: false,
                  success: function a(result) {
                      $('#taskActionListByDepartmentID').html(result);
                  }
              });
          });


    });
});
});




$(document).ready(function() {
  $("#printPage").click(function() {
              window.print();
          });

$('#example10').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excelFlash', 'excel', 'pdf', 'print'
    ],
    paging: true, // Enables pagination
    pageLength: 10, // Sets the default number of rows per page
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]] // Allows user to select number of rows
});

});









</script>