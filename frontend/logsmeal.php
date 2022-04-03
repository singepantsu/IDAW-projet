<div class="services-modal modal fade" id="servicesModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Your logs</h2>
                                    <div class="container">
                                        <form id="meal_form">
                                        <div class="row">
                                            <div class="col">
                                                <h4>Quantity:</h4>
                                                <input type="number" size="3" id="quant_add">
                                            </div>
                                            <div class="col">
                                                <h4>Date of meal:</h4>
                                                <input type="date" id="date_add">
                                            </div>
                                            <div class="col">
                                                <h4>Name of meal:</h4>
                                                <input type="text" size="15" id="name_add">
                                            </div>
                                        </div>
                                        <br>
                                        <input type="button" id="meal_add" value="Add Meal" class="btn btn-primary">
                                        </form>
                                    </div>
                                    <table id="meal_table" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Meal</th>
                                                <th>Date</th>
                                            </tr>
                                        <thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    $("#meal_add").click(function(){
        if (($("#quant_add").val()=="") || ($("#date_add").val()=="") || ($("#name_add").val()==""))
            window.alert("Please fill ENTIRELY the form");
        else{
            let name_add=$("#name_add").val();
            let dataToSend={name_add};
            $.post("../backend/getIdbyMeal.php", dataToSend, function(data){
                console.debug(data);
                data=JSON.parse(data);
                if (data == "failure")
                    window.alert("This meal is not in the database")
                else {
                    let name=data[0];
                    let quant=$("#quant_add").val();
                    let date=$("#date_add").val()
                    let newData={name,quant,date};
                    $.post("../backend/addMeal.php", newData, function(data){
                        console.debug(data);
                        data=JSON.parse(data);
                        if (data == "Failure")
                            window.alert("Add Fails");
                        else{
                            window.alert("Succesfuly Added");
                        }
                    })
                }
            })
        }
    })
    $.ajax({
    url: "../backend/getMeal.php",
    type: 'GET',
    success: function(data){
        var t = $('#meal_table').DataTable();
        console.debug(data);
        data=JSON.parse(data);
        if (data == "failure")
            window.alert("No meal found");
        else{
            data.forEach((rows,index) => {
                t.row.add([
                    rows[0],
                    rows[2],
                    rows[1]
                ] ).draw(false);
            })
        }
    }});
</script>