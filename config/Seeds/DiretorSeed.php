<?php
use Migrations\AbstractSeed;

class DiretorSeed extends AbstractSeed
{

    public function run()
    {
        
$this->execute("
INSERT INTO `diretores` (`id`,`nome`) VALUES
(1,'Alfred Hitchcock'),
(2,'Orson Welles'),
(3,'John Ford'),
(4,'Howard Hawks'),
(5,'Martin Scorsese'),
(6,'Akira Kurosawa'),
(7,'Buster Keaton'),
(8,'Ingmar Bergman'),
(9,'Frank Capra'),
(10,'Federico Fellini'),
(11,'Steven Spielberg'),
(12,'Jean Renoir'),
(13,'John Huston'),
(14,'Luis Buñuel'),
(15,'D. W. Griffith'),
(16,'Ernst Lubitsch'),
(17,'Robert Altman'),
(18,'George Cukor'),
(19,'Woody Allen'),
(20,'Vincente Minnelli'),
(21,'Francis Ford Coppola'),
(22,'Michael Powell'),
(23,'Stanley Kubrick'),
(24,'Billy Wilder'),
(25,'Satyajit Ray'),
(26,'Roman Polanski'),
(27,'François Truffaut'),
(28,'Preston Sturges'),
(29,'Sergei Eisenstein'),
(30,'Fritz Lang'),
(31,'Jean-Luc Godard'),
(32,'Sam Peckinpah'),
(33,'F.W. Murnau'),
(34,'David Lean'),
(35,'Werner Herzog'),
(36,'Nicholas Ray'),
(37,'Josef von Sternberg'),
(38,'Douglas Sirk'),
(39,'Max Ophüls'),
(40,'Louis Malle'),
(41,'Sergio Leone'),
(42,'Sidney Lumet'),
(43,'Oliver Stone'),
(44,'Bernardo Bertolucci'),
(45,'Jonathan Demme'),
(46,'Jacques Tati'),
(47,'Otto Preminger'),
(48,'Spike Lee'),
(49,'Tim Burton'),
(50,'Jerry Lewis')
");
    }
}
