<?php
use Migrations\AbstractMigration;

class CreateAddColumnUsuarioTableUsuarios extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string')
              ->update();
    }
}
