<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "fua".
 *
 * @property int $id
 * @property string $type_doc
 * @property string $nro_doc
 * @property int $nro_hcl
 * @property string $cod_sure
 * @property string $date_attention
 * @property string $nro_ref
 * @property int $id_ipress
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Fua extends \yii\db\ActiveRecord
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
        return 'fua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_doc', 'nro_doc', 'nro_hcl', 'cod_sure', 'date_attention', 'nro_ref', 'id_ipress', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['nro_hcl', 'id_ipress', 'created_by', 'modified_by'], 'integer'],
            [['date_attention', 'created_date', 'modified_date'], 'safe'],
            [['type_doc', 'cod_sure'], 'string', 'max' => 50],
            [['nro_doc'], 'string', 'max' => 100],
            [['nro_ref'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_doc' => Yii::t('fua', 'Tipo de documento'),
            'nro_doc' => Yii::t('fua', 'Numero de documento'),
            'nro_hcl' => Yii::t('fua', 'Historia Clinica'),
            'cod_sure' => Yii::t('fua', 'Codigo de seguro'),
            'date_attention' => Yii::t('fua', 'Fecha de atencion'),
            'nro_ref' => Yii::t('fua', 'Numero de referencia'),
            'id_ipress' => Yii::t('fua', 'Codigo IPRESS'),
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
