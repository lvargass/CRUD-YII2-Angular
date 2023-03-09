<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int|null $client_id
 * @property string $username
 * @property string $password
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'username' => 'Username',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Campos
    public function fields()
    {
        return [
            'username',
            'password'
            // others attributes of Book model
        ];
    }
}
