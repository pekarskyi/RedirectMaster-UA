<h4>Налаштування системи</h4>

<form action="" method="POST" class="my-4">

  При переході по <a href="/" target="_blank">адресі домену</a>, куди перенаправляти?
  <input type="url" name="domain_redirect" class="form-control mb-3" placeholder="URL" value="<?php echo $domain_redirect; ?>">

  Колір верхньої та нижньої панелі:
  <input type="color" name="head_footer_color" class="form-control mb-3" style="width: 100px;" value="<?php echo $head_footer_color; ?>">

  Колір бокової колонки:
  <input type="color" name="sidebar_color" class="form-control" style="width: 100px;" value="<?php echo $sidebar_color; ?>">

  <div class="row mt-3">
    <div class="col"><input type="button" id="update-sett" name="update" class="btn btn-primary btn-block" value="Зберегти зміни"></div>
    <div class="col"><input type="button" id="default-sett" name="default" class="btn btn-primary btn-block" value="Відновити стилі за замовчуванням"></div>
  </div>
</form>

<?php include 'footer' . $phpExt; ?>

