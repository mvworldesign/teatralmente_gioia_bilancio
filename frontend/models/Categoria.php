<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%categoria}}".
 *
 * @property int $id
 * @property string $categoria
 * @property string $data_creazione
 * @property string $ultima_modifica
 *
 * @property Attivitum[] $attivita
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categoria}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria', 'data_creazione', 'ultima_modifica'], 'required'],
            [['data_creazione', 'ultima_modifica'], 'safe'],
            [['categoria'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoria' => Yii::t('app', 'Categoria'),
            'data_creazione' => Yii::t('app', 'Data Creazione'),
            'ultima_modifica' => Yii::t('app', 'Ultima Modifica'),
        ];
    }

    /**
     * Gets query for [[Attivita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttivita()
    {
        return $this->hasMany(Attivitum::className(), ['categoria_id' => 'id']);
    }
}
