<?php
use Migrations\AbstractMigration;

class CreateModifyColumnCreatedReservas extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('reservas');
        $table->renameColumn('created', 'data_inicio_locacao')
        ->save();
    }
    public function down()
    {
        // $table = $this->table('reservas');
        // $table->renameColumn('created', 'data_limite_devolucao');
    }
}
