<?php echo $this->Html->link('إضافة مقال ', ['action' =>'add'],['class' => 'btn btn-primary']) ?>
<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>المعرف </th>
            <th>العنوان </th>
            <th>معرف العنوان </th>
            <th>الأفعال </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $k => $v): ?>
            <tr>
                <td><?php echo $v->id ?></td>
                <td><?php echo $v->name ?></td>
                <td><?php echo $v->slug ?></td>
                <td><?php echo $this->Html->link('حذف ', ['action'=>'delete',$v->id],['confirm'=>'هل تريد فعلا حذف هذا المقال ','class' => 'btn btn-danger']) ?>-<?php echo $this->Html->link('تحديث ', ['action'=>'edit',$v->id],['class' => 'btn btn-success']) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>