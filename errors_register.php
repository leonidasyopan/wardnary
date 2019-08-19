<?php  if (count($errors_register) > 0) : ?>
    <div class="error">
    <?php foreach ($errors_register as $error) : ?>
        <p><?php echo $error ?></p>
    <?php endforeach ?>
    </div>
<?php  endif ?>