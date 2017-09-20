<?php
use Migrations\AbstractMigration;

class Scores extends AbstractMigration
{
    public function up()
    {

        $this->table('scores', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid', [
                'null' => false,
            ])
            ->addColumn('user_id', 'uuid', [
                'null' => false,
            ])
            ->addColumn('points', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('scores');
    }
}
