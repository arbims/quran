<div class="col-md-12">
  <div class="breadcrumb">
    <div class="breadcrumb_content">
      المقالات/ <?= $post->name ?>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <div class="article__wrapper">
      <h1 class="article__wrapper__title"><?= $post->name ?></h1>
      <span class="article__wrapper__createdby">crée le : <?= $post->created->i18nFormat('dd MMMM, yyyy') ?> par : <?= $post->user->username ?></span>
      <div class="article__wrapper__img">
        <?= $this->Html->image('posts/' . $post->image, ['class' => 'article__img']) ?>

      </div>
      <div>
        <?= $post->description ?>
      </div>
    </div>
  </div>
</div>
