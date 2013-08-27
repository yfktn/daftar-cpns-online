<?php

/**
 * YFLevelLookup merupakan class untuk memperjelas penggunaan level di user
 *
 * @author tonier
 */
class YFLevelLookup {
    const ANON = 'Anon';
    const USER = 'User';
    const OPERATOR = 'Operator';
    const ADMIN = 'Admin';
    const SUPER_ADMIN = 'SuperAdmin';
    
    /**
     * @return array List of level
     */
    public static function getListData() {
        return array(
            self::USER => 'Registered',
            self::OPERATOR => 'Operator Daerah',
            self::ADMIN => 'Admin Daerah',
            self::SUPER_ADMIN => 'Super Admin',
        );
    }
    
    /**
     * Akan mengembalikan level self::USER jika tidak ada pada data level
     * @param int $level
     * @return string
     */
    public static function getLabel($level) {
        $ary = self::listData;
        return isset($ary[$level])?$ary[$level]:$ary[self::USER];
    }
}

?>
