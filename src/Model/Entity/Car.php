<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property int $id
 * @property string $marca
 * @property string $modelo
 * @property int $precio
 * @property bool $disponible
 * @property int $puertas
 * @property bool $diesel
 * @property string $tamanio
 */
class Car extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'marca' => true,
        'modelo' => true,
        'precio' => true,
        'disponible' => true,
        'puertas' => true,
        'diesel' => true,
        'tamanio' => true
    ];
}
