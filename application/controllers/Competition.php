<?php 
date_default_timezone_set("Asia/Calcutta");

defined('BASEPATH') OR exit('No direct script access allowed'); 


class Competition extends CI_Controller {

    public function registration(){
        $this->load->view('competition/register'); 
    }

    public function getstatebyzone(){
        $zone= $this->input->post('zone');
        $this->load->model('Competition_model'); 
        $result=$this->Competition_model->getStateByZone($zone);
        echo '<option value="">Select State</option>';
        foreach($result as $res){
            echo '<option value="'.$res->sstate.'">'.$res->sstate.'</option>';
        }
    }

    public function getdistrictbystateandzone(){
        $zone= $this->input->post('zone');
        $state=$this->input->post('state');
        $this->load->model('Competition_model'); 
        $result=$this->Competition_model->getDistrictByZoneAndState($zone,$state);
        echo '<option value="">Select District</option>';
        foreach($result as $res){
            echo '<option value="'.$res->sdistrict.'">'.$res->sdistrict.'</option>';
        }
    }

    public function getschoolbyzonestatedistrict(){
        $zone= $this->input->post('zone');
        $state=$this->input->post('state');
        $district=$this->input->post('district');
        $this->load->model('Competition_model'); 
        $result=$this->Competition_model->getSchoolByZoneStateDistrict($zone,$state,$district);
        echo '<option value="">Select School</option>';
        foreach($result as $res){
            echo '<option data-tokens="'.$res->sname.'" value="'.$res->id.'">'.$res->sname.'</option>';
        }
    }

    public function getschoolbyzonestate(){
        $zone= $this->input->post('zone');
        $state=$this->input->post('state');
        $this->load->model('Competition_model'); 
        $result=$this->Competition_model->getSchoolByZoneState($zone,$state);
        echo '<option value="">Select School</option>';
        foreach($result as $res){
            echo '<option data-tokens="'.$res->sname.'" value="'.$res->id.'">'.$res->sname.'</option>';
        }
    }

    public function displayschooldetails(){
        $id= $this->input->post('id');
        $this->load->model('Competition_model'); 
        $result=$this->Competition_model->getSchoolById($id);
        echo '<b>Address: </b>' . $result[0]->saddress . '</br>';
        echo '<b>Contact Details: </b></br>';
        foreach($result as $res){
            echo $res->contact_name . "(". $res->designation .")</br>";
        } 
        echo '<b>PIA: </b>' . $result[0]->fullname;
    }

    public function submitregistration(){

        $name=$this->input->post('name');
        $contact=$this->input->post('contact');
        
        $zone=$this->input->post('zone');
        $state=$this->input->post('state');
        $district=$this->input->post('district');
        $school=$this->input->post('school');
        $modelcheck=$this->input->post('modelcheck');

        $msname1=$this->input->post('msname1');
        $msstd1=$this->input->post('msstd1');
        $mpname1=$this->input->post('mpname1');
        $mpcontact1=$this->input->post('mpcontact1');
        $msname2=$this->input->post('msname2');
        $msstd2=$this->input->post('msstd2');
        $mpname2=$this->input->post('mpname2');
        $mpcontact2=$this->input->post('mpcontact2');
        $msname3=$this->input->post('msname3');
        $msstd3=$this->input->post('msstd3');
        $mpname3=$this->input->post('mpname3');
        $mpcontact3=$this->input->post('mpcontact3');

        $quizcheck=$this->input->post('quizcheck');

        $tsname1=$this->input->post('tsname1');
        $tsstd1=$this->input->post('tsstd1');
        $tpname1=$this->input->post('tpname1');
        $tpcontact1=$this->input->post('tpcontact1');
        $tsname2=$this->input->post('tsname2');
        $tsstd2=$this->input->post('tsstd2');
        $tpname2=$this->input->post('tpname2');
        $tpcontact2=$this->input->post('tpcontact2');
        $tsname3=$this->input->post('tsname3');
        $tsstd3=$this->input->post('tsstd3');
        $tpname3=$this->input->post('tpname3');
        $tpcontact3=$this->input->post('tpcontact3');

        $tinkercheck=$this->input->post('tinkercheck');

        $tisname1=$this->input->post('tisname1');
        $tisstd1=$this->input->post('tisstd1');
        $tipname1=$this->input->post('tipname1');
        $tipcontact1=$this->input->post('tipcontact1');
        $tisname2=$this->input->post('tisname2');
        $tisstd2=$this->input->post('tisstd2');
        $tipname2=$this->input->post('tipname2');
        $tipcontact2=$this->input->post('tipcontact2');
        $tisname3=$this->input->post('tisname3');
        $tisstd3=$this->input->post('tisstd3');
        $tipname3=$this->input->post('tipname3');
        $tipcontact3=$this->input->post('tipcontact3');

        $this->load->model('Competition_model'); 
        $this->Competition_model->submitregistration($school,$name,$contact,$modelcheck,$quizcheck,$tinkercheck,$msname1,$msstd1,$mpname1,$mpcontact1,$msname2,$msstd2,$mpname2,$mpcontact2,$msname3,$msstd3,$mpname3,$mpcontact3,$tsname1,$tsstd1,$tpname1,$tpcontact1,$tsname2,$tsstd2,$tpname2,$tpcontact2,$tsname3,$tsstd3,$tpname3,$tpcontact3,$tisname1,$tisstd1,$tipname1,$tipcontact1,$tisname2,$tisstd2,$tipname2,$tipcontact2,$tisname3,$tisstd3,$tipname3,$tipcontact3);
        redirect('Competition/registration');
    }

    
}
?>