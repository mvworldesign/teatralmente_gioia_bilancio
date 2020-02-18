<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%bilancio}}".
 *
 * @property int $id
 * @property string $data
 * @property string $nome_bilancio
 *
 * @property Attivitum[] $attivita
 */
class Bilancio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bilancio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'nome_bilancio'], 'required'],
            [['data'], 'safe'],
            [['nome_bilancio'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data' => Yii::t('app', 'Data'),
            'nome_bilancio' => Yii::t('app', 'Nome Bilancio'),
        ];
    }

    /**
     * Gets query for [[Attivita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttivita()
    {
        return $this->hasMany(Attivitum::className(), ['bilancio_id' => 'id']);
    }
}
