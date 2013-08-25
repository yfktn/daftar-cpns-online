<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrasaratTest
 *
 * @author tonier
 */
class PrasaratTest extends CTestCase {
    /**
     * test apakah format init prasrat bisa didapatkan dengan baik?
     */
    public function testInitPrasarat() {
        $p = new Prasarat;
        $initPrasarat = $p->prasarat;
        $this->assertNotEquals(null, $initPrasarat);
        $ary = null;
        eval("\$ary=$initPrasarat;");
        $this->assertNotEquals(null, $ary);
        $this->assertEquals(30, $ary['umurMaksimal']);
        $this->assertEquals(18, $ary['umurMinimal']);
        $this->assertEquals('2013-12-01', $ary['patokanTanggal']);
        $this->assertEquals(Yii::app()->params['yearTest'], $p->tahun);
    }
    
}

?>
