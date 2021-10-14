<?php
use Migrations\AbstractMigration;

class CreatePerfis extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('perfis');

        $table->addColumn('perfil','string',[
            'limit'=>100,
            'null'=>false,
            
        ]);
        $table->addIndex(['perfil'], ['unique' => true]);
       $table->create();
    }
}
