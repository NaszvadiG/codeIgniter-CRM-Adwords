<html>
    <head>
        <title>CRM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Latest compiled and minified CSS -->
        <script
            src="http://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css" />
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" />
    </head>
    <body>
    <div id="top-header">
        <div class="col-md-12">
            <a class="logout" href="<?php echo base_url();?>index.php/user_authentication/user_registration_show/">Registruoti naują naudotoją</a>
            <a class="logout" href="<?php echo base_url();?>index.php/user_authentication/logout/">Atsijungti</a>
        </div>
    </div>
    <div class="meniu col-md-3">
        <ul class="meniu-class">
            <li class="meniu-item"><a href="<?php echo base_url();?>index.php/clients/">Klientai</a></li>
            <li class="meniu-item"><a href="<?php echo base_url();?>index.php/tasks/">Užduotys</a></li>
            <li class="meniu-item"><a href="<?php echo base_url();?>index.php/agreements/">Sutartys</a></li>
            <li class="meniu-item"><a href="<?php echo base_url();?>index.php/bills/">Sąskaitos</a></li>
            <li class="meniu-item"><a href="<?php echo base_url();?>index.php/adwords/">AdWords Ataskaitos</a></li>
        </ul>
    </div>
</div>
    <div class="col-md-9 middle-content">