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
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $this->Number->format($post->id) ?></td>
            <td><?= h($post->title) ?></td>
            <td><?= h($post->slug) ?></td>
            <td><?= h($post->image) ?></td>
            <td><?= h($post->created) ?></td>
            <td><?= h($post->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('تحديث'), ['action' => 'edit', $post->id], ['class' => 'btn btn-success']) ?>
                <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $post->id], ['confirm' => 'هل تريد فعلا حذف هذا المقال ', 'class' => 'btn btn-danger' ]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation" class="d-flex justify-content-center">
    <ul class="pagination">
        <?= $this->Paginator->prev(); ?>
        <?= $this->Paginator->numbers(['modulus' => 2]); ?>
        <?= $this->Paginator->next(); ?>
    </ul>
</nav>
