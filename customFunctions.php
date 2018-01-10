<?php
    function random_generate($length){
        $chars="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $rand="";
        for ($i=0;$i<$length;$i++){
            $rand.=$chars{rand(0,69)};
        }
        return $rand;
    }
    function filter_sql($db,$string){
        $filtered=mysqli_real_escape_string($db,trim(htmlspecialchars($string)));

        return $filtered;
    }
    function check_phone($string){

        if(preg_match("/^05[0-9]{2}[0-9]{3}[0-9]{4}$/", $string)) {
            return true;
        }
        return false;
    }
    function check_date($string){
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$string)) {
            return true;
        }
        return false;
    }
?>