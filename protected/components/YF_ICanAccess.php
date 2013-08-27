<?php
/**
 * Can Access?
 * @author tonier
 */
interface YF_ICanAccess {
    /**
     * 
     * @param string $task adalah kode action
     * @param bool $modeRewrite apabila false maka kembalikan nilai array sesuai $task
     * dan apabila true maka kembalikan semua array
     */
    public function getRole(&$task=null,$modeRewrite=false);
}

?>
