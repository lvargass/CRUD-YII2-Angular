<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property int $created_at
 * @property int $updated_at
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['client_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['client_id' => 'id']);
    }

    // Campos
    public function fields()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'phone'
        ];
    }
}
