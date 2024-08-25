<header>
  <div class="header__title_content">
    <?= $this->Html->image('basmalah.png'); ?>
    <h4>
      استماع إلى القرآن الكريم مباشر من تونس FM
    </h4>
    <p>
      القرآن الكريم | راديو القرآن | اذاعة القرآن الكريم FM لايف الاستماع المباشر إلى إذاعة القرآن الكريم في تونس بث مباشر
    </p>
  </div>
</header>

<div class="player__module">
  <?= $this->Html->image("radio-quran.jpg") ?>
  <div id="player_vue"></div>
</div>
<div class="home_page">
  <div class="row">
    <div class="col-md-8">
      <div class="list__article__radio">
      <div class="row">
        <?php foreach($posts as $post): ?>
        <div class="col-md-6">
          <div class="card custom__radio__card">
            <?=$this->Html->image('posts/' . $post->image, ['alt' => $post->image, 'class' => 'card-img-top'])?>
            <div class="card-body">
              <h5 class="card-title"><?= $post->name; ?></h5>
              <p class="card-text"><?= strip_tags($this->Text->truncate($post->description, 200)) ?></p>
              <div class="article-date">crée le : <?=$post->created->i18nFormat('dd MMMM, yyyy') ?> par : <?=$post->user->username?></div>
              <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'detail', 'slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-primary custom__radio__btn">مشاهدة المزيد </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
    <div class="col-md-4">
				<div class="list__program">
					<div class="list__article__radio">
          <h4>البرامج الاذاعية</h4>
						<?php foreach($programs as $program): ?>
            <a href="<?= $this->Url->build(['controller' => 'Programs', 'action' => 'show', 'slug' => $program->slug, 'id' => $program->id]) ?>" class="link__wrapper">
						<div class="program__wrapper">
							<span class="program__thumb">
                <?=$this->Html->image('programs' . DIRECTORY_SEPARATOR . $program->image, ['alt' => $program->image, 'class' => 'card-img-top'])?>
              </span>
							<span class="program__title"><?= $program->title ; ?> </span>
							<span class="program__episode__number">
								<?= $program->count ?>
							</span>
						</div>
            </a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
  </div>
</div>
