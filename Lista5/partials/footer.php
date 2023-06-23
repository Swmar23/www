<footer>  
  <p>&#169; Marek Świergoń 2023 |
    <?php
    require(__DIR__ . '/counter/counter.php');
    recordView();
    addUniqueIP();
    echo "Liczba odsłon domeny: " . getTotalViewCount();
    echo " | Liczba unikalnych gości: " . getUniqueVisitorsCount(); ?>

  </p>   
  <a href="https://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
      src="https://jigsaw.w3.org/css-validator/images/vcss"
      alt="Valid CSS!" >
  </a>
</footer>