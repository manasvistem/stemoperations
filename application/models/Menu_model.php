<?php
class Menu_model extends CI_Model{
    public function get_data(){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("select * from user_details");
        return $query->result();
    }
    public function get_dformat($dateTimeString){
        $dateTime = new DateTime($dateTimeString, new DateTimeZone('UTC'));
        $formattedDate = $dateTime->format('g:i A, F j, Y');
        return $formattedDate;
    }
    public function get_odformat($dateTimeString){
        $dateTime = new DateTime($dateTimeString, new DateTimeZone('UTC'));
        $formattedDate = $dateTime->format('F j, Y');
        return $formattedDate;
    }
    public function get_BDRPIAbyrid($rid){
        $query=$this->db->query("SELECT GROUP_CONCAT(user_detail.fullname) pianame FROM bdtask LEFT join user_detail ON user_detail.id=bdtask.uid WHERE tid='$rid'");
        return $query->result();
    }
    public function get_rid(){
        $query=$this->db->query("SELECT rdate, MONTHNAME(STR_TO_DATE(rdate, '%Y-%m-%d')) AS month_name, project_code, project_year, chid, sid, sname, noofmodel, stname, tid FROM ( SELECT CAST(replacereq.sdatet AS DATE) AS rdate, spd.project_code, client_handover.project_year, client_handover.id AS chid, spd.id AS sid, spd.sname, COUNT(*) AS noofmodel, status.name AS stname, replacereq.tid AS tid FROM replacereq INNER JOIN spd ON spd.id = replacereq.sid LEFT JOIN status ON status.id = spd.status INNER JOIN client_handover ON client_handover.projectcode = spd.project_code GROUP BY CAST(replacereq.sdatet AS DATE), spd.project_code, client_handover.project_year, client_handover.id,spd.id,spd.sname,status.name,replacereq.tid) AS subquery ORDER BY rdate DESC");
        return $query->result();
    }
    public function get_ridbypiid($piid){
        $query=$this->db->query("SELECT rdate, MONTHNAME(STR_TO_DATE(rdate, '%Y-%m-%d')) AS month_name, project_code, project_year, chid, sid, sname, noofmodel, stname, tid FROM ( SELECT CAST(replacereq.sdatet AS DATE) AS rdate, spd.project_code, client_handover.project_year, client_handover.id AS chid, spd.id AS sid, spd.sname, COUNT(*) AS noofmodel, status.name AS stname, replacereq.tid AS tid FROM replacereq INNER JOIN spd ON spd.id = replacereq.sid LEFT JOIN status ON status.id = spd.status INNER JOIN client_handover ON client_handover.projectcode = spd.project_code where spd.pi_id='$piid' GROUP BY CAST(replacereq.sdatet AS DATE), spd.project_code, client_handover.project_year, client_handover.id,spd.id,spd.sname,status.name,replacereq.tid) AS subquery ORDER BY rdate DESC");
        return $query->result();
    }
    public function get_sidrid($sid){
        $query=$this->db->query("SELECT * FROM replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where spd.id='$sid'");
        return $query->result();
    }
    public function get_midelrid($projectcode,$model_name){
        $db3 = $this->load->database('db2', TRUE);
        $query=$db3->query("SELECT unique_model.packdt,dailywork.user_name,unique_model.fgpackimg,dispatchdt,deliverydt FROM unique_model LEFT JOIN dailywork ON dailywork.id=unique_model.workid WHERE unique_model.id=(SELECT MAX(id) FROM unique_model WHERE workid=(SELECT MAX(id) FROM dailywork WHERE batchno='$projectcode') and packdt is not null and fg_name='$model_name')");
        return $query->result();
    }
    public function get_BDRequestbybdid($bdid){
        $query=$this->db->query("SELECT * FROM bdrequest where bd_id='$bdid'");
        return $query->result();
    }
    public function get_BDRequestbyPM($rysn,$code){
        if($code=='10'){
            if($rysn=='0'){
            $query=$this->db->query("SELECT * FROM bdrequest where status='0'");
            return $query->result();}
            else{
                $query=$this->db->query("SELECT * FROM bdrequest where status='0' and rysn='$rysn'");
            return $query->result();
            }
        }
    }
    public function get_BDRequestbyPIA($rysn,$code,$uid){
        if($code=='10'){
            if($rysn=='0'){
            $query=$this->db->query("SELECT * FROM bdtask LEFT JOIN bdrequest ON bdrequest.id=bdtask.tid WHERE bdtask.uid='$uid' and status='0'");
            return $query->result();}
            else{
                $query=$this->db->query("SELECT * FROM bdtask LEFT JOIN bdrequest ON bdrequest.id=bdtask.tid WHERE bdtask.uid='$uid' and status='0' and rysn='$rysn'");
            return $query->result();
            }
        }
    }
    public function get_BDRbyPIA1($uid){
        $query=$this->db->query("SELECT request_type as rtype,count(*) cont,rysn FROM bdtask LEFT JOIN bdrequest ON bdrequest.id=bdtask.tid WHERE bdtask.uid='$uid' and status='0' GROUP BY request_type,rysn;");
        return $query->result();
    }
    public function get_BDRbyPMG1(){
        $query=$this->db->query("SELECT request_type as rtype,count(*) cont,rysn FROM bdrequest where status='0' GROUP BY request_type,rysn");
        return $query->result();
    }
    public function get_BDRbyPMG2(){
        $query=$this->db->query("SELECT bd_name bdname,bd_id bdid, count(*) cont FROM bdrequest where status='0' GROUP BY bd_name,bd_id");
        return $query->result();
    }
    public function get_BDRequestbyrid($rid){
       $query=$this->db->query("SELECT * FROM bdrequest where id='$rid'");
        return $query->result();
    }
    public function get_htiprocessbytid($tid){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM mtask where tid='$tid'");
        return $query->result();
    }
    public function get_mtupbyrbdid($cid,$tid){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM mtaskupdate where rbdid='$cid' and tid='$tid'");
        return $query->result();
    }
    public function get_htimsprocess($tid){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM mstask where mtid='$tid'");
        return $query->result();
    }
    public function get_mstubycntsid($cid,$tid,$stid){
        $db2 = $this->load->database('db2', TRUE);
        if($tid!='2'){
            $query=$db3->query("SELECT * FROM client_handover WHERE id='$cid'");
            $data = $query->result();
            $pcode = $data[0]->projectcode;
        }
        if($stid==1){
            $query=$this->db->query("select client_handover.sdatet tdate, client_handover.bd_id tby from client_handover where id='$cid'");
            return $query->result();
        }
        if($stid==2){
            $query=$this->db->query("select handover_account.sdatet tdate, client_handover.bd_id tby from client_handover LEFT join handover_account on handover_account.handover_id=client_handover.id LEFT join fm_timeline on fm_timeline.handover_id=client_handover.id where client_handover.id='$cid'");
            return $query->result();
        }
        if($stid==3){
            $query=$this->db->query("select client_handover.haprdt tdate, client_handover.haby tby from client_handover LEFT join handover_account on handover_account.handover_id=client_handover.id LEFT join fm_timeline on fm_timeline.handover_id=client_handover.id where client_handover.id='$cid'");
            return $query->result();
        }
        if($stid==4){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='4' and cid='$cid'");
            return $query->result();
        }
        if($stid==5){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='5' and cid='$cid'");
            return $query->result();
        }
        if($stid==6){
            $query=$this->db->query("select joincall.startt tdate, joincall.createdby tby from joincall LEFT JOIN client_handover ON client_handover.projectcode=joincall.projectcode WHERE client_handover.id='$cid'");
            return $query->result();
        }
        if($stid==7){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='7' and cid='$cid'");
            return $query->result();
        }
        if($stid==8){
            $query=$this->db->query("SELECT sdatet tdate,bd_name tby FROM bdrequest WHERE id='$cid'");
            return $query->result();
        }
        if($stid==9){
            $query=$this->db->query("SELECT sdatet tdate,tby FROM bdrequestlog WHERE tid='$cid' and status='3'");
            return $query->result();
        }
        if($stid==10){
            $query=$this->db->query("SELECT sdatet tdate, tby FROM bdrequestlog WHERE tid='$cid' and status='4'");
            return $query->result();
        }
        if($stid==11){
            $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) tby,max(plantask.donet) tdate FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id LEFT JOIN user_detail on user_detail.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_subtype='School Identification' and task_type='Call' and spd.spdident='$cid' and plantask.tdone='1'");
            return $query->result();
        }
        if($stid==12){
            $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) tby,max(plantask.donet) tdate FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id LEFT JOIN user_detail on user_detail.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_subtype='School Identification' and task_type='Visit' and spd.spdident='$cid' and plantask.tdone='1'");
            return $query->result();
        }
        if($stid==13){
            $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) tby,max(plantask.donet) tdate FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id LEFT JOIN user_detail on user_detail.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE checklist='page57' and spd.spdident='$cid' and plantask.tdone='1'");
            return $query->result();
        }
        if($stid==14){
            $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) tby,max(plantask.donet) tdate FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id LEFT JOIN user_detail on user_detail.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE checklist='page57' and spd.spdident='$cid' and plantask.tdone='1'");
            return $query->result();
        }
        if($stid==15){
            $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) tby,max(plantask.donet) tdate FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id LEFT JOIN user_detail on user_detail.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_subtype='School Identification' and task_type='Call' and spd.spdident='$cid' and plantask.tdone='1'");
            return $query->result();
        }
        if($stid==16){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='17' and cid='$cid'");
            return $query->result();
        }
        if($stid==17){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='17' and cid='$cid'");
            return $query->result();
        }
         if($stid==18){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='18' and cid='$cid'");
            return $query->result();
        }
         if($stid==19){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='19' and cid='$cid'");
            return $query->result();
        }
        if($stid==21){
            $query=$this->db->query("select handoverlog.sdatet tdate, handoverlog.taskby tby from handoverlog where stid='21' and cid='$cid'");
            return $query->result();
        }
        if($stid==22){
            $query=$db2->query("SELECT MAX(workclose.closet) tdate, GROUP_CONCAT(DISTINCT dailywork.user_name) tby FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and wclose='3' and model_name='Backdrop Printing'");
            return $query->result();
        }
        if($stid==23){
            $query=$db2->query("SELECT MAX(workclose.closet) tdate, GROUP_CONCAT(DISTINCT dailywork.user_name) tby FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and wclose='3' and model_name='User Manual Printing'");
            return $query->result();
        }
        if($stid==24){
            $query=$db2->query("SELECT MAX(workclose.closet) tdate, GROUP_CONCAT(DISTINCT dailywork.user_name) tby FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and wclose='3' and model_name='Training Manual Printing'");
            return $query->result();
        }
        if($stid==25){
            $query=$db2->query("SELECT MAX(sdate) tdate, 'Ajinkya' AS tby FROM purreq WHERE batchno='$pcode'");
            return $query->result();
        }
        if($stid==26){
            $query=$db2->query("SELECT assign_dt AS tdate, 'FM, Wahid' AS tby FROM sub_task WHERE project_code='$pcode' and tasktype='Packing';");
            return $query->result();
        }
        if($stid==27){
            $query=$db2->query("SELECT MAX(unique_model.packdt) tdate,GROUP_CONCAT(DISTINCT dailywork.user_name) AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box A Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==28){
            $query=$db2->query("SELECT MAX(unique_model.packdt) tdate,GROUP_CONCAT(DISTINCT dailywork.user_name) AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box B Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==29){
            $query=$db2->query("SELECT MAX(unique_model.packdt) tdate,GROUP_CONCAT(DISTINCT dailywork.user_name) AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box C Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==30){
            $query=$db2->query("SELECT MAX(unique_model.packdt) tdate,GROUP_CONCAT(DISTINCT dailywork.user_name) AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box MS Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==33){
            $query=$db2->query("SELECT assign_dt AS tdate, 'FM, Wahid' AS tby FROM sub_task WHERE project_code='$pcode' and tasktype='Dispatch';");
            return $query->result();
        }
        if($stid==34){
            $query=$db2->query("SELECT MAX(unique_model.dispatchdt) tdate,'QPD Admin, Sayali' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box A Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==35){
            $query=$db2->query("SELECT MAX(unique_model.dispatchdt) tdate,'QPD Admin, Sayali' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box B Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==36){
            $query=$db2->query("SELECT MAX(unique_model.dispatchdt) tdate,'QPD Admin, Sayali' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box C Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==37){
            $query=$db2->query("SELECT MAX(unique_model.dispatchdt) tdate,'QPD Admin, Sayali' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box MS Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==38){
            $query=$db3->query("SELECT MAX(sdatet) tdate,'Ajinkya' AS tby FROM spdlogic WHERE project_code='$pcode'");
            return $query->result();
        }
        if($stid==39){
            $query=$db2->query("SELECT MAX(sdatet) tdate,'Omkar' AS tby  FROM dewaybill WHERE project_code='$pcode'");
            return $query->result();
        }
        if($stid==40){
            $query=$db2->query("SELECT MAX(unique_model.deliverydt) tdate,'QPD Admin, Sayali' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box MS Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==41){
            $query=$db2->query("SELECT MAX(unique_model.deliverydt) tdate,'NO DATA' AS tby FROM dailywork LEFT JOIN unique_model ON unique_model.workid=dailywork.id  WHERE dailywork.batchno='$pcode' and model_name='MSC Set Box Packaging' and process_name='Box MS Packaging' and wclose='3'");
            return $query->result();
        }
        if($stid==42){
            $query=$db3->query("SELECT MAX(plandate) tdate,GROUP_CONCAT(user_detail.fullname) AS tby FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.project_code='$pcode' and task_assign.checklist='page59'");
            return $query->result();
        }
    }
    public function get_BDRBoxONB2($uid){
        $query=$this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest where onnew='1' and status='1' GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_BDRBoxNC2($uid){
       $query=$this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest where  onnew='2' and status='1' GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_BDRBoxONB1($uid){
         $query=$this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest where  onnew='1' and status='0' GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_BDRBoxNC1($uid){
         $query=$this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest where  onnew='2' and status='0' GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_tidrid($tid){
        $query=$this->db->query("SELECT * FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN taskdetail ON taskdetail.page=task_assign.checklist LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.taskid='$tid'");
        return $query->result();
    }
    public function get_pigg1($piid){
        $query=$this->db->query("SELECT * FROM academiccalendar WHERE piaid='$piid'");
        return $query->result();
    }
    public function get_pig1($piid){
        $query=$this->db->query("SELECT type,GROUP_CONCAT(remark) gcremark,SUM(DATEDIFF(todate,fdate)) cont FROM academiccalendar WHERE piaid='$piid' GROUP BY type");
        return $query->result();
    }
    public function get_pig2($piid){
        $query=$this->db->query("SELECT cast(fdate as DATE) sdatet, cast(todate as DATE) todate, DATEDIFF(todate,fdate) dated FROM `academiccalendar` WHERE piaid='$piid' GROUP BY fdate,todate");
        return $query->result();
    }
    public function get_pig3($piid){
        $query=$this->db->query("SELECT state,sum(DATEDIFF(todate,fdate)) cont, count(spd.id) scount FROM academiccalendar LEFT JOIN spd ON spd.sstate=academiccalendar.state where  state!='' GROUP BY state");
        return $query->result();
    }
    public function get_pig4($piid,$m,$y){
        $query=$this->db->query("SELECT DATEDIFF(todate,fdate) days FROM academiccalendar where piaid='$piid' and MONTH(fdate)='$m' and Year(fdate)='$y'");
        return $query->result();
    }
    public function get_pig4c1($piid,$m,$y,$type){
        $query=$this->db->query("SELECT DATEDIFF(todate,fdate) days FROM academiccalendar where piaid='$piid' and MONTH(fdate)='$m' and Year(fdate)='$y' and type='$type'");
        return $query->result();
    }
    public function get_holitype($piid){
        $query=$this->db->query("SELECT type FROM academiccalendar where piaid='$piid'  group by type");
        return $query->result();
    }
    public function get_pig5($piid){
        $query=$this->db->query("SELECT count(distinct state) state, (SELECT count(distinct sstate) FROM spd WHERE pi_id='$piid') spdstate FROM academiccalendar where piaid='$piid'");
        return $query->result();
    }
    public function get_fbackdrop($pcode,$process,$part){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT dailywork.video,workclose.user_name,process_name,workclose.startt,workclose.closet FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and model_name='Backdrop Printing'");
        return $query->result();
    }
     public function get_fusermanual($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT dailywork.video,workclose.user_name,model_name,process_name,workclose.startt,workclose.closet FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and model_name='User Manual Printing'");
        return $query->result();
    }
    public function get_ftrainingmanual($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT dailywork.video,workclose.user_name,model_name,process_name,workclose.startt,workclose.closet FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and model_name='Training Manual Printing'");
        return $query->result();
    }
     public function get_fpur($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `purreq` WHERE batchno='$pcode'");
        return $query->result();
    }
    public function get_fprepairing($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `boxpreparing` WHERE project='$pcode'");
        return $query->result();
    }
    public function get_fpacking($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `unique_model` WHERE project='$pcode' ORDER BY `unique_model`.`fgpackimg` DESC");
        return $query->result();
    }
     public function get_School($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_installreview($pcode){
        $query=$this->db->query("SELECT * FROM `task_assign`  left join user_detail on user_detail.id=task_assign.from_user WHERE task_type='Review' and task_subtype='Installation Report Review' and project_code='$pcode';");
        return $query->result();
    }
    public function get_SchoolDvisit($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_SchoolIvisit($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_inastallationschoolvisit($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_SchoolIcall($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_SchoolRcall($pcode){
        $query=$this->db->query("SELECT spd.id sid,spd.updateddt spdudt,status.name stname,u1.fullname pia,u2.fullname imp,spd.*,client_handover.* FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE client_handover.id and project_code='$pcode';");
        return $query->result();
    }
    public function get_Dispatchdetail($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM unique_model where project='$pcode' and dispatchdt is not null ORDER BY `unique_model`.`dispatchdt` ASC");
        return $query->result();
    }
    public function get_Logesticinfo($pcode){
        $query=$this->db->query("SELECT * FROM `spdlogic` where project_code='$pcode'");
        return $query->result();
    }
    public function get_ewaybillinfo($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `dewaybill` where project_code='$pcode'");
        return $query->result();
    }
    public function get_deliveryprocess($pcode){
        $query=$this->db->query("SELECT * FROM `deliveryv` where projectcode='$pcode'");
        return $query->result();
    }
    public function get_donedelivery($pcode){
        $query=$this->db->query("SELECT * FROM `visitstupdate` where projectcode='$pcode'");
        return $query->result();
    }
     public function get_spd(){
        $query=$this->db->query("select * from spd");
        return $query->result();
    }
    public function get_bdtaskbybdrid($rid){
        $query=$this->db->query("SELECT MAX(bdtask.startt) asdate, GROUP_CONCAT(u1.fullname) pianame, GROUP_CONCAT(u2.fullname) assignby FROM bdtask LEFT JOIN user_detail u1 ON u1.id=bdtask.uid LEFT JOIN user_detail u2 ON u2.id=bdtask.fid WHERE tid='$rid'");
        return $query->result();
    }
    public function get_visitsbybdrid($rid){
        $query=$this->db->query("SELECT *,task_assign.id ttid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail u1 ON u1.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_assign.checklist='page55' and action='Visit' and spd.spdident='$rid'");
        return $query->result();
    }
    public function get_callsbybdrid($rid){
        $query=$this->db->query("SELECT *,task_assign.id ttid,spd.id sid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail u1 ON u1.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_assign.checklist='page55' and action='Call' and spd.spdident='$rid'");
        return $query->result();
    }
    public function get_researchbybdrid($rid){
        $query=$this->db->query("SELECT *,task_assign.id ttid,spd.id sid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail u1 ON u1.id=plantask.user_id LEFT JOIN spd ON spd.id=task_assign.spd_id WHERE task_assign.checklist='page55' and action='Research' and spd.spdident='$rid'");
        return $query->result();
    }
    public function get_bdrequestlog($tid){
        // $query=$this->db->query("SELECT * FROM bdrequestlog WHERE tid='$tid'");
        $query=$this->db->query("SELECT bdrequestlog.*,user_detail.fullname FROM bdrequestlog LEFT JOIN user_detail on bdrequestlog.tby=user_detail.id WHERE tid='$tid'");
        return $query->result();
    }
    public function get_ptcase1($uid){
        $query=$this->db->query("SELECT *,spd.id sid FROM spd WHERE id IN(SELECT DISTINCT spd.id spdid FROM spd LEFT JOIN task_assign ON spd.id = task_assign.spd_id AND task_assign.task_type = 'Utilisation' AND DATEDIFF(NOW(), CAST(task_assign.sdatet AS DATE)) <= 15 WHERE spd.pi_id = '$uid' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL)");
        return $query->result();
    }
    public function get_ptcase1g1($uid){
        $query=$this->db->query("SELECT status.id stid, status.name,COUNT(*) cont FROM spd LEFT JOIN status ON status.id=spd.status WHERE spd.id IN(SELECT DISTINCT spd.id spdid FROM spd LEFT JOIN task_assign ON spd.id = task_assign.spd_id AND task_assign.task_type = 'Utilisation' AND DATEDIFF(NOW(), CAST(task_assign.sdatet AS DATE)) <= 15 WHERE spd.pi_id = '$uid' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL) GROUP BY status.name,status.id");
        return $query->result();
    }
    public function get_ptcase1g2($uid){
        $query=$this->db->query("SELECT client_handover.project_year pyear,COUNT(*) cont FROM spd LEFT join client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE spd.id IN(SELECT DISTINCT spd.id spdid FROM spd LEFT JOIN task_assign ON spd.id = task_assign.spd_id AND task_assign.task_type = 'Utilisation' AND DATEDIFF(NOW(), CAST(task_assign.sdatet AS DATE)) <= 15 WHERE spd.pi_id = '$uid' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL) GROUP BY client_handover.project_year;");
        return $query->result();
    }
    public function get_ptcase1g3($uid){
        $query=$this->db->query("SELECT client_handover.projectcode pcode,COUNT(*) cont FROM spd LEFT join client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN status ON status.id=spd.status WHERE spd.id IN(SELECT DISTINCT spd.id spdid FROM spd LEFT JOIN task_assign ON spd.id = task_assign.spd_id AND task_assign.task_type = 'Utilisation' AND DATEDIFF(NOW(), CAST(task_assign.sdatet AS DATE)) <= 15 WHERE spd.pi_id = '$uid' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL) GROUP BY client_handover.projectcode");
        return $query->result();
    }
    public function get_ptcase1g4($i){
        if($i=='0'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='1'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='2'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload FTTP Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='3'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload RTTP Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='4'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='5'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='6'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='7'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='8'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload DIY Report' AND CAST(donet AS DATE) < NOW())) done FROM schooltimeline WHERE diy < NOW();");
            return $query->result();
        }
        if($i=='9'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(blmne AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='10'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND task_assign.task_subtype='Upload M&E Report' AND CAST(elmne AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
        if($i=='11'){
        $query=$this->db->query("SELECT COUNT(sid) traget, COUNT( (SELECT DISTINCT sid FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE plantask.spd_id = schooltimeline.sid AND action='utilisation' AND CAST(utilisation AS DATE) < NOW())) done FROM schooltimeline WHERE elmne < NOW();");
            return $query->result();
        }
    }
    public function get_ptcase2($uid){
        $query=$this->db->query("SELECT *,spd.id sid FROM spd WHERE id IN(SELECT DISTINCT spd.id AS spdid FROM spd LEFT JOIN schooltimeline ON schooltimeline.sid = spd.id LEFT JOIN task_assign ON task_assign.spd_id = spd.id AND task_assign.checklist = 'page30' WHERE spd.pi_id = '$uid' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL AND schooltimeline.rttp < NOW())");
        return $query->result();
    }
    public function get_ptcase3($uid){
        $query=$this->db->query("SELECT *,spd.id sid FROM spd WHERE id IN(SELECT DISTINCT spd.id AS spdid FROM spd LEFT JOIN schooltimeline ON schooltimeline.sid = spd.id LEFT JOIN task_assign ON task_assign.spd_id = spd.id AND task_assign.checklist = 'page30' WHERE spd.pi_id = '8' AND spd.pm_apr = '1' AND task_assign.spd_id IS NULL AND cast(schooltimeline.rttp as DATE ) BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 Week))");
        return $query->result();
    }
    public function get_budget($cid){
        $query=$this->db->query("SELECT bname FROM budget WHERE cid='$cid' and basic!='' and bname!='TOTAL'");
        return $query->result();
    }
    public function get_tpdetail($piaid){
        $query=$this->db->query("SELECT * FROM tpdetail WHERE piaid='$piaid'");
        return $query->result();
    }
    public function add_tp($piaid,$person_name,$phone_number,$email_address,$address,$city,$district,$state,$qualification,$remark,$cluster){
        $query=$this->db->query("INSERT INTO tpdetail(piaid, person_name, phone_number, email_address, address, city, state, qualification, remark, district,cluster)
        VALUES ('$piaid','$person_name','$phone_number','$email_address','$address','$city','$district','$state','$qualification','$remark','$cluster')");
    }
    public function get_deliveryv(){
        $query=$this->db->query("SELECT * FROM deliveryv WHERE receiveby is null");
        return $query->result();
    }
    public function get_delv($uid){
        $query=$this->db->query("SELECT * FROM deliveryv WHERE receiveby='$uid' limit 1");
        return $query->result();
    }
    public function get_InTBSchedule(){
        $query=$this->db->query("SELECT user_detail.fullname,user_detail.id piid, COUNT(task_assign.to_user) AS task_count FROM user_detail LEFT JOIN task_assign ON user_detail.id = task_assign.to_user AND task_assign.plan = '0' GROUP BY user_detail.fullname, user_detail.id HAVING COUNT(task_assign.to_user) > 0 ORDER BY user_detail.fullname ASC");
        return $query->result();
    }
    public function get_InTBSchedule1($piid){
        $query=$this->db->query("SELECT *,s1.name cstatus, s2.name lystatus,(SELECT MAX(plantask.taskid) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1') ltid FROM user_detail LEFT JOIN task_assign ON user_detail.id = task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status s1 ON s1.id=spd.status LEFT JOIN status s2 ON s2.id=spd.lystatus where user_detail.id='$piid' AND task_assign.plan = '0'");
        return $query->result();
    }
    public function get_TaskPBNS(){
        $query=$this->db->query("SELECT user_detail.fullname,user_detail.id piid, COUNT(plantask.user_id) AS task_count FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.initiateddt is null and plantask.tdone='0' and user_detail.fullname is not null GROUP BY user_detail.fullname, user_detail.id HAVING COUNT(plantask.user_id) > 0 ORDER BY user_detail.fullname ASC");
        return $query->result();
    }
    public function get_TaskPBNS1($piid){
        $query=$this->db->query("SELECT *,s1.name cstatus, s2.name lystatus,(SELECT MAX(plantask.taskid) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1') ltid FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON plantask.taskid = task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status s1 ON s1.id=spd.status LEFT JOIN status s2 ON s2.id=spd.lystatus where user_detail.id='$piid' and plantask.initiateddt is null and plantask.tdone='0'");
        return $query->result();
    }
    public function get_TaskSBNC(){
        $query=$this->db->query("SELECT user_detail.fullname,user_detail.id piid, COUNT(plantask.user_id) AS task_count FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.user_id=user_detail.id AND plantask.initiateddt is not null and plantask.tdone='0' GROUP BY user_detail.fullname, user_detail.id HAVING COUNT(plantask.user_id) > 0 ORDER BY user_detail.fullname ASC");
        return $query->result();
    }
    public function get_TaskSBNC1($piid){
        $query=$this->db->query("SELECT *,s1.name cstatus,task_assign.id tid, s2.name lystatus,(SELECT MAX(plantask.taskid) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1') ltid FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON plantask.taskid = task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status s1 ON s1.id=spd.status LEFT JOIN status s2 ON s2.id=spd.lystatus where plantask.initiateddt is not null and plantask.tdone='0' and user_detail.id='$piid'");
        return $query->result();
    }
    public function get_TaskCBNR(){
        $query=$this->db->query("SELECT user_detail.fullname,user_detail.id piid, COUNT(plantask.user_id) AS task_count FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.user_id=user_detail.id AND plantask.tdone='1' and plantask.reviewdt is null GROUP BY user_detail.fullname, user_detail.id HAVING COUNT(plantask.user_id) > 0 ORDER BY user_detail.fullname ASC");
        return $query->result();
    }
    public function get_TaskCBNR1($piid){
        $query=$this->db->query("SELECT *,s1.name cstatus,task_assign.id tid, s2.name lystatus,(SELECT MAX(plantask.taskid) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1') ltid FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON plantask.taskid = task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status s1 ON s1.id=spd.status LEFT JOIN status s2 ON s2.id=spd.lystatus where plantask.tdone='1' and plantask.reviewdt is null and user_detail.id='$piid'");
        return $query->result();
    }
    public function get_TaskSBNGU(){
        $query=$this->db->query("SELECT user_detail.fullname,user_detail.id piid, COUNT(plantask.user_id) AS task_count FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.user_id=user_detail.id AND plantask.tdone='0' and plantask.initiateddt is not null and DATE_ADD(updatedt, INTERVAL 10 MINUTE) < NOW() GROUP BY user_detail.fullname, user_detail.id HAVING COUNT(plantask.user_id) >0 ORDER BY user_detail.fullname ASC");
        return $query->result();
    }
    public function get_TaskSBNGU1($piid){
        $query=$this->db->query("SELECT *,s1.name cstatus,task_assign.id tid, s2.name lystatus,(SELECT MAX(plantask.taskid) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1') ltid FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON plantask.taskid = task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status s1 ON s1.id=spd.status LEFT JOIN status s2 ON s2.id=spd.lystatus where plantask.tdone='0' and plantask.initiateddt is not null and DATE_ADD(updatedt, INTERVAL 10 MINUTE) < NOW() and user_detail.id='$piid'");
        return $query->result();
    }
    public function get_NWB15DB1(){
        $query=$this->db->query("SELECT user_detail.fullname, COUNT(*) as count_spd, spd.pi_id as piid, (SELECT COUNT(*) FROM spd c LEFT JOIN ( SELECT plantask.spd_id, MAX(plantask.plandate) as last_task_date FROM plantask LEFT JOIN spd ON plantask.spd_id = spd.id GROUP BY plantask.spd_id ) t ON c.id = t.spd_id WHERE c.pi_id = piid AND (t.last_task_date IS NULL OR t.last_task_date <= NOW() - INTERVAL 15 DAY) ) as cont FROM spd LEFT JOIN user_detail ON user_detail.id = spd.pi_id WHERE spd.pm_apr = '1' AND spd.pi_id != '' AND spd.project_code IS NOT NULL GROUP BY user_detail.fullname, spd.pi_id");
        return $query->result();
    }
    public function get_NWB15DB2($pia){
        $query=$this->db->query("SELECT c.id sid, c.sname FROM spd c LEFT JOIN ( SELECT plantask.spd_id, MAX(plantask.plandate) as last_task_date FROM plantask LEFT JOIN spd ON plantask.spd_id=spd.id WHERE spd.pi_id='$pia' GROUP BY plantask.spd_id ) t ON c.id = t.spd_id WHERE c.pi_id='$pia' and t.last_task_date IS NULL OR t.last_task_date <= NOW() - INTERVAL 15 DAY;");
        return $query->result();
    }
    public function get_allbdbypia($piid){
        $query=$this->db->query("SELECT bd_id, COUNT(*) cont, count(case when allinsdone='1' then allinsdone='1' end) insdone, count(case when allinsdone='0' then allinsdone='0' end) inspen FROM client_handover where projectcode IN (select project_code from spd where spd.pi_id='$piid') and bd_id!='' GROUP BY bd_id");
        return $query->result();
    }
    public function get_allbd(){
        $query=$this->db->query("SELECT bd_id, COUNT(*) cont, count(case when allinsdone='1' then allinsdone='1' end) insdone, count(case when allinsdone='0' then allinsdone='0' end) inspen FROM client_handover where bd_id!='' GROUP BY bd_id");
        return $query->result();
    }
    public function get_yearbybd($bdid){
        $query=$this->db->query("SELECT client_handover.project_year,count(*) cont  FROM spd LEFT JOIN client_handover on spd.project_code = client_handover.projectcode WHERE client_handover.bd_id='$bdid' and client_handover.project_year!=''  group by client_handover.project_year ORDER BY `client_handover`.`project_year` DESC");
        return $query->result();
    }
    public function get_schoolbycid($cid){
        $query=$this->db->query("SELECT * FROM spd left join spd_contact on spd_contact.sid=spd.id WHERE cid='$cid'");
        return $query->result();
    }
    public function get_schoolbycode($uid,$stid,$code){
        if($code==1){
            if($stid==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, status.name stname,spd.id spdid FROM spd LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE spd.status='$stid' and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_schoolbycode1($uid,$ctid,$code){
        if($code==1){
            if($ctid==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, city.cityname scname,spd.id spdid FROM spd LEFT JOIN city ON city.cityname=spd.scity LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE city.id ='$ctid' and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_schoolbycode2($uid,$clid,$code){
        if($code==1){
            if($clid==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, client_handover.client_name clname,spd.id spdid FROM spd LEFT JOIN client_handover ON client_handover.client_name=spd.clientname LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE client_handover.id='$clid' and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_schoolbycode3($uid,$stid,$code){
        if($code==1){
            if($stid==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, state.statename stname, status.name stname, spd.id spdid FROM spd LEFT JOIN state ON state.statename=spd.sstate LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE state.id='$stid' and pi_id='$uid' and pm_apr='1';");}
        }
        return $query->result();
    }
    public function get_schoolbycode4($uid,$sayear,$code){
        if($code==1){
            if($sayear==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT spd.*, u2.fullname AS insname, u1.fullname AS pianame, client_handover.project_year AS pyear, spd.id spdid, status.name AS stname FROM spd INNER JOIN client_handover ON client_handover.client_name = spd.clientname INNER JOIN status ON status.id = spd.status INNER JOIN user_detail u1 ON u1.id = spd.pi_id INNER JOIN user_detail u2 ON u2.id = spd.ins_id WHERE spd.sayear = '$sayear' AND spd.pi_id = '$uid' AND spd.pm_apr = '1' ;");}
        }
        return $query->result();
    }
    public function get_schoolbycode5($uid,$plyear,$code){
        if($code==1){
            if($plyear==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, client_handover.project_year pyear,spd.id spdid, status.name stname FROM spd LEFT JOIN client_handover ON client_handover.client_name=spd.clientname LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE client_handover.project_year='$plyear' and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_schoolbycode6($uid,$total_teachers,$code){
        if($code==1){
            if($total_teachers==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame, client_handover.project_year pyear,spd.id spdid, status.name stname FROM spd LEFT JOIN client_handover ON client_handover.client_name=spd.clientname LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE spd.total_teachers ='$total_teachers'  and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_schoolbycode7($uid,$total_students,$code){
        if($code==1){
            if($total_students==0){$query=$this->db->query("SELECT * FROM spd WHERE pi_id='$uid' and pm_apr='1'");}
            else{$query=$this->db->query("SELECT *,u2.fullname insname, u1.fullname pianame,spd.id spdid, status.name stname FROM spd LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE spd.total_students ='$total_students' and pi_id='$uid' and pm_apr='1'");}
        }
        return $query->result();
    }
    public function get_lasttask($spdid){
        $query=$this->db->query("SELECT donet taskdate,action,user_detail.fullname taskby  FROM plantask LEFT join user_detail ON user_detail.id=plantask.user_id WHERE plantask.id=(SELECT id FROM plantask WHERE spd_id = '$spdid' AND donet = (SELECT MAX(donet) FROM plantask WHERE spd_id = '$spdid' AND donet IS NOT NULL))");
        return $query->result();
    }
    public function get_HoliPPIA(){
        $query=$this->db->query("SELECT COUNT(DISTINCT piaid) hplan, (SELECT COUNT(*) FROM user_detail WHERE user_detail.dep_id='2') pias FROM academiccalendar");
        return $query->result();
    }
    public function get_HoliState(){
        $query=$this->db->query("SELECT count(DISTINCT state) cont1, (SELECT count(DISTINCT sstate) FROM spd) cont2 FROM academiccalendar");
        return $query->result();
    }
    public function get_HoliDaysType(){
        $query=$this->db->query("SELECT type, SUM(DATEDIFF(todate,fdate)) cont FROM academiccalendar GROUP BY type");
        return $query->result();
    }
    public function get_HoliCheck(){
        $query=$this->db->query("SELECT count(case when checkdt is not null then 1 end) cont1, count(case when checkdt is null then 1 end) cont2 FROM academiccalendar;");
        return $query->result();
    }
    public function get_SPDbypistatusw($uid){
        $query=$this->db->query("SELECT status.clr sclr, status.id stid, status.name,COUNT(*) cont FROM spd LEFT JOIN status ON status.id=spd.status where pi_id='$uid' and pm_apr='1'  GROUP BY status.name,status.id,status.clr");
        return $query->result();
    }
    public function get_SPDbypicityw($uid){
        $query=$this->db->query("SELECT city.id AS ctid, city.cityname, COUNT(*) AS cont FROM spd LEFT JOIN city ON city.cityname = spd.scity WHERE pi_id = '$uid' AND pm_apr = '1' GROUP BY ctid, cityname;");
        return $query->result();
    }
    public function get_SPDbypiclientw($uid){
        $query=$this->db->query("SELECT client_handover.id AS clid, client_handover.client_name as clientname, COUNT(*) AS cont FROM spd LEFT JOIN client_handover ON client_handover.client_name = spd.clientname WHERE pi_id = '$uid' AND pm_apr = '1' GROUP BY clid, clientname;");
        return $query->result();
    }
    public function get_SPDbypistatew($uid){
        $query=$this->db->query("SELECT state.id stid, state.statename,COUNT(*) cont FROM spd LEFT JOIN state ON state.statename=spd.sstate where pi_id='$uid' and pm_apr='1'  GROUP BY state.statename,state.id");
        return $query->result();
    }
    public function get_SPDbypisyearw($uid){
        $query=$this->db->query("SELECT  client_handover.project_year project_year,COUNT(*) cont FROM spd LEFT join client_handover ON client_handover.projectcode=spd.project_code WHERE pi_id='$uid' GROUP BY client_handover.project_year;");
        return $query->result();
    }
    public function get_SPDbypipyearw($uid){
        $query=$this->db->query("SELECT client_handover.project_year project_year,COUNT(DISTINCT project_code) cont FROM spd LEFT join client_handover ON client_handover.projectcode=spd.project_code WHERE pi_id='$uid' GROUP BY client_handover.project_year");
        return $query->result();
    }
    public function get_SPDbypisteacherw($uid){
        $query=$this->db->query("SELECT total_teachers, COUNT(sname) AS sname_count FROM spd WHERE pi_id = '$uid'GROUP BY total_teachers;");
        return $query->result();
    }
    public function get_SPDbypisstudentw($uid){
        $query=$this->db->query("SELECT total_students, COUNT(sname) AS sname_count FROM spd WHERE pi_id = '$uid'GROUP BY total_students;");
        return $query->result();
    }
    public function get_actionbypia($piid){
        $query=$this->db->query("SELECT DISTINCT action FROM `plantask` WHERE user_id = '$piid'");
        return $query->result();
    }
    public function get_actionbypiapm($uid){
        $query=$this->db->query("SELECT DISTINCT action FROM `plantask` WHERE user_id = '$uid'");
        return $query->result();
    }
    public function get_spdidbypia($spdid){
        $query=$this->db->query("SELECT DISTINCT spd FROM `plantask` WHERE user_id = '$piid'");
        return $query->result();
    }
    public function get_apiabyym($uid,$m,$y){
    $query=$this->db->query("SELECT COUNT(*) as cont,
    COUNT(CASE WHEN action.id = '1' THEN 1 ELSE NULL END) as a,
    COUNT(CASE WHEN action.id = '2' THEN 1 ELSE NULL END) as b,
    COUNT(CASE WHEN action.id = '3' THEN 1 ELSE NULL END) as c,
    COUNT(CASE WHEN action.id = '4' THEN 1 ELSE NULL END) as d,
    COUNT(CASE WHEN action.id = '5' THEN 1 ELSE NULL END) as e,
    COUNT(CASE WHEN action.id = '6' THEN 1 ELSE NULL END) as f,
    COUNT(CASE WHEN action.id = '7' THEN 1 ELSE NULL END) as g,
    COUNT(CASE WHEN action.id = '8' THEN 1 ELSE NULL END) as h,
    COUNT(CASE WHEN action.id = '14' THEN 1 ELSE NULL END) as i,
    COUNT(CASE WHEN action.id = '15' THEN 1 ELSE NULL END) as j,
    COUNT(CASE WHEN action.id = '16' THEN 1 ELSE NULL END) as k,
    COUNT(CASE WHEN action.id = '17' THEN 1 ELSE NULL END) as l,
    COALESCE(COUNT(CASE WHEN action.id IS NULL THEN 1 ELSE NULL END), 'null') as 'null'
    FROM plantask
    LEFT JOIN action ON action.name = plantask.action
    WHERE plantask.user_id = '$uid' AND MONTH(donet) = '$m' AND YEAR(donet) = '$y';");
        return $query->result();
    }
    public function get_apiaapbyym($piid,$y,$m,$aname){
        $query=$this->db->query("SELECT COUNT(*) cont FROM plantask WHERE user_id = '$piid' AND action ='$aname' and  MONTH(donet) = '$m' and YEAR(donet) = '$y' and actiontaken='yes' and purpose='yes'");
        return $query->result();
    }
    public function get_aypybyusergraph($uid,$tdate){
        $query=$this->db->query("SELECT pt.action,COUNT(*) AS cont FROM user_detail AS ud JOIN plantask AS pt ON ud.id = pt.user_id WHERE (ud.dep_id = '2' OR ud.dep_id = '4')  AND  CAST(pt.plandate AS DATE) = '$tdate'  AND pt.actiontaken = 'yes'   AND pt.purpose = 'yes' and pt.tdone='1' GROUP BY pt.action
ORDER BY `cont` ASC");
        return $query->result();
    }
    public function get_aypnbyusergraph($uid,$tdate){
        $query=$this->db->query("SELECT pt.action,COUNT(*) AS cont FROM user_detail AS ud JOIN plantask AS pt ON ud.id = pt.user_id WHERE (ud.dep_id = '2' OR ud.dep_id = '4')  AND  CAST(pt.plandate AS DATE) = '$tdate'  AND pt.actiontaken = 'yes'   AND pt.purpose = 'no' and pt.tdone='1' GROUP BY pt.action
ORDER BY `cont` ASC;");
        return $query->result();
    }
    public function get_anpnbyusergraph($uid,$tdate){
        $query=$this->db->query("SELECT pt.action,COUNT(*) AS cont FROM user_detail AS ud JOIN plantask AS pt ON ud.id = pt.user_id WHERE (ud.dep_id = '2' OR ud.dep_id = '4')  AND  CAST(pt.plandate AS DATE) = '2023-09-25'  AND pt.actiontaken = 'no'   AND pt.purpose = 'no' and pt.tdone='1' GROUP BY pt.action
ORDER BY `cont` ASC;");
        return $query->result();
    }
    public function get_ndtpgraph($uid,$tdate){
        $query=$this->db->query("SELECT user_detail.fullname, COUNT(*) AS task_count
FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id
  WHERE cast(plantask.plandate as DATE) = '$tdate'
GROUP BY user_detail.fullname;");
        return $query->result();
    }
    public function get_uplanbnexegraph($uid,$tdate){
        $query=$this->db->query("SELECT
  COUNT(DISTINCT user_detail.fullname) AS fullname_count,
  COUNT(CASE WHEN plantask.updatedt IS NULL THEN 1 ELSE NULL END) AS not_updatedt
FROM
  plantask
INNER JOIN
  user_detail ON user_detail.id = plantask.user_id
WHERE
  DATE(plantask.plandate) = '$tdate' AND plantask.updatedt IS NULL;");
        return $query->result();
    }
    public function get_apiaatpbyym($piid,$y,$m,$aname){
        $query=$this->db->query("SELECT COUNT(*) cont FROM plantask WHERE user_id = '$piid' AND action ='$aname' and MONTH(donet) = '$m' and YEAR(donet) = '$y' and actiontaken='yes' and purpose='no'");
        return $query->result();
    }
    public function get_apiaatpurbyym($piid,$y,$m,$aname){
        $query=$this->db->query("SELECT COUNT(*) cont FROM plantask WHERE user_id = '$piid' AND action ='$aname' and  MONTH(donet) = $m and YEAR(donet) = $y and actiontaken='no' and purpose='no'");
        return $query->result();
    }
    public function get_anpngraph($uid, $tdate, $aname){
        $query=$this->db->query("SELECT COUNT(*) AS cont
FROM plantask
WHERE user_id = '$uid'
  AND action = '$aname'
  AND CAST(plandate AS DATE) = '$tdate'
  AND actiontaken = 'no'
  AND purpose = 'no';");
        return $query->result();
    }
    public function get_tcmws($piid,$y,$m,$aname){
        $query=$this->db->query("SELECT plantask.spd_id, COUNT(*) cont FROM spd LEFT JOIN plantask ON plantask.spd_id=spd.id  WHERE spd.pi_id='$piid' AND action = 'call' AND MONTH(donet) = '$m' and YEAR(donet) = '$y' and  tdone ='1'GROUP BY  plantask.spd_id;");
        return $query->result();
    }
    public function get_atgraph($uid, $tdate){
        $query=$this->db->query("SELECT
    (SELECT COUNT(*) FROM `user_day` WHERE CAST(ustart AS DATE) = '$tdate') AS  present,
    (SELECT COUNT(*) FROM `user_detail` WHERE dep_id = '2' OR dep_id = '4') AS totalUser,
    ((SELECT COUNT(*) FROM `user_detail` WHERE dep_id = '2' OR dep_id = '4') -
     (SELECT COUNT(*) FROM `user_day` WHERE CAST(ustart AS DATE) = '$tdate')) AS Absent;");
        return $query->result();
    }
    public function get_piaatgraph($uid, $sd, $ed){
        $query=$this->db->query("SELECT
    SUM(present) AS total_present,
    SUM(totalUser) AS total_users,
    SUM(Absent) AS total_absent
FROM (
    SELECT
        (SELECT COUNT(*)
         FROM user_day
         LEFT JOIN user_detail ON user_detail.id = user_day.user_id
         WHERE CAST(user_day.ustart AS DATE) = date_range.date AND user_detail.dep_id = '2') AS present,
        (SELECT COUNT(*)
         FROM user_detail
         WHERE dep_id = '2') AS totalUser,
        ((SELECT COUNT(*)
           FROM user_detail
           WHERE dep_id = '2') - (SELECT COUNT(*)
                                 FROM user_day
                                 LEFT JOIN user_detail ON user_detail.id = user_day.user_id
                                 WHERE CAST(user_day.ustart AS DATE) = date_range.date AND user_detail.dep_id = '2')) AS Absent
    FROM (
        SELECT '$sd' + INTERVAL (t.seq) DAY AS date
        FROM (
            SELECT 0 AS seq UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10
        ) t
        WHERE '$sd' + INTERVAL (t.seq) DAY <= '$ed'
    ) AS date_range
) AS daily_counts;");
        return $query->result();
    }
    public function get_insatgraph($uid, $sd, $ed){
        $query=$this->db->query("SELECT
    SUM(present) AS total_present,
    SUM(totalUser) AS total_users,
    SUM(Absent) AS total_absent
FROM (
    SELECT
        (SELECT COUNT(*)
         FROM user_day
         LEFT JOIN user_detail ON user_detail.id = user_day.user_id
         WHERE CAST(user_day.ustart AS DATE) = date_range.date AND user_detail.dep_id = '4') AS present,
        (SELECT COUNT(*)
         FROM user_detail
         WHERE dep_id = '4') AS totalUser,
        ((SELECT COUNT(*)
           FROM user_detail
           WHERE dep_id = '4') - (SELECT COUNT(*)
                                 FROM user_day
                                 LEFT JOIN user_detail ON user_detail.id = user_day.user_id
                                 WHERE CAST(user_day.ustart AS DATE) = date_range.date AND user_detail.dep_id = '4')) AS Absent
    FROM (
        SELECT '$sd' + INTERVAL (t.seq) DAY AS date
        FROM (
            SELECT 0 AS seq UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10
        ) t
        WHERE '$sd' + INTERVAL (t.seq) DAY <= '$ed'
    ) AS date_range
) AS daily_counts;");
        return $query->result();
    }
    public function get_attimegraph($uid, $tdate){
        $query=$this->db->query("SELECT SUM(CASE WHEN cast(user_day.ustart as TIME) < '10:00:00' THEN 1 ELSE 0 END) AS lessThan10, SUM(CASE WHEN cast(user_day.ustart as TIME) >= '10:00:00' AND cast(user_day.ustart as TIME) < '10:10:00' THEN 1 ELSE 0 END) AS between0And10, SUM(CASE WHEN cast(user_day.ustart as TIME) >= '10:10:00' AND cast(user_day.ustart as TIME) < '10:20:00' THEN 1 ELSE 0 END) AS between10And20, SUM(CASE WHEN cast(user_day.ustart as TIME) >= '10:20:00' AND cast(user_day.ustart as TIME) < '10:30:00' THEN 1 ELSE 0 END) AS between20And30, SUM(CASE WHEN cast(user_day.ustart as TIME) >= '10:30:00' THEN 1 ELSE 0 END) AS moreThan30 FROM user_day WHERE cast(ustart as DATE)='$tdate';");
        return $query->result();
    }
    public function get_tntoplan($uid, $tdate){
        $query=$this->db->query("SELECT COUNT(DISTINCT task_assign.to_user) AS num_users, COUNT(*) AS task_need_plan FROM `task_assign` WHERE `plan` = '0' AND CAST(`task_date` AS DATE) = '$tdate';");
        return $query->result();
    }
    public function get_planbninsgraph($uid,$sd, $ed){
        $query=$this->db->query("SELECT
    (SELECT COUNT(*) FROM `plantask` WHERE CAST(`plandate` AS DATE) BETWEEN '$sd' AND '$ed' AND `initiateddt` IS NOT NULL) AS task_Plan_and_initiated,
    (SELECT COUNT(*) FROM `plantask` WHERE CAST(`plandate` AS DATE) BETWEEN '$sd' AND '$ed' AND `initiateddt` IS NULL) AS task_plan_but_not_initiated;");
        return $query->result();
    }
    public function get_insbnexegraph($uid,$tdate){
        $query=$this->db->query("SELECT (SELECT COUNT(*) FROM `plantask` WHERE CAST(`plandate` AS DATE) = '$tdate' AND `initiateddt` != '') AS initiate_and_Execute, COUNT(*) AS initiated_But_not_Execute FROM `plantask` WHERE CAST(`plandate` AS DATE) = '$tdate' AND `initiateddt` IS NOT NULL AND `updatedt` IS NULL;");
        return $query->result();
    }
    public function get_tpnpgraph($uid, $tdate){
        $query=$this->db->query("SELECT
    (SELECT COUNT(DISTINCT user_id) FROM `plantask` WHERE user_id IN (SELECT id FROM user_detail WHERE dep_id='2' OR dep_id='4') AND CAST(plantask.plandate AS DATE)='$tdate') AS taskPlanUserCount, (SELECT COUNT(DISTINCT ud.id) FROM user_detail ud LEFT JOIN plantask pt ON ud.id = pt.user_id AND CAST(pt.plandate AS DATE) = '$tdate' WHERE ud.dep_id IN ('2', '4') AND pt.user_id IS NULL) AS nonPlanningUsersCount;");
        return $query->result();
    }
    public function get_wtdonesdgraph($uid, $tdate){
        $query=$this->db->query("SELECT
    COUNT(DISTINCT plantask.user_id) AS num_users,  -- Count distinct user_ids in plantask
    COUNT(CASE WHEN plantask.tdone = '1' THEN 1 ELSE NULL END) AS num_tdone  -- Count tasks with tdone = '1'
FROM
    bdrequest
LEFT JOIN
    task_assign ON bdrequest.id = task_assign.spd_id
LEFT JOIN
    plantask ON task_assign.spd_id = plantask.spd_id
              AND CAST(plantask.plandate AS DATE) = '$tdate'
              AND CAST(plantask.donet AS DATE) = '$tdate';");
        return $query->result();
    }
    public function get_clientacbyid($id){
        $query=$this->db->query("select * from handover_account where handover_id='$id'");
        return $query->result();
    }
    public function get_Program($bdid){
        $query=$this->db->query("SELECT *, (SELECT COUNT(*) FROM spd WHERE spd.project_code = client_handover.projectcode) AS tspd, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE spd.project_code = client_handover.projectcode) AS pia, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.ins_id WHERE spd.project_code = client_handover.projectcode) AS imp FROM client_handover WHERE bd_id = '$bdid'  ORDER BY `client_handover`.`project_year` DESC");
        return $query->result();
    }
    public function get_Programbypi($bdid,$piid){
        $query=$this->db->query("SELECT *, (SELECT COUNT(*) FROM spd WHERE spd.project_code = client_handover.projectcode) AS tspd, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE spd.project_code = client_handover.projectcode) AS pia, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.ins_id WHERE spd.project_code = client_handover.projectcode) AS imp FROM client_handover WHERE bd_id = '$bdid' and projectcode IN (select project_code from spd where spd.pi_id='$piid')  ORDER BY client_handover.project_year DESC");
        return $query->result();
    }
    public function get_Programbypcode($pcode){
        $query=$this->db->query("SELECT *, (SELECT COUNT(*) FROM spd WHERE spd.project_code = client_handover.projectcode) AS tspd, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE spd.project_code = client_handover.projectcode) AS pia, (SELECT GROUP_CONCAT(DISTINCT user_detail.fullname) FROM spd LEFT JOIN user_detail ON user_detail.id=spd.ins_id WHERE spd.project_code = client_handover.projectcode) AS imp FROM client_handover WHERE client_handover.projectcode = '$pcode'  ORDER BY `client_handover`.`project_year` DESC");
        return $query->result();
    }
    public function get_programbypc($pcode){
        $query=$this->db->query("SELECT * FROM client_handover where projectcode='$pcode'");
        return $query->result();
    }
    public function get_ProgramCheck($pcode){
        $query=$this->db->query("SELECT * FROM spd where project_code='$pcode' and pm_apr='0'");
        return $query->result();
    }
    public function get_mytotalprogram($piid){
        $query=$this->db->query("SELECT * FROM client_handover where projectcode IN (select project_code from spd where spd.pi_id='$piid')");
        return $query->result();
    }
    public function get_mytotalprogram1($piid){
        $query=$this->db->query("SELECT * FROM client_handover where projectcode is not null and projectcode IN (select project_code from spd where spd.pi_id='$piid')");
        return $query->result();
    }
    public function get_mytotalprogram2($piid){
        $query=$this->db->query("SELECT * FROM spd where spdident='0' and spd.pi_id='$piid'");
        return $query->result();
    }
    public function get_mytotalprogram3($piid){
        $query=$this->db->query("SELECT * FROM spd where status>5 and spdident='0' and spd.pi_id='$piid'");
        return $query->result();
    }
    public function get_totalprogram(){
        $query=$this->db->query("SELECT * FROM client_handover");
        return $query->result();
    }
    public function get_totalprogram1(){
        $query=$this->db->query("SELECT * FROM client_handover where projectcode is not null");
        return $query->result();
    }
    public function get_totalprogram2(){
        $query=$this->db->query("SELECT * FROM spd where spdident='0'");
        return $query->result();
    }
    public function get_totalprogram3(){
        $query=$this->db->query("SELECT * FROM spd where status>5 and spdident='0'");
        return $query->result();
    }
    public function getlocation($uid){
        $query = $this->db->query("SELECT * FROM slocation WHERE uid='$uid'");
        return $query->result();
    }
    public function s_location($uid,$latitude,$longitude){
        $query=$this->db->query("SELECT * FROM slocation WHERE uid='$uid' and latitude = '$latitude' AND longitude = '$longitude' AND id = (SELECT MAX(id) FROM slocation)");
        $data =  $query->result();
        if (empty($data)) {
            $this->db->query("INSERT INTO slocation (latitude, longitude, uid) VALUES ('$latitude', '$longitude', '$uid')");
        }
    }
    public function get_bdrequestattech($tid){
        $query=$this->db->query("SELECT GROUP_CONCAT(attech) att FROM bdrequestlog WHERE tid='$tid' and (attech!='' or attech!=0)");
        return $query->result();
    }
    public function get_pischoollist(){
        $query=$this->db->query("SELECT user_detail.fullname,pi_id,COUNT(*) tschool,COUNT(CASE WHEN pm_apr='1' THEN pm_apr END) inspd,COUNT(CASE WHEN pm_apr='0' THEN pm_apr END) notinspd FROM spd LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE pi_id!='' and pi_id!='0' GROUP BY pi_id");
        return $query->result();
    }
    public function get_mydetail($uid){
        $query=$this->db->query("SELECT *,(SELECT GROUP_CONCAT(DISTINCT sstate) FROM spd WHERE pi_id='$uid') state,(SELECT GROUP_CONCAT(DISTINCT sdistrict) FROM spd WHERE pi_id='$uid') district,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid') spd,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='1') news,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='2') ttps,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='3') uis,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='4') avs,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='5') gos,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='6') mos,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='7') ins,(SELECT COUNT(*) FROM spd WHERE pi_id='$uid' and status='8') crs,(SELECT COUNT(DISTINCT project_code) FROM spd WHERE pi_id='$uid' and project_code is not null) pcode from user_detail LEFT JOIN department ON department.id=user_detail.dep_id where user_detail.id='$uid'");
        return $query->result();
    }
    public function get_sdetail($sid){
        $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT sstate) state, GROUP_CONCAT(DISTINCT sdistrict) district, COUNT(*) spd,COUNT(case WHEN status='1' THEN status END) news,COUNT(case WHEN status='2' THEN status END) ttps,COUNT(case WHEN status='3' THEN status END) uis,COUNT(case WHEN status='4' THEN status END) avs,COUNT(case WHEN status='5' THEN status END) gos,COUNT(case WHEN status='6' THEN status END) mos,COUNT(case WHEN status='7' THEN status END) ins,COUNT(case WHEN status='8' THEN status END) crs from spd where spd.id='$sid';");
        return $query->result();
    }
    public function get_pdetail($pcode){
        $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT sstate) state, GROUP_CONCAT(DISTINCT sdistrict) district, COUNT(*) spd,COUNT(case WHEN status='1' THEN status END) news,COUNT(case WHEN status='2' THEN status END) ttps,COUNT(case WHEN status='3' THEN status END) uis,COUNT(case WHEN status='4' THEN status END) avs,COUNT(case WHEN status='5' THEN status END) gos,COUNT(case WHEN status='6' THEN status END) mos,COUNT(case WHEN status='7' THEN status END) ins,COUNT(case WHEN status='8' THEN status END) crs from spd where spd.project_code='$pcode';");
        return $query->result();
    }
    public function get_pdtaskwise($pcode,$page,$action){
        $query=$this->db->query("SELECT count(*) cont FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.checklist='$page' and  action='$action' and tdone!='0' and task_assign.project_code='$pcode'");
        return $query->result();
    }
    public function get_sdtaskwise($sid,$page,$action){
        $query=$this->db->query("SELECT count(*) cont FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.checklist='$page' and  action='$action' and tdone!='0' and task_assign.spd_id='$sid'");
        return $query->result();
    }
    public function get_spddetail1($sid){
        $query=$this->db->query("SELECT action,COUNT(*) cont FROM plantask left join spd on spd.id=plantask.spd_id WHERE spd.id='$sid' and cast(donet as DATE)>'2023-03-31' GROUP BY action");
        return $query->result();
    }
    public function get_spddetail2($sid){
        $query=$this->db->query("SELECT task_assign.task_type tt,task_assign.task_subtype stt,COUNT(*) cont FROM plantask left join spd on spd.id=plantask.spd_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE spd.id='$sid' and task_assign.task_subtype!='' and task_assign.task_type!='' and cast(donet as DATE)>'2023-03-31' GROUP BY task_assign.task_type,task_assign.task_subtype");
        return $query->result();
    }
    public function get_spddetail3($sid){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE spd.id='$sid' and task_assign.task_subtype!='' and task_assign.task_type!='' and cast(donet as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_spddetail4($sid){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE spd.id='$sid' and task_assign.task_subtype!='' and task_assign.task_type!='' and donet is null and cast(plandate as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_programdetail1($pcode){
        $query=$this->db->query("SELECT action,COUNT(*) cont FROM plantask left join spd on spd.id=plantask.spd_id WHERE spd.project_code='$pcode' and cast(donet as DATE)>'2023-03-31' GROUP BY action");
        return $query->result();
    }
    public function get_programdetail2($pcode){
        $query=$this->db->query("SELECT task_assign.task_type tt,task_assign.task_subtype stt,COUNT(*) cont FROM plantask left join spd on spd.id=plantask.spd_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE spd.project_code='$pcode' and task_assign.task_subtype!='' and task_assign.task_type!='' and cast(donet as DATE)>'2023-03-31' GROUP BY task_assign.task_type,task_assign.task_subtype");
        return $query->result();
    }
    public function get_programdetail3($pcode){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE spd.project_code='$pcode' and task_assign.task_subtype!='' and task_assign.task_type!='' and cast(donet as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_programdetail4($pcode){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE spd.project_code='$pcode' and task_assign.task_subtype!='' and task_assign.task_type!='' and donet is null and cast(plandate as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_mytaskdbydate1($uid,$date){
        $query=$this->db->query("SELECT action,COUNT(*) cont FROM plantask WHERE user_id='$uid' and cast(donet as DATE)='$date' GROUP BY action");
        return $query->result();
    }
    public function get_mytaskdbydate2($uid,$date){
        $query=$this->db->query("SELECT task_assign.task_type tt,task_assign.task_subtype stt,COUNT(*) cont FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.task_subtype!='' and task_assign.task_type!='' and user_id='$uid' and cast(donet as DATE)='$date' GROUP BY task_assign.task_type,task_assign.task_subtype");
        return $query->result();
    }
    public function get_mytaskdetail1($uid){
        $query=$this->db->query("SELECT action,COUNT(*) cont FROM plantask WHERE user_id='$uid' and cast(donet as DATE)>'2023-03-31' GROUP BY action");
        return $query->result();
    }
    public function get_mytaskdetail2($uid){
        $query=$this->db->query("SELECT task_assign.task_type tt,task_assign.task_subtype stt,COUNT(*) cont FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.task_subtype!='' and task_assign.task_type!='' and user_id='$uid' and cast(donet as DATE)>'2023-03-31' GROUP BY task_assign.task_type,task_assign.task_subtype");
        return $query->result();
    }
    public function get_mytaskdetail3($uid){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE task_assign.task_subtype!='' and task_assign.task_type!='' and user_id='$uid' and cast(donet as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_mytaskdetail4($uid){
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status WHERE task_assign.task_subtype!='' and task_assign.task_type!='' and user_id='$uid' and donet is null and cast(plandate as DATE)>'2023-03-31'");
        return $query->result();
    }
    public function get_mytdbwdate1($uid,$sd,$ed){
        $query=$this->db->query("SELECT action,COUNT(*) cont FROM plantask WHERE user_id='$uid' and donet is null and cast(plandate as DATE) between '$sd' and '$ed' GROUP BY action");
        return $query->result();
    }
    public function get_mytdbwdate2($uid,$sd,$ed){
        $query=$this->db->query("SELECT task_assign.task_type tt,task_assign.task_subtype stt,COUNT(*) cont FROM plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid WHERE task_assign.task_subtype!='' and task_assign.task_type!='' and user_id='$uid' and donet is null and cast(plandate as DATE) between '$sd' and '$ed' GROUP BY task_assign.task_type,task_assign.task_subtype");
        return $query->result();
    }
    public function get_myprogramdetail($pcode){
        $query=$this->db->query("SELECT COUNT(*) nofs,COUNT(DISTINCT sdistrict) cdistrict,GROUP_CONCAT(DISTINCT sdistrict) district,COUNT(DISTINCT sstate) cstate,GROUP_CONCAT(DISTINCT sstate) state,COUNT(DISTINCT u1.fullname) cpia,GROUP_CONCAT(DISTINCT u1.fullname) pia, COUNT(DISTINCT u2.fullname) cinsp,GROUP_CONCAT(DISTINCT u2.fullname) insp FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id LEFT JOIN user_detail u2 ON u2.id=spd.ins_id WHERE project_code='$pcode'");
        return $query->result();
    }
    public function bdr_comment($rid,$rcomment,$uname){
        $query=$this->db->query("INSERT INTO bdrequestlog(tid, tby, remark,detail) VALUES ('$rid','$uname','$rcomment','$rcomment')");
    }
    public function get_spdlogic($pcode){
        $query=$this->db->query("SELECT * FROM spdlogic where project_code='$pcode'");
        return $query->result();
    }
    public function get_dewaybill($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM dewaybill where project_code='$pcode'");
        return $query->result();
    }
    public function academic_calendar($piaid,$fdate,$todate,$state,$type,$remark){
        $query=$this->db->query("INSERT INTO academiccalendar(piaid,fdate,todate,state,type,remark) VALUES ('$piaid','$fdate','$todate','$state','$type','$remark')");
    }
    public function get_TaskCheckaypy($bduid,$tdate){
        $query=$this->db->query("SELECT * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd on spd.id=task_assign.spd_id LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.user_id='$bduid' and cast(plantask.donet as DATE)='$tdate' and plantask.actiontaken='yes' and plantask.purpose='yes' and plantask.tdone!='0'");
        return $query->result();
    }
    public function get_TaskCheckaypn($bduid,$tdate){
        $query=$this->db->query("SELECT * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd on spd.id=task_assign.spd_id LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE plantask.user_id='$bduid' and cast(plantask.donet as DATE)='$tdate' and plantask.actiontaken='yes' and plantask.purpose='no' and plantask.tdone!='0'");
        return $query->result();
    }
    public function get_PIAwiseTask($tdate){
        $query=$this->db->query("SELECT distinct plantask.user_id piaid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plantask.plandate as DATE)='$tdate'");
        return $query->result();
    }
    public function get_livetask($tdate){
        $query=$this->db->query("SELECT spd.id sid, task_assign.id tid, task_assign.checklist, spd.project_code pcode, plantask.action acname,status.name stname,spd.sname,user_detail.fullname uname,plantask.plandate,initiateddt FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plantask.plandate as DATE)='$tdate' and plantask.tdone='0'");
        return $query->result();
    }
    public function get_pialivetask($tdate){
        $query=$this->db->query("SELECT spd.project_code pcode, plantask.action acname,status.name stname,spd.sname,user_detail.fullname uname,plantask.plandate,initiateddt FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plantask.plandate as DATE)='$tdate' and plantask.tdone='0'");
        return $query->result();
    }
    public function get_MasterPending($date){
            $query=$this->db->query("SELECT *,plantask.action acname,status.name stname,spd.project_code pcode, spd.sname,u1.fullname uname,u2.fullname fname,plantask.plandate from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=task_assign.to_user LEFT JOIN user_detail u2 ON u2.id=task_assign.from_user WHERE cast(plandate AS DATE)='$date' and tdone='0'  ORDER BY plandate ASC");
            return $query->result();
    }
    public function get_MasterOverDue($cdate,$date){
            $query=$this->db->query("SELECT *,plantask.action acname,status.name stname,spd.project_code pcode, spd.sname,u1.fullname uname,u2.fullname fname,plantask.plandate from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=task_assign.to_user LEFT JOIN user_detail u2 ON u2.id=task_assign.from_user WHERE plandate<='$cdate' and cast(plandate AS DATE)='$date' and tdone='0'  ORDER BY plandate ASC");
            return $query->result();
    }
    public function get_Masterque($id){
            $query=$this->db->query("SELECT * FROM visitstupdate WHERE id='$id'");
            return $query->result();
    }
    public function get_Mastersubtask($que,$page){
            $query=$this->db->query("SELECT * FROM visitsubtask WHERE cpage='$page' and id=(SELECT id FROM visitsubtask WHERE que='$que' and cpage='$page')+1");
            return $query->result();
    }
    public function get_MasterLbtid($tid){
            $query=$this->db->query("SELECT *,plantask.action acname,status.name stname,spd.project_code pcode, spd.sname,u1.fullname uname,u2.fullname fname,plantask.plandate from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail u1 ON u1.id=task_assign.to_user LEFT JOIN user_detail u2 ON u2.id=task_assign.from_user WHERE plantask.taskid='$tid'");
            return $query->result();
    }
    public function get_MasterLive($date){
            $query=$this->db->query("SELECT MAX(visitstupdate.id) mvid,visitstupdate.tid,(SELECT task_assign.checklist FROM task_assign WHERE task_assign.id=visitstupdate.tid) pagen FROM visitstupdate LEFT JOIN plantask ON plantask.taskid=visitstupdate.tid LEFT JOIN user_detail ON user_detail.id=plantask.user_id WHERE user_detail.dep_id='2' and cast(plantask.plandate as DATE)='$date'  GROUP BY tid");
            return $query->result();
    }
    public function get_BWDAWTask($d1,$d2,$dt1,$dt2,$action,$piid){
        $query=$this->db->query("SELECT *,user_detail.fullname uname from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE tdone='1' and action='$action' and cast(plandate as DATE) BETWEEN '$d1' and '$d2' and cast(plandate as TIME) BETWEEN '$dt1' and '$dt2'");
        return $query->result();
    }
    public function get_StatusNW($status,$action,$piid){
        $query=$this->db->query("SELECT *,user_detail.fullname uname, (select cast(MAX(plantask.plandate) as DATE) FROM plantask WHERE plantask.spd_id=spd.id and plantask.tdone='1' and plantask.action='$action') abc  from spd LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE status.name='$status' and pi_id='$piid'");
        return $query->result();
    }
    public function get_todaypaction($dt1,$dt2){
            $query=$this->db->query("SELECT DISTINCT plantask.action acname from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE plandate BETWEEN '$dt1' and '$dt2' ORDER BY acname ASC");
            return $query->result();
    }
    public function get_todaypstatus($dt1,$dt2,$action){
            $query=$this->db->query("SELECT DISTINCT status.name stname,status.id stid from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE plandate BETWEEN '$dt1' and '$dt2' and plantask.action='$action' ORDER BY stname ASC");
            return $query->result();
        }
    public function get_todayptask($dt1,$dt2,$action,$stid){
            $query=$this->db->query("SELECT spd.project_code pcode, spd.sname,user_detail.fullname uname,plantask.plandate FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE  plandate BETWEEN '$dt1' and '$dt2' and plantask.action='$action' and spd.status='$stid'");
            return $query->result();
        }
    public function get_piastate($uid){
        $query=$this->db->query("select distinct sstate FROM spd where pi_id='$uid' and sstate!=''");
        return $query->result();
    }
    public function get_wgbysid($sid){
        $query=$this->db->query("SELECT * FROM wgdata WHERE sid='$sid'");
        return $query->result();
    }
    public function get_piadaystart($piid,$tdate){
        $query=$this->db->query("SELECT *,user_day.id udid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE user_detail.id='$piid' and cast(ustart as DATE)='$tdate' and scomment is null LIMIT 1");
        return $query->result();
    }
    public function get_piadayclose($piid,$tdate){
        $query=$this->db->query("SELECT *,user_day.id udid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE user_detail.id='$piid' and cast(ustart as DATE)='$tdate' and uclose is not null and scomment is not null and ccomment is null LIMIT 1");
        return $query->result();
    }
    public function get_BDdaystart($uid,$tdate){
        $query=$this->db->query("SELECT *,user_day.id udid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and scomment is null LIMIT 1");
        return $query->result();
    }
    public function get_insdaystart($uid,$tdate){
        $query=$this->db->query("SELECT *,user_day.id udid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and user_detail.dep_id='4' and scomment is null LIMIT 1");
        return $query->result();
    }
    public function check_days($rat1,$rat2,$rat3,$rat4,$sremark,$udid,$que){
        $q1 = $que[0].'('.$rat1.' Star)';
        $q2 = $que[1].'('.$rat2.' Star)';
        $q3 = $que[2].'('.$rat3.' Star)';
        $q4 = $que[3].'('.$rat4.' Star)';
        $queans=$q1.','.$q2.','.$q3.','.$q4;
        $this->db->query("update user_day set queans='$queans', scomment='$sremark' where id='$udid'");
        $id =  $this->db->insert_id();
    }
    public function get_piaprogram(){
        $query=$this->db->query("SELECT pi_id,user_detail.fullname piname,COUNT(DISTINCT project_code) program,COUNT(spd.id) school FROM spd LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE project_code!='' and pi_id!='' and pm_apr!='' GROUP BY pi_id");
        return $query->result();
    }
    public function get_piaprogrambypiid($piid){
        $query=$this->db->query("SELECT client_handover.project_year,client_handover.bd_id,client_handover.client_name,pi_id,user_detail.fullname,project_code,COUNT(spd.id) school FROM spd LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN user_detail ON user_detail.id=spd.pi_id WHERE project_code!='' and pm_apr!='' and pi_id='$piid' GROUP BY project_code,pi_id,client_handover.client_name,client_handover.bd_id,client_handover.project_year;");
        return $query->result();
    }
    public function get_BDdayclose($uid,$tdate){
        $query=$this->db->query("SELECT *,user_day.id udid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and uclose is not null and scomment is not null and ccomment is null LIMIT 1");
        return $query->result();
    }
    public function get_reportsid($sid){
        $query=$this->db->query("SELECT * FROM report WHERE spd_id='$sid'");
        return $query->result();
    }
    public function get_reportsidntype($sid,$type){
        $query=$this->db->query("SELECT * FROM report WHERE spd_id='$sid' and report_type='$type'");
        return $query->result();
    }
    public function get_piareviewstarted($uid){
        $query=$this->db->query("SELECT *,piareview.id rid FROM piareview LEFT JOIN user_detail ON user_detail.id=piareview.piid WHERE piareview.uid='$uid' and piareview.startt is not null and closet is null");
        return $query->result();
    }
    public function get_reviewstarted($uid){
        $query=$this->db->query("SELECT *,allreview.id rid FROM allreview LEFT JOIN user_detail ON user_detail.id=allreview.piid WHERE allreview.uid='$uid' and allreview.startt is not null and closet is null");
        return $query->result();
    }
    public function get_joincallpcode($pcode){
        $query=$this->db->query("SELECT * FROM joincall where projectcode='$pcode'");
        return $query->result();
    }
    public function get_joincallstarted(){
        $query=$this->db->query("SELECT * FROM joincall where joincall.startt is not null and closet is null");
        return $query->result();
    }
    public function  get_joincall(){
        $query=$this->db->query("SELECT * FROM joincall where joincall.plant is not null and startt is null");
        return $query->result();
    }
    public function get_wgbypcode($pcode){
        $query=$this->db->query("SELECT * FROM wgdata WHERE project_code='$pcode'");
        return $query->result();
    }
    public function get_wgbysidbydt($sid,$sd,$ed){
        $query=$this->db->query("SELECT * FROM wgdata WHERE sid='$sid' and cast(sdatet as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_reportbyspdbydate($sid,$sd,$ed){
        $query=$this->db->query("SELECT * FROM report WHERE spd_id='$sid' and cast(sdatet as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_visit1byspdbydate($sid,$sd,$ed){
        $query=$this->db->query("SELECT * FROM visitstupdate WHERE sid='$sid' and cast(sdatet as DATE) between '$sd' and '$ed' and ans1!=''");
        return $query->result();
    }
    public function get_visit2byspdbydate($sid,$sd,$ed){
        $query=$this->db->query("SELECT * FROM visitstupdate WHERE sid='$sid' and cast(sdatet as DATE) between '$sd' and '$ed' and ans2!=''");
        return $query->result();
    }
    public function plan_joincall($plandate,$uid,$pcode,$meetlink){
        $query=$this->db->query("select * from client_handover where projectcode='$pcode'");
        $data = $query->result();
        $bdid = $data[0]->bd_id;
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM user_details where user_id='$bdid'");
        $data2 = $query->result();
        $adminid = $data2[0]->admin_id;
        $query=$this->db->query("select GROUP_CONCAT(distinct pi_id) piid,GROUP_CONCAT(distinct ins_id) insid from spd where project_code='$pcode'");
        $data1 = $query->result();
        $piid = $data1[0]->piid;
        $insid = $data1[0]->insid;
        $this->db->query("INSERT INTO joincall(plant,uid,projectcode,meetlink,bdid,adminid,piid,insid,fmid,purid,accid)
        VALUES ('$plandate','$uid','$pcode','$meetlink','$bdid','$adminid','$piid','$insid','1','3','39')");
        $id =  $this->db->insert_id();
    }
    public function piaplan_review($plandate,$uid,$piid,$reviewtype,$meetlink,$fixdate){
        $this->db->query("INSERT INTO piareview(plant,uid,piid,meetid,reviewtype,fixdate) VALUES ('$plandate','$uid','$piid','$meetlink','$reviewtype','$fixdate')");
        $id =  $this->db->insert_id();
    }
    public function ph_timeline($pcode,$dud,$dad,$pd,$pbpd,$pad,$disd,$insd,$insrd,$rrd,$remark){
        $cdate = date('Y-m-d H:i:s');
        $this->db->query("Update joincall set cremark='$remark',closet='$cdate',dud='$dud', dad='$dad',pd='$pd',pbpd='$pbpd',pad='$pad',disd='$disd',insd='$insd', insrd='$insrd' where projectcode='$pcode'");
    }
    public function plan_review($plandate,$uid,$piid,$reviewtype,$meetlink,$fixdate){
        $this->db->query("INSERT INTO allreview(plant,uid,piid,meetid,reviewtype,fixdate) VALUES ('$plandate','$uid','$piid','$meetlink','$reviewtype','$fixdate')");
        $id =  $this->db->insert_id();
    }
    public function get_spdbybdnst($stid,$piid,$fdate){
        $query=$this->db->query("SELECT * FROM spd where pi_id='$piid' and status='$stid'");
        return $query->result();
    }
    public function get_programbybdnst($stid,$piid,$fdate){
        $query=$this->db->query("SELECT DISTINCT project_code FROM spd where pi_id='$piid'");
        return $query->result();
    }
    public function get_rdonespd($rid,$spdid){
        $query=$this->db->query("SELECT * FROM allreviewdata where sid='$spdid' and rid='$rid'");
        return $query->result();
    }
    public function get_approgram($piid,$project){
        $query=$this->db->query("SELECT * FROM programtimeline where piaid='$piid' and projectcode='$project'");
        return $query->result();
    }
    public function get_rdonespdid($spdid){
        $query=$this->db->query("SELECT * FROM allreviewdata where sid='$spdid' and uid!='1' AND uid!='4'");
        return $query->result();
    }
    public function get_rdoneprojectid($pcode){
        $query=$this->db->query("SELECT * FROM allreviewdata where projectcode='$pcode'");
        return $query->result();
    }
    public function get_academiccalendar(){
        $query=$this->db->query("SELECT *,academiccalendar.type type FROM academiccalendar LEFT JOIN user_detail ON user_detail.id=academiccalendar.piaid");
        return $query->result();
    }
    public function get_myacademiccalendar($uid){
        $query=$this->db->query("SELECT * FROM academiccalendar LEFT JOIN user_detail ON user_detail.id=academiccalendar.piaid where academiccalendar.piaid='$uid'");
        return $query->result();
    }
    public function get_accalendarbyYM($uid,$y,$m){
        $query=$this->db->query("SELECT * FROM academiccalendar LEFT JOIN user_detail ON user_detail.id=academiccalendar.piaid where academiccalendar.piaid='$uid' and MONTH(academiccalendar.fdate)='$m'");
        return $query->result();
    }
    public function get_getSchoolList($pcode,$piid){
        $query=$this->db->query("SELECT * FROM spd where project_code='$pcode' and pi_id='$piid'");
        return $query->result();
    }
    public function get_spdlog($spdid){
        $query=$this->db->query("SELECT *,status.name csstatus,status.id sid, spd.id spdid,spd.wanamelink wanamelink,spd.waname waname FROM spd LEFT JOIN status on status.id=spd.status WHERE spd.id='$spdid'");
        return $query->result();
    }
    public function get_visitmediatid1($tid){
        $query=$this->db->query("SELECT * FROM visitstupdate WHERE tid='$tid' and ans1 is not null");
        return $query->result();
    }
    public function get_visitmediatid2($tid){
        $query=$this->db->query("SELECT * FROM visitstupdate WHERE tid='$tid' and ans2 is not null");
        return $query->result();
    }
    public function get_programlog($spdid){
        $query=$this->db->query("SELECT *,status.name csstatus,status.id sid, spd.id spdid,spd.wanamelink wanamelink,spd.waname waname FROM spd LEFT JOIN status on status.id=spd.status WHERE spd.project_code='$spdid'");
        return $query->result();
    }
    public function get_actionlogs($statusid,$actionid,$fdate,$piid){
        $query=$this->db->query("SELECT company_master.id cmpid, company_master.compname, tblcallevents.appointmentdatetime, tblcallevents.updateddate,tblcallevents.mom,tblcallevents.remarks,tblcallevents.actontaken,tblcallevents.purpose_achieved,tblcallevents.user_id,tblcallevents.actiontype_id,tblcallevents.id tid, tblcallevents.cid_id cid, (SELECT (SELECT status.name FROM tblcallevents t1 LEFT JOIN status ON status.id=t1.status_id WHERE t1.id=(SELECT min(id) FROM tblcallevents WHERE id>tid and cid_id=cid)) FROM tblcallevents LEFT JOIN status ON status.id=tblcallevents.status_id WHERE tblcallevents.id=tid and cid_id=cid) nstid, (SELECT (SELECT status.name FROM tblcallevents t2 LEFT JOIN status ON status.id=t2.status_id WHERE t2.id=(SELECT max(id) FROM tblcallevents WHERE id<tid and cid_id=cid)) FROM tblcallevents LEFT JOIN status ON status.id=tblcallevents.status_id WHERE tblcallevents.id=tid and cid_id=cid) lstid,(SELECT status.name FROM tblcallevents LEFT JOIN status ON status.id=tblcallevents.status_id WHERE tblcallevents.id=tid and cid_id=cid) tasksid FROM tblcallevents LEFT JOIN init_call on init_call.id=tblcallevents.cid_id LEFT JOIN company_master ON company_master.id=init_call.cmpid_id WHERE actiontype_id='$actionid' and user_id='$bdid' and cast(updateddate as DATE)>'$fdate' and nextCFID!=0 ORDER BY company_master.compname DESC");
        return $query->result();
    }
    public function get_bdrtotallogs($rid){
        $query=$this->db->query("SELECT *,bdrequestlog.detail tdetail,bdrequestlog.sdatet tsdatet  FROM bdrequestlog left join bdrequest on bdrequest.id=bdrequestlog.tid  WHERE tid='$rid' ORDER BY `bdrequestlog`.`sdatet` DESC");
        return $query->result();
    }
    public function get_bdrlogdetail($rid){
        $query=$this->db->query("SELECT * FROM bdrequestlog WHERE tid='$rid' ORDER BY sdatet DESC");
        return $query->result();
    }
    public function get_bdrlogdetails($rid){
        $query=$this->db->query("SELECT * FROM `bdrequestlog` LEFT JOIN bdtask on bdtask.tid=bdrequestlog.tid left join user_detail on user_detail.id = bdtask.uid  WHERE bdrequestlog.tid='$rid';");
        return $query->result();
    }
    public function piaclose_review($closetdate,$closeremark,$rrid){
        $this->db->query("update piareview set closet='$closetdate',cremark='$closeremark' where id='$rrid'");
    }
    public function close_review($closetdate,$closeremark,$rrid){
        $this->db->query("update allreview set closet='$closetdate',cremark='$closeremark' where id='$rrid'");
    }
    public function all_rremarkpip($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$pcategory,$pcasestudy,$preports,$psell,$paspirational,$pwg,$pwga){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $projectcode=$spdid;
        $query=$this->db->query("select * from spd where project_code='$projectcode'");
        $data =  $query->result();
        foreach($data as $dt){
            $spdid = $dt->id;
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,plan) VALUES ('$date','$adminuid','$piuid','Program Self Review','Program Self Review','$projectcode','$spdid','Program Self Review','1')");
            $pmtid =  $this->db->insert_id();
            $this->db->query("INSERT INTO plantask (action, plandate, taskid, user_id, spd_id, tdone, actiontaken, purpose,donet,initiateddt,remark) VALUES ('Program Self Review','$date','$pmtid','$piuid','$spdid','1','yes','yes','$date','$date','$remark')");
            $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$spdid','Program Self Review','$remark','$pmtid')");
        }
        $this->db->query("INSERT INTO allreviewdata(uid,piid,remark,ntid,exsid,exdate,rid,csid,projectcode,pcategory,pcasestudy,preports,psell,paspirational,pwg,pwga)VALUES ('$adminuid','$piuid','$remark','0','$exsid','$exdate','$rid','0','$projectcode','$pcategory','$pcasestudy','$preports','$psell','$paspirational','$pwg','$pwga')");
    }
    public function program_timeline($piid,$projectcode,$uid,$bdid,$wmessage,$communication,$callsfu,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation,$otherdvisit,$otherdcall,$outbondc,$bdreview,$cengagement){
        $this->db->query("INSERT INTO programtimeline(piaid, projectcode, uid, bdid, wmessage, communication, callsfu, reporttype, fttp, rttp, casestudy, maintenance, replacement, diy, blmne, elmne, nsp, utilisation, otherdvisit, otherdcall, outbondc, bdreview, cengagement) VALUES ('$piid','$projectcode','$uid','$bdid','$wmessage','$communication','$callsfu','$reporttype','$fttp','$rttp','$casestudy','$maintenance','$replacement','$diy','$blmne','$elmne','$nsp','$utilisation','$otherdvisit','$otherdcall','$outbondc','$bdreview','$cengagement')");
    }
    public function school_timeline($sid,$piid,$projectcode,$uid,$bdid,$wmessage,$communication,$callsfu,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation,$otherdvisit,$otherdcall,$outbondc,$bdreview,$cengagement){
        $this->db->query("INSERT INTO schooltimeline(sid,piaid, projectcode, uid, bdid, wmessage, communication, callsfu, reporttype, fttp, rttp, casestudy, maintenance, replacement, diy, blmne, elmne, nsp, utilisation, otherdvisit, otherdcall, outbondc, bdreview, cengagement) VALUES ('$sid','$piid','$projectcode','$uid','$bdid','$wmessage','$communication','$callsfu','$reporttype','$fttp','$rttp','$casestudy','$maintenance','$replacement','$diy','$blmne','$elmne','$nsp','$utilisation','$otherdvisit','$otherdcall','$outbondc','$bdreview','$cengagement')");
    }
    public function all_rremarkpi($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$awg,$categories,$categreason,$relation,$socialmedia,$nsp,$nspno,$summeractivity,$scno,$support,$diy,$opportunity,$casestudy,$utilizationtype,$logsactivity){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $spd = $this->Menu_model->get_spdbyid($spdid);
        $cs = $spd[0]->status;
        $pcode = $spd[0]->project_code;
        $insid = $spd[0]->ins_id;
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,plan) VALUES ('$date','$adminuid','$piuid','School Self Review','School Self Review','$pcode','$spdid','School Self Review','1')");
        $pmtid =  $this->db->insert_id();
        $this->db->query("INSERT INTO plantask (action, plandate, taskid, user_id, spd_id, tdone, actiontaken, purpose,donet,initiateddt,remark) VALUES ('School Self Review','$date','$pmtid','$piuid','$spdid','1','yes','yes','$date','$date','$remark')");
        $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$spdid','School Self Review','$remark','$pmtid')");
        if($ntaction=='RTTP'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention Enquiry for RTTP','$pcode','$spdid','Review Task','page30')");
        }
        if($ntaction=='MnE'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention form M&E','$pcode','$spdid','Review Task','page22')");
        }
        if($ntaction=='DIY'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention Enquiry for DIY','$pcode','$spdid','Review Task','page27')");
        }
        if($ntaction=='Activation Call'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Call for School Activation','$pcode','$spdid','Review Task','page52')");
        }
        if($ntaction=='Maintenance'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$insid','Call','Pre-maintenance check-list From','$pcode','$spdid','Review Task','page25')");
        }
       $ntid =  $this->db->insert_id();
        $this->db->query("INSERT INTO allreviewdata(uid,piid,remark,ntid,exsid,exdate,rid,csid,sid,awg,categories,categreason,relation,socialmedia,nsp,nspno,summeractivity,scno,support,diy,opportunity,casestudy,utilizationtype,logsactivity)VALUES ('$adminuid','$piuid','$remark','$ntid','$exsid','$exdate','$rid','$cs','$spdid','$awg','$categories','$categreason','$relation','$socialmedia','$nsp','$nspno','$summeractivity','$scno','$support','$diy','$opportunity','$casestudy','$utilizationtype','$logsactivity')");
    }
    public function all_rremark($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$nsp){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $spd = $this->Menu_model->get_spdbyid($spdid);
        $cs = $spd[0]->status;
        $pcode = $spd[0]->project_code;
        $insid = $spd[0]->ins_id;
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,plan) VALUES ('$date','$adminuid','$piuid','PM Review','Review','$pcode','$spdid','Review Task','1')");
        $pmtid =  $this->db->insert_id();
        $this->db->query("INSERT INTO plantask (action, plandate, taskid, user_id, spd_id, tdone, actiontaken, purpose,donet,initiateddt,remark) VALUES ('PM Review','$date','$pmtid','$piuid','$spdid','1','yes','yes','$date','$date','$remark')");
        $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$spdid','PM Review','$remark','$pmtid')");
        if($ntaction=='RTTP'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention Enquiry for RTTP','$pcode','$spdid','Review Task','page30')");
        }
        if($ntaction=='MnE'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention form M&E','$pcode','$spdid','Review Task','page22')");
        }
        if($ntaction=='DIY'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Pre - Intervention Enquiry for DIY','$pcode','$spdid','Review Task','page27')");
        }
        if($ntaction=='Activation Call'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$piuid','Call','Call for School Activation','$pcode','$spdid','Review Task','page52')");
        }
        if($ntaction=='Maintenance'){
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$adminuid','$insid','Call','Pre-maintenance check-list From','$pcode','$spdid','Review Task','page25')");
        }
       $ntid =  $this->db->insert_id();
        $this->db->query("INSERT INTO allreviewdata(uid,piid,remark,ntid,exsid,exdate,rid,csid,sid,nsp)VALUES ('$adminuid','$piuid','$remark','$ntid','$exsid','$exdate','$rid','$cs','$spdid','$nsp')");
    }
    public function get_bdrlogs($rid){
        $query=$this->db->query("SELECT * FROM bdrequestlog WHERE tid='$rid' ORDER BY `bdrequestlog`.`sdatet` DESC limit 1");
        return $query->result();
    }
    public function get_bdreqlogs($rid){
        $query=$this->db->query("SELECT * FROM bdrequestlog WHERE tid='$rid'");
        return $query->result();
    }
    public function get_bdreqdetail(){
        $query=$this->db->query("SELECT * FROM bdrequest");
        return $query->result();
    }
    public function get_spdutd($spdid,$fdate){
        $query=$this->db->query("SELECT count(*) cont,plantask.user_id uuid FROM plantask WHERE spd_id='$spdid' and cast(donet as DATE)>'$fdate' and tdone='1' GROUP BY plantask.user_id");
        return $query->result();
    }
    public function get_spdtd($spdid,$fdate){
        $query=$this->db->query("SELECT COUNT(*) ab, count(CASE WHEN action='Call' THEN action end) a,count(CASE WHEN action='Visit' THEN action end) b,count(CASE WHEN action='Utilisation' THEN action end) c,count(CASE WHEN action='Communication' THEN action end) d,count(CASE WHEN action='CaseStudy' THEN action end) e,count(CASE WHEN action='Report' THEN action end) f, count(CASE WHEN actiontaken='no' THEN actiontaken end) r, count(CASE WHEN actiontaken='yes' and purpose='no' THEN purpose end) s, count(CASE WHEN actiontaken='yes' and purpose='yes' THEN purpose end) t FROM plantask WHERE spd_id='$spdid' and cast(donet as DATE)>'$fdate' and tdone='1'");
        return $query->result();
    }
    public function get_spdtdbyu($spdid,$fdate,$uuid){
        $query=$this->db->query("SELECT COUNT(*) ab, count(CASE WHEN action='Call' THEN action end) a,count(CASE WHEN action='Visit' THEN action end) b,count(CASE WHEN action='Utilisation' THEN action end) c,count(CASE WHEN action='Communication' THEN action end) d,count(CASE WHEN action='CaseStudy' THEN action end) e,count(CASE WHEN action='Report' THEN action end) f, count(CASE WHEN actiontaken='no' THEN actiontaken end) r, count(CASE WHEN actiontaken='yes' and purpose='no' THEN purpose end) s, count(CASE WHEN actiontaken='yes' and purpose='yes' THEN purpose end) t FROM plantask WHERE user_id='$uuid' and spd_id='$spdid' and cast(donet as DATE)>'$fdate' and tdone='1'");
        return $query->result();
    }
    public function get_visitd($spdid,$fdate){
        $query=$this->db->query("SELECT count(CASE WHEN checklist='page6' THEN checklist end) ins,count(CASE WHEN checklist='page5' THEN checklist end) fttp,count(CASE WHEN checklist='page31' THEN checklist end) rttp,count(CASE WHEN checklist='page28' THEN checklist end) diy,count(CASE WHEN checklist='page23' THEN checklist end) mne,count(CASE WHEN checklist='page26' THEN checklist end) miant FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE plantask.spd_id='$spdid' and cast(plantask.donet as DATE)>'$fdate' and plantask.tdone='1'");
        return $query->result();
    }
    public function get_piareviewid($uid){
        $query=$this->db->query("SELECT *,piareview.id rid FROM piareview LEFT JOIN user_detail ON user_detail.id=piareview.piid WHERE piareview.uid='$uid' and piareview.startt is null");
        return $query->result();
    }
    public function get_reviewid($uid){
        $query=$this->db->query("SELECT *,allreview.id rid FROM allreview LEFT JOIN user_detail ON user_detail.id=allreview.piid WHERE allreview.uid='$uid' and allreview.startt is null");
        return $query->result();
    }
    public function get_allreview($rid){
        $query=$this->db->query("SELECT * FROM allreview WHERE id='$rid'");
        return $query->result();
    }
    public function piastart_review($startt,$reviewid){
        $this->db->query("update piareview set startt='$startt' where id='$reviewid'");
        $id =  $this->db->insert_id();
    }
    public function start_review($startt,$reviewid){
        $this->db->query("update allreview set startt='$startt' where id='$reviewid'");
        $id =  $this->db->insert_id();
    }
    public function start_joincall($startt,$reviewid){
        $this->db->query("update joincall set startt='$startt' where id='$reviewid'");
        $id =  $this->db->insert_id();
    }
    public function notify($uid){
        $query=$this->db->query("SELECT * FROM notify where view=0 and uid='$uid'  ORDER BY notify.sdatet DESC");
        return $query->result();
    }
    public function get_spdsbypi($uid){
        $query=$this->db->query("SELECT COUNT(*) as a,count(CASE WHEN status=1 THEN status end) as b,count(CASE WHEN status=2 THEN status end) as c,count(CASE WHEN status=3 THEN status end) as d,count(CASE WHEN status=4 THEN status end) as e,count(CASE WHEN status=5 THEN status end) as f,count(CASE WHEN status=6 THEN status end) as g,count(CASE WHEN status=7 THEN status end) as h,count(CASE WHEN status=8 THEN status end) as i FROM `spd` WHERE pi_id='$uid' and pm_apr='1'");
        return $query->result();
    }
    public function get_spdsbyzh($uid){
        $query=$this->db->query("SELECT count(CASE WHEN pm_apr='0' THEN pm_apr end) as ab,count(CASE WHEN pm_apr='1' THEN pm_apr end) as a,count(CASE WHEN status=1 and pm_apr='1' THEN status end) as b,count(CASE WHEN status=2 and pm_apr='1' THEN status end) as c,count(CASE WHEN status=3 and pm_apr='1' THEN status end) as d,count(CASE WHEN status=4 and pm_apr='1' THEN status end) as e,count(CASE WHEN status=5 and pm_apr='1' THEN status end) as f,count(CASE WHEN status=6 and pm_apr='1' THEN status end) as g,count(CASE WHEN status=7 and pm_apr='1' THEN status end) as h,count(CASE WHEN status=8 and pm_apr='1' THEN status end) as i FROM `spd` WHERE zh_id='$uid'");
        return $query->result();
    }
    public function get_spdsbypm(){
        $query=$this->db->query("SELECT count(CASE WHEN pm_apr='0' THEN pm_apr end) as ab,count(CASE WHEN pm_apr='1' THEN pm_apr end) as a,count(CASE WHEN status=1 and pm_apr='1' THEN status end) as b,count(CASE WHEN status=2 and pm_apr='1' THEN status end) as c,count(CASE WHEN status=3 and pm_apr='1' THEN status end) as d,count(CASE WHEN status=4 and pm_apr='1' THEN status end) as e,count(CASE WHEN status=5 and pm_apr='1' THEN status end) as f,count(CASE WHEN status=6 and pm_apr='1' THEN status end) as g,count(CASE WHEN status=7 and pm_apr='1' THEN status end) as h,count(CASE WHEN status=8 and pm_apr='1' THEN status end) as i FROM `spd` WHERE pi_id!=''");
        return $query->result();
    }
    public function get_daydetail($uid,$tdate){
        $query=$this->db->query("SELECT *, cast(ustart as TIME) as ustart,cast(uclose as TIME) as uclose FROM user_day WHERE user_id='$uid' and cast(sdatet as DATE)='$tdate'");
        return $query->result();
    }
    public function submit_day($wffo,$flink,$user_id,$lat,$lng,$do){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $da = date('Y-m-d');
        if($do==0){
        $this->db->query("INSERT INTO user_day(user_id, ustart, usimg, slatitude, slongitude,wffo) VALUES ('$user_id','$date','$flink','$lat','$lng','$wffo')");
        $id =  $this->db->insert_id();
        $query=$this->db->query("SELECT * FROM plantask WHERE user_id='$user_id' and tdone='0' and cast(plandate as DATE)<'$da'");
        $data = $query->result();
        foreach($data as $dt){
           $tid = $dt->taskid;
           $this->db->query("Update task_assign set plan='0' where id='$tid'");
           $this->db->query("DELETE FROM plantask WHERE taskid='$tid'");
        }
        return $id;
        }
        if($do==1){
            $tdate=date('Y-m-d');
            $this->db->query("Update user_day set uclose='$date',ucimg='$flink',clatitude='$lat',clongitude='$lng' where cast(sdatet as DATE)='$tdate' and user_id='$user_id'");
        }
    }
    public function get_spdpi($pi,$status){
        if($status==0){$query=$this->db->query("select * from spd where pi_id='$pi'");
        }else{
            $query=$this->db->query("select * from spd where pi_id='$pi' and status='$status'");
        }
        return $query->result();
    }
    public function get_daydbyad($tdate){
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail) a, COUNT(*) b, COUNT(case when wffo=1 then wffo end) c, COUNT(case when wffo=2 then wffo end) d, COUNT(case when wffo=3 then wffo end) e FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        return $query->result();
    }
    public function get_daydbyadimp($tdate){
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail) a, COUNT(*) b, COUNT(case when wffo=1 then wffo end) c, COUNT(case when wffo=2 then wffo end) d, COUNT(case when wffo=3 then wffo end) e FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and user_detail.dep_id='4'");
        return $query->result();
    }
    public function new_daydbyad($date){
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail) a, COUNT(*) b, COUNT(case when wffo=1 then wffo end) c, COUNT(case when wffo=2 then wffo end) d, COUNT(case when wffo=3 then wffo end) e FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$date'");
        return $query->result();
    }
    public function get_teamdayd($date){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$date'");
        return $query->result();
    }
    public function get_goalsbyrid($rid){
        $query=$this->db->query("SELECT count(*) cont FROM goalsetting WHERE rid='$rid'");
        return $query->result();
    }
    public function Goal_Setting($rrrid,$gsuid,$gspiid,$targetdt,$tcall,$email,$utilisation,$ttp,$mne,$diy,$goodschool,$modelschool,$gsremark){
        $this->db->query("INSERT INTO goalsetting(uid, piid, targetdt, tcall, email, utilisation, ttp, mne, diy, goodschool, modelschool, gsremark, rid) VALUES ('$gsuid','$gspiid','$targetdt','$tcall','$email','$utilisation','$ttp','$mne','$diy','$goodschool','$modelschool','$gsremark','$rrrid')");
    }
    public function get_allpopup($ur_id){
        $tdate=date('Y-m-d');
        $data = '';
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '09:00:00' and '11:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (09am to 11am)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '11:00:01' and '13:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/12'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (11am to 01pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '13:00:01' and '15:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/13'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (01pm to 03pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '15:00:01' and '17:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/14'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (03pm to 05pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '17:00:01' and '19:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/15'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (05pm to 07pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '19:00:01' and '21:00:00' and user_id='$ur_id'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/16'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (07pm to 09pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from spd where pi_id='$ur_id' and status='7'");
        $da = $query->result();
        $da = $da[0]->cont;
        if($da>0){
        $data =$data. "<a href='alertpoint/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School is in Inactive Status</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from plantask where user_id='$ur_id' and tdone='0'");
        $da1 = $query->result();
        $da1 = $da1[0]->cont;
        if($da1>0){
        $data =$data. "<a href='alertpoint/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da1." Task Plan But Not Completed</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from task_assign where to_user='$ur_id' and plan='0'");
        $da2 = $query->result();
        $da2 = $da2[0]->cont;
        if($da2>0){
        $data =$data. "<a href='alertpoint/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da2." Task Assign
        But Not Plan</b></div></a>";}
        $query=$this->db->query("SELECT * FROM user_day WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate'");
        $da3 = $query->result();
        if(!$da3){
        $data =$data. "<a href='DayManagement'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Started Your Day </b></div></a>";}
        $query=$this->db->query("SELECT * FROM `user_day` WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate' and uclose is null");
        $da4 = $query->result();
        if($da4){
        $data =$data. "<a href='DayManagement'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Closed Your Day</b></div></a>";}
        return $data;
     }
     public function get_zhpopup($ur_id){
        $tdate=date('Y-m-d');
        $data = '';
        $query=$this->db->query("SELECT count(*) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT sid) cont FROM allreviewdata WHERE uid='1' OR uid='4'");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/201'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School Review Pending by PM-ZH</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT sid) cont FROM allreviewdata WHERE uid!='1' AND uid!='4';");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/202'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School Review Pending by PIA</b></div></a>";}
        $query=$this->db->query("SELECT COUNT(DISTINCT project_code) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT projectcode) cont FROM allreviewdata WHERE projectcode!='' and projectcode is not null");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/203'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Program Review Pending</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from spd where zh_id='$ur_id' and status='7'");
        $da = $query->result();
        $da = $da[0]->cont;
        if($da>0){
        $data =$data. "<a href='alertpoint/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School in is Inactive Status</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from plantask where user_id='$ur_id' and tdone='0'");
        $da1 = $query->result();
        $da1 = $da1[0]->cont;
        if($da1>0){
        $data =$data. "<a href='alertpoint/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da1." Task Plan But Not Completed</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from task_assign where to_user='$ur_id' and plan='0'");
        $da2 = $query->result();
        $da2 = $da2[0]->cont;
        if($da2>0){
        $data =$data. "<a href='alertpoint/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da2." Task Assign But Not Plan</b></div></a>";}
        $query=$this->db->query("SELECT * FROM user_day WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate'");
        $da3 = $query->result();
        if(!$da3){
        $data =$data. "<a href='DayManagement'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Started Your Day </b></div></a>";}
        $query=$this->db->query("SELECT * FROM `user_day` WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate' and uclose is null");
        $da4 = $query->result();
        if($da4){
        $data =$data. "<a href='DayManagement'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Closed Your Day</b></div></a>";}
        return $data;
     }
     public function get_pcpopup($ur_id){
        $tdate=date('Y-m-d');
        $bdate = date('Y-m-d', strtotime('-1 day'));
        $ndate = date('Y-m-d', strtotime('+1 day'));
        $data = '';
        $query=$this->db->query("SELECT count(*) b from user_day WHERE cast(ustart AS DATE)='$tdate' and scomment is null");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." User Started Day but You are not Taking Review</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from user_day WHERE cast(uclose AS DATE)='$bdate' and ccomment is null");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." User Closed a Day before but You are not Taking Review</b></div></a>";}
        return $data;
     }
     public function get_alertreply($ur_id,$code){
        $tdatet= date('Y-m-d H:i:s');
        $tdate= date('Y-m-d');
        $ndate = date('Y-m-d', strtotime($tdate . ' +1 day'));
        $bdate = date('Y-m-d', strtotime($tdate . ' -1 day'));
        $data = '';
        if($code==1){
             $query=$this->db->query("SELECT *,user_detail.id uuid FROM user_detail where user_detail.id not IN (SELECT user_day.user_id FROM user_day LEFT JOIN user_detail u1 ON u1.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate')");
             return $query->result();
         }
         if($code==2){
             $query=$this->db->query("SELECT *,user_detail.id uuid FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and scomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
            return $query->result();
         }
         if($code==3){
             $query=$this->db->query("SELECT *,user_details.user_id uuid FROM user_day LEFT JOIN user_details ON user_details.user_id=user_day.user_id WHERE cast(ustart as DATE)='$bdate' and uclose is null and cast(CURRENT_TIMESTAMP AS TIME)>'19:00:00'");
            return $query->result();
         }
         if($code==4){
             $query=$this->db->query("SELECT *,user_details.user_id uuid FROM user_day LEFT JOIN user_details ON user_details.user_id=user_day.user_id WHERE cast(uclose as DATE)='$bdate' and ccomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
             return $query->result();
         }
         if($code==201){
             $query=$this->db->query("SELECT *,u1.fullname pianame FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id WHERE spd.id not IN(SELECT allreviewdata.sid FROM allreviewdata WHERE allreviewdata.uid='1' OR allreviewdata.uid='4');");
             return $query->result();
         }
         if($code==202){
             $query=$this->db->query("SELECT *,u1.fullname pianame FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id WHERE spd.id not IN(SELECT allreviewdata.sid FROM allreviewdata WHERE allreviewdata.uid='1' OR allreviewdata.uid='4');");
             return $query->result();
         }
         if($code==203){
             $query=$this->db->query("SELECT *,u1.fullname pianame FROM spd LEFT JOIN user_detail u1 ON u1.id=spd.pi_id WHERE spd.id not IN(SELECT allreviewdata.sid FROM allreviewdata WHERE allreviewdata.uid='1' OR allreviewdata.uid='4');");
             return $query->result();
         }
     }
     public function get_inspending(){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During installation Check-List From' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE project_code!='' and spd.sayear='2023-24' and spd.pm_apr!='1'");
        return $query->result();
     }
     public function get_insreportpending(){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During installation Check-List From' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE project_code!='' and spd.sayear='2022-23' and spd.pm_apr!='1'");
        return $query->result();
     }
     public function get_fttppending(){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During FTTP Checklist' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_fttpreportpending(){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During FTTP Checklist' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload FTTP Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_utilisationpending(){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload FTTP Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Utilisation' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_inspendingbypi($piid){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During installation Check-List From' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE spd.pi_id='$piid' and project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_insreportpendingbypi($piid){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During installation Check-List From' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE spd.pi_id='$piid' and project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_fttppendingbypi($piid){
        $query=$this->db->query("SELECT spd.id sid,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload Installation Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During FTTP Checklist' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE spd.pi_id='$piid' and project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_fttpreportpendingbypi($piid){
        $query=$this->db->query("SELECT spd.id,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Visit' and task_assign.task_subtype='During FTTP Checklist' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload FTTP Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE spd.pi_id='$piid' and project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_utilisationpendingbypi($piid){
        $query=$this->db->query("SELECT spd.id,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Report' and task_assign.task_subtype='Upload FTTP Report' and plantask.tdone='1' and task_assign.spd_id=spd.id) abc,(SELECT MAX(task_assign.id) FROM task_assign LEFT JOIN plantask on plantask.taskid=task_assign.id WHERE task_assign.task_type='Utilisation' and plantask.tdone='1' and task_assign.spd_id=spd.id) abcd FROM spd WHERE spd.pi_id='$piid' and project_code!='' and spd.sayear='2022-23'");
        return $query->result();
     }
     public function get_pipopup($ur_id){
        $tdatet= date('Y-m-d H:i:s');
        $tdate= date('Y-m-d');
        $ndate = date('Y-m-d', strtotime($tdate . ' +1 day'));
        $bdate = date('Y-m-d', strtotime($tdate . ' -1 day'));
        $data = '';
        $data = $data."<center><h5 class='text-white'>Day Managment<h5></center><hr>";
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail)- COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Started Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and scomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Start Review Not Done</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and uclose is null and cast(CURRENT_TIMESTAMP AS TIME)>'19:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Closed Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(uclose as DATE)='$bdate' and ccomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/4'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Close Review a day befoue Not Done</b></div><a/>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Task Managment<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '09:00:00' and '11:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (09am to 11am)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '11:00:01' and '13:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/12'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (11am to 01pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '13:00:01' and '15:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/13'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (01pm to 03pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '15:00:01' and '17:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/14'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (03pm to 05pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '17:00:01' and '19:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/15'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (05pm to 07pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '19:00:01' and '21:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/16'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (07pm to 09pm)</b></div></a>";}
         return $data;
     }
     public function get_inspopup($ur_id){
        $tdatet= date('Y-m-d H:i:s');
        $tdate= date('Y-m-d');
        $ndate = date('Y-m-d', strtotime($tdate . ' +1 day'));
        $bdate = date('Y-m-d', strtotime($tdate . ' -1 day'));
        $data = '';
        $data = $data."<center><h5 class='text-white'>Day Managment<h5></center><hr>";
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail)- COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Started Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and scomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Start Review Not Done</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and uclose is null and cast(CURRENT_TIMESTAMP AS TIME)>'19:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Closed Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(uclose as DATE)='$bdate' and ccomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/4'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Close Review a day befoue Not Done</b></div><a/>";}
        date_default_timezone_set("Asia/Kolkata");
        $nextdate = date('Y-m-d', strtotime('+1 day'));
        $nxtdtask=$this->Menu_model->get_nxtdtask($ur_id,$nextdate);
        $nxtdplan = $this->Menu_model->get_nxtdplan($ur_id,$nextdate);
        if($nxtdplan[0]->cont > 0){
        $data = $data."<a href='#'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>You Are Not Plan for Next Day Task</b></div><a/>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Task Managment<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '09:00:00' and '11:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (09am to 11am)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '11:00:01' and '13:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/12'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (11am to 01pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '13:00:01' and '15:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/13'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (01pm to 03pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '15:00:01' and '17:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/14'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (03pm to 05pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '17:00:01' and '19:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/15'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (05pm to 07pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '19:00:01' and '21:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/16'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (07pm to 09pm)</b></div></a>";}
         return $data;
     }
     public function get_pmpopup($ur_id){
        $tdatet= date('Y-m-d H:i:s');
        $tdate= date('Y-m-d');
        $ndate = date('Y-m-d', strtotime($tdate . ' +1 day'));
        $bdate = date('Y-m-d', strtotime($tdate . ' -1 day'));
        $data = '';
        $data = $data."<center><h5 class='text-white'>Day Managment<h5></center><hr>";
        $query=$this->db->query("SELECT (SELECT count(*) FROM user_detail)- COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Started Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and scomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Start Review Not Done</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and uclose is null and cast(CURRENT_TIMESTAMP AS TIME)>'19:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Not Closed Their  Day</b></div><a/>";}
        $query=$this->db->query("SELECT COUNT(*) b FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(uclose as DATE)='$bdate' and ccomment is null and cast(CURRENT_TIMESTAMP AS TIME)>'11:00:00'");
        $da = $query->result();
        if($da[0]->b>0){
        $data = $data."<a href='".base_url()."Menu/AlertReply/4'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da[0]->b." User Day Close Review a day befoue Not Done</b></div><a/>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Task Managment<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '09:00:00' and '11:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/11'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (09am to 11am)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '11:00:01' and '13:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/12'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (11am to 01pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '13:00:01' and '15:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/13'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (01pm to 03pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '15:00:01' and '17:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/14'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (03pm to 05pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '17:00:01' and '19:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/15'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (05pm to 07pm)</b></div></a>";}
        $query=$this->db->query("SELECT count(*) b from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '19:00:01' and '21:00:00'");
        $da = $query->result();
        $da = $da[0]->b;
        if($da>0){
        $data = $data. "<a href='".base_url()."Menu/alertpoint/16'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Task Pending for Completion (07pm to 09pm)</b></div></a>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Approval<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) cont FROM `client_handover` WHERE projectcode is not null and pm_id='0'");
        $da30 = $query->result();
        $da30 = $da30[0]->cont;
        if($da30>0){
        $data =$data. "<a href='handoverDetail'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da30." Handover wating For Send to Factory</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from client_handover where apr='1'");
        $da20 = $query->result();
        $da20 = $da20[0]->cont;
        if($da20>0){
        $data =$data. "<a href='backdrop'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da20." Art Work Pending For Your Approval</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from client_handover where apr='2'");
        $da21 = $query->result();
        $da21 = $da21[0]->cont;
        if($da21>0){
        $data =$data. "<a href='alertpoint/1'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da21." Art Work Pending For BD Approval</b></div></a>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Long Time<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT sid) cont FROM allreviewdata WHERE uid='1' OR uid='4'");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/201'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School Review Pending by PM-ZH</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT sid) cont FROM allreviewdata WHERE uid!='1' AND uid!='4';");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/202'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School Review Pending by PIA</b></div></a>";}
        $query=$this->db->query("SELECT COUNT(DISTINCT project_code) cont from spd");
        $da = $query->result();
        $da = $da[0]->cont;
        $query=$this->db->query("SELECT COUNT(DISTINCT projectcode) cont FROM allreviewdata WHERE projectcode!='' and projectcode is not null");
        $d = $query->result();
        $d = $d[0]->cont;
        $da = $da-$d;
        if($da>0){
        $data =$data. "<a href='AlertReply/203'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." Program Review Pending</b></div></a>";}
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Others<h5></center><hr>";
        $data = $data."<hr>";
        $data = $data."<center><h5 class='text-white'>Factory Update!<h5></center><hr>";
        $query=$this->db->query("SELECT count(*) cont from client_handover where backdrop is null");
        $da22 = $query->result();
        $da22 = $da22[0]->cont;
        if($da22>0){
        $data =$data. "<a href='alertpoint/2'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da22." Art Work Pending For Designing</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from client_handover where apr='Reject'");
        $da23 = $query->result();
        $da23 = $da23[0]->cont;
        if($da23>0){
        $data =$data. "<a href='alertpoint/3'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da23." Art Work is in Reject Status For Re-Designing</b></div></a>";}
        $query=$this->db->query("select count(*) cont from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm is null");
        $da24 = $query->result();
        $da24 = $da24[0]->cont;
        if($da24>0){
        $data =$data. "<a href='MaintenanceReport'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da24." Model wating for PM Approval</b></div></a>";}
        $query=$this->db->query("select count(*) cont from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm='1' and tostore='0'");
        $da25 = $query->result();
        $da25 = $da25[0]->cont;
        if($da25>0){
        $data =$data. "<a href='alertpoint/4'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da25." Model wating for FM Approval</b></div></a>";}
        $query=$this->db->query("select count(*) cont from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm='1' and tostore='1' and closedt is null");
        $da26 = $query->result();
        $da26 = $da26[0]->cont;
        if($da26>0){
        $data =$data. "<a href='alertpoint/5'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da26." Model wating for Replacement</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont FROM `mbagqty` WHERE request='1' and pm='0' and qty>0");
        $da27 = $query->result();
        $da27 = $da27[0]->cont;
        if($da27>0){
        $data =$data. "<a href='alertpoint/6'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da27." Maintenance Bag Material wating for PM Approval</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont FROM `mbagqty` WHERE pm='1' and fm='0' and qty>0");
        $da28 = $query->result();
        $da28 = $da28[0]->cont;
        if($da28>0){
        $data =$data. "<a href='alertpoint/7'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da28." Maintenance Bag Material wating for FM Approval</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from spd where status='7'");
        $da = $query->result();
        $da = $da[0]->cont;
        if($da>0){
        $data =$data. "<a href='alertpoint/8'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da." School in is Inactive Status</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from plantask where tdone='0'");
        $da1 = $query->result();
        $da1 = $da1[0]->cont;
        if($da1>0){
        $data =$data. "<a href='alertpoint/9'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da1." Task Plan But Not Completed</b></div></a>";}
        $query=$this->db->query("SELECT count(*) cont from task_assign where plan='0'");
        $da2 = $query->result();
        $da2 = $da2[0]->cont;
        if($da2>0){
        $data =$data. "<a href='alertpoint/10'><div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da2." Task Assign But Not Plan</b></div></a>";}
        $query=$this->db->query("SELECT * FROM user_day WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate'");
        $da3 = $query->result();
        if(!$da3){
        $data =$data. "<div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Started Your Day </b></div>";}
        $query=$this->db->query("SELECT * FROM `user_day` WHERE user_id='$ur_id' and cast(ustart as DATE)='$tdate' and uclose is null");
        $da4 = $query->result();
        if($da4){
        $data =$data. "<div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Today You Are Not Closed Your Day</b></div>";}
        $query=$this->db->query("SELECT count(*) cont FROM `user_day` WHERE cast(ustart as DATE)='$tdate' and uclose is null");
        $da5 = $query->result();
        $da5 = $da5[0]->cont;
        if($da5>0){
        $data =$data. "<div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da5." Users Day Started But not Closed</b></div>";}
        $query=$this->db->query("SELECT count(*) cont FROM user_detail");
        $da7 = $query->result();
        $da7 = $da7[0]->cont;
        $query=$this->db->query("SELECT count(*) cont FROM user_day WHERE cast(ustart as DATE)='$tdate' and uclose is null");
        $da6 = $query->result();
        $da6 = $da7-$da6[0]->cont;
        if($da6>0){
        $data =$data. "<div class='rounded border border-white text-center p-1 m-1 bg-danger text-white'><b>Total ".$da6." Users not Started their Day</b></div>";}
        return $data;
     }
    public function get_cctd($tid){
        $query=$this->db->query("SELECT *,task_assign.id tid,plantask.id pid, spd.id sid, spd.project_code pcode FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code LEFT JOIN spd_contact ON spd_contact.sid=spd.id LEFT JOIN status ON status.id=spd.status where task_assign.id='$tid' and spd_contact.main='1'");
        return $query->result();
    }
    public function get_curiculumstarted($piid){
        $query=$this->db->query("SELECT piid FROM curiculumtask where startt is not null and closet is null and piid='$piid'");
        return $query->result();
    }
    public function get_piidtoar($piid){
        $query=$this->db->query("SELECT MAX(sid) msid FROM annualreview2 WHERE piid='$piid'");
        $data =  $query->result();
        if($data){$msid = $data[0]->msid;}else{$msid=0;}
        $query=$this->db->query("SELECT *,spd.id sid FROM spd WHERE id>'$msid' and pi_id='$piid' and pm_apr='1' limit 1");
        return $query->result();
    }
    public function get_cctdp($tid){
        $query=$this->db->query("SELECT *, task_assign.project_code pcode,task_assign.id tid, plantask.id pid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id where task_assign.id='$tid'");
        return $query->result();
    }
    public function get_pagedata($page){
        $query=$this->db->query("select * from question_set where page='$page'");
        return $query->result();
    }
    public function get_tdetail($uid,$tdate){
        $query=$this->db->query("SELECT COUNT(*) as a,count(CASE WHEN plan=1 THEN plan end) as b, count(CASE WHEN plan=0 THEN plan end) as c, count(CASE WHEN tdone=1 THEN plan end) as d,count(CASE WHEN tdone=0 THEN plan end) as e FROM task_assign Left JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.to_user='$uid' and cast(task_assign.task_date as DATE)='$tdate'");
        return $query->result();
    }
    public function get_tdetailbyzh($uid,$tdate){
        $query=$this->db->query("SELECT COUNT(*) as a,count(CASE WHEN plan=1 THEN plan end) as b, count(CASE WHEN plan=0 THEN plan end) as c, count(CASE WHEN tdone=1 THEN plan end) as d,count(CASE WHEN tdone=0 THEN plan end) as e FROM task_assign Left JOIN plantask ON plantask.taskid=task_assign.id JOIN user_detail ON user_detail.id=task_assign.to_user WHERE user_detail.adminid='$uid' and cast(task_assign.task_date as DATE)='$tdate'");
        return $query->result();
    }
    public function get_tdetailbyaction($uid,$action,$tdate){
        $query=$this->db->query("SELECT COUNT(*) as a,count(CASE WHEN plan=1 THEN plan end) as b, count(CASE WHEN plan=0 THEN plan end) as c, count(CASE WHEN tdone=1 THEN plan end) as d,count(CASE WHEN tdone=0 THEN plan end) as e FROM task_assign Left JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.to_user='$uid' and plantask.action='$action' and cast(task_assign.task_date as DATE)='$tdate'");
        return $query->result();
    }
    public function get_plantime($uid,$tdate){
        $dt = 0;
        $da=0;
        $ttm=0;
        $query=$this->db->query("SELECT * FROM action");
        $data = $query->result();
        foreach($data as $d){
        $action = $d->name;
        $query1=$this->db->query("SELECT count(*) as cont FROM `plantask` WHERE cast(plandate as DATE)='$tdate' and action='$action' and user_id='$uid'");
        $data1 = $query1->result();
        if($data1){
            if($action=='Call'){$tspt=10;}
            if($action=='Utilisation'){$tspt=10;}
            if($action=='Review'){$tspt=2;}
            if($action=='Report'){$tspt=5;}
            if($action=='Communication'){$tspt=5;}
            if($action=='Visit'){$tspt=360;}
            $dt = $data1[0]->cont;
            $da = $da+$dt;
            $ttm = $ttm+ $tspt*$dt;
        }}
        $seconds = $ttm*60;
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;
        $fphm= ((int)$hrs."H " .(int)$mins."M ".(int)$secs."S");
        return $fphm;
    }
    public function get_planetime($uid,$tdate){
        $dt = 0;
        $da=0;
        $ttm=0;
        $query=$this->db->query("SELECT * FROM action");
        $data = $query->result();
        foreach($data as $d){
        $action = $d->name;
        $query1=$this->db->query("SELECT count(*) as cont FROM `plantask` WHERE cast(plandate as DATE)='$tdate' and action='$action' and user_id='$uid' and tdone=1");
        $data1 = $query1->result();
        if($data1){
            if($action=='Call'){$tspt=10;}
            if($action=='Utilisation'){$tspt=10;}
            if($action=='Review'){$tspt=2;}
            if($action=='Report'){$tspt=5;}
            if($action=='Communication'){$tspt=5;}
            if($action=='Visit'){$tspt=360;}
            $dt = $data1[0]->cont;
            $da = $da+$dt;
            $ttm = $ttm+ $tspt*$dt;
        }}
        $seconds = $ttm*60;
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;
        $fphm= ((int)$hrs."H " .(int)$mins."M ".(int)$secs."S");
        return $fphm;
    }
    public function get_reppc(){
        $query=$this->db->query("select client_handover.id pid,spd.project_code,count(DISTINCT replacereq.sid) as nofschool,COUNT(replacereq.id) nofmodel from replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code GROUP BY spd.project_code,client_handover.id");
        return $query->result();
    }
    public function get_RIDPending(){
        $query=$this->db->query("SELECT client_handover.projectcode projectcode, client_handover.id cid,spd.id sid, spd.sname, COUNT(*) noofmodel, replacereq.tid tid FROM replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where replacereq.status='Open' GROUP BY spd.sname,spd.id,replacereq.tid,client_handover.id,client_handover.projectcode");
        return $query->result();
    }
    public function get_repschoolwise($pid){
        $query=$this->db->query("select client_handover.id pid,spd.project_code,spd.id sid,spd.sname,count(DISTINCT replacereq.sid) as nofschool,COUNT(replacereq.id) nofmodel from replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where tofm='1' and client_handover.id='$pid' GROUP BY spd.project_code,spd.id,spd.sname,client_handover.id");
        return $query->result();
    }
    public function get_allrepmodelwise(){
        $query=$this->db->query("select replacereq.modelimg mimg, replacereq.sdatet adate,replacereq.modelimg modelimg,replacereq.fgremark fgremark, replacereq.id rrid, client_handover.id pid,spd.project_code,spd.id sid,spd.sname,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type from replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where replacereq.status!='Close' and replacereq.tofm is Null GROUP BY spd.project_code,spd.id,spd.sname,client_handover.id,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type,replacereq.id ORDER BY adate DESC");
        return $query->result();
    }
    public function get_repmodelwisebyid($rrid){
        $query=$this->db->query("select replacereq.id rrid, client_handover.id pid,spd.project_code,spd.id sid,spd.sname,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type from replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where tofm='1' and replacereq.id='$rrid' GROUP BY spd.project_code,spd.id,spd.sname,client_handover.id,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type,replacereq.id");
        return $query->result();
    }
    public function repair_fmbag($rrid){
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("update replacereq set tofm='3',rmcheckdt='$date',rmremark='Repair From Maintenance Bag' where id='$rrid'");
    }
    public function rr_Closed($rrid){
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("Update replacereq set status='Close', closedt='$date', rmremark='Close By Ravindra Yadav' where id='$rrid'");
    }
    public function send_tofactory($rrid){
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("Update replacereq set tofm='1' where id='$rrid' and tofm is null");
    }
    public function rrr_chenge($rrid,$type,$pmname,$remark){
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("update replacereq set type='$type',part_name='$pmname',remark='$remark' where id='$rrid'");
    }
    public function get_repmodelwise($sid){
        $query=$this->db->query("select client_handover.id pid,spd.project_code,spd.id,spd.sname,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type from replacereq inner join spd on spd.id = replacereq.sid inner join client_handover ON client_handover.projectcode=spd.project_code where tofm='1' and spd.id='$sid' GROUP BY spd.project_code,spd.id,spd.sname,client_handover.id,replacereq.model_name,replacereq.part_name,replacereq.remark,replacereq.type;");
        return $query->result();
    }
    public function get_modelimage($sid,$mname){
        $query=$this->db->query("SELECT modelimg FROM model_install WHERE spd_id='$sid' AND model_name='$mname' and modelimg is not null");
        return $query->result();
    }
    public function get_rrreq(){
        $query=$this->db->query("select * from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm='1'");
        return $query->result();
    }
    public function get_repairpc(){
        $query=$this->db->query("select * from repairreq inner join spd on spd.id = repairreq.sid WHERE repairreq.tofm='0'");
        return $query->result();
    }
    public function get_testcode(){
        $query=$this->db->query("SELECT * FROM spd");
        return $query->result();
    }
    public function get_repsm($pcode){
        $query=$this->db->query("select replacereq.sid as csid,COUNT(model_name) as model from replacereq inner join spd on spd.id = replacereq.sid where spd.project_code='$pcode' and replacereq.tofm is null GROUP BY replacereq.sid");
        return $query->result();
    }
    public function get_repspdm($sid){
        $query=$this->db->query("select * from replacereq where sid='$sid'");
        return $query->result();
    }
    public function get_reptofm($pcode){
        $query=$this->db->query("select replacereq.sid as csid from replacereq inner join spd on spd.id = replacereq.sid where spd.project_code='$pcode' GROUP BY replacereq.sid");
        $data = $query->result();
        foreach($data as $d){
            $sid = $d->csid;
            $query=$this->db->query("update replacereq set tofm='1' WHERE sid='$sid'");
        }
    }
    public function get_spdbycid($cid){
        $query=$this->db->query("select * from spd where cid='$cid' and ins_id is null");
        return $query->result();
    }
    public function get_spdbypiid($uid){
        $query=$this->db->query("select * from spd where pi_id='$uid' and pm_apr='1'");
        return $query->result();
    }
    public function get_totaltaktimep($uid,$tdate) {
        $query = $this->db->query("SELECT (COUNT(CASE WHEN action = 'Call' THEN 1 END) * 5 + COUNT(CASE WHEN action = 'Utilisation' THEN 1 END) * 5 + COUNT(CASE WHEN action = 'Visit' THEN 1 END) * 45) AS ttime FROM plantask WHERE user_id = '8' AND CAST(plandate AS DATE) = '2023-10-07'");
        return $query->result();
    }
    public function get_totaltaktimepbyh($uid,$tdate,$t1,$t2) {
        $query = $this->db->query("SELECT (COUNT(CASE WHEN action = 'Call' THEN 1 END) * 5 + COUNT(CASE WHEN action = 'Utilisation' THEN 1 END) * 5 + COUNT(CASE WHEN action = 'Visit' THEN 1 END) * 45) AS ttime FROM plantask WHERE user_id = '8' AND CAST(plandate AS DATE) = '2023-10-07' and cast(plandate AS TIME) BETWEEN '$t1' and '$t2'");
        return $query->result();
    }
    public function get_timeslot(){
        $query=$this->db->query("SELECT * FROM timeslot");
        return $query->result();
    }
    public function get_ttbytimedaction($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT action.name acname,action.clr aclr,COUNT(*) cont from plantask LEFT JOIN action ON action.name=plantask.action WHERE user_id='8' and cast(plandate AS DATE)='2023-10-07' and cast(plandate AS TIME) BETWEEN '$t1' and '$t2' GROUP BY action.name,action.clr ORDER BY `acname` ASC");
        return $query->result();
    }
    public function get_ttbytimedstatus($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT status.name stname, status.clr sclr,COUNT(*) cont from plantask LEFT join spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='$uid' and cast(plandate AS DATE)='2023-10-07' and cast(plandate AS TIME) BETWEEN '$t1' and '$t2' GROUP BY status.name,status.clr ORDER BY status.name ASC");
        return $query->result();
    }
    public function get_tttbytimedaction($uid,$tdate){
        $query=$this->db->query("SELECT action.name acname,action.clr aclr, COUNT(*) cont from plantask LEFT JOIN action ON action.name=plantask.action WHERE user_id='8' and cast(plandate AS DATE)='2023-10-07' GROUP BY action.name,action.clr ORDER BY acname ASC");
        return $query->result();
    }
    public function get_tttbytimedstatus($uid,$tdate){
        $query=$this->db->query("SELECT status.name stname, status.clr sclr,COUNT(*) cont from plantask LEFT join spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='8' and cast(plandate AS DATE)='2023-10-07' GROUP BY status.name,status.clr ORDER BY status.name ASC");
        return $query->result();
    }
    public function get_pcbypiid($uid){
        $query=$this->db->query("select distinct project_code from spd where pi_id='$uid'");
        return $query->result();
    }
    public function get_pcbyspd(){
        $query=$this->db->query("select distinct project_code from spd where project_code!=''");
        return $query->result();
    }
    public function get_ptline($pcode){
        $query=$this->db->query("select distinct projectcode from programtimeline where projectcode='$pcode'");
        return $query->result();
    }
    public function get_week(){
        $weeks = [
            1  => 'January',
            2  => 'January',
            3  => 'January',
            4  => 'January',
            5  => 'January',
            6  => 'February',
            7  => 'February',
            8  => 'February',
            9  => 'February',
            10 => 'March',
            11 => 'March',
            12 => 'March',
            13 => 'March',
            14 => 'April',
            15 => 'April',
            16 => 'April',
            17 => 'April',
            18 => 'April',
            19 => 'May',
            20 => 'May',
            21 => 'May',
            22 => 'May',
            23 => 'June',
            24 => 'June',
            25 => 'June',
            26 => 'June',
            27 => 'July',
            28 => 'July',
            29 => 'July',
            30 => 'July',
            31 => 'August',
            32 => 'August',
            33 => 'August',
            34 => 'August',
            35 => 'August',
            36 => 'September',
            37 => 'September',
            38 => 'September',
            39 => 'September',
            40 => 'September',
            41 => 'October',
            42 => 'October',
            43 => 'October',
            44 => 'October',
            45 => 'November',
            46 => 'November',
            47 => 'November',
            48 => 'November',
            49 => 'November',
            50 => 'December',
            51 => 'December',
            52 => 'December',
            53 => 'December'
        ];
        $result = [];
        for ($weekNumber = 1; $weekNumber <= 53; $weekNumber++) {
            $month = $weeks[$weekNumber];
            $result[$weekNumber] = $month;
        }
        return $result;
    }
    public function get_mspd(){
        $query=$this->db->query("select * from spd where pm_apr=1");
        return $query->result();
    }
    public function get_mspdupc($piid){
        $query=$this->db->query("select distinct project_code from spd where pm_apr!=0 and pi_id='$piid'");
        return $query->result();
    }
    public function get_mspdpi($pi,$status){
        if($status==0){
            $query=$this->db->query("select * from spd where pm_apr='1' and pi_id='$pi'");
        }else{
            $query=$this->db->query("select * from spd where pm_apr='1' and pi_id='$pi' and status='$status'");
        }
        return $query->result();
    }
    public function get_mspdzh($zh,$status){
        if($status==0){$query=$this->db->query("select * from spd where zh_id='$zh'");
        }else{
            $query=$this->db->query("select * from spd where zh_id='$zh' and status='$status'");
        }
        return $query->result();
    }
    public function get_mspdpm($zh,$status){
        if($status==0){$query=$this->db->query("select * from spd left join client_handover on client_handover.projectcode=spd.project_code where pi_id!=''");
        }else{
            $query=$this->db->query("select * from spd left join client_handover on client_handover.projectcode=spd.project_code where pi_id!='' and spd.status='$status'");
        }
        return $query->result();
    }
    public function get_mspdbbyststus($status){
        if($status=='AllSchool'){
            $query=$this->db->query("select * from spd where pm_apr=1 OR pm_apr=3");
        }
        else{
            if($status=='NewSchool'){$s=1;}
            if($status=='FTTPDone'){$s=2;}
            if($status=='ActiveSchool'){$s=3;}
            if($status=='AverageSchool'){$s=4;}
            if($status=='GoodSchool'){$s=5;}
            if($status=='ModelSchool'){$s=6;}
            if($status=='InactiveSchool'){$s=7;}
            if($status=='ClientReadiness'){$s=8;}
            $query=$this->db->query("select * from spd where status='$s'");
        }
        return $query->result();
    }
    public function get_nspdpc($uid){
        $query=$this->db->query("select DISTINCT project_code from spd where status=1 and zh_id='$uid'");
        return $query->result();
    }
    public function get_ospdpc($uid){
        $query=$this->db->query("select DISTINCT project_code from spd where status=4 and zh_id='$uid'");
        return $query->result();
    }
    public function get_report($id){
        $query=$this->db->query("SELECT * FROM report WHERE spd_id='$id'");
        return $query->result();
    }
    public function get_reportbypc($pc){
        $query=$this->db->query("SELECT * FROM report WHERE project_code='$pc'");
        return $query->result();
    }
    public function get_reportbypcy($pc,$ayear){
        $query=$this->db->query("SELECT * FROM report WHERE project_code='$pc' and year='$ayear'");
        return $query->result();
    }
    public function get_reportbysid($sid,$type){
        $query=$this->db->query("SELECT * FROM report WHERE spd_id='$sid' and report_type='$type'");
        return $query->result();
    }
    public function get_reportbystid($tid){
        $query=$this->db->query("SELECT * FROM report WHERE tid='$tid'");
        return $query->result();
    }
    public function get_commbystid($tid,$sid){
        $query=$this->db->query("SELECT * FROM wgdata WHERE tid='$tid' and sid='$sid'");
        return $query->result();
    }
    public function get_commbytid($tid){
        $query=$this->db->query("SELECT * FROM wgdata WHERE tid='$tid'");
        return $query->result();
    }
    public function get_spdbyid($sid){
        $query=$this->db->query("select * from spd where id='$sid'");
        return $query->result();
    }
    public function get_region(){
        $query=$this->db->query("select * from region");
        return $query->result();
    }
    public function get_regionbyid($rid){
        $query=$this->db->query("select * from region where id='$rid'");
        return $query->result();
    }
    public function get_state(){
        $query=$this->db->query("select * from state");
        return $query->result();
    }
    public function get_spdbydata($user_id,$status,$fdate,$tdate,$type){
        $query=$this->db->query("select * from spd");
        return $query->result();
    }
    public function get_spdbypc($projcode){
        $query=$this->db->query("select * from spd where project_code='$projcode'");
        return $query->result();
    }
    public function get_spdbyclient($client){
        $query=$this->db->query("select * from spd where clientname='$client'");
        return $query->result();
    }
    public function get_spdbypcbystatus($projcode,$stid){
        if($projcode==''){
            $query=$this->db->query("select * from spd where status='$stid' and ins_id!='' and id!='0'");
            return $query->result();
        }else{
            $query=$this->db->query("select * from spd where project_code='$projcode' and status='$stid' and pm_apr='1'");
            return $query->result();
        }
    }
    public function get_spdbypcbypi($pcode,$piid){
        $query=$this->db->query("select * from spd where project_code='$pcode' and pi_id='$piid'");
        return $query->result();
    }
    public function get_spdbypipc($projcode,$piid){
        $query=$this->db->query("select *,u1.fullname piname, u2.fullname insname from spd left join user_detail u1 on u1.id=spd.pi_id left join user_detail u2 on u2.id=spd.ins_id where project_code='$projcode' and pi_id='$piid'");
        return $query->result();
    }
    public function get_utibymy($sid,$year,$month){
        $query=$this->db->query("SELECT spd.project_code,spd.sname,spd.scity,spd.sstate, COUNT(*) utilisation FROM plantask LEFT JOIN spd on spd.id=plantask.spd_id WHERE action='Utilisation'  and spd.id='$sid' and YEAR(plantask.plandate)='$year' and MONTH(plantask.plandate)='$month' GROUP BY YEAR(plantask.plandate), MONTH(plantask.plandate)");
        return $query->result();
    }
    public function get_projectbypia($piid){
        $query=$this->db->query("select distinct project_code from spd where pi_id='$piid'");
        return $query->result();
    }
    public function get_aotask($uid){
        $query=$this->db->query("select * from aotask where closetask is null limit 1");
        return $query->result();
    }
    public function get_bdrequest(){
        $query=$this->db->query("select * from bdrequest where status='0'");
        return $query->result();
    }
    public function get_bdrequestall(){
        $query=$this->db->query("select * from bdrequest");
        return $query->result();
    }
    public function get_projectdetail($projcode){
        $query=$this->db->query("SELECT count(case when checklist='page6' then checklist end) ins,count(case when checklist='page5' then checklist end) fttp,count(case when checklist='page31' then checklist end) rttp,count(case when checklist='page26' then checklist end) main,count(case when checklist='page28' then checklist end) diy,count(case when checklist='page23' then checklist end) mne, count(case when action='Call' then action end) tcall, count(case when action='Visit' then action end) visit, count(case when action='Utilisation' then action end) utilisation, count(case when action='Communication' then action end) outbond FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE project_code='$projcode' and plantask.tdone='1'");
        return $query->result();
    }
    public function get_projlsc($projcode){
        $query=$this->db->query("SELECT GROUP_CONCAT(DISTINCT slanguage) language, GROUP_CONCAT(DISTINCT sstate) state, GROUP_CONCAT(DISTINCT scity) city FROM spd WHERE project_code='$projcode'");
        return $query->result();
    }
    public function get_usertaskdetail($sdate,$edate,$dep){
        $query=$this->db->query("SELECT user_detail.fullname, count(case when checklist='page6' then checklist end) ins,count(case when checklist='page5' then checklist end) fttp,count(case when checklist='page31' then checklist end) rttp,count(case when checklist='page26' then checklist end) main,count(case when checklist='page28' then checklist end) diy,count(case when checklist='page23' then checklist end) mne, count(case when action='Call' then action end) tcall, count(case when action='Visit' then action end) visit, count(case when action='Utilisation' then action end) utilisation, count(case when action='Communication' then action end) outbond, count(case when action='Report' then action end) report FROM task_assign LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE plantask.tdone='1' and user_detail.dep_id='$dep' and cast(plantask.donet as DATE) BETWEEN '$sdate' AND '$edate' GROUP by user_detail.fullname");
        return $query->result();
    }
    public function get_NIProgram(){
        $query=$this->db->query("SELECT expected_installation_date eidate,client_handover.backdrop,client_handover.client_name cname, client_handover.bd_id bdid,client_handover.project_year pyear, project_code pcode,client_handover.id pid,cast(client_handover.sdatet as DATE) handbdtofm FROM spd LEFT join client_handover ON client_handover.projectcode=spd.project_code WHERE  client_handover.id is not null and pm_apr='0' and project_code is not null GROUP BY project_code,client_handover.id,client_handover.sdatet,client_handover.bd_id,client_handover.project_year,client_handover.client_name,client_handover.backdrop,expected_installation_date ORDER BY `handbdtofm` ASC");
        return $query->result();
    }
    public function get_PIATASKDETAIL(){
        $query=$this->db->query("SELECT id piid,fullname piname,(SELECT COUNT(*) FROM task_assign WHERE task_assign.to_user=user_detail.id AND task_assign.plan='0') uptask,(SELECT COUNT(*) FROM plantask WHERE plantask.user_id=user_detail.id AND plantask.initiateddt is null and plantask.tdone='0') pbnstask ,(SELECT COUNT(*) FROM plantask WHERE plantask.user_id=user_detail.id AND plantask.initiateddt is not null and plantask.tdone='0') sbncptask FROM user_detail WHERE dep_id='2'");
        return $query->result();
    }
    public function get_allusertaskdetail($date){
        $query=$this->db->query("SELECT user_detail.fullname, count(case when checklist='page6' then checklist end) ins,count(case when checklist='page5' then checklist end) fttp,count(case when checklist='page31' then checklist end) rttp,count(case when checklist='page26' then checklist end) main,count(case when checklist='page28' then checklist end) diy,count(case when checklist='page23' then checklist end) mne, count(case when action='Call' then action end) tcall, count(case when action='Visit' then action end) visit, count(case when action='Utilisation' then action end) utilisation, count(case when action='Communication' then action end) outbond, count(case when action='Report' then action end) report FROM task_assign LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE plantask.tdone='1' and cast(plantask.donet as DATE)='$date' GROUP by user_detail.fullname");
        return $query->result();
    }
    public function get_worktime($date,$fullname){
        $query=$this->db->query("SELECT user_detail.fullname, (count(case when action='Call' then action end)*5 + count(case when action='Visit' then action end)*360 + count(case when action='Utilisation' then action end)*5 + count(case when action='Communication' then action end)*5 + count(case when action='Report' then action end)*30 ) worktime FROM task_assign LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE plantask.tdone='1' and cast(plantask.donet as DATE)='$date' and user_detail.fullname='$fullname'");
        return $query->result();
    }
    public function get_utdetail($sdate,$edate,$piid){
        $query=$this->db->query("SELECT user_detail.fullname, count(case when checklist='page6' then checklist end) ins,count(case when checklist='page5' then checklist end) fttp,count(case when checklist='page31' then checklist end) rttp,count(case when checklist='page26' then checklist end) main,count(case when checklist='page28' then checklist end) diy,count(case when checklist='page23' then checklist end) mne, count(case when action='Call' then action end) tcall, count(case when action='Visit' then action end) visit, count(case when action='Utilisation' then action end) utilisation, count(case when action='Communication' then action end) outbond,count(case when action='Report' then action end) report FROM task_assign LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE plantask.tdone='1' and user_detail.id='$piid' and cast(plantask.donet as DATE) BETWEEN '$sdate' AND '$edate'");
        return $query->result();
    }
    public function get_userpendingtaskdetail($sdate,$edate,$dep){
        $query=$this->db->query("SELECT user_detail.fullname, count(case when checklist='page6' then checklist end) ins,count(case when checklist='page5' then checklist end) fttp,count(case when checklist='page31' then checklist end) rttp,count(case when checklist='page26' then checklist end) main,count(case when checklist='page28' then checklist end) diy,count(case when checklist='page23' then checklist end) mne, count(case when action='Call' then action end) tcall, count(case when action='Visit' then action end) visit, count(case when action='Utilisation' then action end) utilisation, count(case when action='Communication' then action end) outbond, count(case when action='Report' then action end) report FROM task_assign LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE plantask.tdone='0' and user_detail.dep_id='$dep' and cast(plantask.plandate as DATE) BETWEEN '$sdate' AND '$edate' GROUP by user_detail.fullname");
        return $query->result();
    }
    public function get_replan(){
        $query=$this->db->query("SELECT plantask.taskid FROM plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id WHERE plantask.tdone='0' and user_detail.dep_id='4'");
        $data =  $query->result();
        foreach ($data as $dt){
            $tid = $dt->taskid;
            $this->db->query("DELETE FROM plantask WHERE taskid=$tid");
            $this->db->query("Update task_assign set plan='0' WHERE id=$tid");
        }
    }
    public function get_userreportdetail($sdate,$edate,$fullname){
        $query=$this->db->query("SELECT user_detail.fullname,COUNT(case WHEN report_type='Upload FTTP Report' THEN report_type END) ufttp, COUNT(case WHEN report_type='Upload RTTP Report' THEN report_type END) urttp, COUNT(case WHEN report_type='Upload Installation Report' THEN report_type END) uins, COUNT(case WHEN report_type='Upload Maintenance Report' THEN report_type END) umain, COUNT(case WHEN report_type='Upload M&E Report' THEN report_type END) umne, COUNT(case WHEN report_type='Upload DIY Report' THEN report_type END) udiy FROM report LEFT JOIN task_assign ON task_assign.id=report.tid LEFT JOIN user_detail on user_detail.id=task_assign.to_user WHERE user_detail.fullname='$fullname' and cast(report.sdatet as DATE) BETWEEN '$sdate' AND '$edate'");
        return $query->result();
    }
    public function get_alluserreportdetail($date,$fullname){
        $query=$this->db->query("SELECT user_detail.fullname,COUNT(case WHEN report_type='Upload FTTP Report' THEN report_type END) ufttp, COUNT(case WHEN report_type='Upload RTTP Report' THEN report_type END) urttp, COUNT(case WHEN report_type='Upload Installation Report' THEN report_type END) uins, COUNT(case WHEN report_type='Upload Maintenance Report' THEN report_type END) umain, COUNT(case WHEN report_type='Upload M&E Report' THEN report_type END) umne, COUNT(case WHEN report_type='Upload DIY Report' THEN report_type END) udiy FROM report LEFT JOIN task_assign ON task_assign.id=report.tid LEFT JOIN user_detail on user_detail.id=task_assign.to_user WHERE user_detail.fullname='$fullname' and cast(report.sdatet as DATE)='$date'");
        return $query->result();
    }
    public function get_pmtaskbypc($project_code){
        $query=$this->db->query("SELECT COUNT(*) as a,COUNT(CASE WHEN plantask.tdone='1' THEN plantask.tdone end) as b,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken='yes' THEN plantask.tdone end) as c,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken is null THEN plantask.tdone end) as d FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE user_detail.dep_id='12' and task_assign.project_code='$project_code'");
        return $query->result();
    }
    public function get_dpidbypc($projcode){
        $query=$this->db->query("select DISTINCT pi_id from spd where project_code='$projcode'");
        return $query->result();
    }
    public function get_dinsdbypc($projcode){
        $query=$this->db->query("select DISTINCT ins_id from spd where project_code='$projcode'");
        return $query->result();
    }
    public function get_dzhdbypc($projcode){
        $query=$this->db->query("select DISTINCT zh_id from spd where project_code='$projcode'");
        return $query->result();
    }
    public function  get_repairreqbypc($pcode){
        $query=$this->db->query("SELECT * FROM repairreq LEFT JOIN spd on spd.id=repairreq.sid where spd.project_code='$pcode'");
        return $query->result();
    }
    public function  get_replacereqbypc($pcode){
        $query=$this->db->query("SELECT * FROM replacereq LEFT JOIN spd on spd.id=replacereq.sid where spd.project_code='$pcode'");
        return $query->result();
    }
    public function get_zmbypc($project_code,$zh){
        $query=$this->db->query("SELECT COUNT(*) as a,COUNT(CASE WHEN plantask.tdone='1' THEN plantask.tdone end) as b,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken='yes' THEN plantask.tdone end) as c,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken is null THEN plantask.tdone end) as d FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE user_detail.dep_id='11' and task_assign.project_code='$project_code' and user_detail.id='$zh'");
        return $query->result();
    }
    public function get_pibypc($project_code,$pi){
        $query=$this->db->query("SELECT COUNT(*) as a,COUNT(CASE WHEN plantask.tdone='1' THEN plantask.tdone end) as b,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken='yes' THEN plantask.tdone end) as c,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken is null THEN plantask.tdone end) as d FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE user_detail.dep_id='2' and task_assign.project_code='$project_code' and user_detail.id='$pi'");
        return $query->result();
    }
    public function get_insbypc($project_code,$ins){
        $query=$this->db->query("SELECT COUNT(*) as a,COUNT(CASE WHEN plantask.tdone='1' THEN plantask.tdone end) as b,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken='yes' THEN plantask.tdone end) as c,COUNT(CASE WHEN plantask.tdone='1'and plantask.actiontaken is null THEN plantask.tdone end) as d FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE user_detail.dep_id='4' and task_assign.project_code='$project_code' and user_detail.id='$ins'");
        return $query->result();
    }
    public function get_dispatch($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT dispatchdt FROM unique_model WHERE project='$pcode' limit 1");
        return $query->result();
     }
    public function get_pcodebyyearnzhid($year,$zhid){
        $query=$this->db->query("SELECT DISTINCT spd.project_code FROM spd LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code WHERE spd.zh_id='$zhid' and client_handover.project_year='$year'");
        return $query->result();
    }
    public function get_progprelogs($cid){
        $query=$this->db->query("SELECT * FROM `handoverlog` LEFT JOIN client_handover on client_handover.id=handoverlog.cid WHERE cid='$cid' ORDER BY `handoverlog`.`sdatet`  ASC");
        return $query->result();
    }
    public function get_taskbypcode($pcode){
        $query=$this->db->query("SELECT *,task_assign.id as tid, spd.id as sid,task_assign.sdatet as tassignd FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN report ON report.tid=task_assign.id WHERE task_assign.project_code='$pcode' ORDER BY `task_assign`.`sdatet` DESC");
        return $query->result();
    }
    public function get_taskbyaction($action){
        $query=$this->db->query("SELECT spd.project_code,spd.sname,user_detail.fullname,plantask.donet,plantask.id pid FROM task_assign LEFT JOIN user_detail on user_detail.id=task_assign.to_user LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN report ON report.tid=task_assign.id WHERE plantask.action='$action' and tdone='1' ORDER BY plantask.donet DESC");
        return $query->result();
    }
    public function get_taskbypcodebypi($pcode,$piid){
        $query=$this->db->query("SELECT *,task_assign.id as tid, spd.id as sid,task_assign.sdatet as tassignd FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN report ON report.tid=task_assign.id WHERE plantask.user_id='$piid' and task_assign.project_code='$pcode' ORDER BY `task_assign`.`sdatet` DESC");
        return $query->result();
    }
    public function change_insp($sid,$ins){
       $query=$this->db->query("update spd set ins_id='$ins' where id='$sid'");
       $query=$this->db->query("update task_assign LEFT JOIN user_detail on user_detail.id=task_assign.to_user set to_user='$ins' where spd_id='$sid' and plan='0' and user_detail.dep_id='4'");
       $query=$this->db->query("update plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id  set user_id='$ins' where spd_id='$sid' and tdone='0' and user_detail.dep_id='4'");
    }
    public function change_pia($sid,$pia){
       $query=$this->db->query("update spd set pi_id='$pia' where id='$sid'");
       $query=$this->db->query("update task_assign LEFT JOIN user_detail on user_detail.id=task_assign.to_user set to_user='$pia' where spd_id='$sid' and plan='0' and user_detail.dep_id='2'");
       $query=$this->db->query("update plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id  set user_id='$pia' where spd_id='$sid' and tdone='0' and user_detail.dep_id='2'");
    }
    public function get_spdbyusernpc($projcode,$userid){
        $query=$this->db->query("select * from spd where project_code='$projcode' and pi_id='$userid'");
        return $query->result();
    }
    public function get_programtimelineforpi($projcode){
        $query=$this->db->query("select * from programtimeline where projectcode='$projcode'");
        return $query->result();
    }
    public function get_ptimeline(){
        $query=$this->db->query("select * from programtimeline");
        return $query->result();
    }
    public function get_stimeline($piid){
        $query=$this->db->query("select * from schooltimeline left join spd on spd.id=schooltimeline.sid WHERE piaid='$piid'");
        return $query->result();
    }
    public function get_spdstatusbypc($projcode){
        $query=$this->db->query("select COUNT(*) as a,COUNT(CASE WHEN status=1 THEN status end) as b,COUNT(CASE WHEN status=2 THEN status end) as c,COUNT(CASE WHEN status=3 THEN status end) as d,COUNT(CASE WHEN status=4 THEN status end) as e,COUNT(CASE WHEN status=5 THEN status end) as f,COUNT(CASE WHEN status=6 THEN status end) as g,COUNT(CASE WHEN status=7 THEN status end) as h,COUNT(CASE WHEN status=7 THEN status end) as i from spd where project_code='$projcode'");
        return $query->result();
    }
    public function get_stimeline1($piid){
        $query=$this->db->query("select *,spd.id sid,(select (*) form schooltimeline ) from spd WHERE pi_id='$piid'");
        return $query->result();
    }
    public function timediff($time1,$time2){
        $t1=date_create($time1);
        $t2=date_create($time2);
        $diff=date_diff($t1,$t2);
        $d= $diff->format("%d day");
        $m= $diff->format("%m month");
        $y= $diff->format("%y year");
        $h= $diff->format("%h hours");
        $i= $diff->format("%i min");
        $s= $diff->format("%s sec");
        $dtc='';
        $flag = false;
        if($diff->format('%y') != 0) {
            $dtc= $diff->format('%y years');
            $flag= true;
        }
        if($diff->format('%m') != 0) {
            $dtc=$dtc.' '.$diff->format('%m months');
            $flag= true;
        }
        if($diff->format('%d') != 0) {
            $dtc=$dtc.' '.$diff->format('%d day');
            $flag= true;
        }
        if($diff->format('%h') != 0) {
            $dtc=$dtc.' '.$diff->format('%h hours');
            $flag= true;
        }
        if($diff->format('%i') != 0) {
            $dtc=$dtc.' '.$diff->format('%i min');
            $flag= true;
        }
        if($diff->format('%s') != 0) {
            $dtc=$dtc.' '.$diff->format('%s sec');
            $flag= true;
        }
        if($dtc==''){$dtc=0;}
        return $dtc;
    }
    public function get_sconversion($status1,$status2,$sid){
        $query=$this->db->query("SELECT status FROM schoollogs where sid='$sid' and status='$status1'");
        $s1 = $query->result();
        $query=$this->db->query("SELECT * FROM schoollogs where sid='$sid' and status='$status2'");
        $s2 = $query->result();
        if(sizeof($s1)==0 || sizeof($s2)==0){return 0;}
        else{
        $query=$this->db->query("SELECT plantask.taskid,plantask.plandate,schoollogs.storedt,schoollogs.sid,schoollogs.status FROM `schoollogs` left join plantask ON plantask.taskid=schoollogs.taskid where schoollogs.sid='$sid' and schoollogs.status='$status1' ORDER BY plantask.plandate ASC");
        $date1= $query->result();
        $query=$this->db->query("SELECT plantask.taskid,plantask.plandate,schoollogs.storedt,schoollogs.sid,schoollogs.status FROM `schoollogs` left join plantask ON plantask.taskid=schoollogs.taskid where schoollogs.sid='$sid' and schoollogs.status='$status2' ORDER BY plantask.plandate ASC");
        $date2= $query->result();
         $size = sizeof($date2);
         $size=$size-1;
         $time1 = $date1[0]->plandate;
         $time2 = $date2[$size]->storedt;
         return $this->Menu_model->timediff($time1,$time2);
        }
    }
    public function get_pcodebyy($year){
        $query=$this->db->query("select distinct project_code from spd where sayear='$year'");
        return $query->result();
    }
    public function get_pcodebypi($user_id){
        $query=$this->db->query("select distinct project_code from spd where pi_id='$user_id'");
        return $query->result();
    }
    public function PurchaseItem(){
        $this->load->view('Purchase/purchase-item');
    }
    public function dtdiff($date1, $date2){
        $start_date = new DateTime($date1);
        $since_start = $start_date->diff(new DateTime($date2));
        $td = $since_start->days.' days total ';
        $y = $since_start->y.' years ';
        $m = $since_start->m.' months ';
        $d = $since_start->d.' days ';
        $h = $since_start->h.' hours ';
        $mi = $since_start->i.' minutes ';
        $s = $since_start->s.' seconds ';
        return $h.$mi.$s.'<br>'.$d.$m.$y;
    }
    public function get_handover(){
        $query=$this->db->query("select * from client_handover");
        return $query->result();
    }
    public function get_pendingprogramtimeline(){
        $query=$this->db->query("select client_handover.projectcode from client_handover LEFT join programtimeline ON programtimeline.projectcode=client_handover.projectcode WHERE programtimeline.projectcode is null and client_handover.projectcode IN (SELECT DISTINCT project_code from spd WHERE pm_apr='1')");
        return $query->result();
    }
    public function get_handovernoins(){
        $query=$this->db->query("select * from client_handover where insdate is null and projectcode!=''");
        return $query->result();
    }
    public function get_handoverforfm(){
        $query=$this->db->query("select * from client_handover where pm_id='0' and account_id='1'");
        return $query->result();
    }
    public function get_pcbycname($cname){
        $query=$this->db->query("select * from client_handover where client_name='$cname'");
        return $query->result();
    }
    public function get_pcbyzm($zm){
        $query=$this->db->query("select DISTINCT client_handover.* from client_handover JOIN spd ON spd.project_code=client_handover.projectcode where spd.zh_id='$zm'");
        return $query->result();
    }
    public function get_pcbypi($pi){
        $query=$this->db->query("select DISTINCT client_handover.* from client_handover JOIN spd ON spd.project_code=client_handover.projectcode where spd.pi_id='$pi'");
        return $query->result();
    }
    public function get_pcbyyear($year){
        $query=$this->db->query("select * from client_handover where project_year='$year'");
        return $query->result();
    }
    public function get_clientbypc($project_code){
        $query=$this->db->query("select * from client_handover where projectcode='$project_code'");
        return $query->result();
    }
    public function get_clientbyspd(){
        $query=$this->db->query("select DISTINCT clientname from spd WHERE clientname!=''");
        return $query->result();
    }
    public function get_clientbyid($id){
        $query=$this->db->query("select *,client_handover.id as cid,client_handover.sdatet htpm ,handover_account.sdatet htac from client_handover LEFT join handover_account on handover_account.handover_id=client_handover.id LEFT join fm_timeline on fm_timeline.handover_id=client_handover.id where client_handover.id='$id'");
        return $query->result();
    }
    public function get_handover_detail(){
        $query=$this->db->query("select *,client_handover.id as cid from client_handover LEFT join handover_account on handover_account.handover_id=client_handover.id LEFT join fm_timeline on fm_timeline.handover_id=client_handover.id");
        return $query->result();
    }
    public function get_nospdsid(){
        $query=$this->db->query("SELECT *,u1.fullname pianame, u2.fullname insname FROM `spd` left join user_detail u1 on u1.id=spd.pi_id left join user_detail u2 on u2.id=spd.ins_id WHERE pm_apr='0' and spd.id!='0' and project_code is not null");
        return $query->result();
    }
    public function get_user_byid($id){
        $query=$this->db->query("select * from user_detail where id='$id'");
        return $query->result();
    }
    public function manage_user($user_id,$name,$username,$password,$email,$phoneno,$active){
        $query=$this->db->query("update user_detail set fullname='$name',user_name='$username',password='$password',email='$email',phoneno='$phoneno',status='$active' WHERE id='$user_id'");
    }
    public function get_teamdaydeatil($uid,$tdate,$code){
        if($code==1){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        }elseif($code==2){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and user_day.wffo=1");
        }elseif($code==3){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and user_day.wffo=2");
        }elseif($code==4){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate' and user_day.wffo=3");
        }else{
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE)='$tdate'");
        }
        return $query->result();
    }
    public function get_mydaydeatil($sdate,$edate,$uid){
        $query=$this->db->query("SELECT user_detail.fullname bdname, cast(ustart as TIME) as start,cast(uclose as TIME) as close, user_day.* FROM user_day LEFT JOIN user_detail ON user_detail.id=user_day.user_id WHERE cast(ustart as DATE) between '$sdate' and '$edate' and user_detail.id='$uid'");
        return $query->result();
    }
    public function get_user_byfname($fullname){
        $query=$this->db->query("select * from user_detail where fullname='$fullname'");
        return $query->result();
    }
    public function get_userbyemail($email){
        $query=$this->db->query("select * from user_detail where email='$email' and email!=''");
        return $query->result();
    }
    public function get_reviewlink($uid){
        $query=$this->db->query("select * from allreview where piid='$uid' and closet is null");
        return $query->result();
    }
    public function get_hjoinlink(){
        $query=$this->db->query("select * from joincall where closet is null limit 1");
        return $query->result();
    }
    public function get_notifybyid($uid){
        $query=$this->db->query("select * from notification where userid='$uid'  ORDER BY `notification`.`sdatet` DESC");
        return $query->result();
    }
    public function read_notify($id){
        $query=$this->db->query("update notification set status=1 where id='$id'");
    }
    public function get_ans($sid,$tid){
        $query=$this->db->query("SELECT * FROM answerset LEFT JOIN question_set ON question_set.id=answerset.qid WHERE answerset.sid='$sid' and answerset.tid='$tid'");
        return $query->result();
    }
    public function get_ansbytid($tid){
        $query=$this->db->query("SELECT * FROM answerset LEFT JOIN question_set ON question_set.id=answerset.qid WHERE answerset.tid='$tid'");
        return $query->result();
    }
    public function get_visitstupdate($sid,$tid,$que){
        $query=$this->db->query("SELECT * FROM visitstupdate WHERE sid='$sid' and tid='$tid' and que='$que'");
        return $query->result();
    }
    public function get_visittasktime($page,$tid,$que){
        $query=$this->db->query("SELECT DATE_ADD(plandate, INTERVAL (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tasktime))) FROM visitsubtask WHERE id <= (SELECT id FROM visitsubtask WHERE que = '$que' AND cpage = '$page') AND cpage = '$page' ) SECOND ) AS tasktime FROM plantask WHERE taskid = '$tid';");
        return $query->result();
    }
    public function get_livevisitpendingpia($tdate){
        $query=$this->db->query("SELECT plantask.taskid tid,spd.sname,user_detail.fullname,plantask.taskid, plandate, v1.tasktime, v1.que, DATE_ADD(plandate, INTERVAL (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tasktime))) FROM visitsubtask WHERE id <= (SELECT id FROM visitsubtask WHERE que = v1.que AND cpage = task_assign.checklist) AND cpage = task_assign.checklist) SECOND) AS tasktime FROM plantask LEFT JOIN spd on spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id = plantask.user_id LEFT JOIN task_assign ON task_assign.id = plantask.taskid LEFT JOIN visitsubtask v1 ON v1.cpage = task_assign.checklist LEFT JOIN visitstupdate ON visitstupdate.tid = plantask.taskid AND visitstupdate.que = v1.que WHERE cast(plantask.plandate as DATE) = '$tdate' AND action = 'Visit' AND plantask.tdone = '0' AND visitstupdate.tid IS NULL AND TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(plandate, INTERVAL (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tasktime))) FROM visitsubtask WHERE id <= (SELECT id FROM visitsubtask WHERE que = v1.que AND cpage = task_assign.checklist) AND cpage = task_assign.checklist) SECOND)) BETWEEN -900 AND 900 and user_detail.dep_id='2'");
        return $query->result();
    }
    public function get_livevisitpendingimp($tdate){
        $query=$this->db->query("SELECT plantask.taskid tid,spd.sname,user_detail.fullname,plantask.taskid, plandate, v1.tasktime, v1.que, DATE_ADD(plandate, INTERVAL (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tasktime))) FROM visitsubtask WHERE id <= (SELECT id FROM visitsubtask WHERE que = v1.que AND cpage = task_assign.checklist) AND cpage = task_assign.checklist) SECOND) AS tasktime FROM plantask LEFT JOIN spd on spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id = plantask.user_id LEFT JOIN task_assign ON task_assign.id = plantask.taskid LEFT JOIN visitsubtask v1 ON v1.cpage = task_assign.checklist LEFT JOIN visitstupdate ON visitstupdate.tid = plantask.taskid AND visitstupdate.que = v1.que WHERE cast(plantask.plandate as DATE) = '$tdate' AND action = 'Visit' AND plantask.tdone = '0' AND visitstupdate.tid IS NULL AND TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(plandate, INTERVAL (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tasktime))) FROM visitsubtask WHERE id <= (SELECT id FROM visitsubtask WHERE que = v1.que AND cpage = task_assign.checklist) AND cpage = task_assign.checklist) SECOND)) BETWEEN -900 AND 900 and user_detail.dep_id='4'");
        return $query->result();
    }
    public function get_visitsubtask($page){
        $query=$this->db->query("SELECT * FROM visitsubtask WHERE cpage='$page'");
        return $query->result();
    }
    public function get_Handovertoinsr($handover){
        $query=$this->db->query("SELECT * FROM Alltaskdetail WHERE tasktype='$handover'");
        return $query->result();
    }
    public function get_tidbypage($sid,$page){
        $query=$this->db->query("SELECT task_assign.id tid,plantask.id pid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.checklist='$page' and task_assign.spd_id='$sid' and plantask.tdone='1'");
        return $query->result();
    }
    public function get_tidbyspd($sid){
        $query=$this->db->query("SELECT task_assign.id tid,plantask.id pid FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.spd_id='$sid'");
        return $query->result();
    }
    public function get_mbagcode(){
        $query=$this->db->query("select * from mbagcodea");
        return $query->result();
    }
    public function get_umbag($uid){
        $query=$this->db->query("select * from mbagqty where uid='$uid'");
        return $query->result();
    }
    public function get_mbagall(){
        $query=$this->db->query("select * from mbagqty where pm='0' and request='1'");
        return $query->result();
    }
    public function get_allyear(){
        $query=$this->db->query("select * from year");
        return $query->result();
    }
    public function get_umbagr(){
        $query=$this->db->query("select * from mbagqty where request='1'");
        return $query->result();
    }
    public function get_umbagmur($uid,$mname){
        $query=$this->db->query("select * from mbagqty where request='1' and uid='$uid' and material_name='$mname'");
        return $query->result();
    }
    public function get_umbagu(){
        $query=$this->db->query("select distinct uid from mbagqty where request='1'");
        return $query->result();
    }
    public function get_umbagm(){
        $query=$this->db->query("select distinct material_name from mbagqty where request='1'");
        return $query->result();
    }
    public function get_ubrequest($uid){
        $umbag= $this->Menu_model->get_umbag($uid);
        foreach($umbag as $d){
            $id = $d->id;
            $qty = $d->qty;
            $moq = $d->moq;
            if($moq-$qty>0){
            $query=$this->db->query("update mbagqty set request=1 where id='$id'");
            }
        }
        return $uid;
    }
    public function get_ubrequestpm(){
        $query=$this->db->query("update mbagqty set pm=1 where request=1");
    }
    public function update_spd($spdid,$schaddress,$schpinno,$schlang){
       $query=$this->db->query("update spd set saddress='$schaddress',spincode='$schpinno',slanguage='$schlang' where id='$spdid'");
       $spd = $this->Menu_model->get_spdbyid($spdid);
       $pi = $spd[0]->pi_id;
       $zh = $spd[0]->zh_id;
       $sname = $spd[0]->sname;
       $pcode = $spd[0]->project_code;
       $msg = $pcode." | ".$sname." | School Information Upddated";
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$spdid')");
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$spdid')");
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$spdid')");
    }
    public function get_bdreqest($uid){
        $query=$this->db->query("SELECT COUNT(*) cont,COUNT(CASE WHEN assignto=1 then assignto end) a,COUNT(CASE WHEN assignto>1 then assignto end) b,COUNT(CASE WHEN status=0 then status end) c, COUNT(CASE WHEN status=1 then status end) as d FROM bdrequest");
        return $query->result();
    }
    public function get_bdreqestzh($uid){
        $query=$this->db->query("SELECT COUNT(*) cont,COUNT(CASE WHEN assignto='$uid' then assignto end) a,COUNT(CASE WHEN assignto>1 then assignto end) b,COUNT(CASE WHEN status=0 then status end) c, COUNT(CASE WHEN status=1 then status end) as d FROM bdrequest");
        return $query->result();
    }
    public function get_rpurpose(){
        $query=$this->db->query("select * from rpurpose");
        return $query->result();
    }
    public function get_BDRPRT(){
        $query=$this->db->query("select request_type,COUNT(*) task from bdrequest where status='0' GROUP BY request_type");
        return $query->result();
    }
    public function get_BDRP($rtype){
        $query=$this->db->query("select * from bdrequest where status='0' and request_type='$rtype' ORDER BY bdrequest.sdatet DESC");
        return $query->result();
    }
    public function get_BDRPbyrysn($rysn){
        $query=$this->db->query("select *,(SELECT GROUP_CONCAT(user_detail.fullname) from bdtask LEFT JOIN user_detail ON user_detail.id=bdtask.uid WHERE bdtask.tid=bdrequest.id) pia from bdrequest where rysn='$rysn' ORDER BY bdrequest.sdatet DESC");
        return $query->result();
    }
    public function get_BDRComprysn($rysn){
        $query=$this->db->query("select *,(SELECT GROUP_CONCAT(user_detail.fullname) from bdtask LEFT JOIN user_detail ON user_detail.id=bdtask.uid WHERE bdtask.tid=bdrequest.id) pia from bdrequest where rysn='$rysn' and status='1' ORDER BY bdrequest.sdatet DESC");
        return $query->result();
    }
    public function get_BDRPendindrysn($rysn){
        $query=$this->db->query("select *,(SELECT GROUP_CONCAT(user_detail.fullname) from bdtask LEFT JOIN user_detail ON user_detail.id=bdtask.uid WHERE bdtask.tid=bdrequest.id) pia from bdrequest where rysn='$rysn' and status='0' ORDER BY bdrequest.sdatet DESC");
        return $query->result();
    }
    public function get_bdrbyd($code){
        if($code==1){
            $query=$this->db->query("select * from bdrequest where assignto='1'");
        }
        if($code==2){
            $query=$this->db->query("select * from bdrequest where assignstatus='0' and status='0' and assignto='1'");
        }
        if($code==3){
            $query=$this->db->query("select * from bdrequest where assignstatus='1' and assignto='1'");
        }
        if($code==4){
            $query=$this->db->query("select * from bdrequest where status='1' and assignto='1'");
        }
        return $query->result();
    }
    public function get_bdopenr(){
        $query=$this->db->query("select * from bdrequest where status='0' and assignto='1'");
        return $query->result();
    }
    public function get_bdrbyid($rid){
        $query=$this->db->query("select *,(SELECT GROUP_CONCAT(user_detail.fullname) FROM bdtask LEFT JOIN user_detail ON user_detail.id=bdtask.uid WHERE bdtask.tid='$rid') pia from bdrequest where id='$rid'");
        return $query->result();
    }
    public function get_spdbyrid($rid){
        $query=$this->db->query("select * FROM spd where spdident='$rid'");
        return $query->result();
    }
    public function get_bdrbypia($uid){
        $query=$this->db->query("select *,bdtask.tid rid from bdrequest LEFT JOIN bdtask on bdtask.tid=bdrequest.id where bdtask.uid='$uid' and request_type!=''");
        return $query->result();
    }
    public function set_pcontact($sid,$set,$uid){
        $query=$this->db->query("update spd_contact set main=0 where sid='$sid'");
        $query=$this->db->query("update spd_contact set main=1 where id='$set'");
        $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('Primary Contact Change','$uid','$sid')");
    }
    public function get_mbcodebyuid($uid){
        $query=$this->db->query("select * from mbagcodea where assign='$uid'");
        return $query->result();
    }
    public function get_mbusebyuid($uid,$bmid){
        $query=$this->db->query("select sum(bmqty) as bmuq from usesmbag where bmid='$bmid' and user='$uid'");
        return $query->result();
    }
    public function get_mbag(){
        $query=$this->db->query("select * from mbagm");
        return $query->result();
    }
    public function get_user_bydep($dep){
        $query=$this->db->query("select * from user_detail where dep_id='$dep'");
        return $query->result();
    }
    public function get_user_bydr($dep,$region){
        $query=$this->db->query("select * from user_detail where dep_id='$dep' and region_id='$region'");
        return $query->result();
    }
    public function get_reviewr($adid,$piid,$sd,$ed){
        if($piid=='0'){
            $query=$this->db->query("SELECT *,u1.fullname pstname,u2.fullname bdname, (SELECT COUNT(*) FROM allreviewdata WHERE allreviewdata.rid=allreview.id) totalc,allreview.id rid FROM allreview LEFT JOIN user_detail u1 ON u1.id=allreview.uid LEFT JOIN user_detail u2 ON u2.id=allreview.piid WHERE cast(startt as DATE) BETWEEN '$sd' AND '$ed' and uid='$adid'");
        }else{
            $query=$this->db->query("SELECT *,u1.fullname pstname,u2.fullname bdname, (SELECT COUNT(*) FROM allreviewdata WHERE allreviewdata.rid=allreview.id) totalc,allreview.id rid FROM allreview LEFT JOIN user_detail u1 ON u1.id=allreview.uid LEFT JOIN user_detail u2 ON u2.id=allreview.piid WHERE cast(startt as DATE) BETWEEN '$sd' AND '$ed' and uid='$adid' and bdid='$piid'");
        }
        return $query->result();
    }
    public function get_user_bydepbag($dep){
        $query=$this->db->query("select * from user_detail where dep_id='$dep'");
        return $query->result();
    }
    public function get_remark($id){
        $query=$this->db->query("select * from todays_remark where status_id='$id'");
        return $query->result();
    }
    public function get_client(){
        $query=$this->db->query("select * from client_handover");
        return $query->result();
    }
    public function update_clients($pcode,$ps){
        $query=$this->db->query("update client_handover set status='$ss' where projectcode='$pcode'");
    }
    public function get_dep_byid($id){
        $query=$this->db->query("select * from department where id='$id'");
        return $query->result();
    }
    public function get_otask(){
        $query=$this->db->query("select * from other_task");
        return $query->result();
    }
    public function get_otbytouser($uid){
        $query=$this->db->query("select *,u1.fullname tuser,u2.fullname fuser from other_task LEFT JOIN user_detail u1 ON u1.id=other_task.to_user LEFT JOIN user_detail u2 ON u2.id=other_task.from_user  where other_task.to_user='$uid'");
        return $query->result();
    }
    public function get_taskassign(){
        $query=$this->db->query("select * from task_assign");
        return $query->result();
    }
    public function get_pagename($page){
        $query=$this->db->query("select tname from taskdetail where page='$page'");
        return $query->result();
    }
    public function get_visitst($page){
        $query=$this->db->query("select * from visitsubtask where cpage='$page'");
        return $query->result();
    }
    public function get_vstupdate($sid,$tid){
        $query=$this->db->query("select * from visitstupdate where sid='$sid' and tid='$tid'");
        return $query->result();
    }
    public function get_taskdetail($page){
        $query=$this->db->query("select tid, gt from taskdetail where page='$page'");
        $data = $query->result();
        if($data){
        $tid = $data[0]->tid;
        $gt = $data[0]->gt;
        $tid = $tid+1;
        $query=$this->db->query("select * from taskdetail where gt='$gt' and tid='$tid'");
        return $query->result();
        }
    }
    public function get_taskdetailbytname($tname){
        $query=$this->db->query("select tid, gt from taskdetail where tname='$tname'");
        $data = $query->result();
        if($data){
        $tid = $data[0]->tid;
        $gt = $data[0]->gt;
        $tid = $tid+1;
        $query=$this->db->query("select * from taskdetail where gt='$gt' and tid='$tid'");
        return $query->result();
        }
    }
    public function get_taskassignbydate($tdate){
        $query=$this->db->query("select task_assign.*, user_detail.dep_id from task_assign JOIN user_detail ON user_detail.id=task_assign.to_user where cast(sdatet as DATE)='$tdate'");
        return $query->result();
    }
    public function get_totaltask($date,$tasktype){
        $query=$this->db->query("select * from task_assign where cast(sdatet as DATE)='$date' and task_type='$tasktype'");
        $data= $query->result();
        return sizeof($data);
    }
    public function new_teamtotalt($date){
        $query=$this->db->query("select COUNT(*) a, COUNT(CASE WHEN plantask.tdone='0' THEN tdone end) b,COUNT(CASE WHEN plantask.tdone='1' THEN tdone end) c,COUNT(CASE WHEN plantask.action='Call' THEN tdone end) d,COUNT(CASE WHEN plantask.action='Call' and plantask.tdone='0'  THEN tdone end) dp, COUNT(CASE WHEN plantask.action='Email' THEN tdone end) e, COUNT(CASE WHEN plantask.action='Email' and plantask.tdone='0'  THEN tdone end) ep, COUNT(CASE WHEN plantask.action='Visit' THEN tdone end) f, COUNT(CASE WHEN plantask.action='Visit' and plantask.tdone='0'  THEN tdone end) fp, COUNT(CASE WHEN plantask.action='Utilisation' THEN tdone end) g, COUNT(CASE WHEN plantask.action='Utilisation' and plantask.tdone='0'  THEN tdone end) gp, COUNT(CASE WHEN plantask.action='Report' THEN tdone end) h, COUNT(CASE WHEN plantask.action='Report' and plantask.tdone='0'  THEN tdone end) hp, COUNT(CASE WHEN plantask.action='Communication' THEN tdone end) i, COUNT(CASE WHEN plantask.action='Communication' and plantask.tdone='0'  THEN tdone end) ip, COUNT(CASE WHEN plantask.action='Review' THEN tdone end) j, COUNT(CASE WHEN plantask.action='Review' and plantask.tdone='0'  THEN tdone end) jp, COUNT(CASE WHEN plantask.action='OTask' THEN tdone end) k, COUNT(CASE WHEN plantask.action='OTask' and plantask.tdone='0'  THEN tdone end) kp, COUNT(CASE WHEN plantask.actiontaken='yes' and plantask.tdone='1'  THEN tdone end) l,COUNT(CASE WHEN plantask.actiontaken='no' and plantask.tdone='1'  THEN tdone end) m,COUNT(CASE WHEN plantask.purpose='yes' and plantask.tdone='1'  THEN tdone end) n,COUNT(CASE WHEN plantask.purpose='yes' and plantask.tdone='1'  THEN tdone end) o from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id where cast(plantask.sdatet as DATE)='$date'");
        return $query->result();
    }
    public function get_ttbyutt($touser){
        $query=$this->db->query("select task_assign.*,plantask.tdone from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id where task_assign.to_user='$touser'");
        return $query->result();
    }
    public function get_ttbyuttd($touser,$sdate,$edate){
        $query=$this->db->query("select task_assign.*,plantask.tdone from task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id where task_assign.to_user='$touser' and cast(task_assign.sdatet as DATE) BETWEEN '$sdate' AND '$edate'");
        return $query->result();
    }
    public function get_utilization($sd,$ed){
        $query=$this->db->query("Select  *, spd.id sid,task_assign.id tid, (SELECT GROUP_CONCAT(DISTINCT wgdata.zmremark) FROM wgdata WHERE wgdata.tid=task_assign.id) zhremark  from  task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code where plantask.action='Utilisation' and plantask.tdone='1' and cast(plantask.plandate as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_dmbydate($sd,$ed){
        $query=$this->db->query("Select *,spd.id sid from spd where id in (Select distinct spd.id FROM  task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code where (plantask.action='Utilisation' or plantask.action='Report' or plantask.action='Visit') and plantask.tdone='1' and cast(plantask.plandate as DATE) between '$sd' and '$ed')");
        return $query->result();
    }
    public function get_dmbydateuti($sd,$ed){
        $query=$this->db->query("Select  *, spd.id sid,task_assign.id tid, (SELECT GROUP_CONCAT(DISTINCT wgdata.zmremark) FROM wgdata WHERE wgdata.tid=task_assign.id) zhremark  from  task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code where plantask.action='Utilisation' and plantask.tdone='1' and cast(plantask.plandate as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_dmbydatereport($sd,$ed){
        $query=$this->db->query("Select  *, spd.id sid,task_assign.id tid, (SELECT GROUP_CONCAT(DISTINCT wgdata.zmremark) FROM wgdata WHERE wgdata.tid=task_assign.id) zhremark  from  task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code where plantask.action='Utilisation' and plantask.tdone='1' and cast(plantask.plandate as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_dmbyspdid($spdid){
        $query=$this->db->query("Select  *, spd.id sid,task_assign.id tid, (SELECT GROUP_CONCAT(DISTINCT wgdata.zmremark) FROM wgdata WHERE wgdata.tid=task_assign.id) zhremark  from  task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code where plantask.action='Utilisation' and plantask.tdone='1' and cast(plantask.spd_id as DATE)='$spdid'");
        return $query->result();
    }
    public function get_tdetailbyuser($touid,$date){
        $query=$this->db->query("Select COUNT(CASE WHEN plan=0 THEN plan END) ab, COUNT(CASE WHEN plan=1 THEN plan END) ac, COUNT(CASE WHEN plan=1 and tdone=0 THEN plan END) ad, COUNT(CASE WHEN plan=1  and tdone=1 THEN plan END) ae, COUNT(CASE WHEN task_type='Call' and plan=1 THEN plan END) a,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=0 THEN plan END) b,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=1 THEN plan END) c, COUNT(CASE WHEN task_type='Email' and plan=1 THEN plan END) d,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=0 THEN plan END) e,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=1 THEN plan END) f, COUNT(CASE WHEN task_type='Whatsapp' and plan=1 THEN plan END) g,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=0 THEN plan END) h,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=1 THEN plan END) i, COUNT(CASE WHEN task_type='FTTP' and plan=1 THEN plan END) j,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=0 THEN plan END) k,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=1 THEN plan END) l, COUNT(CASE WHEN task_type='RTTP' and plan=1 THEN plan END) m,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=0 THEN plan END) n,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=1 THEN plan END) o, COUNT(CASE WHEN task_type='MnE' and plan=1 THEN plan END) p,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=0 THEN plan END) q,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=1 THEN plan END) r, COUNT(CASE WHEN task_type='DIY' and plan=1 THEN plan END) s,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=0 THEN plan END) t,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=1 THEN plan END) u, COUNT(CASE WHEN task_type='Utilisation' and plan=1 THEN plan END) v,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=0 THEN plan END) w,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=1 THEN plan END) x, COUNT(CASE WHEN task_type='Report' and plan=1 THEN plan END) y,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=0 THEN plan END) z,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=1 THEN plan END) za, COUNT(CASE WHEN task_type='Other' and plan=1 THEN plan END) zb,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=0 THEN plan END) zc,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=1 THEN plan END) zd,COUNT(CASE WHEN actiontaken='Yes' THEN actiontaken END) ze,COUNT(CASE WHEN actiontaken='No' THEN plan END) zf,COUNT(CASE WHEN purpose='Yes' THEN plan END) zg,COUNT(CASE WHEN purpose='No' THEN plan END) zh FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id  where task_assign.to_user='$touid' and cast(task_assign.sdatet as DATE)= '$date'");
        return $query->result();
    }
    public function get_bwdtdetailbyuser($touid,$sd,$ed){
        $query=$this->db->query("Select COUNT(CASE WHEN plan=0 THEN plan END) ab, COUNT(CASE WHEN plan=1 THEN plan END) ac, COUNT(CASE WHEN plan=1 and tdone=0 THEN plan END) ad, COUNT(CASE WHEN plan=1  and tdone=1 THEN plan END) ae, COUNT(CASE WHEN task_type='Call' and plan=1 THEN plan END) a,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=0 THEN plan END) b,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=1 THEN plan END) c, COUNT(CASE WHEN task_type='Email' and plan=1 THEN plan END) d,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=0 THEN plan END) e,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=1 THEN plan END) f, COUNT(CASE WHEN task_type='Whatsapp' and plan=1 THEN plan END) g,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=0 THEN plan END) h,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=1 THEN plan END) i, COUNT(CASE WHEN task_type='FTTP' and plan=1 THEN plan END) j,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=0 THEN plan END) k,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=1 THEN plan END) l, COUNT(CASE WHEN task_type='RTTP' and plan=1 THEN plan END) m,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=0 THEN plan END) n,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=1 THEN plan END) o, COUNT(CASE WHEN task_type='MnE' and plan=1 THEN plan END) p,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=0 THEN plan END) q,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=1 THEN plan END) r, COUNT(CASE WHEN task_type='DIY' and plan=1 THEN plan END) s,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=0 THEN plan END) t,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=1 THEN plan END) u, COUNT(CASE WHEN task_type='Utilisation' and plan=1 THEN plan END) v,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=0 THEN plan END) w,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=1 THEN plan END) x, COUNT(CASE WHEN task_type='Report' and plan=1 THEN plan END) y,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=0 THEN plan END) z,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=1 THEN plan END) za, COUNT(CASE WHEN task_type='Other' and plan=1 THEN plan END) zb,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=0 THEN plan END) zc,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=1 THEN plan END) zd,COUNT(CASE WHEN actiontaken='Yes' THEN actiontaken END) ze,COUNT(CASE WHEN actiontaken='No' THEN plan END) zf,COUNT(CASE WHEN purpose='Yes' THEN plan END) zg,COUNT(CASE WHEN purpose='No' THEN plan END) zh FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id  where task_assign.to_user='$touid' and cast(task_assign.sdatet as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_taskstart($uid,$tasktype,$tdate){
        $query=$this->db->query("SELECT * FROM othertask WHERE cast(startdt as DATE)='$tdate' and uid='$uid' and tasktype='$tasktype' and closedt is null");
        return $query->result();
    }
    public function start_dayreview($uid,$ttype){
        $tdate=date('Y-m-d H:i:s');
        $query=$this->db->query("INSERT INTO othertask (tasktype, startdt, uid) Value ('$ttype','$tdate','$uid')");
    }
    public function close_dayreview($rid){
        $tdate=date('Y-m-d H:i:s');
        $query=$this->db->query("Update othertask set closedt='$tdate' where id='$rid'");
    }
    public function get_tdetailbyad($date){
        $query=$this->db->query("Select COUNT(CASE WHEN plan=0 THEN plan END) ab, COUNT(CASE WHEN plan=1 THEN plan END) ac, COUNT(CASE WHEN plan=1 and tdone=0 THEN plan END) ad, COUNT(CASE WHEN plan=1  and tdone=1 THEN plan END) ae, COUNT(CASE WHEN task_type='Call' and plan=1 THEN plan END) a,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=0 THEN plan END) b,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=1 THEN plan END) c, COUNT(CASE WHEN task_type='Email' and plan=1 THEN plan END) d,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=0 THEN plan END) e,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=1 THEN plan END) f, COUNT(CASE WHEN task_type='Whatsapp' and plan=1 THEN plan END) g,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=0 THEN plan END) h,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=1 THEN plan END) i, COUNT(CASE WHEN task_type='FTTP' and plan=1 THEN plan END) j,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=0 THEN plan END) k,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=1 THEN plan END) l, COUNT(CASE WHEN task_type='RTTP' and plan=1 THEN plan END) m,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=0 THEN plan END) n,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=1 THEN plan END) o, COUNT(CASE WHEN task_type='MnE' and plan=1 THEN plan END) p,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=0 THEN plan END) q,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=1 THEN plan END) r, COUNT(CASE WHEN task_type='DIY' and plan=1 THEN plan END) s,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=0 THEN plan END) t,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=1 THEN plan END) u, COUNT(CASE WHEN task_type='Utilisation' and plan=1 THEN plan END) v,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=0 THEN plan END) w,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=1 THEN plan END) x, COUNT(CASE WHEN task_type='Report' and plan=1 THEN plan END) y,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=0 THEN plan END) z,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=1 THEN plan END) za, COUNT(CASE WHEN task_type='Other' and plan=1 THEN plan END) zb,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=0 THEN plan END) zc,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=1 THEN plan END) zd,COUNT(CASE WHEN actiontaken='Yes' THEN actiontaken END) ze,COUNT(CASE WHEN actiontaken='No' THEN plan END) zf,COUNT(CASE WHEN purpose='Yes' THEN plan END) zg,COUNT(CASE WHEN purpose='No' THEN plan END) zh FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id  where cast(task_assign.sdatet as DATE)= '$date'");
        return $query->result();
    }
    public function get_bwdtdetailbyad($sdate,$edate){
        $query=$this->db->query("Select COUNT(CASE WHEN plan=0 THEN plan END) ab, COUNT(CASE WHEN plan=1 THEN plan END) ac, COUNT(CASE WHEN plan=1 and tdone=0 THEN plan END) ad, COUNT(CASE WHEN plan=1  and tdone=1 THEN plan END) ae, COUNT(CASE WHEN task_type='Call' and plan=1 THEN plan END) a,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=0 THEN plan END) b,COUNT(CASE WHEN task_type='Call' and plan=1 and tdone=1 THEN plan END) c, COUNT(CASE WHEN task_type='Email' and plan=1 THEN plan END) d,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=0 THEN plan END) e,COUNT(CASE WHEN task_type='Email' and plan=1 and tdone=1 THEN plan END) f, COUNT(CASE WHEN task_type='Whatsapp' and plan=1 THEN plan END) g,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=0 THEN plan END) h,COUNT(CASE WHEN task_type='Whatsapp' and plan=1 and tdone=1 THEN plan END) i, COUNT(CASE WHEN task_type='FTTP' and plan=1 THEN plan END) j,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=0 THEN plan END) k,COUNT(CASE WHEN task_type='FTTP' and plan=1 and tdone=1 THEN plan END) l, COUNT(CASE WHEN task_type='RTTP' and plan=1 THEN plan END) m,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=0 THEN plan END) n,COUNT(CASE WHEN task_type='RTTP' and plan=1 and tdone=1 THEN plan END) o, COUNT(CASE WHEN task_type='MnE' and plan=1 THEN plan END) p,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=0 THEN plan END) q,COUNT(CASE WHEN task_type='MnE' and plan=1 and tdone=1 THEN plan END) r, COUNT(CASE WHEN task_type='DIY' and plan=1 THEN plan END) s,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=0 THEN plan END) t,COUNT(CASE WHEN task_type='DIY' and plan=1 and tdone=1 THEN plan END) u, COUNT(CASE WHEN task_type='Utilisation' and plan=1 THEN plan END) v,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=0 THEN plan END) w,COUNT(CASE WHEN task_type='Utilisation' and plan=1 and tdone=1 THEN plan END) x, COUNT(CASE WHEN task_type='Report' and plan=1 THEN plan END) y,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=0 THEN plan END) z,COUNT(CASE WHEN task_type='Report' and plan=1 and tdone=1 THEN plan END) za, COUNT(CASE WHEN task_type='Other' and plan=1 THEN plan END) zb,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=0 THEN plan END) zc,COUNT(CASE WHEN task_type='Other' and plan=1 and tdone=1 THEN plan END) zd,COUNT(CASE WHEN actiontaken='Yes' THEN actiontaken END) ze,COUNT(CASE WHEN actiontaken='No' THEN plan END) zf,COUNT(CASE WHEN purpose='Yes' THEN plan END) zg,COUNT(CASE WHEN purpose='No' THEN plan END) zh FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id  where cast(task_assign.sdatet as DATE) between '$sdate' and '$edate'");
        return $query->result();
    }
    public function in_dtime($tid){
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("update plantask set initiateddt='$date' WHERE id='$tid'");
    }
    public function get_nxtdplan($uid,$nextdate){
        $query=$this->db->query("SELECT count(*) cont FROM ndplan WHERE pdatet='$nextdate' and uid='$uid'");
        return $query->result();
    }
    public function get_nxtdtask($uid,$nextdate){
        $query=$this->db->query("SELECT COUNT(distinct spd_id)abc ,COUNT(*) ab,count(CASE WHEN action='call' THEN action end) a FROM plantask WHERE cast(plandate as DATE)='$nextdate' and user_id='$uid' and tdone='0'");
        return $query->result();
    }
    public function get_reportvisitimp($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='4'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and action='Visit' and  user_detail.dep_id='4'");
        }
        return $query->result();
    }
    public function get_reportvisitpia($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='2'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and action='Visit' and  user_detail.dep_id='2'");
        }
        return $query->result();
    }
    public function get_reportvisit($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and action='Visit'");
        }
        return $query->result();
    }
    public function get_livereportvisit($pcode,$sid){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE task_assign.project_code='$pcode' and plantask.spd_id='$sid' and tdone='1' and action='Visit'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE task_assign.project_code='$pcode'  and plantask.spd_id='$sid' and tdone='1' and action='Visit'");
        }
        return $query->result();
    }
    public function get_livevisit($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and tdone='0' and action='Visit'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and tdone='0' and action='Visit'");
        }
        return $query->result();
    }
    public function get_livevisitpia1($uid,$date){
        $query=$this->db->query("SELECT count(*) tvplan, COUNT(CASE WHEN tdone='0' THEN 1 END) vpen, COUNT(CASE WHEN tdone='1' THEN 1 END) vdone FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='2';");
        return $query->result();
    }
    public function get_livevisitpia2($uid,$date){
        $query=$this->db->query("SELECT taskdetail.taskname, count(*) tvplan FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='2' GROUP BY taskdetail.taskname;");
        return $query->result();
    }
    public function get_livevisitimp1($uid,$date){
        $query=$this->db->query("SELECT count(*) tvplan, COUNT(CASE WHEN tdone='0' THEN 1 END) vpen, COUNT(CASE WHEN tdone='1' THEN 1 END) vdone FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='4';");
        return $query->result();
    }
    public function get_livevisitimp2($uid,$date){
        $query=$this->db->query("SELECT taskdetail.taskname, count(*) tvplan FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and action='Visit' and user_detail.dep_id='4' GROUP BY taskdetail.taskname;");
        return $query->result();
    }
    public function get_livevisitpia($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and tdone='0' and action='Visit' and user_detail.dep_id='2'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and tdone='0' and action='Visit' and user_detail.dep_id='2'");
        }
        return $query->result();
    }
    public function get_livevisitimp($uid,$date){
        if($uid==1){
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and tdone='0' and action='Visit' and user_detail.dep_id='4'");
        }else{
            $query=$this->db->query("SELECT *,task_assign.id tid FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE)='$date' and user_id='$uid' and tdone='0' and action='Visit' and user_detail.dep_id='4'");
        }
        return $query->result();
    }
    public function get_nxtdtaskplan($uid,$sd,$ed){
        if($uid==1){
            $query=$this->db->query("SELECT * FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE) between '$sd' and '$ed' and tdone='0'");
        }else{
            $query=$this->db->query("SELECT * FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN taskdetail on taskdetail.tname=task_assign.task_subtype LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE cast(plandate as DATE) between '$sd' and '$ed' and user_id='$uid' and tdone='0'");
        }
        return $query->result();
    }
    public function get_mytasktime($sd,$ed,$uid){
        $query=$this->db->query("SELECT
        action,
        COUNT(*) AS cont,
        CASE action
                WHEN 'Call' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'Communication' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'Whatsapp' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'Utilisation' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'Report' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'CaseStudy' THEN SEC_TO_TIME(TIME_TO_SEC('00:10:00') * COUNT(*))
                WHEN 'Visit' THEN SEC_TO_TIME(TIME_TO_SEC('04:00:00') * COUNT(*))
                WHEN 'Virtual' THEN SEC_TO_TIME(TIME_TO_SEC('03:00:00') * COUNT(*))
                ELSE '00:00:00'
            END AS ttime
        FROM plantask
        LEFT JOIN spd ON spd.id = plantask.spd_id
        LEFT JOIN task_assign ON task_assign.id = plantask.taskid
        LEFT JOIN taskdetail ON taskdetail.tname = task_assign.task_subtype
        LEFT JOIN user_detail ON user_detail.id = task_assign.to_user
        WHERE CAST(plandate AS DATE) BETWEEN '$sd' AND '$ed'
        AND user_id = '$uid'
        GROUP BY plantask.action");
        return $query->result();
    }
    public function get_mytaskstatus($sd,$ed,$uid){
        $query=$this->db->query("SELECT status.name, COUNT(*) cont
        FROM plantask
        LEFT JOIN spd ON spd.id = plantask.spd_id
        LEFT JOIN task_assign ON task_assign.id = plantask.taskid
        LEFT JOIN taskdetail ON taskdetail.tname = task_assign.task_subtype
        LEFT JOIN user_detail ON user_detail.id = task_assign.to_user
        LEFT JOIN status ON status.id = spd.status
        WHERE CAST(plandate AS DATE) BETWEEN '$sd' AND '$ed'
        AND user_id = '$uid'
        GROUP BY status.name;");
        return $query->result();
    }
    public function get_nxtdreportplan($uid,$sd,$ed){
        if($uid==1){
            $query=$this->db->query("SELECT * FROM reportwriting LEFT JOIN user_detail ON user_detail.id=reportwriting.uid WHERE cast(plan as DATE) between '$sd' and '$ed' and close is null");
        }else{
            $query=$this->db->query("SELECT * FROM reportwriting LEFT JOIN user_detail ON user_detail.id=reportwriting.uid WHERE cast(plan as DATE) between '$sd' and '$ed' and close is null and uid='$uid'");
        }
        return $query->result();
    }
    public function get_nxtdsummerplan($uid,$sd,$ed){
        if($uid==1){
            $query=$this->db->query("SELECT * FROM summercamp LEFT JOIN user_detail ON user_detail.id=summercamp.createdby WHERE cast(plandt as DATE) between '$sd' and '$ed'");
        }else{
            $query=$this->db->query("SELECT * FROM summercamp LEFT JOIN user_detail ON user_detail.id=summercamp.createdby  WHERE cast(plandt as DATE) between '$sd' and '$ed' and createdby='$uid'");
        }
        return $query->result();
    }
    public function get_nxtdcuriculumplan($uid,$sd,$ed){
        if($uid==1){
            $query=$this->db->query("SELECT * FROM curiculumassign LEFT JOIN user_detail ON user_detail.id=curiculumassign.piid WHERE cast(sdatet as DATE) between '$sd' and '$ed'");
        }else{
            $query=$this->db->query("SELECT * FROM curiculumassign LEFT JOIN user_detail ON user_detail.id=curiculumassign.piid  WHERE cast(sdatet as DATE) between '$sd' and '$ed' and piid='$uid'");
        }
        return $query->result();
    }
    public function get_nxtdreviewplan($uid,$sd,$ed){
        if($uid==1){
            $query=$this->db->query("SELECT * FROM allreview LEFT JOIN user_detail ON user_detail.id=allreview.piid WHERE cast(plant as DATE) between '$sd' and '$ed'");
        }else{
            $query=$this->db->query("SELECT * FROM allreview LEFT JOIN user_detail ON user_detail.id=allreview.piid  WHERE cast(plant as DATE) between '$sd' and '$ed' and piid='$uid'");
        }
        return $query->result();
    }
    public function get_tdbyuser($touid,$date,$code){
        if($code==1){$txt="plan=0";}
        if($code==2){$txt="plan=1";}
        if($code==3){$txt="plan=1 and tdone=0";}
        if($code==4){$txt="plan=1  and tdone=1";}
        if($code==5){$txt="task_type='Call' and plan=1";}
        if($code==6){$txt="task_type='Call' and plan=1 and tdone=0";}
        if($code==7){$txt="task_type='Call' and plan=1 and tdone=1";}
        if($code==8){$txt="task_type='Email' and plan=1";}
        if($code==9){$txt="task_type='Email' and plan=1 and tdone=0";}
        if($code==10){$txt="task_type='Email' and plan=1 and tdone=1";}
        if($code==11){$txt="task_type='Whatsapp' and plan=1";}
        if($code==12){$txt="task_type='Whatsapp' and plan=1 and tdone=0";}
        if($code==13){$txt="task_type='Whatsapp' and plan=1 and tdone=1";}
        if($code==14){$txt="task_type='FTTP' and plan=1";}
        if($code==15){$txt="task_type='FTTP' and plan=1 and tdone=0";}
        if($code==16){$txt="task_type='FTTP' and plan=1 and tdone=1";}
        if($code==17){$txt="task_type='RTTP' and plan=1";}
        if($code==18){$txt="task_type='RTTP' and plan=1 and tdone=0";}
        if($code==19){$txt="task_type='RTTP' and plan=1 and tdone=1";}
        if($code==20){$txt="task_type='MnE' and plan=1";}
        if($code==21){$txt="task_type='MnE' and plan=1 and tdone=0";}
        if($code==22){$txt="task_type='MnE' and plan=1 and tdone=1";}
        if($code==23){$txt="task_type='DIY' and plan=1";}
        if($code==24){$txt="task_type='DIY' and plan=1 and tdone=0";}
        if($code==25){$txt="task_type='DIY' and plan=1 and tdone=1";}
        if($code==26){$txt="task_type='Utilisation' and plan=1";}
        if($code==27){$txt="task_type='Utilisation' and plan=1 and tdone=0";}
        if($code==28){$txt="task_type='Utilisation' and plan=1 and tdone=1";}
        if($code==29){$txt="task_type='Report' and plan=1";}
        if($code==30){$txt="task_type='Report' and plan=1 and tdone=0";}
        if($code==31){$txt="task_type='Report' and plan=1 and tdone=1";}
        if($code==32){$txt="task_type='Other' and plan=1";}
        if($code==33){$txt="task_type='Other' and plan=1 and tdone=0";}
        if($code==34){$txt="task_type='Other' and plan=1 and tdone=1";}
        if($code==35){$txt="actiontaken='Yes'";}
        if($code==36){$txt="actiontaken='No'";}
        if($code==37){$txt="purpose='Yes'";}
        if($code==38){$txt="purpose='No'";}
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status where task_assign.to_user='$touid' and cast(task_assign.sdatet as DATE)= '$date' and $txt");
        return $query->result();
    }
    public function get_Utilisationdetail(){
        if($code==1){$txt="plan=0";}
        if($code==2){$txt="plan=1";}
        if($code==3){$txt="plan=1 and tdone=0";}
        if($code==4){$txt="plan=1  and tdone=1";}
        if($code==26){$txt="task_type='Utilisation' and plan=1";}
        if($code==27){$txt="task_type='Utilisation' and plan=1 and tdone=0";}
        if($code==28){$txt="task_type='Utilisation' and plan=1 and tdone=1";}
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status where task_assign.to_user='$touid' and cast(task_assign.sdatet as DATE)= '$date' and $txt");
        return $query->result();
    }
    public function get_tdbyad($date,$code){
        if($code==1){$txt="plan=0";}
        if($code==2){$txt="plan=1";}
        if($code==3){$txt="plan=1 and tdone=0";}
        if($code==4){$txt="plan=1  and tdone=1";}
        if($code==5){$txt="task_type='Call' and plan=1";}
        if($code==6){$txt="task_type='Call' and plan=1 and tdone=0";}
        if($code==7){$txt="task_type='Call' and plan=1 and tdone=1";}
        if($code==8){$txt="task_type='Email' and plan=1";}
        if($code==9){$txt="task_type='Email' and plan=1 and tdone=0";}
        if($code==10){$txt="task_type='Email' and plan=1 and tdone=1";}
        if($code==11){$txt="task_type='Whatsapp' and plan=1";}
        if($code==12){$txt="task_type='Whatsapp' and plan=1 and tdone=0";}
        if($code==13){$txt="task_type='Whatsapp' and plan=1 and tdone=1";}
        if($code==14){$txt="task_type='FTTP' and plan=1";}
        if($code==15){$txt="task_type='FTTP' and plan=1 and tdone=0";}
        if($code==16){$txt="task_type='FTTP' and plan=1 and tdone=1";}
        if($code==17){$txt="task_type='RTTP' and plan=1";}
        if($code==18){$txt="task_type='RTTP' and plan=1 and tdone=0";}
        if($code==19){$txt="task_type='RTTP' and plan=1 and tdone=1";}
        if($code==20){$txt="task_type='MnE' and plan=1";}
        if($code==21){$txt="task_type='MnE' and plan=1 and tdone=0";}
        if($code==22){$txt="task_type='MnE' and plan=1 and tdone=1";}
        if($code==23){$txt="task_type='DIY' and plan=1";}
        if($code==24){$txt="task_type='DIY' and plan=1 and tdone=0";}
        if($code==25){$txt="task_type='DIY' and plan=1 and tdone=1";}
        if($code==26){$txt="task_type='Utilisation' and plan=1";}
        if($code==27){$txt="task_type='Utilisation' and plan=1 and tdone=0";}
        if($code==28){$txt="task_type='Utilisation' and plan=1 and tdone=1";}
        if($code==29){$txt="task_type='Report' and plan=1";}
        if($code==30){$txt="task_type='Report' and plan=1 and tdone=0";}
        if($code==31){$txt="task_type='Report' and plan=1 and tdone=1";}
        if($code==32){$txt="task_type='Other' and plan=1";}
        if($code==33){$txt="task_type='Other' and plan=1 and tdone=0";}
        if($code==34){$txt="task_type='Other' and plan=1 and tdone=1";}
        if($code==35){$txt="actiontaken='Yes'";}
        if($code==36){$txt="actiontaken='No'";}
        if($code==37){$txt="purpose='Yes'";}
        if($code==38){$txt="purpose='No'";}
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status where cast(task_assign.sdatet as DATE)= '$date' and $txt");
        return $query->result();
    }
    public function get_bwdtdbyad($sd,$ed,$code){
        if($code==1){$txt="plan=0";}
        if($code==2){$txt="plan=1";}
        if($code==3){$txt="plan=1 and tdone=0";}
        if($code==4){$txt="plan=1  and tdone=1";}
        if($code==5){$txt="task_type='Call' and plan=1";}
        if($code==6){$txt="task_type='Call' and plan=1 and tdone=0";}
        if($code==7){$txt="task_type='Call' and plan=1 and tdone=1";}
        if($code==8){$txt="task_type='Email' and plan=1";}
        if($code==9){$txt="task_type='Email' and plan=1 and tdone=0";}
        if($code==10){$txt="task_type='Email' and plan=1 and tdone=1";}
        if($code==11){$txt="task_type='Whatsapp' and plan=1";}
        if($code==12){$txt="task_type='Whatsapp' and plan=1 and tdone=0";}
        if($code==13){$txt="task_type='Whatsapp' and plan=1 and tdone=1";}
        if($code==14){$txt="task_type='FTTP' and plan=1";}
        if($code==15){$txt="task_type='FTTP' and plan=1 and tdone=0";}
        if($code==16){$txt="task_type='FTTP' and plan=1 and tdone=1";}
        if($code==17){$txt="task_type='RTTP' and plan=1";}
        if($code==18){$txt="task_type='RTTP' and plan=1 and tdone=0";}
        if($code==19){$txt="task_type='RTTP' and plan=1 and tdone=1";}
        if($code==20){$txt="task_type='MnE' and plan=1";}
        if($code==21){$txt="task_type='MnE' and plan=1 and tdone=0";}
        if($code==22){$txt="task_type='MnE' and plan=1 and tdone=1";}
        if($code==23){$txt="task_type='DIY' and plan=1";}
        if($code==24){$txt="task_type='DIY' and plan=1 and tdone=0";}
        if($code==25){$txt="task_type='DIY' and plan=1 and tdone=1";}
        if($code==26){$txt="task_type='Utilisation' and plan=1";}
        if($code==27){$txt="task_type='Utilisation' and plan=1 and tdone=0";}
        if($code==28){$txt="task_type='Utilisation' and plan=1 and tdone=1";}
        if($code==29){$txt="task_type='Report' and plan=1";}
        if($code==30){$txt="task_type='Report' and plan=1 and tdone=0";}
        if($code==31){$txt="task_type='Report' and plan=1 and tdone=1";}
        if($code==32){$txt="task_type='Other' and plan=1";}
        if($code==33){$txt="task_type='Other' and plan=1 and tdone=0";}
        if($code==34){$txt="task_type='Other' and plan=1 and tdone=1";}
        if($code==35){$txt="actiontaken='Yes'";}
        if($code==36){$txt="actiontaken='No'";}
        if($code==37){$txt="purpose='Yes'";}
        if($code==38){$txt="purpose='No'";}
        $query=$this->db->query("Select * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id LEFT JOIN user_detail ON user_detail.id=task_assign.to_user LEFT JOIN spd ON spd.id=task_assign.spd_id LEFT JOIN status ON status.id=spd.status where $txt and cast(task_assign.sdatet as DATE) between '$sd' and '$ed'");
        return $query->result();
    }
    public function get_ttaskbyuser($date,$tasktype){
        $query=$this->db->query("SELECT task_assign.to_user,COUNT(task_assign.task_type)as tt, SUM(task_assign.plan) as tplan,SUM(plantask.tdone) as tdone FROM `task_assign`LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE CAST(task_assign.sdatet as DATE)='$date' and task_assign.task_type='$tasktype' GROUP BY task_assign.to_user");
        return $query->result();
    }
    public function get_ttbyuser($touser){
        $query=$this->db->query("SELECT task_assign.to_user,COUNT(task_assign.task_type)as tt, SUM(task_assign.plan) as tplan,SUM(plantask.tdone) as tdone FROM `task_assign`LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.to_user='$touser'");
        return $query->result();
    }
    public function get_ttbyuserd($touser,$sdate,$edate){
        $query=$this->db->query("SELECT task_assign.to_user,COUNT(task_assign.task_type)as tt, SUM(task_assign.plan) as tplan,SUM(plantask.tdone) as tdone FROM `task_assign`LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.to_user='$touser' and cast(task_assign.sdatet as DATE) BETWEEN '$sdate' AND '$edate'");
        return $query->result();
    }
    public function get_taskassign_byid($id){
        $query=$this->db->query("select * from task_assign where id='$id'");
        return $query->result();
    }
    public function get_taskassign_byuid($uid){
        $query=$this->db->query("select * from task_assign where to_user='$uid'");
        return $query->result();
    }
    public function get_ttbydu($sdate,$edate,$tasktype,$touser){
        $query=$this->db->query("select * from task_assign left JOIN plantask on plantask.taskid=task_assign.id where CAST(task_assign.sdatet as DATE) BETWEEN '$sdate' AND '$edate' and task_assign.task_type='$tasktype' and to_user='$touser'");
        return $query->result();
    }
    public function get_taskbyud($uid,$date,$tasktype){
        $query=$this->db->query("select * from task_assign where to_user='$uid' and CAST(task_date as DATE)='$date' and task_type='$tasktype'");
        return $query->result();
    }
    public function get_taskbyid($tid){
        $query=$this->db->query("select * from task_assign where id='$tid'");
        return $query->result();
    }
    public function get_snextststus($status){
        $query=$this->db->query("SELECT name FROM status WHERE ID IN(SELECT ID + 1 FROM status WHERE name='$status')");
        return $query->result();
    }
    public function get_plantask($uid,$tdate){
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone=0 and cast(plantask.sdatet AS DATE)='$tdate' ORDER BY plantask.sdatet ASC");
        return $query->result();
    }
    public function get_plantasktd($uid,$tdate){
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone='1' and cast(plantask.donet AS DATE)='$tdate' ORDER BY plantask.donet ASC");
        return $query->result();
    }
    public function get_pendingt($uid){
        $query=$this->db->query("select * from task_assign where to_user='$uid' and plan=0 ORDER BY task_assign.sdatet ASC");
        return $query->result();
    }
    public function get_provisiont($lstttid){
        $query=$this->db->query("select * from task_assign where id='$lstttid'");
        return $query->result();
    }
    public function get_ttdone($uid,$tdate,$action){
        $query=$this->db->query("SELECT *,plantask.id pid,task_assign.project_code pcode,task_assign.id tid FROM plantask LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='$uid' and tdone=0 and cast(plantask.plandate AS DATE)='$tdate' and plantask.action='$action' ORDER BY plantask.plandate ASC");
        return $query->result();
    }
    public function get_ttdonetd($uid,$tdate,$action){
        $query=$this->db->query("SELECT * FROM plantask LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='$uid' and tdone=0 and cast(plantask.donet AS DATE)='$tdate' and plantask.action='$action' ORDER BY plantask.donet ASC");
        return $query->result();
    }
    public function get_tdonebyid($tid){
        $query=$this->db->query("SELECT * FROM plantask LEFT join task_assign ON task_assign.id=plantask.taskid WHERE task_assign.id='$tid'");
        return $query->result();
    }
    public function gettdonebyd($sid,$page,$action){
        $query = $this->db->query("SELECT *,task_assign.id tid,plantask.id pid FROM plantask  LEFT join task_assign ON task_assign.id=plantask.taskid LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE plantask.action='$action' and task_assign.spd_id='$sid' and task_assign.checklist='$page' and plantask.tdone='1'");
        return $query->result();
    }
    public function gettdonebypcode($pcode,$page,$action){
        if($action=='Utilisation'){$page='';}
        $query = $this->db->query("SELECT *,task_assign.id tid,plantask.id pid,task_assign.spd_id sid FROM plantask  LEFT join task_assign ON task_assign.id=plantask.taskid LEFT JOIN user_detail ON user_detail.id=task_assign.to_user WHERE plantask.action='$action' and task_assign.project_code='$pcode' and task_assign.checklist='$page' and plantask.tdone='1'");
        return $query->result();
    }
    public function get_BDRBox1(){
        $query = $this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_BDRBox2($rysn){
        $query = $this->db->query("SELECT request_type, COUNT(*) cont,rysn FROM bdrequest GROUP BY request_type,rysn ORDER BY `bdrequest`.`request_type` ASC;");
        return $query->result();
    }
    public function get_ttbytime($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT * FROM plantask LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='$uid' and tdone=0 and cast(plantask.sdatet AS DATE)='$tdate' and cast(plantask.sdatet AS TIME) BETWEEN '$t1' and '$t2' ORDER BY plantask.sdatet ASC");
        return $query->result();
    }
    public function get_ttbytimetd($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT * FROM plantask LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN status ON status.id=spd.status WHERE user_id='$uid' and tdone=1 and cast(plantask.donet AS DATE)='$tdate' and cast(plantask.donet AS TIME) BETWEEN '$t1' and '$t2' ORDER BY plantask.donet ASC");
        return $query->result();
    }
    public function get_ttbytimec($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT * FROM plantask LEFT JOIN task_assign on task_assign.id=plantask.taskid LEFT JOIN status ON status.id=spd.status LEFT JOIN spd ON spd.id=plantask.spd_id WHERE user_id='$uid' and tdone=0 and cast(donet AS DATE)='$tdate' and cast(donet AS TIME) BETWEEN '$t1' and '$t2' ORDER BY plantask.donet ASC");
        return $query->result();
    }
    public function get_ttbytimed($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT count(*) ab,COUNT(CASE WHEN action='Call' THEN action END) a, COUNT(CASE WHEN action='Message' THEN action END) b,COUNT(CASE WHEN action='Email' THEN action END) c, COUNT(CASE WHEN action='Visit' THEN action END) d,COUNT(CASE WHEN action='Utilisation' THEN action END) e,COUNT(CASE WHEN action='Whatsapp' THEN action END) f,COUNT(CASE WHEN action='Report' THEN action END) g,COUNT(CASE WHEN action='Other' THEN action END) i from plantask WHERE user_id='$uid' and tdone=0 and cast(sdatet AS DATE)='$tdate' and cast(sdatet AS TIME) BETWEEN '$t1' and '$t2'");
        return $query->result();
    }
    public function get_ttbytimedtd($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT count(*) ab,COUNT(CASE WHEN action='Call' THEN action END) a, COUNT(CASE WHEN action='Email' THEN action END) b,COUNT(CASE WHEN action='Whatsapp' THEN action END) c, COUNT(CASE WHEN action='Visit' THEN action END) d,COUNT(CASE WHEN action='Utilisation' THEN action END) e,COUNT(CASE WHEN action='Whatsapp' THEN action END) f,COUNT(CASE WHEN action='Report' THEN action END) g, COUNT(CASE WHEN action='Other' THEN action END) i from plantask WHERE user_id='$uid' and tdone=1 and cast(donet AS DATE)='$tdate' and cast(donet AS TIME) BETWEEN '$t1' and '$t2'");
        return $query->result();
    }
    public function get_taskdetailbyid($tid){
        $query=$this->db->query("select * from plantask JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id LEFT JOIN user_detail u1 ON u1.id=plantask.user_id where plantask.taskid='$tid'");
        return $query->result();
    }
    public function get_ttbytimedc($uid,$tdate,$t1,$t2){
        $query=$this->db->query("SELECT count(*) ab,COUNT(CASE WHEN action='Call' THEN action END) a, COUNT(CASE WHEN action='Message' THEN action END) b,COUNT(CASE WHEN action='Email' THEN action END) c, COUNT(CASE WHEN action='Visit' THEN action END) d,COUNT(CASE WHEN action='Utilisation' THEN action END) e,COUNT(CASE WHEN action='Whatsapp' THEN action END) f,COUNT(CASE WHEN action='Report' THEN action END) g from plantask WHERE user_id='$uid' and tdone=0 and cast(donet AS DATE)='$tdate' and cast(donet AS TIME) BETWEEN '$t1' and '$t2'");
        return $query->result();
    }
    public function get_plan($uid,$date){
        $query=$this->db->query("select plantask.*,task_assign.project_code,task_assign.task_type,task_assign.task_subtype from plantask JOIN task_assign ON task_assign.id=plantask.taskid where user_id='$uid' and cast(plandate as DATE)='$date'");
        return $query->result();
    }
    public function get_plandone($uid,$date){
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone=1 and cast(plandate as DATE)='$date'");
        return $query->result();
    }
    public function get_nextplan($uid){
        $date=date('Y-m-d');
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone=0 and cast(plandate as DATE)>'$date'");
        return $query->result();
    }
    public function get_taska($uid,$date){
        $query=$this->db->query("select * from task_assign where to_user='$uid' and cast(task_date as DATE)='$date'");
        return $query->result();
    }
    public function get_plantaskbyua($uid,$action,$tdate){
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone=0 and action='$action' and cast(plantask.plandate AS DATE)='$tdate' ORDER BY plantask.plandate ASC");
        return $query->result();
    }
    public function get_plantaskbyuatd($uid,$action,$tdate){
        $query=$this->db->query("select * from plantask where user_id='$uid' and tdone=1 and action='$action' and cast(plantask.donet AS DATE)='$tdate' ORDER BY plantask.donet ASC");
        return $query->result();
    }
    public function get_ptud($uid,$date,$tasktype){
        $query=$this->db->query("select * from plantask where user_id='$uid' and CAST(sdatet as DATE)='$date' and action='$tasktype'");
        return $query->result();
    }
    public function no_issues($tid,$sid,$page,$plaid){
        $this->db->query("INSERT INTO visitstupdate (sid,tid,que) VALUES ('$sid','$tid','Select Not Working Model')");
    }
    public function Purpose_NotAchieved($tid,$sid,$page,$plaid){
        $tdatet=date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO task_assign(from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster) select from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster from task_assign where id='$tid'");
        $ntid = $this->db->insert_id();
        $this->db->query("update task_assign set sdatet='$tdatet',task_date='$tdatet',plan='0' where id='$ntid'");
        $this->db->query("update plantask set actiontaken='No',purpose='No',donet='$tdatet',tdone='1',remark='Purpose Not Achieved' where taskid='$tid'");
    }
    public function get_plantaskbyid($id){
        $query=$this->db->query("select * from plantask where id='$id'");
        return $query->result();
    }
    public function get_plantaskbytid($tid){
        $query=$this->db->query("select * from plantask where taskid='$tid'");
        return $query->result();
    }
    public function get_plantaskbyaction($action){
        $query=$this->db->query("select * from plantask where action='$action'");
        return $query->result();
    }
    public function get_task($action){
        $query=$this->db->query("select * from plantask where action='$action' and tdone=0");
        return $query->result();
    }
    public function get_school_detailbyid($id){
        $query=$this->db->query("SELECT * FROM `spd` WHERE id='$id'");
        return $query->result();
    }
    public function get_spdtoreadytid($sid){
        $query=$this->db->query("SELECT task_assign.id tid FROM `plantask` LEFT JOIN task_assign on task_assign.id=plantask.taskid WHERE plantask.spd_id='$sid' and task_assign.checklist='page1';");
        return $query->result();
    }
    public function get_spdinstallcall($sid){
        $query=$this->db->query("SELECT task_assign.id tid FROM `plantask` LEFT JOIN task_assign on task_assign.id=plantask.taskid WHERE plantask.spd_id='$sid' and task_assign.checklist='page2';");
        return $query->result();
    }
    public function get_spdDeliveryvisit($sid){
        $query=$this->db->query("SELECT task_assign.id tid FROM `plantask` LEFT JOIN task_assign on task_assign.id=plantask.taskid WHERE plantask.spd_id='3006' and task_assign.checklist='page59';");
        return $query->result();
    }
    public function get_spdinstallvisit($sid){
        $query=$this->db->query("SELECT task_assign.id tid FROM `plantask` LEFT JOIN task_assign on task_assign.id=plantask.taskid WHERE plantask.spd_id='$sid' and task_assign.checklist='page59';");
        return $query->result();
    }
    public function get_spdinstallschoolvisit($sid){
        $query=$this->db->query("SELECT task_assign.id tid FROM `plantask` LEFT JOIN task_assign on task_assign.id=plantask.taskid WHERE plantask.spd_id='$sid' and task_assign.checklist='page6' ;");
        return $query->result();
    }
    public function find_fgcode($umcode,$sid){
        $fmc = str_split($umcode);
        $code1=$fmc[0].$fmc[1].$fmc[2].$fmc[3].$fmc[4].$fmc[5];
        $code2=$fmc[6].$fmc[7].$fmc[8];
        $code3=$fmc[9].$fmc[10].$fmc[11];
        $code2 = ltrim($code2, "0");
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT model_code FROM model where id='$code2'");
        $result = $query->result();
        $mcode = $result[0]->model_code;
        $code3 = ltrim($code3, "0");
        $query1=$db2->query("SELECT batchno FROM batchcode where code='$code1'");
        $row1 = $query1->result();
        $code1 = $row1[0]->batchno;
        $code=$code1."-".$mcode."-".$code3;
        $query2=$db2->query("update unique_model set spdid='$sid' where unique_code='$code'");
    }
    public function get_spdmodel($sid){
        $db2 = $this->load->database('db2', TRUE);
        $query2 = $db2->query("SELECT fg_name fgname FROM unique_model where spdid='$sid'");
        return $query2->result();
    }
    public function get_status(){
        $query=$this->db->query("SELECT * FROM `status`");
        return $query->result();
    }
    public function get_pstatus(){
        $query=$this->db->query("SELECT * FROM `pstatus`");
        return $query->result();
    }
    public function get_statusbyid($id){
        $query=$this->db->query("SELECT name FROM `status` where id='$id'");
        return $query->result();
    }
    public function get_statusbypia($uid){
        $query=$this->db->query("SELECT name FROM status where id in (select status from spd where pi_id='$uid')");
        return $query->result();
    }
    public function get_school_detail1($id){
        $query=$this->db->query("SELECT spd.*, spd_contact.email, spd_contact.contact_no FROM spd LEFT JOIN spd_contact ON spd_contact.sid = spd.id WHERE spd.id = '$id' AND (spd_contact.sid IS NULL OR spd_contact.main = 1)");
        return $query->result();
    }
       public function get_school_detail($id){
        $query=$this->db->query("SELECT spd.*, spd_contact.email, spd_contact.contact_no FROM `spd` join spd_contact on spd_contact.sid=spd.id WHERE spd.id='$id' and spd_contact.main=1");
        return $query->result();
    }
    public function get_programtimeline($pcode){
        $query=$this->db->query("SELECT * FROM programtimeline WHERE projectcode='$pcode'");
        return $query->result();
    }
    public function get_schoollogs($sid){
        $query=$this->db->query("SELECT * FROM schoollogs WHERE sid='$sid' ORDER BY schoollogs.storedt DESC");
        return $query->result();
    }
    public function get_scount($sid,$status){
        $query=$this->db->query("SELECT count(*) as scont FROM schoollogs WHERE sid='$sid' and status='$status'");
        $date =  $query->result();
        return $date[0]->scont;
    }
    public function get_mainremark($action_id, $status_id){
        $query=$this->db->query("SELECT * FROM `purpose` WHERE action_id='$action_id' and status_id='$status_id'");
        return $query->result();
    }
    public function get_city($statename){
        $query=$this->db->query("SELECT id FROM `state` WHERE statename='$statename'");
        $data = $query->result();
        $sid = $data[0]->id;
        $query=$this->db->query("SELECT * FROM `city` WHERE stateid='$sid'");
        return $query->result();
    }
    public function get_district($statename){
        $query=$this->db->query("SELECT id FROM `state` WHERE statename='$statename'");
        $data = $query->result();
        $sid = $data[0]->id;
        $query=$this->db->query("SELECT * FROM district WHERE stateid='$sid'");
        return $query->result();
    }
    public function get_tehshil($statename){
        $query=$this->db->query("SELECT id FROM `state` WHERE statename='$statename'");
        $data = $query->result();
        $sid = $data[0]->id;
        $query=$this->db->query("SELECT * FROM tehshil WHERE stateid='$sid'");
        return $query->result();
    }
    public function get_year($projcode){
        $query=$this->db->query("SELECT MAX(year) as gety FROM report WHERE project_code='$projcode'");
        return $query->result();
    }
    public function get_yearu($projcode){
        $query=$this->db->query("SELECT MAX(year) as gety FROM wgdata WHERE project_code='$projcode'");
        return $query->result();
    }
    public function get_wgbytid($tid){
        $query=$this->db->query("SELECT * FROM wgdata WHERE tid='$tid'");
        return $query->result();
    }
    public function get_yearfh($projcode){
        $query=$this->db->query("SELECT project_year FROM client_handover WHERE projectcode='$projcode'");
        return $query->result();
    }
    public function all_year(){
        $query=$this->db->query("SELECT distinct yearn FROM year");
        return $query->result();
    }
    public function get_purpose($action_id){
        $query=$this->db->query("SELECT * FROM `purpose` WHERE action_id='$action_id'");
        return $query->result();
    }
    public function get_actionremark($purpose_id){
        $query=$this->db->query("SELECT * FROM `next_action` WHERE purpose_id='$purpose_id'");
        return $query->result();
    }
    public function get_school_contact($id){
        $query=$this->db->query("SELECT * FROM spd_contact WHERE sid='$id'");
        return $query->result();
    }
    public function get_wgdata($id){
        $query=$this->db->query("SELECT * FROM wgdata WHERE sid='$id' ORDER BY filepath DESC LIMIT 6");
        return $query->result();
    }
    public function get_wgdatabytid($tid){
        $query=$this->db->query("SELECT * FROM wgdata WHERE tid='$tid'");
        return $query->result();
    }
    public function get_wgdbypc($pc){
        $query=$this->db->query("SELECT distinct date FROM wgdata WHERE project_code='$pc'");
        return $query->result();
    }
    public function get_wgbs(){
        $query=$this->db->query("SELECT DISTINCT sid FROM schoollogs WHERE remark='Installation Report Uploded'");
        return $query->result();
    }
    public function get_wgbsid($sid){
        $query=$this->db->query("SELECT DISTINCT date FROM wgdata WHERE sid='$sid' and tid is not null");
        return $query->result();
    }
    public function change_status($sid,$ss){
        $query=$this->db->query("update spd set status='$ss' WHERE id='$sid'");
    }
    public function schoolir(){
        $query=$this->db->query("SELECT DISTINCT sid FROM `schoollogs` WHERE remark='Installation Report Uploded'");
        return $query->result();
    }
    public function get_wgdbypcy($pc,$ayear){
        $query=$this->db->query("SELECT distinct date FROM wgdata WHERE project_code='$pc' and year='$ayear'");
        return $query->result();
    }
    public function get_uti($id){
        $query=$this->db->query("SELECT * FROM wgdata WHERE sid='$id' and type='Utilisation'");
        return $query->result();
    }
    public function get_utigbds(){
        $query=$this->db->query("SELECT date,sid FROM wgdata WHERE type='Utilisation' GROUP by date,sid");
        return $query->result();
    }
    public function get_wgdgbay(){
        $query=$this->db->query("SELECT distinct year FROM wgdata");
        return $query->result();
    }
    public function get_wgdbysid($sid){
        $query=$this->db->query("SELECT DISTINCT date FROM wgdata WHERE type='Utilisation' and sid='$sid' and cast(sdatet as DATE)>'2022-03-31'");
        return $query->result();
    }
    public function changess($sid,$st){
        $query=$this->db->query("update spd set status='$st' WHERE id='$sid'");
    }
    public function get_wgdbyay($year){
        $query=$this->db->query("select date,count(DISTINCT sid) as csid,count(DISTINCT project_code) as cpc FROM wgdata WHERE type='Utilisation' and year='$year' GROUP by date,sid,project_code");
        return $query->result();
    }
    public function get_wgdgbpc($year){
        $query=$this->db->query("SELECT distinct project_code FROM wgdata where year='$year'");
        return $query->result();
    }
    public function get_utic($id){
        $query=$this->db->query("SELECT distinct date FROM wgdata WHERE sid='$id' and type='Utilisation'");
        return $query->result();
    }
    public function get_media($id){
        $query=$this->db->query("SELECT * FROM wgdata WHERE sid='$id' and type!='Utilisation'");
        return $query->result();
    }
    public function get_depatment(){
        $query=$this->db->query("SELECT * FROM department");
        return $query->result();
    }
    public function get_action(){
        $query=$this->db->query("SELECT * FROM action");
        return $query->result();
    }
    public function get_depatment_byid($id){
        $query=$this->db->query("SELECT * FROM department where id='$id'");
        return $query->result();
    }
    public function get_user(){
        $query=$this->db->query("SELECT * FROM user_detail");
        return $query->result();
    }
    public function get_user_pia(){
        $query=$this->db->query("SELECT *,user_detail.id piid FROM user_detail LEFT JOIN department ON department.id=user_detail.dep_id where dep_id='2'");
        return $query->result();
    }
    public function get_user_imp(){
        $query=$this->db->query("SELECT *,user_detail.id imid FROM user_detail LEFT JOIN department ON department.id=user_detail.dep_id where dep_id='4'");
        return $query->result();
    }
    public function get_areviewstarted(){
        $query=$this->db->query("SELECT * FROM annualreview1 where sdatet is not null and cdatet is null");
        return $query->result();
    }
    public function get_aruwadmin($piid){
        $query=$this->db->query("SELECT user_detail.fullname fullname,u1.fullname zfullname FROM user_detail LEFT JOIN user_detail u1 on u1.id=user_detail.adminid WHERE user_detail.id='$piid'");
        return $query->result();
    }
    public function get_ardata($piid){
        $query=$this->db->query("SELECT count(*)ab ,count(DISTINCT clientname) tclient,count(DISTINCT project_code) tproject,GROUP_CONCAT(DISTINCT clientname) clientname, GROUP_CONCAT(DISTINCT project_code) project,COUNT(DISTINCT scity) cityc,count(DISTINCT sstate) statec,GROUP_CONCAT(DISTINCT scity) city,GROUP_CONCAT(DISTINCT sstate) state, COUNT(CASE WHEN spd.status='1' THEN spd.status END) a, COUNT(CASE WHEN spd.status='2' THEN spd.status END) b, COUNT(CASE WHEN spd.status='3' THEN spd.status END) c, COUNT(CASE WHEN spd.status='4' THEN spd.status END) d, COUNT(CASE WHEN spd.status='5' THEN spd.status END) e, COUNT(CASE WHEN spd.status='6' THEN spd.status END) f, COUNT(CASE WHEN spd.status='7' THEN spd.status END) g, COUNT(CASE WHEN spd.status='8' THEN spd.status END) h, COUNT(CASE WHEN client_handover.project_year='2022-23' THEN client_handover.project_year END) nschool,COUNT(CASE WHEN client_handover.project_year<'2022-23' THEN client_handover.project_year END) oschool FROM spd LEFT JOIN client_handover ON client_handover.projectcode=spd.project_code  WHERE pi_id='$piid' and pm_apr='1'");
        return $query->result();
    }
    public function get_ar2data($piid){
        $query=$this->db->query("SELECT annualreview2.*,spd.sname FROM annualreview2 LEFT JOIN spd ON spd.id=annualreview2.sid WHERE annualreview2.piid='$piid'");
        return $query->result();
    }
    public function get_ar2spdbypiid($piid){
        $query=$this->db->query("select count(*) cont from spd where pi_id='$piid' and pm_apr='1'");
        return $query->result();
    }
    public function get_ar2spd($piid){
        $query=$this->db->query("select count(*) cont from annualreview2 where piid='$piid'");
        return $query->result();
    }
    public function get_partbpapr(){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `purreq` left JOIN vendor_store on vendor_store.purreq_id=purreq.purreq_id WHERE purreq.vander_id is null and purreq.pur_pur=1 and vendor_store.best=1 and vendor_store.done=0");
        return $query->result();
    }
    public function get_partbpapr1($pid){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT material_qty FROM purreq where purreq_id='$pid'");
        return $query->result();
    }
    public function get_partbpapr2($mname){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT material_qty FROM store where material_name='$mname'");
        return $query->result();
    }
    public function get_partbpapr3($vid){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT vander_name FROM vander_detail where vander_id='$vid'");
        return $query->result();
    }
    public function vendor_done($pid,$vid){
        $db2 = $this->load->database('db2', TRUE);
        $db2->query("UPDATE purreq SET vander_id='$vid',status='5' where purreq_id='$pid'");
        $db2->query("INSERT INTO purlogs (purid,username,remark,sid) VALUES ('$pid','Vikash Panchal','Quotation Accept By PM','5')");
    }
    public function get_partpaymentapr(){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT distinct pono FROM `purreq` where pur_ac=3 and pur_admin!=2 and pur_admin!=3 and pur_pur=3 and pono!='' and utrno is null");
        return $query->result();
    }
    public function get_partpaymentapr1($pono){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `purreq` where pono='$pono'");
        return $query->result();
    }
    public function get_partpaymentapr2($vid){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT distinct vander_name FROM `vander_detail` where vander_id='$vid'");
        return $query->result();
    }
    public function process_pay($purreq_id){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM purreq where purreq_id='$purreq_id'");
        $data1 = $query->result();
        $pono = $data1[0]->pono;
        $db2->query("update purreq set pur_admin=2, status='12' where pono='$pono'");
        $query=$db2->query("SELECT * FROM purreq where pono='$pono'");
        $data = $query->result();
        foreach($data as $da){
            $purreq_id = $da->purreq_id;
            $db2->query("INSERT INTO purlogs (purid,username,remark,sid) VALUES ('$purreq_id','Vikash Panchal','Payment Approved by PM','12')");
        }
    }
    public function get_bdnamebyid($bdid){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM user_details where user_id='$bdid'");
        return $query->result();
    }
    public function get_company(){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM `company_master` WHERE id IN (SELECT DISTINCT init_call.cmpid_id FROM `tblcallevents` JOIN init_call ON init_call.id=tblcallevents.cid_id where status_id=7)");
        return $query->result();
    }
    public function get_question(){
        $query=$this->db->query("select * from question_set");
        return $query->result();
    }
    public function get_questionbyid($id){
        $query=$this->db->query("select * from question_set where id='$id'");
        return $query->result();
    }
    public function get_curiculumassign($uid){
        $query=$this->db->query("SELECT * FROM curiculumassign LEFT JOIN user_detail ON user_detail.id=curiculumassign.piid where piid='$uid'");
        return $query->result();
    }
    public function get_curiculum(){
        $query=$this->db->query("SELECT * FROM curiculumassign LEFT JOIN user_detail ON user_detail.id=curiculumassign.piid");
        return $query->result();
    }
    public function get_curiculumstandardn($uid){
        $query=$this->db->query("SELECT distinct standard FROM curiculumassign LEFT JOIN user_detail ON user_detail.id=curiculumassign.piid where piid='$uid'");
        return $query->result();
    }
    public function get_curicultaskd($uid){
        $query=$this->db->query("SELECT *,user_detail.fullname FROM curiculumtask LEFT JOIN user_detail ON user_detail.id=curiculumtask.piid WHERE piid='$uid'");
        return $query->result();
    }
    public function add_data($fullname, $user,$pwd){
       $this->db->query("INSERT INTO `user_detail` (`fullname`, `user_name`, `password`) VALUES ('$fullname', '$user','$pwd')");
       return $this->db->insert_id();
    }
    public function start_ar($sdate,$piid){
       $this->db->query("INSERT INTO annualreview1(sdatet, piid) VALUES ('$sdate','$piid')");
       return $this->db->insert_id();
    }
    public function curiculum_start($sdate,$piid){
       $this->db->query("INSERT INTO curiculumtask(startt,piid) VALUES ('$sdate','$piid')");
       return $this->db->insert_id();
    }
    public function curiculum_close($cdate,$piid,$standard,$subject,$concept,$loutcomes,$tmethodologhy,$rwebsite,$rvlink,$attechment,$count){
        $fpn='';
        for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['attechment']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['attechment']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['attechment']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['attechment']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['attechment']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $fpn.','.$uploadPath.$filename;
                      }
        }
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
       $this->db->query("update curiculumtask set closet='$datet', standard='$standard',subject='$subject',concept='$concept',loutcomes='$loutcomes',tmethodologhy='$tmethodologhy',rwebsite='$rwebsite',rvlink='$rvlink',attechment='$fpn' where startt is not null and closet is null and piid='$piid'");
       return $this->db->insert_id();
    }
    public function assign_curiculum($sdate,$piid,$standard,$remark,$tdate,$noc){
       $this->db->query("INSERT INTO curiculumassign(sdatet,piid,standard,remark,closet,noc) VALUES ('$sdate','$piid','$standard','$remark','$tdate','$noc')");
       return $this->db->insert_id();
    }
    public function close_ar($cdate,$piid){
       $this->db->query("update annualreview1 set cdatet='$cdate' where piid='$piid'");
       return $this->db->insert_id();
    }
    public function add_resource($title,$sts,$tof,$creatives,$vlink){
       $this->db->query("INSERT INTO `resource` (uploadresource, sts, tof, creatives, vlink) VALUES ('$title', '$sts','$tof','$creatives','$vlink')");
       return $this->db->insert_id();
    }
    public function Bag_Muse($tid,$model_name,$mtid,$mqty){
       $this->db->query("INSERT INTO usesmbag(model_name, tid, material_name, mqty) VALUES ('$model_name','$tid','$mtid','$mqty')");
       return $this->db->insert_id();
    }
    public function get_rbytype(){
        $query=$this->db->query("SELECT * FROM resource where type='Active School'");
        return $query->result();
    }
    public function get_taskdata($piid,$sd,$ed,$aid){
        $query=$this->db->query("SELECT task_assign.sdatet assign,plantask.*,user_detail.fullname pia,task_assign.task_type tt,task_assign.task_subtype stt,spd.id sid,spd.project_code,spd.clientname,spd.sname,spd.saddress,spd.scity,spd.sstate,plantask.remark FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id WHERE plantask.action='$aid' and user_id='$piid' and cast(donet as DATE) BETWEEN '$sd' AND '$ed'");
        return $query->result();
    }
    public function get_completedtask($date){
        $query=$this->db->query("SELECT task_assign.sdatet assign,plantask.*,user_detail.fullname pia,task_assign.task_type tt,task_assign.task_subtype stt,spd.id sid,spd.project_code,spd.clientname,spd.sname,spd.saddress,spd.scity,spd.sstate,plantask.remark FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id WHERE cast(plandate as DATE)='$date' and plantask.tdone='1'");
        return $query->result();
    }
    public function get_pendingtask($date){
        $query=$this->db->query("SELECT task_assign.sdatet assign,plantask.*,user_detail.fullname pia,task_assign.task_type tt,task_assign.task_subtype stt,spd.id sid,spd.project_code,spd.clientname,spd.sname,spd.saddress,spd.scity,spd.sstate,plantask.remark FROM plantask LEFT JOIN user_detail ON user_detail.id=plantask.user_id LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd ON spd.id=plantask.spd_id WHERE cast(plandate as DATE)='$date' and plantask.tdone='0'");
        return $query->result();
    }
    public function get_outbound($sid,$rid){
        $query=$this->db->query("SELECT * FROM outbound where sid='$sid' and rid='$rid'");
        return $query->result();
    }
    public function get_resourcebysid(){
        $query=$this->db->query("SELECT * FROM resource");
        return $query->result();
    }
    public function get_bdrcom($rid,$uuid,$comment){
       $this->db->query("INSERT INTO `bdrequestlog` (tby, detail, tid) VALUES ('$uuid', '$comment','$rid')");
       return $this->db->insert_id();
    }
    public function add_plantask($taskid,$date,$action,$uid,$sid){
       $query=$this->db->query("update task_assign set plan=1 WHERE id='$taskid'");
       $this->db->query("INSERT INTO `plantask` (action, plandate, taskid, user_id, spd_id) VALUES ('$action', '$date','$taskid', '$uid', '$sid')");
       return $this->db->insert_id();
    }
    public function backdrop_ar($id, $val, $rem,$by,$cid){
       if($val=='Reject'){
           $query=$this->db->query("update client_handover set apr='$val',remark='$rem' WHERE id='$id'");
           $remark='Backdrop Rejected by '.$by;
           $this->db->query("INSERT INTO handoverlog(cid, taskby, remark) VALUES ('$cid','$by','$remark')");
       }else{
        $query=$this->db->query("update client_handover set apr='$val' WHERE id='$id'");
        $remark='Backdrop Approved by '.$by;
        $this->db->query("INSERT INTO handoverlog(cid, taskby, remark) VALUES ('$cid','$by','$remark')");
       }
    }
    public function profile_edit($id,$oldpass,$newpass,$phoneno,$email){
       $query=$this->db->query("update user_detail set password='$newpass', email='$email', phoneno='$phoneno' WHERE id='$id' and password='$oldpass'");
       return $this->db->affected_rows();
    }
    public function bag_assign($date, $user, $bcode){
       $query=$this->db->query("update mbagcodea set assign='$user', assignat='$date' WHERE bcode='$bcode'");
       return $this->db->affected_rows();
    }
    public function set_approve($sid,$remark,$apr){
       $query=$this->db->query("update spd set zh_apr='$apr', rremark='$remark' WHERE id='$sid'");
       return $this->db->affected_rows();
    }
    public function set_pmapprove($sid,$remark,$apr){
       $query=$this->db->query("update spd set pm_apr='$apr', rremark='$remark' WHERE id='$sid'");
       return $this->db->affected_rows();
    }
    public function backdrop_arbd($id, $val){
       $query=$this->db->query("update spd set bd_apr='$val' WHERE id='$id'");
    }
    public function bd_toaccount($btn){
        $query=$this->db->query("select * from client_handover where id='$btn'");
        return $query->result();
    }
    public function pm_tofm($btn){
        $query=$this->db->query("update client_handover set pm_id=1 where id='$btn'");
        $this->db->query("INSERT INTO handoverlog(cid, taskby, remark, stid)
                          VALUES ('$btn','Vikash Panchal','Handover To FM','7')");
    }
    public function task_Detail($btn){
        $query=$this->db->query("select * from pre_assign where task_id='$btn'");
        return $query->result();
    }
    public function task_assign_Detail($btn){
        $query=$this->db->query("select * from pre_assign where task_id='$btn'");
        return $query->result();
    }
    public function model_repair($tid,$sid,$model,$remark,$part_name){
        $query=$this->db->query("SELECT * FROM model where id='$model'");
        $data = $query->result();
        $mname = $data[0]->model_name;
        $this->db->query("INSERT INTO repairreq (sid, tid, model_name, status,remark,part_name) VALUES ('$sid','$tid','$mname','Open','$remark','$part_name')");
        return $this->db->insert_id();
    }
    public function model_replacement($tid,$sid,$model,$remark ,$part_name){
       $l = sizeof($model);
       for($i=0;$i<$l;$i++){
        $query=$this->db->query("SELECT * FROM model where id='$model[$i]'");
        $data = $query->result();
        $mname = $data[0]->model_name;
           $this->db->query("INSERT INTO replacereq (sid, tid, model_name, status,remark,part_name) VALUES ('$sid','$tid','$mname','Open','$remark','$part_name')");
        }
        return $this->db->insert_id();
    }
    public function add_spd($sname,$saddress,$slocation,$slanguage,$snoyear,$sayear,$std,$boys,$girls,$total_students,$total_teachers,$timing,$website,$status){
       $this->db->query("INSERT INTO `spd` (`sname`, `saddress`, `slocation`, `slanguage`, `snoyear`, `sayear`, `std`, `boys`, `girls`, `total_students`, `total_teachers`, `timing`, `website`, `status`) VALUES ('$sname', '$saddress', '$slocation', '$slanguage', '$snoyear', '$sayear', '$std', '$boys', '$girls', '$total_students', '$total_teachers', '$timing', '$website', '$status')");
        return $this->db->insert_id();
    }
    public function add_spdwithpc($project_code,$sname,$saddress,$scity,$sstate){
       $this->db->query("INSERT INTO `spd` (project_code, sname, saddress, scity, sstate) VALUES ('$project_code', '$sname', '$saddress', '$scity', '$sstate')");
       return $this->db->insert_id();
    }
    public function add_installmodel($model,$ndel,$nwork,$que,$remark,$indata){
        $j =  sizeof($model);
        $no = "NO";
        $i=0;
        for($i;$i<$j;$i++){
            $this->db->query("INSERT INTO `model_install` (model_name, delivered, working) VALUES ('$model[$i]', 'YES', 'YES')");
        }
        if(!empty($ndel)){
        $k = sizeof($ndel);
        $i=0;
        for($i;$i<$k;$i++){
        $query=$this->db->query("update model_install set delivered='NO' where model_name='$ndel[$i]'");
        }}
        if(!empty($nwork)){
        $l = sizeof($nwork);
        $i=0;
        for($i;$i<$l;$i++){
        $query=$this->db->query("update model_install set working='NO' where model_name='$nwork[$i]'");
        }}
        $m = sizeof($que);
        $i=0;
        for($i;$i<$m;$i++){
            if($remark[$i]==''){ $this->db->query("INSERT INTO `answerset` (qid, ans, sid) VALUES ('$que[$i]', 'YES', '$indata[2]')");}
            else{$this->db->query("INSERT INTO `answerset` (qid, ans, remark, sid) VALUES ('$que[$i]', 'NO', '$remark[$i]', '$indata[2]')");}
        }
       $this->db->query("INSERT INTO spd_contact (sid, contact_name, designation, contact_no, email,main) VALUES ('$indata[2]','$indata[7]','$indata[8]','$indata[9]','$indata[10]','1')");
       $this->db->query("INSERT INTO schooltimeline (spd_id, ins_date) VALUES ('$indata[2]','$indata[1]')");
    }
    public function  get_stimelinebypi($piid){
        $query=$this->db->query("SELECT count(distinct sid) cont FROM schooltimeline WHERE piaid='$piid'");
        return $query->result();
    }
    public function  get_stimelinebypisid($sid,$piid){
        $query=$this->db->query("SELECT * FROM schooltimeline WHERE sid='$sid' and piaid='$piid'");
        return $query->result();
    }
    public function  get_mscccbypiid($uid){
        $query=$this->db->query("SELECT count(*) cont1 ,count(case when sdate is not null then 1 end) cont2, count(case when sdate is null then 1 end) cont3  FROM msccc WHERE piid='$uid'");
        return $query->result();
    }
    public function  get_mscccbypiidZM($uid){
        $query=$this->db->query("SELECT user_detail.fullname piname, clustername, sdate, edate, sid, temptd, storedt, remark FROM msccc LEFT JOIN user_detail ON user_detail.id = msccc.piid WHERE 1");
        return $query->result();
    }
    public function  get_mscccbypia($uid){
        $query=$this->db->query("SELECT *  FROM msccc WHERE piid='$uid'");
        return $query->result();
    }
    public function  add_planmsccc($userid,$cname,$spd,$tpct,$sdate,$edate,$remark){
      $spd = implode(",", $spd);
      $query=$this->db->query("Update msccc set sdate='$sdate', edate='$edate', sid	='$spd', temptd='$tpct', remark='$remark' where piid='$userid' and clustername='$cname'");
    }
    public function  add_msccc($hmcr,$userid){
        for($i=1;$i<=$hmcr;$i++){
            $clustername = "Cluster ".$i;
            $query=$this->db->query("INSERT INTO msccc(piid, clustername) VALUES ('$userid','$clustername')");
        }
    }
    public function  get_spdtlc($piid){
        $query=$this->db->query("SELECT COUNT(spd.id) AS tspd, COUNT(DISTINCT st.sid) AS tspdtl FROM spd LEFT JOIN schooltimeline AS st ON spd.id = st.sid WHERE spd.pi_id = '$piid' and spd.pm_apr='1';");
        return $query->result();
    }
    public function call_school_update($sid,$tid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no,$visitr,$dodm){
        date_default_timezone_set("Asia/Kolkata");
        $datet = date('Y-m-d H:i:s');
        $this->db->query("update spd set sname='$sname',slanguage='$slanguage',total_teachers='$total_teachers',total_students='$total_students',boys='$boys',girls='$girls',saddress='$saddress',spincode='$spincode',scity='$scity',sstate='$sstate' where id='$sid'");
        $this->db->query("update spd_contact set main='1',contact_name='$contact_name',contact_no='$contact_no' where sid='$sid'");
        $spd = $this->Menu_model->get_spdbyid($sid);
        $pi = $spd[0]->pi_id;
        if($visitr=='Yes'){
            $this->Menu_model->autotask($sid,$pi,'93','','Visit','School Identification','page55',$datet,'');
        }
        if($dodm=='Yes'){
            $this->Menu_model->autotask($sid,$pi,'93','','Visit','School DO/DM Letter','page57',$datet,'');
        }
    }
    public function Change_school_update($pia,$ins,$sid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no){
        $query=$this->db->query("SELECT * FROM spd left join spd_contact ON spd_contact.sid=spd.id WHERE spd.id='$sid' and spd_contact.main='1'");
        $data = $query->result();
        $d1=$data[0]->id;
        $d2=$data[0]->sname;
        $d3=$data[0]->slanguage;
        $d4=$data[0]->total_teachers;
        $d5=$data[0]->total_students;
        $d6=$data[0]->boys;
        $d7=$data[0]->girls;
        $d8=$data[0]->saddress;
        $d9=$data[0]->spincode;
        $d10=$data[0]->scity;
        $d11=$data[0]->sstate;
        $d12=$data[0]->contact_name;
        $d13=$data[0]->contact_no;
        $d14=$data[0]->spdident;
        $this->db->query("INSERT INTO changeidenspd (sid, sname, slanguage, total_teachers, total_students, boys, girls, saddress, spincode, scity, sstate, contact_name, contact_no,rid)
        VALUES ('$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14')");
        $this->db->query("update spd set pi_id='$pia',ins_id='$ins', sname='$sname',slanguage='$slanguage',total_teachers='$total_teachers',total_students='$total_students',boys='$boys',girls='$girls',saddress='$saddress',spincode='$spincode',scity='$scity',sstate='$sstate' where id='$sid'");
        $this->db->query("update spd_contact set main='1',contact_name='$contact_name',contact_no='$contact_no' where sid='$sid'");
    }
    public function school_update($uuid,$sid,$tid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no,$lat,$lng){
        $this->db->query("update spd set sname='$sname',slanguage='$slanguage',total_teachers='$total_teachers',total_students='$total_students',boys='$boys',girls='$girls',saddress='$saddress',spincode='$spincode',scity='$scity',sstate='$sstate' where id='$sid'");
        $this->db->query("update spd_contact set main='1',contact_name='$contact_name',contact_no='$contact_no' where sid='$sid'");
        $this->db->query("INSERT INTO visitstupdate (sid,tid,que,ans1,lat,lon) VALUES ('$sid','$tid','Update School Information','','$lat','$lng')");
        $query=$this->db->query("SELECT * FROM spd where id='$sid'");
        $data = $query->result();
        $rid = $data[0]->spdident;
        $msg = $sname." Schools Identified by PIA";
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$rid','$uuid','','$msg')");
    }
    public function get_mytarget($uid){
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("SELECT * FROM todolist WHERE userid='$uid' and dep='Operation' and cdatet is null");
        return $query->result();
    }
    public function get_mrequest(){
        $query=$this->db->query("SELECT *,u1.fullname fromname,meetingrequest.id mid FROM meetingrequest LEFT JOIN user_detail u1 ON u1.id=meetingrequest.fromid LEFT JOIN user_detail u2 ON u2.id=meetingrequest.toid  WHERE cmeeting is null");
        return $query->result();
    }
    public function get_mrequestbyid($mid){
        $query=$this->db->query("SELECT * FROM meetingrequest WHERE id='$mid'");
        return $query->result();
    }
    public function Meeting_Start($uid,$mid){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("Update meetingrequest set toid='$uid',smeeting='$date' WHERE id='$mid'");
    }
    public function Mytarget_Start($uid,$mid){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("Update todolist set stdatet='$date' WHERE id='$mid'");
    }
    public function Meeting_Close($mid,$mcremark){
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $query=$this->db->query("Update meetingrequest set cmeeting='$date',cremark='$mcremark' WHERE id='$mid'");
        $query=$this->db->query("SELECT * FROM meetingrequest WHERE id='$mid'");
        $date =  $query->result();
        $tid = $date[0]->tid;
        $sid = $date[0]->sid;
        $quen="Call With Reporting Manager";
        $this->db->query("INSERT INTO visitstupdate (sid,tid,que,ans3) VALUES ('$sid','$tid','$quen','$mcremark')");
    }
    public function Mytarget_Close($mid,$mcremark,$attch,$count){
                    $data = [];
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['attch']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['attch']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['attch']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['attch']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['attch']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                        if($this->upload->do_upload('file')){
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];
                            $fpn = $uploadPath.$filename;
                        }
                    }
        $fpn = "https://stemoppapp.in/".$fpn;
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("Update todolist set cdatet='$date',remark='$mcremark', attch='$fpn' WHERE id='$mid'");
    }
     public function Mytarget_chnage($mid,$mcremark,$ttchange){
        date_default_timezone_set("Asia/Kolkata");
        $db3 = $this->load->database('db3', TRUE);
        $query=$db3->query("Update todolist set ttchange='$ttchange',cremark='$mcremark' WHERE id='$mid'");
    }
    public function add_Reminder($tid,$uid,$remark,$mvid){
        date_default_timezone_set("Asia/Kolkata");
        $tdate = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO reminder (tid,uid,remark,mvid) VALUES ('$tid','$uid','$remark','$mvid')");
        $this->db->query("update task_assign set reminder='$remark',remindby='$uid',reminddt='$tdate' where id='$tid'");
    }
    public function add_Appreciate($tid,$uid,$remark){
        $this->db->query("INSERT INTO appreciate (tid,uid,remark) VALUES ('$tid','$uid','$remark')");
    }
    public function get_Reminder($tid){
        $query = $this->db->query("Select * from reminder where tid='$tid'");
        return $query->result();
    }
    public function get_Appreciate($tid){
        $query = $this->db->query("Select * from appreciate where tid='$tid'");
        return $query->result();
    }
    public function Not_Working($useruid,$sid,$tid,$planid,$quen,$mtid,$fgname,$rrdetail,$mqty,$remark,$pname,$prerepair,$pageno){
                $date = date('Y-m-d H:i:s');
                $fn = $_FILES['file']['name'] = $_FILES['prerepair']['name'];
                $_FILES['file']['type']     = $_FILES['prerepair']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['prerepair']['tmp_name'];
                $_FILES['file']['error']    = $_FILES['prerepair']['error'];
                $_FILES['file']['size']     = $_FILES['prerepair']['size'];
                $uploadPath = 'uploads/ansupload/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';
                $uniqueFileName = uniqid().'_'.$fn;
                $config['file_name'] = $uniqueFileName;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $fpn = $uploadPath . $filename;
                }
        if($rrdetail==1){
            $this->db->query("INSERT INTO replacereq (sid,tid,model_name,type,status,modelimg,part_name) VALUES ('$sid','$tid','$fgname','Repaired','Close','$fpn','$pname')");
            if($mqty>0){
            $this->db->query("INSERT INTO usesmbag(model_name, tid, material_name, mqty) VALUES ('$fgname','$tid','$mtid','$mqty')");}
        }
        if($rrdetail==2){
            $this->db->query("INSERT INTO replacereq (sid,tid,model_name,type,modelimg,part_name) VALUES ('$sid','$tid','$fgname','Repair','$fpn','$pname')");
            $this->db->query("Update model_install set working='NO' where spd_id='$sid' and model_name='$fgname'");
        }
        if($rrdetail==3){
            $this->db->query("INSERT INTO replacereq (sid,tid,model_name,type,modelimg,part_name) VALUES ('$sid','$tid','$fgname','replace','$fpn','$pname')");
            $this->db->query("Update model_install set working='NO' where spd_id='$sid' and model_name='$fgname'");
        }
        $query=$this->db->query("update model_install set modelimg='$fpn' where spd_id='$sid' and model_name='$fgname'");
    }
    public function visit_update($useruid,$sid,$tid,$count,$filname,$quen,$lat,$lng,$fgallcode,$planid,$uptype,$ttpnwm,$mlink){
                $date = date('Y-m-d H:i:s');
                $query=$this->db->query("SELECT * FROM task_assign where id='$tid'");
                $data = $query->result();
                $ttype = $data[0]->task_type;
                $tsubtype = $data[0]->task_subtype;
                $query=$this->db->query("SELECT * FROM spd where id='$sid'");
                $data = $query->result();
                $status = $data[0]->status;
                $query=$this->db->query("update plantask set initiateddt='$date' WHERE id='$planid' and initiateddt is null");
                $query=$this->db->query("INSERT INTO schoollogs(sid, status, task_type, remark, taskid) VALUES ('$sid','$status','$ttype','$tsubtype','$tid')");
                $this->db->query("update task_assign set lstttid=null where lstttid='$tid'");
                if($count>0){
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['filname']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['filname']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['filname']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['filname']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['filname']['size'][$i];
                    $uploadPath = 'uploads/ansupload/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $flink[] = $uploadPath.$filename;
                    }else{$flink=0;}
                }}
                    if($uptype==1){$this->db->query("INSERT INTO visitstupdate (sid,tid,que,ans1,lat,lon) VALUES ('$sid','$tid','$quen','$flink[0]','$lat','$lng')");}
                    if($uptype==2){
                        if($ttpnwm!='0'){
                            $nwmodel="";
                            $k = sizeof($ttpnwm);
                            for($i=0;$i<$k;$i++){
                                $nwmodel = $nwmodel.",".$ttpnwm[$i];
                            }
                            $this->db->query("INSERT INTO visitstupdate (sid,tid,que,ans2,ans3,lat,lon) VALUES ('$sid','$tid','$quen','$flink[0]','$nwmodel','$lat','$lng')");
                        }else{
                                $query = $this->db->query("Select * from visitstupdate where sid='$sid' and tid='$tid' and que='Call With Reporting Manager'");
                                $data = $query->result();
                                if(!$data){
                                    $this->db->query("INSERT INTO visitstupdate (sid,tid,que,ans2,lat,lon) VALUES ('$sid','$tid','$quen','$flink[0]','$lat','$lng')");
                                }
                        }
                    }
                    if($mlink!='0'){
                        $this->db->query("INSERT INTO meetingrequest (mlink,tid,sid,fromid) VALUES ('$mlink','$tid','$sid','$useruid')");
                    }
                       $spd = $this->Menu_model->get_spdbyid($sid);
                       $pi = $spd[0]->pi_id;
                       $zh = $spd[0]->zh_id;
                       $sname = $spd[0]->sname;
                       $pcode = $spd[0]->project_code;
                       $msg = $pcode." | ".$sname." | ".$quen;
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
                if($fgallcode!=0){
                    $j =  sizeof($fgallcode);
                    if($quen=='Model Counting by Barcode Scanning'){
                        for($i=0;$i<$j;$i++){
                            $this->db->query("INSERT INTO model_install (model_name, delivered,working,spd_id) VALUES ('$fgallcode[$i]', 'YES', 'YES','$sid')");
                        }
                    }
                    if($quen=='Select Not Working Model'){
                        $query = $this->db->query("Select count(*) cont from model_install where spd_id='$sid'");
                        $data = $query->result();
                        if($data[0]->cont==0){
                            $query1 = $this->db->query("Select * from model_install where spd_id='2786'");
                            $data1 = $query1->result();
                            foreach($data1 as $da){
                                $fgname = $da->model_name;
                                $this->db->query("INSERT INTO model_install (model_name, delivered,working,spd_id) VALUES ('$fgname', 'YES', 'YES','$sid')");
                            }
                        }
                        for($i=0;$i<$j;$i++){
                            $this->db->query("Update model_install set working='NO' where spd_id='$sid' and model_name='$fgallcode[$i]'");
                        }
                    }
                }
        return $sid;
    }
    public function call_ans($que,$ansremark,$sel,$remat,$datein,$rate,$count,$tid,$page,$attac){
        $query=$this->db->query("SELECT * FROM task_assign where id='$tid'");
        $data = $query->result();
        $sid = $data[0]->spd_id;
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
        if($count>0){
                for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['attac']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['attac']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['attac']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['attac']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['attac']['size'][$i];
                    $uploadPath = 'uploads/ansupload/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $flink[] = $uploadPath.$filename;
                    }}}
                    $m = sizeof($que);
                    $i=0;$a=0;$b=0;$c=0;$d=0;$e=0;
                    for($j=0;$j<$m;$j++){
                        $query=$this->db->query("select * from question_set where id='$que[$j]'");
                        $q = $query->result();
                        if($q[0]->optional==1){
                            if($ansremark[$i]==''){
                                $this->db->query("INSERT INTO answerset (tid,qid,sid,ans) VALUES ('$tid','$que[$j]','$sid','Yes')");
                            }else{
                                $this->db->query("INSERT INTO answerset (tid,qid,sid,ans,ansremark) VALUES ('$tid','$que[$j]','$sid','No','$ansremark[$i]')");
                            }
                            $i++;
                        }
                        if($q[0]->selection==1){
                            $this->db->query("INSERT INTO answerset (tid,qid,sid,selected) VALUES ('$tid','$que[$j]','$sid','$sel[$a]')");
                            $a++;
                        }
                        if($q[0]->remark==1){
                            $this->db->query("INSERT INTO answerset (tid,qid,sid,remarked) VALUES ('$tid','$que[$j]','$sid','$remat[$b]')");
                            $b++;
                        }
                        if($q[0]->datein==1){
                            $this->db->query("INSERT INTO answerset (tid,qid,sid,dated) VALUES ('$tid','$que[$j]','$sid','$datein[$c]')");
                            $c++;
                        }
                        if($q[0]->attachment==1){
                            $this->db->query("INSERT INTO answerset (tid,qid,sid,attached) VALUES ('$tid','$que[$j]','$sid','$flink[$d]')");
                            $d++;
                        }
                        if($q[0]->star==1){
                            $this->db->query("INSERT INTO answerset (tid,qid,sid,star) VALUES ('$tid','$que[$j]','$sid','$rate[$e]')");
                            $e++;
                        }
                    }
        return $sid;
    }
    public function add_anscl($sid,$que,$ansremark,$sel,$remat,$datein,$flink,$tid,$model,$ndel,$nwork,$page,$yn){
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
        if($yn=='No'){
                    $this->db->query("update plantask set tdone=1, actiontaken='$yn',donet='$datet' where taskid='$tid'");
                    $query=$this->db->query("SELECT * FROM task_assign WHERE id='$tid'");
                    $data = $query->result();
                    $taskd = $data[0]->task_date;
                    $tt = $data[0]->task_type;
                    $tst = $data[0]->task_subtype;
                    $pcode = $data[0]->project_code;
                    $pi = $data[0]->to_user;
                    $fid = $data[0]->from_user;
                    $sid = $data[0]->spd_id;
                    $page = $data[0]->checklist;
                    $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        }else{
        $m = sizeof($que);
        $i=0;$a=0;$b=0;$c=0;$d=0;$e=0;
        for($j=0;$j<$m;$j++){
            $query=$this->db->query("select * from question_set where id='$que[$j]'");
            $q = $query->result();
            if($q[0]->optional==1){
                if($ansremark[$i]==''){
                    $this->db->query("INSERT INTO answerset (tid,qid,sid,ans) VALUES ('$tid','$que[$j]','$sid','Yes')");
                }else{
                    $this->db->query("INSERT INTO answerset (tid,qid,sid,ans,ansremark) VALUES ('$tid','$que[$j]','$sid','No','$ansremark[$i]')");
                }
                $i++;
            }
            if($q[0]->selection==1){
                $this->db->query("INSERT INTO answerset (tid,qid,sid,selected) VALUES ('$tid','$que[$j]','$sid','$sel[$a]')");
                $a++;
            }
            if($q[0]->remark==1){
                $this->db->query("INSERT INTO answerset (tid,qid,sid,remarked) VALUES ('$tid','$que[$j]','$sid','$remat[$b]')");
                $b++;
            }
            if($q[0]->datein==1){
                $this->db->query("INSERT INTO answerset (tid,qid,sid,dated) VALUES ('$tid','$que[$j]','$sid','$datein[$c]')");
                $c++;
            }
            if($q[0]->attachment==1){
                $this->db->query("INSERT INTO answerset (tid,qid,sid,attached) VALUES ('$tid','$que[$j]','$sid','$flink[$d]')");
                $d++;
            }
            if($q[0]->star==1){
                $this->db->query("INSERT INTO answerset (tid,qid,sid,star) VALUES ('$tid','$que[$j]','$sid','5')");
                $e++;
            }
        }
        if(!empty($model)){
        $j =  sizeof($model);
        $no = "NO";
        $i=0;
        for($i;$i<$j;$i++){
            $this->db->query("INSERT INTO `model_install` (model_name, delivered,working,spd_id) VALUES ('$model[$i]', 'YES', 'YES','$sid')");
        }}
        if(!empty($ndel)){
        $k = sizeof($ndel);
        $i=0;
        for($i;$i<$k;$i++){
        $query=$this->db->query("update model_install set delivered='NO' where model_name='$ndel[$i]' and spd_id='$sid'");
        }}
        if(!empty($nwork)){
        $l = sizeof($nwork);
        $i=0;
        for($i;$i<$l;$i++){
        $query=$this->db->query("update model_install set working='NO' where model_name='$nwork[$i]' and spd_id='$sid'");
        }}
        $this->db->query("update plantask set tdone=1,donet='$datet' where taskid='$tid'");
        $query=$this->db->query("SELECT * FROM task_assign WHERE id='$tid'");
        $data = $query->result();
        $taskd = $data[0]->task_date;
        $tasktype = $data[0]->task_type;
        $subtask = $data[0]->task_subtype;
        $pcode = $data[0]->project_code;
        $fid = $data[0]->to_user;
        $sid = $data[0]->spd_id;
        $spi=$this->Menu_model->get_spdbyid($sid);
        $pi = $spi[0]->pi_id;
        $this->db->query("INSERT INTO schoollogs (sid,status, task_type, remark, taskid) VALUES ('$sid','New School','$tasktype','$subtask','$tid')");
        if($page=='page2'){
        $page = 'page4';
        $tt = 'Call';
        $tst = 'Post-intervention Enquiry for Installation';
        $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        }
        if($page=='page5'){
        $query=$this->db->query("select * from spd where id='$sid'");
        $spd= $query->result();
        $pi = $spd[0]->zh_id;
        $fid=1;
        $page = 'page20';
        $tt =  'Review';
        $tst = 'Post FTTP Review';
        $tid = '';
        $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        $page = 'page21';
        $tt =  'Call';
        $tst = 'Post FTTP Call';
        $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        $page = '';
        $tt =  'Report';
        $tst = 'Upload FTTP Report';
        $pi = $spd[0]->pi_id;
        $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        }
      }
    }
    public function add_modelnwrr($sid,$tid,$replace,$repair,$repaired,$filname,$mname){
        if(!empty($replace)){
        $j =  sizeof($replace);
        $no = "NO";
        $i=0;
        for($i;$i<$j;$i++){
            $this->db->query("INSERT INTO replacereq (sid,tid,model_name,type) VALUES ('$sid','$tid','$replace[$i]','replace')");
        }}
        if(!empty($repair)){
        $k = sizeof($repair);
        $i=0;
        for($i;$i<$k;$i++){
        $this->db->query("INSERT INTO replacereq (sid,tid,model_name,type) VALUES ('$sid','$tid','$repair[$i]','Repair')");
        }}
        if(!empty($repaired)){
        $l = sizeof($repaired);
        $i=0;
        for($i;$i<$l;$i++){
        $query=$this->db->query("update replacereq set status='Close' where sid='$sid' and tid='$tid' and model_name='$repaired[$i]'");
        }}
        $uploadPath = "uploads/report/";
        $l = sizeof($mname);
        for($i=0;$i<$l;$i++){
            $fn = $_FILES['file']['name']     = $_FILES['filname']['name'][$i];
            $_FILES['file']['type']     = $_FILES['filname']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['filname']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['filname']['error'][$i];
            $_FILES['file']['size']     = $_FILES['filname']['size'][$i];
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $config['file_name'] = $fn;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $fpn = $uploadPath.$filename;
            }
            $query=$this->db->query("update model_install set modelimg='$fpn' where spd_id='$sid' and model_name='$mname[$i]'");
            $query=$this->db->query("update replacereq set modelimg='$fpn' where tid='$tid' and model_name='$mname[$i]'");
        }
    }
    public function add_mpartremrk($sid,$tid,$part,$remark,$rremark){
        $model=$this->Menu_model->get_modelbyrepair($sid);
        $modelr=$this->Menu_model->get_modelbyreplace($sid);
        $i=0;
        foreach($model as $m){
            $modelname=$m->model_name;
            if($m->status=='Close'){
                $this->db->query("UPDATE repairreq set part_name='$part[$i]',remark='$remark[$i]' where sid='$sid' and tid='$tid' and model_name='$modelname'");
            }
            if($m->status=='Open'){
                $this->db->query("UPDATE repairreq set part_name='$part[$i]',remark='$remark[$i]' where sid='$sid' and tid='$tid' and model_name='$modelname'");
            }
            $i++;
        }
        foreach($modelr as $mr){
            $modelname=$mr->model_name;
            if($mr->status=='Close'){
                $this->db->query("UPDATE repairreq set remark='$rremark[$i]' where sid='$sid' and tid='$tid' and model_name='$modelname'");
            }
        }
    }
    public function  get_repairreq(){
        $query=$this->db->query("select * from repairreq");
        return $query->result();
    }
    public function  get_replacereq(){
        $query=$this->db->query("select * from replacereq");
        return $query->result();
    }
    public function  get_replacereqbytid($tid){
        $query=$this->db->query("select * from replacereq where tid='$tid' and status='Open'");
        return $query->result();
    }
    public function Repair_Now($id){
        $tdatet=date('Y-m-d H:i:s');
        $query=$this->db->query("Update replacereq set status='Close',rmcheck='1',rmcheckdt='$tdatet',rmremark='Repaired on Same Day' where id='$id'");
    }
    public function add_ans($que,$remark,$indata){
        $m = sizeof($que);
        $i=0;
        for($i;$i<$m;$i++){
            if($remark[$i]==''){ $this->db->query("INSERT INTO `answerset` (qid, ans, sid) VALUES ('$que[$i]', 'YES', '$indata[2]')");}
            else{$this->db->query("INSERT INTO `answerset` (qid, ans, remark, sid) VALUES ('$que[$i]', 'NO', '$remark[$i]', '$indata[2]')");}
        }
       $this->db->query("INSERT INTO spd_contact (sid, contact_name, designation, contact_no, email,main) VALUES ('$indata[2]','$indata[7]','$indata[8]','$indata[9]','$indata[10]','1')");
    }
    public function add_oldschool($indata){
        $piid = $indata[21];
        $query=$this->db->query("SELECT * FROM user_detail where id='$piid'");
        $user = $query->result();
         $admin = $user[0]->adminid;
        $this->db->query("INSERT INTO spd (project_code, sname, saddress, sstate, scity, sdistrict, szone, status, pstatus, slocation, slanguage, snoyear, sayear, std, boys, girls, total_students, total_teachers, timing, website, pi_id, backdrop, fm_apr, pm_apr, bd_apr, totalutilization, waname, wanamelink, tehshil, zh_id, clientname) VALUES ('$indata[0]','$indata[1]','$indata[2]','$indata[3]','$indata[4]','$indata[27]','$indata[9]','4','$indata[6]','$indata[10]','$indata[11]','$indata[12]','$indata[13]','$indata[14]','$indata[15]','$indata[16]','$indata[17]','$indata[18]','$indata[19]','$indata[20]','$indata[21]','NA','1','0','1','$indata[28]','$indata[29]','$indata[30]', '$indata[34]', '$admin', '$indata[35]')");
        $sid = $this->db->insert_id();
        $designation = "Principa";
        $this->db->query("INSERT INTO spd_contact (sid, contact_name, designation, contact_no, email,main) VALUES ('$sid','$indata[7]','$designation','$indata[8]','$indata[31]','1')");
        if(!empty($indata[25])){
        $designation = "Science Teacher";
        $this->db->query("INSERT INTO spd_contact (sid, contact_name, designation, contact_no, email) VALUES ('$sid','$indata[24]','$designation','$indata[25]','$indata[32]')");
        }
        if(!empty($indata[23])){
        $designation = "Mathematics Teacher";
        $this->db->query("INSERT INTO spd_contact (sid, contact_name, designation, contact_no, email) VALUES ('$sid','$indata[22]','$designation','$indata[23]','$indata[33]')");
        }
        return $sid;
    }
    public function edit_oldschool($indata,$sid){
        $piid = $indata[21];
        $query=$this->db->query("SELECT * FROM user_detail where id='$piid'");
        $user = $query->result();
         $admin = $user[0]->adminid;
        $this->db->query("update spd set project_code = '$indata[0]',sname = '$indata[1]',saddress = '$indata[2]',sstate = '$indata[3]',scity = '$indata[4]', sdistrict = '$indata[27]',szone = '$indata[9]',status = '4',pstatus = '$indata[6]',slocation = '$indata[10]',
slanguage = '$indata[11]',snoyear = '$indata[12]',sayear = '$indata[13]',std = '$indata[14]',boys = '$indata[15]',girls = '$indata[16]',
total_students = '$indata[17]',total_teachers = '$indata[18]',pi_id = '$piid',
timing = '$indata[19]',website = '$indata[20]', backdrop = 'NA',
fm_apr = '1',zh_apr = '0',pm_apr = '0',bd_apr = '1',
totalutilization = '$indata[28]',waname = '$indata[29]',
wanamelink = '$indata[30]',tehshil = '$indata[34]',zh_id = '$admin',clientname = '$indata[35]'where id='$sid'");
        $sid = $this->db->insert_id();
    }
    public function add_report($indata,$flink,$na){
        $l= sizeof($na);
        $j=0;
        for($i=0;$i<$l;$i++){
            if($i==0){$type = "Installation";}elseif($i==1){$type = "Maintenance";}elseif($i==2){$type = "M&E";}elseif($i==3){$type = "Annual";}else{$type = "Other";}
            if($na[$i]=='YES'){
                $this->db->query("INSERT INTO report (project_code, spd_id, year, report_type, file) VALUES ('$indata[0]','$indata[2]','$indata[1]','$type','$flink[$j]')");
                $j++;
            }
            else{
                $this->db->query("INSERT INTO report (project_code, spd_id, year, report_type, file) VALUES ('$indata[0]','$indata[2]','$indata[1]','$type','NA')");
            }
        }
    }
    public function addreport($date,$year,$project_code,$sid,$type,$tid,$pi,$flink,$rremark){
        $tdatet=date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO report (project_code, spd_id, year, report_type, filepath, tid) VALUES ('$project_code','$sid','$year','$type','$flink','$tid')");
        if($type=='Upload Installation Report'){
               $this->db->query("update spd set pm_apr=1 where id='$sid'");
        }
       $this->db->query("update plantask set actiontaken='Yes',purpose='Yes',donet='$tdatet',tdone='1',remark='$rremark' where taskid='$tid'");
       if($sid==0){
           $query=$this->db->query("select * from spd where project_code='$project_code'");
           $data =  $query->result();
           foreach($data as $da){
               $sid = $da->id;
               $spd = $this->Menu_model->get_spdbyid($sid);
               $pi = $spd[0]->pi_id;
               $zh = $spd[0]->zh_id;
               $sname = $spd[0]->sname;
               $pcode = $spd[0]->project_code;
               $msg = $pcode." | ".$sname." | ".$type;
               $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
               $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
               $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
               $remark = $type;
               $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','Report','$remark','$tid')");
           }
       }else{
           $spd = $this->Menu_model->get_spdbyid($sid);
           $pi = $spd[0]->pi_id;
           $zh = $spd[0]->zh_id;
           $sname = $spd[0]->sname;
           $pcode = $spd[0]->project_code;
           $msg = $pcode." | ".$sname." | ".$type;
           $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
           $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
           $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
           $remark = $type;
           $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','Report','$remark','$tid')");
       }
    }
    public function add_ureport($indata,$flink){
        $l= sizeof($flink);
        for($i=0;$i<$l;$i++){
           $this->db->query("INSERT INTO report (project_code, spd_id, year, report_type, date, file) VALUES ('$indata[0]','$indata[1]','$indata[2]','$indata[3]','$indata[4]','$flink[$i]')");
        }
    }
    public function add_oldclient($indata){
        $this->db->query("UPDATE client_handover set client_name='$indata[1]', mediator='$indata[2]', location='$indata[3]', state='$indata[4]', city='$indata[5]', noofschool='$indata[6]', spd_identify_by='$indata[7]', infrastructure='$indata[8]', project_tenure='$indata[9]' where projectcode='$indata[0]'");
    }
    public function add_bdHandover($client_name, $mediator, $noofschool, $location, $city, $state, $spd_identify_by, $infrastructure, $logo, $contact_person, $cp_mno, $acontact_person, $acp_mno, $language, $expected_installation_date, $project_tenure, $project_type, $comments,$sname, $saddress, $scity, $sstate, $contact_name, $contact_no){
        $this->db->query("INSERT INTO `client_handover` (client_name, mediator, noofschool, location, city, state, spd_identify_by, infrastructure, logo, contact_person, cp_mno, acontact_person, acp_mno, language, expected_installation_date, project_tenure,project_type,comments) VALUES ('$client_name', '$mediator', '$noofschool', '$location', '$city', '$state', '$spd_identify_by', '$infrastructure', '$logo', '$contact_person', '$cp_mno', '$acontact_person', '$acp_mno', '$language', '$expected_installation_date', '$project_tenure', '$project_type', '$comments')");
        $cid= $this->db->insert_id();
        $l=sizeof($sname);
        for($i=0;$i<$l;$i++){
            $this->db->query("INSERT INTO spd (cid, sname, saddress, sstate, scity,clientname) VALUES ('$cid','$sname[$i]','$saddress[$i]','$sstate[$i]','$scity[$i]','$client_name')");
            $sid =  $this->db->insert_id();
            $this->db->query("INSERT INTO spd_contact (sid, contact_name, contact_no,main) VALUES ('$sid','$contact_name[$i]','$contact_no[$i]','1')");
        }
        $this->db->query("INSERT INTO handoverlog (cid, taskby, remark) VALUES ('$cid','1','Handover From BD to Program Manager')");
        return $cid;
    }
    public function add_bdaccount($handover_id, $wono, $porno, $gstno, $panno,$tbudget, $payterm, $pwosdate, $moudate, $srfinovice, $mou,$bname, $basic, $gst, $total, $oney, $twoy, $threey,$proformadate,$taxinvoicedate){
        $this->db->query("INSERT INTO `handover_account` (handover_id, wono, porno, gstno, panno, tbudget, payterm, pwosdate, moudate, srfinovice, mou,proformadate,taxinvoicedate) VALUES ('$handover_id', '$wono', '$porno', '$tbudget', '$gstno', '$panno', '$payterm', '$pwosdate', '$moudate', '$srfinovice', '$mou','$proformadate','$taxinvoicedate')");
        $id = $this->db->insert_id();
        $l = sizeof($basic);
        for($i=0;$i<$l;$i++)
        {
            $this->db->query("INSERT INTO `budget` (cid, bname, basic, gst, total, oney, twoy, threey) VALUES ('$handover_id','$bname[$i]','$basic[$i]','$gst[$i]','$total[$i]','$oney[$i]','$twoy[$i]','$threey[$i]')");
        }
        $this->db->query("Update client_handover set bd_id='1' where id='$handover_id'");
        $this->db->query("INSERT INTO handoverlog (cid, taskby, remark) VALUES ('$handover_id','1','Handover From BD to Account')");
        return $id;
    }
    public function add_newtask($fuser,$touser,$tadate,$ttdate,$taskdetail,$remark){
       $this->db->query("INSERT INTO `other_task` (tadate, tdate, from_user, to_user, task, remark) VALUES ('$tadate', '$ttdate', '$fuser', '$touser', '$taskdetail', '$remark')");
       return $this->db->insert_id();
    }
    public function Goals_Create($uid,$date,$tasktype,$remark){
       $this->db->query("INSERT INTO other_task (tdate, from_user, to_user, task, remark) VALUES ('$date', '$uid', '$uid', '$tasktype', '$remark')");
       return $this->db->insert_id();
    }
    public function plan_sc($pdate,$createdby,$task_type,$premark,$mlink,$uvideo){
       $this->db->query("INSERT INTO summercamp(plandt, createdby, premark, task_type,mlink,uvideo) VALUES ('$pdate','$createdby','$premark','$task_type','$mlink','$uvideo')");
       return $this->db->insert_id();
    }
    public function rw_plan($pdate,$createdby,$task_type,$statename,$districtname,$premark,$pcode,$sid){
       $this->db->query("INSERT INTO reportwriting(plan, tasktype, state, district, remark, uid,pcode,sid) VALUES ('$pdate','$task_type','$statename','$districtname','$premark','$createdby','$pcode','$sid')");
       return $this->db->insert_id();
    }
    public function start_sc($sdate,$scid){
       $this->db->query("UPDATE summercamp set startdt='$sdate' where id='$scid'");
    }
    public function start_rw($sdate,$scid){
       $this->db->query("UPDATE reportwriting set start='$sdate' where id='$scid'");
    }
    public function close_sc($sdate,$scid,$cphoto,$vlink,$creamrk){
       $this->db->query("UPDATE summercamp set closedt='$sdate',cremark='$creamrk',attchment='$cphoto',vlink='$vlink' where id='$scid'");
    }
    public function close_rw($sdate,$scid,$flink,$creamrk){
       $this->db->query("UPDATE reportwriting set close='$sdate',cremark='$creamrk',attachment='$flink' where id='$scid'");
    }
    public function create_aot($uid,$tasktype,$action,$pcode,$sid,$brid,$taskremark){
       $this->db->query("INSERT INTO aotask (tasktype,action,uid,sid,pcode,brid,taskremark) VALUES ('$tasktype','$action','$uid','$sid','$pcode','$brid','$taskremark')");
       return $this->db->insert_id();
    }
    public function add_Compose($to_user,$from_user,$subject,$matter,$file){
       $this->db->query("INSERT INTO `mail` (`to_user`, `from_user`, `subject`, `matter`, `file`) VALUES ('$to_user','$from_user','$subject','$matter','$file')");
        return $this->db->insert_id();
    }
    public function send_tofm($program,$request){
        $this->db->query("INSERT INTO fmrequest (project_code,request) VALUES ('$program','$request')");
        return $this->db->insert_id();
    }
    public function assign_rtask($sid,$rremark,$tdate,$ttype,$tstype,$remark,$pi,$uid){
        $query=$this->db->query("select project_code from spd where id='$sid'");
        $data = $query->result();
        $pcode = $data[0]->project_code;
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist,plan) VALUES ('$datet','$uid','$uid','ZH-Review','ZH-Review','$pcode','$sid','$rremark','','1')");
       $tid = $this->db->insert_id();
       $this->db->query("INSERT INTO `plantask` (action, plandate, taskid, user_id, spd_id) VALUES ('ZH-Review', '$datet','$tid', '$uid', '$sid')");
       $this->db->insert_id();
        $query=$this->db->query("select page from taskdetail where tname='$tstype'");
        $data1 = $query->result();
        $page = $data1[0]->page;
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$tdate','$uid','$pi','$ttype','$tstype','$pcode','$sid','$remark','$page')");
       $this->db->insert_id();
       $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','ZH-Review','$rremark','$tid')");
    }
    public function pm_spdreview($sid,$piid,$uid,$remark){
        $query=$this->db->query("select project_code from spd where id='$sid'");
        $data = $query->result();
        $pcode = $data[0]->project_code;
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist,plan) VALUES ('$datet','$uid','$uid','PM-Annual-Review','PM-Annual-Review','$pcode','$sid','$remark','','1')");
        $tid = $this->db->insert_id();
        $this->db->query("INSERT INTO `plantask` (action, plandate, taskid, user_id, spd_id) VALUES ('PM-Review', '$datet','$tid', '$uid', '$sid')");
        $this->db->insert_id();
        $this->db->query("INSERT INTO annualreview2 (piid,sid,remark,sdatet) VALUES ('$piid','$sid','$remark','$datet')");
        $this->db->insert_id();
       $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','PH-Review','$remark','$tid')");
    }
    public function pm_review($sid,$pi,$uid,$ques,$remark,$rremark){
        $query=$this->db->query("select project_code from spd where id='$sid'");
        $data = $query->result();
        $pcode = $data[0]->project_code;
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist,plan) VALUES ('$datet','$uid','$uid','PM-Review','PM-Review','$pcode','$sid','$rremark','','1')");
        $tid = $this->db->insert_id();
        $this->db->query("INSERT INTO `plantask` (action, plandate, taskid, user_id, spd_id) VALUES ('PM-Review', '$datet','$tid', '$uid', '$sid')");
        $this->db->insert_id();
        $l = sizeof($ques);
        for($i=0;$i<$l;$i++){
            $this->db->query("INSERT INTO pmsreview (sid, que, ans, tid) VALUES ('$sid','$ques[$i]','$remark[$i]','$tid')");
            $this->db->insert_id();
        }
       $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','PH-Review','$rremark','$tid')");
    }
    public function pm_request($tdate,$tasttype,$schooltype,$noofschool,$location,$remark,$tcname){
        $this->db->query("INSERT INTO bdrequest (targetd,request_type,vlocation, schooltype, noofschool, remark,bd_name) VALUES ('$tdate','$tasttype','$location','$schooltype','$noofschool','$remark','$tcname')");
       return $this->db->insert_id();
    }
    public function get_scbycrid($uid){
        $query=$this->db->query("SELECT * FROM summercamp WHERE createdby='$uid' and startdt is null");
        return $query->result();
    }
    public function get_rwbycrid($uid){
        $query=$this->db->query("SELECT * FROM reportwriting WHERE uid='$uid' and start is null");
        return $query->result();
    }
    public function get_scbyccrid($uid){
        $query=$this->db->query("SELECT * FROM summercamp WHERE createdby='$uid' and startdt is not null and closedt is null");
        return $query->result();
    }
    public function get_rwbyccrid($uid){
        $query=$this->db->query("SELECT * FROM reportwriting WHERE uid='$uid' and start is not null and close is null");
        return $query->result();
    }
    public function get_pcodebyyear($year){
        $query=$this->db->query("select * from client_handover where project_year='$year'");
        return $query->result();
    }
    public function get_bdrcount(){
        // $query=$this->db->query("SELECT rysn, request_type, COUNT(*) AS cnt, COUNT(CASE WHEN assignstatus = '0' AND status = '0' THEN assignstatus END) AS pending, COUNT(CASE WHEN assignstatus = '1' THEN assignstatus END) AS open, COUNT(CASE WHEN status = '1' THEN status END) AS closed FROM bdrequest WHERE assignto = '1' AND request_type != '' GROUP BY rysn, request_type");
        $query=$this->db->query("SELECT rysn, request_type, COUNT(*) AS cnt, COUNT(CASE WHEN assignstatus = '0' AND status = '0' THEN assignstatus END) AS pending, COUNT(CASE WHEN assignstatus = '1' AND status = '0' THEN assignstatus END) AS open, COUNT(CASE WHEN status = '1' THEN status END) AS closed FROM bdrequest WHERE request_type != '' GROUP BY rysn, request_type");
        return $query->result();
    }
    public function get_PIASS($piid){
        $query=$this->db->query("SELECT COUNT(DISTINCT sstate) sstate,COUNT(DISTINCT sdistrict) sdistrict,COUNT(CASE WHEN status='1' THEN status END) news,COUNT(CASE WHEN status='2' THEN status END) ttps,COUNT(CASE WHEN status='3' THEN status END) uis,COUNT(CASE WHEN status='4' THEN status END) averages,COUNT(CASE WHEN status='5' THEN status END) good,COUNT(CASE WHEN status='6' THEN status END) models,COUNT(CASE WHEN status='7' THEN status END) inactive,COUNT(CASE WHEN status='8' THEN status END) clientr FROM `spd` WHERE pi_id='$piid' and pm_apr='1'");
        return $query->result();
    }
    public function get_ReportWriting($piid){
        $query=$this->db->query("SELECT COUNT(CASE WHEN tasktype='District Report Writing' THEN tasktype END) districtr, COUNT(CASE WHEN tasktype='State Report Writing' THEN tasktype END) stater FROM reportwriting WHERE uid='$piid'");
        return $query->result();
    }
    public function get_bdrpiacount($uid){

        // $query=$this->db->query("select rysn,request_type,count(*) cnt,count(case when status=0 then status end) pending,count(case when status=1 then status end) open,count(case when status=2 then status end) close from bdrequest LEFT JOIN bdtask on bdtask.tid=bdrequest.id where bdtask.uid='$uid' and request_type!='' GROUP BY request_type,rysn");

        $query=$this->db->query("SELECT r.rysn, r.request_type, COUNT(*) AS cnt, COUNT(CASE WHEN r.status = 0 THEN 1 END) AS pending, COUNT(CASE WHEN r.status = 1 THEN 1 END) AS open, COUNT(CASE WHEN r.status = 2 THEN 1 END) AS closed FROM bdrequest r LEFT JOIN bdtask t ON t.tid = r.id WHERE t.uid = '$uid' AND r.request_type != '' GROUP BY r.rysn, r.request_type");
        return $query->result();
    }

    
    public function bdr_stageassign($byid,$tid,$tasktype,$purpose,$assignto,$nooftask,$cterms,$exdate){
        $query=$this->db->query("select * from user_detail where id='$assignto'");
        $data = $query->result();
        $fullname = $data[0]->fullname;
        $this->db->query("INSERT INTO bdtask (tid,uid,fid,exdate,pmremark) VALUES ('$tid','$assignto','$byid','$exdate','$cterms')");
        $this->db->query("update bdrequest set assignstatus='1' where id='$tid'");
        $detail = $tasktype.' ('.$purpose.') Assign to'.$fullname;
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$tid','$uid','$remark','$detail')");
    }
    public function bdr_assignto($uid,$tid,$assignto,$remark,$exdate){
        $l = sizeof($assignto);
        for($i=0;$i<$l;$i++){
           $this->db->query("INSERT INTO bdtask (tid,uid,fid,exdate,pmremark) VALUES ('$tid','$assignto[$i]','$uid','$exdate','$remark')");
        }
        $this->db->query("update bdrequest set assignstatus='1' where id='$tid'");
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$tid','$uid','$remark','Request Assigned to PIAs')");
    }







    public function bdr_plansinog($uuid,$rid,$pcode,$sid){
        $date = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist)
            VALUES ('$date','$uuid','$uuid','Call','School Inauguration','','$sid','','page58')");
        $this->db->query("update bdtask set startt='$date' where uid='$uuid' and tid='$rid'");
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$rid','$uuid','','PIAs Plan for Inauguration')");
    }
    public function bdr_closrbypia($tid,$cremark,$uid,$count,$filname){
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
                    $fpn = "";
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['filname']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['filname']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['filname']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['filname']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['filname']['size'][$i];
                    $uploadPath = 'uploads/ansupload/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $fpn.",".$uploadPath.$filename;
                      }
                    }
        $this->db->query("update bdtask set cremark='$cremark', attech='$fpn', closet='$datet',taskc='1' where id='$tid'");
        $query=$this->db->query("select * from bdtask where id='$tid'");
        $ttid= $query->result();
        $ttid = $ttid[0]->tid;
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail,attech) VALUES ('$ttid','$uid','$cremark','Request Cloesd by PIA','$fpn')");
    }
    public function task_assign_ins($from_user,$task_date,$to_user,$pcode,$spd_id,$Remark){
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark) VALUES ('$task_date','$from_user','$to_user','Visit','During installation Check-List From','page6','$pcode','$spd_id','$Remark')");
           return $this->db->insert_id();
    }
    public function task_assign($indata){
       if($indata[2]=='4'){
           $this->db->query("Update spd set ins_id='$indata[4]' where id='$indata[11]'");
       }
       if($indata[5]=='Installation')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for Installation','$indata[10]','$indata[11]','Pre-intervention Enquiry for Installation')");
       }
       if($indata[6]=='FTTP')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for FTTP','$indata[10]','$indata[11]','Pre-intervention Enquiry for FTTP')");
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Visit','BASELINE MONITORING & EVALUATION','$indata[10]','$indata[11]','BASELINE MONITORING & EVALUATION')");
       }
       if($indata[6]=='RTTP')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for RTTP','$indata[10]','$indata[11]','Pre-intervention Enquiry for RTTP')");
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Visit','MIDLINE MONITORING & EVALUATION','$indata[10]','$indata[11]','MIDLINE MONITORING & EVALUATION')");
       }
       if($indata[6]=='Post-intervention Enquiry for Maintenance')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for Maintenance','$indata[10]','$indata[11]','Pre-intervention Enquiry for Maintenance','page25')");
       }
       if($indata[5]=='DIY')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for DIY','$indata[10]','$indata[11]','Pre-intervention Enquiry for DIY')");
       }
       if($indata[6]=='EMnE')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for Endline M&E','$indata[10]','$indata[11]','Pre-intervention Enquiry for Endline M&E')");
       }
       if($indata[5]=='Maintenance')
       {
           $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$indata[1]','$indata[0]','$indata[4]','Call','Pre-intervention Enquiry for Maintenance','$indata[10]','$indata[11]','Pre-intervention Enquiry for Maintenance','page25')");
       }
       return $this->db->insert_id();
    }
    public function autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid){
       $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark,tid) VALUES ('$datet','$fid','$pi','$tt','$tst', '$page','$pcode','$sid','$tst','$tid')");
        return $this->db->insert_id();
    }
    public function delivery_assign($pcode,$recid){
       date_default_timezone_set('Asia/Kolkata');
       $datet = date('Y-m-d H:i:s');
       $query=$this->db->query("Update deliveryv set receiveby='$recid'");
    }
    public function piatask_assign($userid,$task_type,$PhVi,$pcode,$spd_id,$sicl,$cllist,$remark){
       date_default_timezone_set('Asia/Kolkata');
       $datet = date('Y-m-d H:i:s');
       $query=$this->db->query("select * from taskdetail where gt='$task_type'");
       $data =  $query->result();
       if($cllist!=''){$cllist = implode(',', $cllist);}
       $i=0;
       foreach($data as $da){
           $taction =  $da->taction;
           $tname =  $da->tname;
           $page =  $da->page;
           $taction =  $da->taction;
           $dep = $da->dep;
           if($PhVi=='Virtual'){ if($taction=='Visit'){$taction='Virtual';} }
           $query=$this->db->query("select * from spd where id='$spd_id'");
           $spd =  $query->result();
           if($userid!='1' and $task_type=='gt7'){
               if($dep==2){$userid=$spd[0]->pi_id;}
               if($dep==4){$userid=$spd[0]->ins_id;}
               if($dep==11){$userid=$spd[0]->zh_id;}
               if($dep==24){$userid=$spd[0]->tampmpid;}
           }
           if($i>0){
              $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark,cluster,lstttid)
               VALUES ('$datet','$userid','$userid','$taction','$tname', '$page','$pcode','$spd_id','$remark','$cllist','$tid')");
               $tid = $this->db->insert_id();
           }else{
               $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark,cluster)
               VALUES ('$datet','$userid','$userid','$taction','$tname', '$page','$pcode','$spd_id','$remark','$cllist')");
               $tid = $this->db->insert_id();
           }
       $i++;}
    }
    public function imtask_assign($userid,$task_type,$PhVi,$pcode,$spd_id,$sicl,$cllist,$remark,$uname){
       date_default_timezone_set('Asia/Kolkata');
       $datet = date('Y-m-d H:i:s');
       $query=$this->db->query("select * from taskdetail where gt='$task_type'");
       $data =  $query->result();
       if($cllist!=''){$cllist = implode(',', $cllist);}
       $i=0;
       foreach($data as $da){
           $taction =  $da->taction;
           $tname =  $da->tname;
           $page =  $da->page;
           $taction =  $da->taction;
           $dep = $da->dep;
           if($PhVi=='Virtual'){ if($taction=='Visit'){$taction='Virtual';} }
           $query=$this->db->query("select * from spd where id='$spd_id'");
           $spd =  $query->result();
           if($dep==2){$userid=$spd[0]->pi_id;}
           if($dep==4){$userid=$spd[0]->ins_id;}
           if($dep==11){$userid=$spd[0]->zh_id;}
           if($page=='page59'){$userid=$uname;}
           if($i>0){
              $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark,cluster,lstttid)
               VALUES ('$datet','$userid','$userid','$taction','$tname', '$page','$pcode','$spd_id','$remark','$cllist','$tid')");
               $tid = $this->db->insert_id();
           }else{
               $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, checklist, project_code, spd_id, remark,cluster)
               VALUES ('$datet','$userid','$userid','$taction','$tname', '$page','$pcode','$spd_id','$remark','$cllist')");
               $tid = $this->db->insert_id();
           }
       $i++;}
    }
    public function assign_piins($sid,$ins,$pi,$fid,$pcode){
        date_default_timezone_set('Asia/Kolkata');
        $datet = date('Y-m-d H:i:s');
       $this->db->query("update spd set pi_id='$pi',ins_id='$ins' where id='$sid'");
       $tt='Call';
       $tst='Pre-intervention Enquiry';
       $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$datet);
       return $id;
    }
    public function assign_piinszhforos($sid,$ins,$pi,$fid,$pcode,$zh,$mtype,$datet){
       $this->db->query("update spd set pi_id='$pi',ins_id='$ins',zh_id='$zh',model_type='$mtype' where id='$sid'");
       $tt='Call';
       $tid='';
       $tst='Pre-intervention Enquiry for Maintenance';
       $page='page25';
       $id = $this->Menu_model->autotask($sid,$ins,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
       $tt='Call';
       $page='page25';
       $tst='Pre-intervention Enquiry for Maintenance';
       $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
       $tt='Maintenance';
       $tst='Maintenance';
       $page='page26';
       $id = $this->Menu_model->autotask($sid,$ins,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
       return $id;
    }
    public function assigncptospd($sid,$ins,$pi,$zh,$cid,$cname,$pcode){
        $tdate=date('Y-m-d H:i:s');
       $this->db->query("update spd set pi_id='$pi',ins_id='$ins',zh_id='$zh',clientname='$cname',project_code='$pcode' where id='$sid'");
       $this->db->query("INSERT INTO task_assign (task_date,from_user,to_user,task_type,task_subtype,checklist,project_code,spd_id,remark) VALUES ('$tdate','1','$pi','Call','Pre - Intervention Enquiry for School Readiness','page1','$pcode','$sid','Pre - Intervention Enquiry for School Readiness')");
       $this->db->query("INSERT INTO task_assign (task_date,from_user,to_user,task_type,task_subtype,checklist,project_code,spd_id,remark) VALUES ('$tdate','1','35','Dispatch','Dispatch Particle Board','','$pcode','$sid','Dispatch Particle Board')");
       $this->db->query("INSERT INTO task_assign (task_date,from_user,to_user,task_type,task_subtype,checklist,project_code,spd_id,remark) VALUES ('$tdate','1','35','Arrange Transportation','Arrange Transportation Before Packing of Models in Factory','','$pcode','$sid','Arrange Transportation Before Packing of Models in Factory')");
       $query=$this->db->query("select * from spd where cid='$cid' and pi_id is null");
       $spd= $query->result();
       $l = sizeof($spd);
       if($l==0){
           $this->db->query("INSERT INTO handoverlog (cid, taskby, remark) VALUES ('$cid','1','Assigned PIA, Installation Person and Zones Head')");
       }
       return $sid;
    }
    public function assign_piinszh($sid,$ins,$pi,$fid,$pcode,$zh,$mtype,$datet){
       $this->db->query("update spd set pi_id='$pi',ins_id='$ins',zh_id='$zh',model_type='$mtype' where id='$sid'");
       $tt='Call';
       $tst='Pre-intervention Enquiry for Installation';
       $page='page2';
       $id = $this->Menu_model->autotask($sid,$ins,$fid,$pcode,$tt,$tst,$page,$datet);
       $tt='Call';
       $page='page5';
       $tst='Pre-intervention Enquiry for Installation';
       $id = $this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
       $tt='Installation';
       $tst='Installation';
       $page='page6';
       $id = $this->Menu_model->autotask($sid,$ins,$fid,$pcode,$tt,$tst,$page,$datet);
       return $id;
    }
    public function uploadfile($filname, $uploadPath){
        $fn = $_FILES['file']['name'] = $_FILES['filname']['name'];
        $_FILES['file']['type']     = $_FILES['filname']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['filname']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['filname']['error'];
        $_FILES['file']['size']     = $_FILES['filname']['size'];
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $fn;
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $uploadData = $this->upload->data();
         $filename = $uploadData['file_name'];
        return $fpn = $uploadPath.$filename;
    }
    public function muploadfile($filname, $uploadPath){
        $l = sizeof($filname);
        for($i=0;$i<$l;$i++){
            $fn = $_FILES['file']['name']     = $_FILES['filname']['name'][$i];
            $_FILES['file']['type']     = $_FILES['filname']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['filname']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['filname']['error'][$i];
            $_FILES['file']['size']     = $_FILES['filname']['size'][$i];
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $config['file_name'] = $fn;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $fpn[] = $uploadPath.$filename;
            }
        }
        return $fpn;
    }
    public function add_cont($sid,$contact_name,$designation,$contact_no,$email,$uid){
       $spd = $this->Menu_model->get_spdbyid($sid);
       $pi = $spd[0]->pi_id;
       $zh = $spd[0]->zh_id;
       $sname = $spd[0]->sname;
       $pcode = $spd[0]->project_code;
       $msg = $pcode." | ".$sname." | New Contact Added";
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
       $this->db->query("INSERT INTO `spd_contact` (`sid`, `contact_name`, `designation`, `contact_no`, `email`) VALUES ('$sid','$contact_name','$designation','$contact_no','$email')");
       return $this->db->insert_id();
    }
    public function add_media($useruid,$sid,$tid,$planid,$quen,$pageno,$dmcount,$addmedia){
                    $datet=date('Y-m-d H:i:s');
                    $date=date('Y-m-d');
                    $year="2023-24";
                    $data = [];
                    for($i = 0; $i < $dmcount; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['addmedia']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['addmedia']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['addmedia']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['addmedia']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['addmedia']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $uploadPath.$filename;
                        $data['totalFiles'][] = $filename;
                        $this->db->query("INSERT INTO wgdata (date, year, project_code, sid, type, filepath, remark,yn,howmay,tid)
                        VALUES ('$date','$year', '','$sid','Add More Media', '$fpn','','Yes','0','$tid')");
                      }
                }
                $this->db->query("update plantask set tdone=1, actiontaken='Yes',purpose='Yes',donet='$datet' where taskid='$tid'");
                $this->db->query("INSERT INTO visitstupdate (sid,tid,que) VALUES ('$sid','$tid','Add More Media')");
    }
    public function add_wgdata($date,$year,$project_code,$sid,$waimage,$remark,$count,$type,$howmay,$tid,$pi){
                    $datet=date('Y-m-d H:i:s');
                    $pcode=$project_code;
                    $data = [];
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['waimage']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['waimage']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['waimage']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['waimage']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['waimage']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $uploadPath.$filename;
                        $data['totalFiles'][] = $filename;
                        $this->db->query("INSERT INTO wgdata (date, year, project_code, sid, type, filepath, remark,yn,howmay,tid) VALUES ('$date','$year', '$project_code','$sid','$type', '$fpn','$remark','Yes','$howmay','$tid')");
                      }else{
                          echo 'Not Uploded';
                    }
                }
                       $typed=$type.' Uploaded';
                       $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','$type','$typed','$tid')");
                       $spd = $this->Menu_model->get_spdbyid($sid);
                       $pi = $spd[0]->pi_id;
                       $zh = $spd[0]->zh_id;
                       $sname = $spd[0]->sname;
                       $pcode = $spd[0]->project_code;
                       $msg = $pcode." | ".$sname." | Utilisation Upload";
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
                $this->db->query("update plantask set tdone=1, actiontaken='Yes', donet='$datet' where taskid='$tid'");
                      $dts=$this->Menu_model->get_wgdbysid($sid);
                      $tt = sizeof($dts);
                      if($tt==0){$st = 7;}
                      elseif($tt>0 && $tt<=4)
                      {$st = 3;}
                      elseif($tt>4 && $tt<=8)
                      {$st = 4;}
                      elseif($tt>8 && $tt<=12)
                      {$st = 5;}
                      elseif($tt>12)
                      {$st = 6;}
                      $this->Menu_model->changess($sid,$st);
                $fid=$pi;
                $tt='Review';
                $tst= $type.' Review';
                $page='';
                $query=$this->db->query("select * from user_detail where id='$fid'");
                $udt = $query->result();
                $pi = $udt[0]->adminid;
                $dt=$this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
                $this->db->query("update task_assign set plan=1 where tid='$dt'");
                $this->Menu_model->add_plantask($dt,$datet,$tt,$pi,$sid);
    }
    public function add_research($rrtid,$purposetaken,$rtremark){
       $datet=date('Y-m-d H:i:s');
       $query=$this->db->query("SELECT * FROM plantask WHERE taskid='$rrtid'");
       $data = $query->result();
       $sid = $data[0]->spd_id;
       $uuid = $data[0]->user_id;
       $query=$this->db->query("SELECT * FROM task_assign WHERE id='$rrtid'");
       $data1 = $query->result();
       $pcode = $data1[0]->project_code;
       $query=$this->db->query("SELECT * FROM spd WHERE id='$sid'");
       $data2 = $query->result();
       $rid = $data2[0]->spdident;
       $this->db->query("update plantask set tdone=1, purpose='$purposetaken',actiontaken='Yes', donet='$datet',remark='$rtremark' where taskid='$rrtid'");
        $msg = "School Research Task Done";
        $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$rid','$uuid','$rtremark','$msg')");
        if($purposetaken=='yes'){
            $this->Menu_model->autotask($sid,$uuid,'93',$pcode,'Call','School Identification','page55',$datet,'');
        }else{
            $this->Menu_model->autotask($sid,$uuid,'93',$pcode,'Research','School Identification','',$datet,'');
        }
    }
    public function add_commdata($date,$year,$project_code,$sid,$waimage,$remark,$count,$type,$howmay,$tid,$pi){
                    $datet=date('Y-m-d H:i:s');
                    $pcode=$project_code;
                    $data = [];
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['waimage']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['waimage']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['waimage']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['waimage']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['waimage']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $uploadPath.$filename;
                        $data['totalFiles'][] = $filename;
                        $this->db->query("INSERT INTO wgdata (date, year, project_code, sid, type, filepath, remark,yn,howmay,tid) VALUES ('$date','$year', '$project_code','$sid','$type', '$fpn','$remark','Yes','$howmay','$tid')");
                        $this->db->query("update plantask set tdone=1, actiontaken='Yes', donet='$datet' where taskid='$tid'");
                      }else{
                          echo 'Not Uploded';
                    }
                }
                       $typed=$type.' Uploaded';
                       $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','$type','$typed','$tid')");
                       $spd = $this->Menu_model->get_spdbyid($sid);
                       $pi = $spd[0]->pi_id;
                       $zh = $spd[0]->zh_id;
                       $sname = $spd[0]->sname;
                       $pcode = $spd[0]->project_code;
                       $msg = $pcode." | ".$sname." | Communication Upload";
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
    }
    public function add_casedata($date,$year,$project_code,$sid,$caimage,$remark,$count,$type,$howmay,$tid,$pi){
                    $datet=date('Y-m-d H:i:s');
                    $pcode=$project_code;
                    $data = [];
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['caimage']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['caimage']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['caimage']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['caimage']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['caimage']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $uploadPath.$filename;
                        $data['totalFiles'][] = $filename;
                        $this->db->query("INSERT INTO wgdata (date, year, project_code, sid, type, filepath, remark,yn,howmay,tid) VALUES ('$date','$year', '$project_code','$sid','$type', '$fpn','$remark','Yes','$howmay','$tid')");
                      }else{
                          echo 'Not Uploded';
                    }
                    $typed=$type.' Uploaded';
                    $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','$type','$typed','$tid')");
                       $spd = $this->Menu_model->get_spdbyid($sid);
                       $pi = $spd[0]->pi_id;
                       $zh = $spd[0]->zh_id;
                       $sname = $spd[0]->sname;
                       $pcode = $spd[0]->project_code;
                       $msg = $pcode." | ".$sname." | Case Study Upload";
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                       $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
                }
        $this->db->query("update plantask set tdone=1, actiontaken='Yes', donet='$datet' where taskid='$tid'");
    }
    public function add_wgurdata($urtid,$tid,$remark,$que,$rat1){
        $cdate=date('Y-m-d H:i:s');
        $this->db->query("update wgdata set zmremark='$remark',rating='$rat1',zmrdt='$cdate' where tid='$urtid'");
        $this->db->query("update plantask set tdone=1,donet='$cdate' where taskid='$tid'");
    }
    public function add_wgvideo($date,$year,$project_code,$sid,$wavideo,$remark,$count,$type){
                    $data = [];
                    for($i = 0; $i < $count; $i++){
                    $fn = $_FILES['file']['name']     = $_FILES['wavideo']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['wavideo']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['wavideo']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['wavideo']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['wavideo']['size'][$i];
                    $uploadPath = 'uploads/whatsapp/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $fn;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $fpn = $uploadPath.$filename;
                        $data['totalFiles'][] = $filename;
                        $this->db->query("INSERT INTO `wgdata` (date, year, project_code, sid, type, filepath, remark) VALUES ('$date','$year', '$project_code','$sid','$type', '$fpn','$remark')");
                      }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';
                    }
                }
    }
    public function forward_task($id,$touser,$fromuser){
       $query=$this->db->query("SELECT * FROM task_assign WHERE id='$id'");
       $data = $query->result();
       $p_from_user=$data[0]->from_user;
       $p_to_user=$data[0]->to_user;
       $p_date=$data[0]->sdatet;
       $this->db->query("INSERT INTO `pre_assign` (updatet, task_id, from_user, to_user) VALUES ('$p_date', '$id','$p_from_user','$p_to_user')");
       $this->db->insert_id();
       date_default_timezone_set('Asia/Kolkata');
       $cdate = date('Y-m-d H:i:s');
       $query=$this->db->query("update task_assign set from_user='$fromuser', to_user='$touser',sdatet='$cdate' WHERE id='$id'");
    }
    public function get_competitionReport(){
        $query=$this->db->query("SELECT *,s.sname FROM `compregistration` cr left Join spd s on cr.sid=s.id");
        return $query->result();
    }
    public function get_reviewdetailm($rid){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreviewdata.rid='$rid'");
        return $query->result();
    }
    public function get_schoolreviewdetail(){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN allreview ON allreview.id=allreviewdata.rid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreview.reviewtype='School Self Review'");
        return $query->result();
    }
    public function get_myschoolreviewdetail($uid){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN allreview ON allreview.id=allreviewdata.rid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreview.reviewtype='School Self Review' and allreviewdata.piid='$uid'");
        return $query->result();
    }
    public function get_myprogramreviewdetail($uid){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN allreview ON allreview.id=allreviewdata.rid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreview.reviewtype='Program Self Review' and allreviewdata.piid='$uid'");
        return $query->result();
    }
    public function get_prorebypipro($pcode){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN allreview ON allreview.id=allreviewdata.rid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreview.reviewtype='Program Self Review' and projectcode='$pcode'");
        return $query->result();
    }
    public function get_programreviewdetail(){
        $query=$this->db->query("SELECT spd.sname sname, task_assign.task_type taction,task_assign.task_subtype tstaction, allreviewdata.*,u1.fullname pstname,u2.fullname bdname,s1.name exname,s2.name rtsname,s3.name csname FROM allreviewdata LEFT JOIN status s1 ON s1.id=allreviewdata.exsid LEFT JOIN allreview ON allreview.id=allreviewdata.rid LEFT JOIN status s2 ON s2.id=allreviewdata.csid LEFT JOIN spd on spd.id=allreviewdata.sid LEFT JOIN task_assign ON task_assign.id=allreviewdata.ntid LEFT JOIN status s3 ON s3.id=spd.status LEFT JOIN user_detail u1 ON u1.id=allreviewdata.uid LEFT JOIN user_detail u2 ON u2.id=allreviewdata.piid WHERE allreview.reviewtype='Program Self Review'");
        return $query->result();
    }
    public function get_reviewdetail($zhid,$sd,$ed){
        $query=$this->db->query("SELECT *,task_assign.id tid,spd.id sid FROM task_assign LEFT JOIN spd on spd.id=task_assign.spd_id WHERE task_type='ZH-Review' and cast(task_date as DATE) BETWEEN '$sd' and '$ed' and to_user='$zhid'");
        return $query->result();
     }
     public function get_nexttask($tid,$sid){
        $query=$this->db->query("SELECT * FROM task_assign LEFT JOIN plantask ON plantask.taskid=task_assign.id WHERE task_assign.id=(SELECT min(id) FROM task_assign WHERE id>'$tid' and spd_id='$sid')");
        return $query->result();
     }
    public function user_login($user,$pwd){
        $query=$this->db->query("SELECT * FROM user_detail WHERE user_name='$user' AND password='$pwd'");
        return $query->result();
     }
    public function delete_user($id){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("DELETE FROM `user_detail` WHERE `id`=$id");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function get_fmtaskAssing($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM sub_task WHERE project_code='$pcode' ");
        return $query->result();
    }
    public function get_fmtaskdesign($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM sub_task WHERE project_code='$pcode' and tasktype='Designing' ");
        return $query->result();
    }
    public function get_fmtaskprinting($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM sub_task WHERE project_code='$pcode' and tasktype='Printing'");
        return $query->result();
    }
    public function get_fmtaskpacking($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM sub_task WHERE project_code='$pcode' and tasktype='Packing'");
        return $query->result();
    }
    public function get_fmtaskdispatch($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM sub_task WHERE project_code='$pcode' and tasktype='Dispatch'");
        return $query->result();
    }
    public function get_designstart($pid){
        $query=$this->db->query("SELECT * FROM `handoverlog` WHERE cid='$pid' and remark='Backdrop Approved by BD'");
        return $query->result();
    }
    public function get_printprocess($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `model_m` WHERE model_name='Backdrop Printing' ORDER BY `model_m`.`stage` ASC");
        return $query->result();
    }
    public function get_printprocessUM($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `model_m` WHERE model_name='User Manual Printing' ORDER BY `model_m`.`stage` ASC");
        return $query->result();
    }
    public function get_printprocessTM($pcode){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM `model_m` WHERE model_name='Training Manual Printing' ORDER BY `model_m`.`stage` ASC");
        return $query->result();
    }
    public function get_printingprocess($pcode,$process,$part){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT dailywork.video,workclose.user_name,process_name,workclose.startt,workclose.closet FROM dailywork LEFT JOIN workclose ON workclose.wid=dailywork.id WHERE batchno='$pcode' and model_name='Backdrop Printing'");
        return $query->result();
    }
    public function add_puritem($project_code, $item_name, $item_qty, $unit, $rate, $pay_tarms, $vendor_name, $v_mno, $v_email, $v_address, $bank_name, $account_no, $ifsc, $del_tarms ,$remark){
        $db2 = $this->load->database('db2', TRUE);
        $myuid = uniqid('OPP');
        $vander_id = uniqid('Ven');
        $query=$db2->query("INSERT INTO `purreq` (purreq_id, batchno, material_name, vander_id, unit, material_qty) VALUES ('$myuid', '$project_code','$item_name', '$vander_id', '$unit', '$item_qty')");
        $db2->insert_id();
        $query=$db2->query("INSERT INTO `vander_detail` (vander_id, material_name, vander_name, vander_mno, vander_email, address, status, pay_name, bank_name, account_no, ifsc_code) VALUES ('$vander_id', '$item_name', '$vendor_name', '$v_mno', '$v_email', '$v_address', 'Active', '$item_name', '$bank_name', '$account_no', '$ifsc')");
        $db2->insert_id();
        $query=$db2->query("INSERT INTO `vendor_store` (purreq_id, material_name, vander_id, best, rate, del_terms, pay_tarms, remark, done) VALUES ('$myuid', '$item_name','$vander_id', '1', '$rate', '$del_tarms', '$pay_tarms', '$remark', '1')");
        return $db2->insert_id();
    }
    public function get_model(){
        $query=$this->db->query("SELECT * FROM model");
        return $query->result();
     }
     public function get_handoverlog($cid){
        $query=$this->db->query("SELECT * FROM handoverlog where cid='$cid'");
        return $query->result();
     }
     public function get_wgtdata($uid){
        $query=$this->db->query("SELECT * FROM `plantask` WHERE `user_id`='$uid' and `action`='Utilisation' and actiontaken='Yes' and tdone=1");
        return $query->result();
     }
     public function get_wgsdata($uid){
        $query=$this->db->query("SELECT DISTINCT spd_id FROM `plantask` WHERE `user_id`='$uid' and `action`='Utilisation' and actiontaken='Yes'  and tdone=1");
        return $query->result();
     }
     public function get_wgpdata($uid){
        $query=$this->db->query("SELECT DISTINCT spd.project_code FROM plantask LEFT JOIN spd ON spd.id=plantask.spd_id WHERE `user_id`='$uid' and `action`='Utilisation' and actiontaken='Yes' and tdone=1");
        return $query->result();
     }
     public function get_modelbytype($mtype){
        $query=$this->db->query("SELECT distinct model_name FROM model where type='$mtype'");
        return $query->result();
     }
     public function get_modeldetail(){
        $query=$this->db->query("SELECT detail,type FROM model group by detail,type");
        return $query->result();
     }
     public function get_modelbysid($sid){
        $query=$this->db->query("SELECT * FROM model_install where spd_id='$sid'");
        return $query->result();
     }
     public function get_modelbysnw($sid){
        $query=$this->db->query("SELECT * FROM model_install where spd_id='$sid' and working='NO'");
        return $query->result();
     }
     public function get_modelbyrepair($sid){
        $query=$this->db->query("SELECT * FROM repairreq where sid='$sid'");
        return $query->result();
     }
     public function get_modelbytdrepair($tid){
        $query=$this->db->query("SELECT * FROM repairreq where tid='$tid'");
        return $query->result();
     }
     public function get_modelbyreplace($sid){
        $query=$this->db->query("SELECT * FROM replacereq where sid='$sid'");
        return $query->result();
     }
     public function get_spdteacherbytid($tid){
        $query=$this->db->query("SELECT DISTINCT contact_name FROM spd_contact WHERE sid=(SELECT task_assign.spd_id FROM task_assign WHERE task_assign.id='$tid')");
        return $query->result();
     }
    public function project_detail(){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT * FROM client_details");
        return $query->result();
     }
     public function get_modelfromf(){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT distinct model_name FROM box where type='4'");
        return $query->result();
     }
     public function get_modelpart($modelnname){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT distinct part_name FROM model_m where model_name='$modelnname' and part_name!=''");
        return $query->result();
     }
     public function get_modelmaterial($modelnname){
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query("SELECT distinct material_name FROM model_m where model_name='$modelnname' and material_name!=''");
        return $query->result();
     }
    //  Add New Function 09-05-2024- Deepak
      public function getAllProjectcode(){
            $query=$this->db->query("select projectcode,project_year from client_handover WHERE projectcode !=''");
            return $query->result();
        }
    public function getAllProgramReviewYear(){
            $query=$this->db->query("SELECT DISTINCT(year) FROM `progrram_review_sby_pm` WHERE end_date !='' ORDER by year ASC");
            return $query->result();
        }
     public function getProgramReviewSchool($projectcode,$sid){
            $query=$this->db->query("SELECT * FROM `annual_project_review` WHERE projectcode ='$projectcode' AND sid='$sid'");
            return $query->result();
        }
     public function getSchoolStatsBySID($sid){
        //  echo $sid;
        //  die;
            $query      = $this->db->query("SELECT status FROM `spd` WHERE id=$sid");
            $data       =  $query->result();
            $statusid   = $data[0]->status;
            if($statusid == '' || $statusid == 'Null'){
                $statusid = 1;
            }
            $query1     =   $this->db->query("SELECT * FROM `status` WHERE id=$statusid");
            $dataStatus =  $query1->result();
            return $dataStatus[0]->name;
        }
     public function getLastStatusofProject($pcode){
            $query      = $this->db->query("SELECT status FROM spd WHERE project_code = '$pcode' ORDER BY id DESC LIMIT 1");
            $data       =  $query->result();
            $statusid   = $data[0]->status;
            if($statusid == '' || $statusid == 'Null'){
                $statusid = 1;
            }
            $query1     =   $this->db->query("SELECT * FROM `status` WHERE id=$statusid");
            $dataStatus =  $query1->result();
            return $dataStatus[0]->name;
        }
     public function getSchoolCountinProject($pcode){
            $query      = $this->db->query("SELECT sname FROM spd WHERE project_code = '$pcode'");
            $data       =  $query->result();
            return $data;
        }
     public function getAllActivePiaList(){
            $query=$this->db->query("SELECT * FROM `user_detail` WHERE dep_id=2 AND status ='active'");
            return $query->result();
        }
        public function getAllActiveInstaList(){
            $query=$this->db->query("SELECT * FROM `user_detail` WHERE dep_id=4 AND status='active'");
            return $query->result();
        }
     public function getMainTaskstage($taskperformedby,$taskname){
            $query=$this->db->query("SELECT tasktype, taskname FROM `main_task` WHERE taskperformedby='$taskperformedby' AND tasktype = '$taskname' GROUP BY taskname");
            return $query->result();
        }
        public function getMainSubTaskstage($taskperformedby,$tasktype,$taskname){
            $query=$this->db->query("SELECT * FROM `main_task` WHERE taskperformedby='$taskperformedby' AND tasktype='$tasktype' AND taskname='$taskname'");
            return $query->result();
        }
     public function school_timelinePlanningTask($taskperformedby,$type,$taskname,$project_code,$school_task_code,$sid,$uid,$task_assignby){
    $data = [
        'taskperformedby' => $taskperformedby,
        'tasktype' => $type,
        'project_code' => $project_code,
        'school_task_code' => $school_task_code,
        'sid' => $sid,
        'taskname' => $taskname,
        'task_assignby' => $task_assignby,
        'user_id' => $uid
    ];
    $this->db->insert('school_planning_task',$data);
    return $this->db->insert_id();
    // echo $this->db->last_query();
    }
      public function school_timelinePlanningSubTask($schoolcode,$sid,$taskid,$uid,$taskactionid,$tasktaction){
        $data = [
            'school_task_code' =>$schoolcode,
            'task_id' => $taskid,
            'sid' => $sid,
            'user_id' => $uid,
            'qtask_id' =>$taskactionid,
            'taction' =>$tasktaction
        ];
        $this->db->insert('school_planning_subtask',$data);
        //  echo $this->db->last_query(); exit;
        return $this->db->insert_id();
    }
      public function getNextyearDataofProject($pocde){
            $query=$this->db->query("SELECT * FROM `next_year_program_plan` WHERE projectcode='$pocde'");
            return $query->result();
        }
        public function getPIABYID($id){
            $query=$this->db->query("SELECT * FROM `user_detail` WHERE id ='$id'");
            return $query->result();
        }
     public function getMandERequiredOrNot($pcode){
            $query      = $this->db->query("SELECT * FROM `next_year_program_plan` WHERE projectcode ='$pcode' AND question='Is M&E Required for this program ?';");
            $data       =  $query->result();
            return $data;
        }
     public function program_timeline12($projectcode,$uid,$bdid,$wmessage,$communication1,$communication2,$communication3,$callsfu1,$callsfu2,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation1,$utilisation2,$utilisation3,$otherdcall,$outbondc1,$outbondc2,$outbondc3,$bdreview,$cengagement,$zmvisit,$pmvisit,$exstatusdt,$status,$summeractivity,$winteractivity,$onlineactivity,$webinar,$socialMediaPost1,$socialMediaPost2,$socialMediaPost3,$socialMediaPost4){
        $data = array(
            'projectcode' => $projectcode,
            'uid' => $uid,
            'bdid' => $bdid,
            'wmessage' => $wmessage,
            'communication1' => $communication1,
            'communication2' => $communication2,
            'communication3' => $communication3,
            'callsfu1' => $callsfu1,
            'callsfu2' => $callsfu2,
            'reporttype' => $reporttype,
            'fttp' => $fttp,
            'rttp' => $rttp,
            'casestudy' => $casestudy,
            'maintenance' => $maintenance,
            'replacement' => $replacement,
            'diy' => $diy,
            'blmne' => $blmne,
            'elmne' => $elmne,
            'nsp' => $nsp,
            'utilisation1' => $utilisation1,
            'utilisation2' => $utilisation2,
            'utilisation3' => $utilisation3,
            'otherdcall' => $otherdcall,
            'outbondc1' => $outbondc1,
            'outbondc2' => $outbondc2,
            'outbondc3' => $outbondc3,
            'bdreview' => $bdreview,
            'cengagement' => $cengagement,
            'zmvisit' => $zmvisit,
            'pmvisit' => $pmvisit,
            'exstatusdt' => $exstatusdt,
            'status' => $status,
            'summeractivity' => $summeractivity,
            'winteractivity' => $winteractivity,
            'onlineactivity' => $onlineactivity,
            'webinar' => $webinar,
            'socialMediaPost1' => $socialMediaPost1,
            'socialMediaPost2' => $socialMediaPost2,
            'socialMediaPost3' => $socialMediaPost3,
            'socialMediaPost4' => $socialMediaPost4
        );
        $this->db->insert('program_timeline_planning', $data);
        //  echo $this->db->last_query(); exit;
    }
     public function getAllSchoolInPIA($piaid){
            $query=$this->db->query("SELECT * FROM `spd` WHERE pi_id=$piaid");
            return $query->result();
        }
      public function getRequestPiaName($piId){
            $query = $this->db->query("SELECT fullname FROM `user_detail` WHERE id='$piId'");
            return $query->result()[0]->fullname;
        }
     public function GetAcademickApprovalRequestForPIA($uid){
            $cyear = date("Y");
            $query=$this->db->query("SELECT * FROM `academiccalendar` WHERE piaid='$uid' AND YEAR(created_at)=$cyear");
            return $query->result();
        }
     public function GetAllAcadCalender(){
            $query=$this->db->query("SELECT type FROM `academiccalendartype` WHERE status =1");
            return $query->result();
        }
      public function getSchoolByPiAId($pi){
            $query=$this->db->query("select * from spd where pm_apr='1' and pi_id='$pi'");
            return $query->result();
        }
     public function GetSchoolForReview($pi,$status,$sid){
            if($status==0){
                $query=$this->db->query("select * from spd where pm_apr='1' and pi_id='$pi' and id='$sid' ");
            }else{
                $query=$this->db->query("select * from spd where pm_apr='1' and pi_id='$pi' and status='$status' and id='$sid'");
            }
            return $query->result();
        }
     public function getSchoolZone(){
            $db3 = $this->load->database('db3', TRUE);
            $query= $db3->query("SELECT * FROM `user_zone`");
            return $query->result();
        }
     public function getSchoolZoneByid($id){
            $db3 = $this->load->database('db3', TRUE);
            $query= $db3->query("SELECT * FROM `user_zone` WHERE id='$id'");
            return $query->result();
        }
      public function get_pcbypiid1($uid){
        $query= $this->db->query("select distinct projectcode from program_timeline_planning");
        return $query->result();
    }
     public function getSchoolNameBySid($sid) {
            $query = $this->db->query("SELECT sname FROM `spd` WHERE id='$sid'");
            return $query->result()[0]->sname;
        }
       public function getPmTargetDateSchool($pcode,$spd_id){
        $query= $this->db->query("SELECT * FROM `program_timeline_planning` WHERE projectcode ='$pcode'");
        return $query->result();
    }
        public function school_timelinePlanning($sid,$piid,$projectcode,$uid,$bdid,$wmessage,$communication1,$communication2,$communication3,$callsfu1,$callsfu2,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$diy,$blmne,$elmne,$exstatusdt,$nsp,$utilisation1,$utilisation2,$utilisation3,$bdreview,$cengagement,$status,$academicyear,$zmvisit,$pmvisit,$otherdepartmentcall,$outbondc1,$outbondc2,$outbondc3,$summeractivity,$winteractivity,$onlineactivity,$webinar){
        $this->db->query("INSERT INTO schooltimeline_planning SET
        sid = '$sid',
        piaid = '$piid',
        projectcode = '$projectcode',
        uid = '$uid',
        bdid = '$bdid',
        wmessage = '$wmessage',
        communication1 = '$communication1',
        communication2 = '$communication2',
        communication3 = '$communication3',
        callsfu1 = '$callsfu1',
        callsfu2 = '$callsfu2',
        reporttype = '$reporttype',
        fttp = '$fttp',
        rttp = '$rttp',
        casestudy = '$casestudy',
        maintenance = '$maintenance',
        diy = '$diy',
        blmne = '$blmne',
        elmne = '$elmne',
        exstatusdt = '$exstatusdt',
        nsp = '$nsp',
        utilisation1 = '$utilisation1',
        utilisation2 = '$utilisation2',
        utilisation3 = '$utilisation3',
        bdreview = '$bdreview',
        cengagement = '$cengagement',
        status = '$status',
        academicyear = '$academicyear',
        zmvisit = '$zmvisit',
        pmvisit = '$zmvisit',
        otherdepartmentcall = '$otherdepartmentcall',
        outbondc1 = '$outbondc1',
        outbondc2 = '$outbondc2',
        outbondc3 = '$outbondc3',
        summeractivity = '$summeractivity',
        winteractivity = '$winteractivity',
        onlineactivity = '$onlineactivity',
        webinar = '$webinar'");
    $this->db->insert('schooltimeline_planning',$data);
    // echo $this->db->last_query(); exit;
    }
    public function getCompleteSchoolReview($pcode){
            $query=$this->db->query("SELECT DISTINCT(sid), piid FROM school_reviewby_pi WHERE projectcode='$pcode'");
            return $query->result();
        }


  


// Start Deepak Logic Database


public function GetAllBDRequestByRequestType($rtype,$code){

    // if ($code == 1) {
    //     $conditions = " AND assignstatus = '1'";
    // }else if ($code == 2) {
    //     $conditions = " AND assignstatus = '0' AND status = '0' AND assignto='1'";
    // } else if ($code == 3) {
    //     $conditions = " AND assignstatus='1' AND assignto='1'";
    // } else if ($code == 4) {
    //     $conditions = " AND status='1' AND assignto='1'";
    // }else{
    //     $conditions = '';
    // }

    if ($code == 1) {
        $conditions = "";
    }else if ($code == 2) {
        $conditions = " AND assignstatus = '0' AND status = '0'";
    } else if ($code == 3) {
        $conditions = " AND assignstatus = '1' AND status = '0'";
    } else if ($code == 4) {
        $conditions = " AND status='1'";
    }else{
        $conditions = '';
    }

    $query=$this->db->query("SELECT * from bdrequest where rysn ='$rtype' $conditions");
    return $query->result();
}

public function GetBDRequestColor($request){
    $query = $this->db->query("SELECT * FROM `bd_request_color` WHERE request_type = '$request'");
    $data =  $query->result();
    if(sizeof($data) > 0){
        $color = $data[0]->color_code;
        return $color;
    }
}
public function GetBDRequestALLInfoBYRequestCode($request_code){
    $query = $this->db->query("SELECT * FROM `bd_request_color` WHERE request_code = '$request_code'");
    $data =  $query->result();
    return $data;
}





    
public function bdr_plansitask($uuid,$rid,$noofschool){
    $date = date('Y-m-d H:i:s');
    $ssid="";
    for($i=1;$i<=$noofschool;$i++){
        $sname = "School ".$i;
        $this->db->query("INSERT INTO spd (sname,spdident,pi_id) VALUES ('$sname','$rid','$uuid')");
        $sid =  $this->db->insert_id();
        $cname = "Contact ".$i;
        $this->db->query("INSERT INTO spd_contact (sid,contact_name,main) VALUES ('$sid','$cname','1')");
        $ssid = $ssid.",".$sid;
        $this->db->query("INSERT INTO task_assign (task_date, from_user, to_user, task_type, task_subtype, project_code, spd_id, remark,checklist) VALUES ('$date','$uuid','$uuid','Research','School Identification','','$sid','','page55')");
    }
    $this->db->query("update bdtask set startt='$date' where uid='$uuid' and tid='$rid'");
    $this->db->query("INSERT INTO bdrequestlog (tid,tby,remark,detail) VALUES ('$rid','$uuid','','PIAs Plan for This Request')");
}



public function GetBDRequestByRequestID($reqID){
    $query=$this->db->query("SELECT * from bdrequest where id ='$reqID'");
    return $query->result();
}
public function GetBDRequestTaskByRequestID($reqID){
    $query=$this->db->query("SELECT tblcallevents.task_action AS task_action_id, task_action.taskname, COUNT(task_action.taskname) AS task_count FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action WHERE tblcallevents.bdrid = '$reqID' GROUP BY tblcallevents.task_action, task_action.taskname");
    return $query->result();
}

public function GetBDRequestTaskByRequestIDWithTaskID($reqID){
    $query=$this->db->query("SELECT tblcallevents.task_action AS task_action_id, task_action.taskname, COUNT(task_action.taskname) AS task_count FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action WHERE tblcallevents.bdrid = '$reqID' GROUP BY tblcallevents.task_action, task_action.taskname");
    return $query->result();
}


// Call Start
public function GetBDRequestTaskByRequestIDWithTaskIDS($reqID,$taskid){
    $query=$this->db->query("SELECT tblcallevents.id as task_id, tblcallevents.rsid, tblcallevents.task_action AS task_action_id, task_action.taskname, spd_request.id as rspd_id, spd_request.sname, spd_request.call_visit, client_handover.client_name FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid LEFT JOIN client_handover ON client_handover.id = spd_request.ch_id WHERE tblcallevents.bdrid ='$reqID' AND tblcallevents.task_action = '$taskid'");
    return $query->result();
}
public function GetBDRequestTaskByRequestIDWithTBLTaskIDS($reqID,$taskid){
    $query=$this->db->query("SELECT tblcallevents.id as task_id, tblcallevents.task_action AS task_action_id, task_action.taskname, spd_request.id as rspd_id, spd_request.sname, spd_request.call_visit, client_handover.client_name FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid LEFT JOIN client_handover ON client_handover.id = spd_request.ch_id WHERE tblcallevents.bdrid ='$reqID' AND tblcallevents.rsid = '$taskid'");
    return $query->result();
}

// Research Start
public function GetBDRequestTaskByRequestIDWithTaskIDSResearch($reqID,$taskid){
    $query=$this->db->query("SELECT tblcallevents.id as task_id, tblcallevents.rsid, tblcallevents.task_action AS task_action_id, task_action.taskname, spd_request.id as rspd_id, spd_request.sname, spd_request.call_visit, client_handover.client_name FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid LEFT JOIN client_handover ON client_handover.id = spd_request.ch_id WHERE tblcallevents.bdrid ='$reqID' AND tblcallevents.task_action = '$taskid'");
    return $query->result();
}


public function GetBDRequestTaskByRequestIDWithTBLTaskIDSResearch($reqID,$taskid){
    $query=$this->db->query("SELECT tblcallevents.id as task_id, tblcallevents.task_action AS task_action_id, task_action.taskname, spd_request.id as rspd_id, spd_request.sname, spd_request.call_visit, client_handover.client_name FROM tblcallevents LEFT JOIN task_action ON task_action.id = tblcallevents.task_action LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid LEFT JOIN client_handover ON client_handover.id = spd_request.ch_id WHERE tblcallevents.bdrid ='$reqID' AND tblcallevents.id = '$taskid'");
    return $query->result();
}

public function GetBDRequestTimeSPDRequest($reqID){
    $query=$this->db->query("SELECT * FROM `spd_request` WHERE bdrid = '$reqID' AND pi_id IS NULL");
    return $query->result();
}



public function GetTaskSequenceByBDRequestANDRSID($reqID,$reqSID){
    $query=$this->db->query("WITH RECURSIVE TaskHierarchy AS (
    -- Base Query: Get the starting record
    SELECT 
        tblcallevents.id AS task_id,
        tblcallevents.task_action AS task_action_id,
        task_action.taskname,
        client_handover.client_name,
        tblcallevents.aftertask
    FROM 
        tblcallevents
    LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
    LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
    LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
    WHERE 
        tblcallevents.bdrid = '$reqID' 
        AND tblcallevents.rsid = '$reqSID'

    UNION ALL  

    -- Recursive Query: Fetch records where task_id appears in aftertask
    SELECT 
        tblcallevents.id AS task_id,
        tblcallevents.task_action AS task_action_id,
        task_action.taskname,
        client_handover.client_name,
        tblcallevents.aftertask
    FROM 
        tblcallevents
    LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
    LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
    LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
    LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid
    INNER JOIN TaskHierarchy ON FIND_IN_SET(TaskHierarchy.task_id, tblcallevents.aftertask) > 0
)

SELECT DISTINCT task_id, task_action_id, taskname, client_name 
FROM TaskHierarchy");
    return $query->result();
}



// WITH RECURSIVE TaskHierarchy AS (
//     -- Base Query: Get the starting record
//     SELECT 
//         tblcallevents.id AS task_id,
//         tblcallevents.task_action AS task_action_id,
//         task_action.taskname,
//         client_handover.client_name,
//         tblcallevents.aftertask
//     FROM 
//         tblcallevents
//     LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
//     LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
//     LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
//     WHERE 
//         tblcallevents.bdrid = '1329' 
//         AND tblcallevents.id = '18920'

//     UNION ALL  

//     -- Recursive Query: Fetch records where task_id appears in aftertask
//     SELECT 
//         tblcallevents.id AS task_id,
//         tblcallevents.task_action AS task_action_id,
//         task_action.taskname,
//         client_handover.client_name,
//         tblcallevents.aftertask
//     FROM 
//         tblcallevents
//     LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
//     LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
//     LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
//     INNER JOIN TaskHierarchy ON FIND_IN_SET(TaskHierarchy.task_id, tblcallevents.aftertask) > 0
// )

// SELECT task_id, task_action_id, taskname, client_name FROM TaskHierarchy;




// WITH RECURSIVE TaskHierarchy AS (
//     -- Base Query: Get the starting record
//     SELECT 
//         tblcallevents.id AS task_id,
//         tblcallevents.task_action AS task_action_id,
//         task_action.taskname,
//         client_handover.client_name,
//         tblcallevents.aftertask
//     FROM 
//         tblcallevents
//     LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
//     LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
//     LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
//     WHERE 
//         tblcallevents.id = '19036'

//     UNION ALL  

//     -- Recursive Query: Fetch records where task_id appears in aftertask
//     SELECT 
//         tblcallevents.id AS task_id,
//         tblcallevents.task_action AS task_action_id,
//         task_action.taskname,
//         client_handover.client_name,
//         tblcallevents.aftertask
//     FROM 
//         tblcallevents
//     LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
//     LEFT JOIN bdrequest ON bdrequest.id = tblcallevents.bdrid
//     LEFT JOIN client_handover ON client_handover.id = bdrequest.ch_id
//     INNER JOIN TaskHierarchy ON FIND_IN_SET(TaskHierarchy.task_id, tblcallevents.aftertask) > 0
// )

// SELECT task_id, task_action_id, taskname, client_name FROM TaskHierarchy;



public function GetSchoolIdentificationTask($uid,$date){
    $query=$this->db->query("SELECT
    tblcallevents.id,
     rspd.sname,
    ta.taskname
FROM
    `tblcallevents`
    LEFT JOIN task_action ta on ta.id= tblcallevents.task_action
    LEFT JOIN spd_request rspd on rspd.id= tblcallevents.rsid
WHERE
    user_id = '$uid' AND CAST(appointment_datetime AS DATE) = '$date' AND task_status = 0 and aftertask = 0");
    return $query->result();
}

public function GetSchoolIdentificationALLTask($taskid){
    $query=$this->db->query("WITH RECURSIVE TaskHierarchy AS (
    -- Base Query: Get the starting record
    SELECT 
        tblcallevents.id AS task_id,
        tblcallevents.task_action AS task_action_id,
        task_action.taskname,
        tblcallevents.aftertask,
        spd_request.sname,
        tblcallevents.task_status
    FROM 
        tblcallevents
    LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
    LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid
    WHERE 
        tblcallevents.id = '$taskid'

    UNION ALL  

    -- Recursive Query: Fetch records where task_id appears in aftertask
    SELECT 
        tblcallevents.id AS task_id,
        tblcallevents.task_action AS task_action_id,
        task_action.taskname,
        tblcallevents.aftertask,
        spd_request.sname,
        tblcallevents.task_status
    FROM 
        tblcallevents
    LEFT JOIN task_action ON task_action.id = tblcallevents.task_action
    LEFT JOIN spd_request ON spd_request.id = tblcallevents.rsid
    INNER JOIN TaskHierarchy ON FIND_IN_SET(TaskHierarchy.task_id, tblcallevents.aftertask) > 0
)

SELECT task_id, task_action_id, taskname, sname,task_status FROM TaskHierarchy");
    return $query->result();
}


public function GetTodaysAllTaskCountByUid($uid,$tdate,$perform){
   
    $query = $this->db->query("SELECT `task_action`.`tasktype`, COUNT(`tblcallevents`.`id`) AS task_count FROM `task_action` LEFT JOIN `tblcallevents` ON `tblcallevents`.`task_action` = `task_action`.`id` AND DATE(`tblcallevents`.`appointment_datetime`) = '$tdate' AND `tblcallevents`.`task_status` = 0 AND `tblcallevents`.`user_id` = '$uid' WHERE `task_action`.`perform_by` = '$perform' 
     GROUP BY `task_action`.`tasktype` ORDER BY `task_action`.`tasktype` ASC");
    return $query->result();
}
public function GetTodaysAllTaskByUid($uid,$tdate){
    $query=$this->db->query("SELECT tblcallevents.id as task_id, spdr.sname, tblcallevents.task_action,tblcallevents.fwd_date, ta.tasktype,
                             ta.taskname, tblcallevents.task_status, tblcallevents.appointment_datetime, tblcallevents.initiate_datetime, 
                             tblcallevents.updated_datetime, tblcallevents.assigned_by, tblcallevents.bdrid, tblcallevents.comments,
                             tblcallevents.project_code, tblcallevents.actontaken, tblcallevents.purpose_achieved, tblcallevents.cid_id, 
                             tblcallevents.sales_cid, tblcallevents.sid, tblcallevents.bd_idetype, tblcallevents.target_date, 
                             tblcallevents.exdate as expected_date 
        FROM `tblcallevents` 
        LEFT JOIN spd_request spdr ON spdr.id = tblcallevents.rsid 
        LEFT JOIN task_action ta ON ta.id = tblcallevents.task_action 
        WHERE CAST(appointment_datetime AS DATE) = '$tdate' AND user_id = '$uid' AND tblcallevents.task_status !=1");
    return $query->result();
}


public function getTaskDetails($taskId,$taskactionId){
    $query =  $this->db->query("SELECT tbe.*,spd.*,spdc.* 
                                 FROM tblcallevents tbe LEFT JOIN spd ON spd.id = tbe.sid 
                                 LEFT JOIN spd_contact spdc ON spdc.sid= spd.id 
                                 WHERE tbe.id = '".$taskId."' AND tbe.task_action= '".$taskactionId."' ");
     $resultArr =  $query->result_array();
     return $resultArr;
 }

 public function getTasktypeName($taskTypeId){
     $query  =  $this->db->query("SELECT tasktype,taskname FROM task_action WHERE id =  '".$taskTypeId."'");
     $result = $query->row_array();
     return $result;
 }

 public function updateTasksById($taskid,$data){    
     $updateQuery = " UPDATE tblcallevents SET ";
     foreach($data as $key => $val){
        $updateQuery .= " `".strtolower($key)."` = '".$val."' ,";
     }
     $updateQuery    = substr($updateQuery,0,'-1');
     $updateQuery  .= " WHERE `id` = '".$taskid."' ";
          $this->db->query($updateQuery);
     //echo $this->db->last_query();exit;
     return true;
 }

 public function insertTasksWithAttachements($data){
   $data['status']       = 1;
   $data['created_date'] = date('Y-m-d');
  // dd($data);
   $insertQuery          = " INSERT INTO tblcallevents_attachments (task_id,attachment_link,remark,user_id,created_at) VALUES ( ";

           foreach($data as $key=>$val){
                $key         =  strtolower($key);
                $insertQuery .=   " `".$val."`,";
            }

    $insertQuery          =  substr($insertQuery,0,-1);

    $insertQuery .= ")";
    echo $insertQuery;exit;
     return true;
 }
 public function batch_insert_task_execution($data) {
    $this->db->insert_batch('task_execution_details', $data);
}
//  public function task_execution_details($data){
//      $insertQuery =   $this->db->query("INSERT INTO task_execution_details(main_task_id,task_response,tbe_attachment_id,remark,tbe_id,performed_by,updated_at,status) 
//                  VALUES(".$data['task_id'].",".$data['user_role'].",".$data['user_id'].",".$data['question_id'].",
//                  ".$data['question_val'].",".$data['created_date'].",".$data['update_date'].")");
    
//  }

 public function getViewFormData($tasktypeId,$dept){
      $query =   $this->db->query(" SELECT * FROM main_task WHERE tasktype = '".$tasktypeId."' AND taskperformedby = '".$dept."' ");
      $query_result = $query->result_array();

    //   foreach($query_result as $key=>$val){
    //     $query_result_Array[$val['taskname']][$key] = $val;
    //   }
     
      return $query_result;
 }


}