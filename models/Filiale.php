<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filiale".
 *
 * @property int $id
 * @property string $titel
 * @property string $standort
 *
 * @property Angebot[] $angebots
 */
class Filiale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filiale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titel', 'standort'], 'required'],
            [['titel'], 'string', 'max' => 55],
            [['standort'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titel' => 'Titel',
            'standort' => 'Standort',
        ];
    }

    /**
     * Gets query for [[Angebots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAngebots()
    {
        return $this->hasMany(Angebot::class, ['filiale_id' => 'id']);
    }
}
