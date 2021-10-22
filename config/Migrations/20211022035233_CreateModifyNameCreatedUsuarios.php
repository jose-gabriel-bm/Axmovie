<?php
use Migrations\AbstractMigration;

class CreateModifyNameCreatedUsuarios extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('usuarios');
        $table->rename('users')
        ->save();
    }
    public function down()
    {
        // $table = $this->table('reservas');
        // $table->renameColumn('created', 'data_limite_devolucao');
    }
}
