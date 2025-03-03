<?php
date_default_timezone_set("Asia/Calcutta");
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Load form validation library
        $this->load->model('Menu_model');
        $this->load->helper('common_helper');
    }
    public function get_users(){
        $dt=$this->Menu_model->get_data();
        $this->load->view('users',['data'=>$dt]);
    }
     public function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    public function store_location() {
        $uid = $_POST['ur_id'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        
        $this->Menu_model->s_location($uid,$latitude,$longitude);
    }
    public function TeamDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_user();
        $this->load->view($dep_name.'/teamdetail',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function RIDPAGE1(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_user();
        $this->load->view($dep_name.'/RIDPAGE1',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function RIDPAGE2($chid,$sid,$tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_user();
        $this->load->view($dep_name.'/RIDPAGE2',['chid'=>$chid,'sid'=>$sid,'tid'=>$tid,'notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function SchoolIdentification($tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/SchoolIdentification',['tid'=>$tid,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function CluserLinkTE(){
        $user = $this->session->userdata('user');
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/CluserLinkTE',['notify'=>$notify,'user'=>$user,'piid'=>$uid]);
    }
    public function CMSCCC(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/CMSCCC',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function Success(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph2',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function SMGraphs(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/SMGraphs',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph1(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph1',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph2(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph2',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph3(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph3',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function RBDOP($rysn,$code){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/RBDOP',['rysn'=>$rysn,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function RBDOP1($bdid,$code){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/RBDOP1',['bdid'=>$bdid,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
     public function RBDOPDetail($rid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/RBDOPDetail',['rid'=>$rid,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph4(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph4',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph5(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph5',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIRGraph6(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIRGraph6',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function NIProgram(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_NIProgram();
        $this->load->view($dep_name.'/NIProgram',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function TransitProcess(){
        $user           = $this->session->userdata('user');
        $data['user']   = $user;
        $uid            = $user['id'];
        $id             = $user['dep_id'];

        
        $notify         =   $this->Menu_model->get_notifybyid($uid);
        $dt             =   $this->Menu_model->get_depatment_byid($id);
        $dep_name       =   $dt[0]->dep_name;
        $data['notify'] =   $notify;
        $data['user']   =   $user;
        $data['uid']    =   $uid;
        $this->display($dep_name.'/TransitProcess',$data);
    }
    public function PIATASKDETAIL(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_PIATASKDETAIL();
        $this->load->view($dep_name.'/PIATASKDETAIL',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function CreateGoals(){
        $user           = $this->session->userdata('user');
        $data['user']   = $user;$uid= $user['id'];
        $id             =  $user['dep_id'];

        

        $notify         =  $this->Menu_model->get_notifybyid($uid);
        $dt             =  $this->Menu_model->get_depatment_byid($id);
        $dep_name       =  $dt[0]->dep_name; 
        $data['notify'] =  $notify;
        $data['user']   =  $user;
        $data['uid']    =  $uid;
        $this->display($dep_name.'/CreateGoals',$data);
    }
    public function MediaDownload(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/MediaDownload',['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function GoalsCreate(){
        $uid = $_POST['userid'];
        $date = $_POST['date'];
        $tasktype = $_POST['tasktype'];
        $remark = $_POST['remark'];
        
        $this->Menu_model->Goals_Create($uid,$date,$tasktype,$remark);
        redirect('Menu/CreateGoals');
    }
    public function AllUtilisation(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_taskbyaction('Utilisation');
        $this->load->view($dep_name.'/AllUtilisation',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function Utilisation($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($pid);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $urtid=$task[0]->tid;
        $wgd=$this->Menu_model->get_wgdatabytid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/Utilisation', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'wgd'=>$wgd,'urtid'=>$urtid]);
    }
    public function InTBSchedule(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_InTBSchedule();
        $this->load->view($dep_name.'/InTBSchedule',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function TaskPBNS(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_TaskPBNS();
        $this->load->view($dep_name.'/TaskPBNS',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function TaskSBNC(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_TaskSBNC();
        $this->load->view($dep_name.'/TaskSBNC',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function TaskCBNR(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_TaskCBNR();
        $this->load->view($dep_name.'/TaskCBNR',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function TaskSBNGU(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_TaskSBNGU();
        $this->load->view($dep_name.'/TaskSBNGU',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid]);
    }
    public function ProgramTimeLine(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pia=$this->Menu_model->get_user_pia();
        $week = $this->Menu_model->get_week();
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/ProgramTimeLine',['week'=>$week,'pia'=>$pia,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function NWB15DB1(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_NWB15DB1();
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/NWB15DB1',['mdata'=>$mdata,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function NWB15DB2($pia){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_NWB15DB2($pia);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/NWB15DB2',['mdata'=>$mdata,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function SchoolTimeLine(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pia=$this->Menu_model->get_user_pia();
        $week = $this->Menu_model->get_week();
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/SchoolTimeLine',['week'=>$week,'pia'=>$pia,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function ProgramBOX(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/ProgramBOX',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function RIDCheck($mid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $meeting =$this->Menu_model->get_mrequestbyid($mid);
        $tid = $meeting[0]->tid;
        $this->load->view($dep_name.'/RIDCheck',['notify'=>$notify,'user'=>$user,'uid'=>$uid,'mid'=>$mid,'tid'=>$tid]);
    }
    public function MyProgram(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/MyProgram',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function BDWiseProgramBox(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/BDWiseProgramBox',['notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIAProgramTaskAssign(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pia=$this->Menu_model->get_user_pia();
        $week = $this->Menu_model->get_week();
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIAProgramTaskAssign',['week'=>$week,'pia'=>$pia,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function AlertReply($code){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/AlertReply',['notify'=>$notify,'user'=>$user,'code'=>$code,'uid'=>$uid]);
    }
    public function AllRRRequest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $rrreq = $this->Menu_model->get_rrreq();
        $this->load->view($dep_name.'/AllRRRequest',['rrreq'=>$rrreq,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function PIAAllDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pispdlist=$this->Menu_model->get_pischoollist();
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/PIAAllDetail',['pispdlist'=>$pispdlist,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
    }
    public function TeamDayDetail($tdate,$code){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_teamdaydeatil($uid,$tdate,$code);
        $this->load->view($dep_name.'/TeamDayDetail',['notify'=>$notify,'user'=>$user,'mdata'=>$mdata,'uid'=>$uid,'tdate'=>$tdate,'code'=>$code]);
    }
    public function MyDayDetail(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/MyDayDetail',['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function TDayDetail(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/TDayDetail',['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function PIADayReview(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PIADayReview',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function StartDReview($piid){
        $tdate = date('Y-m-d');
        $today = new DateTime();
        $yesterday = $today->modify('-1 day');
        $ydate = $yesterday->format('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mydetail=$this->Menu_model->get_mydetail($piid);
        $mytd1=$this->Menu_model->get_mytaskdbydate1($piid,$ydate);
        $mytd2=$this->Menu_model->get_mytaskdbydate2($piid,$ydate);
        $piadays = $this->Menu_model->get_piadaystart($piid,$tdate);
        $piadayc = $this->Menu_model->get_piadayclose($piid,$ydate);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/StartDReview',['ydate'=>$ydate,'tdate'=>$tdate,'piadayc'=>$piadayc,'piadays'=>$piadays,'piid'=>$piid,'notify'=>$notify, 'user'=>$user,'mydetail'=>$mydetail,'mytd1'=>$mytd1,'mytd2'=>$mytd2]);
        }else{
            redirect('Menu/main');
        }
    }
    public function DayStartCheck(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_BDdaystart($uid,$tdate);
        if(!empty($user)){
            $this->load->view($dep_name.'/DayStartCheck',['uid'=>$uid,'user'=>$user,'mdata'=>$mdata,'tdate'=>$tdate]);
        }else{
            redirect('Menu/main');
        }
    }
    public function TaskCheck(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/TaskCheck',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function repaircheck(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/repaircheck',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function rrDetailChange($rrid){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/rrDetailChange',['uid'=>$uid,'user'=>$user,'rrid'=>$rrid]);
        }else{
            redirect('Menu/main');
        }
    }
    public function bdrcomment(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $uid= $user['id'];
        $id =  $user['dep_id'];
        $uname = $user['fullname'];
        $rid = $_POST['rid'];
        $rcomment = $_POST['rcomment'];
        
        $this->Menu_model->bdr_comment($rid,$rcomment,$uname);
        redirect('Menu/TotalBDRequest/1');
    }
    public function RepairNow($id,$mid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        
        $this->Menu_model->Repair_Now($id,$mid);
        redirect('Menu/RIDCheck/'.$mid);
    }
    public function bdrreviewcomment(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $uid= $user['id'];
        $id =  $user['dep_id'];
        $uname = $user['fullname'];
        $rid = $_POST['rid'];
        $rcomment = $_POST['rcomment'];
        
        $this->Menu_model->bdr_comment($rid,$rcomment,$uname);
        redirect('Menu/SelseOTReview');
    }
    public function utimwreport(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/utimwreport',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function SADayReport(){
        date_default_timezone_set("Asia/Calcutta");
        if(isset($_POST['rdate'])){
        $rdate = $_POST['rdate'];
        }
        else{
            $rdate = date('Y-m-d');
        }
        $rd=$rdate;
        $rdate = new DateTime($rdate);
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/SADayReport',['uid'=>$uid,'user'=>$user,'rd'=>$rd,'rdate'=>$rdate]);
        }else{
            redirect('Menu/main');
        }
    }
    public function checkdays(){
        $rat1 = $_POST['rat1'];
        $rat2 = $_POST['rat2'];
        $rat3 = $_POST['rat3'];
        $rat4 = $_POST['rat4'];
        $udid = $_POST['udid'];
        $que = $_POST['que'];
        $sremark = $_POST['sremark'];
        
        $this->Menu_model->check_days($rat1,$rat2,$rat3,$rat4,$sremark,$udid,$que);
        redirect('Menu/DayStartCheck');
    }
    public function DayCloseCheck(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('2023-07-25');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $mdata = $this->Menu_model->get_BDdayclose($uid,$tdate);
        if(!empty($user)){
            $this->load->view($dep_name.'/DayCloseCheck',['uid'=>$uid,'user'=>$user,'mdata'=>$mdata,'tdate'=>$tdate]);
        }else{
            redirect('Menu/main');
        }
    }
    public function UserDayCheck(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('2023-07-25');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/UserDayCheck',['uid'=>$uid,'user'=>$user,'tdate'=>$tdate]);
        }else{
            redirect('Menu/main');
        }
    }
    public function Muser(){
        $id= $this->input->post('id');
        
        $result=$this->Menu_model->get_user_byid($id);
        echo json_encode($result);
    }
    public function manageuser(){
        $uid= $this->input->post('uid');
        $user_id= $this->input->post('user_id');
        $name= $this->input->post('name');
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        $email= $this->input->post('email');
        $phoneno= $this->input->post('phoneno');
        $active= $this->input->post('active');
        
        $id=$this->Menu_model->manage_user($user_id,$name,$username,$password,$email,$phoneno,$active);
        redirect('Menu/teamdetail');
    }
    public function ZipSchool($sid){
        
        $wgdata=$this->Menu_model->get_wgbysid($sid);
        $this->load->library('zip');
          foreach($wgdata as $w)
          {
              $fpath=$w->filepath;
              $this->zip->read_file($fpath);
          }
          $report=$this->Menu_model->get_reportsid($sid);
          foreach($report as $r)
          {
              $fpath=$r->filepath;
              $this->zip->read_file($fpath);
          }
        $this->zip->download(time().'.zip');
    }
    public function ProjectSchool(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $client=$this->Menu_model->get_handover();
        $this->load->view($dep_name.'/ProjectSchool', ['notify'=>$notify,'user'=>$user,'client'=>$client]);
    }
    public function Utilisationdetail(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Utilisationdetail', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function PurchaseItem(){
        $user = $this->session->userdata('user');
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $this->load->view('Purchase/purchase-item', ['user'=>$user,'notify'=>$notify]);
    }
    public function ZipProject($cid){
        
        $pcode=$this->Menu_model->get_clientbyid($cid);
        $pcode=$pcode[0]->projectcode;
        $wgdata=$this->Menu_model->get_wgbypcode($pcode);
        $this->load->library('zip');
          foreach($wgdata as $w)
          {
              $fpath=$w->filepath;
              $this->zip->read_file($fpath);
          }
        $report=$this->Menu_model->get_reportbypc($pcode);
          foreach($report as $r)
          {
              $fpath=$r->filepath;
              $this->zip->read_file($fpath);
          }
        $this->zip->download(time().'.zip');
    }
    public function ZipSchoolbydate($sid,$sd,$ed){
        
        $wgdata=$this->Menu_model->get_wgbysidbydt($sid,$sd,$ed);
        $this->load->library('zip');
          foreach($wgdata as $w)
          {
              $fpath=$w->filepath;
              $this->zip->read_file($fpath);
          }
        $report=$this->Menu_model->get_reportbyspdbydate($sid,$sd,$ed);
          foreach($report as $r)
          {
              $fpath=$r->filepath;
              $this->zip->read_file($fpath);
          }
        $visit1=$this->Menu_model->get_visit1byspdbydate($sid,$sd,$ed);
          foreach($visit1 as $r)
          {
              $fpath=$r->ans1;
              $this->zip->read_file($fpath);
          }
        $visit2=$this->Menu_model->get_visit2byspdbydate($sid,$sd,$ed);
          foreach($visit2 as $r)
          {
              $fpath=$r->ans2;
              $this->zip->read_file($fpath);
          }
        $this->zip->download(time().'.zip');
    }
    public function ptimeline(){
        $piid=$_POST['piid'];
        $projectcode=$_POST['projectcode'];
        $uid=$_POST['uid'];
        $bdid=$_POST['bdid'];
        $wmessage=$_POST['wmessage'];
        $communication=$_POST['communication'];
        $callsfu=$_POST['callsfu'];
        $reporttype=$_POST['reporttype'];
        $fttp=$_POST['fttp'];
        $rttp=$_POST['rttp'];
        $casestudy=$_POST['casestudy'];
        $maintenance=$_POST['maintenance'];
        $replacement=$_POST['replacement'];
        $diy=$_POST['diy'];
        $blmne=$_POST['blmne'];
        $elmne=$_POST['elmne'];
        $nsp=$_POST['nsp'];
        $utilisation=$_POST['utilisation'];
        $otherdvisit=$_POST['otherdvisit'];
        $otherdcall=$_POST['otherdcall'];
        $outbondc=$_POST['outbondc'];
        $bdreview=$_POST['bdreview'];
        $cengagement=$_POST['cengagement'];
        
        $this->Menu_model->program_timeline($piid,$projectcode,$uid,$bdid,$wmessage,$communication,$callsfu,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation,$otherdvisit,$otherdcall,$outbondc,$bdreview,$cengagement);
        redirect('Menu/ProgramTimeLine/');
    }
    public function stimeline(){
        $piid=$_POST['piid'];
        $sid=$_POST['sid'];
        $projectcode=$_POST['projectcode'];
        $uid=$_POST['uid'];
        $bdid=$_POST['bdid'];
        $wmessage=$_POST['wmessage'];
        $communication=$_POST['communication'];
        $callsfu=$_POST['callsfu'];
        $reporttype=$_POST['reporttype'];
        $fttp=$_POST['fttp'];
        $rttp=$_POST['rttp'];
        $casestudy=$_POST['casestudy'];
        $maintenance=$_POST['maintenance'];
        $replacement=$_POST['replacement'];
        $diy=$_POST['diy'];
        $blmne=$_POST['blmne'];
        $elmne=$_POST['elmne'];
        $nsp=$_POST['nsp'];
        $utilisation=$_POST['utilisation'];
        $otherdvisit=$_POST['otherdvisit'];
        $otherdcall=$_POST['otherdcall'];
        $outbondc=$_POST['outbondc'];
        $bdreview=$_POST['bdreview'];
        $cengagement=$_POST['cengagement'];
        $this->Menu_model->school_timeline($sid,$piid,$projectcode,$uid,$bdid,$wmessage,$communication,$callsfu,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation,$otherdvisit,$otherdcall,$outbondc,$bdreview,$cengagement);
        redirect('Menu/SchoolTimeLine/');
    }
    public function rtaskc(){
        $rid=$_POST['rid'];
        $adminuid=$_POST['adminuid'];
        $piuid=$_POST['piuid'];
        $nsp=$_POST['nsp'];
        $ntaction=$_POST['ntaction'];
        $ntdate=$_POST['ntdate'];
        $spdid=$_POST['spdid'];
        $remark=$_POST['remark'];
        $exsid=$_POST['exsid'];
        $exdate=$_POST['exdate'];
        
        $this->Menu_model->all_rremark($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$nsp);
        redirect('Menu/AllReviewPlaing/');
    }
    public function rtaskcpi(){
        $rid=$_POST['rid'];
        $adminuid=$_POST['adminuid'];
        $piuid=$_POST['piuid'];
        $ntaction=$_POST['ntaction'];
        $ntdate=$_POST['ntdate'];
        $spdid=$_POST['spdid'];
        $remark=$_POST['remark'];
        $exsid=$_POST['exsid'];
        $exdate=$_POST['exdate'];
        $ritype=$_POST['ritype'];
        if($ritype=='Program Self Review'){
            $pcategory=$_POST['pcategory'];
            $pcasestudy=$_POST['pcasestudy'];
            $preports=$_POST['preports'];
            $psell=$_POST['psell'];
            $paspirational=$_POST['paspirational'];
            $pwg=$_POST['pwg'];
            $pwga=$_POST['pwga'];
            
            $this->Menu_model->all_rremarkpip($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$pcategory,$pcasestudy,$preports,$psell,$paspirational,$pwg,$pwga);
            redirect('Menu/AllReviewPlaing/');
        }else{
            $awg = "";
            $categories=$_POST['categories'];
            $categreason=$_POST['categreason'];
            $relation=$_POST['relation'];
            $socialmedia=$_POST['socialmedia'];
            $nsp=$_POST['snsp'];
            $nspno=$_POST['nspno'];
            $summeractivity=$_POST['summeractivity'];
            $scno=$_POST['scno'];
            $support=$_POST['support'];
            $diy=$_POST['diy'];
            $opportunity=$_POST['opportunity'];
            $casestudy=$_POST['casestudy'];
            $utilizationtype=$_POST['utilizationtype'];
            $logsactivity=$_POST['logsactivity'];
            
            $this->Menu_model->all_rremarkpi($rid,$spdid,$piuid,$remark,$ntdate,$ntaction,$adminuid,$exsid,$exdate,$awg,$categories,$categreason,$relation,$socialmedia,$nsp,$nspno,$summeractivity,$scno,$support,$diy,$opportunity,$casestudy,$utilizationtype,$logsactivity);
            redirect('Menu/AllReviewPlaing/');
        }
    }
    public function VisitZipDownload($tid){
        
        $wgdata1=$this->Menu_model->get_visitmediatid1($tid);
        $wgdata2=$this->Menu_model->get_visitmediatid2($tid);
        $this->load->library('zip');
          foreach($wgdata1 as $w1)
          {
              $fpath=$w1->ans1;
              $this->zip->read_file($fpath);
          }
          foreach($wgdata2 as $w2)
          {
              $fpath=$w2->ans2;
              $this->zip->read_file($fpath);
          }
        $this->zip->download(time().'.zip');
    }
    public function ZipDownload($tid){
        
        $wgdata=$this->Menu_model->get_wgbytid($tid);
        $this->load->library('zip');
          foreach($wgdata as $w)
          {
              $fpath=$w->filepath;
              $this->zip->read_file($fpath);
          }
        $this->zip->download(time().'.zip');
    }
    public function AddSchoolDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $state=$this->Menu_model->get_state();
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/addschooldetail', ['user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'state'=>$state, 'status'=>$status,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function DayManagement(){
        date_default_timezone_set("Asia/Calcutta"); 
        $tdate          = date('Y-m-d');
        $user           = $this->session->userdata('user');
        $data['user']   = $user;
        $uid            = $user['id'];
        $id             = $user['dep_id'];
        $notify         = $this->Menu_model->get_notifybyid($uid);
        $dt             = $this->Menu_model->get_depatment_byid($id);
        $dep_name       = $dt[0]->dep_name;
        $mdata          = $this->Menu_model->get_daydetail($uid,$tdate);
        if($mdata)
        {
            $st = $mdata[0]->ustart;
            $ct = $mdata[0]->uclose;
            if($st!=''){$do=1;}
            if($ct!=''){$do=2;}
        }else{$do=0;}
        $data['uid']         = $uid;
        $data['user']        = $user;
        $data['mdata']       = $mdata;
        $data['uid']         = $uid;
        $data['do']          = $do;
        $userdfrom           = $this->Menu_model->userworkfrom();
        $yesterday           = date('Y-m-d', strtotime('-1 day', strtotime($tdate)));
        $isweekend           = isNotWeekend($yesterday);
        if(!$isweekend){
            $yesterday           = date('Y-m-d', strtotime('-2 day', strtotime($tdate)));
            $yestdata            = $this->Menu_model->get_Yestdaydetail($uid,$yesterday);
        }
        else{
            $yestdata            = $this->Menu_model->get_Yestdaydetail($uid,$yesterday);
        }
    //   $getDayCloseRequest = $this->Menu_model->GetDayCloseRequest($uid,$tdate);
        $yestdatacnt                        = sizeof($yestdata);
        $uystart_id                         = $yestdata[0]->id;
        $uystart                            = $yestdata[0]->ustart;
        $uyclose                            = $yestdata[0]->uclose;
        $data['userdfrom']                  = $userdfrom;
        $data['yestdatacnt']                = $yestdatacnt;
        $data['getDayCloseRequest']         = $this->Menu_model->GetDayCloseRequest($uid,$tdate);
        $data['getDayCloseRequescnt']       = sizeof($data['getDayCloseRequest']);
        $data['uystart']                    = $uystart;
        $data['uystart_id']                 = $uystart_id;

        if ($yestdatacnt == 1){ 
            $this->display($dep_name.'/close_day_page',$data);
        }
        else if(!empty($user)){
            $this->display($dep_name.'/DayManagement',$data);
        }
        else{
            redirect('Menu/main');
        }
    }

    public function AllReviewPlaing(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/AllReviewPlaing.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function CreateJoinCallHI(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/CreateJoinCallHI.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function SelseOTReview(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/SelseOTReview.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ProgramReview(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/ProgramReview.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PIAReview(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PIAReview.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function AllReviewac(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/AllReviewac.php',['uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ReviewReport(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
            $adid = $_POST['adid'];
            $piid = $_POST['piid'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $adid=0;
            $piid=0;
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_reviewr($adid,$piid,$sd,$ed);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/reviewreport.php',['mdata'=>$mdata,'uid'=>$uid,'user'=>$user,'sd'=>$sd,'ed'=>$ed,'sdate'=>$sdate,'edate'=>$edate]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ReviewDetailM($rid){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_reviewdetailm($rid);
        $rdata= $this->Menu_model->get_allreview($rid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/ReviewDetailM.php',['mdata'=>$mdata,'rdata'=>$rdata,'uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function SchoolReviewDetail(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_schoolreviewdetail();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/SchoolReviewDetail.php',['mdata'=>$mdata,'uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function CompetitionReport(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_competitionReport();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/competitionreport.php',['mdata'=>$mdata,'uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ProgramReviewDetail(){
        date_default_timezone_set("Asia/Calcutta");
        $tdate=date('Y-m-d H:i:s');
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata = $this->Menu_model->get_programreviewdetail();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/ProgramReviewDetail.php',['mdata'=>$mdata,'uid'=>$uid,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function getspdbypianst(){
        $stid = $this->input->post('stid');
        $piid = $this->input->post('piid');
        $fdate = $this->input->post('fdate');
        $rid = $this->input->post('rid');
        $rtype = $this->input->post('rtype');
        
        $cmp=$this->Menu_model->get_spdbybdnst($stid,$piid,$fdate,$rtype);
        $program=$this->Menu_model->get_programbybdnst($stid,$piid,$fdate,$rtype);
        if($rtype=='Program Self Review'){
            echo '<option value="0">Select Program</option>';
            foreach($program as $dt){
                $spdid = $dt->project_code;
                $data = $this->Menu_model->get_rdonespd($rid,$spdid);
                if(!$data){
                 echo  $data = '<option value='.$dt->project_code.'>'.$dt->project_code.'</option>';
                }
            }
        }else{
            echo '<option value="">Select School</option>';
            foreach($cmp as $dt){
                $spdid = $dt->id;
                $data = $this->Menu_model->get_rdonespd($rid,$spdid);
                if(!$data){
                 echo  $data = '<option value='.$dt->id.'>'.$dt->sname.'</option>';
                }
            }
        }
    }
    public function getppcode(){
        $piaid = $this->input->post('piaid');
        
        $cmp=$this->Menu_model->get_projectbypia($piaid);
        echo '<option value="">Select Project Code</option>';
        foreach($cmp as $dt){
            $pcode = $dt->project_code;
            $pcode=$this->Menu_model->get_approgram($piaid,$pcode);
            if(!$pcode){
                echo $data = '<option>'.$dt->project_code.'</option>';
            }
        }
    }
    public function getpalldata(){
        $pcode = $this->input->post('pcode');
        
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        $client = $this->Menu_model->get_clientbypc($pcode);
        $pdetail=$this->Menu_model->get_pdetail($pcode);
        $pid = $client[0]->id;
        $pyear = $client[0]->project_year;
        ?>
                 <div class="row text-center">
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>WelCome Message</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b><hr>
                             <b>No Data</b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Outbond Communication</b><hr>
                             Targer Count<br><b><?=$tt=15?></b>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page52','Call'); $cont = $tdata[0]->cont; $tt=($pdetail[0]->spd*10);?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <a href="<?=base_url();?>Menu/PWTaskList/<?=$pid?>/page52/Call/<?=$tt?>">
                             <b>Calls for Activation</b><hr>
                             Targer Count<br><b><?=$tt?></b><hr>
                             Achieved Count<br><b><?=$cont?></b></a>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page5','Visit'); $cont = $tdata[0]->cont;$tt=$pdetail[0]->spd*1;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>FTTP</b><hr>
                             <?php if($pyear=='2023-24'){?>
                                Not Requesred
                             <?php }else{ ?>
                                 Targer Count<br><b><?=$tt?></b><hr>
                                 Achieved Count<br><b><?=$cont?></b>
                             <?php } ?>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page31','Visit'); $cont = $tdata[0]->cont;$tt=$pdetail[0]->spd*1;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>RTTP</b><hr>
                             Targer Count<br><b><?=$tt?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Report</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page28','Visit'); $cont = $tdata[0]->cont;$tt=$pdetail[0]->spd*1;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>DIY</b><hr>
                             Targer Count<br><b><?=$tt?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'','Utilisation'); $cont = $tdata[0]->cont;$tt=$pdetail[0]->spd*10;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <a href="<?=base_url();?>Menu/PWTaskList/<?=$pid?>/page/Utilisation/<?=$tt?>">
                             <b>Utilisation</b><hr>
                             Targer Count<br><b><?=$tt?></b><hr>
                             Achieved Count<br><b><?=$cont?></b></a>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'','Utilisation'); $cont = $tdata[0]->cont;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Maintenance</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'','Utilisation'); $cont = $tdata[0]->cont;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Base Line M&E</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'','Utilisation'); $cont = $tdata[0]->cont;?>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>End Line M&E</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>CaseStudy</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>NSP</b><hr>
                             Targer Count<br><b><?=$pdetail[0]->spd*1?></b>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>RID</b><hr>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>BD Request</b><hr>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>PM Visit</b><hr>
                             Targer Count<br><b><?=round(($pdetail[0]->spd*1)*.10)?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>ZM Visit</b><hr>
                             Targer Count<br><b><?=round(($pdetail[0]->spd*1)*.10)?></b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Review with BD</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Client Engagement</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Holiday Activity</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>Webinar</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                             <b>BD Call</b><hr>
                             Achieved Count<br><b><?=$cont?></b>
                          </div>
                        </div>
                    </div>
    <?php }
    public function getpyear(){
        $pcode = $this->input->post('pcode');
        
        $program = $this->Menu_model->get_clientbypc($pcode);
        echo $program[0]->project_year;
    }
    public function getpdetail(){
        $pcode = $this->input->post('pcode');
        
        $pdetail=$this->Menu_model->get_myprogramdetail($pcode);
        $pre = $this->Menu_model->get_prorebypipro($pcode);
        $program = $this->Menu_model->get_clientbypc($pcode);
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        ?>
                    <div class="mt-3 text-center">
                      <h4><?=$program[0]->client_name?></h4>
                      <p class="text-secondary mb-1"><?=$pcode?></p>
                      <?php
                             $bdid = $program[0]->bd_id;
                             $bddata = $this->Menu_model->get_bdnamebyid($bdid);
                             $mdata= $this->Menu_model->get_Programbypcode($pcode);
                             $ptimeline= $this->Menu_model->get_programtimeline($pcode);
                             $cdate = date('Y-m-d H:i:s');
                      ?>
                      <p class="text-muted font-size-sm"><?=$program[0]->mediator?></p>
                      <p class="text-secondary mb-1"><?=$program[0]->location?></p>
                      <p class="text-muted font-size-sm"><?=$program[0]->city?></p>
                      <p class="text-muted font-size-sm"><?=$program[0]->state?></p>
                      <hr>BD Involve<br><b><?=$bddata[0]->name?></b><hr>
                    </div>
        <?php
        if($pre){
            $pcategory = $pre[0]->pcategory;
            $pcasestudy = $pre[0]->pcasestudy;
            $preports = $pre[0]->preports;
            $psell = $pre[0]->psell;
            $paspirational = $pre[0]->paspirational;
            $pwg = $pre[0]->pwg;
            $pwga  = $pre[0]->pwga;
        }else{
            $pwga = $pwg = $paspirational = $psell = $preports = $pcasestudy = $pcategory = "No Data";
        }
        echo "No of School : ".$pdetail[0]->nofs;
        echo '<br>';
        echo "District (".$pdetail[0]->cdistrict.") : ".$pdetail[0]->district;
        echo '<br>';
        echo "State (".$pdetail[0]->cstate.") : ".$pdetail[0]->state;
        echo '<br>';
        echo "PIA (".$pdetail[0]->cpia.") : ".$pdetail[0]->pia;
        echo '<br>';
        echo "Installation Person (".$pdetail[0]->cinsp.") : ".$pdetail[0]->insp;
        echo '<hr>';
        echo "Mandatory Program : ".$pcategory;
        echo '<br>';
        echo "Reports Requested : ".$preports;
        echo '<br>';
        echo "UpSell Opportunity : ".$psell;
        echo '<br>';
        echo "Aspirational : ". $paspirational;
        echo '<br>';
        echo "WhatsApp Group created : ".$pwg;
        echo '<br>';
        echo "Admin number Added : ".$pwga;
    }
    public function getSchoolList(){
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        echo '<div class="row">';
        $ai=1;
        $SchoolList=$this->Menu_model->get_getSchoolList($pcode,$piid);
        foreach($SchoolList as $SL){
            echo '<div class="card col-lg-3 col-sm p-3 text-center">';
            echo '<b>'.$SL->sname.'</b>';
            echo '<b>'.$SL->saddress.'</b>';
            echo '<b>'.$SL->scity.'</b>';
            echo '<b>'.$SL->sstate.'</b>';
            echo '<a target="_blank" href="SPDTASSIGN/'.$SL->id.'">Assign</a>';
            echo '</div>';
            $ai++;
        }
    }
    public function getThisWeekTask(){
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date('Y-m-d');
        $dayOfWeek = date('w', strtotime($currentDate));
        $sd = date('Y-m-d', strtotime("-$dayOfWeek days", strtotime($currentDate)));
        $ed = date('Y-m-d', strtotime("+".(6 - $dayOfWeek)." days", strtotime($currentDate)));
        ?>
        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Plan Time</th>
                    <th>Project Code</th>
                    <th>School Name</th>
                    <th>Task Type</th>
                    <th>Purpose</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;
                date_default_timezone_set("Asia/Kolkata");
                $nextdate = date('Y-m-d', strtotime('+1 day'));
                $nxtdtask=$this->Menu_model->get_nxtdtaskplan($piid,$sd,$ed);
                $nxtdreport=$this->Menu_model->get_nxtdreportplan($piid,$sd,$ed);
                $nxtdsummer=$this->Menu_model->get_nxtdsummerplan($piid,$sd,$ed);
                $nxtdcuriculum=$this->Menu_model->get_nxtdcuriculumplan($piid,$sd,$ed);
                $nxtdreview=$this->Menu_model->get_nxtdreviewplan($piid,$sd,$ed);
                foreach($nxtdtask as $md){
                    $startt = $md->plandate;
                    $startt = date('d-m-Y  h:i A', strtotime($startt));
                ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$md->fullname?></td>
                <td><?=$startt?></td>
                <td><?=$md->project_code?></td>
                <td><?=$md->sname?></td>
                <td><?=$md->task_type?></td>
                <td><?=$md->taskname?></td>
            </tr>
            <?php $i++;} ?>
            <?php foreach($nxtdreport as $md){
                    $startt = $md->plan;
                    $startt = date('d-m-Y  h:i A', strtotime($startt));?>
            <tr>
                <td><?=$i?></td>
                <td><?=$md->fullname?></td>
                <td><?=$startt?></td>
                <td></td>
                <td></td>
                <td>Report Writing</td>
                <td><?=$md->tasktype?></td>
            </tr>
            <?php $i++;} ?>
            <?php foreach($nxtdsummer as $md){
                    $startt = $md->plandt;
                    $startt = date('d-m-Y  h:i A', strtotime($startt));?>
            <tr>
                <td><?=$i?></td>
                <td><?=$md->fullname?></td>
                <td><?=$startt?></td>
                <td></td>
                <td></td>
                <td>Summer Activity</td>
                <td><?=$md->task_type?></td>
            </tr>
            <?php $i++;} ?>
            <?php foreach($nxtdcuriculum as $md){
                    $startt = $md->sdatet;
                    $startt = date('d-m-Y  h:i A', strtotime($startt));?>
            <tr>
                <td><?=$i?></td>
                <td><?=$md->fullname?></td>
                <td><?=$startt?></td>
                <td></td>
                <td></td>
                <td>Curiculum Activity</td>
                <td><?=$md->standard?></td>
            </tr>
            <?php $i++;} ?>
            <?php foreach($nxtdreview as $md){
                    $startt = $md->plant;
                    $startt = date('d-m-Y  h:i A', strtotime($startt));?>
            <tr>
                <td><?=$i?></td>
                <td><?=$md->fullname?></td>
                <td><?=$startt?></td>
                <td></td>
                <td></td>
                <td>Review</td>
                <td><?=$md->reviewtype?></td>
            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
    <?php  }
    public function SPDTASSIGN($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $spd = $this->Menu_model->get_spdbyid($sid);
        $this->load->view($dep_name.'/SPDTASSIGN', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
    }
    public function getAcademicCalendar(){
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','4');
        if($myac){
        echo '<div><hr><b>April</b><br>';
        foreach($myac as $ac){
        echo $ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','5');
        if($myac){
        echo '<div><hr><b>May</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','6');
        if($myac){
        echo '<div><hr><b>June</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','7');
        if($myac){
        echo '<div><hr><b>July</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','8');
        if($myac){
        echo '<div><hr><b>August</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','9');
        if($myac){
        echo '<div><hr><b>September</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','10');
        if($myac){
        echo '<div><hr><b>October</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','11');
        if($myac){
        echo '<div><hr><b>November</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2023','12');
        if($myac){
        echo '<div><hr><b>December</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2024','1');
        if($myac){
        echo '<div><hr><b>January</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2024','2');
        if($myac){
        echo '<div><hr><b>February</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
        $myac=$this->Menu_model->get_accalendarbyYM($piid,'2024','3');
        if($myac){
        echo '<div><hr><b>March</b><br>';
        foreach($myac as $ac){
        echo '<p>'.$ac->fdate.' to '.$ac->todate.' ('.$ac->type.') ('.$ac->remark.')</p>';
        }
        echo '<hr></div>';
        }
    }
    public function getspdbybdnst(){
        $stid = $this->input->post('stid');
        $piid = $this->input->post('piid');
        $fdate = $this->input->post('fdate');
        $rid = $this->input->post('rid');
        
        $cmp=$this->Menu_model->get_spdbybdnst($stid,$piid,$fdate);
        echo '<option value="">Select School</option>';
        foreach($cmp as $dt){
            $spdid = $dt->id;
            $data = $this->Menu_model->get_rdonespd($rid,$spdid);
            if(!$data){
             echo  $data = '<option value='.$dt->id.'>'.$dt->sname.'</option>';
            }
        }
    }
    public function getProgramReview(){
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        $mdata = $this->Menu_model->get_prorebypipro($piid,$pcode);
        $i=1;
        foreach($mdata as $md){?>
            <tr>
            <td><?=$i?></td>
            <td><?=$md->sname?><?=$md->projectcode?></td>
            <td><?=$md->pcategory?></td>
            <td><?=$md->pcasestudy?></td>
            <td><?=$md->preports?></td>
            <td><?=$md->psell?></td>
            <td><?=$md->paspirational?></td>
            <td><?=$md->pwg?></td>
            <td><?=$md->pwga?></td>
            </tr>
        <?php
        }
    }
    public function TodayTaskPlan(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/TodayTaskPlan', ['notify'=>$notify,'user'=>$user]);
    }
    public function ParticalBPApr(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ParticalBPApr', ['notify'=>$notify,'user'=>$user]);
    }
    public function PaymentApr(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/PaymentApr', ['notify'=>$notify,'user'=>$user]);
    }
    public function vendordone($pid,$vid){
        
        $this->Menu_model->vendor_done($pid,$vid);
        redirect('Menu/ParticalBPApr');
    }
    public function processpay($purreq_id){
        
        $this->Menu_model->process_pay($purreq_id);
        redirect('Menu/PaymentApr');
    }
    public function getallpendingtask(){
        $piid = $this->input->post('piaid');
        
        $sd = date('Y-m-d');
        $ed = "2024-03-31";
        $nxtdtask=$this->Menu_model->get_nxtdtaskplan($piid,$sd,$ed);
        $nxtdreport=$this->Menu_model->get_nxtdreportplan($piid,$sd,$ed);
        $nxtdsummer=$this->Menu_model->get_nxtdsummerplan($piid,$sd,$ed);
        $nxtdcuriculum=$this->Menu_model->get_nxtdcuriculumplan($piid,$sd,$ed);
        $nxtdreview=$this->Menu_model->get_nxtdreviewplan($piid,$sd,$ed);
        foreach($nxtdtask as $md){
            $startt = $md->plandate;
            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$md->fullname?></td>
                    <td><?=$startt?></td>
                    <td><?=$md->project_code?></td>
                    <td><?=$md->sname?></td>
                    <td><?=$md->task_type?></td>
                    <td><?=$md->taskname?></td>
                </tr>
                <?php $i++;} ?>
                <?php foreach($nxtdreport as $md){
                        $startt = $md->plan;
                        $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$md->fullname?></td>
                    <td><?=$startt?></td>
                    <td></td>
                    <td></td>
                    <td>Report Writing</td>
                    <td><?=$md->tasktype?></td>
                </tr>
                <?php $i++;} ?>
                <?php foreach($nxtdsummer as $md){
                        $startt = $md->plandt;
                        $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$md->fullname?></td>
                    <td><?=$startt?></td>
                    <td></td>
                    <td></td>
                    <td>Summer Activity</td>
                    <td><?=$md->task_type?></td>
                </tr>
                <?php $i++;} ?>
                <?php foreach($nxtdcuriculum as $md){
                        $startt = $md->sdatet;
                        $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$md->fullname?></td>
                    <td><?=$startt?></td>
                    <td></td>
                    <td></td>
                    <td>Curiculum Activity</td>
                    <td><?=$md->standard?></td>
                </tr>
                <?php $i++;} ?>
                <?php foreach($nxtdreview as $md){
                        $startt = $md->plant;
                        $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$md->fullname?></td>
                    <td><?=$startt?></td>
                    <td></td>
                    <td></td>
                    <td>Review</td>
                    <td><?=$md->reviewtype?></td>
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
        <?php
    }
    public function getProgramTaskSummary(){
        $i=1;
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        $spd = $this->Menu_model->get_spdbypcbypi($pcode,$piid);
        foreach($spd as $spd){
            $insr=0;$fttpr=0;$montr=0;$mner=0;$diyr=0;$rttpr=0;$mainr=0;$annr=0;$uti=0;
            $sid = $spd->id;
             $slog=$this->Menu_model->get_schoollogs($sid);
                foreach($slog as $sl){
                    if($sl->task_type=='Utilisation'){$uti++;}
                }
            $type = 'Upload Installation Report';
            $ins = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($ins)>0){$insr++;}
            $type = 'Upload FTTP Report';
            $fttp = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($fttp)>0){$fttpr++;}
            $type = 'Annual';
            $ann = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($ann)>0){$annr++;}
            $type = 'Upload Maintenance Report';
            $main = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($main)>0){$mainr++;}
            $type = 'Upload RTTP Report';
            $rttp = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($rttp)>0){$rttpr++;}
            $type = 'Upload DIY Repor';
            $diy = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($diy)>0){$diyr++;}
            $type = 'Upload M&E Report';
            $mne = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($mne)>0){$mner++;}
            $type = 'Monthly';
            $mont = $this->Menu_model->get_reportbysid($sid,$type);
            if(sizeof($mont)>0){$montr++;}
            $pi = $spd->pi_id;
            $pi = $this->Menu_model->get_user_byid($pi);
            $zh = $spd->zh_id;
            $zh = $this->Menu_model->get_user_byid($zh);
        ?>
        <tr>
            <td><?=$i++?></td>
            <td><a href="school_detail/<?=$spd->id?>" target="_blank"><?=$spd->sname?></a></td>
            <td>Vikash Panchal</td>
            <td><?=$pi[0]->fullname?></td>
            <td><?=$zh[0]->fullname?></td>
            <td><?=$spd->saddress?></td>
            <td><?=$spd->scity?></td>
            <td><?=$spd->sstate?></td>
            <td><?=$insr?></td>
            <td><?=$fttpr?></td>
            <td><?=$uti?></td>
            <td><?=$mainr?></td>
            <td><?=$rttpr?></td>
            <td><?=$mner?></td>
            <td><?=$diyr?></td>
            <td><?=$montr?></td>
            <td><?=$annr?></td>
        </tr>
    <?php } }
    public function getProgramTask(){
        $i=1;
        $pcode = $this->input->post('pcode');
        $piid = $this->input->post('piaid');
        
        $slog=$this->Menu_model->get_taskbypcodebypi($pcode,$piid);
          foreach ($slog as $sl){
              $sid = $sl->sid;
              $tid = $sl->tassignd;
              $plan=$this->Menu_model->get_plantaskbytid($tid);
              $uid = $sl->to_user;
              $user=$this->Menu_model->get_user_byid($uid);
              $report=$this->Menu_model->get_reportbystid($tid,$sid);
              $fuser = $sl->from_user;
              $fuser=$this->Menu_model->get_user_byid($fuser);?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$fuser[0]->fullname?></td>
            <td><?=$user[0]->fullname?></td>
            <td><?=$sl->tassignd?></td>
            <td><?=$sl->plandate?></td>
            <td><?=$this->Menu_model->timediff($sl->tassignd,$sl->plandate)?></td>
            <td><?=$sl->initiateddt?></td>
            <td><?=$this->Menu_model->timediff($sl->plandate,$sl->initiateddt)?></td>
            <td><?=$sl->donet?></td>
            <td><?=$this->Menu_model->timediff($sl->tassignd,$sl->donet)?></td>
            <td><?=$pcode?></td>
            <td><?=$sl->sname?></td>
            <td><?=$sl->task_type?></td>
            <td><?=$sl->task_subtype?></td>
            <td><?=$user[0]->fullname?></td>
            <td><?=$sl->remark?></td>
            <td><?php if($sl->checklist!=''){?><a href="../DownloadChecklist/<?=$sid?>/<?=$tid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
            <td><?php if($sl->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
            <td><?php if($sl->task_type=='Report'){?><a href="<?=base_url();?><?=$sl->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
            </td>
        </tr>
    <?php } }
    public function getactionlogs(){
        $date = date('Y-m-d');
        $actionid = $this->input->post('actionid');
        $fdate = $this->input->post('fdate');
        $piid = $this->input->post('piid');
        
        $mdata = $this->Menu_model->get_taskdata($piid,$fdate,$date,$actionid);
        $i=1;
        foreach($mdata as $d){?>
            <tr>
            <td><?=$i?></td>
            <td><?=$d->assign?></td>
            <td><?=$d->plandate?></td>
            <td><?=$d->initiateddt?></td>
            <td><?=$d->donet?></td>
            <td><?=$d->pia?></td>
            <td><?=$d->project_code?></td>
            <td><?=$d->clientname?></td>
            <td><a href="<?=base_url();?>Menu/school_detail/<?=$d->sid?>"><?=$d->sname?></br><?=$d->scity?>,<?=$d->sstate?></a></td>
            <td><?=$d->action?></td>
            <td><?=$d->stt?></td>
            <td><?=$d->remark?></td>
            </tr>
        <?php
        }
    }
    public function getspdlog(){
        $spdid = $this->input->post('spdid');
        $fdate = $this->input->post('fdate');
        
        $spd=$this->Menu_model->get_spdlog($spdid);
        echo '<h5><b><a target="_blank" href=school_detail/'.$spd[0]->spdid.'>'.$spd[0]->sname.'</a></b></h5>';
        echo '<lable><b>Current Status: '.$spd[0]->csstatus.'</b></lable><hr>';
        echo '<h5><b><a target="_blank" href="'.$spd[0]->wanamelink.'">'.$spd[0]->waname.'</a></b></h5>';
        echo '<input type="hidden" id="ntstatus" name="ntstatus" value='.$spd[0]->sid.'>';
        echo '<input type="hidden" name="spdid" value='.$spdid.'>';
        $spdtd=$this->Menu_model->get_spdtd($spdid,$fdate);
        $spdutd=$this->Menu_model->get_spdutd($spdid,$fdate);
        if($spdtd[0]->ab>0){echo '<lable><b>Total Task: '.$spdtd[0]->ab.'</b></lable></br>';}
        if($spdtd[0]->a>0){echo '<lable><b>Call: '.$spdtd[0]->a.'</b></lable></br>';}
        if($spdtd[0]->b>0){echo '<lable><b>Visit: '.$spdtd[0]->b.'</b></lable></br>';}
        if($spdtd[0]->c>0){echo '<lable><b>Utilisation: '.$spdtd[0]->c.'</b></lable></br>';}
        if($spdtd[0]->d>0){echo '<lable><b>Communication: '.$spdtd[0]->d.'</b></lable></br>';}
        if($spdtd[0]->e>0){echo '<lable><b>CaseStudy: '.$spdtd[0]->e.'</b></lable></br>';}
        if($spdtd[0]->f>0){echo '<lable><b>Report: '.$spdtd[0]->f.'</b></lable></br>';}
        if($spdtd[0]->r>0){echo '<lable><b>Action No: '.$spdtd[0]->r.'</b></lable></br>';}
        if($spdtd[0]->s>0){echo '<lable><b>Action Yes with Purpose No: '.$spdtd[0]->s.'</b></lable></br>';}
        if($spdtd[0]->t>0){echo '<lable><b>Action Yes with Purpose Yes: '.$spdtd[0]->t.'</b></lable></br>';}
        echo '<hr>';
        if($spdtd[0]->b==0 && $spdtd[0]->c==0){
            echo '<textarea class="form-control" name="mscstatus" placeholder="MSC status (operational and non operational) If non- operational, what is the exact issues (it will be subjective)"  required=""></textarea>';
        }
        foreach ($spdutd as $sutd){
            $uuid = $sutd->uuid;
            $uuid = $this->Menu_model->get_user_byid($uuid);
            $unuid = $uuid[0]->id;
            echo '<lable><b>Total Task by '.$uuid[0]->fullname.': '.$sutd->cont.'</b></lable></br>';
            $spdtdbyu=$this->Menu_model->get_spdtdbyu($spdid,$fdate,$unuid);
            if($spdtdbyu[0]->a>0){echo '<lable><b>Call by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->a.'</b></lable></br>';}
            if($spdtdbyu[0]->b>0){echo '<lable><b>Visit by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->b.'</b></lable></br>';}
            if($spdtdbyu[0]->c>0){echo '<lable><b>Utilisation by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->c.'</b></lable></br>';}
            if($spdtdbyu[0]->d>0){echo '<lable><b>Communication by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->d.'</b></lable></br>';}
            if($spdtdbyu[0]->e>0){echo '<lable><b>CaseStudy by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->e.'</b></lable></br>';}
            if($spdtdbyu[0]->f>0){echo '<lable><b>Report by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->f.'</b></lable></br>';}
            if($spdtdbyu[0]->r>0){echo '<lable><b>Action No by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->r.'</b></lable></br>';}
            if($spdtdbyu[0]->s>0){echo '<lable><b>Action Yes with Purpose No by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->s.'</b></lable></br>';}
            if($spdtdbyu[0]->t>0){echo '<lable><b>Action Yes with Purpose Yes by '.$uuid[0]->fullname.': '.$spdtdbyu[0]->t.'</b></lable></br>';}
            echo '<hr>';
        }
        $visitd=$this->Menu_model->get_visitd($spdid,$fdate);
        if($visitd[0]->ins>0){echo '<lable><b>Installation: '.$visitd[0]->ins.'</b></lable></br>';}
        if($visitd[0]->fttp>0){echo '<lable><b>FTTP: '.$visitd[0]->fttp.'</b></lable></br>';}
        if($visitd[0]->rttp>0){echo '<lable><b>RTTP: '.$visitd[0]->rttp.'</b></lable></br>';}
        if($visitd[0]->diy>0){echo '<lable><b>DIY: '.$visitd[0]->diy.'</b></lable></br>';}
        if($visitd[0]->mne>0){echo '<lable><b>MnE: '.$visitd[0]->mne.'</b></lable></br>';}
        if($visitd[0]->miant>0){echo '<lable><b>Maintenance: '.$visitd[0]->miant.'</b></lable></br>';}
    }
    public function getspdlogs(){
        $spdid = $this->input->post('spdid');
        $fdate = $this->input->post('fdate');
        
        $slog=$this->Menu_model->get_schoollogs($spdid,$fdate);
        $i=1;
        foreach($slog as $sl){
          $sid = $sl->sid;
          $tid = $sl->taskid;
          $status = $sl->status;
          $plan=$this->Menu_model->get_plantaskbytid($tid);
          $task=$this->Menu_model->get_taskassign_byid($tid);
          $nstatus=$this->Menu_model->get_snextststus($status);
          $uid = $task[0]->to_user;
          $user=$this->Menu_model->get_user_byid($uid);
          $report=$this->Menu_model->get_reportbystid($tid,$sid);
             echo '<tr>';
             echo '<td>'.$i.'</td>';
             echo '<td>'.$plan[0]->sdatet.'</td>';
             echo '<td>'.$plan[0]->donet.'</td>';
             echo '<td>'.$sname.'</td>';
             echo '<td>'.$sl->task_type.'</td>';
             echo '<td>'.$task[0]->task_subtype.'</td>';
             echo '<td>'.$user[0]->fullname.'</td>';
             echo '<td>'.$plan[0]->actiontaken.'</td>';
             echo '<td>'.$plan[0]->purpose.'</td>';
             echo '<td>'.$sl->remark.'</td>';?>
             <td><?php if($task[0]->checklist!=''){?><a target="_blank" href="DownloadChecklist?sid=<?=$sid?>">View<i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
             <td><?php if($task[0]->task_type=='Utilisation'){?><a href="ZipDownload/<?=$tid?>">Download</a><?php }?></td>
             <td><?php if($task[0]->task_type=='Report'){?><a target="_blank" href="<?=base_url();?><?=$report[0]->filepath?>">Read<i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
          <?php
            echo '<tr>';
        }
    }
    public function getreqreqdetail(){
        $reqid = $this->input->post('reqid');
        
        $req=$this->Menu_model->get_bdrbyid($reqid);
        echo '<p> BD Name : '.$req[0]->bd_name.'</p>';
        echo '<p> Compant Name : '.$req[0]->cname.' '.$req[0]->cpname.'</p>';
        echo '<p> Request Date : '.$req[0]->sdatet.'</p>';
        echo '<p> Target Date : '.$req[0]->targetd.'</p>';
        echo '<p> Request Type : '.$req[0]->request_type.'</p>';
        echo '<p> Remark : '.$req[0]->remark.'</p>';
        echo '<p> PIA Assign : '.$req[0]->pia.'</p>';
    }
    public function getreqlogs(){
        $olddate = "";
        $reqid = $this->input->post('reqid');
        
        $rlogs=$this->Menu_model->get_bdrequestlog($reqid);
        $attech=$this->Menu_model->get_bdrequestattech($reqid);
        $i=1;
        foreach($rlogs as $rl){
         if($olddate==''){$olddate=$rl->sdatet;}
         $newddate = $rl->sdatet;
         $timed = $this->Menu_model->timediff($newddate, $olddate);
             echo '<tr>';
             echo '<td>'.$i.'</td>';
             echo '<td>'.$rl->tby.'</td>';
             echo '<td>'.$rl->sdatet.'</td>';
             echo '<td>'.$olddate.'</td>';
             echo '<td>'.$timed.'</td>';
             echo '<td>'.$rl->detail.'</td>';
             echo '<tr>';
        }
    }
    public function piaplanreview(){
        $plandate = $_POST['plandate'];
        $uid = $_POST['uid'];
        $piid = $_POST['piid'];
        $fixdate = $_POST['fixdate'];
        $reviewtype = $_POST['reviewtype'];
        $meetlink = $_POST['meetlink'];
        
        $this->Menu_model->piaplan_review($plandate,$uid,$piid,$reviewtype,$meetlink,$fixdate);
        redirect('Menu/PIAReview');
    }
    public function phtimeline(){
        $pcode = $_POST['pcode'];
        $dud = $_POST['dud'];
        $dad = $_POST['dad'];
        $pd = $_POST['pd'];
        $pbpd = $_POST['pbpd'];
        $pad = $_POST['pad'];
        $disd = $_POST['disd'];
        $insd = $_POST['insd'];
        $insrd = $_POST['insrd'];
        $rrd = $_POST['rrd'];
        $remark = $_POST['remark'];
        
        $this->Menu_model->ph_timeline($pcode,$dud,$dad,$pd,$pbpd,$pad,$disd,$insd,$insrd,$rrd,$remark);
        redirect('Menu/CreateJoinCallHI');
    }
    public function planreview(){
        $plandate = $_POST['plandate'];
        $uid = $_POST['uid'];
        $piid = $_POST['piid'];
        $fixdate = $_POST['fixdate'];
        $reviewtype = $_POST['reviewtype'];
        $meetlink = $_POST['meetlink'];
        
        $this->Menu_model->plan_review($plandate,$uid,$piid,$reviewtype,$meetlink,$fixdate);
        redirect('Menu/AllReviewPlaing');
    }
    public function planjoincall(){
        $plandate = $_POST['plandate'];
        $uid = $_POST['uid'];
        $pcode = $_POST['pcode'];
        $meetlink = $_POST['meetlink'];
        
        $this->Menu_model->plan_joincall($plandate,$uid,$pcode,$meetlink);
        redirect('Menu/CreateJoinCallHI');
    }
    public function piastartreview(){
        $startt = $_POST['startt'];
        $reviewid = $_POST['reviewid'];
        
        $this->Menu_model->piastart_review($startt,$reviewid);
        redirect('Menu/PIAReview');
    }
    public function startreview(){
        $startt = $_POST['startt'];
        $reviewid = $_POST['reviewid'];
        
        $this->Menu_model->start_review($startt,$reviewid);
        redirect('Menu/AllReviewPlaing');
    }
    public function startjoincall(){
        $startt = $_POST['startt'];
        $reviewid = $_POST['reviewid'];
        
        $this->Menu_model->start_joincall($startt,$reviewid);
        redirect('Menu/CreateJoinCallHI');
    }
    public function daysc(){
        $do                             = $_POST['do'];
        if(isset($_POST['wffo'])){$wffo = $_POST['wffo'];}else{$wffo='1';}

        $user_id        = $_POST['user_id'];
        $lat            = $_POST['lat'];
        $lng            = $_POST['lng'];
        $filname        = $_FILES['filname']['name'];
       
        $subfoldername  = 'day_'.date("Y-m-d");
        $uploadPath     = 'uploads/day/';
        $flink          = $this->Menu_model->uploadfile($filname, $uploadPath);
        $this->Menu_model->submit_day($wffo,$flink,$user_id,$lat,$lng,$do); 
        redirect('Menu/Dashboard');
    }
    public function YesterdayDayClose(){
        $user_id    = $_POST['user_id'];
        $lat        = $_POST['lat'];
        $lng        = $_POST['lng'];
        $req_id     = $_POST['req_id'];
      
        $filname    = $_FILES['filname']['name'];
        $uploadPath = 'uploads/day/';
        $this->load->library('session');
        $this->load->model('Menu_model');
        $flink      = $this->Menu_model->uploadfile($filname, $uploadPath);
        $this->Menu_model->UpdateCloseYesterDay($flink,$user_id,$lat,$lng,$req_id);
        $this->session->set_flashdata('success_message','*You have closed the previous day successfully, Start You Day Now.');
        redirect('Menu/DayManagement');
    }
    public function addresorce(){
        $title= $this->input->post('title');
        $sts= $this->input->post('sts');
        $tof= $this->input->post('tof');
        $creatives= $this->input->post('creatives');
        $vlink= $this->input->post('vlink');
        
        $resource=$this->Menu_model->add_resource($title,$sts,$tof,$creatives,$vlink);
        redirect('Menu/UploadResource');
    }

    public function ResourceDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $rec=$this->Menu_model->get_resource();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/ResourceDetail', ['notify'=>$notify,'rec'=>$rec,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PrimaryContact($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spdc=$this->Menu_model->get_school_contact($sid);
        $spd=$this->Menu_model->get_spdbyid($sid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/primarycontact', ['notify'=>$notify,'spd'=>$spd,'spdc'=>$spdc, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function setpcontact(){
        $sid= $this->input->post('sid');
        $uid= $this->input->post('uid');
        $set= $this->input->post('set');
        
        $resource=$this->Menu_model->set_pcontact($sid,$set,$uid);
        redirect('Menu/school_detail/'.$sid);
    }
    public function taskrequest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $state=$this->Menu_model->get_state();
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/addschooldetail', ['user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'state'=>$state, 'status'=>$status,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function editSPD($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $state=$this->Menu_model->get_state();
        $status=$this->Menu_model->get_status();
        $oldspd=$this->Menu_model->get_spdbyid($sid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/editschooldetail', ['user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'state'=>$state, 'status'=>$status,'os'=>$oldspd,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function AddOldClient(){
        $cid = $_GET['id'];
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_clientbyid($cid);
        $state=$this->Menu_model->get_state();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/addoldclient', ['notify'=>$notify,'user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'state'=>$state]);
    }
    public function profileedit(){
        $msg = '';
        $id= $this->input->post('id');
        $oldpass= $this->input->post('oldpass');
        $newpass= $this->input->post('newpass');
        $phoneno= $this->input->post('phoneno');
        $email= $this->input->post('email');
        
        $mid = $this->Menu_model->profile_edit($id,$oldpass,$newpass,$phoneno,$email);
        if($mid==''){
           $msg =  'You Entered Wrong Password';
        }else{
            $msg =  'Password Change Successfully';
        }
        $this->session->unset_userdata('user');
        
        $dep=$this->Menu_model->get_depatment();
        $this->load->view('index', ['dep'=>$dep,'msg'=>$msg]);
    }
    public function editProfile(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $spd=$this->Menu_model->get_spd();
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/editprofile', ['notify'=>$notify,'user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'spd'=>$spd, 'status'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function AddReport(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $spd=$this->Menu_model->get_spd();
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/addreport', ['notify'=>$notify,'user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'spd'=>$spd, 'status'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function RepairReport(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_repairpc();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/RepairReport', ['notify'=>$notify,'user'=>$user, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function TransitAssign(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/TransitAssign', ['notify'=>$notify,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function MaintenanceReport(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_reppc();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/maintenance-report', ['notify'=>$notify,'user'=>$user, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function RIDPending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_RIDPending();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/RIDPending', ['notify'=>$notify,'user'=>$user, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PendingRRReqest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_reppc();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PendingRRReqest', ['notify'=>$notify,'user'=>$user, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function insmschoolwise($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_repschoolwise($pid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/insmschoolwise', ['notify'=>$notify,'user'=>$user, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function insmmodelwise($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_repmodelwise($sid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/insmmodelwise', ['notify'=>$notify,'user'=>$user,'sid'=>$sid, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function InstallationNotDone(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reppc=$this->Menu_model->get_InstallationNotDone($sid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/InstallationNotDone', ['notify'=>$notify,'user'=>$user,'sid'=>$sid, 'reppc'=>$reppc]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ReplacementDetail($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $pcid = $this->Menu_model->get_clientbyid($cid);
        $pcode = $pcid[0]->projectcode;
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $sm=$this->Menu_model->get_repsm($pcode);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/replacement-detail', ['notify'=>$notify,'user'=>$user, 'sm'=>$sm]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ReplacementModel($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $sm=$this->Menu_model->get_repspdm($sid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/replacement-model', ['notify'=>$notify,'user'=>$user, 'sm'=>$sm]);
        }else{
            redirect('Menu/main');
        }
    }
    public function repsendtofm($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $pcid = $this->Menu_model->get_clientbyid($cid);
        $pcode = $pcid[0]->projectcode;
        $dt=$this->Menu_model->get_user();
        $sm=$this->Menu_model->get_reptofm($pcode);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        redirect('Menu/MaintenanceReport');
    }
    public function repairfmbag($rrid){
        
        $this->Menu_model->repair_fmbag($rrid);
        redirect('Menu/repaircheck');
    }
    public function rrClosed($rrid){
        
        $this->Menu_model->rr_Closed($rrid);
        redirect('Menu/repaircheck');
    }
    public function sendtofactory($rrid){
        
        $this->Menu_model->send_tofactory($rrid);
        redirect('Menu/repaircheck');
    }
    public function rrrchenge(){
        $rrid= $this->input->post('rrid');
        $type= $this->input->post('type');
        $pmname= $this->input->post('pmname');
        $remark= $this->input->post('remark');
        
        $this->Menu_model->rrr_chenge($rrid,$type,$pmname,$remark);
        redirect('Menu/repaircheck');
    }
    public function AddUtilisation(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_user();
        $reg=$this->Menu_model->get_region();
        $procode=$this->Menu_model->get_handover();
        $spd=$this->Menu_model->get_spd();
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/addutilisation', ['notify'=>$notify,'user'=>$user,'data'=>$dt, 'reg'=>$reg, 'procode'=>$procode, 'spd'=>$spd, 'status'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function add_users(){
        $this->load->view('add_user');
    }
    public function depatment(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt['dep_name'];
    }
    public function OtherTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        if(!empty($user)){
        $this->load->view('Partnership/OtherTask', $data);
        }
        else{
            redirect('Menu/main');
        }
    }
    public function AssignTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
        $this->load->view($dep_name.'/assigntask', $data);
        }
        else{
            redirect('Menu/main');
        }
    }
    public function main(){
        $msg = '';
        
        $dep=$this->Menu_model->get_depatment();
        $this->load->view('index', ['dep'=>$dep,'msg'=>$msg]);
    }
    public function ForgotPassword(){
        $msg = '';
        
        $dep=$this->Menu_model->get_depatment();
        $this->load->view('ForgotPassword', ['dep'=>$dep,'msg'=>$msg]);
    }
    public function srcmail(){
        $email= $this->input->post('email');
        
        $udata=$this->Menu_model->get_userbyemail($email);
        if($udata){
        $udata[0]->user_name;
        $udata[0]->password;
        echo 'Check you Email';
        }
        else{echo 'Not Ragisterd Mail ID';}
    }
    public function search_school(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspd();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/searchschool', ['notify'=>$notify,'data'=>$spd,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PIAREPORTCARD(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PIAREPORTCARD', ['notify'=>$notify,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PIAwiseProgram(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $piap=$this->Menu_model->get_piaprogram();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PIAwiseProgram', ['notify'=>$notify,'piap'=>$piap,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function PIAwiseSchoolDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pispdlist=$this->Menu_model->get_pischoollist();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/PIAwiseSchoolDetail', ['notify'=>$notify,'pispdlist'=>$pispdlist,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function piaprogram($piid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $piap=$this->Menu_model->get_piaprogrambypiid($piid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/piaprogram', ['notify'=>$notify,'piap'=>$piap,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function piaschoolpc($pcode,$piid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $pischoolpc=$this->Menu_model->get_spdbypipc($pcode,$piid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/piaschoolpc', ['notify'=>$notify,'pischoolpc'=>$pischoolpc,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function pischool($pi,$status){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspdpi($pi,$status);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/searchschool', ['notify'=>$notify,'spd'=>$spd,'user'=>$user,'pim'=>$pi,'sts'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function zhschool($zh,$status){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspdzh($zh,$status);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/zhschool', ['notify'=>$notify,'spd'=>$spd,'user'=>$user,'zh'=>$zh,'sts'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function pmschool($zh,$status){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspdpm($zh,$status);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/pmschool', ['notify'=>$notify,'spd'=>$spd,'user'=>$user,'zh'=>$zh,'sts'=>$status]);
        }else{
            redirect('Menu/main');
        }
    }
    public function testtask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_testcode();
        $program=$this->Menu_model->get_handover();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/testtask', ['notify'=>$notify,'spd'=>$spd,'user'=>$user,'program'=>$program]);
        }else{
            redirect('Menu/main');
        }
    }
    public function School($status){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspdbbyststus($status);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/school', ['notify'=>$notify,'spd'=>$spd,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function maintenanceBag(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $umbag=$this->Menu_model->get_umbag($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/maintenancebag', ['notify'=>$notify,'user'=>$user,'umbag'=>$umbag]);
        }else{
            redirect('Menu/main');
        }
    }
    public function NextDayPlanner(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $umbag=$this->Menu_model->get_umbag($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/NextDayPlanner', ['notify'=>$notify,'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function MyNextDayPlan(){
        if(isset($_POST['sdate'])){
        $date = $_POST['sdate'];
        }
        else{
            $date = date('Y-m-d');
        }
        $data['sd'] = $date;
        $data['ed'] = $date;    
        $sdate = new DateTime($date);
        $edate = new DateTime($date);
        $user= $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $data['notify']=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $data['user']  = $user;
        $this->display($dep_name.'/MyNextDayPlan', $data);
    }
    public function MBagR(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mbagr=$this->Menu_model->get_umbagr();
        $mbagu=$this->Menu_model->get_umbagu();
        $mbagm=$this->Menu_model->get_umbagm();
        $mbagall=$this->Menu_model->get_mbagall();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/mbagr', ['notify'=>$notify,'user'=>$user,'mbagr'=>$mbagr,'mbagu'=>$mbagu,'mbagm'=>$mbagm,'mbagall'=>$mbagall]);
        }else{
            redirect('Menu/main');
        }
    }
    public function alertpoint($code){
        $user = $this->session->userdata('user');
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/alertpoint', ['user'=>$user,'code'=>$code]);
    }
    public function mbagmreq($uid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $this->Menu_model->get_ubrequest($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        redirect('Menu/maintenanceBag');
    }
    public function mbagmreqpm(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $this->Menu_model->get_ubrequestpm();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        redirect('Menu/maintenanceBag');
    }
    public function getspdbycode(){
        $projcode= $this->input->post('projcode');
        
        $result=$this->Menu_model->get_spdbypc($projcode);
        foreach($result as $d){if($d->status!='1'){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'</option>';
        }}
        return $data;
    }
    public function getspdbypc(){
        $project_code= $this->input->post('project_code');
        
        $result=$this->Menu_model->get_spdbypc($project_code);
        $client=$this->Menu_model->get_clientbypc($project_code);
        if(empty($client)){$cpc=0;}else{$cpc = $client[0]->noofschool;}
        $ts = sizeof($result);
        echo  $data = '<p><b>'.$ts.' School Added Already and Total Required School is '.$cpc.'</b></p>';
    }
    public function search_company(){
        
        $dt=$this->Menu_model->get_company();
        $this->load->view('Admin/searchcompany', ['data'=>$dt]);
    }
    public function search_client(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_client();
        $this->load->view($dep_name.'/searchclient', ['notify'=>$notify,'data'=>$dt, 'user'=>$user]);
    }
    public function client_detail(){
        $cid = $_GET['id'];
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_clientbyid($cid);
        $allyear=$this->Menu_model->all_year();
        $this->load->view($dep_name.'/clientdetail', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'allyear'=>$allyear]);
    }
    public function client_school($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $cpc=$this->Menu_model->get_clientbyid($cid);
        $projcode = $cpc[0]->projectcode;
        $spd=$this->Menu_model->get_spdbypc($projcode);
        $this->load->view($dep_name.'/clientschool', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
    }
    public function admin(){
        
        $dt=$this->Menu_model->get_data();
        $this->load->view('Admin/register',['data'=>$dt]);
    }
    public function SchoolConversion(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_user();
        $this->load->view('Program-Manager/School-Conversion',['data'=>$dt, 'user'=>'$user']);
    }
    public function SchoolData(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mdata=$this->Menu_model->get_user();
        $spd=$this->Menu_model->get_mspd();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/School-Data',['notify'=>$notify,'data'=>$dt, 'user'=>$user, 'spd'=>$spd, 'mdata'=>$mdata]);
        }else{
            redirect('Menu/main');
        }
    }
    public function synopsis(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_user();
        $this->load->view('Program-Manager/synopsis',['data'=>$dt, 'user'=>'$user']);
    }
    public function MyProfile($piid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mydetail=$this->Menu_model->get_mydetail($piid);
        $mytd1=$this->Menu_model->get_mytaskdetail1($piid);
        $mytd2=$this->Menu_model->get_mytaskdetail2($piid);
        $mytd3=$this->Menu_model->get_mytaskdetail3($piid);
        $mytd4=$this->Menu_model->get_mytaskdetail4($piid);
        $mysrd=$this->Menu_model->get_myschoolreviewdetail($piid);
        $myprd=$this->Menu_model->get_myprogramreviewdetail($piid);
        $myac=$this->Menu_model->get_myacademiccalendar($piid);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/MyProfile', ['myac'=>$myac,'myprd'=>$myprd,'mysrd'=>$mysrd,'piid'=>$piid,'notify'=>$notify, 'user'=>$user,'mydetail'=>$mydetail,'mytd1'=>$mytd1,'mytd2'=>$mytd2,'mytd3'=>$mytd3,'mytd4'=>$mytd4]);
            }else{
                redirect('Menu/main');
            }
    }
    public function PWTaskList($pid,$page,$action,$tt){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $program= $this->Menu_model->get_clientbyid($pid);
        $pcode = $program[0]->projectcode;
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        $sdetail=$this->Menu_model->get_pdetail($pcode);
        $tasklist= $this->Menu_model->gettdonebypcode($pcode,$page,$action);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/PWTaskList', ['tt'=>$tt,'tasklist'=>$tasklist,'page'=>$page,'action'=>$action,'pid'=>$pid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'program'=>$program]);
            }else{
                redirect('Menu/main');
            }
    }
    public function SWTaskList($sid,$page,$action){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd= $this->Menu_model->get_spdbyid($sid);
        $pcode = $spd[0]->project_code;
        $programd1=$this->Menu_model->get_spddetail1($sid);
        $programd2=$this->Menu_model->get_spddetail2($sid);
        $programd3=$this->Menu_model->get_spddetail3($sid);
        $programd4=$this->Menu_model->get_spddetail4($sid);
        $sdetail=$this->Menu_model->get_sdetail($sid);
        $tasklist= $this->Menu_model->gettdonebyd($sid,$page,$action);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/SWTaskList', ['tasklist'=>$tasklist,'page'=>$page,'action'=>$action,'sid'=>$sid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'spd'=>$spd]);
            }else{
                redirect('Menu/main');
            }
    }
    public function PUtilisationDetail($pid,$tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $program= $this->Menu_model->get_clientbyid($pid);
        $pcode = $program[0]->projectcode;
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        $sdetail=$this->Menu_model->get_pdetail($pcode);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/PUtilisationDetail', ['tid'=>$tid,'pid'=>$pid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'program'=>$program]);
            }else{
                redirect('Menu/main');
            }
    }
    public function PCallDetail($pid,$tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $program= $this->Menu_model->get_clientbyid($pid);
        $pcode = $program[0]->projectcode;
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        $sdetail=$this->Menu_model->get_pdetail($pcode);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/PCallDetail', ['tid'=>$tid,'pid'=>$pid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'program'=>$program]);
            }else{
                redirect('Menu/main');
            }
    }
    public function CallDetail($sid,$tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd= $this->Menu_model->get_spdbyid($sid);
        $pcode = $spd[0]->project_code;
        $programd1=$this->Menu_model->get_spddetail1($sid);
        $programd2=$this->Menu_model->get_spddetail2($sid);
        $programd3=$this->Menu_model->get_spddetail3($sid);
        $programd4=$this->Menu_model->get_spddetail4($sid);
        $sdetail=$this->Menu_model->get_sdetail($sid);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/CallDetail', ['tid'=>$tid,'sid'=>$sid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'spd'=>$spd,'pcode'=>$pcode]);
            }else{
                redirect('Menu/main');
            }
    }
    public function SchoolProfile($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd= $this->Menu_model->get_spdbyid($sid);
        $pcode = $spd[0]->project_code;
        $programd1=$this->Menu_model->get_spddetail1($sid);
        $programd2=$this->Menu_model->get_spddetail2($sid);
        $programd3=$this->Menu_model->get_spddetail3($sid);
        $programd4=$this->Menu_model->get_spddetail4($sid);
        $sdetail=$this->Menu_model->get_sdetail($sid);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/SchoolProfile', ['sid'=>$sid,'sdetail'=>$sdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'spd'=>$spd]);
            }else{
                redirect('Menu/main');
            }
    }
    public function ProgramProfile($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $program = $this->Menu_model->get_clientbyid($pid);
        $pcode = $program[0]->projectcode;
        $programd1=$this->Menu_model->get_programdetail1($pcode);
        $programd2=$this->Menu_model->get_programdetail2($pcode);
        $programd3=$this->Menu_model->get_programdetail3($pcode);
        $programd4=$this->Menu_model->get_programdetail4($pcode);
        $pdetail=$this->Menu_model->get_pdetail($pcode);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/ProgramProfile', ['pid'=>$pid,'pdetail'=>$pdetail,'programd4'=>$programd4,'programd3'=>$programd3,'programd2'=>$programd2,'programd1'=>$programd1,'notify'=>$notify, 'user'=>$user,'program'=>$program]);
            }else{
                redirect('Menu/main');
            }
    }
    public function school_detail($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $spd=$this->Menu_model->get_school_detail($sid);
        $slog=$this->Menu_model->get_schoollogs($sid);
        $dtc=$this->Menu_model->get_school_contact($sid);
        $wgd=$this->Menu_model->get_wgdata($sid);
        $status=$this->Menu_model->get_status();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/schooldetail', ['notify'=>$notify,'spd'=>$spd, 'dataa'=>$dtc, 'wgd'=>$wgd,'slog'=>$slog, 'user'=>$user, 'status'=>$status]);
            }else{
                redirect('Menu/main');
            }
    }
    public function ProgramPage($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $client=$this->Menu_model->get_clientbyid($cid);
        $pcode = $client[0]->projectcode;
        $spd=$this->Menu_model->get_spdbypc($pcode);
        $dtc=$this->Menu_model->get_school_contact($cid);
        $wgd=$this->Menu_model->get_wgdata($cid);
        $status=$this->Menu_model->get_status();
        $pstatus=$this->Menu_model->get_pstatus();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/programpage', ['notify'=>$notify,'spd'=>$spd, 'dataa'=>$dtc, 'wgd'=>$wgd,'user'=>$user, 'status'=>$status,'client'=>$client,'pstatus'=>$pstatus]);
            }else{
                redirect('Menu/main');
            }
    }
    public function Approve(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $sid= $this->input->post('sid');
        $remark= $this->input->post('remark');
        $apr = $this->input->post('apr');
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->set_approve($sid,$remark,$apr);
            $user_id = $_POST['user_id'];
            $dt=$this->Menu_model->get_depatment_byid($id);
            $spd=$this->Menu_model->get_spdbypiid($user_id);
            $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/validateoldspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
            }else{
                redirect('Menu/main');
            }
    }
    public function pmApprove(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $sid= $this->input->post('sid');
        $remark= $this->input->post('remark');
        $apr = $this->input->post('apr');
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->set_pmapprove($sid,$remark,$apr);
            $user_id = $_POST['user_id'];
            $dt=$this->Menu_model->get_depatment_byid($id);
            $spd=$this->Menu_model->get_spdbypiid($user_id);
            $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/validateoldspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
            }else{
                redirect('Menu/main');
            }
    }
    public function getUtilization($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $uti=$this->Menu_model->get_uti($sid);
        if(!empty($user)){
            $this->load->view($dep_name.'/totalutilization', ['notify'=>$notify,'uti'=>$uti, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function utilisationreport(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $uti=$this->Menu_model->get_uti($sid);
        if(!empty($user)){
            $this->load->view($dep_name.'/utilisationreport', ['notify'=>$notify,'uti'=>$uti, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function Notification(){
        $user           = $this->session->userdata('user');
        $data['user']   = $user;
        $uid            = $user['id'];
        $id             =  $user['dep_id'];

        

        $notify     =   $this->Menu_model->get_notifybyid($uid);
        $dt         =   $this->Menu_model->get_depatment_byid($id);
        $dep_name   =   $dt[0]->dep_name;

        if(!empty($user)){
            $this->load->view($dep_name.'/Notification', ['notify'=>$notify, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }

    public function readnotify(){
        $id             = $_POST['id'];
        
        $mdata          = $this->Menu_model->read_notify($id);
    }
    public function getReport($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $rep=$this->Menu_model->get_report($sid);
        if(!empty($user)){
            $this->load->view($dep_name.'/totalreport', ['notify'=>$notify,'rep'=>$rep, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function getMedia($sid){
        $user         = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id           =  $user['dep_id'];
        
        $notify     =$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $media=$this->Menu_model->get_media($sid);
        if(!empty($user)){
            $this->load->view($dep_name.'/totalmedia', ['notify'=>$notify,'media'=>$media, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function school_d($id){
        
        $dt=$this->Menu_model->get_school_detail($id);
        $this->load->view('Admin/test', ['data'=>$dt]);
    }
    public function sd(){
        $id= $this->input->post('id');
        
        $result=$this->Menu_model->get_school_detail($id);
        echo json_encode($result);
    }
    public function findfgcode(){
        $umcode= $this->input->post('umcode');
        $sid =  $this->input->post('sid');
        
        $result=$this->Menu_model->find_fgcode($umcode,$sid);
    }
    public function getpartmaterial(){
        $fgname= $this->input->post('fgname');
        
        $pmaterial = $this->Menu_model->get_modelmaterial($fgname);
        foreach($pmaterial as $d){
           echo  $data = '<option>'.$d->material_name.'</option>';
        }
        $mpart = $this->Menu_model->get_modelpart($fgname);
        foreach($mpart as $d){
           echo  $data = '<option>'.$d->part_name.'</option>';
        }
        return $data;
    }
    public function mainremark(){
        $action_id= $this->input->post('action_id');
        $status_id= $this->input->post('status_id');
        
        $result=$this->Menu_model->get_mainremark($action_id, $status_id);
        foreach($result as $d){
           echo  $data = '<option>'.$d->name.'</option>';
        }
        return $data;
    }
    public function getspdbyrid(){
        $rid= $this->input->post('rid');
        
        $result=$this->Menu_model->get_spdbyrid($rid);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.' ('.$d->saddress.') ('.$d->scity.') ('.$d->sstate.') </option>';
        }
        return $data;
    }
    public function getuserbydr(){
        $dep= $this->input->post('dep');
        $region= $this->input->post('region');
        
        $result=$this->Menu_model->get_user_bydr($dep,$region);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->fullname.'</option>';
        }
        return $data;
    }
    public function gettst(){
        $tt= $this->input->post('tt');
        if($tt=='VISIT'){
            echo '<option>New Client</option>
            <option>Onboard Client</option>
            <option>Inauguration</option>';
        }elseif($tt=='TTP'){
            echo '<option>Select</option>
            <option value="FTTP">Fresh</option>
            <option value="RTTP">Refresh</option>';
        }elseif($tt=='M&E'){
            echo '<option>Select</option>
            <option value="EMnE">Endline</option>';
        }elseif($tt=='Call'){
            echo '<option>Pre-intervention Enquiry for Installation</option>
            <option>Pre-Intervention Enquiry For FTTP</option>
            <option>Pre-Intervention Enquiry For RTTP</option>
            <option>Post-intervention Enquiry for Maintenance</option>
            <option>Post-Intervention Enquiry For FTTP</option>
            <option>Post-Intervention Enquiry For RTTP</option>
            <option value="Not Required">Not Required</option>';
        }else{echo '<option>Select </option><option value="Not Required">Not Required</option>';}
    }
    public function getpitst(){
        $tt= $this->input->post('tt');
        if($tt=='Communication'){
            echo '<option>Select Sub Task</option>
            <option>9 Communication</option>
            <option>FTTP Communication</option>
            <option>RTTP Communication</option>
            <option>DIY Communication</option>
            <option>School Activation</option>
            <option>NSP</option>
            <option>Other</option>';
        }elseif($tt=='Call'){
            echo '<option>Select Sub Task</option>
            <option>Call For Summer Activity</option>
            <option>Call for School Activation</option>
            <option value="Pre-intervention Enquiry for FTTP">FTTP</option>
            <option value="Pre - Intervention Enquiry for RTTP">RTTP</option>
            <option value="Pre - Intervention Enquiry for M&E">M&E (Base Line)</option>
            <option value="Pre - Intervention Enquiry for M&E">M&E (End Line)</option>
            <option value="Pre - Intervention Enquiry for DIY">DIY</option>
            <option>Call For initiating Utilisation</option>';
        }elseif($tt=='Report'){
            echo '<option>Select Report Type</option>
            <option value="Upload FTTP Report">FTTP Report</option>
            <option value="Upload Installation Report">Installation Report</option>
            <option value="Upload RTTP Report">RTTP Report</option>
            <option>Monthly Report</option>
            <option>Quarterly Report</option>
            <option>Half yearly Report</option>
            <option>Annual Report</option>';
        }else{echo '<option value="Not Required">Not Required</option>';}
    }
    public function pcodebyyear(){
        $year= $this->input->post('year');
        
        echo  $data = '<option value="">Select Project Code</option>';
        $result=$this->Menu_model->get_pcodebyyear($year);
        foreach($result as $d){
           echo  $data = '<option>'.$d->projectcode.'</option>';
        }
        return $data;
    }
    public function spdbypcode(){
        $pcode= $this->input->post('pcode');
        
        echo  $data = '<option value=""> Select School </option>';
        $result=$this->Menu_model->get_spdbypc($pcode);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'</option>';
        }
        return $data;
    }
    public function spdinfobysid(){
        $sid= $this->input->post('sid');
        
        $result=$this->Menu_model->get_spdbyid($sid);
        $piid = $result[0]->pi_id;
        $piid = $this->Menu_model->get_user_byid($piid);
        $insid = $result[0]->ins_id;
        $insid = $this->Menu_model->get_user_byid($insid);
       echo  $data = '<p> School Name : '.$result[0]->sname.'</p>
                     <p> School Address : '.$result[0]->saddress.'</p>
                     <p> School City : '.$result[0]->scity.'</p>
                     <p> School State : '.$result[0]->sstate.'</p>
                     <p> School PIA : '.$piid[0]->fullname.'</p>
                     <p> School Ins Person : '.$insid[0]->fullname.'</p>';
        return $data;
    }
    public function getuserbydepbag(){
        $dep= $this->input->post('dep');
        
        $result=$this->Menu_model->get_user_bydepbag($dep);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->fullname.'</option>';
        }
        return $data;
    }
    public function getspdbypcode(){
        $pcode= $this->input->post('pcode');
        
        $result=$this->Menu_model->get_spdbypc($pcode);
        foreach($result as $d){if($d->pm_apr==1){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'</option>';
        }}
        return $data;
    }
    public function getallspdbypcode(){
        $pcode= $this->input->post('pcode');
        
        $result=$this->Menu_model->get_spdbypc($pcode);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'</option>';
        }
        return $data;
    }
    public function getspdbypcsbys(){
        $stid = $this->input->post('status');
        $pcode= $this->input->post('pcode');
        
        $result=$this->Menu_model->get_spdbypcbystatus($pcode,$stid);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
        }
        return $data;
    }
    public function getspdbypcs(){
        $pcode= $this->input->post('pcode');
        
        $result=$this->Menu_model->get_spdbypc($pcode);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
        }
        return $data;
    }
    public function getspdbypcode1(){
        $pcode = $this->input->post('pcode');
        
        $result=$this->Menu_model->get_spdbypc($pcode);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
        }
        return $data;
    }
    public function getspdbyclient1(){
        $client = $this->input->post('client');
        
        $result=$this->Menu_model->get_spdbyclient($client);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
        }
        return $data;
    }
    public function msccc(){
        $hmcr = $this->input->post('hmcr');
        $userid = $this->input->post('userid');
        
        $this->Menu_model->add_msccc($hmcr,$userid);
         redirect('Menu/CMSCCC');
    }
    public function addday(){
        $sdate = $this->input->post('sdate');
        $addday = $this->input->post('addday');
        $newDate = date('Y-m-d', strtotime($sdate . ' + '.$addday.' days'));
        echo $newDate;
    }
    public function postmsccc(){
        $userid = $this->input->post('userid');
        $cname = $this->input->post('cname');
        $spd = $this->input->post('spd');
        $tpct = $this->input->post('tpct');
        $sdate = $this->input->post('sdate');
        $edate = $this->input->post('edate');
        $remark = $this->input->post('remark');
        
        $this->Menu_model->add_planmsccc($userid,$cname,$spd,$tpct,$sdate,$edate,$remark);
         redirect('Menu/CMSCCC');
    }
    public function getspdbyuserpcs(){
        $pcode= $this->input->post('pcode');
        $userid = $this->input->post('userid');
        
        $result=$this->Menu_model->get_spdbyusernpc($pcode,$userid);
        echo  $data = '<option>Select School</option>';
        foreach($result as $d){
            $sid = $d->id;
            $spd=$this->Menu_model->get_stimelinebypisid($sid,$userid);
            if($spd){
                echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
            }
        }
        return $data;
    }
    public function getspdbyuserpcs1(){
        $pcode= $this->input->post('pcode');
        $userid = $this->input->post('userid');
        
        $result=$this->Menu_model->get_spdbyusernpc($pcode,$userid);
        echo  $data = '<option>Select School</option>';
        foreach($result as $d){
            $sid = $d->id;
            $spd=$this->Menu_model->get_stimelinebypisid($sid,$userid);
            if(!$spd){
                echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
            }
        }
        return $data;
    }
    public function getprogramtimelineforpi(){
        $pcode= $this->input->post('pcode');
        
        $result=$this->Menu_model->get_programtimelineforpi($pcode);
        echo json_encode($result);
    }
    public function getmodel(){
        
        $result=$this->Menu_model->get_model();
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->model_name.'</option>';
        }
        return $data;
    }
    public function getmodelbytype(){
        $mtype= $this->input->post('mtype');
        
        $result=$this->Menu_model->get_modelbytype($mtype);
        foreach($result as $d){
           echo  $data = '<option value='.$d->model_name.'>'.$d->model_name.'</option>';
        }
        return $data;
    }
    public function getpcodebyyear(){
        $year= $this->input->post('year');
        
        $result=$this->Menu_model->get_pcodebyy($year);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->project_code.'</option>';
        }
        return $data;
    }
    public function getpcodebypiid(){
        $user_id= $this->input->post('user_id');
        
        $result=$this->Menu_model->get_pcodebypi($user_id);
        echo $data = '<option>All</option>';
        foreach($result as $d){
           echo  $data = '<option>'.$d->project_code.'</option>';
        }
        return $data;
    }
    public function getcity(){
        $statename= $this->input->post('statename');
        
        $result=$this->Menu_model->get_city($statename);
        foreach($result as $d){
           echo  $data = '<option>'.$d->cityname.'</option>';
        }
        return $data;
    }
    public function getdistrict(){
        $statename= $this->input->post('statename');
        
        $result=$this->Menu_model->get_district($statename);
        foreach($result as $d){
           echo  $data = '<option>'.$d->districtn.'</option>';
        }
        return $data;
    }
    public function gettehshil(){
        $statename= $this->input->post('statename');
        
        $result=$this->Menu_model->get_tehshil($statename);
        foreach($result as $d){
           echo  $data = '<option>'.$d->tehshiln.'</option>';
        }
        return $data;
    }
    public function getyear(){
        $projcode= $this->input->post('projcode');
        
        $yfh=$this->Menu_model->get_yearfh($projcode);
        $hy = $yfh[0]->project_year;
        $gy=$this->Menu_model->get_year($projcode);
        $gy = $gy[0]->gety;
        $all=$this->Menu_model->all_year();
        foreach($all as $d){ if($d->yearn>=$hy){if($d->yearn!=$gy){
           echo  $data = '<option>'.$d->yearn.'</option>';
           return $data;
        }}}
    }
    public function getyearu(){
        $projcode= $this->input->post('projcode');
        
        $yfh=$this->Menu_model->get_yearfh($projcode);
        $hy = $yfh[0]->project_year;
        $gy=$this->Menu_model->get_yearu($projcode);
        $gy = $gy[0]->gety;
        $all=$this->Menu_model->all_year();
        foreach($all as $d){
           echo  $data = '<option>'.$d->yearn.'</option>';
        }
        return $data;
    }
    public function purpose(){
        $action_id= $this->input->post('action_id');
        
        $result=$this->Menu_model->get_purpose($action_id);
        foreach($result as $d){
           echo  $data = '<option value='.$d->id.'>'.$d->name.'</option>';
        }
        return $data;
    }
    public function actionremark(){
        $purpose_id= $this->input->post('purpose_id');
        
        $result=$this->Menu_model->get_actionremark($purpose_id);
        foreach($result as $d){
           echo  $data = '<option>Select Remark</option><option>'.$d->name.'</option>';
        }
        return $data;
    }
    public function getteacher(){
        $tid= $this->input->post('tid');
        
        $result=$this->Menu_model->get_spdteacherbytid($tid);
        foreach($result as $d){
           echo  $data = '<option>Select Teacher</option><option>'.$d->contact_name.'</option>';
        }
        return $data;
    }
    public function getremark(){
        $id= $this->input->post('id');
        
        $result=$this->Menu_model->get_remark($id);
        print_r($result);
    }
    public function spd_add(){
        
        $dt=$this->Menu_model->get_spd();
        $this->load->view('Admin/spd_add', ['data'=>$dt]);
    }
    public function add_task(){
        
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $this->load->view('Admin/add-task', ['dep'=>$dt, 'user'=>$du]);
    }
    public function puritem(){
        $project_code= $this->input->post('project_code');
        $item_name= $this->input->post('item_name');
        $item_qty=$this->input->post('item_qty');
        $unit=$this->input->post('unit');
        $rate=$this->input->post('rate');
        $pay_tarms=$this->input->post('pay_tarms');
        $vendor_name=$this->input->post('vendor_name');
        $v_mno=$this->input->post('v_mno');
        $v_email=$this->input->post('v_email');
        $v_address=$this->input->post('v_address');
        $bank_name=$this->input->post('bank_name');
        $account_no=$this->input->post('account_no');
        $ifsc=$this->input->post('ifsc');
        $del_tarms=$this->input->post('del_tarms');
        $remark=$this->input->post('remark');
        
        $id=$this->Menu_model->add_puritem($project_code, $item_name, $item_qty, $unit, $rate, $pay_tarms, $vendor_name, $v_mno, $v_email, $v_address, $bank_name, $account_no, $ifsc, $del_tarms ,$remark);
        if($id){
            redirect('Menu/PurchaseItem');
        }else{
            print('Insert error ');
        }
    }
    public function addCompose(){
        $to_user= $this->input->post('to_user');
        $from_user= $this->input->post('from_user');
        $subject=$this->input->post('subject');
        $matter=$this->input->post('matter');
        $file=$this->input->post('file');
        
        $id=$this->Menu_model->add_Compose($to_user,$from_user,$subject,$matter,$file);
        if($id){
            redirect('Menu/Compose');
            }else{
            print('Insert error ');
        }
    }
    public function bagAssign(){
        $date= $this->input->post('date');
        $user=$this->input->post('user');
        $bcode=$this->input->post('bcode');
        
        $id=$this->Menu_model->bag_assign($date, $user, $bcode);
        if($id){
               redirect('Menu/AssignBag');
            }
        else{
            print('Insert error ');
        }
    }
    public function taskassign(){
        $indata= $this->input->post('indata');
        
        $id=$this->Menu_model->task_assign($indata);
        if($id){
            redirect('Menu/CreateTask');
        }else{
            print('Insert error ');
        }
    }
    public function addtp(){
        $piaid          = $this->input->post('piaid');
        $person_name    = $this->input->post('person_name');
        $phone_number   = $this->input->post('phone_number');
        $email_address  = $this->input->post('email_address');
        $address        = $this->input->post('address');
        $city           = $this->input->post('city');
        $district       = $this->input->post('district');
        $state          = $this->input->post('state');
        $qualification  = $this->input->post('qualification');
        $remark         = $this->input->post('remark');
        $cluster        = $this->input->post('cname');
        $user           = $this->session->userdata('user');
        $data['user']   = $user;$uid= $user['id'];
        $uid            = $user['id'];
        $id             = $user['dep_id'];
        $this->Menu_model->add_tp($piaid,$person_name,$phone_number,$email_address,$address,$city,$district,$state,$qualification,$remark,$cluster);
        $dt                 = $this->Menu_model->get_depatment_byid($id);
        $dep_name           = $dt[0]->dep_name;
        $data['dep_name']   = $dep_name;
        $this->display($dep_name.'/AddTempPerson',$data);
    }

    public function taskassignins(){
        $from_user= $this->input->post('from_user');
        $task_date= $this->input->post('task_date');
        $to_user= $this->input->post('to_user');
        $pcode= $this->input->post('pcode');
        $spd_id= $this->input->post('spd_id');
        $Remark= $this->input->post('Remark');
        
        $id=$this->Menu_model->task_assign_ins($from_user,$task_date,$to_user,$pcode,$spd_id,$Remark);
        if($id){
            redirect('Menu/CreateInstallation');
        }else{
            print('Insert error ');
        }
    }
    public function piaclosereview(){
        $closeremark = $_POST['closeremark'];
        $closetdate = $_POST['closetdate'];
        $rrid = $_POST['rrid'];
        
        $this->Menu_model->piaclose_review($closetdate,$closeremark,$rrid);
        redirect('Menu/AllReviewPlaing');
    }
    public function closereview(){
        $closeremark = $_POST['closeremark'];
        $closetdate = $_POST['closetdate'];
        $rrid = $_POST['rrid'];
        
        $this->Menu_model->close_review($closetdate,$closeremark,$rrid);
        redirect('Menu/AllReviewPlaing');
    }
    public function pmrequest(){
        $tdate= $this->input->post('tdate');
        $tasttype= $this->input->post('tasttype');
        $schooltype= $this->input->post('schooltype');
        $noofschool= $this->input->post('noofschool');
        $location= $this->input->post('location');
        $remark= $this->input->post('remark');
        $tcname= $this->input->post('tcname');
        
        $id=$this->Menu_model->pm_request($tdate,$tasttype,$schooltype,$noofschool,$location,$remark,$tcname);
        if($id){
            redirect('Menu/CreateRequest');
        }else{
            print('Insert error ');
        }
    }
    public function bdrclosrbypia(){
        $uid= $this->input->post('uid');
        $tid= $this->input->post('tid');
        $cremark= $this->input->post('cremark');
        
        if(isset($_FILES['filname']['name'])) {
        $filname = $_FILES['filname']['name'];
        $count = sizeof($filname);
        } else {$count = 0;}
        $id=$this->Menu_model->bdr_closrbypia($tid,$cremark,$uid,$count,$filname);
        redirect('Menu/allbdrequest/');
    }
    public function plansitask(){
        $uuid       = $this->input->post('uuid');
        $rid        = $this->input->post('rid');
        $noofschool = $this->input->post('noofschool');
        
        $this->load->library('session');
        $id         = $this->Menu_model->bdr_plansitask($uuid,$rid,$noofschool);
        $this->session->set_flashdata('success_message','  Task Planned Successfully !!');
        redirect('Menu/Dashboard/');
    }
    public function plansinog(){
        $uuid= $this->input->post('ingouid');
        $rid= $this->input->post('rid');
        $pcode= $this->input->post('pcode');
        $sid= $this->input->post('spdid');
        
        $id=$this->Menu_model->bdr_plansinog($uuid,$rid,$pcode,$sid);
        redirect('Menu/Dashboard/');
    }
    public function bdrassignto(){
        $uid      = $this->input->post('uid');
        $tid      = $this->input->post('tid');
        $assignto = $this->input->post('assignto');
        $remark   = $this->input->post('remark');
        $exdate   = $this->input->post('exdate');
        
        $this->load->library('session');
        $id       = $this->Menu_model->bdr_assignto($uid,$tid,$assignto,$remark,$exdate);
        $this->session->set_flashdata('success_message','  Task Created Successfully !!');
        redirect('Menu/bdrapending/');
    }
    public function bdrstageassign(){
        $byid = $this->input->post('byid');
        $tid = $this->input->post('tid');
        $tasktype = $this->input->post('tasktype');
        $purpose = $this->input->post('purpose');
        $assignto= $this->input->post('assignto');
        $nooftask= $this->input->post('nooftask');
        $exdate= $this->input->post('exdate');
        $cterms= $this->input->post('cterms');
        
        $id=$this->Menu_model->bdr_stageassign($byid,$tid,$tasktype,$purpose,$assignto,$nooftask,$cterms,$exdate);
        redirect('Menu/bdrapending/');
    }
    public function rremark(){
        $sid= $this->input->post('sid');
        $rremark= $this->input->post('rremark');
        $tdate= $this->input->post('tdate');
        $ttype= $this->input->post('ttype');
        $tstype= $this->input->post('tstype');
        $remark= $this->input->post('remark');
        $pi= $this->input->post('pi');
        $status= $this->input->post('status');
        $uid= $this->input->post('uid');
        
        $id=$this->Menu_model->assign_rtask($sid,$rremark,$tdate,$ttype,$tstype,$remark,$pi,$uid);
        redirect('Menu/pischool/'.$pi.'/'.$status);
    }
    public function pmsremark(){
        $ques= $this->input->post('ques');
        $remark= $this->input->post('remark');
        $sid= $this->input->post('sid');
        $pi= $this->input->post('pi');
        $status= $this->input->post('status');
        $uid= $this->input->post('uid');
        $rremark = $this->input->post('rremark');
        
        $id=$this->Menu_model->pm_review($sid,$pi,$uid,$ques,$remark,$rremark);
        redirect('Menu/pischool/'.$pi.'/'.$status);
    }
    public function pmspdremark(){
        $sid= $this->input->post('sid');
        $piid= $this->input->post('piid');
        $uid= $this->input->post('uid');
        $remark= $this->input->post('remark');
        
        $id=$this->Menu_model->pm_spdreview($sid,$piid,$uid,$remark);
        redirect('Menu/CreateARTask');
    }
    public function sendtofm(){
        $program= $this->input->post('program');
        $request= $this->input->post('request');
        
        $id=$this->Menu_model->send_tofm($program,$request);
        if($id){
            redirect('Menu/pmtofmrequest');
        }else{
            print('Insert error ');
        }
    }
    public function assignot(){
        $fuser = $this->input->post('fuser');
        $touser = $this->input->post('touser');
        $tadate = $this->input->post('tadate');
        $ttdate = $this->input->post('ttdate');
        $taskdetail = $this->input->post('taskdetail');
        $remark = $this->input->post('remark');
        
        $id=$this->Menu_model->add_newtask($fuser,$touser,$tadate,$ttdate,$taskdetail,$remark);
        if($id){
            redirect('Menu/CreateOTask');
        }else{
            print('Insert error ');
        }
    }
    public function createaot(){
        $uid = $this->input->post('uid');
        $tasktype = $this->input->post('tasktype');
        $action = $this->input->post('action');
        $pcode = $this->input->post('pcode');
        $sid = $this->input->post('sid');
        $brid = $this->input->post('brid');
        $taskremark= $this->input->post('taskremark');
        
        $id=$this->Menu_model->create_aot($uid,$tasktype,$action,$pcode,$sid,$brid,$taskremark);
        if($id){
            redirect('Menu/CreateDifferentTask');
        }else{
            print('Insert error ');
        }
    }
    public function scplan(){
        $pdate= $this->input->post('pdate');
        $createdby= $this->input->post('createdby');
        $task_type= $this->input->post('task_type');
        $premark= $this->input->post('premark');
        $mlink= $this->input->post('mlink');
        $uvideo= $this->input->post('uvideo');
        
        $id=$this->Menu_model->plan_sc($pdate,$createdby,$task_type,$premark,$mlink,$uvideo);
        if($id){
            redirect('Menu/Dashboard');
        }else{
            print('Insert error ');
        }
    }
    public function rwplan(){
        $pdate= $this->input->post('pdate');
        $pcode= $this->input->post('pcode');
        $sid= $this->input->post('spd_id');
        $createdby= $this->input->post('createdby');
        $task_type= $this->input->post('task_type');
        $statename= $this->input->post('statename');
        $districtname= $this->input->post('districtname');
        $premark= $this->input->post('premark');
        
        $id=$this->Menu_model->rw_plan($pdate,$createdby,$task_type,$statename,$districtname,$premark,$pcode,$sid);
        if($id){
            redirect('Menu/Dashboard');
        }else{
            print('Insert error ');
        }
    }
    public function startsc(){
        $sdate= $this->input->post('sdate');
        $scid= $this->input->post('scid');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/day/';
        
        $flink = $this->Menu_model->uploadfile($filname, $uploadPath);
        
        $id=$this->Menu_model->start_sc($sdate,$scid,$flink);
        redirect('Menu/Dashboard');
    }
    public function startrw(){
        $sdate= $this->input->post('sdate');
        $scid= $this->input->post('scid');
        
        $id=$this->Menu_model->start_rw($sdate,$scid);
        redirect('Menu/Dashboard');
    }
    public function closesc(){
        $sdate= $this->input->post('sdate');
        $scid= $this->input->post('scid');
        $cphoto= $this->input->post('cphoto');
        $vlink= $this->input->post('vlink');
        $creamrk= $this->input->post('creamrk');
        
        $id=$this->Menu_model->close_sc($sdate,$scid,$cphoto,$vlink,$creamrk);
        redirect('Menu/Dashboard');
    }
    public function closerw(){
        $sdate= $this->input->post('sdate');
        $scid= $this->input->post('scid');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/day/';
        
        $flink = $this->Menu_model->uploadfile($filname, $uploadPath);
        $creamrk= $this->input->post('creamrk');
        
        $id=$this->Menu_model->close_rw($sdate,$scid,$flink,$creamrk);
        redirect('Menu/Dashboard');
    }
    public function piataskassign(){
        $userid= $this->input->post('userid');
        $task_type= $this->input->post('task_type');
        $PhVi= $this->input->post('PhVi');
        $pcode= $this->input->post('pcode');
        $spd_id= $this->input->post('spd_id');
        $sicl= $this->input->post('sicl');
        $cllist= $this->input->post('cllist');
        $remark= $this->input->post('remark');
        
        $this->Menu_model->piatask_assign($userid,$task_type,$PhVi,$pcode,$spd_id,$sicl,$cllist,$remark);
        redirect('Menu/CreateTask');
    }
    public function imtaskassign(){
        $userid= $this->input->post('userid');
        $uname= $this->input->post('uname');
        $task_type= $this->input->post('task_type');
        $PhVi= $this->input->post('PhVi');
        $pcode= $this->input->post('pcode');
        $spd_id= $this->input->post('spd_id');
        $sicl= $this->input->post('sicl');
        $cllist= $this->input->post('cllist');
        $remark= $this->input->post('remark');
        
        $this->Menu_model->imtask_assign($userid,$task_type,$PhVi,$pcode,$spd_id,$sicl,$cllist,$remark,$uname);
        redirect('Menu/CreateTask');
    }
    public function deliveryassign(){
        $pcode = $this->input->post('pcode');
        $recid = $this->input->post('recid');
        
        $this->Menu_model->delivery_assign($pcode,$recid);
        redirect('Menu/TransitAssign');
    }
    public function newtaskassign(){
        $indata= $this->input->post('indata');
        $tt=$indata[5];
        if($tt=='Report'){$sid=$indata[8];}
        $sid=$indata[8];
        $pi=$indata[4];
        $fid=$indata[4];
        $pcode=$indata[7];
        $tst=$indata[6];
        $indata[10]='';
        $msid='';
        if($indata[10]){$csid=$indata[10];
        $l = sizeof($csid);
        for($i=0;$i<$l;$i++){if($csid[$i]!=''){
            $msid = $msid.','.$csid[$i];
        }}}
        if($tt=='Utilisation'){$page='';}
        if($tt=='CaseStudy'){$page='';}
        if($tt=='Communication'){$page='';}
        if($tt=='Report'){$page='';}
        if($tt=='Call'){
            if($tst=='Call For Summer Activity'){$page='page56';}
            if($tst=='Call for School Activation'){$page='page52';}
            if($tst=='Pre - Intervention Enquiry for FTTP'){$page='page4';}
            if($tst=='Pre - Intervention Enquiry for RTTP'){$page='page30';}
            if($tst=='Pre - Intervention Enquiry for M&E'){$page='page22';}
            if($tst=='Pre - Intervention Enquiry for DIY'){$page='page27';}
            if($tst=='Pre-intervention Enquiry for FTTP'){$page='page4';}
            if($tst=='Call For initiating Utilisation'){$page='page54';}
        }
        if($tt=='OTask'){$indata[6]='';$indata[7]='';$indata[8]='';$indata[10]='';$page='';$tst='';$sid='';$pcode='';}
        $datet=$indata[0];
        $tid=$msid;
        
        $id=$this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        if($id){
            redirect('Menu/CreateTask');
        }else{
            print('Insert error ');
        }
    }
    public function modelreplacement(){
        $sid= $this->input->post('spd_id');
        $model= $this->input->post('model');
        $remark= $this->input->post('remark');
        $tid= $this->input->post('tid');
        
        $id=$this->Menu_model->model_replacement($tid,$sid,$model,$remark,$part_name);
        if($id){
            redirect('Menu/CreateReplacement');
        }else{
            print('Insert error ');
        }
    }
    public function modelrepair(){
        $sid= $this->input->post('spd_id');
        $model= $this->input->post('model');
        $remark= $this->input->post('remark');
        $part_name= $this->input->post('part_name');
        $tid= $this->input->post('tid');
        
        $id=$this->Menu_model->model_repair($tid,$sid,$model,$remark,$part_name);
        if($id){
            redirect('Menu/CreateRepair');
        }else{
            print('Insert error ');
        }
    }
    public function assignpiins(){
        $sid= $this->input->post('sid');
        $ins= $this->input->post('ins');
        $pi= $this->input->post('pi');
        $fid = $this->input->post('fid');
        $pcode = $this->input->post('pcode');
        
        $id=$this->Menu_model->assign_piins($sid,$ins,$pi,$fid,$pcode);
        if($id){
            redirect('Menu/AssignPerson');
        }else{
            print('Insert error ');
        }
    }
    public function assignpiinszh(){
        $sid= $this->input->post('sid');
        $ins= $this->input->post('ins');
        $pi= $this->input->post('pi');
        $zh= $this->input->post('zh');
        $fid = $this->input->post('fid');
        $pcode = $this->input->post('pcode');
        $mtype = $this->input->post('mtype');
        $datet = $this->input->post('datet');
        
        $tid='';
        $id=$this->Menu_model->assign_piinszh($sid,$ins,$pi,$fid,$pcode,$zh,$mtype,$datet,$tid);
        if($id){
            redirect('Menu/AssignPerson');
        }else{
            print('Insert error ');
        }
    }
    public function assigncp(){
        $cid= $this->input->post('cid');
        $cname= $this->input->post('cname');
        $pcode= $this->input->post('pcode');
        $sid= $this->input->post('sid');
        $ins= $this->input->post('ins');
        $pi= $this->input->post('pi');
        
        $userd=$this->Menu_model->get_user_byid($pi);
        $zh = $userd[0]->adminid;
        $id=$this->Menu_model->assigncptospd($sid,$ins,$pi,$zh,$cid,$cname,$pcode);
        if($id){
            redirect('Menu/handoverDetail');
        }else{
            print('Insert error ');
        }
    }
    public function IDSPDChange(){
        $sid = $this->input->post('sid');
        $sname = $this->input->post('sname');
        $slanguage = $this->input->post('slanguage');
        $total_teachers = $this->input->post('total_teachers');
        $total_students = $this->input->post('total_students');
        $boys = $this->input->post('boys');
        $girls = $this->input->post('girls');
        $saddress = $this->input->post('saddress');
        $spincode = $this->input->post('spincode');
        $scity = $this->input->post('scity');
        $sstate = $this->input->post('sstate');
        $contact_name = $this->input->post('contact_name');
        $contact_no = $this->input->post('contact_no');
        $pia = $this->input->post('pi');
        $ins = $this->input->post('ins');
        
        $this->Menu_model->Change_school_update($pia,$ins,$sid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no);
        redirect('Menu/ChangeIDSPD');
    }
    public function assignpiinszhforos(){
        $sid= $this->input->post('sid');
        $ins= $this->input->post('ins');
        $pi= $this->input->post('pi');
        $zh= $this->input->post('zh');
        $fid = $this->input->post('fid');
        $pcode = $this->input->post('pcode');
        $mtype = $this->input->post('mtype');
        $datet = $this->input->post('datet');
        
        $id=$this->Menu_model->assign_piinszhforos($sid,$ins,$pi,$fid,$pcode,$zh,$mtype,$datet);
        if($id){
            redirect('Menu/assignpersonforolds');
        }else{
            print('Insert error ');
        }
    }
    public function addspd(){
        $sname= $this->input->post('sname');
        $saddress=$this->input->post('saddress');
        $slocation=$this->input->post('slocation');
        $slanguage=$this->input->post('slanguage');
        $snoyear=$this->input->post('snoyear');
        $sayear=$this->input->post('sayear');
        $std=$this->input->post('std');
        $boys=$this->input->post('boys');
        $girls=$this->input->post('girls');
        $total_students=$this->input->post('total_students');
        $total_teachers=$this->input->post('total_teachers');
        $timing=$this->input->post('timing');
        $website=$this->input->post('website');
        $status=$this->input->post('status');
        
        $id=$this->Menu_model->add_spd($sname,$saddress,$slocation,$slanguage,$snoyear,$sayear,$std,$boys,$girls,$total_students,$total_teachers,$timing,$website,$status);
        if($id){
            redirect('Menu/spd_add');
        }else{
            print('Insert error ');
        }
    }
    public function sclinkpc(){
        $project_code= $this->input->post('project_code');
        $sname=$this->input->post('sname');
        $saddress=$this->input->post('saddress');
        $scity=$this->input->post('scity');
        $sstate=$this->input->post('sstate');
        
        $id=$this->Menu_model->add_spdwithpc($project_code,$sname,$saddress,$scity,$sstate);
        if($id){
            redirect('Menu/SchoolWithPC');
        }else{
            print('Insert error ');
        }
    }
    public function installmodel(){
        $model= $this->input->post('model');
        $ndel= $this->input->post('ndel');
        $nwork= $this->input->post('nwork');
        $que= $this->input->post('que');
        $remark= $this->input->post('remark');
        $indata= $this->input->post('indata');
        
        $this->Menu_model->add_installmodel($model,$ndel,$nwork,$que,$remark,$indata);
    }
    public function ans_1stttp(){
        $que= $this->input->post('que');
        $remark= $this->input->post('remark');
        $indata= $this->input->post('indata');
        
        $this->Menu_model->add_ans($que,$remark,$indata);
    }
    public function pcodebyyearnzhid(){
        $year= $this->input->post('year');
        $zhid= $this->input->post('user');
        
        $result=$this->Menu_model->get_pcodebyyearnzhid($year,$zhid);
        foreach($result as $d){
           echo  $data = '<option>'.$d->project_code.'</option>';
        }
        return $data;
    }
    public function MeetingRequest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mrequest=$this->Menu_model->get_mrequest();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/MeetingRequest', ['user'=>$user,'notify'=>$notify,'mrequest'=>$mrequest]);
        }else{
            redirect('Menu/main');
        }
    }
    public function Mytarget(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $mytarget=$this->Menu_model->get_mytarget($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/Mytarget', ['user'=>$user,'notify'=>$notify,'mytarget'=>$mytarget]);
        }else{
            redirect('Menu/main');
        }
    }
    public function MeetingStart($uid,$mid){
        
        $this->Menu_model->Meeting_Start($uid,$mid);
        redirect('Menu/MeetingRequest');
    }
    public function MytargetStart($uid,$mid){
        
        $this->Menu_model->Mytarget_Start($uid,$mid);
        redirect('Menu/Mytarget');
    }
    public function MeetingClose(){
        $mid = $this->input->post('taskid');
        $mcremark = $this->input->post('mcremark');
        
        $this->Menu_model->Meeting_Close($mid,$mcremark);
        redirect('Menu/MeetingRequest');
    }
    public function MytargetClose(){
        $mid = $this->input->post('taskid');
        $attch = $_FILES['attch']['name'];
        $count = sizeof($attch);
        $mcremark = $this->input->post('mcremark');
        
        $this->Menu_model->Mytarget_Close($mid,$mcremark,$attch,$count);
        redirect('Menu/Mytarget');
    }
     public function Mytargetchange(){
        $mid = $this->input->post('ttaskid');
        $ttchange = $this->input->post('ttchange');
        $mcremark = $this->input->post('cremark');
        
        $this->Menu_model->Mytarget_chnage($mid,$mcremark,$ttchange);
        redirect('Menu/Mytarget');
    }
    public function Reminder(){
        $tid = $this->input->post('tid');
        $uid = $this->input->post('uid');
        $mvid = $this->input->post('mvid');
        $remark = $this->input->post('remark');
        
        $this->Menu_model->add_Reminder($tid,$uid,$remark,$mvid);
        redirect('Menu/LiveVisit');
    }
    public function Appreciate(){
        $tid = $this->input->post('ttid');
        $uid = $this->input->post('uuid');
        $remark = $this->input->post('remark');
        
        $this->Menu_model->add_Appreciate($tid,$uid,$remark);
        redirect('Menu/LiveVisit');
    }
    public function programs(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $client=$this->Menu_model->get_handover();
        $zmpi=$this->Menu_model->get_user();
        $ally=$this->Menu_model->get_allyear();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/programs', ['user'=>$user,'notify'=>$notify,'client'=>$client,'zmpi'=>$zmpi,'ally'=>$ally]);
        }else{
            redirect('Menu/main');
        }
    }
    public function programtd($code,$cid,$cd){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $client=$this->Menu_model->get_handover();
        $zmpi=$this->Menu_model->get_user();
        $ally=$this->Menu_model->get_allyear();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/programtd', ['user'=>$user,'notify'=>$notify,'client'=>$client,'zmpi'=>$zmpi,'ally'=>$ally]);
        }else{
            redirect('Menu/main');
        }
    }
    public function noissues($tid,$sid,$page,$plaid){
     
     $this->Menu_model->no_issues($tid,$sid,$page,$plaid);
     redirect('Menu/visitlist/'.$page.'/'.$plaid);
    }
    public function PurposeNotAchieved($tid,$sid,$page,$plaid){
     
     $this->Menu_model->Purpose_NotAchieved($tid,$sid,$page,$plaid);
     redirect('Menu/Dashboard');
    }
    public function visitupdate(){
        $useruid = $this->input->post('useruid');
        $sid = $this->input->post('sid');
        $tid = $this->input->post('tid');
        $quen = $this->input->post('quen');
        $planid = $this->input->post('planid');
        $pageno = $this->input->post('pageno');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        
        if($quen=='Select Not Working Model'){
            $mtid = $this->input->post('mtid');
            $fgname = $this->input->post('fgname');
            $rrdetail = $this->input->post('rrdetail');
            $mqty = $this->input->post('mqty');
            $remark = $this->input->post('remark');
            $pname = $this->input->post('pmname');
            if(isset($_FILES['prerepair']['name'])) {
               $prerepair = $_FILES['prerepair']['name'];
            }else{$prerepair=0;}
            $this->Menu_model->Not_Working($useruid,$sid,$tid,$planid,$quen,$mtid,$fgname,$rrdetail,$mqty,$remark,$pname,$prerepair,$pageno);
            redirect('Menu/visitlist/'.$pageno.'/'.$planid);
        }
        if($quen=='Add More Media'){
            if(isset($_FILES['addmedia']['name'])) {
               $addmedia = $_FILES['addmedia']['name'];
               $dmcount = sizeof($addmedia);
            }else{$dmcount=0;$addmedia=0;}
            $this->Menu_model->add_media($useruid,$sid,$tid,$planid,$quen,$pageno,$dmcount,$addmedia);
            redirect('Menu/Dashboard');
        }
        if($quen=='Select Not Working Model on TTP'){
            $ttpnwm = $this->input->post('fgallnwcode');
        }else{$ttpnwm=0;}
        if($quen=='Call With Reporting Manager'){
            $mlink = $this->input->post('mlink');
        }else{$mlink=0;}
        if($quen=='Update School Information'){
            $sname = $this->input->post('sname');
            $slanguage = $this->input->post('slanguage');
            $total_teachers = $this->input->post('total_teachers');
            $total_students = $this->input->post('total_students');
            $boys = $this->input->post('boys');
            $girls = $this->input->post('girls');
            $saddress = $this->input->post('saddress');
            $spincode = $this->input->post('spincode');
            $scity = $this->input->post('scity');
            $sstate = $this->input->post('sstate');
            $contact_name = $this->input->post('contact_name');
            $contact_no = $this->input->post('contact_no');
           echo $sid;
           die;
            $sid = $this->Menu_model->school_update($useruid,$sid,$tid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no,$lat,$lng);
        }else{
            if($quen=='Model Counting by Barcode Scanning')
            {
                $fgallcode = $this->input->post('fgallcode');
            }
            elseif($quen=='Select Not Working Model')
            {
                $fgallcode = $this->input->post('fgallnwcode');
            }else{$fgallcode=0;}
            if(isset($_FILES['filname']['name'])) {
               $uptype = $this->input->post('uptype');
               $filname = $_FILES['filname']['name'];
               $count = sizeof($filname);
            }else{$count=0;$filname=0;$uptype=0;}
            $sid = $this->Menu_model->visit_update($useruid,$sid,$tid,$count,$filname,$quen,$lat,$lng,$fgallcode,$planid,$uptype,$ttpnwm,$mlink);
        }
        if($quen=='Select Not Working Model'){
            $plan = $this->Menu_model->get_plantaskbytid($tid);
            $planid = $plan[0]->id;
            redirect('Menu/NotWokingModel/'.$planid);
        }
        redirect('Menu/visitlist/'.$pageno.'/'.$planid);
    }
    public function call_checklist(){
        $tdatet=date('Y-m-d H:i:s');
        $tid = $this->input->post('ctid');
        $actontaken= $this->input->post('actontaken');
        if($actontaken=='no'){
            $actionnoremark= $this->input->post('actionnoremark');
            $this->db->query("INSERT INTO task_assign(from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster) select from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster from task_assign where id='$tid'");
            $ntid = $this->db->insert_id();
            $this->db->query("update task_assign set sdatet='$tdatet',task_date='$tdatet',plan='0' where id='$ntid'");
            $this->db->query("update plantask set actiontaken='No',purpose='No',donet='$tdatet',tdone='1',remark='$actionnoremark' where taskid='$tid'");
            
                   $task=$this->Menu_model->get_taskbyid($tid);
                   $sid = $task[0]->spd_id;
                   $ttype = $task[0]->task_type;
                   $tstype = $task[0]->task_subtype;
                   $spd = $this->Menu_model->get_spdbyid($sid);
                   $pi = $spd[0]->pi_id;
                   $zh = $spd[0]->zh_id;
                   $sname = $spd[0]->sname;
                   $pcode = $spd[0]->project_code;
                   $msg = $pcode." | ".$sname." | ".$ttype." | ".$tstype." | Action Tacken: No | Purpose Completed: No ";
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
            redirect('Menu/Dashboard');
        }
        if($actontaken=='yes'){
            $purposetaken= $this->input->post('purposetaken');
            if($purposetaken=='no'){
                $purposenoremark= $this->input->post('purposenoremark');
                $this->db->query("INSERT INTO task_assign(from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster) select from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster from task_assign where id='$tid'");
                $ntid = $this->db->insert_id();
                $this->db->query("update task_assign set sdatet='$tdatet',task_date='$tdatet',plan='0' where id='$ntid'");
                $this->db->query("update plantask set actiontaken='Yes',purpose='No',donet='$tdatet',tdone='1',remark='$purposenoremark' where taskid='$tid'");
                
                   $task=$this->Menu_model->get_taskbyid($tid);
                   $sid = $task[0]->spd_id;
                   $ttype = $task[0]->task_type;
                   $tstype = $task[0]->task_subtype;
                   $spd = $this->Menu_model->get_spdbyid($sid);
                   $pi = $spd[0]->pi_id;
                   $zh = $spd[0]->zh_id;
                   $sname = $spd[0]->sname;
                   $pcode = $spd[0]->project_code;
                   $msg = $pcode." | ".$sname." | ".$ttype." | ".$tstype." | Action Tacken: Yes | Purpose Completed: No ";
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
                redirect('Menu/Dashboard');
            }
            if($purposetaken=='yes'){
                $finalremark= $this->input->post('finalremark');
                $page= $this->input->post('checklist');
                $que= $this->input->post('que');
                $ansremark= $this->input->post('ansremark');
                $sel= $this->input->post('sel');
                $remat= $this->input->post('remat');
                $datein= $this->input->post('datein');
                $rate = $this->input->post('rate');
                
                if(isset($_FILES['attac']['name'])) {
                   $attac = $_FILES['attac']['name'];
                   $count = sizeof($attac);
                }else{$count=0;$attac=0;}
                $sid = $this->Menu_model->call_ans($que,$ansremark,$sel,$remat,$datein,$rate,$count,$tid,$page,$attac);
                $task=$this->Menu_model->get_taskbyid($tid);
                $touser = $task[0]->to_user;
                $ttype = $task[0]->task_type;
                $tstype = $task[0]->task_subtype;
                $this->db->query("update task_assign set lstttid=null where lstttid='$tid'");
                $this->db->query("update plantask set actiontaken='Yes',purpose='Yes',donet='$tdatet',tdone='1',remark='$finalremark' where taskid='$tid'");
                if($page=='page55'){
                    $sname = $this->input->post('sname');
                    $slanguage = $this->input->post('slanguage');
                    $total_teachers = $this->input->post('total_teachers');
                    $total_students = $this->input->post('total_students');
                    $boys = $this->input->post('boys');
                    $girls = $this->input->post('girls');
                    $saddress = $this->input->post('saddress');
                    $spincode = $this->input->post('spincode');
                    $scity = $this->input->post('scity');
                    $sstate = $this->input->post('sstate');
                    $contact_name = $this->input->post('contact_name');
                    $contact_no = $this->input->post('contact_no');
                    $visitr = $this->input->post('visitr');
                    $dodm = $this->input->post('dodm');
                    $sid = $this->Menu_model->call_school_update($sid,$tid,$sname,$slanguage,$total_teachers,$total_students,$boys,$girls,$saddress,$spincode,$scity,$sstate,$contact_name,$contact_no,$visitr,$dodm);
                }
                   $spd = $this->Menu_model->get_spdbyid($sid);
                   $pi = $spd[0]->pi_id;
                   $zh = $spd[0]->zh_id;
                   $sname = $spd[0]->sname;
                   $pcode = $spd[0]->project_code;
                   $msg = $pcode." | ".$sname." | ".$ttype." | ".$tstype;
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$pi','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','$zh','$sid')");
                   $this->db->query("INSERT INTO notification (msg,userid, sid) VALUES ('$msg','1','$sid')");
                $this->db->query("INSERT INTO schoollogs (sid, task_type, remark, taskid) VALUES ('$sid','$ttype','$tstype','$tid')");
                if($page=='page6' || $page=='page26'){
                    $plan = $this->Menu_model->get_plantaskbytid($tid);
                    $planid = $plan[0]->id;
                    redirect('Menu/NotWokingModel/'.$planid);
                }
                else{
                    redirect('Menu/Dashboard');
                }
            }
        }
    }
    public function ans_checklist(){
        if (isset($_POST['model'])) {
        $model= $this->input->post('model');
        $ndel= $this->input->post('ndel');
        $nwork= $this->input->post('nwork');
        }elseif(isset($_POST['mtype'])){
            $mtype= $this->input->post('mtype');
            $nwork= $this->input->post('nwork');
            
            $model=$this->Menu_model->get_modelbytype($mtype);
        }
        else{$model=0;$ndel=0;$nwork=0;}
        if(isset($_POST['yn'])){$yn= $this->input->post('yn');}
        else{$yn='Yes';}
        $sid= $this->input->post('sid');
        $que= $this->input->post('que');
        $tid= $this->input->post('tid');
        $mid= $this->input->post('mid');
        $ansremark= $this->input->post('ansremark');
        $sel= $this->input->post('sel');
        $remat= $this->input->post('remat');
        $datein= $this->input->post('datein');
        $page= $this->input->post('page');
        
        if(isset($_POST['filname'])) {$filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/ansupload/';
        $flink = $this->Menu_model->muploadfile($filname, $uploadPath);
        }else{$flink=0;}
        $this->Menu_model->add_anscl($sid,$que,$ansremark,$sel,$remat,$datein,$flink,$tid,$model,$ndel,$nwork,$page,$yn);
        $taskd=$this->Menu_model->get_taskdetail($page);
        if($taskd!=''){
        $ptd=$this->Menu_model->get_taskbyid($tid);
        $pcode = $ptd[0]->project_code;
        $toud=$this->Menu_model->get_spdbyid($sid);
        $piid = $toud[0]->pi_id;
        $zhid = $toud[0]->zh_id;
        $insid = $toud[0]->ins_id;
        $tt = $taskd[0]->taction;
        $tst = $taskd[0]->tname;
        $page = $taskd[0]->page;
        $dep = $taskd[0]->dep;
        if($dep==2){$pi=$piid;}
        if($dep==4){$pi=$insid;}
        if($dep==11){$pi=$zhid;}
        $fid=1;
        $tid='';
        $datet=date('Y-m-d H:i:s');
        $id=$this->Menu_model->autotask($sid,$pi,$fid,$pcode,$tt,$tst,$page,$datet,$tid);
        }
        if($nwork!=0){
            redirect('Menu/NotWokingModel/'.$mid);
        }
        redirect('Menu/Dashboard');
    }
    public function tasksc(){
        $tid= $this->input->post('tid');
        $sid= $this->input->post('sid');
        $ansremark= $this->input->post('ansremark');
        $sel= $this->input->post('sel');
        $remat= $this->input->post('remat');
        $datein= $this->input->post('datein');
        $page= $this->input->post('page');
        
        if(isset($_POST['filname'])) {$filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/ansupload/';
        $flink = $this->Menu_model->muploadfile($filname, $uploadPath);
        }else{$flink=0;}
        $this->Menu_model->add_anscl($sid,$que,$ansremark,$sel,$remat,$datein,$flink,$tid,$model,$ndel,$nwork,$page,$yn);
        if($nwork!=0){
            redirect('Menu/NotWokingModel/'.$mid);
        }
        redirect('Menu/Dashboard');
    }
    public function modelnwrr(){
        if (isset($_POST['replace'])) {
        $replace= $this->input->post('replace');
        }else{$replace=0;}
        if (isset($_POST['repair'])) {
        $repair= $this->input->post('repair');
        }else{$repair=0;}
        if (isset($_POST['repaired'])) {
        $repaired= $this->input->post('repaired');
        }else{$repaired=0;}
        $filname= $this->input->post('filname');
        $mname= $this->input->post('mname');
        $sid= $this->input->post('sid');
        $tid= $this->input->post('tid');
        
        $this->Menu_model->add_modelnwrr($sid,$tid,$replace,$repair,$repaired,$filname,$mname);
        redirect('Menu/RepairePartName/'.$tid);
    }
    public function modelpartremrk(){
        $part= $this->input->post('part');
        $remark= $this->input->post('remark');
        $rremark= $this->input->post('rremark');
        $sid= $this->input->post('sid');
        $tid= $this->input->post('tid');
        
        $this->Menu_model->add_mpartremrk($sid,$tid,$part,$remark,$rremark);
        redirect('Menu/useBagMaterial/'.$tid);
    }
    public function oldschooldata(){
        $indata= $this->input->post('indata');
        
        $sid = $this->Menu_model->add_oldschool($indata);
        redirect('Menu/AddSchoolDetail', 'refresh');
    }
    public function editoldschooldata(){
        $indata= $this->input->post('indata');
        $sid= $this->input->post('sid');
        
        $this->Menu_model->edit_oldschool($indata,$sid);
        redirect('Menu/Dashboard');
    }
    public function oldclientdata(){
        $indata= $this->input->post('indata');
        
        $this->Menu_model->add_oldclient($indata);
        redirect('Menu/search_client');
    }
    public function reportsubmit(){
        $indata= $this->input->post('indata');
        $na= $this->input->post('na');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/report/';
        
        $flink = $this->Menu_model->muploadfile($filname, $uploadPath);
        $this->Menu_model->add_report($indata,$flink,$na);
        redirect('Menu/AddReport');
    }
    public function utilisationsubmit(){
        $na= $this->input->post('na');
        $indata= $this->input->post('indata');
        if($na[0]=='YES'){$filname = $_FILES['filname']['name'];}
        if($na[1]=='YES'){$waimage = $_FILES['waimage']['name'];}
        if($na[2]=='YES'){$wavideo = $_FILES['wavideo']['name'];}
        
        if($indata[3]=='Utilisation'){
            if($na[1]=='YES'){
            $count = sizeof($waimage);
            $this->Menu_model->add_wgdata($indata[4],$indata[2],$indata[0],$indata[1],$waimage,$indata[3],$count,$indata[3]);
            }
            if($na[2]=='YES'){
            $count = sizeof($wavideo);
            $this->Menu_model->add_wgvideo($indata[4],$indata[2],$indata[0],$indata[1],$wavideo,$indata[3],$count,$indata[3]);
            }
            redirect('Menu/AddUtilisation');
        }else{
            $uploadPath = 'uploads/report/';
            if($na[1]=='YES'){
            $count = sizeof($waimage);
            $this->Menu_model->add_wgdata($indata[4],$indata[2],$indata[0],$indata[1],$waimage,$indata[3],$count,$indata[3]);
            }
            if($na[2]=='YES'){
            $count = sizeof($wavideo);
            $this->Menu_model->add_wgvideo($indata[4],$indata[2],$indata[0],$indata[1],$wavideo,$indata[3],$count,$indata[3]);
            }
            if($na[0]=='YES'){
            $flink=$this->Menu_model->muploadfile($filname, $uploadPath);
            $this->Menu_model->add_ureport($indata, $flink);
            }
            redirect('Menu/AddUtilisation');
        }
    }
    public function handoverfm(){
        $btn = $this->input->post('btn');
        
        $this->Menu_model->pm_tofm($btn);
        redirect('Menu/handoverDetail');
    }
    public function totaltask(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_taskassign();
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/totaltask', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate]);
    }
    public function AssBDRequest(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $departmet = $_POST['departmet'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $departmet=2;
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/AssBDRequest', ['notify'=>$notify,'user'=>$user,'sd'=>$sd, 'ed'=>$ed,'sdate'=>$sdate,'edate'=>$edate,'departmet'=>$departmet]);
    }
     public function BDRDetail($rid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BDRDetail.php', ['notify'=>$notify,'user'=>$user,'rid'=>$rid]);
    }
    public function UserTaskDetail(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $departmet = $_POST['departmet'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $departmet=2;
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/UserTaskDetail', ['notify'=>$notify,'user'=>$user,'sd'=>$sd, 'ed'=>$ed,'sdate'=>$sdate,'edate'=>$edate,'departmet'=>$departmet]);
    }
    public function UserPendingTask(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $departmet = $_POST['departmet'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $departmet=2;
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/UserPendingTask', ['notify'=>$notify,'user'=>$user,'sd'=>$sd, 'ed'=>$ed,'sdate'=>$sdate,'edate'=>$edate,'departmet'=>$departmet]);
    }
    public function replan(){
        
        $this->Menu_model->get_replan();
    }
    public function ttaskuser($date,$tasktype){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_ttaskbyuser($date,$tasktype);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ttaskuser', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'tasktype'=>$tasktype,'date'=>$date,'tasktype'=>$tasktype]);
    }
    public function taskdetaildw($piid,$sd,$ed,$aid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/taskdetaildw', ['notify'=>$notify, 'user'=>$user,'piid'=>$piid,'sd'=>$sd,'ed'=>$ed,'aid'=>$aid]);
    }
    public function taskdetailbyuser($depid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $all=0;
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $all=1;
        }
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $depu=$this->Menu_model->get_user($depid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/taskdetailbyuser', ['notify'=>$notify,'user'=>$user,'depu'=>$depu,'depid'=>$depid,'sdate'=>$sdate, 'edate'=>$edate,'all'=>$all]);
    }
     public function startdayreview($uid,$ttype){
        
        $this->Menu_model->start_dayreview($uid,$ttype);
        redirect('Menu/DayStartCheck');
    }
    public function closedayreview($rid){
        
        $this->Menu_model->close_dayreview($rid);
        redirect('Menu/DayStartCheck');
    }
    public function TDetail($touid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/TDetail', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed,'touid'=>$touid]);
    }
    public function Utilisationbydate(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Utilisationbydate', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function BWDTASKTracking(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BWDTASKTracking', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function StatusNW(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/StatusNW', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function TTDetail($sd,$ed){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/TTDetail', ['notify'=>$notify,'user'=>$user,'sd'=>$sd,'ed'=>$ed]);
    }
    public function DTDetail($touid,$sd,$ed,$code){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DTDetail', ['notify'=>$notify,'user'=>$user,'sd'=>$sd,'ed'=>$ed, 'code'=>$code,'touid'=>$touid]);
    }
    public function DTDetail1(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DTDetail1', ['notify'=>$notify,'user'=>$user]);
    }
    public function TeamNextDayPlan(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/TeamNextDayPlan', ['notify'=>$notify,'user'=>$user,'sd'=>$sd,'ed'=>$ed]);
    }
    public function NextDayPlan(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/NextDayPlan', ['notify'=>$notify,'user'=>$user,'sd'=>$sd,'ed'=>$ed]);
    }
    public function LiveVisit(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveVisit', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveVisitPIA(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveVisitPIA', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveVisitIMP(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveVisitIMP', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveTaskTracking(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveTaskTracking', ['notify'=>$notify,'user'=>$user]);
    }
    public function MasterPIALiveTask(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/MasterPIALiveTask', ['notify'=>$notify,'user'=>$user]);
    }
    public function LivePIATaskTracking(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LivePIATaskTracking', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveINSTaskTracking(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveINSTaskTracking', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveProgramTaskTracking(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveProgramTaskTracking', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveSchoolTaskTracking(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveSchoolTaskTracking', ['notify'=>$notify,'user'=>$user]);
    }
    public function HandoverForm($cid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata=$this->Menu_model->get_clientbyid($cid);
        $mdc=$this->Menu_model->get_clientacbyid($cid);
        $spdc=$this->Menu_model->get_schoolbycid($cid);
        $budget=$this->Menu_model->get_budget($cid);
        $md = $mdata[0];
        $mdc = $mdc[0];
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/HandoverForm', ['budget'=>$budget,'spdc'=>$spdc,'cid'=>$cid,'md'=>$md,'mdc'=>$mdc,'notify'=>$notify,'user'=>$user]);
    }
    public function HandoverForms($cid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata=$this->Menu_model->get_clientbyid($cid);
        $mdc=$this->Menu_model->get_clientacbyid($cid);
        $spdc=$this->Menu_model->get_schoolbycid($cid);
        $budget=$this->Menu_model->get_budget($cid);
        $md = $mdata[0];
        $mdc = $mdc[0];
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/HandoverForms', ['budget'=>$budget,'spdc'=>$spdc,'cid'=>$cid,'md'=>$md,'mdc'=>$mdc,'notify'=>$notify,'user'=>$user]);
    }
     public function Handovertoinsr($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Handovertoinsr', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
     public function Handovertoinsropp($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Handovertoinsropp', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
     public function BackdropPrinting($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BackdropPrinting', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function UManualPrinting($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/UManualPrinting', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function TManualPrinting($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/TManualPrinting', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Purchaseinitiate($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Purchaseinitiate', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Prepairing($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Prepairing', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function installreview($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/installreview', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Packing($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Packing', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Dispatchedfromfac($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Dispatchedfromfac', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Logesticinfo($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Logesticinfo', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function EwaybillInfo($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/EwaybillInfo', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function DeliveryProcess($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DeliveryProcess', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function BDRCallSchool($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BDRCallSchool', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function donedelivery($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/donedelivery', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function RIDDetail($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/RIDDetail', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
     public function SGraph1($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph1', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph2($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph2', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph3($clid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph3', ['clid'=>$clid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph4($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph4', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph5($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph5', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph6($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph6', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph7($stid){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph7', ['stid'=>$stid,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph8($total_students){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph8', ['total_students'=>$total_students,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph9($total_students){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph9', ['total_students'=>$total_students,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SGraph10($code){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SGraph10', ['code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function PGraph1($total_students){
        $code=1;
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/PGraph1', ['total_students'=>$total_students,'code'=>$code,'notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SchoolBox1($pid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($pid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SchoolBox1', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function atgraph1($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/atgraph1', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function piaatgraph(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/piaatgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function insatgraph(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/insatgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function attimegraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/attimegraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function tpnpgraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/tpnpgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function tntoplangraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/tntoplangraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function planbninsgraph(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/planbninsgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function insbnexegraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/insbnexegraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function aypybyusergraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/aypybyusergraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function aypnbyusergraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/aypnbyusergraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function anpnbyusergraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/anpnbyusergraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function ndtpgraph(){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $sdate = new DateTime($sdate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ndtpgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'sd'=>$sd,]);
    }
    public function uplanbnexegraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/uplanbnexegraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function wtdonesdgraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/wtdonesdgraph', ['notify'=>$notify,'user'=>$user,'uid'=>$uid,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function anpngraph($uid){
        if(isset($_POST['sdate'])){
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        }
        else{
            $sdate = "2023-04-01";
            $edate = date('Y-m-d');
        }
        $sd=$sdate;
        $ed=$edate;
        $sdate = new DateTime($sdate);
        $edate = new DateTime($edate);
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($uid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/anpngraph', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'sd'=>$sd,'ed'=>$ed]);
    }
    public function SchoolBoxRcall($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($pid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SchoolBoxRcall', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function SchoolBoxIcall($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($pid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SchoolBoxIcall', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function SchoolBoxIvisit($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($pid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SchoolBoxIvisit', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function SchoolBoxDvisit($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata = $this->Menu_model->get_School($pid);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/SchoolBoxDvisit', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function DesignProcess($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DesignProcess', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function DesignProcesss($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DesignProcesss', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function PrintingProcess($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/PrintingProcess', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function Preparing($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/Preparing', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function installationvisitschool($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/installationvisitschool', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
     public function BDRequestCBox(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BDRequestCBox', ['notify'=>$notify,'user'=>$user]);
    }
    public function BDRequestPBox(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/BDRequestPBox', ['notify'=>$notify,'user'=>$user]);
    }
    public function ReportVisit(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ReportVisit', ['notify'=>$notify,'user'=>$user]);
    }
    public function ReportVisitPIA(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ReportVisitPIA', ['notify'=>$notify,'user'=>$user]);
    }
    public function ReportVisitIMP(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/ReportVisitIMP', ['notify'=>$notify,'user'=>$user]);
    }
    public function postfeed(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/postfeed', ['notify'=>$notify,'user'=>$user]);
    }
    public function LiveReportVisit($pid){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/LiveReportVisit', ['notify'=>$notify,'user'=>$user,'pid'=>$pid]);
    }
    public function DTTDetail($touid,$date,$code){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/DTTDetail', ['notify'=>$notify,'user'=>$user,'date'=>$date, 'code'=>$code,'touid'=>$touid]);
    }
    public function indtime(){
        $tid= $this->input->post('tid');
        
        $result=$this->Menu_model->in_dtime($tid);
        echo json_encode($result);
    }
    public function reviewdetail(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        if(isset($_POST['sdate'])){
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $zhid = $_POST['zhid'];
        }
        else{
            $sdate = date('Y-m-d');
            $edate = date('Y-m-d');
            $zhid=$uid;
        }
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $mdata=$this->Menu_model->get_reviewdetail($zhid,$sdate,$edate);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/reviewdetail', ['notify'=>$notify,'user'=>$user,'sdate'=>$sdate, 'edate'=>$edate,'mdata'=>$mdata]);
    }
    public function DailyReport(){
        if(isset($_POST['date'])){
        $date = $_POST['date'];
        $all=0;
        }
        else{
            $date = date('Y-m-d');
            $all=1;
        }
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/dailyreport', ['notify'=>$notify,'user'=>$user,'date'=>$date,'all'=>$all]);
    }
    public function totalutibyyear($year){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $uti=$this->Menu_model->get_wgdbyay($year);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/totalutibyyear', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'tasktype'=>$tasktype,'date'=>$date]);
    }
    public function totalutiyear(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $uti=$this->Menu_model->get_wgdgbay();
        $year=$this->Menu_model->all_year();
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/totalutiyear', ['notify'=>$notify,'user'=>$user,'uti'=>$uti,'year'=>$year]);
    }
    public function taskTracker($sdate,$edate,$tasktype,$touser){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_ttbydu($sdate,$edate,$tasktype,$touser);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/task-tracker', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'tasktype'=>$tasktype,'touser'=>$touser]);
    }
    public function taskTrackerna(){
            $sdate = $this->input->post('sdate');
            $edate = $this->input->post('edate');
            $tasktype = $this->input->post('tasktype');
            $touser = $this->input->post('touser');
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_ttbydu($sdate,$edate,$tasktype,$touser);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/task-tracker', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'tasktype'=>$tasktype,'touser'=>$touser]);
    }
    public function taskTrackernaa($sdate,$edate,$tasktype){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        $touser=$uid;
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_ttbydu($sdate,$edate,$tasktype,$touser);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $this->load->view($dep_name.'/task-tracker', ['notify'=>$notify,'data'=>$dt, 'user'=>$user,'sdate'=>$sdate,'edate'=>$edate,'tasktype'=>$tasktype,'touser'=>$touser]);
    }
    public function taskDetail(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        $btn = $this->input->post('btn');
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->task_Detail($btn);
        $dd=$this->Menu_model->get_taskassign_byid($btn);
        $ddt=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $ddt[0]->dep_name;
        $this->load->view($dep_name.'/task-detail', ['notify'=>$notify,'data'=>$dt,'mdata'=>$dd, 'user'=>$user]);
    }
    public function handoverToaccount(){
        $user = $this->session->userdata('user');
        $btn = $this->input->post('btn');
        
        $dt=$this->Menu_model->bd_toaccount($btn);
        $this->load->view('BD/bdtoacc', ['data'=>$dt, 'user'=>$user]);
    }
    public function addcont(){
        $sid= $this->input->post('sid');
        $uid= $this->input->post('uid');
        $contact_name=$this->input->post('contact_name');
        $designation=$this->input->post('designation');
        $contact_no=$this->input->post('contact_no');
        $email=$this->input->post('email');
        
        $id=$this->Menu_model->add_cont($sid,$contact_name,$designation,$contact_no,$email,$uid);
        redirect('Menu/school_detail/'.$sid);
    }
    public function setaction(){
        $taskid= $this->input->post('taskid');
        $date=$this->input->post('date');
        $uid=$this->input->post('uid');
        
        $task=$this->Menu_model->get_taskassign_byid($taskid);
        $sid = $task[0]->spd_id;
        $action = $task[0]->task_type;
        $id=$this->Menu_model->add_plantask($taskid,$date,$action,$uid,$sid);
        redirect('Menu/Dashboard');
    }
    public function bdrcomm(){
        $rid = $this->input->post('rid');
        $uuid = $this->input->post('uuid');
        $comment = $this->input->post('comment');
        
        $task=$this->Menu_model->get_bdrcom($rid,$uuid,$comment);
        redirect('Menu/AssBDRequest');
    }
    public function cctd(){
        $tid= $this->input->post('tid');
        
        $result=$this->Menu_model->get_cctd($tid);
        echo json_encode($result);
    }
    public function piidtoar(){
        $piid = $this->input->post('piid');
        
        $result=$this->Menu_model->get_piidtoar($piid);
        echo json_encode($result);
    }
    public function cctdp(){
        $tid= $this->input->post('tid');
        
        $result=$this->Menu_model->get_cctdp($tid);
        echo json_encode($result);
    }
    public function pagedata(){
        $page= $this->input->post('page');
        
        $result=$this->Menu_model->get_pagedata($page);
        echo json_encode($result);
    }
    public function addwag(){
        $waimage='';
        $sid= $this->input->post('sid');
        $waimage = $_FILES['waimage']['name'];
        $model= $this->input->post('model');
        $teacher= $this->input->post('teacher');
        $count = sizeof($waimage);
        $year=$this->input->post('year');
        $howmay = $this->input->post('howmay');
        $date = $this->input->post('date');
        $pi = $this->input->post('uid');
        $tid = $this->input->post('tid');
        $project_code= $this->input->post('project_code');
        $remark=$this->input->post('remark');
        $type="Utilisation";
        
        $id=$this->Menu_model->add_wgdata($date,$year,$project_code,$sid,$waimage,$remark,$count,$type,$howmay,$tid,$pi,$model,$teacher);
        redirect('Menu/Dashboard');
    }
    public function research(){
        $purposetaken= $this->input->post('purposetaken');
        $rtremark= $this->input->post('rtremark');
        $rrtid= $this->input->post('rrtid');
        
        $id=$this->Menu_model->add_research($rrtid,$purposetaken,$rtremark);
        redirect('Menu/Dashboard');
    }
    public function commwag(){
        $waimage='';
        $sid= $this->input->post('cosid');
        $waimage = $_FILES['waimage']['name'];
        $count = sizeof($waimage);
        $year=$this->input->post('year');
        $howmay = $this->input->post('howmay');
        $date = $this->input->post('date');
        $pi = $this->input->post('couid');
        $tid = $this->input->post('cotid');
        $project_code= $this->input->post('coproject_code');
        $remark=$this->input->post('remark');
        $type="Communication";
        
        $id=$this->Menu_model->add_commdata($date,$year,$project_code,$sid,$waimage,$remark,$count,$type,$howmay,$tid,$pi);
        redirect('Menu/Dashboard');
    }
    public function addcase(){
        $waimage='';
        $sid= $this->input->post('casid');
        $caimage = $_FILES['caimage']['name'];
        $count = sizeof($caimage);
        $year=$this->input->post('cayear');
        $howmay = $this->input->post('cahowmay');
        $date = $this->input->post('cadate');
        $pi = $this->input->post('cauid');
        $tid = $this->input->post('catid');
        $project_code= $this->input->post('caproject_code');
        $remark=$this->input->post('remark');
        $type="CaseStudy";
        
        $id=$this->Menu_model->add_casedata($date,$year,$project_code,$sid,$caimage,$remark,$count,$type,$howmay,$tid,$pi);
        redirect('Menu/Dashboard');
    }
    public function addcomm(){
        $waimage ='';
        $sid= $this->input->post('sid');
        $waimage = $_FILES['waimage']['name'];
        $count = 1;
        $year=$this->input->post('year');
        $howmay = 0;
        $date = $this->input->post('date');
        $yn = 'Yes';
        $pi = $this->input->post('pi');
        $tid = $this->input->post('tid');
        $project_code= $this->input->post('project_code');
        $remark=$this->input->post('remark');
        $type="Communication";
        
        $this->Menu_model->add_wgdata($date,$year,$project_code,$sid,$waimage,$remark,$count,$type,$yn,$howmay,$tid,$pi);
        redirect('Menu/school_detail/'.$sid);
    }
    public function addurwag(){
        $que=$this->input->post('que');
        $rat1=$this->input->post('rat1');
        $urtid=$this->input->post('urtid');
        $tid = $this->input->post('tid');
        $remark=$this->input->post('remark');
        
        $id=$this->Menu_model->add_wgurdata($urtid,$tid,$remark,$que,$rat1);
        redirect('Menu/Dashboard');
    }
    public function reportupload(){
        $sid= $this->input->post('rsid');
        $date=date('Y-m-d H:i:s');
        $project_code= $this->input->post('rpcode');
        $tid = $this->input->post('rtid');
        $pi = $this->input->post('ruid');
        $rremark = $this->input->post('rremark');
        $year = $this->input->post('year');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/report/';
        
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $type = $task[0]->task_subtype;
        $flink = $this->Menu_model->uploadfile($filname, $uploadPath);
        $this->Menu_model->addreport($date,$year,$project_code,$sid,$type,$tid,$pi,$flink,$rremark);
        redirect('Menu/Dashboard');
    }
    public function ForwardTask(){
        $id= $this->input->post('tid');
        $touser=$this->input->post('touser');
        $fromuser=$this->input->post('fromuser');
        
        $id=$this->Menu_model->forward_task($id,$touser,$fromuser);
        redirect('Menu/assigntask');
    }
    public function Checklist($page,$id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/checklist', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'page'=>$page,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
    public function callclist($page,$id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_pagedata($page);
        $pagename=$this->Menu_model->get_pagename($page);
        $pagename = $pagename[0]->tname;
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/callclist', ['pagename'=>$pagename,'notify'=>$notify,'pagedata'=>$dt, 'spd'=>$spd, 'user'=>$user,'page'=>$page, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
    public function visitlist($page,$id){
        $user         = $this->session->userdata('user');
        $data['user'] = $user;$uid = $user['id'];
        $did          =  $user['dep_id'];

        

        $notify   = $this->Menu_model->get_notifybyid($uid);
        $dd       = $this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt       = $this->Menu_model->get_pagedata($page);
        $pagename = $this->Menu_model->get_pagename($page);
        $vsitist  = $this->Menu_model->get_visitst($page);
        $pagename = $pagename[0]->tname;
        $plan     = $this->Menu_model->get_plantaskbyid($id);
        $sid      = $plan[0]->spd_id;
        $tid      = $plan[0]->taskid;
        $spd      =$this->Menu_model->get_school_detailbyid($sid);
        $task     =$this->Menu_model->get_taskassign_byid($tid);
        $vstupdate =$this->Menu_model->get_vstupdate($sid,$tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/visitlist', ['sid'=>$sid,'vstupdate'=>$vstupdate,'vsitist'=>$vsitist,'pagename'=>$pagename,'notify'=>$notify,'pagedata'=>$dt, 'spd'=>$spd, 'user'=>$user,'page'=>$page, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
     public function uputilisation($id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/uputilisation', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
    public function UpCommunication($id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/upcommunication', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
    public function UPRport($id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/uprport', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'mid'=>$id]);
    }
    public function UReview($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($pid);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $urtid=$task[0]->tid;
        $wgd=$this->Menu_model->get_wgdatabytid($urtid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/ureview', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'wgd'=>$wgd,'urtid'=>$urtid]);
    }
    public function CReview($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($pid);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $urtid=$task[0]->tid;
        $wgd=$this->Menu_model->get_wgdatabytid($urtid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/creview', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'wgd'=>$wgd,'urtid'=>$urtid]);
    }
    public function InsReview($pid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($pid);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $urtid=$task[0]->tid;
        $wgd=$this->Menu_model->get_wgdatabytid($urtid);
        $model=$this->Menu_model->get_model();
        $this->load->view($dep_name.'/InsReview', ['sid'=>$sid,'notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'wgd'=>$wgd,'urtid'=>$urtid]);
    }
    public function NotWokingModel($mid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($mid);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_modelbysnw($sid);
        $this->load->view($dep_name.'/notwokingmodel', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model]);
    }
    public function RepairePartName($id){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $did =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbytid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $model=$this->Menu_model->get_modelbyrepair($sid);
        $modelr=$this->Menu_model->get_modelbyreplace($sid);
        $this->load->view($dep_name.'/repairepartname', ['notify'=>$notify,'data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task,'tid'=>$tid,'model'=>$model,'modelr'=>$modelr]);
    }
    public function Checklist_MandE1st($id){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('PI/checkmne1', ['data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function Checklist_MandE($id){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('PI/checkmne2', ['data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function checklist_1stTTP($id){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('PI/check1stttp', ['data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function Maintenance_checklist($id){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $model=$this->Menu_model->get_model();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('Inst-&-Maint/maintenancechecklist', ['data'=>$dt, 'model'=>$model, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function checklist_TTP(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('PI/checkttp', ['data'=>$dt, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function checklist_rpm(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/rpm', ['data'=>$dt, 'user'=>$user]);
    }
    public function checklist_adnp(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/adnp', ['data'=>$dt, 'user'=>$user]);
    }
    public function checklist_delivery(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/delivery', ['data'=>$dt, 'user'=>$user]);
    }
    public function InstallationChecklist($id){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $model=$this->Menu_model->get_model();
        $plan=$this->Menu_model->get_plantaskbyid($id);
        $sid = $plan[0]->spd_id;
        $tid = $plan[0]->taskid;
        $spd=$this->Menu_model->get_school_detailbyid($sid);
        $task=$this->Menu_model->get_taskassign_byid($tid);
        $this->load->view('Inst-&-Maint/installation-checklist', ['data'=>$dt, 'model'=>$model, 'spd'=>$spd, 'user'=>$user, 'plan'=>$plan, 'task'=>$task]);
    }
    public function school_identification(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/schoolidentification', ['data'=>$dt, 'user'=>$user]);
    }
    public function final_mnet(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/final-mnet)', ['data'=>$dt, 'user'=>$user]);
    }
    public function final_mnes(){
        $user = $this->session->userdata('user');
        
        $dt=$this->Menu_model->get_question();
        $this->load->view('Admin/final-mnes)', ['data'=>$dt, 'user'=>$user]);
    }
    public function register(){
        $name= $this->input->post('fullname');
        $user=$this->input->post('user');
        $password=$this->input->post('password');
        
        $id=$this->Menu_model->add_data($name,$user,$password);
        if($id){
            redirect('Menu/admin');
        }else{
            print('Insert error ');
        }
    }
    public function Dashboard(){
        date_default_timezone_set('Asia/Kolkata');

        if (isset($_POST['submit'])) {
            $tdate = $_POST['filterdate'];
        }else{
           $tdate = date("Y-m-d");
        }
        $user           = $this->session->userdata('user');
        $data['user']   = $user;
        $uid            = $user['id'];
        $id             = $user['dep_id'];
        $user_day       = $this->Menu_model->get_daydetail($uid,date("Y-m-d"));

        if(empty($user_day) && count($user_day)<= 0){
            $this->session->set_flashdata('error_message','* Please Start Your Day');
            redirect('Menu/DayManagement');
        }
        else{
            $data['uid']        = $uid;       
            $notify             = $this->Menu_model->get_notifybyid($uid);
            $data['dt']         = $this->Menu_model->get_depatment_byid($id);
        // $data['spd']       = $this->Menu_model->get_mspd();
            $data['status']     = $this->Menu_model->get_spdsbypi($uid);
            $data['zhspd']      = $this->Menu_model->get_spdsbyzh($uid);
            $data['pmspd']      = $this->Menu_model->get_spdsbypm();
            $data['td']         = $this->Menu_model->get_tdetail($uid,$tdate);
        //   $data['program']    = $this->Menu_model->get_handover();
            $data['bdr']        = $this->Menu_model->get_bdreqest($uid);
            $data['bdrzh']      = $this->Menu_model->get_bdreqestzh($uid);
            $data['dep_name']   = $data['dt'][0]->dep_name;
            if($data['dep_name'] == "Program-Manager"){
                $data['bdrequest']  =  $this->load->view('bdrequest_data');
            // $data['bdrequest']  =  $this->load->view();
            }
            $data['utype'] =  $data['dt'][0]->id;
            if(!empty($user)){
                $this->display($data['dep_name'].'/index',$data);
            }else{
                redirect('Menu/main');
            }
        }
    }
    
    public function taskExecution(){
            
            $taskId                    = $_POST['taskId'];
            $taskType                  = $_POST['tasktype'];
            $tasktypeid                = $_POST['tasktype_id'];
            $taskDetails               = $this->Menu_model->getTaskDetails($taskId,$tasktypeid);
            $user                      = $_SESSION['user']['user_name'];
            $user_id                   = $_SESSION['user']['id'];
            $dept                      = $_SESSION['user']['dep_id'];
            $data['taskType']          = $taskType;
            $data['taskDetails']       = $taskDetails;
            $data['taskstatus']        = "Initiate";
            $viewname                  = $taskType."View";
            $data['taskId']            = $taskId;
            $data['taskType']          = $taskType;
            $data['tasktypeid']        = $tasktypeid;
            $data['formdata']          = $this->Menu_model->getViewFormData($tasktypeid,$dept);
            // echo $viewname;exit;
            // echo $this->db->last_query();exit;  
            // dd($data);
            // $viewname = "PreInaugurationVisit";
            $this->load->view("common/".$viewname,$data);
    }

    public function Dashboard1(){
        date_default_timezone_set('Asia/Kolkata');
        if (isset($_POST['submit'])) {
            $tdate = $_POST['filterdate'];
        }else{
           $tdate = date("Y-m-d");
        }
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify    =   $this->Menu_model->get_notifybyid($uid);
        $dt        =   $this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspd();
        $status=$this->Menu_model->get_spdsbypi($uid);
        $zhspd=$this->Menu_model->get_spdsbyzh($uid);
        $pmspd=$this->Menu_model->get_spdsbypm();
        $td=$this->Menu_model->get_tdetail($uid,$tdate);
        $program=$this->Menu_model->get_handover();
        $bdr=$this->Menu_model->get_bdreqest($uid);
        $bdrzh=$this->Menu_model->get_bdreqestzh($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/index1', ['pmspd'=>$pmspd,'zhspd'=>$zhspd,'bdrzh'=>$bdrzh,'spd'=>$spd, 'user'=>$user,'notify'=>$notify,'program'=>$program,'status'=>$status,'td'=>$td,'tdate'=>$tdate,'bdr'=>$bdr,'uid'=>$uid]);
        }else{
            redirect('Menu/main');
        }
    }
    
public function updateTask($tasktypeid=''){
    $post_data          = $_POST;
    $taskname           = $_POST['taskType'];
    $tasktypeid         = $_POST['tasktypeid'];
    $taskid             = $_POST['taskId'];
   
    // to get the task type & accordingly update the task 
    //to set the pattern for all tables, tblcallevents , task_execution_details , 
      if($taskname == "PreInaugurationVisit"){
          $taskData                  = '';
         // $updateQuery             = $this->Menu_model->updateTasksById($taskid,$post_data);
          $this->Menu_model->insertIntoInauguration($taskid,$post_data);
      }
     else if($tasktypeid == "22"){
        $taskid                                   = $this->input->post("taskId"); 
        $tblcalleventsdata['task_status']         = $this->input->post("status"); 
        $tblcalleventsdata['updated_datetime']    = date("Y-m-d h:i:s");
        $this->Menu_model->updateTasksById($taskid,$tblcalleventsdata);

        $taskexecutionDetails   =   [];
        $taskInsertArr          =   []; // Initialize an empty array

        foreach ($post_data as $key => $val) {      
            if (strpos($key, "taskexe") !== false) {
                foreach ($val as $k => $v) {
                $taskexecutionDetails = [    // Initialize the array inside the loop
                    'main_task_id'      => $v,
                    'task_response'     => '1',
                    'performed_by'      => $_SESSION['user']['id'],
                    'updated_at'        => date("Y-m-d H:i:s") // Correct time format to 24-hour format
                ];
            $taskInsertArr[] = $taskexecutionDetails; // Add each entry separately
                    }
                }
            }       

        // If batch insert is supported
        if (!empty($taskInsertArr)) {
            $this->Menu_model->batch_insert_task_execution($taskInsertArr);
            echo json_encode(["status" => "success"]);

        }
    }
  
    // if(array_key_exists('task_id',$post_data)){
    //     $taskid                                 = $post_data['task_id'];
    //     unset($post_data['task_id']);
    //     unset($post_data['taskname']);
    //     $updateQuery                            = $this->Menu_model->updateTasksById($taskid,$post_data);
    //     if(isset($_FILES)){
    //           $uploadPath                       = "uploads/Visit/";
    //           $post_data['attachment_link']     = $this->uploadFile($_FILES[$taskname],$uploadPath);
    //           // $updateQuery                   = $this->Menu_model->updateTasksById($taskid,$post_data); 
    //           $post_data['task_id']             = $taskid;
    //           $updateWithAttachemnts            = $this->Menu_model->insertTasksWithAttachements($post_data);
    //       }
    //   }
  }
  
  public function uploadFile($data,$uploadPath){
        $_FILES['file']['name']      = $data['name'];
        $_FILES['file']['type']      = $data['type'];
        $_FILES['file']['tmp_name']  = $data['tmp_name'];
        $_FILES['file']['error']     = $data['error'];
        $_FILES['file']['size']      = $data['size'];
      
        // Generate a unique file name using the current timestamp and original file extension
        $extension                = pathinfo($data['name'], PATHINFO_EXTENSION); // Get file extension
        $uniqueFileName           = date("Y-m-d").time() . '_' . uniqid() . '.' . $extension; // Generate unique name
        $uploadPath               = 'uploads/Visit/';
  
        $config['upload_path']    = $uploadPath;
        $config['allowed_types']  = '*';
        $config['file_name']      = $uniqueFileName;
  
        // Load the upload library and perform the upload
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')){
            $uploadData = $this->upload->data(); // Uploaded file data
            $filename   = $uploadData['file_name'];
            $fpn        = $uploadPath . $filename; // Return the full path of the uploaded file
            return $fpn;
        } else {
            $error      = array('error' => $this->upload->display_errors());
            $cuser      = $this->session->userdata('user');
            $cuid       = $cuser['user_id'];
            return $fpn = $uploadPath;
        }
  }
  
  public function loadTaskViewPage($viewname,$data){
     $viewData = $this->load->view($viewname,$data);
     return $viewData;
  }
  
  public function display($viewname,$data){
      $this->load->view('templates/header');
      $this->load->view('templates/nav',$data);
      $this->load->view($viewname,$data);
      $this->load->view('templates/footer');
  }
  
    public function TeamDailyReport($date){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_mspd();
        $status=$this->Menu_model->get_spdsbypi($uid);
        $zhspd=$this->Menu_model->get_spdsbyzh($uid);
        $td=$this->Menu_model->get_tdetail($uid,$date);
        $program=$this->Menu_model->get_handover();
        $bdr=$this->Menu_model->get_bdreqest($uid);
        $bdrzh=$this->Menu_model->get_bdreqestzh($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/TeamDailyReport', ['zhspd'=>$zhspd,'bdrzh'=>$bdrzh,'spd'=>$spd, 'user'=>$user,'notify'=>$notify,'program'=>$program,'status'=>$status,'td'=>$td,'date'=>$date,'bdr'=>$bdr]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRequestBox(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $userd=$this->Menu_model->get_user();
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $BDRBox1 = $this->Menu_model->get_BDRBox1();
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRequestBox', ['BDRBox1'=>$BDRBox1,'user'=>$user,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRBox2($rtype){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRBox2', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRBoxPending($rtype){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRBoxPending', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRBoxComp($rtype){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRBoxComp', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRBox3($bdrid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRBox3', ['bdrid'=>$bdrid,'user'=>$user,'notify'=>$notify]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRPending(){
        $code = 1;
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $BDRPRT=$this->Menu_model->get_BDRPRT();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRPending', ['user'=>$user,'notify'=>$notify,'BDRPRT'=>$BDRPRT]);
        }else{
            redirect('Menu/main');
        }
    }
    public function BDRSDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $BDRPRT=$this->Menu_model->get_BDRPRT();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/BDRSDetail', ['user'=>$user,'notify'=>$notify,'BDRPRT'=>$BDRPRT]);
        }else{
            redirect('Menu/main');
        }
    }
    public function bdrapending(){
        $code            = 1;
        $user            = $this->session->userdata('user');
        $data['user']    = $user;$uid= $user['id'];
        $uid             = $user['id'];
        $id              =  $user['dep_id'];
        
        $notify          = $this->Menu_model->get_notifybyid($uid);
        $dt              = $this->Menu_model->get_depatment_byid($id);
        $bdr             = $this->Menu_model->get_bdrbyd($code);
        $bdrcount        = $this->Menu_model->get_bdrcount();
        $dep_name        = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/bdrapending', ['user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount]);
        }else{
            redirect('Menu/main');
        }
    }
    public function allbdrequest(){
        $code = 1 ;
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $bdr=$this->Menu_model->get_bdrbyd($code);
        $bdrcount=$this->Menu_model->get_bdrpiacount($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/allbdrequest', ['user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount]);
        }else{
            redirect('Menu/main');
        }
    }
   
    public function bdrequestlogs($rid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $bdrlogs=$this->Menu_model->get_bdrlogdetails($rid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/bdrequestlogs', ['user'=>$user,'notify'=>$notify,'bdrlogs'=>$bdrlogs]);
        }else{
            redirect('Menu/main');
        }
    }
    public function bdtaskdetail($rtype){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $bdr=$this->Menu_model->get_bdrbypia($uid);
        $bdrcount=$this->Menu_model->get_bdrcount();
        $reqData        = $this->Menu_model->GetBDRequestALLInfoBYRequestCode($rtype);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/bdtaskdetail', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount,'reqData'=>$reqData]);
        }else{
            redirect('Menu/main');
        }
    }
    public function totalcd(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $client=$this->Menu_model->get_handover();
        $zmpi=$this->Menu_model->get_user();
        $ally=$this->Menu_model->get_allyear();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/totalcd', ['user'=>$user,'notify'=>$notify,'client'=>$client,'zmpi'=>$zmpi,'ally'=>$ally]);
        }else{
            redirect('Menu/main');
        }
    }
    public function ProgramDetail(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $client=$this->Menu_model->get_handover();
        $zmpi=$this->Menu_model->get_user();
        $ally=$this->Menu_model->get_allyear();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/programdetail', ['user'=>$user,'notify'=>$notify,'client'=>$client,'zmpi'=>$zmpi,'ally'=>$ally]);
        }else{
            redirect('Menu/main');
        }
    }
    public function DownloadChecklist(){
        $sid = $_GET['sid'];
        $tid = $_GET['tid'];
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_spdbyid($sid);
        $ans=$this->Menu_model->get_ans($sid,$tid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/downloadchecklist', ['notify'=>$notify,'spd'=>$spd, 'ans'=>$ans, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function validateOldSPD(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        if(isset($_POST['pcode']))
        {
            $pcode = $_POST['pcode'];
            if($pcode=='All'){
                $user_id = $_POST['user_id'];
                
                $notify=$this->Menu_model->get_notifybyid($uid);
                $dt=$this->Menu_model->get_depatment_byid($id);
                $spd=$this->Menu_model->get_spdbypiid($user_id);
                $dep_name = $dt[0]->dep_name;
                if(!empty($user)){
                    $this->load->view($dep_name.'/validateoldspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
                }else{
                    redirect('Menu/main');
                }
            }else{
                
                $notify=$this->Menu_model->get_notifybyid($uid);
                $dt=$this->Menu_model->get_depatment_byid($id);
                $spd=$this->Menu_model->get_spdbypc($pcode);
                $dep_name = $dt[0]->dep_name;
                if(!empty($user)){
                    $this->load->view($dep_name.'/validateoldspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
                }else{
                    redirect('Menu/main');
                }
            }
        }
        else
        {
            
            $notify=$this->Menu_model->get_notifybyid($uid);
            $dt=$this->Menu_model->get_depatment_byid($id);
            $spd=$this->Menu_model->get_spd();
            $dep_name = $dt[0]->dep_name;
            if(!empty($user)){
                $this->load->view($dep_name.'/validateoldspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
            }else{
                redirect('Menu/main');
            }
        }
    }
    public function rejectedSPD(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_spd();
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/rejectedspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function rejectedSPDbyuer($uid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_spdbypiid($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/rejectedspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function uncheckedSPDbyuer($uid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_spdbypiid($uid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/uncheckedspd', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function apprReject($sid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $spd=$this->Menu_model->get_spdbyid($sid);
        $dep_name = $dt[0]->dep_name;
        if(!empty($user)){
            $this->load->view($dep_name.'/aprej', ['notify'=>$notify,'spd'=>$spd, 'user'=>$user]);
        }else{
            redirect('Menu/main');
        }
    }
    public function Handover(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $this->load->view($dep_name.'/handover', $data);
    }
    public function CreateRequest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $spd = $this->Menu_model->get_spd();
        $this->load->view($dep_name.'/createrequest', ['notify'=>$notify,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user]);
    }
    public function AssignBag(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $mcode=$this->Menu_model->get_mbagcode();
        $client=$this->Menu_model->get_client();
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/assignbag', ['notify'=>$notify,'dep'=>$dt, 'data'=>$data, 'user'=>$user,'mcode'=>$mcode,'du'=>$du]);
    }
    public function CreateTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/createtask', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function TaskPlanning(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/TaskPlanning', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function AddTempPerson(){
        $user           = $this->session->userdata('user');
        $data['user']   = $user;$uid= $user['id'];
    //echo $uid;exit;
        $id             = $user['dep_id'];
        

        $notify         = $this->Menu_model->get_notifybyid($uid);
        $dt             = $this->Menu_model->get_depatment_byid($id);
        $dep_name       = $dt[0]->dep_name;
        $data['notify'] = $notify;
        $data['mdata'] = $this->Menu_model->get_tpdetail($uid);
        $data['cname'] = $this->Menu_model->get_mscccbypia($uid);
        //dd($data);
        $this->display($dep_name.'/AddTempPerson',$data);
    }

     public function AcademicCalendar(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $piastate=$this->Menu_model->get_piastate($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/AcademicCalendar', ['piastate'=>$piastate,'notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function ShowAcademicCalendar(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $piastate=$this->Menu_model->get_piastate($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $academiccalendar=$this->Menu_model->get_academiccalendar();
        $this->load->view($dep_name.'/ShowAcademicCalendar', ['notify'=>$notify,'user'=>$user,'academiccalendar'=>$academiccalendar]);
    }
    public function CreateInstallation(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CreateInstallation', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function PlanSummerCamp(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/PlanSummerCamp', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function PlanReportWriting(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $state=$this->Menu_model->get_state();
        $this->load->view($dep_name.'/PlanReportWriting', ['state'=>$state,'notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function StartSummerCamp(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/StartSummerCamp', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function StartReportWriting(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/StartReportWriting', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function CloseSummerCamp(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CloseSummerCamp', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function CloseReportWriting(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CloseReportWriting', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function CreateDifferentTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $project = $this->Menu_model->get_projectbypia($uid);
        $spd = $this->Menu_model->get_spdbypiid($uid);
        $bdrequest = $this->Menu_model->get_bdrequest();
        $this->load->view($dep_name.'/CreateDifferentTask', ['bdrequest'=>$bdrequest,'project'=>$project,'spd'=>$spd,'notify'=>$notify, 'user'=>$user]);
    }
    public function CreatedTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $aotask = $this->Menu_model->get_aotask($uid);
        $this->load->view($dep_name.'/CreatedTask', ['aotask'=>$aotask,'notify'=>$notify, 'user'=>$user]);
    }
    public function CreateARTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $du=$this->Menu_model->get_user();
        $this->load->view($dep_name.'/CreateARTask', ['notify'=>$notify,'user'=>$user,'du'=>$du]);
    }
    public function CuriculumAssign(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $du=$this->Menu_model->get_user();
        $this->load->view($dep_name.'/CuriculumAssign.php', ['notify'=>$notify,'user'=>$user,'du'=>$du]);
    }
    public function CuriculumAssignData(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $du=$this->Menu_model->get_user();
        $this->load->view($dep_name.'/CuriculumAssignData.php', ['notify'=>$notify,'user'=>$user,'du'=>$du]);
    }
    public function CuriculumResearch(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $du=$this->Menu_model->get_user();
        $this->load->view($dep_name.'/CuriculumResearch.php', ['notify'=>$notify,'user'=>$user,'du'=>$du]);
    }
    public function CreateOTask(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CreateOTask', ['du'=>$du,'notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function CreateReplacement(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CreateReplacement', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function CreateRepair(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/CreateRepair', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function PMtoFMRequest(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $program=$this->Menu_model->get_pcbyspd();
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/pmtofmrequest', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'program'=>$program, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function UploadResource(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $year=$this->Menu_model->all_year();
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_pcbypiid($uid);
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/uploadresource', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'year'=>$year]);
    }
    public function AssignPerson(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $nspc = $this->Menu_model->get_nspdpc($uid);
        $this->load->view($dep_name.'/assignperson', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'nspc'=>$nspc, 'user'=>$user]);
    }
    public function aclientp($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $spd=$this->Menu_model->get_spdbycid($cid);
        $client=$this->Menu_model->bd_toaccount($cid);
        $nspc = $this->Menu_model->get_nspdpc($uid);
        $this->load->view($dep_name.'/aclientp', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'nspc'=>$nspc, 'user'=>$user,'spd'=>$spd,'du'=>$du]);
    }
    public function assignpersonforolds(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $ospc = $this->Menu_model->get_ospdpc($uid);
        $this->load->view($dep_name.'/assignpersonforolds', ['notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'client'=>$client, 'ospc'=>$ospc, 'user'=>$user]);
    }
    public function Compose(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $this->load->view('Admin/compose', ['notify'=>$notify,'userdata'=>$du,'data'=>$data, 'user'=>$user]);
    }
    public function Inbox(){
        $this->load->view('Admin/inbox.php');
    }
    public function Total_Handover(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dep_name = $dt[0]->dep_name;
        $client=$this->Menu_model->get_handover_detail();
        $this->load->view($dep_name.'/total-handover',['client'=>$client, 'user'=>$user,'notify'=>$notify]);
    }
    public function clientlog($cid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $dt=$this->Menu_model->get_depatment_byid($id);
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dep_name = $dt[0]->dep_name;
        $logs=$this->Menu_model->get_handoverlog($cid);
        $this->load->view($dep_name.'/clientlog',['logs'=>$logs, 'user'=>$user,'notify'=>$notify]);
    }
    public function Sent(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $this->load->view('Admin/sent', ['notify'=>$notify,'user'=>$du,'data'=>$data]);
    }
    public function ReadMail(){
        $this->load->view('Admin/readmail.php');
    }
    public function RequestAmount(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $spd = $this->Menu_model->get_spd();
        $this->load->view($dep_name.'/requestamount', ['notify'=>$notify,'dep'=>$dt, 'user'=>$du, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user]);
    }
    public function useBagMaterial($tid){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $task = $this->Menu_model->get_taskassign_byid($tid);
        $sid = $task[0]->spd_id;
        $page = $task[0]->checklist;
        $spd = $this->Menu_model->get_spdbyid($sid);
        $bgm = $this->Menu_model->get_umbag($uid);
        $model=$this->Menu_model->get_modelbytdrepair($tid);
        $this->load->view($dep_name.'/usebagm', ['page'=>$page,'tid'=>$tid,'bgm'=>$bgm,'notify'=>$notify,'dep'=>$dt, 'user'=>$du, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'user'=>$user,'model'=>$model]);
    }
    public function BagMuse(){
        $tid= $this->input->post('tid');
        $model_name= $this->input->post('model_name');
        $mtid= $this->input->post('mtid');
        $mqty= $this->input->post('mqty');
        
        $this->Menu_model->Bag_Muse($tid,$model_name,$mtid,$mqty);
        redirect('Menu/useBagMaterial/'.$tid);
    }
    public function setacalendar(){
        $piaid= $this->input->post('piaid');
        $fdate= $this->input->post('fdate');
        $todate= $this->input->post('todate');
        $state= $this->input->post('state');
        $type= $this->input->post('type');
        $remark= $this->input->post('remark');
        
        $this->Menu_model->academic_calendar($piaid,$fdate,$todate,$state,$type,$remark);
        redirect('Menu/AcademicCalendar');
    }
    public function tclose(){
        $tid= $this->input->post('ttid');
        $page= $this->input->post('page');
        $tdatet=date('Y-m-d H:i:s');
        
        $this->db->query("update plantask set actiontaken='Yes',purpose='Yes',donet='$tdatet',tdone='1' where taskid='$tid'");
        $task=$this->Menu_model->get_taskbyid($tid);
        $sid = $task[0]->spd_id;
        $touser = $task[0]->to_user;
        $ttype = $task[0]->task_type;
        $tstype = $task[0]->task_subtype;
        $taskd=$this->Menu_model->get_taskdetail($page);
        if($taskd){
            $taction = $taskd[0]->taction;
            $tname = $taskd[0]->tname;
            $npage = $taskd[0]->page;
            $dep = $taskd[0]->dep;
            $toud=$this->Menu_model->get_spdbyid($sid);
            $piid = $toud[0]->pi_id;
            $zhid = $toud[0]->zh_id;
            $insid = $toud[0]->ins_id;
            if($dep==2){$touser=$piid;}
            if($dep==4){$touser=$insid;}
            if($dep==11){$touser=$zhid;}
            $this->db->query("INSERT INTO task_assign(from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster) select from_user, to_user, task_type, task_subtype, checklist, project_code, c_id, spd_id, comment, remark, cname, caddress, ccperson, ccpmno, visitdt, expectation, tyschool, noschool, location, apr, plan, tid, cluster from task_assign where id='$tid'");
            $ntid = $this->db->insert_id();
            $this->db->query("update task_assign set sdatet='$tdatet',task_date='$tdatet',plan='0',checklist='$npage',task_type='$taction',task_subtype='$tname',to_user='$touser',from_user='93' where id='$ntid'");
        }
        $plan = $this->Menu_model->get_plantaskbytid($tid);
        $planid = $plan[0]->id;
        redirect('Menu/visitlist/'.$page.'/'.$planid);
    }
    public function changespdinsp(){
        $sid= $this->input->post('spdi');
        $ins= $this->input->post('ins');
        
        $this->Menu_model->change_insp($sid,$ins);
        redirect('Menu/ChangeinSPD');
    }
    public function startar(){
        $sdate= $this->input->post('sdate');
        $piid= $this->input->post('piid');
        
        $this->Menu_model->start_ar($sdate,$piid);
        redirect('Menu/CreateARTask');
    }
    public function assigncuriculum(){
        $noc = $this->input->post('noc');
        $sdate = $this->input->post('sdate');
        $tdate = $this->input->post('tdate');
        $piid = $this->input->post('piid');
        $standard = $this->input->post('standard');
        $remark = $this->input->post('remark');
        
        $this->Menu_model->assign_curiculum($sdate,$piid,$standard,$remark,$tdate,$noc);
        redirect('Menu/CuriculumAssign');
    }
    public function curiculumstart(){
        $sdate = $this->input->post('sdate');
        $piid = $this->input->post('piid');
        
        $this->Menu_model->curiculum_start($sdate,$piid);
        redirect('Menu/CuriculumResearch');
    }
    public function curiculumclose(){
        $cdate = $this->input->post('cdate');
        $piid = $this->input->post('pia');
        $standard = $this->input->post('standard');
        $subject = $this->input->post('subject');
        $concept = $this->input->post('concept');
        $loutcomes = $this->input->post('loutcomes');
        $tmethodologhy = $this->input->post('tmethodologhy');
        $rwebsite = $this->input->post('rwebsite');
        $rvlink = $this->input->post('rvlink');
        $attechment = $_FILES['attechment']['name'];
        $count = sizeof($attechment);
        
        $this->Menu_model->curiculum_close($cdate,$piid,$standard,$subject,$concept,$loutcomes,$tmethodologhy,$rwebsite,$rvlink,$attechment,$count);
        redirect('Menu/CuriculumResearch');
    }
    public function closear(){
        $cdate= $this->input->post('cdate');
        $piid= $this->input->post('ppiid');
        
        $this->Menu_model->close_ar($cdate,$piid);
        redirect('Menu/CreateARTask');
    }
    public function changespdpia(){
        $sid= $this->input->post('spd');
        $pia= $this->input->post('pia');
        
        $this->Menu_model->change_pia($sid,$pia);
        redirect('Menu/ChangeinSPD');
    }
    public function updatespd(){
        $spdid = $this->input->post('spdid');
        $schaddress = $this->input->post('schaddress');
        $schpinno = $this->input->post('schpinno');
        $schlang = $this->input->post('schlang');
        $sutid = $this->input->post('sutid');
        $supage = $this->input->post('supage');
        
        $this->Menu_model->update_spd($spdid,$schaddress,$schpinno,$schlang);
        redirect('Menu/callclist/'.$supage.'/'.$sutid);
    }
    public function changeinsp(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $nspc = $this->Menu_model->get_nspdpc($uid);
        $allyear=$this->Menu_model->all_year();
        $this->load->view($dep_name.'/changeinsp', ['ally'=>$allyear,'notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'nspc'=>$nspc, 'user'=>$user,'du'=>$du]);
    }
    public function changepia(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dr=$this->Menu_model->get_region();
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $nspc = $this->Menu_model->get_nspdpc($uid);
        $allyear=$this->Menu_model->all_year();
        $this->load->view($dep_name.'/changepia', ['ally'=>$allyear,'notify'=>$notify,'region'=>$dr,'dep'=>$dt, 'data'=>$data, 'nspc'=>$nspc, 'user'=>$user,'du'=>$du]);
    }
    public function ChangeinSPD(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $pia=$this->Menu_model->get_user();
        $spd = $this->Menu_model->get_mspd();
        $this->load->view($dep_name.'/ChangeinSPD', ['pia'=>$pia, 'notify'=>$notify,'data'=>$data, 'spd'=>$spd, 'user'=>$user]);
    }
    public function ChangeIDSPD(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $pia=$this->Menu_model->get_user();
        $this->load->view($dep_name.'/ChangeIDSPD', ['pia'=>$pia, 'notify'=>$notify,'data'=>$data, 'user'=>$user]);
    }
    public function nobdproject(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $client = $this->Menu_model->get_handover_detail();
        $this->load->view($dep_name.'/nobdproject', ['notify'=>$notify,'data'=>$data, 'client'=>$client, 'user'=>$user]);
    }
    public function inspending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $list = $this->Menu_model->get_inspending();
        $this->load->view($dep_name.'/inspending', ['list'=>$list,'notify'=>$notify,'data'=>$data, 'user'=>$user]);
    }
    public function insreportpending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $list = $this->Menu_model->get_insreportpending();
        $this->load->view($dep_name.'/insreportpending', ['notify'=>$notify,'data'=>$data, 'list'=>$list, 'user'=>$user]);
    }
    public function fttppending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $list = $this->Menu_model->get_fttppending();
        $this->load->view($dep_name.'/fttppending', ['notify'=>$notify,'data'=>$data, 'list'=>$list, 'user'=>$user]);
    }
    public function fttpreportpending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $list = $this->Menu_model->get_fttpreportpending();
        $this->load->view($dep_name.'/fttpreportpending', ['notify'=>$notify,'data'=>$data, 'list'=>$list, 'user'=>$user]);
    }
    public function utilisationpending(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $list = $this->Menu_model->get_utilisationpending();
        $this->load->view($dep_name.'/utilisationpending', ['notify'=>$notify,'data'=>$data, 'list'=>$list, 'user'=>$user]);
    }
    public function nospdsid(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        $uid=$user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $nospd = $this->Menu_model->get_nospdsid();
        $this->load->view($dep_name.'/nospdsid', ['notify'=>$notify,'data'=>$data, 'nospd'=>$nospd, 'user'=>$user]);
    }
    public function handoverDetail(){
        $user = $this->session->userdata('user');
        $uid= $user['id'];
        if($user['dep_id']=='9'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt =$this->Menu_model->get_handover();
     
        $this->load->view('Accounts/handover-detail', ['notify'=>$notify,'data'=>$dt, 'user'=>$user]);
        }
        if($user['dep_id']=='12'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_handoverforfm();
        $this->load->view('Program-Manager/handovertofm', ['notify'=>$notify,'data'=>$dt, 'user'=>$user]);
        }
        if($user['dep_id']=='11'){
            
            $notify=$this->Menu_model->get_notifybyid($uid);
            $dt=$this->Menu_model->get_handoverforfm();
            $this->load->view('Zones-Head/handovertofm', ['notify'=>$notify,'data'=>$dt, 'user'=>$user]);
        }
        if($user['dep_id']=='14'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_handover();
        $this->load->view('BD/handover_to_account',['notify'=>$notify,'data'=>$dt, 'user'=>$user]);
        }
    }
    public function backdrop(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        if($user['dep_id']=='12'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $client=$this->Menu_model->get_handover();
        $this->load->view('Program-Manager/backdrop', ['client'=>$client, 'user'=>$user,'notify'=>$notify]);
        }
        if($user['dep_id']=='14'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $client=$this->Menu_model->get_handover();
        $this->load->view('BD/backdrop', ['client'=>$client, 'user'=>$user,'notify'=>$notify]);
        }
    }
    public function backdropar(){
        $by='PM';
        $apr= $this->input->post('apr');
        $rej= $this->input->post('rej');
        $remark= '';
        $rem='';
        if(empty($apr)){
            $remark= $this->input->post('remark');
            $rem=$remark[0];
            $id=$rej;
            $val='Reject';
        }else{
            $id=$apr;
            $val=2;
        }
        
        $client=$this->Menu_model->get_clientbyid($id);
        $cid=$client[0]->id;
        $this->Menu_model->backdrop_ar($id, $val, $rem,$by,$cid);
        redirect('Menu/backdrop');
    }
    public function backdroparbd(){
        $by='BD';
        $apr= $this->input->post('apr');
        $rej= $this->input->post('rej');
        $remark= $this->input->post('remark');
        $rem='';
        if(empty($apr)){
            $rem=$remark[0];
            $id=$rej;
            $val='Reject';
        }else{
            $id=$apr;
            $val=3;
        }
        
        $client=$this->Menu_model->get_clientbyid($id);
        $cid=$client[0]->id;
        $this->Menu_model->backdrop_ar($id, $val, $rem,$by,$cid);
        redirect('Menu/backdrop');
    }
    public function Report(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        if($user['dep_id']=='12'){
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_handover();
        $this->load->view('Program-Manager/report', ['notify'=>$notify,'data'=>$dt]);
        }
    }
    public function dispatched(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $du=$this->Menu_model->get_user();
        $client=$this->Menu_model->get_client();
        $spd = $this->Menu_model->get_spd();
        $pcode = $this->Menu_model->project_detail();
        $this->load->view($dep_name.'/dispatched-detail', ['notify'=>$notify,'dep'=>$dt, 'du'=>$du, 'user'=>$user, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'pcode'=>$pcode]);
    }
    public function SchoolWithPC(){
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $id =  $user['dep_id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dt=$this->Menu_model->get_depatment_byid($id);
        $dep_name = $dt[0]->dep_name;
        $dt=$this->Menu_model->get_depatment();
        $client=$this->Menu_model->get_client();
        $spd = $this->Menu_model->get_spd();
        $pcode = $this->Menu_model->get_handover();
        $this->load->view($dep_name.'/schoolwithpc', ['notify'=>$notify,'dep'=>$dt, 'user'=>$user, 'data'=>$data, 'client'=>$client, 'spd'=>$spd, 'pcode'=>$pcode]);
    }
    public function bdHandover(){
        $client_name= $this->input->post('client_name');
        $mediator= $this->input->post('mediator');
        $noofschool= $this->input->post('noofschool');
        $location= $this->input->post('location');
        $city= $this->input->post('city');
        $state= $this->input->post('state');
        $spd_identify_by= $this->input->post('spd_identify_by');
        $infrastructure= $this->input->post('infrastructure');
        $contact_person= $this->input->post('contact_person');
        $cp_mno= $this->input->post('cp_mno');
        $acontact_person= $this->input->post('acontact_person');
        $acp_mno= $this->input->post('acp_mno');
        $language= $this->input->post('language');
        $expected_installation_date= $this->input->post('expected_installation_date');
        $project_tenure= $this->input->post('project_tenure');
        $project_type= $this->input->post('project_type');
        $comments= $this->input->post('comments');
        $sname= $this->input->post('sname');
        $saddress= $this->input->post('saddress');
        $scity= $this->input->post('scity');
        $sstate= $this->input->post('sstate');
        $contact_name= $this->input->post('contact_name');
        $contact_no= $this->input->post('contact_no');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/logo/';
        
        $logo=$this->Menu_model->uploadfile($filname, $uploadPath);
        $id=$this->Menu_model->add_bdHandover($client_name, $mediator, $noofschool, $location, $city, $state, $spd_identify_by, $infrastructure, $logo, $contact_person, $cp_mno, $acontact_person, $acp_mno, $language, $expected_installation_date, $project_tenure,$project_type, $comments,$sname, $saddress, $scity, $sstate, $contact_name, $contact_no);
        if($id){
            redirect('Menu/handoverDetail');
        }else{
            print('Insert error ');
        }
    }
    public function GoalSetting(){
        $rrrid=$_POST['rrrid'];
        $gsuid=$_POST['gsuid'];
        $gspiid=$_POST['gspiid'];
        $targetdt=$_POST['targetdt'];
        $tcall=$_POST['tcall'];
        $email=$_POST['email'];
        $utilisation=$_POST['utilisation'];
        $ttp=$_POST['ttp'];
        $mne=$_POST['mne'];
        $diy=$_POST['diy'];
        $goodschool=$_POST['goodschool'];
        $modelschool=$_POST['modelschool'];
        $gsremark=$_POST['gsremark'];
        
        $this->Menu_model->Goal_Setting($rrrid,$gsuid,$gspiid,$targetdt,$tcall,$email,$utilisation,$ttp,$mne,$diy,$goodschool,$modelschool,$gsremark);
        redirect('Menu/AllReviewPlaing/');
    }
    public function allpopup(){
        $ur_id= $this->input->post('ur_id');
        
        echo $data = $this->Menu_model->get_allpopup($ur_id);
    }
    public function pipopup(){
        $ur_id= $this->input->post('ur_id');
        
        echo $data = $this->Menu_model->get_pipopup($ur_id);
    }
    public function pmpopup(){
        $ur_id= $this->input->post('ur_id');
        
        echo $data = $this->Menu_model->get_pmpopup($ur_id);
    }
    public function pcpopup(){
        $ur_id= $this->input->post('ur_id');
        
        echo $data = $this->Menu_model->get_pcpopup($ur_id);
    }
    public function zhpopup(){
        $ur_id= $this->input->post('ur_id');
        
        echo $data = $this->Menu_model->get_zhpopup($ur_id);
    }
    public function bdaccount(){
        $handover_id= $this->input->post('id');
        $wono= $this->input->post('wono');
        $porno= $this->input->post('porno');
        $gstno= $this->input->post('gstno');
        $panno= $this->input->post('panno');
        $tbudget= $this->input->post('tbudget');
        $payterm= $this->input->post('payterm');
        $pwosdate= $this->input->post('pwosdate');
        $moudate= $this->input->post('moudate');
        $srfinovice= $this->input->post('srfinovice');
        $bname= $this->input->post('bname');
        $basic= $this->input->post('basic');
        $gst= $this->input->post('gst');
        $total= $this->input->post('total');
        $oney= $this->input->post('oney');
        $twoy= $this->input->post('twoy');
        $threey= $this->input->post('threey');
        $proformadate= $this->input->post('proformadate');
        $taxinvoicedate= $this->input->post('taxinvoicedate');
        $filname = $_FILES['filname']['name'];
        $uploadPath = 'uploads/mou/';
        
        $mou=$this->Menu_model->uploadfile($filname, $uploadPath);
        $id=$this->Menu_model->add_bdaccount($handover_id, $wono, $porno, $gstno, $panno,$tbudget, $payterm, $pwosdate, $moudate, $srfinovice, $mou,$bname, $basic, $gst, $total, $oney, $twoy, $threey,$proformadate,$taxinvoicedate);
        if($id){
            redirect('Menu/Total_Handover');
        }else{
            print('Insert error ');
        }
    }
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('Menu/main');
    }
    public function login(){
        $user=$this->input->post('user');
        $password=$this->input->post('password');
        
        $dt=$this->Menu_model->user_login($user,$password);
        if(!empty($dt))
        {
        $sessArray["id"] = $dt[0]->id;
        $sessArray["user_name"] = $dt[0]->user_name;
        $sessArray["fullname"] = $dt[0]->fullname;
        $sessArray["region_id"] = $dt[0]->region_id;
        $sessArray["email"] = $dt[0]->email;
        $sessArray["phoneno"] = $dt[0]->phoneno;
        $sessArray["dep_id"] = $dt[0]->dep_id;
        $this->session->set_userdata('user',$sessArray);
        redirect('Menu/Dashboard');}
        else{redirect('Menu/main');}
    }
     public function delete_user(){
        $id= $this->input->get('id');
        
        $dt=$this->Menu_model->delete_user($id);
        if($dt){
            redirect('Menu/register');
        }else{
            print('error in delete function ');
        }
     }
    //  Add New Function 09-05-2024- Deepak
      public function StartProgrramReview(){
        $user           = $this->session->userdata('user');
        $data['user']   = $user;$uid= $user['id'];
        $uid            = $user['id'];
        $id             =  $user['dep_id'];
        
        $notify     =   $this->Menu_model->get_notifybyid($uid);
        $dt         =   $this->Menu_model->get_depatment_byid($id);
        $client     =   $this->Menu_model->get_handover();
        $zmpi       =   $this->Menu_model->get_user();
        $ally       =   $this->Menu_model->get_allyear();
        $dep_name   = $dt[0]->dep_name;
        if(!empty($user)){
            $getpiares = $this->db->query("SELECT id FROM `user_detail` WHERE dep_id=2 AND status='active'");
            $getpiaid = $getpiares->result();
            $totalPia = sizeof($getpiaid);
            $cnt =0;
            foreach($getpiaid as $piid){
                $getaca = $this->db->query("SELECT * FROM `academiccalendar` WHERE piaid=$piid->id");
                $getacaData = $getaca->result();
                $getacountData =  sizeof($getacaData);
                if($getacountData > 0){
                    $cnt +=1;
                }
            }
            $remeningPIA = $totalPia - $cnt;
            $remeningPIA = 0;
            if($remeningPIA == 0){
                $getsprogram = $this->db->query("SELECT * FROM `progrram_review_sby_pm` WHERE pmid='$uid' AND end_date=''");
                $getsprogram = $getsprogram->result();
                if(sizeof($getsprogram)>0){
                        redirect('Menu/ProgrramReviewPage');
                }else{
                    $this->load->view($dep_name.'/StartProgrramReview', ['user'=>$user,'ally'=>$ally]);
                }
            }else{
                $this->load->library('session');
                $this->session->set_flashdata('approved_message',  $remeningPIA. ' PIA Remaining for Add Academic Calender.');
                redirect('/Menu/ShowPIAStatusWithAcadeCal');
            }
        }else{
            redirect('Menu/main');
        }
 }
    public function reviewspcodebyyear(){
    $year = $this->input->post('year');
    
    $result = $this->Menu_model->get_pcodebyyear($year);
    $data = '';
    $data .= '<option value="">Select Project Code</option>';
    foreach($result as $dt){
        $getsch = $this->db->select('*')->from('spd')->where(['project_code'=> $dt->projectcode])->get()->result();
        $getschcount = sizeof($getsch);
       $str = $this->db->last_query();
    //   echo $str;
        if($getschcount > 0){
            $annualpro = $this->db->select('*')->from('progrram_review_sby_pm')->where(['projectcode'=> $dt->projectcode])->get()->result();
            // echo $this->db->last_query();
            $programExists = false;
            foreach ($annualpro as $annual) {
                if ($annual->projectcode == $dt->projectcode) {
                    $programExists = true;
                    break;
                }
            }
            if (!$programExists) {
              $data .= '<option>' .$dt->projectcode. '</option>';
            }
        }
    }
    echo $data;
}
        public function ProgramReviewStatus(){
            $user           =   $this->session->userdata('user');
            $data['user']   =   $user;
            $uid            =   $user['id'];
            $id             =   $user['dep_id'];
            
            $notify         =   $this->Menu_model->get_notifybyid($uid);
            $dt             =   $this->Menu_model->get_depatment_byid($id);
            $dep_name       =   $dt[0]->dep_name;
            $spd=$this->Menu_model->get_mspdpi($uid,0);
            $allPcode = $this->Menu_model->getAllProjectcode();
            $groupedData = [];
            foreach ($allPcode as $item) {
                $projectYear = $item->project_year;
                if (!isset($groupedData[$projectYear])) {
                    $groupedData[$projectYear] = [];
                }
                $groupedData[$projectYear][] = $item;
            }
            $comprogram  =  $this->db->query("SELECT * FROM `progrram_review_sby_pm` WHERE end_date != ''");
            $comprogram =  $comprogram->result();
            $this->load->view($dep_name.'/ProgramReviewStatus', ['uid'=>$uid,'user'=>$user,'allPcode'=>$allPcode,'groupedData'=>$groupedData,'comprogram'=>$comprogram]);
        }
    public function AnnualProgramReviewReport(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    $client=$this->Menu_model->get_handover();
    $zmpi=$this->Menu_model->get_user();
    $ally=$this->Menu_model->getAllProgramReviewYear();
    $dep_name = $dt[0]->dep_name;
    if(!empty($user)){
        $syear  = $this->input->post('year');
        $spcode = $this->input->post('pcode');
    if(isset($syear) && isset($spcode)){
        $annualpro = $this->db->select('*')->from('annual_project_review')->where(['projectcode'=>$spcode,'year'=>$syear])->get()->result();
        $this->load->view($dep_name.'/AnnualProgramReviewReport', ['user'=>$user,'ally'=>$ally,'syear'=>$syear,'spcode'=>$spcode,'annualpro'=>$annualpro]);
        }else{
            $this->load->view($dep_name.'/AnnualProgramReviewReport', ['user'=>$user,'ally'=>$ally]);
        }
    }else{
        redirect('Menu/main');
    }
}
public function ProgrramReviewPage(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    
    $dt              = $this->Menu_model->get_depatment_byid($id);
    $dep_name        = $dt[0]->dep_name;
    $getsprogram    = $this->db->query("SELECT * FROM `progrram_review_sby_pm` WHERE pmid='$uid' AND end_date=''");
    $getsprogram    = $getsprogram->result();
       if(sizeof($getsprogram)>0){
        $year           = $getsprogram[0]->year;
        $projectcode    = $getsprogram[0]->projectcode;
        $getmeet    = $this->db->query("SELECT * FROM `annual_program_meeting` WHERE projectcode = '$projectcode'");
        $getmeet    = $getmeet->result();
       
        $this->load->view($dep_name.'/ProgrramReviewPage', ['year'=>$year,'projectcode'=>$projectcode]);
        // if($getmeet[0]->join_team == 'yes'){
        //     $this->load->view($dep_name.'/ProgrramReviewPage', ['year'=>$year,'projectcode'=>$projectcode]);
        // }else{
        //     redirect('Menu/AnnualReviewMeetingLink?pcode=' . $projectcode);
        // }
       }else{
        redirect('Menu/StartProgrramReview');
       }
 }
     public function ProgramReviewSelectByPm(){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $currentDateTime = date('Y-m-d H:i:s');
    $dt              = $this->Menu_model->get_depatment_byid($id);
    $dep_name        = $dt[0]->dep_name;
    $tdate           = date("Y-m-d");
    $year            = $_POST['year'];
    $pcode           = $_POST['pcode'];
    $getmeet    = $this->db->query("SELECT * FROM `annual_program_meeting` WHERE projectcode = '$pcode'");
    $getmeet    = $getmeet->result();
    if(sizeof($getmeet) == 0){
          $getConsumeTime = $this->db->query("INSERT INTO `progrram_review_sby_pm`(`pmid`, `year`, `projectcode`, `start_date`) VALUES ('$uid','$year','$pcode','$currentDateTime')");
        redirect('Menu/AnnualReviewMeetingLink?pcode=' . $pcode);
    }else{
        redirect('Menu/ProgrramReviewPage');
    }
 }
    public function ProgramReviewByPm(){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $currentDateTime = date('Y-m-d H:i:s');
    $dt              = $this->Menu_model->get_depatment_byid($id);
    $dep_name        = $dt[0]->dep_name;
    $cdate           = date("Y-m-d");
    $projectcodename = $_POST['projectcodename'][2];
    $projectyear = $_POST['projectyear'][2];
    $programreviewtime = $_POST['programreviewtime'][1];
    $sid = $_POST['sid'];
    $endprogram = $_POST['endprogram'];
    unset($_POST['programreviewtime']);
    unset($_POST['sid']);
    if(isset($_POST['endprogram'])){
        unset($_POST['endprogram']);
    }
foreach($_POST as $data){
    $questions = $data[0];
    $status = $data[1];
    $value = $data[2];
    $remarks = $data[3];
    if(isset($data[4])){
        $scholdata1 = $data[4];
        $scholdata2 = $data[6];
        $scholdata3 = $data[8];
        $scholdata4 = $data[10];
        $scholdatad1 = $data[5];
        $scholdatad2 = $data[7];
        $scholdatad3 = $data[9];
        $scholdatad4 = $data[11];
        $value .= $scholdata1 . ',' . $scholdata2 . ',' . $scholdata3 . ',' . $scholdata4 . ',';
        $remarks .= $scholdatad1 . ',' . $scholdatad2 . ',' . $scholdatad3 . ',' . $scholdatad4 . ',';
    }
    if($questions == 'Is the any offline activity done in this school.'){
        $offline2 = $data[2];
        $offline3 = $data[3];
        $offline4 = $data[4];
        $offline5 = $data[5];
        $offline6 = $data[6];
        $offline7 = $data[7];
        $offline8 = $data[8];
        $value = $offline2 . ',' . $offline3 . ',' . $offline4 . ',' . $offline5 . ','. $offline6 . ','. $offline7 . ','. $offline8;
        $remarks = "";
    }
    $this->db->query("INSERT INTO `annual_project_review`(`pmid`,`sid`, `projectcode`, `year`, `question`, `checklist`, `value`, `remarks`, `schoolreviewtime`) VALUES ('$uid','$sid','$projectcodename','$projectyear','$questions','$status','$value','$remarks','$programreviewtime')");
}
$getsprogram    = $this->db->query("SELECT * FROM `progrram_review_sby_pm` WHERE projectcode='$projectcodename' AND pmid='$uid' AND end_date=''");
$getsprogram    = $getsprogram->result();
$gettime = $getsprogram[0]->programreviewtime;
// Convert each time to seconds
$time1_seconds = strtotime($gettime) - strtotime('00:00:00');
$time2_seconds = strtotime($programreviewtime) - strtotime('00:00:00');
$total_seconds = $time1_seconds + $time2_seconds;
$total_time = gmdate("H:i:s", $total_seconds);
$query =  $this->db->query("UPDATE `progrram_review_sby_pm` SET `programreviewtime`='$total_time'  WHERE projectcode='$projectcodename' AND pmid='$uid'");
    $separatedArrays = array();
        $yesArray = array();
        $noArray = array();
            foreach ($_POST as $key => $subArray) {
            if ($subArray[1] === "Yes") {
                $yesArray[$key] = $subArray;
            } else {
                $noArray[$key] = $subArray;
            }
        }
    if($endprogram == 'endprogram'){
        $currentDateTime = date('Y-m-d H:i:s');
        $query =  $this->db->query("UPDATE `progrram_review_sby_pm` SET `end_date`='$currentDateTime' WHERE `projectcode`='$projectcodename' AND year='$projectyear'");
        $this->load->library('session');
        $this->session->set_flashdata('success_message', ' Program Review Successfully Please Add Program  Timeline');
        redirect('Menu/NextYearPlanAfterReview?pcode=' . $projectcodename);
        // redirect('Menu/StartProgrramReview');
      }else{
        $this->load->library('session');
        $this->session->set_flashdata('success_message', ' Review Successfully');
        redirect('Menu/ProgrramReviewPage');
      }
 }
  public function NextYearPlanAfterReview(){
            $pcode      = $_GET['pcode'];
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            $pcode      = urldecode($pcode);
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $this->load->view($dep_name.'/NextYearPlanAfterReview', ['uid'=>$uid,'user'=>$user,'pcode'=>$pcode]);
        }
     public function submitNextYearPlan(){
            $user         = $this->session->userdata('user');
            $data['user'] = $user;$uid= $user['id'];
            $uid          = $user['id'];
            $id           =  $user['dep_id'];
            
            $pcode     = $_POST['pcode'];
            $questions   = [];
            $lastyearProgramstatus = $_POST['lastyearProgramstatus'];
            $isMandErequres = $_POST['isMandErequres'];
            $question1 = $_POST['question1'];
            $question2 = $_POST['question2'];
            $question3 = $_POST['question3'];
            $question5 = $_POST['question5'];
            $question6 = $_POST['question6'];
            $question7 = $_POST['question7'];
            $question8 = $_POST['question8'];
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`, `uid`) VALUES ('$pcode','$isMandErequres[0]','$isMandErequres[1]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`, `question`, `answer`, `sub_answer1`, `uid`) VALUES ('$pcode', '$lastyearProgramstatus[0]', '$lastyearProgramstatus[1]', '$lastyearProgramstatus[2]', '$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`, `uid`) VALUES ('$pcode','$question1[0]','$question1[1]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`, `uid`) VALUES ('$pcode','$question2[0]','$question2[1]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$question3[0]','$question3[1]','$question3[2]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$question5[0]','$question5[1]','$question5[2]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$question6[0]','$question6[1]','$question6[2]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$question7[0]','$question7[1]','$question7[2]','$uid')");
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$question8[0]','$question8[1]','$question8[2]','$uid')");
            $schoolStatus_name           = $_POST['schoolStatus_name'];
            $statusConversionName        = $_POST['statusConversionName'];
            $statusConversionNamesString = implode(", ", $statusConversionName);
            $statusConversionDate        = $_POST['statusConversionDate'];
            $statusConversionDateString  = implode(", ", $statusConversionDate);
            $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`,`sub_answer2`, `uid`) VALUES ('$pcode','$schoolStatus_name[0]','$schoolStatus_name[1]','$statusConversionNamesString','$statusConversionDateString','$uid')");
            $pMvisitMan = $_POST['pMvisitMan'];
            if($pMvisitMan['1'] == 'Yes'){
                $pMvisitManDate = $_POST['pMvisitManDate'];
                $pMvisitManDateString = implode(", ", $pMvisitManDate);
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`,`sub_answer2`,`uid`) VALUES ('$pcode','$pMvisitMan[0]','$pMvisitMan[1]','$pMvisitMan[2]','$pMvisitManDateString','$uid')");
            $noofpMvisitMan = $pMvisitMan['2'];
            $x = 0;
            for($k=1;$k<=$noofpMvisitMan;$k++){
                $questions['pMvisitMan_dt']        = 'pMvisitMan'.$k.'_'.$pMvisitManDate[$x];
                $getTaskstage = $this->Menu_model->getMainTaskstage('PM','PM Visit After Program Review');
                $i =1;
                foreach($getTaskstage as $gts){
                    $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PM';
                    $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PM',$gts->tasktype,$gts->taskname);
                    $j=0;
                foreach($getsTaskstage as $subtask){
                    $taskdetails =  $subtask->taskdetails;
                    $taskdetailsid =  $subtask->id;
                    $taskaction =  $subtask->taskaction;
                    $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                    $j++;
                }
                    $i++;
                    $x++;
                }
            }
            }else{
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`uid`) VALUES ('$pcode','$pMvisitMan[0]','$pMvisitMan[1]','$uid')");
            }
            $pmCallMan = $_POST['pmCallMan'];
            if($pmCallMan['1'] == 'Yes'){
                $pmCallMandate = $_POST['pmCallMandate'];
                $pmCallMandateString = implode(", ", $pmCallMandate);
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`,`sub_answer2`,`uid`) VALUES ('$pcode','$pmCallMan[0]','$pmCallMan[1]','$pmCallMan[2]','$pmCallMandateString','$uid')");
                $noofpMCallMan = $pmCallMan['2'];
                $x = 0;
                for($k=1;$k<=$noofpMCallMan;$k++){
                    $questions['pMCallMan_dt']        = 'pMCallMan'.$k.'_'.$pmCallMandate[$x];
                    $getTaskstage = $this->Menu_model->getMainTaskstage('PM','PM Call After Program Review');
                    $i =1;
                    foreach($getTaskstage as $gts){
                        $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PM';
                        $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PM',$gts->tasktype,$gts->taskname);
                        $j=0;
                    foreach($getsTaskstage as $subtask){
                        $taskdetails =  $subtask->taskdetails;
                        $taskdetailsid =  $subtask->id;
                        $taskaction =  $subtask->taskaction;
                        $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                        $j++;
                    }
                        $i++;
                        $x++;
                    }
                }
            }else{
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`uid`) VALUES ('$pcode','$pmCallMan[0]','$pmCallMan[1]','$uid')");
            }
            $zzmCallMan = $_POST['zzmCallMan'];
            if($zzmCallMan['1'] == 'Yes'){
                $zzmCallManDate = $_POST['zzmCallManDate'];
                $zzmCallManDateString = implode(", ", $zzmCallManDate);
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`sub_answer1`,`sub_answer2`,`uid`) VALUES ('$pcode','$zzmCallMan[0]','$zzmCallMan[1]','$zzmCallMan[2]','$zzmCallManDateString','$uid')");
                $noofzzmCallMan = $zzmCallMan['2'];
                $x = 0;
                for($k=1;$k<=$noofzzmCallMan;$k++){
                    $questions['zMCallMan_dt']        = 'zMCallMan'.$k.'_'.$zzmCallManDate[$x];
                    $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','ZM Call After Program Review');
                    $i =1;
                    foreach($getTaskstage as $gts){
                        $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____ZM';
                        $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
                        $j=0;
                    foreach($getsTaskstage as $subtask){
                        $taskdetails =  $subtask->taskdetails;
                        $taskdetailsid =  $subtask->id;
                        $taskaction =  $subtask->taskaction;
                        $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                        $j++;
                    }
                        $i++;
                        $x++;
                    }
                }
            }else{
                $this->db->query("INSERT INTO `next_year_program_plan`(`projectcode`,`question`, `answer`,`uid`) VALUES ('$pcode','$zzmCallMan[0]','$zzmCallMan[1]','$uid')");
            }
            foreach($questions as $qs=>$q){
                if (is_array($q)){
                    $k=1;
                    foreach($q as $key=>$value){
                        if (is_array($value)){
                        foreach($value as $subt){
                            $parts = explode("_", $subt);
                            $stage = $parts[0]; // "stage1"
                            $id = $parts[1];    // "7"
                            $sid = '';
                            $this->Menu_model->school_timelinePlanningSubTask($pcode,$sid,$taskid,$uid,$id,$stage);
                            $k++;
                           }
                        }else{
                        $valuearr = explode("_____", $value);
                        $value = $valuearr[0];
                        $taskperformedby = $valuearr[1];
                        $programcode = "PTC"."_".$k."_".$pcode;
                        $task_assignby = 'Auto Generated After Program Review';
                        $sid = '';
                        $taskid = $this->Menu_model->school_timelinePlanningTask($taskperformedby,$qs,$value,$pcode,$programcode,$sid,$uid,$task_assignby);
                        }
                    }
                }
            }
             $this->load->library('session');
            $this->session->set_flashdata('success_message', 'Review Added Successfully.');
             redirect('/Menu/ProgramPlanningTimeLine?pcode=' . $pcode);
            // redirect('Menu/StartProgrramReview');
        }
      public function AnnualReviewMeetingLink(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            $pcode      = $_GET['pcode'];
            $pcode      = urldecode($pcode);
            // echo " Project code ".$_GET['pcode'];
            // die;
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $getmeet    = $this->db->query("SELECT * FROM `annual_program_meeting` WHERE projectcode = '$pcode'");
            $getmeet    = $getmeet->result();
            $this->load->view($dep_name.'/AnnualReviewMeetingLink', ['uid'=>$uid,'user'=>$user,'getmeet'=>$getmeet,'pcode'=>$pcode]);
            // redirect('Menu/ProgramPlanningTimeLine?pcode=' . $pcode);
        }
      public function SubmitProgramReviewMeeting(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $pcode = $_POST['pcode'];
            $meetinglink = $_POST['meetinglink'];
            $remark = "Meeting Upload Before Program Review";
            date_default_timezone_set("Asia/Calcutta");
            $cdate = date("Y-m-d H:i:s");
            $this->db->query("INSERT INTO `annual_program_meeting`(`uid`,`start`, `projectcode`, `meetinglink`, `remark`) VALUES ('$uid','$cdate','$pcode','$meetinglink','$remark')");
            $this->load->library('session');
            $this->session->set_flashdata('success_message', 'Program Meeting Added Successfully. Now Review Next Program');
            // redirect('Menu/StartProgrramReview/');
            redirect('Menu/AnnualReviewMeetingLink?pcode=' . $pcode);
                // redirect('Menu/ProgrramReviewPage');
        }
          public function SubmitProgramReviewMeetingYes(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $pcode = $_POST['pcode'];
            $haseverybody = $_POST['haseverybody'];
            if($haseverybody == 'yes'){
            $query =  $this->db->query("UPDATE `annual_program_meeting` SET `join_team`='$haseverybody' WHERE `projectcode`='$pcode'");
            $this->load->library('session');
            $this->session->set_flashdata('success_message', 'Program Meeting Added Successfully. Now Review Next Program');
            // redirect('Menu/StartProgrramReview/');
            redirect('Menu/ProgrramReviewPage');
            }else{
                redirect('Menu/AnnualReviewMeetingLink?pcode=' . $pcode);
            }
            // redirect('Menu/AnnualReviewMeetingLink?pcode=' . $pcode);
                // redirect('Menu/ProgrramReviewPage');
        }
        public function RecordedCallAddLink(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            $pcode      = $_GET['pcode'];
            $pcode      = urldecode($pcode);
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $this->load->view($dep_name.'/RecordedCallAddLink', ['uid'=>$uid,'user'=>$user,'pcode'=>$pcode]);
        }
        public function SubmitRecordedCallAddLink(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $pcode = $_POST['pcode'];
            $meetinglink = $_POST['meetinglink'];
            $query =  $this->db->query("UPDATE `annual_program_meeting` SET `recorded_call_link`='$meetinglink' WHERE `projectcode`='$pcode'");
            $cdate = date("Y-m-d H:i:s");
            $meetingremark = "Meeeting Close Successfully";
           $query =  $this->db->query("UPDATE `annual_program_meeting` SET `end`='$cdate',`closeremarks`='$meetingremark',`status`='1' WHERE projectcode='$pcode'");
            $this->load->library('session');
            $this->session->set_flashdata('success_message', 'Program Review Successfully Close.');
            // redirect('Menu/StartProgrramReview');
              redirect('Menu/AnnualReviewMeetingList/');
    }
     public function AnnualReviewMeetingList(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            $pcode      = $_GET['pcode'];
            $pcode      = urldecode($pcode);
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $meetDataPending  =  $this->db->query("SELECT * FROM `annual_program_meeting` WHERE status = 0");
            $meetDataPending =  $meetDataPending->result();
            $meetDataSuccess  =  $this->db->query("SELECT * FROM `annual_program_meeting` WHERE status = 1");
            $meetDataSuccess =  $meetDataSuccess->result();
            $this->load->view($dep_name.'/AnnualReviewMeetingList', ['uid'=>$uid,'user'=>$user,'meetDataSuccess'=>$meetDataSuccess,'meetDataPending'=>$meetDataPending]);
        }
     public function ProgramPlanningTimeLine(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    // $pia=$this->Menu_model->get_user_pia();
    // var_dump($pia); exit;
    $week = $this->Menu_model->get_week();
    $dep_name = $dt[0]->dep_name;
    $this->load->view($dep_name.'/ProgramPlanningTimeLine',['week'=>$week,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
}
     public function programtimelineplanning(){
    
    $projectcode=$_POST['projectcode'];
    // $piid=$_POST['piid'];
    $projectcode    =   $_POST['projectcode'];
    $uid            =   $_POST['uid'];
    $bdid           =   $_POST['bdid'];
    $wmessage       =   $_POST['wmessage'];
    $communication1 =   $_POST['communication1'];
    $communication2 =   $_POST['communication2'];
    $communication3 =   $_POST['communication3'];
    $callsfu1       =   $_POST['callsfu1'];
    $callsfu2       =   $_POST['callsfu2'];
    $reporttype     =   $_POST['reporttype'];
    $fttp           =   $_POST['fttp'];
    $rttp           =   $_POST['rttp'];
    $casestudy      =   $_POST['casestudy'];
    $maintenance    =   $_POST['maintenance'];
    $replacement    =   $_POST['replacement'];
    $diy            =   $_POST['diy'];
    if(isset($_POST['blmne'])){
        $blmne      =   $_POST['blmne'];
    }else{
         $blmne =   '';
    }
    if(isset($_POST['blmne'])){
        $elmne      =   $_POST['elmne'];
    }else{
         $elmne =   '';
    }
    $nsp            =   $_POST['nsp'];
    $utilisation1   =   $_POST['utilisation1'];
    $utilisation2   =   $_POST['utilisation2'];
    $utilisation3   =   $_POST['utilisation3'];
    $outbondc1      =   $_POST['outbondc1'];
    $outbondc2      =   $_POST['outbondc2'];
    $outbondc3      =   $_POST['outbondc3'];
    $cengagement    =   $_POST['cengagement'];
    $exstatusdt     =   $_POST['exstatusdt'];
    $status         =   $_POST['status'];
    $summeractivity  = $_POST['summeractivity'];
    $winteractivity  = $_POST['winteractivity'];
    $onlineactivity  = $_POST['onlineactivity'];
    $webinar         = $_POST['webinar'];
    $zmvisit        =   $_POST['zmvisit'];
    $pmvisit        =   $_POST['pmvisit'];
    $bdreview       =   $_POST['bdreview'];
    $otherdcall     =   $_POST['otherdcall'];
    $socialMediaPost1   =   $_POST['socialMediaPost1'];
    $socialMediaPost2   =   $_POST['socialMediaPost2'];
    $socialMediaPost3   =   $_POST['socialMediaPost3'];
    $socialMediaPost4   =   $_POST['socialMediaPost4'];
    $questions   = [];
// Start Social Media TASK and SUBTASK Creation
 for($k=1;$k<=4;$k++){
        $questions['socialMediaPost'.$k.'_dt']      = 'socialMediaPost'.$k.'_'.${"socialMediaPost".$k};
      $getTaskstage = $this->Menu_model->getMainTaskstage('PM','Social Media');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PM',$gts->tasktype,$gts->taskname);
          $j=0;
         foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
         }
          $i++;
      }
 }
      // End Social Media TASK and SUBTASK Creation
      // Start Pm Visit TASK and SUBTASK Creation
      $questions['zmvisit_dt']        = 'ZMVISIT_'.$zmvisit;
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','ZM Visit');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
         foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
         }
          $i++;
      }
      // End Pm Visit TASK and SUBTASK Creation
      // Start Pm Visit TASK and SUBTASK Creation
      $questions['pmvisit_dt']        = 'PMVISIT_'.$pmvisit;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PM','PM Visit');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____PM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PM',$gts->tasktype,$gts->taskname);
          $j=0;
         foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
         }
          $i++;
      }
    // End Pm Visit TASK and SUBTASK Creation
  // Start Other departments call Task and SUBTASK Creation
  $questions['otherdepartmentcall_dt']      = 'otherdepartmentcall_'.$otherdcall;
  $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Other departments call');
  $i =1;
  $k =1;
  foreach($getTaskstage as $gts){
      $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
      $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
      $j=0;
  foreach($getsTaskstage as $subtask){
      $taskdetails =  $subtask->taskdetails;
      $taskdetailsid =  $subtask->id;
      $taskaction =  $subtask->taskaction;
      $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
      $j++;
  }
      $i++;
  }
  // End Other departments call Task and SUBTASK Creation
  // Start Review with BD Task and SUBTASK Creation
      $questions['bdreview_dt']      = 'bdreview_'.$bdreview;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Review with BD');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
  // End Review with BD Task and SUBTASK Creation
  $sid = '';
// Start Task SubTask creation
  foreach($questions as $qs=>$q){
    if (is_array($q)){
        $k=1;
        foreach($q as $key=>$value){
            if (is_array($value)){
            foreach($value as $subt){
                $parts = explode("_", $subt);
                $stage = $parts[0]; // "stage1"
                $id = $parts[1];    // "7"
                $this->Menu_model->school_timelinePlanningSubTask($schoolcode,$sid,$taskid,$uid,$id,$stage);
                $k++;
               }
            }else{
            $valuearr = explode("_____", $value);
            $value = $valuearr[0];
            $taskperformedby = $valuearr[1];
            $schoolcode = "PTC"."_".$k."_".$projectcode;
            $task_assignby = 'Auto Generated After Program Review';
            $taskid = $this->Menu_model->school_timelinePlanningTask($taskperformedby,$qs,$value,$projectcode,$schoolcode,$sid,$uid,$task_assignby);
            }
        }
    }
}
// End Task SubTask creation
    
    $this->Menu_model->program_timeline12($projectcode,$uid,$bdid,$wmessage,$communication1,$communication2,$communication3,$callsfu1,$callsfu2,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$replacement,$diy,$blmne,$elmne,$nsp,$utilisation1,$utilisation2,$utilisation3,$otherdcall,$outbondc1,$outbondc2,$outbondc3,$bdreview,$cengagement,$zmvisit,$pmvisit,$exstatusdt,$status,$summeractivity,$winteractivity,$onlineactivity,$webinar,$socialMediaPost1,$socialMediaPost2,$socialMediaPost3,$socialMediaPost4);
    $cdate = date("Y-m-d H:i:s");
    $meetingremark = "Program Timeline Added Successfully";
     $this->load->library('session');
    $this->session->set_flashdata('success_message', 'Program Time Line Setting Added Successfully. Now Review Next Program');
    redirect('Menu/AnnualReviewMeetingList/');
}
     public function donereviewspcodebyyear(){
    $year= $this->input->post('year');
    
    $data = '';
    $result = $this->db->select('projectcode')->from('progrram_review_sby_pm')->where(['year'=> $year])->get()->result();
    foreach($result as $dt){
          $data .= '<option>' .$dt->projectcode. '</option>';
        }
        echo $data;
    }
      public function AcademicCalenderApprove(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $cyear = date('Y');
        $query=$this->db->query("SELECT * FROM `academiccalendar` WHERE YEAR(created_at)=$cyear");
        $acpdata =  $query->result();
        $this->load->view($dep_name.'/AcademicCalenderApprove', ['notify'=>$notify,'user'=>$user,'acpdata'=>$acpdata]);
    }
      public function ShowPIAStatusWithAcadeCal(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
        $cyear = date('Y');
        $query=$this->db->query("SELECT user_detail.*
        FROM user_detail
        LEFT JOIN academiccalendar ON user_detail.id = academiccalendar.piaid
        WHERE user_detail.dep_id = 2
        AND (academiccalendar.created_at IS NULL AND status ='active' OR YEAR(academiccalendar.created_at) != YEAR(CURDATE()))");
        $piaDataCalepending =  $query->result();
        $query1 = $this->db->query("SELECT DISTINCT user_detail.* FROM user_detail INNER JOIN academiccalendar ON user_detail.id = academiccalendar.piaid WHERE status ='active' AND user_detail.dep_id = 2 AND YEAR(academiccalendar.created_at) = YEAR(CURDATE())");
        $piaDataCaleSuc =  $query1->result();
        $queryallpia = $this->db->query("SELECT * FROM `user_detail` where dep_id = 2 ");
        $allpia =  $queryallpia->result();
        $this->load->view($dep_name.'/ShowPIAStatusWithAcadeCal', ['notify'=>$notify,'user'=>$user,'piaDataCale'=>$piaDataCalepending,'piaDataCaleSuccess'=>$piaDataCaleSuc,'allpia'=>$allpia]);
    }
       public function pIAStatusUpdate(){
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $piaid = $_POST['id'];
        $status = $_POST['status'];
        if($status ==1){
            $query =  $this->db->query("UPDATE `user_detail` SET `status`='active' WHERE id=$piaid");
            echo 1;
        }else{
            $query =  $this->db->query("UPDATE `user_detail` SET `status`='inactive' WHERE id=$piaid");
            echo 0;
        }
    }
      public function AcademicCalenderAppByPm($id,$status){
        $this->load->library('session');
        $user = $this->session->userdata('user');
        $did =  $user['dep_id'];
        $uid= $user['id'];
        
        $notify=$this->Menu_model->get_notifybyid($uid);
        $dd=$this->Menu_model->get_depatment_byid($did);
        $dep_name = $dd[0]->dep_name;
                if($status == 'Approved'){
                    $query =  $this->db->query("UPDATE `academiccalendar` SET `aprovebypm`='1', rejectbypm='0' WHERE id='$id'");
                    $this->session->set_flashdata('approved_message', 'Academic Calender Approval Request Approved successfully!');
                }
                if($status == 'Reject'){
                    $query =  $this->db->query("UPDATE `academiccalendar` SET `rejectbypm`='1',`aprovebypm`='0' WHERE id='$id'");
                    $this->session->set_flashdata('reject_message', 'Academic Calender Approval Request Reject successfully!');
                }
                redirect('Menu/AcademicCalenderApprove');
    }
     public function ProgramReviewTaskDetails($rtype,$sid){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $notify   = $this->Menu_model->get_notifybyid($uid);
    $dt       = $this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    if($rtype == 'Installtion'){
        $type = 'Upload Installation Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'FTTP'){
        $type = 'Upload FTTP Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'Maintenance'){
        $type = 'Upload Maintenance Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'RTTP'){
        $type = 'Upload RTTP Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'M_AND_E'){
        $type = 'Upload M&E Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'DIY'){
        $type = 'Upload DIY Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'Monthly'){
        $type = 'Monthly';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>'Monthly Report','sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'AnnualReport'){
        $type = 'Annual Report';
        $data = $this->Menu_model->get_reportbysid($sid,$type);
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>'Annual Report','sid'=>$sid,'datatask'=>$data]);
    }
    if($rtype == 'Utilisation'){
        $type = 'Total Utilisation';
        $data = $this->db->select('*')->from('wgdata')->where(['type'=>'Utilisation','sid'=> $sid])->get()->result();
        $this->load->view($dep_name.'/ProgramReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'datatask'=>$data]);
    }
 }
public function SelectSchoolForReview(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    $spd=$this->Menu_model->get_mspdpi($uid,0);
    $status=$this->Menu_model->get_spdsbypi($uid);
    $scodata = $this->db->select('*')->from('school_review_for_pia')->where('end_date IS NOT NULL')->get()->result();
    $getSchoolStatus = $this->Menu_model->get_status();
    $dep_name = $dt[0]->dep_name;
    if(!empty($user)){
        $getsid = $this->db->query("SELECT * FROM `school_review_for_pia` WHERE piid='$uid' AND end_date=''");
        $getsid = $getsid->result();
        $cyear = date("Y");
        $acdata = $this->db->query("SELECT * FROM `academiccalendar` WHERE piaid='$uid' AND aprovebypm='1' AND YEAR(created_at)=$cyear");
        $acdata =  $acdata->result();
        foreach ($acdata as $object) {
            // Check if 'aprovebypm' key exists and its value is equal to 1
            if (isset($object->aprovebypm) && $object->aprovebypm == 1) {
                // Increment the count for the corresponding type
                $type = $object->type;
                if($type !== 'Other'){
                if (!isset($typeCounts[$type])) {
                    $typeCounts[$type] = 1;
                } else {
                    $typeCounts[$type]++;
                }
                }
            }
        }
        $expectedArray = [
            'Exam Date' => 1,
            'Gove Holiday' => 1,
            'Winter Week' => 1,
            'Summer Week' => 1,
            'District science Fair' => 1,
            'State science Fair' => 1
        ];
        $formattedArray = array_intersect_key($typeCounts, $expectedArray);
        // If you want to set all values to 1 as in the first array, you can do this:
        $formattedArray = array_fill_keys(array_keys($formattedArray), 1);
        // Compare the arrays and find keys that do not match
        $keysNotMatching = array_diff_key($expectedArray, $formattedArray);
        // Output keys that do not match
        if (empty($keysNotMatching) && isset($keysNotMatching)) {
            if(sizeof($getsid)>0){
                $sid = $getsid[0]->sid;
                redirect('Menu/schoolreviewPage');
               }else{
                $this->load->view($dep_name.'/SelectSchoolForReview', ['notify'=>$notify,'spd'=>$spd,'user'=>$user,'getSchoolStatus'=>$getSchoolStatus,'schstatus'=>$status,'scodata'=>$scodata]);
               }
        } else {
            $keymiss = '';
            foreach ($keysNotMatching as $key => $value) {
                $keymiss .=$key.' | ';
            }
            $this->load->library('session');
            $this->session->set_flashdata('setAcademicCalendar', $keymiss . ' Set Academic Calendar First');
            redirect('Menu/AcademicCalendar');
        }
    }else{
        redirect('Menu/main');
    }
}
   public function getAllSchoolinStatus(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid = $user['id'];
    $id  =  $user['dep_id'];
    
    $selectSchool = $_POST['selectSchool'];
    $spd    =   $this->Menu_model->getSchoolByPiAId($uid);
    // $getsid = $this->db->query("SELECT DISTINCT(sid) FROM `annual_project_review`");
    $getsid = $this->db->query("SELECT DISTINCT sid FROM annual_project_review JOIN program_timeline_planning ON program_timeline_planning.projectcode = annual_project_review.projectcode");
    $getsid = $getsid->result();
    $html = '';
    foreach($spd as $dt){
        $annualcmp = $this->db->select('*')->from('school_review_for_pia')->where(['piid'=> $uid])->get()->result();
        foreach($getsid as $s){
            if($s->sid == $dt->id){
                $schoolExists = false;
                foreach ($annualcmp as $annual) {
                    if ($annual->sid == $s->sid) {
                        $schoolExists = true;
                        break;
                    }
                }
                if (!$schoolExists) {
                    $html .= '<option value="' . $dt->id . '">' . $dt->sname . '</option>';
                }
            }
        }
    }
    echo $html;
}
   public function SchoolReviewDetailsStatus(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    $spd=$this->Menu_model->get_mspdpi($uid,0);
    $status=$this->Menu_model->get_spdsbypi($uid);
    $scodata = $this->db->select('*')->from('school_review_for_pia')->where('end_date IS NOT NULL')->get()->result();
    $comschool = $this->db->query("SELECT * FROM `school_review_for_pia` WHERE piid='$uid' AND end_date != ''");
    $spd    =   $this->Menu_model->getSchoolByPiAId($uid);
    $getsid = $this->db->query("SELECT DISTINCT sid FROM annual_project_review JOIN program_timeline_planning ON program_timeline_planning.projectcode = annual_project_review.projectcode");
    $getsid = $getsid->result();
    $pendigSch = 0;
    foreach($spd as $dt){
        $annualcmp = $this->db->select('*')->from('school_review_for_pia')->where(['piid'=> $uid])->get()->result();
        foreach($getsid as $s){
            if($s->sid == $dt->id){
                $schoolExists = false;
                foreach ($annualcmp as $annual) {
                    if ($annual->sid == $s->sid) {
                        $schoolExists = true;
                        break;
                    }
                }
                if (!$schoolExists) {
                   $pendigSch++;
                }
            }
        }
    }
    $comschool = $comschool->result();
    $this->load->view($dep_name.'/SchoolReviewDetailsStatus', ['uid'=>$uid,'user'=>$user,'schstatus'=>$status,'scodata'=>$scodata,'comschool'=>$comschool,'pendigSch'=>$pendigSch]);
}
   public function schoolreviewPageForPIA(){
    
    $slctSchool = $_POST['select'];
    $sstatus = $this->db->query("SELECT status FROM `spd` WHERE id='$slctSchool'");
    $sstatus = $sstatus->result();
    $selectScStatus  = $sstatus[0]->status;
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid = $user['id'];
    $id  =  $user['dep_id'];
    $currentDateTime = date('Y-m-d H:i:s');
    $dt=$this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    $tdate = date("Y-m-d");
        $getConsumeTime = $this->db->query("INSERT INTO `school_review_for_pia`(`piid`, `sid`,`school_status`,`start_date`) VALUES ('$uid','$slctSchool','$selectScStatus','$currentDateTime')");
        redirect('Menu/SelectSchoolForReview');
    }
     public function schoolreviewPage(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    if(!empty($user)){
        $getsid = $this->db->query("SELECT * FROM `school_review_for_pia` WHERE piid='$uid' AND end_date=''");
        $getsid = $getsid->result();
       if(sizeof($getsid)>0){
        $sid = $getsid[0]->sid;
        $status = $getsid[0]->school_status;
        $getschoolinfo = $this->Menu_model->GetSchoolForReview($uid,$status,$sid);
        $slog=$this->Menu_model->get_schoollogs($sid);
        $dtc=$this->Menu_model->get_school_contact($sid);
        $wgd=$this->Menu_model->get_wgdata($sid);
        $spd=$this->Menu_model->get_school_detail1($sid);
        $sstatus=$this->Menu_model->get_status();
        $getSchoolZone=$this->Menu_model->getSchoolZone();
    //   echo "<pre>";
    //     print_r($spd);
    //     die;
        $this->load->view($dep_name.'/schoolreviewPage', ['notify'=>$notify,'user'=>$user,'sid'=>$sid,'getschoolinfo'=>$getschoolinfo,'slog'=>$slog,'dtc'=>$dtc,'wgd'=>$wgd,'spddtld'=>$spd,'sstatus'=>$sstatus,'getSchoolZone'=>$getSchoolZone]);
       }else{
        redirect('Menu/SelectSchoolForReview');
       }
    }else{
        redirect('Menu/main');
    }
}
     public function SchoolReviewByPIA(){
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid = $user['id'];
    $id  =  $user['dep_id'];
    
    foreach ($_POST as $key => $value) {
        // Extracting prefix from the key
        $prefix = substr($key, 0, strpos($key, '_'));
        // Creating a sub-array if it doesn't exist
        if (!isset($groupedArray[$prefix])) {
            $groupedArray[$prefix] = array();
        }
        // Adding key-value pair to the sub-array
        $groupedArray[$prefix][$key] = $value;
    }
        unset($groupedArray['']);
        unset($groupedArray['']['sid']);
        unset($groupedArray['']['projectcode']);
        unset($groupedArray['']['designation']);
        unset($groupedArray['']['email']);
        unset($groupedArray['']['installationReport']);
        unset($groupedArray['contact']);
        unset($groupedArray['installationReport']);
        $sid = $_POST['sid'];
        $projectcode = $_POST['projectcode'];
        $schoolreviewtime = $_POST['schoolreviewtime'];
        $contact_name = $_POST['contact_name'];
        $designation  = $_POST['designation'];
        $contact_no  = $_POST['contact_no'];
        $email  = $_POST['email'];
        for ($i = 0; $i < count($contact_name); $i++) {
        $contactnames = $contact_name[$i];
        $designations = $designation[$i];
        $contactno = $contact_no[$i];
        $emails = $email[$i];
        $query =  $this->db->query("INSERT INTO `school_contact_info_re_bypi`(`contact_name`, `designation`, `contact_no`, `email`, `sid`) VALUES ('$contactnames','$designations','$contactno','$emails','$sid')");
        }
$installationReport_Checkbox     = $_POST['installationReport_Checkbox'];
foreach($groupedArray as $data){
    $indexedData = array_values($data);
    // `projectcode`,
        $query =  $this->db->query("INSERT INTO `school_reviewby_pi` (`projectcode`,`question`, `checklist`, `answer`, `sid`, `piid`) VALUES ('$projectcode','$indexedData[0]','$indexedData[1]','$indexedData[2]','$sid','$uid')");
}
$tdate = date("Y-m-d H:i:s");
$query =  $this->db->query("UPDATE `school_review_for_pia` SET `end_date`='$tdate', `schoolreviewtime`='$schoolreviewtime' WHERE sid='$sid'");
$isfiles = $_FILES['installationReport']['name'];
if(isset($isfiles) && $isfiles !==''){
    $filname2 = $_FILES['installationReport']['name'];
    $upload_path = 'uploads/PiReview/';
    if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
                // Set configuration for file upload
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = '*'; // specify allowed file types
                // $config['max_size'] = 1000; // maximum file size in KB
                // $config['max_width'] = 1024; // maximum width allowed
                // $config['max_height'] = 768; // maximum height allowed
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('installationReport')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->library('session');
                        $this->session->set_flashdata('error', 'Your installation Report is not uploaded please try again');
                        redirect('Menu/schoolreviewPage');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $upload_path = $config['upload_path'] . $data['upload_data']['file_name'];
                    // echo "File uploaded successfully. Path: $upload_path";
                }
    $query =  $this->db->query("INSERT INTO `school_reviewby_pi` (`projectcode`,`question`, `checklist`, `answer`, `sid`, `piid`) VALUES ('$projectcode','Have you uploaded the Installation Report?','No','$upload_path','$sid','$uid')");
}else{
    $flink2=0;
    $query =  $this->db->query("INSERT INTO `school_reviewby_pi` (`projectcode`,`question`, `checklist`, `answer`, `sid`, `piid`) VALUES ('$projectcode','Have you uploaded the Installation Report?','Yes','$flink2','$sid','$uid')");
}
$this->load->library('session');
$this->session->set_flashdata('success', 'School Review add SuccessFully Now add Next Year Plan For This School.');
// redirect('Menu/SchoolTimeLinePlanning?pcode=' . $projectcode . '&sid=' . $sid);
redirect('Menu/NextYearSchoolPlanAfterReview?pcode=' . $projectcode . '&sid=' . $sid);
}
public function NextYearSchoolPlanAfterReview(){
    $pcode  = $_GET['pcode'];
    $sid    = $_GET['sid'];
    $user   = $this->session->userdata('user');
    $data['user'] = $user;
    $uid    = $user['id'];
    $id     =  $user['dep_id'];
    $pcode  = urldecode($pcode);
    
    $notify     =   $this->Menu_model->get_notifybyid($uid);
    $dt         =   $this->Menu_model->get_depatment_byid($id);
    $dep_name   =   $dt[0]->dep_name;
    $this->load->view($dep_name.'/NextYearSchoolPlanAfterReview', ['uid'=>$uid,'user'=>$user,'pcode'=>$pcode,'sid'=>$sid]);
}
    public function submitNextYearSchoolPlan(){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $pcode = $_POST['pcode'];
    $sid = $_POST['sid'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`sub_answer1`, `uid`) VALUES ('$pcode','$sid','$question1[0]','$question1[1]','$question1[2]','$uid')");
    $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`uid`) VALUES ('$pcode','$sid','$question2[0]','$question2[1]','$uid')");
    $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`uid`) VALUES ('$pcode','$sid','$question4[0]','$question4[1]','$uid')");
    $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`sub_answer1`,`uid`) VALUES ('$pcode','$sid','$question5[0]','$question5[1]','$question5[2]','$uid')");
    $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`sub_answer1`,`uid`) VALUES ('$pcode','$sid','$question3[0]','$question3[1]','$question3[2]','$uid')");
    $last_inserted_id =  $this->db->insert_id();
    $isfiles = $_FILES['question3_file']['name'];
    if(isset($isfiles) && $isfiles !==''){
        $filname2 = $_FILES['question3_file']['name'];
        $upload_path = 'uploads/PiReview/';
        if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
                    // Set configuration for file upload
                    $config['upload_path'] = $upload_path;
                    $config['allowed_types'] = '*'; // specify allowed file types
                    // $config['max_size'] = 1000; // maximum file size in KB
                    // $config['max_width'] = 1024; // maximum width allowed
                    // $config['max_height'] = 768; // maximum height allowed
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('question3_file')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->library('session');
                            $this->session->set_flashdata('error_message', 'Your offline achieve Report is not uploaded please try again');
                            redirect('Menu/NextYearSchoolPlanAfterReview?pcode=' . $pcode . '&sid=' . $sid);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $upload_path = $config['upload_path'] . $data['upload_data']['file_name'];
                    }
                    $query =  $this->db->query("UPDATE `next_year_school_plan` SET `sub_answer1`='$upload_path'WHERE id='$last_inserted_id'");
    }
    $schoolStatus_name = $_POST['schoolStatus_name'];
    $statusConversionName = $_POST['statusConversionName'];
    $statusConversionNamesString = implode(", ", $statusConversionName);
    $statusConversionDate = $_POST['statusConversionDate'];
    $statusConversionDateString = implode(", ", $statusConversionDate);
        $this->db->query("INSERT INTO `next_year_school_plan`(`projectcode`,`sid`,`question`, `answer`,`sub_answer1`,`sub_answer2`, `uid`) VALUES ('$pcode','$sid','$schoolStatus_name[0]','$schoolStatus_name[1]','$statusConversionNamesString','$statusConversionDateString','$uid')");
        $this->load->library('session');
        $this->session->set_flashdata('success', 'Next Year School Plan add SuccessFully Now Add School Timeline');
        redirect('Menu/SchoolTimeLinePlanning/'.$pcode.'/'. $sid);
}
     public function SchoolTimeLinePlanning($pcode,$sid){
    $user = $this->session->userdata('user');
    $data['user'] = $user;$uid= $user['id'];
    $id =  $user['dep_id'];
    
    $notify=$this->Menu_model->get_notifybyid($uid);
    $dt=$this->Menu_model->get_depatment_byid($id);
    $pia=$this->Menu_model->get_user_pia();
    $week = $this->Menu_model->get_week();
    $dep_name = $dt[0]->dep_name;
    $pcode      = urldecode($pcode);
    $this->load->view($dep_name.'/SchoolTimeLinePlanning',['pcode'=>$pcode,'sid'=>$sid,'week'=>$week,'pia'=>$pia,'notify'=>$notify,'user'=>$user,'uid'=>$uid]);
}
     public function getspdbyuserpcs12(){
    $pcode= $this->input->post('pcode');
    $userid = $this->input->post('userid');
    
    $result=$this->Menu_model->get_spdbyusernpc($pcode,$userid);
    echo  $data = '<option selected disabled>Select School</option>';
    foreach($result as $d){
        $sid = $d->id;
        $spd=$this->Menu_model->get_stimelinebypisid1($sid,$userid);
        if(!$spd){
            echo  $data = '<option value='.$d->id.'>'.$d->sname.'('.$d->scity.' '.$d->sstate.')</option>';
        }
    }
    return $data;
}
     public function getTargetDateBYPM(){
    $pcode  = $this->input->post('pcode');
    $spd_id = $this->input->post('spd_id');
    
    $data = $this->Menu_model->getPmTargetDateSchool($pcode,$spd_id);
    print_r(json_encode($data));
}
     public function stimelineplanning(){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $notify     =   $this->Menu_model->get_notifybyid($uid);
    $dt         =   $this->Menu_model->get_depatment_byid($id);
    $pia        =   $this->Menu_model->get_user_pia();
    $week       =   $this->Menu_model->get_week();
    $dep_name   =   $dt[0]->dep_name;
    $projectcode     = $_POST['projectcode'];
    $sid             = $_POST['sid'];
    $piid            = $_POST['piid'];
    $uid             = $_POST['uid'];
    $bdid            = $_POST['bdid'];
    $wmessage        = $_POST['wmessage'];
    $communication1  = $_POST['communication1'];
    $communication2  = $_POST['communication2'];
    $communication3  = $_POST['communication3'];
    $callsfu1        = $_POST['callsfu1'];
    $callsfu2        = $_POST['callsfu2'];
    $reporttype      = $_POST['reporttype'];
    $fttp            = $_POST['fttp'];
    $rttp            = $_POST['rttp'];
    $casestudy       = $_POST['casestudy'];
    $maintenance     = $_POST['maintenance'];
    $diy             = $_POST['diy'];
    $blmne           = $_POST['blmne'];
    $elmne           = $_POST['elmne'];
    $nsp             = $_POST['nsp'];
    $outbondc1       = $_POST['outBondcommunication1'];
    $outbondc2       = $_POST['outBondcommunication2'];
    $outbondc3       = $_POST['outBondcommunication3'];
    $cengagement     = $_POST['cengagement'];
    $exstatusdt      = $_POST['exstatusdt'];
    $whatsappgroupcreation     = $_POST['whatsappgroupcreation'];
    $activation_status         = $_POST['activationstatus'];
    $annual_maintenance_status = $_POST['annualmaintenance'];
    $letter_avalability        = $_POST['lettersavailablity'];
    $pia_calls                 = $_POST['howoftenpiacalls'];
    $utilisation1              = $_POST['utilisation1'];
    $utilisation2              = $_POST['utilisation2'];
    $utilisation3              = $_POST['utilisation3'];
    $academicyear              = $_POST['academicyear'];
    $summeractivity            = $_POST['summeractivity'];
    $winteractivity            = $_POST['winteractivity'];
    $onlineactivity            = $_POST['onlineactivity'];
    $webinar                   = $_POST['webinar'];
    $sid         = $_POST['sid'];
    $projectcode = $_POST['projectcode'];
    $socialMediaPost1   =   $_POST['socialMediaPost1'];
    $socialMediaPost2   =   $_POST['socialMediaPost2'];
    $socialMediaPost3   =   $_POST['socialMediaPost3'];
    $socialMediaPost4   =   $_POST['socialMediaPost4'];
    $questions   = [];
// Start Social Media TASK and SUBTASK Creation
 for($k=1;$k<=4;$k++){
        $questions['socialMediaPost'.$k.'_dt']      = 'socialMediaPost'.$k.'_'.${"socialMediaPost".$k};
      $getTaskstage = $this->Menu_model->getMainTaskstage('Social Media Person','Social Media');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____Social Media Person';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('Social Media Person',$gts->tasktype,$gts->taskname);
          $j=0;
         foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
         }
          $i++;
      }
 }
      // End Social Media TASK and SUBTASK Creation
   // Start NSP Task and SUBTASK Creation
   $questions['nsp_dt']      = 'nsp_'.$nsp;
    $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','NSP');
    $i =1;
    foreach($getTaskstage as $gts){
        $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
        $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
        $j=0;
    foreach($getsTaskstage as $subtask){
        $taskdetails =  $subtask->taskdetails;
        $taskdetailsid =  $subtask->id;
        $taskaction =  $subtask->taskaction;
        $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
        $j++;
    }
        $i++;
    }
    $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','NSP');
    foreach($getTaskstage as $gts){
        $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
        $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
        $j=0;
       foreach($getsTaskstage as $subtask){
        $taskdetails =  $subtask->taskdetails;
        $taskdetailsid =  $subtask->id;
        $taskaction =  $subtask->taskaction;
        $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
        $j++;
       }
        $i++;
    }
    // End NSP Task and SUBTASK Creation
    // Start Communication Task and SUBTASK Creation
        for($k=1;$k<=3;$k++){
            $questions['communication'.$k.'_dt']      = 'communication'.$k.'_'.${"communication".$k};
            $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Communication');
            $i =1;
            foreach($getTaskstage as $gts){
                $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
                $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
                $j=0;
            foreach($getsTaskstage as $subtask){
                $taskdetails =  $subtask->taskdetails;
                $taskdetailsid =  $subtask->id;
                $taskaction =  $subtask->taskaction;
                $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                $j++;
            }
                $i++;
            }
        }
    // End Communication Task and SUBTASK Creation
    // Start Call for Utilisation Task and SUBTASK Creation
    for($k=1;$k<=2;$k++){
        $questions['callsfu'.$k.'_dt']      = 'callsfu'.$k.'_'.${"callsfu".$k};
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Call for Utilisation');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Call for Utilisation');
        $x=1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.$x.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
            $x++;
        }
    }
    // End Call for Utilisation Task and SUBTASK Creation
    // Start Report Type Task and SUBTASK Creation
        // if reporttype = 8 - Monthly
        // if reporttype = 4 - Quarterly
        // if reporttype = 1 - Yearly
    if($reporttype ==8){
        for($k=1;$k<=12;$k++){
        $questions['reporttype'.$k.'_dt']      = $reporttype;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Report Type');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Report Type');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
    }
    }
    if($reporttype == 4){
        for($k=1;$k<=3;$k++){
        $questions['reporttype'.$k.'_dt']      = $reporttype;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Report Type');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Report Type');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype.$k][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
    }
    }
        if($reporttype == 1){
            $questions['reporttype_dt']      = 'reporttype_'.$reporttype;
            $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Report Type');
            $i =1;
            foreach($getTaskstage as $gts){
                $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
                $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
                $j=0;
            foreach($getsTaskstage as $subtask){
                $taskdetails =  $subtask->taskdetails;
                $taskdetailsid =  $subtask->id;
                $taskaction =  $subtask->taskaction;
                $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                $j++;
            }
                $i++;
            }
            $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Report Type');
            foreach($getTaskstage as $gts){
                $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
                $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
                $j=0;
            foreach($getsTaskstage as $subtask){
                $taskdetails =  $subtask->taskdetails;
                $taskdetailsid =  $subtask->id;
                $taskaction =  $subtask->taskaction;
                $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                $j++;
            }
                $i++;
            }
        }
    // End Report Type Task and SUBTASK Creation
    // Start Outbond Communication 1 Task and SUBTASK Creation
    for($k=1;$k<=3;$k++){
      $questions['outbondc'.$k.'_dt']      = 'outbondc'.$k.'_'.${"outbondc".$k};
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Outbond Communication');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Outbond Communication');
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype.$k][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
    }
    // End Outbond Communication 1 Task and SUBTASK Creation
    // Start Winter Activity Task and SUBTASK Creation
      $questions['summeractivity_dt']      = 'summeractivity_'.$summeractivity;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Summer Activity');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Summer Activity');
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
     // End Winter Activity Task and SUBTASK Creation
     // Start Winter Activity Task and SUBTASK Creation
      $questions['winteractivity_dt']      = 'winteractivity_'.$winteractivity;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Winter Activity');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Winter Activity');
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
    // End Winter Activity Task and SUBTASK Creation
    // Start onlineactivity Task and SUBTASK Creation
      $questions['onlineactivity_dt']      = 'onlineactivity_'.$onlineactivity;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Online Activity');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Online Activity');
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      // End onlineactivity Task and SUBTASK Creation
      // Start Webinar Task and SUBTASK Creation
      $questions['webinar_dt']      = 'webinar_'.$webinar;
      $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Webinar');
      $i =1;
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
      $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Webinar');
      foreach($getTaskstage as $gts){
          $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
          $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
          $j=0;
      foreach($getsTaskstage as $subtask){
          $taskdetails =  $subtask->taskdetails;
          $taskdetailsid =  $subtask->id;
          $taskaction =  $subtask->taskaction;
          $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
          $j++;
      }
          $i++;
      }
        // End Webinar Task and SUBTASK Creation
        // Start Client Engagement Task and SUBTASK Creation
          $questions['cengagement_dt']      = 'Client Engagement_'.$cengagement;
          $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Client Engagement');
          $i =1;
          foreach($getTaskstage as $gts){
              $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
              $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
              $j=0;
          foreach($getsTaskstage as $subtask){
              $taskdetails =  $subtask->taskdetails;
              $taskdetailsid =  $subtask->id;
              $taskaction =  $subtask->taskaction;
              $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
              $j++;
          }
              $i++;
          }
        // End Client Engagement Task and SUBTASK Creation
        // Start RTTP Task and SUBTASK Creation
           $questions['rttp_dt']      = 'RTTP_'.$rttp;
           $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','RTTP');
           $i =1;
           foreach($getTaskstage as $gts){
               $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
               $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
               $j=0;
           foreach($getsTaskstage as $subtask){
               $taskdetails =  $subtask->taskdetails;
               $taskdetailsid =  $subtask->id;
               $taskaction =  $subtask->taskaction;
               $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
               $j++;
           }
               $i++;
           }
           $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','RTTP');
           foreach($getTaskstage as $gts){
               $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
               $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
               $j=0;
           foreach($getsTaskstage as $subtask){
               $taskdetails =  $subtask->taskdetails;
               $taskdetailsid =  $subtask->id;
               $taskaction =  $subtask->taskaction;
               $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
               $j++;
           }
               $i++;
           }
        // End RTTP Task and SUBTASK Creation
        // Start Welcome Message Task and SUBTASK Creation
        $questions['wmessage_dt']      = 'Welcome Message_'.$fttp;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Welcome Message');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Welcome Message');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        // End Welcome Message Task and SUBTASK Creation
        // Start FTTP Task and SUBTASK Creation
        $questions['fttp_dt']      = 'FTTP_'.$fttp;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','FTTP');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','FTTP');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
        foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
        }
            $i++;
        }
        // End FTTP Task and SUBTASK Creation
        // Start Maintenance Task and SUBTASK Creation
        $questions['maintenance_dt']      = 'Maintenance_'.$maintenance;
        $getTaskstage = $this->Menu_model->getMainTaskstage('Maintenance person','Maintenance');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____Maintenance person';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('Maintenance person',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Maintenance');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Maintenance');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
          // End Maintenance Task and SUBTASK Creation
          // Start Case Study Task and SUBTASK Creation
          $questions['casestudy_dt']      = 'Case Study_'.$casestudy;
          $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','case Study');
          $i =1;
          foreach($getTaskstage as $gts){
              $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
              $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
              $j=0;
             foreach($getsTaskstage as $subtask){
              $taskdetails =  $subtask->taskdetails;
              $taskdetailsid =  $subtask->id;
              $taskaction =  $subtask->taskaction;
              $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
              $j++;
             }
              $i++;
          }
          $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','case Study');
          foreach($getTaskstage as $gts){
              $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
              $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
              $j=0;
             foreach($getsTaskstage as $subtask){
              $taskdetails =  $subtask->taskdetails;
              $taskdetailsid =  $subtask->id;
              $taskaction =  $subtask->taskaction;
              $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
              $j++;
             }
              $i++;
          }
        // End Case Study Task and SUBTASK Creation
        // Start Base Line M&E Task and SUBTASK Creation
        if(isset($_POST['blmne'])){
        $questions['blmne_dt']      = 'Base Line M&E_'.$blmne;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Base Line M&E');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Base Line M&E');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
    }else{
        $blmne = '';
    }
        // End Base Line M&E Task and SUBTASK Creation
        // Start End Line M&E Task and SUBTASK Creation
        if(isset($_POST['elmne'])){
          $questions['elmne_dt']        = 'End Line M&E_'.$elmne;
          $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','End Line M&E');
          $i =1;
          foreach($getTaskstage as $gts){
              $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
              $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
              $j=0;
             foreach($getsTaskstage as $subtask){
              $taskdetails =  $subtask->taskdetails;
              $taskdetailsid =  $subtask->id;
              $taskaction =  $subtask->taskaction;
              $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
              $j++;
             }
              $i++;
          }
          $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','End Line M&E');
          foreach($getTaskstage as $gts){
              $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
              $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
              $j=0;
             foreach($getsTaskstage as $subtask){
              $taskdetails =  $subtask->taskdetails;
              $taskdetailsid =  $subtask->id;
              $taskaction =  $subtask->taskaction;
              $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
              $j++;
             }
              $i++;
          }
        }else{
            $elmne = '';
        }
        // End End Line M&E Task and SUBTASK Creation
        // Start Utilisation Task and SUBTASK Creation
        for($k=1;$k<=3;$k++){
            $questions['utilisation'.$k.'_dt']      = 'utilisation'.$k.'_'.${"utilisation".$k};
            $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','Utilisation');
            $i =1;
            foreach($getTaskstage as $gts){
                $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____PIA';
                $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
                $j=0;
            foreach($getsTaskstage as $subtask){
                $taskdetails =  $subtask->taskdetails;
                $taskdetailsid =  $subtask->id;
                $taskaction =  $subtask->taskaction;
                $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                $j++;
            }
                $i++;
            }
            $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','Utilisation');
            foreach($getTaskstage as $gts){
                $questions[$gts->tasktype.$k][$i]= $gts->taskname.$k.'_____ZM';
                $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
                $j=0;
            foreach($getsTaskstage as $subtask){
                $taskdetails =  $subtask->taskdetails;
                $taskdetailsid =  $subtask->id;
                $taskaction =  $subtask->taskaction;
                $questions[$gts->tasktype.$k][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
                $j++;
                }
                $i++;
            }
          }
        // End Utilisation Task and SUBTASK Creation
        // Start DIY TASK and SUBTASK Creation
        $questions['diy_dt']        = 'DIY_'.$diy;
        $getTaskstage = $this->Menu_model->getMainTaskstage('PIA','DIY');
        $i =1;
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____PIA';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('PIA',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
        $getTaskstage = $this->Menu_model->getMainTaskstage('ZM','DIY');
        foreach($getTaskstage as $gts){
            $questions[$gts->tasktype][$i]= $gts->taskname.'_____ZM';
            $getsTaskstage = $this->Menu_model->getMainSubTaskstage('ZM',$gts->tasktype,$gts->taskname);
            $j=0;
           foreach($getsTaskstage as $subtask){
            $taskdetails =  $subtask->taskdetails;
            $taskdetailsid =  $subtask->id;
            $taskaction =  $subtask->taskaction;
            $questions[$gts->tasktype][$gts->taskname][$j] =$taskaction.'_'.$taskdetailsid;
            $j++;
           }
            $i++;
        }
        // End DIY TASK and SUBTASK Creation
        // echo "<pre>";
        // print_r($questions);
        // die;
        // dd($questions);
        // Start Task & SubTask Creation and Store in Database
        foreach($questions as $qs=>$q){
            if (is_array($q)){
                $k=1;
                foreach($q as $key=>$value){
                    if (is_array($value)){
                    foreach($value as $subt){
                        $parts = explode("_", $subt);
                        $stage = $parts[0]; // "stage1"
                        $id = $parts[1];    // "7"
                        $this->Menu_model->school_timelinePlanningSubTask($schoolcode,$sid,$taskid,$uid,$id,$stage);
                        $k++;
                       }
                    }else{
                    $valuearr = explode("_____", $value);
                    $value = $valuearr[0];
                    $taskperformedby = $valuearr[1];
                    $schoolcode = "STC"."_".$k."_".$sid;
                    $task_assignby = 'Auto Generated After School Review';
                    $taskid = $this->Menu_model->school_timelinePlanningTask($taskperformedby,$qs,$value,$projectcode,$schoolcode,$sid,$uid,$task_assignby);
                    }
                }
            }
        }
        //End Task & SubTask Creation and Store in Database
        $status  = $this->input->post('status');
        $zmvisit    = $_POST['zmvisit'];
        $pmvisit    = $_POST['pmvisit'];
        $otherdepartmentcall = '';
        $bdreview = '';
        $this->Menu_model->school_timelinePlanning($sid,$piid,$projectcode,$uid,$bdid,$wmessage,$communication1,$communication2,$communication3,$callsfu1,$callsfu2,$reporttype,$fttp,$rttp,$casestudy,$maintenance,$diy,$blmne,$elmne,$exstatusdt,$nsp,$utilisation1,$utilisation2,$utilisation3,$bdreview,$cengagement,$status,$academicyear,$zmvisit,$pmvisit,$otherdepartmentcall,$outbondc1,$outbondc2,$outbondc3,$summeractivity,$winteractivity,$onlineactivity,$webinar);
        $this->load->library('session');
        $this->session->set_flashdata('success_message', 'School Time Line Setting SuccessFully Done.');
        redirect('Menu/SelectSchoolForReview');
}
      public function CheckProgramTimelineData(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            $pcode      = $_GET['pcode'];
            $pcode      = urldecode($pcode);
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $gettimeline  =  $this->db->query("SELECT * FROM `program_timeline_planning`");
            $gettimeline =  $gettimeline->result();
            $this->load->view($dep_name.'/CheckProgramTimelineData', ['uid'=>$uid,'user'=>$user,'gettimeline'=>$gettimeline]);
        }
     public function SchoolReviewTaskDetails($type,$sid){
    $user         = $this->session->userdata('user');
    $data['user'] = $user;
    $uid          = $user['id'];
    $id           =  $user['dep_id'];
    
    $notify   = $this->Menu_model->get_notifybyid($uid);
    $dt       = $this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    if($type == 'Visit'){
        $data = $this->db->select('*')->from('visitstupdate')->where(['sid'=> $sid])->get()->result();
        $slog=$this->Menu_model->get_schoollogs($sid);
        $visitData = array_filter($slog, function ($item) {
            return $item->task_type === 'Visit';
        });
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'data'=>$data,'visitData'=>$visitData]);
    }
    if($type == 'Utilisation'){
        $data = $this->db->select('*')->from('wgdata')->where(['type'=>'Utilisation','sid'=> $sid])->get()->result();
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'data'=>$data]);
    }
    if($type == 'Communication'){
        $data = $this->db->select('*')->from('wgdata')->where(['type'=>'Communication','sid'=> $sid])->get()->result();
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'data'=>$data]);
    }
    if($type == 'TotalLoginSchool'){
        $slog=$this->Menu_model->get_schoollogs($sid);
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'slog'=>$slog]);
    }
    if($type == 'Call'){
        $slog=$this->Menu_model->get_schoollogs($sid);
        $callData = array_filter($slog, function ($item) {
            return $item->task_type === 'Call';
        });
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'callData'=>$callData]);
    }
    if($type == 'Report'){
        $slog=$this->Menu_model->get_schoollogs($sid);
        $reportData = array_filter($slog, function ($item) {
            return $item->task_type === 'Report';
        });
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'reportData'=>$reportData]);
    }
    if($type == 'Email'){
        $slog=$this->Menu_model->get_schoollogs($sid);
        $emailtData = array_filter($slog, function ($item) {
            return $item->task_type === 'Email';
        });
        $this->load->view($dep_name.'/SchoolReviewTaskDetails', ['type'=>$type,'sid'=>$sid,'emailtData'=>$emailtData]);
    }
}
      public function SchoolReviewReportPage(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $getcslist  =  $this->db->query("SELECT * FROM `school_review_for_pia` WHERE piid=$uid and end_date!=''");
            $getcslist =  $getcslist->result();
            $getpslist  =  $this->db->query("SELECT * FROM `spd` WHERE pi_id = $uid AND spd.id NOT IN (SELECT sid FROM school_review_for_pia)");
//  echo $str = $this->db->last_query();
            $getpslist =  $getpslist->result();
            $this->load->view($dep_name.'/SchoolReviewReportPage', ['uid'=>$uid,'user'=>$user,'getcslist'=>$getcslist,'getpslist'=>$getpslist]);
        }
        public function SchoolReviewDetailsByID($sid){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $getSRP  =  $this->db->query("SELECT * FROM `school_reviewby_pi`WHERE sid ='$sid'");
            $getSRPData =  $getSRP->result();
            $getNYSP  =  $this->db->query("SELECT * FROM `next_year_school_plan`WHERE sid ='$sid'");
            $getNYSPData =  $getNYSP->result();
            $getSCI  =  $this->db->query("SELECT * FROM `school_contact_info_re_bypi`WHERE sid ='$sid'");
            $getSCIData =  $getSCI->result();
            $this->load->view($dep_name.'/SchoolReviewDetailsByID', ['uid'=>$uid,'user'=>$user,'getSRPData'=>$getSRPData,'getNYSPData'=>$getNYSPData,'getSCIData'=>$getSCIData,'sid'=>$sid]);
        }
     public function ProgramReviewWithPIADetails(){
            $user       = $this->session->userdata('user');
            $data['user'] = $user;
            $uid        = $user['id'];
            $id         =  $user['dep_id'];
            
            $notify     =   $this->Menu_model->get_notifybyid($uid);
            $dt         =   $this->Menu_model->get_depatment_byid($id);
            $dep_name   =   $dt[0]->dep_name;
            $getCompPcode  =  $this->db->query("SELECT DISTINCT(projectcode) FROM `school_reviewby_pi`");
            $getCompPcode =  $getCompPcode->result();
            $this->load->view($dep_name.'/ProgramReviewWithPIADetails', ['uid'=>$uid,'user'=>$user,'getCompPcode'=>$getCompPcode]);
     }
     public function ProjectWiseReviewDetails(){
        $user       = $this->session->userdata('user');
        $data['user'] = $user;
        $uid        = $user['id'];
        $id         =  $user['dep_id'];
        
        $notify     =   $this->Menu_model->get_notifybyid($uid);
        $dt         =   $this->Menu_model->get_depatment_byid($id);
        $dep_name   =   $dt[0]->dep_name;
        $pcode = $_GET['pcode'];
        $getPIARevData  =  $this->db->query("SELECT DISTINCT(sid), piid FROM `school_reviewby_pi` where projectcode='$pcode'");
        $getPIARevData =  $getPIARevData->result();
        $this->load->view($dep_name.'/ProjectWiseReviewDetails', ['uid'=>$uid,'user'=>$user,'piaRevData'=>$getPIARevData,'pcode'=>$pcode]);
     }
     public function ReviewDataApproved($status,$name,$sid){
        echo $status."<br/>";
        echo $name."<br/>";
        echo $sid."<br/>";
        die;
     }
public function addNewSchoolUsingCsv(){
    $this->load->library('session');
    $user = $this->session->userdata('user');
    $data['user'] = $user;
    $uid = $user['id'];
    $id = $user['dep_id'];
    
    $notify = $this->Menu_model->get_notifybyid($uid);
    $dt = $this->Menu_model->get_depatment_byid($id);
    $dep_name = $dt[0]->dep_name;
    $isapprove = true;
    if ($isapprove) {
        $file_path = "https://stemoppapp.in/uploads/schoolcsv/80Schools.csv";
        // Debugging: Check file path
        echo "File Path: $file_path<br>";
            $handle = @fopen($file_path, "r");
            // Check if file handle is valid
            if ($handle !== FALSE) {
                $csv_data = array();
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $csv_data[] = $row;
                }
                fclose($handle);
                unset($csv_data[0]);
                echo "<pre>";
                print_r($csv_data);
                die;
                // Process each row of CSV data
                $i=1;
                foreach ($csv_data as $cdata) {
                    if($cdata[1] !=='' &&  $cdata !==''){
                    $schoolname             = $cdata[1];   // School Name
                    $typeofSchool           = $cdata[2];   // Type of School
                    $address                = $cdata[3];   // Address-Village/Block/Tehsil
                    $district               = $cdata[4];   // District
                    $state                  = $cdata[5];   // State
                    $prinicpal              = $cdata[6];   // Prinicpal's Name
                    $contact                = $cdata[7];   // Contact Number
                    $numberofStudents       = $cdata[8];   // Number of Students
                    $scienceMath            = $cdata[9];   // Science/Math Teachers Count
                    $availibilityofroom     = $cdata[10];  // Availibility of Room
                    $IsitBorderArea         = $cdata[11];  // Is it Border Area
                    $readiness              = $cdata[12];  // Readiness
                    $letterofDEO            = $cdata[13];  // Letter of DEO
                    $letterfromSchool       = $cdata[14];  // Letter from School
                    $languageforMSC         = $cdata[15];  // Language for MSC
                    // $current_date = date('Y-m-d H:i:s');
                    //   $data = [
                    //     'sname' => 0,
                    //     'nextCFID' => 0,
                    //     'fwd_date' => $current_date,
                    //     'actiontype_id' => 15,
                    //     'assignedto_id' => $annual->user_id,
                    //     'purpose_id' => 127,
                    //     'targetstatus' => 0,
                    //     'actontaken' => 'no',
                    //     'purpose_achieved' => 'no',
                    //     'cid_id'=>$init->id,
                    //     'remarks'=>'After Focus funnel and Top Spender And Partner Type details are updated',
                    //     'status_id'=>$current_ysid,
                    //     'user_id' => $annual->user_id,
                    //     'date' => date('Y-m-d H:i:s'),
                    //     'updateddate' => date('Y-m-d H:i:s'),
                    //     'is_new' => 1
                    // ];
                    // $this->db->insert('tblcallevents',$data);
                    echo $i." ] School Name = ".$schoolname."<br/>";
                    $i++;
                    }
                }
            } else {
                $error_message = "Unable to open the CSV file. Please check the file URL and ensure the server allows remote file access.";
                $this->session->set_flashdata('action_message', $error_message);
                redirect('Menu/Dashboard');
            }
    }
}
public function updateProjectSid(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $notify     =   $this->Menu_model->get_notifybyid($uid);
    $dt         =   $this->Menu_model->get_depatment_byid($id);
    $dep_name   =   $dt[0]->dep_name;
    $getwgPcode  =  $this->db->query("SELECT DISTINCT project_code FROM `wgdata`");
    $getwgPcode =  $getwgPcode->result();
    $getPcodereport  =  $this->db->query("SELECT DISTINCT project_code FROM `report`");
    $getPcodereport =  $getPcodereport->result();
    $this->load->view($dep_name.'/updateProjectSid', ['uid'=>$uid,'user'=>$user,'getwgPcode'=>$getwgPcode,'getPcodereport'=>$getPcodereport]);
}
public function UpdateProgramPage(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $notify     =   $this->Menu_model->get_notifybyid($uid);
    $dt         =   $this->Menu_model->get_depatment_byid($id);
    $dep_name   =   $dt[0]->dep_name;
    $project_code = $_POST['project_code'];
    if(isset($project_code)){
    $getwgPcode  =  $this->db->query("SELECT * FROM `wgdata` where project_code = '$project_code'");
    $getwgPcode =  $getwgPcode->result();
    $this->load->view($dep_name.'/UpdateProgramPage', ['uid'=>$uid,'user'=>$user,'pcode'=>$project_code,'getwgPcode'=>$getwgPcode]);
    }else{
        redirect('Menu/updateProjectSid');
    }
}
public function UpdateProgramReportPage(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $notify     =   $this->Menu_model->get_notifybyid($uid);
    $dt         =   $this->Menu_model->get_depatment_byid($id);
    $dep_name   =   $dt[0]->dep_name;
    $project_code = $_POST['project_code'];
    if(isset($project_code)){
    $getwgPcode  =  $this->db->query("SELECT * FROM `report` where project_code = '$project_code'");
    $getwgPcode =  $getwgPcode->result();
    $this->load->view($dep_name.'/UpdateProgramReportPage', ['uid'=>$uid,'user'=>$user,'pcode'=>$project_code,'getwgPcode'=>$getwgPcode]);
    }else{
        redirect('Menu/updateProjectSid');
    }
}
public function UpdateProgramPageSID(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $pcode = $_POST['project_code'];
    $old_sid = $_POST['old_sid'];
    $upsid = $_POST['update_sid'];
    $query =  $this->db->query("UPDATE `wgdata` SET `sid`='$upsid' WHERE project_code = '$pcode' AND sid ='$old_sid'");
    echo 1; 
}
public function UpdateProgramReportPageSID(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $pcode = $_POST['project_code'];
    $old_sid = $_POST['old_sid'];
    $upsid = $_POST['update_sid'];
    $query =  $this->db->query("UPDATE `report` SET `spd_id`='$upsid' WHERE project_code = '$pcode' AND sid ='$old_sid'");
    echo 1; 
}
public function InsertSchoolDetailsUsingCSV(){
    $user       = $this->session->userdata('user');
    $data['user'] = $user;
    $uid        = $user['id'];
    $id         =  $user['dep_id'];
    
    $file_path  = "https://stemoppapp.in/uploads/spd/spd_new11.csv";
   
      if (($handle = fopen($file_path, "r")) !== FALSE) {
            $csv_data = array();
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csv_data[] = $row;
            }
            fclose($handle);
            unset($csv_data[0]);
            unset($csv_data[1]);
            echo "<pre>";
            print_r($csv_data);
            die;
            $k=1;
            foreach($csv_data as $sdata){
        
            if(isset($sdata[0]) && !empty($sdata[0])){
            $cid                = $sdata[0]; // [0] => cid
            $cl_name            = $sdata[1]; // [1] =>  Client Name
            $project_code       = $sdata[2]; // [2] => PROJECT CODE
            $sname              = $sdata[3]; // [3] =>  SCHOOL NAME 
            $addredress         = $sdata[4]; // [3] => ADDREESS 
            $state              = $sdata[5]; // [4] => STATE
            $district           = $sdata[6]; // [6] => District
            $princ_name         = $sdata[7]; // [7] =>  PRINCIPAL NAME 
            $contact_no         = $sdata[8]; // [8] => CONTACT NO 
            
            $stypes             = $sdata[9]; // [9] => TYPE  OF SCHOOL 
            $smidium            = $sdata[10];// [10] => SCHOOL MEDIUM 
            $slangiage          = $sdata[11]; // [11] =>  SCHOOL LANGUAGE 
            
            $total_student      = $sdata[25]; // [9] =>  total_student 
            $sdate = date("Y-m-d");
      
            // echo "INSERT INTO `spd`(`sdate`,`project_code`,`clientname`,`sname`, `saddress`,`sstate`,`sdistrict`,`slanguage`,`total_students`,`cid`) VALUES ('$sdate','$project_code','$cl_name','$sname','$addredress','$state','$district','$slangiage','$total_student','$cid')";
            
            //     echo "<br/>";
            //     echo "<br/>";
                
            $query =  $this->db->query("INSERT INTO `spd`(`sdate`,`project_code`,`clientname`,`sname`, `saddress`,`sstate`,`sdistrict`,`slanguage`,`total_students`,`cid`) VALUES ('$sdate','$project_code','$cl_name','$sname','$addredress','$state','$district','$slangiage','$total_student','$cid')");
            
            // [0] => cid
            // [1] => clinet_name
            // [2] => PROJECT CODE
            // [3] =>  SCHOOL NAME 
            // [4] => ADDREESS 
            // [5] => STATE 
            // [6] => DISTRICT
            // [7] =>  PRINCIPAL NAME 
            // [8] => CONTACT NO 
            // [9] => TYPE  OF SCHOOL 
            // [10] => SCHOOL MEDIUM 
            // [11] =>  SCHOOL LANGUAGE 
            // [25] => Total Students 
            
                echo "<br/>";
                echo $k.'= '. $cl_name.' || '.$project_code.' || '.$sname;
            $k++;
            }
            }
            }else{
                echo "Files are not exists";
            }
   
    die("stem pvt ltd");
}

// ============================================================================================
                            // Start Deepak Operations (New Developement) // 
// ============================================================================================
public function AllBDRequestAssign($rtype,$code){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    
    $notify         = $this->Menu_model->get_notifybyid($uid);
    $dt             = $this->Menu_model->get_depatment_byid($id);
    $bdr            = $this->Menu_model->GetAllBDRequestByRequestType($rtype,$code);
    $bdrcount       = $this->Menu_model->get_bdrcount();
    $dep_name       = $dt[0]->dep_name;
    if(!empty($user)){
        $this->load->view($dep_name.'/bdrassign', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount]);
    }else{
        redirect('Menu/main');
    }
}


public function bdrassign($rtype,$code){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    
    $notify         = $this->Menu_model->get_notifybyid($uid);
    $dt             = $this->Menu_model->get_depatment_byid($id);
    // $bdr            = $this->Menu_model->get_bdrbyd($code);
    $bdr            = $this->Menu_model->GetAllBDRequestByRequestType($rtype,$code);
    $bdrcount       = $this->Menu_model->get_bdrcount();
    $reqData        = $this->Menu_model->GetBDRequestALLInfoBYRequestCode($rtype);
    $dep_name       = $dt[0]->dep_name;
   
    if(!empty($user)){
        $this->load->view($dep_name.'/bdrassign', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount,'reqData'=>$reqData,'code'=>$code]);
    }else{
        redirect('Menu/main');
    }
}


public function TheAssigningProcess($rtype,$reqID){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    
    $notify         = $this->Menu_model->get_notifybyid($uid);
    $dt             = $this->Menu_model->get_depatment_byid($id);
    $bdr            = $this->Menu_model->GetBDRequestByRequestID($reqID);
    $reqData        = $this->Menu_model->GetBDRequestALLInfoBYRequestCode($rtype);


    $getSPDRequest    = $this->Menu_model->GetBDRequestTimeSPDRequest($reqID);
    
    $dep_name       = $dt[0]->dep_name;
   
    if(!empty($user)){
        $this->load->view($dep_name.'/TheAssigningProcess', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'reqData'=>$reqData,'reqID'=>$reqID,'getSPDRequest'=>$getSPDRequest]);
    }else{
        redirect('Menu/main');
    }
}



public function BDREQUEST(){
    $code            = 1;
    $user            = $this->session->userdata('user');
    $data['user']    = $user;$uid= $user['id'];
    $uid             = $user['id'];
    $id              =  $user['dep_id'];
    
    $notify          = $this->Menu_model->get_notifybyid($uid);
    $dt              = $this->Menu_model->get_depatment_byid($id);
    $bdr             = $this->Menu_model->get_bdrbyd($code);
    $bdrcount        = $this->Menu_model->get_bdrcount();
    $dep_name        = $dt[0]->dep_name;
    if(!empty($user)){
        $this->load->view($dep_name.'/BDREQUEST', ['user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount]);
    }else{
        redirect('Menu/main');
    }
}

public function BDREQUEST_DATA($rtype,$code){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    
    $notify         = $this->Menu_model->get_notifybyid($uid);
    $dt             = $this->Menu_model->get_depatment_byid($id);
    // $bdr            = $this->Menu_model->get_bdrbyd($code);
    $bdr            = $this->Menu_model->GetAllBDRequestByRequestType($rtype,$code);
    $bdrcount       = $this->Menu_model->get_bdrcount();
    $reqData        = $this->Menu_model->GetBDRequestALLInfoBYRequestCode($rtype);
    $dep_name       = $dt[0]->dep_name;
   
    if(!empty($user)){
        $this->load->view($dep_name.'/BDREQUEST_DATA', ['rtype'=>$rtype,'user'=>$user,'notify'=>$notify,'bdr'=>$bdr,'bdrcount'=>$bdrcount,'reqData'=>$reqData,'code'=>$code]);
    }else{
        redirect('Menu/main');
    }
}


public function GetTaskOnBDRequestTaskId(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    

    $selectedTaskId = $this->input->post('selectedTaskId');
    $reqID          = $this->input->post('reqID');

    $taskDatas      = $this->Menu_model->GetBDRequestTaskByRequestIDWithTaskIDS($reqID,$selectedTaskId);
    
    echo '<option value="">Select</option>';
    foreach ($taskDatas as $taskData) {
        $title = $taskData->client_name;
        echo '<option title="' . htmlspecialchars($title, ENT_QUOTES) . '" value="' . $taskData->rsid . '">' .
             $taskData->sname . ' (' . $taskData->taskname . ')' . 
             '</option>';
    }
}
public function GetTaskOnBDRequestTBLTaskId(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    

    $tbltaskId = $this->input->post('tbltaskId');
    $reqID          = $this->input->post('reqID');

    $taskDatas      = $this->Menu_model->GetBDRequestTaskByRequestIDWithTBLTaskIDS($reqID,$tbltaskId);
    foreach ($taskDatas as $taskData) {
        $title = $taskData->client_name;
        echo '<option title="' . htmlspecialchars($title, ENT_QUOTES) . '" value="' . $taskData->task_id . '">' .
             $taskData->sname . ' (' . $taskData->taskname . ')' . 
             '</option>';
    }
}



// Research Start Here
public function GetTaskOnBDRequestTaskIdResearch(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    

    $selectedTaskId = $this->input->post('selectedTaskId');
    $reqID          = $this->input->post('reqID');

    $taskDatas      = $this->Menu_model->GetBDRequestTaskByRequestIDWithTaskIDSResearch($reqID,$selectedTaskId);
    
    echo '<option value="">Select</option>';
    $i=1;
    foreach ($taskDatas as $taskData) {
        $title = $taskData->client_name;
        echo '<option title="' . htmlspecialchars($title, ENT_QUOTES) . '" value="' . $taskData->task_id . '">' .
             $taskData->taskname . ' (' . $i. ')' . 
             '</option>';
             $i++;
    }
}


public function GetTaskOnBDRequestTBLTaskIdResearch(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    

    $selectedTaskId = $this->input->post('tbltaskId');
    $reqID          = $this->input->post('reqID');

    $taskDatas      = $this->Menu_model->GetBDRequestTaskByRequestIDWithTBLTaskIDSResearch($reqID,$selectedTaskId);
    // echo $this->db->last_query();
    // echo '<option value="">Select</option>';
    $i=1;
    foreach ($taskDatas as $taskData) {
        $title = $taskData->client_name;
        echo '<option title="' . htmlspecialchars($title, ENT_QUOTES) . '" value="' . $taskData->task_id . '">' .
             $taskData->taskname . ' (' . $i. ')' . 
             '</option>';
             $i++;
    }
}




// ============================================================
public function BDRequestAssignToProcess(){
    $user           = $this->session->userdata('user');
    $data['user']   = $user;$uid= $user['id'];
    $uid            = $user['id'];
    $id             =  $user['dep_id'];
    

    $reqID              = $this->input->post('reqID');
    $request_code       = $this->input->post('request_code');
    $school_id          = $this->input->post('school_id');
    
    $assignto                = $this->input->post('assignto');
    $assign_number_of_school = $this->input->post('assign_number_of_school');

    $exdate             = $this->input->post('exdate');
    $remark             = $this->input->post('remark');
    $zmapr              = $this->input->post('zmapr');
    $fwd_date           = date("Y-m-d H:i:s");

    if (is_array($assignto)) {
        $i = 0;
        $j = 0; // Initialize school index outside loop
        foreach ($assignto as $assignto_uid) {
            $assign_number_of_school_count = $assign_number_of_school[$i];
        
            for ($k = 0; $k < $assign_number_of_school_count; $k++) {
                // Ensure school index is within bounds
                if (isset($school_id[$j])) {
                    // echo "assignto_uid $assignto_uid and number of school $assign_number_of_school_count school_id $school_id[$j] <br/>";
                   
                    $rsid = $school_id[$j];
                    $taskDatas      = $this->Menu_model->GetTaskSequenceByBDRequestANDRSID($reqID,$rsid);
                    foreach($taskDatas as $taskData){
                        $task_id = $taskData->task_id;
                        $data = [
                            'user_id'               => $assignto_uid,
                            'assigned_by'           => $uid,
                            'task_assigned_date'    => $fwd_date,
                            'appointment_datetime'  => $fwd_date,
                            'target_date'           => $exdate,
                            'exdate'                => $exdate,
                            'comments'              => $uid,
                            'comment_by'            => $remark
                        ];
                        
                        $this->db->where('id', $task_id);
                        $this->db->update('tblcallevents', $data);
                    }

                    $data1 = [
                        'pi_id' => $assignto_uid
                    ];
                    
                    $this->db->where('id', $rsid);
                    $this->db->update('spd_request', $data1);
                   
                    $j++; // Move to the next school
                }
            }
            $i++;
        }
    } else {
        // echo "assignto is not an array = $assignto <br>";
        // echo "school_id is not an array = $school_id";

        $taskDatas      = $this->Menu_model->GetTaskSequenceByBDRequestANDRSID($reqID,$school_id);
        foreach($taskDatas as $taskData){
            $task_id = $taskData->task_id;
            $data = [
                'user_id'               => $assignto,
                'assigned_by'           => $uid,
                'task_assigned_date'    => $fwd_date,
                'appointment_datetime'  => $fwd_date,
                'target_date'           => $exdate,
                'exdate'                => $exdate,
                'comments'              => $uid,
                'comment_by'            => $remark
            ];
            
            $this->db->where('id', $task_id);
            $this->db->update('tblcallevents', $data);
        }

        $data1 = [
            'pi_id' => $assignto
        ];
        
        $this->db->where('id', $school_id);
        $this->db->update('spd_request', $data1);
    }
    $this->load->library('session');
    $id       = $this->Menu_model->bdr_assignto($uid,$tid,$assignto,$remark,$exdate);
    $this->session->set_flashdata('success_message',' School & Task Assigned Successfully !!');
    redirect('Menu/TheAssigningProcess/'.$request_code.'/'.$reqID.'/');
  
}
public function dayscRequest(){
    $user         = $this->session->userdata('user');
    $uid          = $user['id'];
    $uyid         =  $user['type_id'];
    $data['user'] = $user;

    $req_id             = $_POST['req_id'];
    $req_answer         = $_POST['would_you_want'];
    $message            = $_POST['requestForTodaysTaskPlan'];
    $startautotasktime  = $_POST['startautotasktime'];
    $endautotasktime    = $_POST['endautotasktime'];
    $start_tttpft       = $_POST['start_tttpft'];
    $end_tttpft         = $_POST['end_tttpft'];
    $autotasktimeisset  = (isset($_POST['autotasktimeisset']))?($_POST['autotasktimeisset']):'0';
    $data = array(
        'user_id' => $uid,
        'req_id' => $req_id,
        'req_date' => date("Y-m-d H:i:s"),
        'why_did_you' => $req_answer,
        'req_remarks' => $message,
        'autotasktimeisset' => $autotasktimeisset);

    //$autotasktimeisset  = (isset($_POST['autotasktimeisset']))?($_POST['autotasktimeisset']):'0';
    // if($autotasktimeisset != 0){
        $planbutnotinited = $this->Menu_model->CreateCloseDayRequest($data);
    // }else{
    //     $planbutnotinited = $this->Menu_model->CreateCloseDayRequestWithAutoTaskTime($uid,$req_id,$req_answer,$message,$startautotasktime,$endautotasktime,$start_tttpft,$end_tttpft,$autotasktimeisset);
    // }

    



    $this->session->set_flashdata('success_message','* Day Close Request Sent SuccessFully !');
    redirect('Menu/DayManagement');
}




// public function GetAllTask(){
//     set_time_limit(108000);
//     $user           = $this->session->userdata('user');
//     $data['user']   = $user;$uid= $user['id'];
//     $uid            = $user['id'];
//     $id             =  $user['dep_id'];
//     

//     $query = $this->db->query("SELECT * FROM `tblcallevents`");
//     $data =  $query->result();
  
//     foreach($data as $task){

//         $tblid              = $task->id;
//         $sid                = $task->sid;
//         $project_code       = $task->project_code;
      
//         if($project_code !=='' && $sid == 0){

//             $query1 = $this->db->query("SELECT * FROM `school_planning_task` where  project_code = '$project_code' AND sid = ''");
//             $data1 =  $query1->result();
//             $task_assignby       = $data1[0]->task_assignby;
           
//             $data2 = array(
//                 'comments'           => $task_assignby,
//             );
//             $this->db->where('id',$tblid);
//             $success = $this->db->update('tblcallevents', $data2);

//         }else if($project_code !=='' && $sid !== 0){
//             $query1 = $this->db->query("SELECT * FROM `school_planning_task` where  project_code = '$project_code' AND sid = '$sid'");
//             $data1 =  $query1->result();
//             $task_assignby       = $data1[0]->task_assignby;
            
           
//             $data2 = array(
//                 'comments'           => $task_assignby,
//             );
//             $this->db->where('id',$tblid);
//             $success = $this->db->update('tblcallevents', $data2);
//         }

//             // echo $this->last_query();

//     }
  
//    die("Complete");
// }

















}