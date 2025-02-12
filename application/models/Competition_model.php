<?php
class Competition_model extends CI_Model{

    public function getStateByZone($zone){
        $query=$this->db->query("select DISTINCT sstate from spd where szone='$zone'");
        return $query->result();
    }

    public function getDistrictByZoneAndState($zone,$state){
        $query=$this->db->query("select DISTINCT sdistrict from spd where szone='$zone' and sstate='$state'");
        return $query->result();
    }

    public function getSchoolByZoneStateDistrict($zone,$state,$district){
        $query=$this->db->query("select id,sname from spd where szone='$zone' and sstate='$state' and sdistrict='$district'");
        return $query->result();
    }

    public function getSchoolByZoneState($zone,$state){
        $query=$this->db->query("select id,sname from spd where szone='$zone' and sstate='$state'");
        return $query->result();
    }

    public function getSchoolById($id){
        $query=$this->db->query("SELECT * FROM `spd` LEFT JOIN spd_contact on spd.id=spd_contact.sid LEFT JOIN user_detail on spd.pi_id=user_detail.id where spd.id='$id'");
        return $query->result();
    }

    public function submitregistration($school,$name,$contact,$modelcheck,$quizcheck,$tinkercheck,$msname1,$msstd1,$mpname1,$mpcontact1,$msname2,$msstd2,$mpname2,$mpcontact2,$msname3,$msstd3,$mpname3,$mpcontact3,$tsname1,$tsstd1,$tpname1,$tpcontact1,$tsname2,$tsstd2,$tpname2,$tpcontact2,$tsname3,$tsstd3,$tpname3,$tpcontact3,$tisname1,$tisstd1,$tipname1,$tipcontact1,$tisname2,$tisstd2,$tipname2,$tipcontact2,$tisname3,$tisstd3,$tipname3,$tipcontact3){
        $this->db->query("INSERT INTO compregistration (sid,name,contact,model,quiz,tinker,msname1,msstd1,mpname1,mpcontact1,msname2,msstd2,mpname2,mpcontact2,msname3,msstd3,mpname3,mpcontact3,tsname1,tsstd1,tpname1,tpcontact1,tsname2,tsstd2,tpname2,tpcontact2,tsname3,tsstd3,tpname3,tpcontact3,tisname1,tisstd1,tipname1,tipcontact1,tisname2,tisstd2,tipname2,tipcontact2,tisname3,tisstd3,tipname3,tipcontact3) VALUES ('$school','$name','$contact','$modelcheck','$quizcheck','$tinkercheck','$msname1','$msstd1','$mpname1','$mpcontact1','$msname2','$msstd2','$mpname2','$mpcontact2','$msname3','$msstd3','$mpname3','$mpcontact3','$tsname1','$tsstd1','$tpname1','$tpcontact1','$tsname2','$tsstd2','$tpname2','$tpcontact2','$tsname3','$tsstd3','$tpname3','$tpcontact3','$tisname1','$tisstd1','$tipname1','$tipcontact1','$tisname2','$tisstd2','$tipname2','$tipcontact2','$tisname3','$tisstd3','$tipname3','$tipcontact3')");
    }
    

        
}
?>