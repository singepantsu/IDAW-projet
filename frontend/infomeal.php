<div class="services-modal modal fade" id="servicesModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Nutritional Value</h2>
                                    <table id="all_meal_table" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th size="10">Name</th>
                                                <th>Energie(kJ/100g)</th>
                                                <th>Eau(g/100 g)</th>
                                                <th>Proteines(g/100 g)</th>
                                                <th>Glucide(g/100 g)</th>
                                                <th>Lipides(g/100 g)</th>
                                            </tr>
                                        <thead>
                                    </table>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/services/3.jpg" alt="..." />
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Popup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    var list_meal = [];
    var t = $('#all_meal_table').DataTable();
    //Add all meals to list_meal
    
    function getUserMealToTable(){
        $.get("../backend/getAllMeals.php", function(data){
            //console.debug(data);
            data=JSON.parse(data);
            data.forEach((meal,index) =>{
                list_meal.push([meal[0],meal[1]]);
            });
            console.debug(list_meal);
            list_meal.forEach((rows, index) =>{
                //console.debug(index);
                let id_meal=rows[0];
                let name_meal=rows[1];
                let dataToSend={id_meal};
                //console.debug(dataToSend)
                $.post("../backend/getNutrimentsByMeal", dataToSend, function(data){
                    console.debug(data);
                    data=JSON.parse(data);
                    if (data == "failure")
                        window.alert("Error at" + name_meal);
                    else {
                        let nrj = "";
                        let water = "";
                        let prot = "";
                        let gluc = "";
                        let lip = "";
                        data.forEach((rows,i) =>{
                            //console.debug(rows[1]);
                            switch (rows[1]){
                                case '1':
                                    if (nrj == "")
                                        nrj= rows[0];
                                case '5':
                                    if (water == "")
                                        water = rows[0];
                                case '6':
                                    if (prot == "")
                                        prot = rows[0];
                                case '8':
                                    if (gluc == "")
                                        gluc = rows[0];
                                case '9':
                                    if (lip == "")
                                        lip = rows[0];
                            };
                        })
                        let newRow = [name_meal, nrj, water, prot, gluc, lip];
                        t.row.add(newRow).draw(false);
                    }
                })
            })
        });
    }
      
    //Generate the table only on the first click
    $('#load_meals').one('click',function(e){
        getUserMealToTable();
    })
    //Get your meals
    /*
    function getUserMealToTable(){
    $.get("../backend/getMeal.php", function(data){
        console.debug(data);
        data=JSON.parse(data);
        if (data == "failure")
            window.alert("No meal found");
        else{
            data.forEach((rows,index) => {
                list_meal.push([rows[2],rows[3]]);
            })
        }
        console.debug(list_meal);
        //Add your meals to table
        list_meal.forEach((rows, index) =>{
                //console.debug(index);
                let id_meal=rows[1];
                let name_meal=rows[0];
                let dataToSend={id_meal};
                //console.debug(dataToSend)
                $.post("../backend/getNutrimentsByMeal", dataToSend, function(data){
                    console.debug(data);
                    data=JSON.parse(data);
                    if (data == "failure")
                        window.alert("Error at" + name_meal);
                    else {
                        let nrj = "";
                        let water = "";
                        let prot = "";
                        let gluc = "";
                        let lip = "";
                        data.forEach((rows,i) =>{
                            //console.debug(rows[1]);
                            switch (rows[1]){
                                case '1':
                                    if (nrj == "")
                                        nrj= rows[0];
                                case '5':
                                    if (water == "")
                                        water = rows[0];
                                case '6':
                                    if (prot == "")
                                        prot = rows[0];
                                case '8':
                                    if (gluc == "")
                                        gluc = rows[0];
                                case '9':
                                    if (lip == "")
                                        lip = rows[0];
                            };
                        })
                        let newRow = [name_meal, nrj, water, prot, gluc, lip];
                        t.row.add(newRow).draw(false);
                    }
                })
            })
        
    })
    }
    */
</script>