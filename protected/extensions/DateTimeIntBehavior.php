<?php

/**
 * Description of DateTimeIntBehavior
 * Example to use it ... 
  public function behaviors() {
  return array(
  'dateTimeInternational'=>array(
  'class'=>'ext.DateTimeIntBehavior'
  )
  );
  }
 * @author tonier
 */
class DateTimeIntBehavior extends CActiveRecordBehavior {

    // ini haruslah merupakan format yang dikenali oleh fungsi CDateTimeParser::parse
    // jadi dalam fungsi date yang menggunakan Y-m-d tidak bisa digunakan karena 
    // akan error saat akan menggunakan CDateTimeParser::parse ... 
    public $dbDateFormat = 'yyyy-MM-dd'; // 'Y-m-d';
    public $dbDateTimeFormat = 'yyyy-MM-dd HH:mm:ss'; // 'Y-m-d H:i:s';
    // ini digunakan untuk parser supaya bisa menampilkan tanggal ke pengguna
    // format sangat berbeda untuk masing-masing parser
    // lihat di dokumentasi/source code CDateFormatter
    public $inDateFormat = 'dd-MM-yyyy';
    public $inDateTimeFormat = 'dd-MM-yyyy HH:mm:ss';

    /*
     * The beforeSave event is raised before the record is saved to database.
     * Converts input dateformat into yiis dateformat (for example: 31.12.2013 to 2013-12-31) .
     */

    public function beforeSave($event) {

        // search for date/datetime columns. Convert it to dateformat used in database (Y-m-d)
        foreach ($event->sender->tableSchema->columns as $columnName => $column) {

            if (($column->dbType != 'date') and ($column->dbType != 'datetime'))
                continue;

            if (!strlen($event->sender->$columnName)) {
                $event->sender->$columnName = null;
                continue;
            }

            //$event->sender->$columnName= date( $this->dateTimeYiiFormat, strtotime( $event->sender->$columnName));
            if ($column->dbType == 'date') {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                        $this->dbDateFormat, CDateTimeParser::parse(
                                $event->sender->$columnName, $this->inDateFormat
                        )
                );
            } elseif ($column->dbType == 'datetime') {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                        $this->dbDateTimeFormat, CDateTimeParser::parse(
                                $event->sender->$columnName, $this->inDateTimeFormat
                        )
                );
            }
        }
        return true;
    }

    /*
     * This event is raised after the record is instantiated (loaded from database)
     * Converts yiis database dateformat to input dateformat (for example: 2013-12-31 to 31.12.2013) .
     */

    public function afterFind($event) {

        foreach ($event->sender->tableSchema->columns as $columnName => $column) {

            if (($column->dbType != 'date') and ($column->dbType != 'datetime'))
                continue;

            if (!strlen($event->sender->$columnName)) {
                $event->sender->$columnName = null;
                continue;
            }

            if ($column->dbType == 'date') {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                        $this->inDateFormat, CDateTimeParser::parse(
                                $event->sender->$columnName, $this->dbDateFormat
                        )
                );
            } elseif ($column->dbType == 'datetime' || $column->dbType == 'timestamp') {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                        $this->inDateTimeFormat, CDateTimeParser::parse(
                                $event->sender->$columnName, $this->dbDateTimeFormat
                        )
                );
            }
        }
        return true;
    }

}

?>
