<?php
use Migrations\AbstractMigration;

class CreateEstados extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('estados');

        $table->addColumn('nome','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('uf','string',[
            'limit'=>5,
            'null'=>false,
        ]);

        $table->create();
    }
}
