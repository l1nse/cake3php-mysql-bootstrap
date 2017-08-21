<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Correo Entity
 *
 * @property int $id
 * @property string $nombre
 *
 */
class Correo extends Entity
{

    public function enviarcorreo(){
        echo 'Hola';
    }
}
