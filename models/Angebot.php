<?php

namespace app\models;

use Yii;

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
class Angebot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'angebot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'visual', 'kalender_woche', 'detail_link', 'filiale_id'], 'required'],
            [['filiale_id'], 'integer'],
            [['name'], 'string', 'max' => 55],
            [['visual', 'kalender_woche', 'detail_link'], 'string', 'max' => 255],
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
     * @return \yii\db\ActiveQuery
     */
    public function getFiliale()
    {
        return $this->hasOne(Filiale::class, ['id' => 'filiale_id']);
    }
}
