<?php
use Migrations\AbstractMigration;

class CreateAddColumnTableReservas extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reservas');
        $table->addColumn('observacoes', 'string')
                ->update();

        $table->addColumn('valor_locacao','decimal',[
                'null'=>true,
                'precision'=>5,
                'scale'=>2
            ])->update();
    }
}
