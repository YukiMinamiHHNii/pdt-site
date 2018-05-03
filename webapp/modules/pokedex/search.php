<div class="col s12 m12 l8 offset-l2">
  <h1 class="col s12 m12 center-align">
        Pokédex
  </h1>
  <p>
    The Pokédex section has a wealth of information on all the Pokémon creatures from the entire game series. Click a Pokémon's name to see a detailed page with species typing, moves, stats and more.
  </p>
  <?php require('webapp/components/pokedex/search-form.php')?>
</div>
<div class="col s12 m12 l8 offset-l2 table-container" id="show-result">
  
</div>
<?php require('webapp/components/pokedex/search-cards.php')?>
<?php require('webapp/components/pokedex/search-table.php')?>
