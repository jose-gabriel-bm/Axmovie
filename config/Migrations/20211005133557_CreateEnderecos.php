<?php
use Migrations\AbstractMigration;

class CreateEnderecos extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('enderecos');

        $table->addColumn('id_cliente','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_cliente','clientes','id');

        $table->addColumn('id_usuario','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_usuario','usuarios','id');

        $table->addColumn('id_cidade','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_cidade','cidades','id');

        $table->addColumn('logradouro','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('numero','string',[
            'limit'=>10,
            'null'=>true,
        ]);
        $table->addColumn('complemento','string',[
            'limit'=>100,
            'null'=>true,
        ]);
        $table->addColumn('bairro','string',[
            'limit'=>100,
            'null'=>false,
        ]);
        $table->addColumn('cep','string',[
            'limit'=>8,
            'null'=>true,
        ]);

        $table->create();
    }
}
