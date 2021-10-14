<?php
use Migrations\AbstractSeed;

class GeneroSeed extends AbstractSeed
{
   
    public function run()
    {
$this->execute("
INSERT INTO `generos` (`id`,`genero`) VALUES
(1,'Animação'),
(2,'Comédia'),
(3,'Comédia Romântica'),
(4,'Comédia Dramática'),
(5,'Documentário'),
(6,'Drama'),
(7,'Faroeste'),
(8,'Ficção Científica'),
(9,'Musical'),
(10,'Suspense'),
(11,'Terror / Horror')
");       
    }
}
