<div class="col s12 m12 l12 table-container">
  <table class="stripped">
    <thead>
      <tr>
        <th>Typing ID</th>
        <th>Typing Name</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="typing-table">
    </tbody>
  </table>
</div>
<template id="typing-row">
  <tr>
    <td class="typing-id"></td>
    <td class="typing-name"></td>
    <td>
      <a href="#typing-edit" class="modal-trigger">
        <span class="new badge indigo waves-effect waves-light typing-edit" data-badge-caption="Edit"/>
      </a>
    </td>
    <td>
      <a href="#typing-delete" class="modal-trigger">
        <span class="new badge red waves-effect waves-light typing-delete" data-badge-caption="Delete"/>
      </a>
    </td>
  </tr>
</template>
</div>
