<?php
use Migrations\AbstractMigration;

class CreateDiretores extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('diretores');

        $table->addColumn('nome','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addIndex(['nome'], ['unique' => true]);

        $table->create();
    }
}
