


   
    function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var reg =/^([A-Za-z0-9_\-.+])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,})$/;
    var passreg=  /^[A-Za-z]\w{1,}$/;
    var returnval = true;
    
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var username = document.forms['myform']["username"].value;
    if (username.length<5){
        seterror("un", "*Length of username is too short");
        returnval = false;
    }

    if (username.length == 0){
        seterror("un", "*Length of username cannot be zero!");
        returnval = false;
    }

    var email = document.forms['myform']["email"].value;
    if (email.length<9){
        seterror("em", "*Email length is too short");
        returnval = false;
    }


    if (reg.test(email) == false)
    {
        seterror("em", "*Email validation is wrong");
        returnval = false;
    }



 

    var password = document.forms['myform']["password"].value;
    if (password.length < 6){

        // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
        seterror("ps", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    if (passreg.test(password) == false)
    {
        seterror("ps", "*password validation is wrong");
        returnval = false;
    }

    var cpassword = document.forms['myform']["cpassword"].value;
    if (cpassword != password){
        seterror("cps", "*Password and Confirm password should match!");
        returnval = false;
    }

    var terms = document.forms['myform']["terms"].checked;
    if(!terms)
    {
        seterror("ter", "*Confirm Terms & Conditions!");
        returnval = false;
    }

    var dob = document.forms['myform']["bd"].value;
    if (dob.length == 0){
        seterror("dob", "*Enter BirthDate!");
        returnval = false;
    }
    
    // var gender = document.mform.rad1;
    // if(!document.getElementById('rad1').checked || !document.getElementById('rad2').checked )
    // {       
    //     seterror("aut", "*Please Select One Option!");
    //     returnval = false;
    // }



    return returnval;
}








