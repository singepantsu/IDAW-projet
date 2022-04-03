        <div class="services-modal modal fade" id="servicesModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <form id="Account_form" >
                                    <div class="row">
                                        <div class="col">
                                            <h4>Login:</h4>
                                            <input type="text" id="login_modif" value="<?php echo $_SESSION['login']?>" readonly>
                                        </div>
                                        <div class="col">
                                            <h4>Password:</h4>
                                            <input type="text" id="mdp_modif" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Surname:</h6>
                                            <input type="text" id="name_modif" placeholder="Surname">
                                        </div>
                                        <div class="col">
                                            <h6>Name:</h6>
                                            <input type="text" id="surname_modif" placeholder="Name">
                                        </div>
                                        <div class="col">
                                            <h6>Date of birth:</h6>
                                            <input type="date" id="birthday_modif">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Height:</h6>
                                            <input type="number" id="height_modif" placeholder="height (in cm)" size="11">
                                        </div>
                                        <div class="col">
                                            <h6>Weight:</h6>
                                            <input type="number" id="weight_modif" placeholder="Weight(in kg)" size="11">
                                        </div>
                                        <div class="col">
                                            <h6>Age:</h6>
                                            <input type="number" id="age_modif" placeholder="Age" size="5">
                                        </div>
                                        <div class="col">
                                            <h6>Sex:</h6>
                                            <input type="text" id="sex_modif" maxlength="1" size="7" placeholder="Sex(H or F)">
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary btn-xl" type="button" id="modify_account"value="Modify Account">
                                </form>
                    </div>
                </div>
            </div>
        </div>
<script>

</script>