<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $public_id
 * @property integer $version
 * @property string $signature
 * @property integer $width
 * @property integer $height
 * @property string $format
 * @property string $resource_type
 * @property string $created_at
 * @property integer $bytes
 * @property string $type
 * @property string $etag
 * @property string $url
 * @property string $secure_url
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version', 'width', 'height', 'bytes'], 'integer'],
            [['created_at'], 'safe'],
            [['public_id', 'url', 'secure_url'], 'string', 'max' => 200],
            [['signature', 'format', 'resource_type'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['etag'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'public_id' => 'Public ID',
            'version' => 'Version',
            'signature' => 'Signature',
            'width' => 'Width',
            'height' => 'Height',
            'format' => 'Format',
            'resource_type' => 'Resource Type',
            'created_at' => 'Created At',
            'bytes' => 'Bytes',
            'type' => 'Type',
            'etag' => 'Etag',
            'url' => 'Url',
            'secure_url' => 'Secure Url',
        ];
    }
}
