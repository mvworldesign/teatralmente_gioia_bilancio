<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%passivita}}".
 *
 * @property int $id
 * @property string $voce
 * @property float $importo
 * @property string $data
 * @property int $bilancio_id
 * @property int|null $categoria_id
 */
class Passivita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%passivita}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['importo', 'data', 'bilancio_id'], 'required'],
            [['importo'], 'number'],
            [['data'], 'safe'],
            [['bilancio_id', 'categoria_id'], 'integer'],
            [['voce'], 'string', 'max' => 50],
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
}
