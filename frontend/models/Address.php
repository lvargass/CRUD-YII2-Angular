<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $address
 * @property string|null $country
 * @property string|null $city
 * @property string|null $state
 * @property int|null $zipcode
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'zipcode', 'created_at', 'updated_at'], 'integer'],
            [['address', 'country', 'city', 'state'], 'string', 'max' => 255],
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
            'address' => 'Address',
            'country' => 'Country',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
