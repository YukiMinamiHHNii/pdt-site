<div class="col s12 m12 l8 offset-l2">
    <h1 class="col s12 m12 l12 center-align">
        Register
    </h1>
    <form class="col s12 register-form">
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Username" name="username" type="text" class="validate" pattern="[A-Za-z0-9]{1,}">
                <label for="username">Username</label>
                <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
            </div>
            <div class="input-field col s12">
                <input placeholder="user@mail.com" name="mail" type="text" class="validate">
                <label for="mail">Mail</label>
                <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
            </div>
            <div class="input-field col s12">
                <input placeholder="password" name="pass" type="password" class="validate" pattern="[A-Za-z0-9]{1,}">
                <label for="pass">Password</label>
                <span class="helper-text" data-error="Wrong input data" data-success="Correct input data"/>
            </div>
            <div class="col s12 right-align">
                <input type="submit" class="btn waves-effect waves-light indigo" value="Register">
            </div>
        </div>
    </form>
    <div class="row operation-result">
        <h5></h5>
    </div>
</div>