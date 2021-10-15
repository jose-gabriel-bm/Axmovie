<?php
use Migrations\AbstractMigration;

class CreateUsuarios extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('usuarios');

        $table->addColumn('id_perfil','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_perfil','perfis','id');

        $table->addColumn('nome','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('email','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('password','string',[
            'limit'=>100,
            'null'=>false,
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
        
        $table->addIndex(['email'], ['unique' => true]);

        $table->create();
    }
}
