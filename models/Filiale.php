<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "filiale".
 *
 * @property int $id
 * @property string $titel
 * @property string $standort
 *
 * @property Angebot[] $angebots
 */
class Filiale extends ActiveRecord
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
     * Gets query for [[Angebote]].
     *
     * @return ActiveQuery
     */
    public function getAngebote()
    {
        return $this->hasMany(Angebot::class, ['filiale_id' => 'id']);
    }
}
