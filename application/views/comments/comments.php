<? include(dirname(__FILE__).'/../common/_header.php');?>
    <h1 class="client-name">Kliento "<?php echo $client_name;?>" Komentarai</h1>
   <?php if($comments != "Komentarų nerasta") {
    ?>
    <table class="comment-table">
    <tr>
        <th class="comment-description">Komentaro aprašymas</th>
        <th>Komentaro data</th>
    </tr><?php
        foreach ($comments as $comment) {
           echo "<tr style='color: $comment->color;'>";
           echo "<td class='comment-description'>" . $comment->description . "</td>";
           echo "<td>" . $comment->date . "</td>";
           echo "</tr>";
       }
    }
   else{
       echo "Kol kas komentarų nėra";
   }
?>
</table>
<? include(dirname(__FILE__).'/../common/_footer.php');?>