<?php
use Migrations\AbstractMigration;

class CreateCidades extends AbstractMigration
{
   
    public function change()
    {
        $table = $this->table('cidades');
        
        $table->addColumn('id_estado','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_estado','estados','id');

        $table->addColumn('nome','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        
        $table->create();
    }
}
