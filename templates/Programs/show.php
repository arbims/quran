<div class="col-md-12">
  <div class="breadcrumb">
    <div class="breadcrumb_content">
    البرامج / <?= $program->title ?>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="row">
    <div style="margin: 30px;"></div>
    <div class="article__wrapper">
      <h1 class="article__wrapper__title"><?= $program->title ?></h1>
      <div>
      <div class="article__wrapper__img">
        <?= $this->Html->image('programs/'. $program->image )?>
      </div>
      </div>
      <div id="episode" data-id="<?= $program->id ?>"></div>
    </div>
  </div>
</div>
