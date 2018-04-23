<div id="typing-edit" class="modal modal-fixed-footer">
  <form class="form-edit">
    <div class="modal-content">
      <h4>Edit typing</h4>
      <div class="row">
        <div class="input-field col s12">
          <input name="typingName" type="text" maxlength="50" pattern="[A-Za-z0-9]{1,}" class="validate">
          <label for="typingName">Type name</label>
          <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
          <input name="typingID" type="hidden">
        </div>
        <div class="row">
          <div class="col s12 right-align">
            <input type="submit" class="btn waves-effect waves-light indigo" value="Save">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer grey lighten-4">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </form>
</div>
