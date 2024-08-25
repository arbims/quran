<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episode $episode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode'), ['action' => 'edit', $episode->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode'), ['action' => 'delete', $episode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episode->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodes view content">
            <h3><?= h($episode->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($episode->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($episode->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Youtube') ?></th>
                    <td><?= h($episode->youtube) ?></td>
                </tr>
                <tr>
                    <th><?= __('Program') ?></th>
                    <td><?= $episode->has('program') ? $this->Html->link($episode->program->title, ['controller' => 'Programs', 'action' => 'view', $episode->program->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episode->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Online') ?></th>
                    <td><?= $this->Number->format($episode->online) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($episode->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($episode->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($episode->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
