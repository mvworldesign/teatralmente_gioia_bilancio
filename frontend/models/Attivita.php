<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%attivita}}".
 *
 * @property int $id
 * @property string $voce
 * @property float $importo
 * @property string $data
 * @property int $bilancio_id
 * @property int $categoria_id
 *
 * @property Bilancio $bilancio
 * @property Categorium $categoria
 */
class Attivita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attivita}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voce', 'importo', 'data', 'bilancio_id', 'categoria_id'], 'required'],
            [['importo'], 'number'],
            [['data'], 'safe'],
            [['bilancio_id', 'categoria_id'], 'integer'],
            [['voce'], 'string', 'max' => 50],
            [['bilancio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bilancio::className(), 'targetAttribute' => ['bilancio_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'voce' => Yii::t('app', 'Voce'),
            'importo' => Yii::t('app', 'Importo'),
            'data' => Yii::t('app', 'Data'),
            'bilancio_id' => Yii::t('app', 'Bilancio ID'),
            'categoria_id' => Yii::t('app', 'Categoria ID'),
        ];
    }

    /**
     * Gets query for [[Bilancio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilancio()
    {
        return $this->hasOne(Bilancio::className(), ['id' => 'bilancio_id']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorium::className(), ['id' => 'categoria_id']);
    }
}
