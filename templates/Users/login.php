<?php echo $this->Form->create(null, ['class' => 'custom_form__login']) ?>
  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">البريد الإلكتروني </label>
    <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'البريد الإلكتروني', 'type' => 'text', 'label' => false]) ?> 
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">كلمة السر </label>
    <?php echo $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'كلمة السر ', 'type' => 'password', 'label' => false]) ?>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary custom_login_btn btn-block mb-4">الدخول </button>

<?= $this->Form->end() ?>