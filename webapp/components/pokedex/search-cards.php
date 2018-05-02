<template id="pokemon-card-template">
  <div class="col s12 m6 l4">
    <div class="card">
      <div class="card-image">
        <a href="single">
          <img src="img/pokedex/large/001.png">
        </a>
      </div>
      <div class="card-content">
        <table class="striped responsive-table">
          <tbody>
            <tr>
              <td>Name:</td>
              <td class="card-name"></td>
            </tr>
            <tr>
              <td>Typing:</td>
              <td class="card-typing"></td>
            </tr>
            <tr>
              <td>Abilities:</td>
              <td class="card-ability"></td>
            </tr>
          </tbody>
        </table>
        <div class="card-action">
          <a href="single">Read more...</a>
        </div>
      </div>
    </div>
  </div>
</template>
