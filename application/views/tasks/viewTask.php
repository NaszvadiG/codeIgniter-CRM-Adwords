<? include(dirname(__FILE__).'/../common/_header.php');
/**
 * Created by PhpStorm.
 * User: Brazdys
 * Date: 12/9/2016
 * Time: 01:07
 */
?>
<h1>Užduotis: <?php echo $task_data->title;?></h1>
<div class="menu"><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/tasks/deleteTaskForm/<?php echo $task_data->task_id; ?>">Ištrinti užduotį</a></div>
<div class="task-data">
    <div class="information col-md-12">
        <h4>Priskyrė: <?php echo $priskyre->name." ".$priskyre->surname;?></h4>
        <h4>Priskirta: <?php echo $priskirta->name." ".$priskirta->surname;?></h4>
    </div>
    <div class="task-description col-md-12">
        <h2>Užduoties aprašymas</h2>
        <div class="task-content"><?php echo $task_data->description;?></div>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/tasks/editTaskForm/<?php echo $task_data->task_id; ?>">Keisti Užduotį</a>
    </div>
    <div class="files col-md-12">
        <h2>Failai</h2>
        <?php foreach($files as $file)
        {
        ?><a class="file-link btn btn-success" href="<?php echo $file->path;?>"><?php echo $file->file_name;?></a><?php
        }
        ?>

        <br/><br/><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/tasks/addFileForm/<?php echo $task_data->task_id; ?>">Pridėti failą</a>
<!--        TODO: Čia reikia aprašyt PHP kodą su failais-->
    </div>
    <div class="checklist col-md-3">
        <?php echo form_open('tasks/checklist');?>
        <?php echo form_hidden('task_id', $task_data->task_id);?>
        <?php echo form_label("Atlikta?", "", array("class"=>"checkbox-item"));?>
        <?php if($task_data->checklist == 0){
            echo form_checkbox("done", 1, false);
        }
        else{
            echo form_checkbox("done", 1, true);
        }
        ?>
        <?php echo form_submit('submit', 'Išsaugoti'); ?>
        <?php echo form_close();?>
    </div>

</div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>