<h4>Recent Paste:</h4>
<ul class="links">
   <?php
if($recent != FALSE) {
   foreach($recent as $row) {
      echo "<li>";
      echo anchor($row['url'],$row['name']);
      echo "&nbsp;&nbsp;:&nbsp;&nbsp;";
      echo $row['description'];
      echo "<br/>";
      $fecha=strtotime($row['created']);
      $nueva=time() - $fecha; 
      $p = timespan($fecha, time());
      echo "<span>".$p. " ago.</span>";
      echo "</li>";
   }
}
?>
</ul>
