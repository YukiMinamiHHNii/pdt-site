<div class="col s12 m12 l8 offset-l2">
    <h1 class="col s12 m12 l12 center-align">
        Comments
    </h1>
    <p>
        Have a suggestion on how can this site can be improved or just want to talk? Leave your comments.
    </p>
    <div class="row">
        <form class="col s12 comment-form">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Username" name="username" type="text" class="validate" pattern="[A-Za-z0-9]{1,}">
                    <label for="username">Username</label>
                    <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
                </div>
                <div class="input-field col s6">
                    <input placeholder="user@mail.com" name="mail" type="text" class="validate">
                    <label for="mail">Mail</label>
                    <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
                </div>
                <div class="input-field col s12">
                    <input name="subject" type="text" class="validate" pattern="[A-Za-z0-9]{1,}">
                    <label for="subject">Subject</label>
                    <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
                </div>
                <div class="input-field col s12">
                    <textarea name="comment" class="materialize-textarea validate" pattern="[A-Za-z0-9]{1,}"></textarea>
                    <label for="comment">Comment</label>
                    <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
                </div>
                <div class="col s12 right-align">
                    <input type="submit" class="btn waves-effect waves-light indigo" value="Save">
                </div>
            </div>
        </form>
    </div>
    <div class="row comment-result">
        <h5></h5>
    </div>
</div>