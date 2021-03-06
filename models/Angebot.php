<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "angebot".
 *
 * @property int $id
 * @property string $name
 * @property string $visual
 * @property string $kalender_woche
 * @property string $detail_link
 * @property int $filiale_id
 *
 * @property Filiale $filiale
 */
class Angebot extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'angebot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        // kalender_woche ,detail_link, file not required here because when user leaves it open, it will be replaced
        // with automatic values from the controller
        return [
            [['name', 'visual', 'filiale_id'], 'required'],
            [['filiale_id'], 'integer'],
            [['name'], 'string', 'max' => 55],
            [['file'], 'file'],
            [['kalender_woche'], 'integer'],
            [['visual', 'detail_link'], 'string', 'max' => 255],
            [['filiale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filiale::class, 'targetAttribute' => ['filiale_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'visual' => 'Visual',
            'kalender_woche' => 'Kalender Woche',
            'detail_link' => 'Detail Link',
            'filiale_id' => 'Filiale ID',
        ];
    }

    /**
     * Gets query for [[Filiale]].
     *
     * @return ActiveQuery
     */
    public function getFiliale()
    {
        return $this->hasOne(Filiale::class, ['id' => 'filiale_id']);
    }
}
