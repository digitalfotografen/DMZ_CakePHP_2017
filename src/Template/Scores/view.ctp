<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Score $score
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Score'), ['action' => 'edit', $score->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Score'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scores view large-9 medium-8 columns content">
    <h3><?= h($score->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($score->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($score->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Points') ?></th>
            <td><?= $this->Number->format($score->points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($score->modified) ?></td>
        </tr>
    </table>
</div>
