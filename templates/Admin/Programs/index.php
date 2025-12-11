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
            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
            <th><?= $this->Paginator->sort('title', 'العنوان') ?></th>
            <th><?= $this->Paginator->sort('slug', 'Slug') ?></th>
            <th><?= $this->Paginator->sort('image', 'الصورة') ?></th>
            <th><?= $this->Paginator->sort('created', 'تاريخ الإنشاء') ?></th>
            <th><?= $this->Paginator->sort('modified', 'آخر تعديل') ?></th>
            <th class="actions"><?= __('التحكم') ?></th>
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
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $program->id], ['confirm' => 'هل تريد فعلا حذف هذا المقال ', 'class' => 'btn btn-danger' ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
