<div class="col-md-12">
  <div class="breadcrumb">
    <div class="breadcrumb_content">
    البرامج
    </div>
  </div>
</div>
<div class="article__list__wrapper">
  <div class="col-md-12">
    <div class="list__article__radio">
      <div class="row">
        <?php foreach ($programs as $program) : ?>
          <div class="col-md-3">
            <div class="card custom__radio__card">
              <div class="header__program">
              <h5 class="card-title"><?= $program->title; ?></h5>
              <?= $this->Html->image('programs/' . $program->image, ['alt' => $program->image, 'class' => 'card-img-top']) ?>
              </div>
              <div class="card-body">
                <p class="card-text"><?= strip_tags($this->Text->truncate($program->description, 200)) ?></p>
                <a href="<?= $this->Url->build(['controller' => 'programs', 'action' => 'show', 'slug' => $program->slug, 'id' => $program->id]) ?>" class="btn btn-primary custom__radio__btn">مشاهدة المزيد </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <?php if (count($programs) > 10) : ?>
    <nav aria-label="Page navigation" class="d-flex justify-content-center">
      <ul class="pagination">
        <?= $this->Paginator->prev(); ?>
        <?= $this->Paginator->numbers(['modulus' => 2]); ?>
        <?= $this->Paginator->next(); ?>
      </ul>
    </nav>
  <?php endif; ?>

</div>
