<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "server".
 *
 * @property int $id
 * @property string $URL
 * @property int $service_id
 *
 * @property Service $service
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'server';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'required'],
            [['service_id'], 'integer'],
            [['URL'], 'string', 'max' => 255],
            //[['URL'], 'checkURL'],
           // [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    
    public function checkUrl($url){
     //   $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
        $regex .= "(\:[0-9]{2,5})?"; // Port 
        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
      //  $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
      //  $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
        
        if(preg_match("/^$regex$/i", $url)) // `i` flag for case-insensitive
       {
               return true; 
       } 
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'URL' => Yii::t('app', 'Url'),
            'service_id' => Yii::t('app', 'Service ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
