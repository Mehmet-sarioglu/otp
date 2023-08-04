var firebaseConfig = {
    apiKey: "AIzaSyDtMhBVZXD23n14X1hFVPfcJTq1_EYnlSg",
    authDomain: "otp-auth-52b1a.firebaseapp.com",
    projectId: "otp-auth-52b1a",
    storageBucket: "otp-auth-52b1a.appspot.com",
    messagingSenderId: "1030240968370",
    appId: "1:1030240968370:web:87797840c8d858a41933ab",
};
firebase.initializeApp(firebaseConfig);

window.onload = function () {
    render();
};
function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container"
    );
    recaptchaVerifier.render();
}
var form = document.getElementById("formId");
function submitForm(event) {
    event.preventDefault();
    var myButton = document.getElementById("myButton");
    myButton.className = myButton.className + " loading";
    // send otp
    var number = $("#number").val();
    firebase
        .auth()
        .signInWithPhoneNumber(number, window.recaptchaVerifier)
        .then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            console.log("Message sent");

            // Swall
            Swal.fire({
                title: "Enter verify code",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off",
                },
                showCancelButton: true,
                confirmButtonText: "verfiy",
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    var code = login;
                    coderesult
                        .confirm(code)
                        .then(function (result) {
                            var user = result.user;
                            console.log(user);
                            console.log("Ok");
                            window.location.href = "/index";
                        })
                        .catch(function (error) {
                            console.log("verify");
                            Swal.fire({});
                            Swal.showValidationMessage(`verify code is wrong`);
                            console.log(error.message);
                            removeClass();
                        });
                },
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    removeClass();
                    console.log(result);
                }
            });
            //** Swal */
        })
        .catch(function (error) {
            console.log("sendOTP");
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Phone number wrong!",
            });
            console.log(error.message);
        });

    //** end send otp */
}
form.addEventListener("submit", submitForm);

function removeClass() {
    myButton.className = myButton.className.replace(
        new RegExp("(?:^|\\s)loading(?!\\S)"),
        ""
    );
}
