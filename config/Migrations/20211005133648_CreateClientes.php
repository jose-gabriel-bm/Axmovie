<?php
use Migrations\AbstractMigration;

class CreateClientes extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('clientes');

        $table->addColumn('id_usuario','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_usuario','usuarios','id');

        $table->addColumn('nome','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('cpf','string',[
            'limit'=>11,
            'null'=>false,
        ]);
        $table->addColumn('email','string',[
            'limit'=>100,
            'null'=>true,
        ]);
        $table->addColumn('status','boolean',[
            'default'=>true,
            'null'=>false,
        ]);
        $table->addColumn('created', 'datetime', [
            'null'=>true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'null'=>true,  
        ]);
        
        $table->addIndex(['cpf'], ['unique' => true]);

        $table->create();
    }
}
