<div class="row">
  <div class="col-lg-12">

    <div class="card position-relative">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Article</h6>
      </div>
      <div class="card-body">
        <?php echo $this->Form->create($post, ['class' => 'form-horizontal', 'type' => 'file']) ?>
        <div class="form-group row">
          <div class="col-sm-6">
            <?= $this->Form->label('name', 'عنوان المقال ', ['class' => 'col-form-label']) ?>
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
          </div>
          <div class="col-sm-6">
            <?= $this->Form->label('slug', 'عنوان الرابط ', ['class' => 'col-form-label']) ?>
            <?php echo $this->Form->control('slug', ['class' => 'form-control', 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-6">
            <div>
              <?= $this->Html->image('posts'. DIRECTORY_SEPARATOR . $post->image)?>
            </div>
            <?= $this->Form->label('image', 'الصورة ', ['class' => 'col-form-label']) ?>
            <?php echo $this->Form->control('image_file', ['class' => 'form-control', 'label' => false, 'type' => 'file']) ?>
          </div>
          <div class="col-sm-6">
            <?= $this->Form->label('online', 'نشر الآن ', ['class' => 'col-form-label']) ?>

            <?php echo $this->Form->control('online', ['type' => 'checkbox', 'label' => false]) ?>
          </div>

        </div>

        <div class="form-group row">
          <div class="col-sm-12">
            <?= $this->Form->label('description', 'المحتوي ', ['class' => 'col-form-label']) ?>
            <?php echo $this->Ckeditor->input('description') ?>
          </div>

        </div>
        <hr>
        <div class="form-group row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </div>
        <?php echo $this->Form->end() ?>
      </div>

    </div>
  </div>

</div>
