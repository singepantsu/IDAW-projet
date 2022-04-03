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
                                            <input type="password" id="mdp_modif" placeholder="password">
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
    let log = $('#login_modif').val();
    let dataToSend ={log};
    $.post("../backend/getUser.php", dataToSend,function(data){
        data = JSON.parse(data);
        $('#mdp_modif').val(data[8]);
        $('#name_modif').val(data[7]);
        $('#surname_modif').val(data[6]);
        $('#sex_modif').val(data[5]);
        $('#weight_modif').val(data[4]);
        $('#age_modif').val(data[3]);
        $('#height_modif').val(data[2]);
        $('#birthday_modif').val(data[1]);
    });
    $('#mdp_modif').click(function(){
        window.alert("Warning! Your changing the password.");
    });
    $('#modify_account').click(function(){
        let login=$('#login_modif').val();
        let mdp=$('#mdp_modif').val();
        let name=$('#name_modif').val();
        let surname=$('#surname_modif').val();
        let birthday=$('#birthday_modif').val();
        let height=$('#height_modif').val();
        let weight=$('#weight_modif').val();
        let age=$('#age_modif').val();
        let sex=$('#sex_modif').val();
        let dataToSend={login,mdp,name,surname,birthday,height,weight,age,sex};
        if (window.confirm("Are you sure?")){
            $.post("../backend/editUser.php", dataToSend,function(data){
                console.debug(data);
                data=JSON.parse(data);
                if (data == "failure")
                    window.alert("Edit fails");
                else
                    window.alert("Your account "+data+" has been updated!");
            });
        }
    });
</script>