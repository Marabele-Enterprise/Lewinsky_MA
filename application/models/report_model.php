<?php

/**
 * ReportModel
 *
 * Handles the user's register / logout / registration stuff
 */
use Gregwar\Captcha\CaptchaBuilder;

class ReportModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
    * handles the entire registration process for DEFAULT user (not for people who register with
    * 3rd party services, like facebook) and creates a new user in the database if everything is fine
    * @return boolean Gives back the success status of the registration
    */
    public function create_batch($generic_model){
       $genericGetRequest = array(
            'table' => PREFIX.'practice', // as a JOIN '.PREFIX.'user as b ON a.creator_id = b.user_id
            'fields' => "*", 
            //'where' => "aid_holder_id = ".$_POST['aid_holder_id'], 
            'returnType' => "array"
        );

        $practices = $generic_model->genericGetPhp($genericGetRequest);

        foreach ($practices as $key => $practice) {
           $genericGetRequest = array(
                'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id JOIN '.PREFIX.'medical_aid as c ON a.medical_aid = c.medical_aid_id', 
                'fields' => "a.*, b.*, c.name as medical_aid_name", 
                'where' => "a.is_aid_holder = 1 AND b.practice_id = ".$practice->practice_id, 
                'returnType' => "array"
            );            
            $patients = $generic_model->genericGetPhp($genericGetRequest);
            
            foreach ($patients as $index => $patient) {
                $transaction_details = array();
               $genericGetRequest = array(
                    'table' => PREFIX.'transaction', 
                    'fields' => "*", 
                    'where' => "patient_id = ".$patient->patient_id,
                    'returnType' => "array"
                );            
                $transaction_details = $generic_model->genericGetPhp($genericGetRequest);                
                $patients[$index]->transactions = $transaction_details;
            }

            $practices[$key]->patients = $patients;
        }
        
        return $practices;
    }
}
