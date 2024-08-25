<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Program'), ['action' => 'edit', $program->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Program'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Programs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Program'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="programs view content">
            <h3><?= h($program->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($program->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($program->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($program->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($program->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($program->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($program->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($program->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Episodes') ?></h4>
                <?php if (!empty($program->episodes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Youtube') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Online') ?></th>
                            <th><?= __('Program Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($program->episodes as $episodes) : ?>
                        <tr>
                            <td><?= h($episodes->id) ?></td>
                            <td><?= h($episodes->title) ?></td>
                            <td><?= h($episodes->slug) ?></td>
                            <td><?= h($episodes->youtube) ?></td>
                            <td><?= h($episodes->description) ?></td>
                            <td><?= h($episodes->online) ?></td>
                            <td><?= h($episodes->program_id) ?></td>
                            <td><?= h($episodes->created) ?></td>
                            <td><?= h($episodes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Episodes', 'action' => 'view', $episodes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Episodes', 'action' => 'edit', $episodes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Episodes', 'action' => 'delete', $episodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
