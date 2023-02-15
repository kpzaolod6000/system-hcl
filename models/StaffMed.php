<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "staff_med".
 *
 * @property int $id
 * @property string|null $cod_staff_med
 * @property string|null $name_staff_med
 * @property int|null $max_q
 * @property int|null $q_issued
 * @property int|null $q_slope
 * @property int $id_prof
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class StaffMed extends \yii\db\ActiveRecord
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
        return 'staff_med';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['max_q', 'q_issued', 'q_slope', 'id_prof', 'created_by', 'modified_by'], 'integer'],
            [['cod_staff_med', 'name_staff_med', 'max_q', 'q_issued', 'q_slope', 'id_prof'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['cod_staff_med'], 'string', 'max' => 11],
            [['name_staff_med'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('staff_med', 'id'),
            'cod_staff_med' => Yii::t('staff_med', 'cod_staff_med'),
            'name_staff_med' => Yii::t('staff_med', 'name_staff_med'),
            'max_q' => Yii::t('staff_med', 'max_q'),
            'q_issued' => Yii::t('staff_med', 'q_issued'),
            'q_slope' => Yii::t('staff_med', 'q_slope'),
            'id_prof' => Yii::t('staff_med', 'id_prof'),
            //'created_by' => 'Created By',
            //'created_date' => 'Created Date',
            //'modified_by' => 'Modified By',
            //'modified_date' => 'Modified Date',
        ];
    }
}
