<div class="col s12 m12 l8 offset-l2">
  <h2 class="col s12 m12 center-align">
        Typing management index
  </h2>
  <div class="col s12 m12 center-align">
    <a href="#typing-create" class="waves-effect waves-light btn indigo modal-trigger">
      <i class="material-icons left">add</i>
      Add new typing
    </a>
  </div>
<?php
  require_once('webapp/components/admin/typing/typing-table.php');
  require_once('webapp/components/admin/typing/create-typing.php');
  require_once('webapp/components/admin/typing/edit-typing.php');
  require_once('webapp/components/admin/typing/delete-typing.php');
?>
