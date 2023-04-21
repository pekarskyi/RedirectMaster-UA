<div class="row">
    <div class="col-sm-3 sidebar_menu bg-sidebar py-4" style="">
        <div class="text-center text-white h4 mb-3">Категорії</div>
        <a href="dashboard"><i class="fas fa-home"></i> Головна</a>
        <?php

        $project_info;
        if(isset($project_info))
        
        foreach ($project_info as $prct) : ?>
            <a href="project<?php echo $phpExt; ?>?id=<?php echo $prct['project_id']; ?>"><i class="fas fa-folder-open"></i> <?php echo $prct['project_name']; ?></a>
        <?php endforeach; 
        
        else
            //null
        
        ?>
    
</div>
<div class="col-sm-9 p-3">