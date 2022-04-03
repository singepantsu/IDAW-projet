<div class="services-modal modal fade" id="servicesModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">The Choozer</h2>
                                        <p class="item-intro text-muted">Just click and we choose.</p>
                                        <input type="button" class="btn btn-primary btn-xl" id="start_choose" value="Start!">
                                        <div class="container" id="meal_chooser">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
<script>
    var height_imc = 0;
    var weight_imc = 0;
    var imc=0;
//Choose parameters for next meal
$('#start_choose').click(function(){
    $('#meal_chooser').empty();
    $('#meal_chooser').append(`<h2>Votre niveau de sport est:${sportslevel}</h2>`);
    $.get("../backend/getHeightWeightUser.php",function(data){
        console.debug(data);
        data=JSON.parse(data);
        height_imc = data[0];
        weight_imc = data[1];
        console.debug(height_imc);
        imc=weight_imc/(Math.pow(height_imc,2)/10000);
        $('#meal_chooser').append(`<h2>Votre imc est:${imc}</h2>`);
        $('#meal_chooser').append(`<input type="button" id="eat_reaveal" class="btn btn-primary btn-xl" value="Reveal" onclick="revealMeal()">`);
    })
});
//Choose next meal, may not be edible
function revealMeal(){
    let lvl=sportslevel;
    let dataToSend={lvl, imc};
    $.post("../backend/selectRandom.php", dataToSend, function(data){
        data=JSON.parse(data);
        if (data=="failure")
            window.alert("Error");
        else{
            let max=data.length;
            let random_index=Math.floor(Math.random()*max);
            $('#meal_chooser').append(`<h2>Eat:${data[random_index][0]}</h2>`);
            document.getElementById('eat_reaveal').onclick = null;
            $('#meal_chooser').append(`<h5>Clique on start to refresh</h5>`);

        }
    })

}
</script>