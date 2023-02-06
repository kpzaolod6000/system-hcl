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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created','modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
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
            [['order', 'nro_receipt', 'receipt', 'status', 'id_history_clinic', 'id_patient', 'id_programation', 'id_services', 'id_staff_med', 'id_fua', 'type_sure', 'created_by', 'modified_by'], 'integer'],
            [['datte_attention', 'last_attention', 'created_date', 'modified_date'], 'safe'],
            [['id_patient', 'id_programation', 'id_services', 'id_staff_med', 'id_fua', 'type_sure', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['phone', 'ip'], 'string', 'max' => 50],
            [['reference'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => Yii::t('cupos', 'Orden del cupo'),
            'phone' => Yii::t('cupos', 'Telefono'),
            'datte_attention' => Yii::t('cupos', 'Fecha de atencion'),
            'last_attention' => Yii::t('cupos', 'Ultima atencion'),
            'reference' => Yii::t('cupos', 'Referencia'),
            'nro_receipt' => Yii::t('cupos', 'Numero de recibo'),
            'receipt' => Yii::t('cupos', 'Recibo'),
            'ip' => Yii::t('cupos', 'IP'),
            'status' => Yii::t('cupos', 'Estado'),
            'id_history_clinic' => Yii::t('cupos', 'Historia Clnica'),
            'id_patient' => Yii::t('cupos', 'Codigo de paciente'),
            'id_programation' => Yii::t('cupos', 'Codigo de programacion'),
            'id_services' => Yii::t('cupos', 'Codigo de servicio'),
            'id_staff_med' => Yii::t('cupos', 'Codigo de personal medico'),
            'id_fua' => Yii::t('cupos', 'Codigo de FUA'),
            'type_sure' => Yii::t('cupos', 'Codigo de Seguro'),
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
