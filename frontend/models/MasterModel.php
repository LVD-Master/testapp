<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

abstract class MasterModel extends ActiveRecord
{
    /**
     * Inserts an ActiveRecord into DB without considering transaction.
     * @param array|null $attributes list of attributes that need to be saved. Defaults to `null`,
     * meaning all attributes that are loaded from DB will be saved.
     * @return bool whether the record is inserted successfully.
     */
    public function beforeSave($insert)
    {
        $current_time = date('Y-m-d H:i:s');

        if ($this->isNewRecord) {
            if ($this->hasAttribute('created_at')) {
                $this->created_at = $current_time;
            }
            if ($this->hasAttribute('created_by')) {
                $this->created_by = Yii::$app->user->id ?? null;
            }
        }

        if (!$this->isNewRecord) {
            if ($this->hasAttribute('updated_at')) {
                $this->updated_at = $current_time;
            }

            if ($this->hasAttribute('updated_by')) {
                $this->updated_by = Yii::$app->user->id ?? null;
            }
        }

        return parent::beforeSave($insert);
    }
}