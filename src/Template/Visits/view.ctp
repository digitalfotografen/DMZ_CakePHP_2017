<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Visit $visit
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit'), ['action' => 'edit', $visit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit'), ['action' => 'delete', $visit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visits view large-9 medium-8 columns content">
    <h3><?= h($visit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($visit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $visit->has('user') ? $this->Html->link($visit->user->id, ['controller' => 'Users', 'action' => 'view', $visit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $visit->has('city') ? $this->Html->link($visit->city->name, ['controller' => 'Cities', 'action' => 'view', $visit->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visit->created) ?></td>
        </tr>
    </table>
</div>
