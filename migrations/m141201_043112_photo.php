<?php

use yii\db\Schema;
use yii\db\Migration;

class m141201_043112_photo extends Migration
{
    public function up()
    {
        $this->createTable('photo', [
            'id' => 'pk',
            'public_id' => 'varchar(200)',
            'version' => 'int',
            'signature'=>'varchar(100)',
            'width'=>'int',
            'height'=>'int',
            'format'=>'varchar(100)',
            'resource_type'=>'varchar(100)',
            'created_at'=>'datetime',
            'bytes'=>'int',
            'type'=>'varchar(20)',
            'etag'=>'varchar(64)',
            'url'=>'varchar(200)',
            'secure_url'=>'varchar(200)',
        ]);
    }

    public function down()
    {
        $this->dropTable('photo');
    }
}
