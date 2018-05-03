<template id="pokemon-card-template">
  <div class="col s12 m6 l4">
    <div class="card">
      <div class="card-image">
        <img class="activator" src="img/pokedex/large/001.png">
      </div>
      <div class="card-content">
        <div class="card-action">
          <a class="card-name indigo-text" href="#"></a>
        </div>
      </div>
      <div class="card-reveal">
        <span class="card-title">Pokémon data<i class="material-icons right">close</i></span>
        <ul class="collection">
          <li class="collection-item">
            <h6><b>Typing:</b></h6>
            <span class="card-typing"></span>
          </li>
          <li class="collection-item">
            <h6><b>Ability:</b></h6>
            <span class="card-ability"></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
