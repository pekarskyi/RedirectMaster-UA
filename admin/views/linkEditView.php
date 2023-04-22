<div class="row mb-3">
  <div class="col">
    <a href="link-edit.php?link_id=<?php echo $link_id; ?>" class="btn btn-block btn-sm btn-light">Налаштування редиректу</a>
  </div>
  <div class="col">
    <a href="link-chart.php?link_id=<?php echo $link_id; ?>" class="btn btn-block btn-sm btn-light">Статистика переходів</a>
  </div>
</div>

<div class="h5 mb-3"><i class="fas fa-cog"></i> Налаштування редиректу <a href="<?php echo $domain_url; ?>/<?php echo $link['link_id']; ?>" target="_blank"><?php echo $domain_url; ?>/<?php echo $link['link_id']; ?></a></div>

<form action="" method="POST" class="mb-4">
  <input type="hidden" name="link_id" value="<?php echo $link['link_id']; ?>">
  <div class="form-row mb-3">
    <div class="col">
      Куди перенаправляти?
      <input type="text" name="link_url" class="form-control" required placeholder="Url-адреса" value="<?php echo $link['link_url']; ?>">
    </div>
    <div class="col">
      Категорія
    <select name="project_id" class="form-control">
        <option <?php if($prct['project_id'] === '0'){echo 'selected';} ?> value="0">Без категорії</option>
		<?php foreach($project_info as $prct) : ?>

			<option <?php if($prct['project_id'] === $link['project_id']){echo 'selected';} ?> value="<?php echo $prct['project_id']; ?>"><?php echo $prct['project_name']; ?></option>

		<?php endforeach; ?>
    </select>
    </div>
  </div>
  Назва редиректу
  <input type="text" name="comments" class="form-control" placeholder="Назва редиректу" value="<?php echo $link['comments']; ?>">

  <input type="submit" name="update" class="btn btn-primary btn-block mt-3" value="Зберегти зміни">

</form>


<button class="btn btn-warning btn-sm" id="reset_link">Скинути статистику</button>


<?php include 'footer' . $phpExt; ?>