<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bsp Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $document
 * @property string $cd
 * @property string $type_document
 * @property string $agent_code
 * @property string $billing_period
 * @property string $conjuntion
 * @property string $refunden
 * @property string $related
 * @property string $cpns
 * @property string $nr
 * @property string $airline_code
 * @property string $issue_date
 * @property string $int_dom
 * @property string $currency
 * @property string $gross_fare_cash
 * @property string $tax_cash
 * @property string $gross_fare_credit
 * @property string $tax_credit
 * @property string $std_comm_rate
 * @property string $std_comm_amount
 * @property string $suppl_comm_amount
 * @property string $vat_on_comm
 * @property string $penalties
 * @property string $net_to_be_paid
 * @property string $credit_card
 * @property int $year
 * @property int $month
 * @property int $week
 *
 * @property \App\Model\Entity\User $user
 */
class Bsp extends Entity
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
        '*' => true,
        'id' => false
    ];
}
