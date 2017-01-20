<? include(dirname(__FILE__).'/../common/_header.php');?>
<h1>Užduotys</h1>
    <ul class="task-menu"><a class="btn btn-success" href="<?php echo base_url();?>index.php/tasks/newTaskForm">Nauja Užduotis</a></ul>
<div class="clearfix">

    <div class="col-md-6 col-xs-12 tasks">
        <h2>Mano sukurtos užduotys</h2>
        <ul class="task-list">
        <?php foreach($tasks as $task) {
        if($task->checklist == 1)
        {
            $style = "style='background: green; color: white;'";
        }
        else{
            $style = "";
        }
        ?><li class="task-item" <?php echo $style;?>><h3 class="task-name"><?php echo $task->title;?></h3><a class="task-link btn btn-primary" href="<?php echo base_url();?>index.php/tasks/viewTask/<?php echo $task->task_id; ?>">Peržiūrėti</a></li>
        <?php
        }
        ?>
        </ul>
    </div>
    <div class="col-md-6 col-xs-12 mytasks">
        <h2>Man priskirtos užduotys</h2>
        <ul class="task-list">
            <?php foreach($mytasks as $task) {
            if($task->checklist == 1)
            {
                $style = "style='background: green; color: white;'";
            }
            else{
                $style = "";
            }
            ?><li class="task-item" <?php echo $style;?>><h3 class="task-name"><?php echo $task->title;?></h3><a class="task-link btn btn-primary" href="<?php echo base_url();?>index.php/tasks/viewTask/<?php echo $task->task_id; ?>">Peržiūrėti</a></li>
        <?php
        }
        ?>
        </ul>
    </div>

</div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>