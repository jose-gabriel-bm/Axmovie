<?php
use Migrations\AbstractMigration;

class CreateFilmes extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('filmes');

        $table->addColumn('id_usuario','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_usuario','usuarios','id');

        $table->addColumn('id_diretor','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_diretor','diretores','id');

        $table->addColumn('id_genero','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_genero','generos','id');

        $table->addColumn('titulo','string',[
            'limit'=>30,
            'null'=>false,
        ]);
        $table->addColumn('lancamento','boolean',[
            'default'=>true,
            'null'=>false,
        ]);
        $table->addColumn('valor_compra','decimal',[
            'null'=>false,
            'precision'=>5,
            'scale'=>2
        ]);
        $table->addColumn('status','boolean',[
            'default'=>true,
            'null'=>false,
        ]);
        $table->addColumn('idioma', 'enum', [
            'values' => ['Ingles','Japones','Chines','Portugues','Hindi','Espanhol']
        ]);

        $table->addColumn('data_criacao', 'datetime', [
            'null' => true, 
        ]);
        $table->addColumn('data_modificacao', 'datetime', [
            'null' => true,   
        ]);
        


        $table->addIndex(['titulo'], ['unique' => true]);
        $table->create();
    }
}
