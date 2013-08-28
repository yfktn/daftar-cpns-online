<?php

/**
 * usefull function
 *
 * @author tonier
 */
class GeneralHelper {

    /**
     * http://snipplr.com/view.php?codeview&id=18517
     * @param type $length
     * @return string
     */
    public static function readableRandomString($length = 6) {
//        $conso = array("b", "c", "d", "f", "g", "h", "j", "k", "l",
//            "m", "n", "p", "r", "s", "t", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $conso = "bcdfghjklmnpqrstvwxyz"; //1234567890";
        $vocal = "aiueo"; // array("a", "e", "i", "o", "u");
        $cl = strlen($conso)-1;
        $vl = strlen($vocal)-1;
        $password = "";
        srand((double) microtime() * 1000000);
        $max = $length / 2;
        for ($i = 1; $i <= $max; $i++) {
            $password.=$conso[rand(0, $cl)];
            $password.=$vocal[rand(0, $vl)];
        }
        return $password;
    }

}

?>
