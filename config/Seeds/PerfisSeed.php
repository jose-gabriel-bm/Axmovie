<?php
use Migrations\AbstractSeed;

class PerfisSeed extends AbstractSeed
{

    public function run()
    {
        
$this->execute("
INSERT INTO `perfis` (`id`,`perfil`) VALUES
(1,'Administrador'),
(2,'Atendente')
");
    }
}