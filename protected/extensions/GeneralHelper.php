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
        $conso = array("b", "c", "d", "f", "g", "h", "j", "k", "l",
            "m", "n", "p", "r", "s", "t", "v", "w", "x", "y", "z");
        $vocal = array("a", "e", "i", "o", "u");
        $password = "";
        srand((double) microtime() * 1000000);
        $max = $length / 2;
        for ($i = 1; $i <= $max; $i++) {
            $password.=$conso[rand(0, 19)];
            $password.=$vocal[rand(0, 4)];
        }
        return $password;
    }

}

?>
