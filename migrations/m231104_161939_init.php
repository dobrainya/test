<?php

use yii\db\Migration;
use \yii\db\pgsql\Schema;


/**
 * Class m231104_161939_init
 */
class m231104_161939_init extends Migration
{
    public function up()
    {
        $this->createTable('images', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_TIMESTAMP,
            'status' => Schema::TYPE_SMALLINT,
        ]);
    }

    public function down()
    {
        $this->dropTable('images');
    }
}
