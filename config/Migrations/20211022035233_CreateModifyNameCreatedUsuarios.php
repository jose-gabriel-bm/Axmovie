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

}
