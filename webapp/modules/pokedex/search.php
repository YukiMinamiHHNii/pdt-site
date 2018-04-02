<?php require_once('../../components/layout/header.php')?>
<div class="row">
  <div class="col s12 m12 l8 offset-l2">
    <h1 class="col s12 m12 center-align">Pokédex</h1>
    <p>
      The Pokédex section has a wealth of information on all the Pokémon creatures from the entire game series. Click a Pokémon's name to see a detailed page with species typing, moves, stats and more.
    </p>
    <?php require('../../components/pokedex/search-form.php')?>
  </div>
  <?php //require('../../components/pokedex/search-cards.php')?>
  <?php require('../../components/pokedex/search-table.php')?>
</div>
<?php require_once('../../components/layout/footer.php')?>
