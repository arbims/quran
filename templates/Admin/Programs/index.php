<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program[]|\Cake\Collection\CollectionInterface $programs
 */
?>

<?php echo $this->Html->link('إضافة مقال ', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('slug') ?></th>
            <th><?= $this->Paginator->sort('image') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($programs as $program) : ?>
            <tr>
                <td><?= $this->Number->format($program->id) ?></td>
                <td><?= h($program->title) ?></td>
                <td><?= h($program->slug) ?></td>
                <td><?= h($program->image) ?></td>
                <td><?= h($program->created) ?></td>
                <td><?= h($program->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('تحديث'), ['action' => 'edit', $program->id], ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id), 'class' => 'btn btn-danger' ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
