<?php 
  if ($count->count > 10) {
?>
<nav aria-label="Page navigation example">
  <ul class="pagination pg-blue" data-limit="<?php echo $_GET['limit']; ?>" data-offset="<?php echo $_GET['offset']; ?>" data-page="<?php echo $_GET['page']; ?>">
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo 0; ?>">&lt;&lt;</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo ($_GET['offset']-$_GET['limit']) < 0 ? 0 : $_GET['offset']-$_GET['limit']; ?>">Previous</a>
    </li>
    <?php 
      $offset = 0;
      for($i = 1 ; $i <= $total_page ; $i++){
        if ((ceil($_GET['offset']/$_GET['limit']) + 1) == $i) {
    ?>
      <li class="page-item active"><a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo $offset < 0 ? 0 : $offset; ?>"><?php echo @$i; ?></a></li>
    <?php
        }else{
    ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo $offset < 0 ? 0 : $offset; ?>"><?php echo @$i; ?></a></li>
    <?php 
        }
        $offset += $_GET['limit'];
      }    
    ?>
    <li class="page-item ">
      <a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo ($_GET['offset']+$_GET['limit']) > (($total_page - 1)*$_GET['limit']) ? $_GET['offset'] : ($_GET['offset']+$_GET['limit']); ?>">Next</a>
    </li>
    <li class="page-item ">
      <a class="page-link" href="?page=<?php echo $_GET['page']; ?>&limit=<?php echo $_GET['limit']; ?>&offset=<?php echo ($total_page - 1)*$_GET['limit']; ?>">&gt;&gt;</a>
    </li>
  </ul>
</nav>
<?php
  }
?>