<div class="services-modal modal fade" id="servicesModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Your Sports</h2>
                                    <div class="row">
                                        <h4>Add sport:</h4>
                                    </div>
                                    <form id="add_sport">
                                    <div class="row">
                                        <div class="col">
                                            <select id="sport_add">
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select id="level_add" name="cars">
                                            <option value="Nul">Legendary Bad</option>
                                            <option value="Faible">Low</option>
                                            <option value="Correct">Correct</option>
                                            <option value="Intensif">High</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input class="btn btn-primary" id="send_sport" type="button" value="Add Sport">
                                        </div>
                                    </form>
                                    <div class="row">
                                        <h4>Your list:</h4>
                                    </div>
                                    <table id="sports_table" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sport</th>
                                                <th>Level</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sports_table_body">
                                        </tbody>
                                    </table>
                                    <!--Give an appreciation-->
                                    <div class="container" id="giving_apprec">
                                    </div>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/services/4.jpg" alt="..." />
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Sports
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        //Calculate level
        var sportslevel=0;
        //Delete Sport from User List
        function deleteSport(id_s){
            let dataToSend={id_s};
            $.post("../backend/deleteSport.php",dataToSend,function(data){
                //console.debug(data);
                data=JSON.parse(data);
                if (data == "failure")
                    window.alert("Cannot Delete/Doesn't Exist");
                else{
                    window.alert("Succesfully added!");
                    $('#sports_table_body').empty();
                    traceBodyTable();
                }
            })
        }
        //give a number to amount of sport
        function amountSport(lvl_sport){
            switch (lvl_sport){
                case 'Nul':
                    return 1;
                case 'Faible':
                    return 2;
                case 'Correct':
                    return 3;
                case 'Intensif':
                    return 4;
                default:
                    return 0;
            }
        }
        //Comment the level
        function niveauAmount(lvl_num){
            if (lvl_num<=0)
                return "Go to the gym!";
            else{
                if(lvl_num<=3)
                    return "Good start! Continue!";
                else{
                    if (lvl_num<=5)
                        return "Great job! More than enough";
                    else{
                        return "Plz stop. Don't kill yourself by sports."
                    }
                }
            }
        }
        //add sports to select form
        $.get("../backend/getSports.php", function(data){
            //console.debug(data);
            data=JSON.parse(data);
            if (data == "failure")
                window.alert('Problem with sports db');
            else{
                data.forEach((spor,index) => {
                    $('#sport_add').append(`<option value="${spor[0]}">${spor[1]}</option>`);
                })
            }
        });
        //Add the sport to user List
        $('#send_sport').click(function(){
            let sport_id=$('#sport_add').val();
            let name_sport=$('#sport_add').find(":selected").text();
            let level=$('#level_add').val();
            let dataToSend={sport_id,level};
            $.post("../backend/addUserSport.php", dataToSend,function(data){
                console.debug(data);
                data=JSON.parse(data);
                if (data == "failure")
                    window.alert("Problem with Sports add");
                else{
                    sportslevel += amountSport(level);
                    window.alert("Succesfully added!");
                    $('#giving_apprec').empty();
                    $('#giving_apprec').append(`<h2>${niveauAmount(sportslevel)}</h2>`);
                    $('#sports_table_body').append(`<tr><td>${name_sport}</td><td>${level}</td><td><input type="button" class="btn btn-primary" value="Delete" onclick="deleteSport(${sport_id})"></td></tr>`);
                }
            })
        });
        //Display current sport
        function traceBodyTable(){
            $.get("../backend/getUserSport.php",function(data){
                    sportslevel=0;
                    console.debug(data);
                    data=JSON.parse(data);
                    if (data == "failure")
                        window.alert("Problem with Sports display");
                    else{
                        data.forEach((rows, index) => {
                            sportslevel += amountSport(rows[1]);
                            $('#sports_table_body').append(`<tr><td>${rows[0]}</td><td>${rows[1]}</td><td><input type="button" class="btn btn-primary" value="Delete" onclick="deleteSport(${rows[2]})"></td></tr>`);
                        })
                    }
                    $('#giving_apprec').empty();
                    $('#giving_apprec').append(`<h2>${niveauAmount(sportslevel)}</h2>`);
            })
        }
        traceBodyTable();
    </script>
