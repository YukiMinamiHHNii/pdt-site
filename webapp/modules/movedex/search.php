<?php require_once('../../components/layout/header.php')?>
<div class="row">
  <div class="col s12 m12 l8 offset-l2">
    <h1 class="col s12 m12 center-align">Moves</h1>
    <p>
      The moves section lists all the available moves in the game along with their power, accuracy, category and additional effects. Press the show button to open a dialog listing all the pokémon which learn the selected move.
    </p>
    <?php require('../../components/movedex/search-form.php')?>
  </div>
  <?php require('../../components/movedex/search-table.php')?>
</div>
<?php require('../../components/movedex/search-dialog.php')?>
<?php require_once('../../components/layout/footer.php')?>
