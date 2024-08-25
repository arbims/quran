<div class="col-md-12">
  <div class="breadcrumb">
    <div class="breadcrumb_content">
      المقالات
    </div>
  </div>
</div>
<div class="article__list__wrapper">
  <div class="col-md-12">
    <div class="list__article__radio">
      <div class="row">
        <?php foreach ($posts as $post) : ?>
          <div class="col-md-4">
            <div class="card custom__radio__card">
              <?= $this->Html->image('posts/' . $post->image, ['alt' => $post->image, 'class' => 'card-img-top']) ?>
              <div class="card-body">
                <h5 class="card-title"><?= $post->name; ?></h5>
                <p class="card-text"><?= strip_tags($this->Text->truncate($post->description, 200)) ?></p>
                <div class="article-date">crée le : <?= $post->created->i18nFormat('dd MMMM, yyyy') ?> par : <?= $post->user->username ?></div>
                <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'detail', 'slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-primary custom__radio__btn">مشاهدة المزيد </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <?php if (count($posts) > 10) : ?>
    <nav aria-label="Page navigation" class="d-flex justify-content-center">
      <ul class="pagination">
        <?= $this->Paginator->prev(); ?>
        <?= $this->Paginator->numbers(['modulus' => 2]); ?>
        <?= $this->Paginator->next(); ?>
      </ul>
    </nav>
  <?php endif; ?>

</div>
