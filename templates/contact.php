<?php $this->set('title', 'contact') ?>

<div class="article__wrapper" style="margin-top:20px;">
  <h1 class="article__wrapper__title"><?= 'هنا بإمكانك إرسال رسالتك الخاصة الرجاء طرح السؤال بطريقة واضحة ' ?></h1>
</div>
<?php echo $this->Form->create(null, ['class' => 'custom_form__login', 'id' => 'submit-contact']) ?>
<!-- Email input -->
<div id="success-send">

</div>
<div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">الإسم </label>
  <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'الإسم ', 'type' => 'text', 'label' => false]) ?>
</div>

<div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">البريد الإلكتروني </label>
  <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'البريد الإلكتروني', 'type' => 'text', 'label' => false]) ?>
</div>

<!-- Password input -->
<div class="form-outline mb-4">
  <label class="form-label" for="form2Example2">التعليق </label>
  <?php echo $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'التعليق  ', 'type' => 'textarea', 'label' => false]) ?>
</div>

<!-- Submit button -->
<button type="submit" class="btn btn-primary custom_login_btn btn-block mb-4" id="submit-btn">الإرسال </button>

<?= $this->Form->end() ?>
