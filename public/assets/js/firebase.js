$(document).ready(function() {

    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBH0fqIs63NTnDad1--dyOpFQwSzqV6ck0",
        authDomain: "otp-app-21f2b.firebaseapp.com",
        projectId: "otp-app-21f2b",
        storageBucket: "otp-app-21f2b.appspot.com",
        messagingSenderId: "204588786339",
        appId: "1:204588786339:web:4d07a50606468013be5516",
        measurementId: "G-79Q7NEFNT2"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': function (response) {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            console.log('recaptcha resolved');
        }
    });
    onSignInSubmit();
});



function onSignInSubmit() {
    $('#verifPhNum').on('click', function() {
        let phoneNo = '';
        var code = $('#codeToVerify').val();
        console.log(code);
        $(this).attr('disabled', 'disabled');
        $(this).text('Processing..');
        confirmationResult.confirm(code).then(function (result) {
            document.getElementById("verifPhNum").style.display = "none";
            document.getElementById("submit_btn").style.display = "initial";
            
            document.getElementById("getcode").style.display = "none";
      
            // alert('Succecss');
                    // var user = result.user;
                    // console.log(user);
            
    
            // ...
        }.bind($(this))).catch(function (error) {
        
            // User couldn't sign in (bad verification code?)
            // ...
            $(this).removeAttr('disabled');
            $(this).text('Invalid Code');
            setTimeout(() => {
                $(this).text('Verify Phone No');
            }, 2000);
        }.bind($(this)));
    
    });
    
    
    $('#getcode').on('click', function () {
        $("#getcode").hide();        
        $("#time_for_otp").show();
        $("#verifPhNum").show();
        
        var phoneNo = $('#number').val();
        console.log(phoneNo);
        
        var appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNo, appVerifier)
        .then(function (confirmationResult) {
    
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
        }).catch(function (error) {
            console.log(error.message);
    
        });

        let timerOn = true;

        function timer(remaining) {
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;
            
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            document.getElementById('timer').innerHTML = m + ':' + s;
            remaining -= 1;
            
            if (remaining >= 0 && timerOn) {
                setTimeout(function() {
                timer(remaining);
                }, 1000);
                return;
            }

            if (!timerOn) {
                // Do validate stuff here
                return;
            }
            $("#getcode").show();
            $("#verifPhNum").show();
            $("#getcode").text('Resend OTP');
            $("#time_for_otp").hide();
        }
        timer(120);
    });
}