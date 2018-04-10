<?php
  require_once('src/utils/router.php');
  require_once('webapp/components/layout/header.php');
?>
<div class="row">
  <?php require_once $_GET['module']; ?>
</div>
<?php require_once('webapp/components/layout/footer.php')?>
