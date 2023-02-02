<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string $type_doc
 * @property string|null $nro_doc
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $last_name_m
 * @property string|null $gender
 * @property string|null $birth_date
 * @property string|null $clinic_history
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Patient extends \yii\db\ActiveRecord
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
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_doc', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['birth_date', 'created_date', 'modified_date'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['type_doc'], 'string', 'max' => 50],
            [['nro_doc', 'clinic_history'], 'string', 'max' => 12],
            [['name', 'last_name', 'last_name_m'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_doc' => 'Type Doc',
            'nro_doc' => 'Nro Doc',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'last_name_m' => 'Last Name M',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
            'clinic_history' => 'Clinic History',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
