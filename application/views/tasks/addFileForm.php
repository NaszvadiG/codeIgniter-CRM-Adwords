<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Užduoties sukūrimas</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open_multipart('tasks/addFile');
        echo form_hidden("task_id", $task_id);
        echo form_label("Failo pavadinimas");
        echo "<br/>";
        echo form_input("file_name");
        echo "<br/>";
        echo "<br/>";
        echo form_label('Priskirti: ');
        echo"<br/>";
        echo form_upload("file");
        echo"<br/>";
        echo"<br/>";
        echo form_submit("submit", "Sukurti");

        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>