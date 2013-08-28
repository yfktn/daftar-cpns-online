<?php
/**
 * CheckStatusForm class.
  * Digunakan sebagai bagian dari form untuk melakukan update status pelamar
 *
 * @author tonier
 */
class UpdateStatusPelamarForm extends CFormModel {
    
    public $status_pelamar;
    

    public function rules() {
        return array(
            array('status_pelamar', 'required'),
        );
    }
    
	public function attributeLabels()
	{
		return array(
            'status_pelamar'=>'Status Pelamar',
		);
	}
}

?>