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
            'id'         => Schema::TYPE_BIGINT . ' NOT NULL',
            'status'     => Schema::TYPE_SMALLINT . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);

        $this->createIndex('image_id_uix', 'images', 'id', true);
    }

    public function down()
    {
        $this->dropTable('images');
    }
}
