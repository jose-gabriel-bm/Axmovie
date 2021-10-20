<?php
use Migrations\AbstractMigration;

class CreateReservas extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reservas');

        $table->addColumn('id_usuario','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_usuario','usuarios','id');

        $table->addColumn('id_cliente','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_cliente','clientes','id');

        $table->addColumn('id_filme','integer',[
            'null'=>false,
        ]);
        $table->addForeignKey('id_filme','filmes','id');


        $table->addColumn('valor_multa_atraso','decimal',[
            'null'=>true,
            'precision'=>5,
            'scale'=>2
        ]);
        $table->addColumn('valor_total_pagar','decimal',[
            'null'=>true,
            'precision'=>5,
            'scale'=>2
        ]);
        

        $table->addColumn('created', 'datetime', [
            'null' => false, 
        ]);
        $table->addColumn('data_limite_devolucao', 'datetime', [
            'null' => true, 
        ]);
        $table->addColumn('data_devolucao', 'datetime', [
            'null' => true, 
        ]);



        $table->addColumn('status','boolean',[
            'default'=>true,
            'null'=>false,
        ]);

        $table->create();
    }
}
