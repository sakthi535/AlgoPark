
function validate(event){

    console.log(event)

    userCreds = {
        "1":{
            "User Id" : "TabNine",
            "Password" : "SDS145%2"
        },
        "2":{
            "User Id" : "Tine",
            "Password" : "abc1"
        },
        "3":{
            "User Id" : "Xsver",
            "Password" : "5544"
        },
        "4":{
            "User Id" : "MiNine",
            "Password" : "8899%2"
        }
    }


    event.preventDefault();


    var userId = document.getElementById("userId").value;
    var passw = document.getElementById("passw").value;

    for(user in userCreds){
        // console.log(userCreds[user])
        // console.log(userCreds[user]['User Id'])
        if(userCreds[user]['User Id'] === userId){
            if(userCreds[user]['Password'] === passw){
                alert("Correct Credentials");
                // window.location.href = "../Dashboard/dashboard.html";
                window.open("../Dashboard/index.html", '_top');
                // window.open("https://www.google.com", '_top');


                return true;
            }
            else{
                alert("Incorrect Password");
                return false;

            }
        }
    }

    alert("Incorrect Username");
    return false;

}

function redirectRegistration(event){
    console.log(event) 
    
    event.stopImmediatePropagation();
    event.preventDefault();


    window.open("./Register.html", '_self');

    return true;

}


function redirectLogin(event){

    document.getElementById("registerForm").submit();    
    
}

function createAccount(event){

    return ;
}