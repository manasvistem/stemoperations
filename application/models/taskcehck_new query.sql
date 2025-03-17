SELECT `tce`.`id` `tid`, `tce`.`actiontype_id` `actiontype_id`, `tce`.`cid_id` `cid_id`, `tce`.`autotask` `autotask`, 
`tce`.`initiateddt`, `tce`.`lastCFID` `lastCFID`, `tce`.`nextCFID` `nextCFID`, `tce`.`user_id` `user_id`, `tce`.`actontaken` `actontaken`,
 `tce`.`selectby` `selectby`, `tce`.`filter_by` `filter_by`, `tce`.`purpose_achieved` `purpose_achieved`, `tce`.`late_remarks_message` `late_remarks_message`, `bm`.`initiateTime`, `s1`.`name` `old_status`, `s2`.`name` `new_status`, `company_master`.`id` `cmpid`, `company_master`.`compname`, `action_name`.`name` `action_name`, `tce`.`appointmentdatetime` `plan_date`, (tce.initiateddt) start_time, (tce.updateddate) end_time, TIMEDIFF(tce.initiateddt, tce.appointmentdatetime) time_diff_updateVsInitiat, TIMEDIFF(tce.updateddate, tce.initiateddt) time_diff_InitiatVsClose, `tce`.`remarks` `remarks`, `tce`.`rremark` `remark`, `tce`.`filter_by` `filter_used`, `company_master`.`id` `company_id`, TIMEDIFF(bm.initiateTime, tce.appointmentdatetime) time_diff_meetingupdateVsInitiat, TIMEDIFF(tce.updateddate, bm.initiateTime) time_diff_InitiatVsCloseMeeting
FROM `tblcallevents` `tce`
LEFT JOIN `init_call` ON `init_call`.`id` = `tce`.`cid_id`
LEFT JOIN `company_master` ON `company_master`.`id` = `init_call`.`cmpid_id`
LEFT JOIN `action` `action_name` ON `action_name`.`id` = `tce`.`actiontype_id`
LEFT JOIN `status` `s1` ON `s1`.`id` = `tce`.`status_id`
LEFT JOIN `status` `s2` ON `s2`.`id` = `tce`.`nstatus_id`
LEFT JOIN `barginmeeting` `bm` ON `bm`.`tid` = `tce`.`id`
WHERE `tce`.`user_id` = '1000250'
AND `tce`.`nextCFID` != 0
AND CAST(updateddate AS DATE) = '2025-03-15'