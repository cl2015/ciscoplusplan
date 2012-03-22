<?php 
 
abstract class TrackStarActiveRecord extends CActiveRecord {
 
    /**
     * Prepares create_time, create_user_id, update_time and
     * update_user_ id attributes before performing validation.
     */
    protected function beforeValidate() {
 
        if ($this->isNewRecord) {
            // set the create date, last updated date
            // and the user doing the creating
            $this->created_at = $this->updated_at = new CDbExpression('NOW()');
 
            $this->created_by = $this->updated_by = Yii::app()->user->id;
        } else {
            //not a new record, so just set the last updated time
            //and last updated user id
            $this->updated_at = new CDbExpression('NOW()');
            $this->updated_by = Yii::app()->user->id;
 
        }
        return parent::beforeValidate();
    }
 
}