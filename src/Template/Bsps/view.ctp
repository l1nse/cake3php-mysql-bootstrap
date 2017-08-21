<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bsp'), ['action' => 'edit', $bsp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bsp'), ['action' => 'delete', $bsp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bsp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bsps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bsp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bsps view large-9 medium-8 columns content">
    <h3><?= h($bsp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bsp->has('user') ? $this->Html->link($bsp->user->id, ['controller' => 'Users', 'action' => 'view', $bsp->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Document') ?></th>
            <td><?= h($bsp->type_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpns') ?></th>
            <td><?= h($bsp->cpns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nr') ?></th>
            <td><?= h($bsp->nr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Airline Code') ?></th>
            <td><?= h($bsp->airline_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Int Dom') ?></th>
            <td><?= h($bsp->int_dom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Card') ?></th>
            <td><?= h($bsp->credit_card) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bsp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $this->Number->format($bsp->document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cd') ?></th>
            <td><?= $this->Number->format($bsp->cd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agent Code') ?></th>
            <td><?= $this->Number->format($bsp->agent_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conjuntion') ?></th>
            <td><?= $this->Number->format($bsp->conjuntion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refunden') ?></th>
            <td><?= $this->Number->format($bsp->refunden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Related') ?></th>
            <td><?= $this->Number->format($bsp->related) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gross Fare Cash') ?></th>
            <td><?= $this->Number->format($bsp->gross_fare_cash) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Cash') ?></th>
            <td><?= $this->Number->format($bsp->tax_cash) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gross Fare Credit') ?></th>
            <td><?= $this->Number->format($bsp->gross_fare_credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Comm Rate') ?></th>
            <td><?= $this->Number->format($bsp->std_comm_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Comm Amount') ?></th>
            <td><?= $this->Number->format($bsp->std_comm_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vat On Comm') ?></th>
            <td><?= $this->Number->format($bsp->vat_on_comm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Penalties') ?></th>
            <td><?= $this->Number->format($bsp->penalties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Net To Be Paid') ?></th>
            <td><?= $this->Number->format($bsp->net_to_be_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($bsp->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $this->Number->format($bsp->month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week') ?></th>
            <td><?= $this->Number->format($bsp->week) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Period') ?></th>
            <td><?= h($bsp->billing_period) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Issue Date') ?></th>
            <td><?= h($bsp->issue_date) ?></td>
        </tr>
    </table>
</div>
