<div class="row mb-3">
  <div class="col">
    <a href="link-edit.php?link_id=<?php echo $link_id; ?>" class="btn btn-block btn-sm btn-light">Налаштування редиректу</a>
  </div>
  <div class="col">
    <a href="link-chart.php?link_id=<?php echo $link_id; ?>" class="btn btn-block btn-sm btn-light">Статистика переходів</a>
  </div>
</div>

<div class="h5 mb-3"><i class="far fa-chart-bar"></i> Статистика переходів за посиланням</div>

<div class="row text-center text-white mb-4">
  <div class="col-sm">
    <div class="bg-primary text-center text-white rounded px-3 py-4">
      <h6>Всього</h6>
      <div class="text-white"><?php echo $num_all_visits[0]; ?></div>
    </div>
  </div>
  <div class="col-sm">
    <div class="bg-success rounded px-3 py-4">
      <h6>За сьогодні</h6>
      <div class="text-white"><?php echo $num_today_visits[0]; ?></div>
    </div>
  </div>
  <div class="col-sm">
    <div class="bg-default text-center text-white rounded px-3 py-4">
      <h6>За 3 дні</h6>
      <div class="text-white"><?php echo $num_three_days[0]; ?></div>
    </div>
  </div>
  <div class="col-sm">
    <div class="bg-default text-center text-white rounded px-3 py-4">
      <h6>За 7 днів</h6>
      <div class="text-white"><?php echo $num_seven_days[0]; ?></div>
    </div>
  </div>
  <div class="col-sm">
    <div class="bg-dark rounded px-3 py-4">
      <h6>За 30 днів</h6>
      <div class="text-white"><?php echo $num_thirty_days[0]; ?></div>
    </div>
  </div>
</div>

<?php foreach($cats as $cat) : ?>

    <div class="mb-2 shadow-sm p-3">
      <div class="row">
        <div class="col-3">
          <?php echo $cat['visit_ip']; ?>
        </div>
        <div class="col">
          <?php echo $cat['http_referer']; ?>
        </div>
        <div class="col-auto">
            <?php echo $cat['visit_date']; ?>
        </div>
      </div>
    </div>

<?php endforeach; ?>

<div class="mt-4">
<?php 

$pervpage= isset($pervpage) ? $pervpage: '';
$page2left= isset($page2left) ? $page2left: '';
$page1left= isset($page1left) ? $page1left: '';
$page1right= isset($page1right) ? $page1right: '';
$page2right= isset($page2right) ? $page2right: '';
$nextpage= isset($nextpage) ? $nextpage: '';

  // Проверяем нужны ли стрелки назад 
  if ($page != 1) $pervpage = '<li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page=1"><<</a></li> 
                                 <li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page - 1) .'">Назад</a></li>'; 
  // Проверяем нужны ли стрелки вперед 
  if ($page != $total) $nextpage = ' <li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page + 1) .'">Вперед</a></li> 
                                     <li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page=' .$total. '">>></a></li>'; 

  // Находим две ближайшие станицы с обоих краев, если они есть 
  if($page - 2 > 0) $page2left = '<li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page - 2) .'">'. ($page - 2) .'</a></li>'; 
  if($page - 1 > 0) $page1left = '<li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page - 1) .'">'. ($page - 1) .'</a></li>'; 
  if($page + 2 <= $total) $page2right = '<li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page + 2) .'">'. ($page + 2) .'</a></li>'; 
  if($page + 1 <= $total) $page1right = '<li class="page-item"><a class="page-link" href="?link_id='.$link_id.'&page='. ($page + 1) .'">'. ($page + 1) .'</a></li>'; 

  print('<div class="center_block"><nav aria-label="..."><ul class="pagination">');
  echo $pervpage.$page2left.$page1left.'<li class="page-item active"><a class="page-link" href="?link_id='.$link_id.'&page='.$page.'">'.$page.'</a></li>'.$page1right.$page2right.$nextpage; 
  print('</ul></nav></div>');

?>
</div>

<?php include 'footer' . $phpExt; ?>