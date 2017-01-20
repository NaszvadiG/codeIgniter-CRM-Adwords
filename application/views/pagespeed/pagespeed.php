<? include(dirname(__FILE__).'/../common/_header.php');?>
    <h1>PageSpeed rezultatai</h1>
    <script>
        $(document).ready(function(){
        $('<img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif">').load(function() {
            $('.viskas').html(this);
        });
        jQuery.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/pagespeed/clientPageSpeed/<?php echo $clientID; ?>/",
            success:function(data){$('.viskas').html(data);}
        });
        })
    </script>
<div class="viskas"></div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>