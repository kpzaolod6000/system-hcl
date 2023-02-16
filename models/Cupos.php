<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "cupos".
 *
 * @property int $id
 * @property int|null $order
 * @property string|null $phone
 * @property string|null $datte_attention
 * @property string|null $last_attention
 * @property string|null $reference
 * @property int|null $nro_receipt
 * @property int|null $receipt
 * @property string|null $ip
 * @property int|null $status
 * @property int|null $id_history_clinic
 * @property int $id_patient
 * @property int $id_programation
 * @property int $id_services
 * @property int $id_staff_med
 * @property int $id_fua
 * @property int $type_sure
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Cupos extends \yii\db\ActiveRecord
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
        return 'cupos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['order', 'nro_receipt', 'receipt', 'status', 'id_history_clinic', 'id_patient', 'id_programation', 'id_services', 'id_staff_med', 'id_fua', 'type_sure', 'created_by', 'modified_by'], 'integer'],
            [['order','phone','datte_attention', 'last_attention', 'reference', 'created_date', 'modified_date'], 'safe'],
            [['order','phone','datte_attention', 'last_attention', 'reference','nro_receipt','receipt', 'ip', 
            'status', 'id_history_clinic', 'id_patient', 'id_programation', 'id_services', 'id_staff_med', 
            'id_fua', 'type_sure'], 'required'],
            //[['phone', 'ip'], 'string', 'max' => 50],
            //[['reference'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cupos', 'id'),
            'order' => Yii::t('cupos', 'order'),
            'phone' => Yii::t('cupos', 'phone'),
            'datte_attention' => Yii::t('cupos', 'datte_attention'),
            'last_attention' => Yii::t('cupos', 'last_attention'),
            'reference' => Yii::t('cupos', 'reference'),
            'nro_receipt' => Yii::t('cupos', 'nro_receipt'),
            'receipt' => Yii::t('cupos', 'receipt'),
            'ip' => Yii::t('cupos', 'ip'),
            'status' => Yii::t('cupos', 'status'),
            'id_history_clinic' => Yii::t('cupos', 'id_history_clinic'),
            'id_patient' => Yii::t('cupos', 'id_patient'),
            'id_programation' => Yii::t('cupos', 'id_programation'),
            'id_services' => Yii::t('cupos', 'id_services'),
            'id_staff_med' => Yii::t('cupos', 'id_staff_med'),
            'id_fua' => Yii::t('cupos', 'id_fua'),
            'type_sure' => Yii::t('cupos', 'type_sure'),
            //'created_by' => 'Created By',
            //'created_date' => 'Created Date',
            //'modified_by' => 'Modified By',
            //'modified_date' => 'Modified Date',
        ];
    }
}
