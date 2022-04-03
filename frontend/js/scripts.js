/*!
* Start Bootstrap - Agency v7.0.11 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

function submission(data){
    window.location = "connected.php";
}

// Alert for Password forgotten
$('#PasswordForgot').click(function(){
    window.alert("Try to remember.");
});

//Submit the new account form
$('#submit_new_account').click(function(){
    if (($('#login_new').val()=="") || ($('#mdp_new').val()=="") || ($('birthday_new').val()=='') || ($('#name_new').val()=="") || ($('#surname_new').val()=="") || ($('#height_new').val()==0) || ($('#weight_new').val()==0) || ($('#age_new').val()==0)){
        if (!(($('#sex_new').val()=="H") || ($('#sex_new').val()=="F"))){
            window.alert("Enter valid data");
        }
    }
    else{
        let login=$('#login_new').val();
        let mdp=$('#mdp_new').val();
        let name=$('#name_new').val();
        let surname=$('#surname_new').val();
        let birthday=$('#birthday_new').val();
        let height=$('#height_new').val();
        let weight=$('#weight_new').val();
        let age=$('#age_new').val();
        let sex=$('#sex_new').val();
        let dataToSend={login,mdp,name,surname,birthday,height,weight,age,sex};
        console.debug(dataToSend);
        $.post('../backend/createAccount.php', dataToSend, function(data){
            console.debug(data);
            data = JSON.parse(data);
            //Verify if account already exist
            if (data == "failure")
                window.alert("Account Existing");
            else
                window.location="connected.php";
        });
    }
});
//Submit the connexion form
$('#submit_form').click(function(){
    if (($('#Login_form').val()=="") || ($('#Password_form').val()==""))
        window.alert("Some data are still missing!");
    else {
        let log = $('#Login_form').val();
        let pass = $('#Password_form').val();
        let dataToSend= {log, pass};
        $.post('../backend/connexion.php', dataToSend, function(data){
            console.debug(data);
            data = JSON.parse(data);
            if (data == "failure"){
                window.alert("Connexion impossible");
            }
            else {
                submission(data);
            }
        })
    }
})
