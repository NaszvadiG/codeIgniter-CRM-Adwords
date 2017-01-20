<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Užduoties sukūrimas</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('tasks/newTask');
        echo form_hidden("task_user_id_pri", $user_id);
        echo form_label('Priskirti: ');
        echo"<br/>";
        echo form_dropdown('task_user_id', $userdata);
        echo"<br/>";
        echo"<br/>";
        echo form_label("Pavadinimas");
        echo"<br/>";
        echo form_input("title");
        echo"<br/>";
        echo"<br/>";
        echo form_label('Aprašymas');
        echo"<br/>";
        echo form_textarea('description');
        echo"<br/>";
        echo"<br/>";
        echo form_submit("submit", "Sukurti");

        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>