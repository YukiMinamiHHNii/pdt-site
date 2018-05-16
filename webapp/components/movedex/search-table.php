<div class="col s12 m12 l8 offset-l2 table-container">
  <table class="col s12 highlight centered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Typing</th>
        <th>Power</th>
        <th>Accuracy</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody id='move-table'>
    </tbody>
  </table>
</div>

<template id="move-row">
  <tr>
    <td class="move-name"></td>
    <td class="move-cat"></td>
    <td class="move-typing"></td>
    <td class="move-power"></td>
    <td class="move-acc"></td>
    <td class="move-desc"></td>
    <td >
      <a class="waves-effect waves-light btn indigo modal-trigger move-dialog" href="#move-data">
        <i class="material-icons">search</i>
      </a>
    </td>
  </tr>
</template>