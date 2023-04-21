<div class="row mb-4">
	<div class="col"><div class="h4">Привіт, <?php echo $first_name; ?>!</div></div>
	<div class="col-auto">
		<button class="btn btn-warning btn-sm" id="new_redirect">Додати редирект</button>
	</div>
	<div class="col-auto">
		<button class="btn btn-primary btn-sm" id="new_project">Додати категорію</button>
	</div>
</div>

<form action="" method="POST" class="mb-4" id="form_new_redirect">
  <?php if ($num_projects[0] === '0') {
    echo '<div class="h5 text-danger">*Необхідно спочатку додати категорію</div>';
  } ?>
    <div class="form-row">
      <div class="col">
        <input type="text" name="link_url" class="form-control" required placeholder="Ціль">
      </div>
      <div class="col">
      <select name="project_id" class="form-control">
              <?php foreach($project_info as $prct) : ?>
                  <?php echo '<option value="' . $prct['project_id'] . '">'.$prct['project_name'].'</option>'; ?>
              <?php endforeach; ?>
      </select>
      </div>
    </div>
    <div class="form-row mt-3">
          <div class="col-4">
            <input type="text" name="comments" class="form-control" placeholder="Назва редиректу">
          </div>
          <div class="col-4">
            <input type="text" name="url_name" class="form-control" placeholder="Свій SLUG для редиректу">
          </div>
      <div class="col-4">
        <input type="submit" name="send" class="btn btn-primary btn-block" value="Додати редирект" <?php if ($num_projects[0] === '0') {
    echo 'disabled';
  } ?>>
      </div>
    </div>
</form>

<form action="" method="POST" class="mb-4" id="form_new_project">
  <div class="form-row">
    <div class="col">
      <input type="text" name="project_name" class="form-control" required placeholder="Назва категорії">
    </div>
    <div class="col-auto">
      <input type="submit" name="project_send" class="btn btn-primary" value="Додати категорію">
    </div>
  </div>
</form>


<div class="row text-center text-white mb-4">
  <div class="col-sm-4">
    <div class="bg-default text-center text-white rounded px-3 py-4">
      <h6>Категорій</h6>
      <div class="text-white"><?php echo $num_projects[0]; ?></div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="bg-default rounded px-3 py-4">
      <h6>Редиректів</h6>
      <div class="text-white"><?php echo $num_links[0]; ?></div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="bg-default text-center text-white rounded px-3 py-4">
      <h6>Усього переходів</h6>
      <div class="text-white"><?php echo $num_visits[0]; ?></div>
    </div>
  </div>
</div>

<div class="h6 mb-3">Останні 15 редиректів:</div>

<?php foreach($cats as $cat) : ?>

    <div class="shadow p-3 mb-4" id="<?php echo $cat['link_id']; ?>" style="font-size: 14px;">

    <div class="row">
      <div class="col">
        <div class="mt-2 h6"><i class="fas fa-thumbtack"></i> <?php echo $cat['comments']; ?></div>
        <div class="mt-2"><i class="fas fa-bullseye"></i> Ціль: <a href="<?php echo $cat['link_url']; ?>" target="_blank"><?php echo $cat['link_url']; ?></a></div>
      </div>

      <div class="col-auto">
        <div class="text-muted"><a class="btn btn-info" href="link-chart.php?link_id=<?php echo $cat['link_id']; ?>" target="_blank"><i class="far fa-chart-bar"></i><?php echo $cat['link_visit']; ?></a></div>
      </div>

        <div class="col-2">
          <a href="link-edit.php?link_id=<?php echo $cat['link_id']; ?>" class="btn btn-light text-secondary"><i class="fas fa-cog"></i></a>
          <button id="<?php echo $cat['link_id']; ?>" title="Видалити" class="btn btn-light delete_link text-secondary float-right"><i class="far fa-trash-alt"></i></button>
        </div>

    </div>

    <hr>

      <div class="row mt-2">
        <div class="col">
          <div><i class="fas fa-paperclip"></i> <?php if($cat['url_name'] != ''){echo "Короткі посилання";}else{echo "Коротке посилання";} ?></div>
          <div class="mt-2"><i class="fas fa-external-link-alt"></i> <a href="<?php echo $domain_url.'/'.$cat['link_id']; ?>" target="_blank"><?php echo $domain_url.'/'.$cat['link_id']; ?></a></div>
          <?php if($cat['url_name'] != ''):?>
            <div class="mt-2"><i class="fas fa-external-link-alt"></i> <a href="<?php echo $domain_url; ?>/<?php echo $cat['url_name'];?>" target="_blank"><?php echo $domain_url; ?>/<?php echo $cat['url_name'];?></a></div>
          <?php endif; ?>
        </div>
      </div>
    </div>

<?php endforeach; ?>

<?php include 'footer' . $phpExt; ?>