<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $status
 * @property string $created_at
 */
class Image extends \yii\db\ActiveRecord
{
    public const STATUS_APPROVED = 1;
    public const STATUS_REJECTED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'required'],
            [['id', 'status'], 'default', 'value' => null],
            [['id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'status'     => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagesQuery(get_called_class());
    }
}