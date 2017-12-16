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
?>