<form id="Account_form" action="../backend/createAccount.php" method="POST">
    <div class="row">
        <div class="col">
            <h4>Login:</h4>
            <input type="text" name="login" placeholder="login">
        </div>
        <div class="col">
            <h4>Password:</h4>
            <input type="text" name="mdp" placeholder="password">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h6>Surname:</h6>
            <input type="text" name="name" placeholder="Surname">
        </div>
        <div class="col">
            <h6>Name:</h6>
            <input type="text" name="surname" placeholder="Name">
        </div>
        <div class="col">
            <h6>Date of birth:</h6>
            <input type="date" name="birthday">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h6>Height:</h6>
            <input type="number" name="height" placeholder="height (in cm)" size="11">
        </div>
        <div class="col">
            <h6>Weight:</h6>
            <input type="number" name="weight" placeholder="Weight(in kg)" size="11">
        </div>
        <div class="col">
            <h6>Age:</h6>
            <input type="number" name="age" placeholder="Age" size="5">
        </div>
        <div class="col">
            <h6>Sex:</h6>
            <input type="text" name="sex" maxlength="1" size="7" placeholder="Sex(H or F)">
        </div>
    </div>
    <br>
    <input class="btn btn-primary btn-xl" type="submit" value="Create Account">
</form>