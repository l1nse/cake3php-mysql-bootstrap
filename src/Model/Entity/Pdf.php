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
class PDF extends FPDF
{

    public function necesaria(){
        echo 'Hola';
    }
}
