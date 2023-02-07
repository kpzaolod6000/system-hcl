<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $type
 * @property int|null $ups
 * @property int|null $ups_s
 * @property int|null $max_cp
 * @property int|null $max_am
 * @property int|null $max_pm
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Services extends \yii\db\ActiveRecord
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
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'ups', 'ups_s', 'max_cp', 'max_am', 'max_pm', 'created_by', 'modified_by'], 'integer'],
            [['created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('services', 'id'),
            'name' => Yii::t('services', 'name'),
            'type' => Yii::t('services', 'type'),
            'ups' => Yii::t('services', 'ups'),
            'ups_s' => Yii::t('services', 'ups_s'),
            'max_cp' => Yii::t('services', 'max_cp'),
            'max_am' => Yii::t('services', 'max_am'),
            'max_pm' => Yii::t('services', 'max_pm'),
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
