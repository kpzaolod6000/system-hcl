<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "services_personal".
 *
 * @property int $id
 * @property int $id_services
 * @property int $id_staff_med
 */
class ServicesPersonal extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date','modified_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified_date',
                ],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'modified_by',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_services', 'id_staff_med'], 'required'],
            [['id_services', 'id_staff_med'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('services_personal', 'id'),
            'id_services' => Yii::t('services_personal', 'id_services'),
            'id_staff_med' => Yii::t('services_personal', 'id_staff_med'),
        ];
    }

    /**
     * Gets query for [[Programation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramation()
    {
        return $this->hasMany(Programation::className(), ['id_services_personal' => 'id']);
    }

    public function getStaffMed()
    {
        return $this->hasOne(StaffMed::className(), ['id' => 'id_staff_med']);   
    }

}
