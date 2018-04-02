<?php require_once('../../components/layout/header.php')?>
<div class="row">
  <div class="col s12 m12 l8 offset-l2">
    <h1 class="col s12 m12 center-align">Abilities</h1>
    <p>
      Each ability from the game is listed below, along with a short description and how many Pokémon can have it.
    </p>
    <?php require('../../components/abilitydex/search-form.php')?>
  </div>
  <?php require('../../components/abilitydex/search-table.php')?>
</div>
<?php require_once('../../components/layout/footer.php')?>
