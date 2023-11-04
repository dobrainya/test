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
            'id'         => Schema::TYPE_BIGINT . ' NOT NULL PRIMARY KEY',
            'status'     => Schema::TYPE_SMALLINT,
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('images');
    }
}
