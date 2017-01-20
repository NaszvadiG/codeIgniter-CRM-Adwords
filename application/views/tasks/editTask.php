<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Užduoties keitimas</h2>
<!--        --><?php //var_dump($clientData);?>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('tasks/editTask/'.$taskData->task_id);
        echo form_label('Pavadinimas ');
        echo"<br/>";
        echo form_input('title', $taskData->title);
        echo "<br/><br/>";
        echo form_label('Aprašymas ');
        echo"<br/>";
        echo form_textarea('description', $taskData->description);
        echo "<br/><br/>";
        echo form_submit('submit', 'Išsaugoti');
        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>