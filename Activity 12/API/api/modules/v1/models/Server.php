<?php

namespace app\api\modules\v1\models;


class Server extends \app\models\Server
{
    public function fields()
    {
        return [
            'URL',
        ];
    }
}