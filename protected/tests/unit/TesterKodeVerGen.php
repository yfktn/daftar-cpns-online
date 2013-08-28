<?php

/**
 * Mari kita test apakah GeneralHelper::readableRandomString bisa mengakibatkan
 * adanya kode yang double?
 * 
 * Terbukti bahwa dalam jangka waktu tertentu pasti akan ada yang sama :D :D
 * Untuk menggunakan ni harus dibuat table di SQL ...
 * 
 * CREATE TABLE IF NOT EXISTS `tbl_tester_kode_verifikasi` (
 * `tester` varchar(20) NOT NULL,
 *  PRIMARY KEY (`tester`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 *
 * @author tonier
 */
Yii::import('ext.GeneralHelper');
class TesterKodeVerGenTest extends CTestCase {
    public function testGenerateVerifikasi() {
//        $jumlah = Yii::app()->params['verifyCodeLength'];
//        $p = new TesterKodeVerifikasi;
//        for($i=0;$i<99990;$i++) {
//            $p->setIsNewRecord(true);
//            $p->tester = strtoupper(GeneralHelper::readableRandomString($jumlah));
//            $this->assertEquals(true, $p->save());
//        }
    }
}

?>
