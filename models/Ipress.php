<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "ipress".
 *
 * @property int $id
 * @property string|null $cod_ipress
 * @property string|null $full_name
 * @property string|null $establishment
 * @property string|null $department
 * @property string|null $province
 * @property string|null $district
 * @property string|null $ubigeo
 * @property string|null $diresa
 * @property string|null $name_red
 * @property string|null $cod_microred
 * @property string|null $disa
 * @property string|null $red
 * @property string|null $microred
 * @property string|null $cod_ue
 * @property string|null $name_ue
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Ipress extends \yii\db\ActiveRecord
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
        return 'ipress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['created_by', 'modified_by'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['cod_ipress', 'ubigeo'], 'string', 'max' => 12],
            [['full_name'], 'string', 'max' => 300],
            [['establishment'], 'string', 'max' => 200],
            [['department', 'province', 'disa'], 'string', 'max' => 30],
            [['district'], 'string', 'max' => 40],
            [['diresa', 'name_red', 'cod_microred', 'cod_ue'], 'string', 'max' => 5],
            [['red', 'microred'], 'string', 'max' => 60],
            [['name_ue'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cod_ipress' => 'Cod Ipress',
            'full_name' => 'Full Name',
            'establishment' => 'Establishment',
            'department' => 'Department',
            'province' => 'Province',
            'district' => 'District',
            'ubigeo' => 'Ubigeo',
            'diresa' => 'Diresa',
            'name_red' => 'Name Red',
            'cod_microred' => 'Cod Microred',
            'disa' => 'Disa',
            'red' => 'Red',
            'microred' => 'Microred',
            'cod_ue' => 'Cod Ue',
            'name_ue' => 'Name Ue',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
