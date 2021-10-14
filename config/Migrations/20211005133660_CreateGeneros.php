<?php
use Migrations\AbstractMigration;

class CreateGeneros extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('generos');

        $table->addColumn('genero','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addIndex(['genero'], ['unique' => true]);
        
        $table->create();
    }
}
