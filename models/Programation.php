<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "programation".
 *
 * @property int $id
 * @property string|null $date_attention
 * @property int $id_services_personal
 * @property int $id_turn
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Programation extends \yii\db\ActiveRecord
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
        return 'programation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_attention', 'created_date', 'modified_date'], 'safe'],
            [['id_services_personal', 'id_turn', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['id_services_personal', 'id_turn', 'created_by', 'modified_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_attention' => 'Date Attention',
            'id_services_personal' => 'Id Services Personal',
            'id_turn' => 'Id Turn',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}