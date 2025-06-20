import './bootstrap';

let appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');

let session = document.querySelector('meta[name="session"]').getAttribute('content');
let userSession = document.querySelector('meta[name="user-session"]').getAttribute('content');
let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let randToken = document.querySelector('meta[name="rand-token"]').getAttribute('content');

const hamMenu = document.querySelector('#hamburger-menu');
const aside = document.querySelector('aside');
const footer = document.querySelector('footer');
const navs = document.querySelectorAll('.navs');

const breakPoints = {
    xxl: 1536,
    xl: 1280,
    lg: 1024,
    md: 768,
    sm: 640,
}


hamMenu.addEventListener('click', () => {
    aside.classList.contains('w-18') ? aside.classList.replace('w-18', 'w-68') : aside.classList.replace('w-68', 'w-18');
    footer.classList.toggle('invisible');
    navs.forEach(nav => {
        nav.classList.toggle('flex-col');
        nav.classList.toggle('gap-4');
        nav.children[1].classList.toggle('text-xs');
    });
});


// Login Overlay & User Profiles Init
const userProfile = document.querySelector('#user-profile');
const btnSignIn = document.querySelector('#btn-signin');

const loginMethodOverlay = document.querySelector('#login-method-overlay');
const loginMethodOverlayClose = document.querySelector('Button[aria-label="close overlay login method"]');
const formLoginMethodOverlay = document.querySelector('#form-login-method-overlay');
const btnLoginWithEmail = document.querySelector('#btn-login-with-email');
const cbAgreeTosPpLoginMethod = document.querySelector('#agreeTosPp-login-method-overlay');
const cbAgreeTosPpLoginForm = document.querySelector('#agreeTosPp-login-form-overlay');

const loginFormOverlay = document.querySelector('#login-form-overlay');
const loginFormOverlayClose = document.querySelector('Button[aria-label="close overlay login form"]');
const loginFormOverlayBack = document.querySelector('Button[aria-label="back to overlay login method"]');
const formLoginFormOverlay = document.querySelector('#form-login-form-overlay');
const cbAgreeTosPpRegisterForm = document.querySelector('#agreeTosPp-register-form-overlay');
const inputEmailLoginForm = document.querySelector('input[aria-label="email login form"]');
const inputPasswordLoginForm = document.querySelector('input[aria-label="password login form"]');
const btnLogin = document.querySelector('#btn-login');

// Register Overlay Init
const regOverlay = document.querySelector('#reg-overlay');
const regForm = document.querySelector('#reg-form');
const regBack = document.querySelector('#reg-back');
const regClose = document.querySelector('#reg-close');
const btnReg = document.querySelector('#btn-reg');
const regEmail = document.querySelector('#reg-email');
const regPassword = document.querySelector('#reg-password');
const regConfirmPassword = document.querySelector('#reg-confirm-password');
const regVerifCode = document.querySelector('#reg-verif-code');
const regSendCode = regVerifCode.nextElementSibling;

const toLog = document.querySelector('.to-log');
const toRegs = document.querySelectorAll('.to-reg');

// Upload Menu Init
const uploadMenu = document.querySelector('#upload-menu');
const uploadMenuOverlay = document.querySelector('#upload-menu-overlay');
const uploadOverlay = document.querySelector('#upload-overlay');
const closeUploadOverlay = document.querySelector('#close-upload-overlay');
const imageInput = document.getElementById('input-thumbnail');
const previewImage = document.getElementById('preview-thumbnail');
const videoInput = document.getElementById('input-video');
const previewVideo = document.getElementById('preview-video');
const btnUpload = document.querySelector('#btn-upload');
const formUpload = document.querySelector('#upload-form-overlay');
const videoTitle = document.querySelector('#input-video-title')

// User Profile & Overlay Diret
const profileMenuOverlay = document.querySelector('#profile-menu-overlay');

if(session) {
    userProfile.addEventListener('mouseover', () => {
        profileMenuOverlay.classList.replace('hidden', 'block');
    });
    userProfile.addEventListener('mouseout', () => {
        profileMenuOverlay.classList.replace('block', 'hidden');
    });
    profileMenuOverlay.addEventListener('mouseover', () => {
        profileMenuOverlay.classList.replace('hidden', 'block');
    });
    profileMenuOverlay.addEventListener('mouseout', () => {
        profileMenuOverlay.classList.replace('block', 'hidden');
    });
} else {
    btnSignIn.addEventListener('click', () => {
        loginMethodOverlay.classList.replace('hidden', 'flex');
    })
}
toLog.addEventListener('click', e => {
    e.preventDefault();
    loginFormOverlay.classList.replace('hidden', 'flex');
    regOverlay.classList.replace('flex', 'hidden');
    loginMethodOverlay.classList.replace('flex', 'hidden');
    regForm.reset();
})
toRegs.forEach(toReg => {
    toReg.addEventListener('click', e => {
        e.preventDefault();
        regOverlay.classList.replace('hidden', 'flex');
        loginFormOverlay.classList.replace('flex', 'hidden');
        loginMethodOverlay.classList.replace('flex', 'hidden');
        formLoginFormOverlay.reset();
    })
})

// Upload Menu

uploadMenu.addEventListener('mouseover', () => {
    uploadMenuOverlay.classList.replace('hidden', 'block');
})
uploadMenu.addEventListener('mouseout', () => {
    uploadMenuOverlay.classList.replace('block', 'hidden');
})
uploadMenuOverlay.addEventListener('mouseover', () => {
    uploadMenuOverlay.classList.replace('hidden', 'block');
})
uploadMenuOverlay.addEventListener('mouseout', () => {
    uploadMenuOverlay.classList.replace('block', 'hidden');
})

// Upload & Preview Thubnail & Video
uploadMenuOverlay.firstElementChild.addEventListener('click', () => {
    uploadOverlay.classList.replace('hidden', 'flex');
})
closeUploadOverlay.addEventListener('click', () => {
    uploadOverlay.classList.replace('flex', 'hidden');
    formUpload.reset();
})

imageInput.addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
    btnUpload.previousElementSibling.classList.replace('flex', 'hidden');
    imageInput.previousElementSibling.innerHTML = '<i class="fa-regular fa-image"></i>&emsp;Change Thumbnail';
    const reader = new FileReader();
    reader.onload = function(e) {
      previewImage.src = e.target.result;
      previewImage.style.display = 'block';
    }
    reader.readAsDataURL(file);
  } else {
    previewImage.style.display = 'none';
  }
});

videoInput.addEventListener('change', function(event) {
    previewVideo.classList.replace('hidden', 'block');
    const file = event.target.files[0];
    if (file) {
        btnUpload.previousElementSibling.classList.replace('flex', 'hidden');
        videoInput.previousElementSibling.innerHTML = '<i class="fa-solid fa-file-video"></i>&emsp;&nbsp;Change Video';
        const reader = new FileReader();

        reader.onload = function(e) {
            previewVideo.src = e.target.result;
        }

        reader.readAsDataURL(file);
    }
});

btnUpload.addEventListener('click', e => {
    e.preventDefault();

    if(!formUpload.checkValidity()) {
        formUpload.reportValidity();
        btnUpload.previousElementSibling.innerHTML = "Video and Thumbnail can't be empty";
        btnUpload.previousElementSibling.classList.replace('hidden', 'flex');
        return;
    }

    const formData = new FormData(formUpload);
    formData.append('name', userSession);
    formData.append('title', videoTitle.value);
    formData.append('thumbnail', imageInput.files[0]);
    formData.append('video', videoInput.files[0]);


    fetch(appUrl+'upload', {
        method: 'post',
        headers: {
            'X-CSRF-Token': csrfToken,
        },
        body: formData
    })
    .then(res => {
        console.log(formData);
        if (res.ok) {
            console.log('Upload Success!');
            formUpload.reset();
            window.location.reload();
        } else {
            console.log('Error: Upload failed!');
        }
    })
});

// Login Method Overlay
loginMethodOverlayClose.addEventListener('click', () => {
    loginMethodOverlay.classList.replace('flex', 'hidden');
    alert('clicked')
    formLoginMethodOverlay.reset();
});
btnLoginWithEmail.addEventListener('click', () => {
    if(!formLoginMethodOverlay.checkValidity()) {
        formLoginMethodOverlay.reportValidity();
        return;
    }
    loginFormOverlay.classList.replace('hidden', 'flex');
    loginMethodOverlay.classList.replace('flex', 'hidden');
});

// Login Form Overlay
loginFormOverlayBack.addEventListener('click', () => {
    loginFormOverlay.classList.replace('flex', 'hidden');
    loginMethodOverlay.classList.replace('hidden', 'flex');
})
loginFormOverlayClose.addEventListener('click', () => {
    loginFormOverlay.classList.replace('flex', 'hidden');
    formLoginFormOverlay.reset();
});

let inputLoginValidation = () => {
    if(inputEmailLoginForm.value != "" && inputPasswordLoginForm.value != "") {
        btnLogin.removeAttribute('disabled');
        btnLogin.classList.replace('bg-blue-300', 'bg-blue-500');
        btnLogin.classList.replace('cursor-not-allowed', 'cursor-pointer');
    } else {
        btnLogin.setAttribute('disabled', '');
        btnLogin.classList.replace('bg-blue-500', 'bg-blue-300');
        btnLogin.classList.replace('cursor-pointer','cursor-not-allowed');
    }
};
inputEmailLoginForm.addEventListener('input', inputLoginValidation);
inputPasswordLoginForm.addEventListener('input', inputLoginValidation);

let emailValidation = (e, form, inputEmail) => {
    e.preventDefault();

    if(!inputEmail.value.includes('@')) {
        inputEmail.nextElementSibling.classList.replace('hidden', 'flex');
        inputEmail.nextElementSibling.innerHTML = "Invalid email address!";
    } else {
        inputEmail.nextElementSibling.classList.replace('flex', 'hidden');
    }
    if(!form.checkValidity()) {
        form.reportValidity();
        return;
    }
}

btnLogin.addEventListener('click', e => {
    emailValidation(e, formLoginFormOverlay, inputEmailLoginForm)

    fetch(document.URL+'login', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            email: inputEmailLoginForm.value,
            password: inputPasswordLoginForm.value,
        })
    })
    .then((res) => {
        if(!cbAgreeTosPpLoginForm.checked) {
            console.log(cbAgreeTosPpLoginForm.checked)
            formLoginFormOverlay.firstElementChild.innerHTML = 'Please check Terms of Services & Privacy Policy';
            formLoginFormOverlay.firstElementChild.classList.replace('hidden', 'flex');
            return
        }
        if (res.ok) {
            window.location.reload();
            return
        } else {
            console.log(cbAgreeTosPpLoginForm.checked)
            console.log(inputEmailLoginForm.value)
            console.log(inputPasswordLoginForm.value)
            console.error('Validation Error!');
            formLoginFormOverlay.firstElementChild.innerHTML = 'Invalid Email or Password!'
            formLoginFormOverlay.firstElementChild.classList.replace('hidden', 'flex');
            regForm.reset();
            return
        }
    })
});


// Register Overlay
let validateStepOne = () => {
    if(regPassword.value != "" && regEmail.value != "") {
        regConfirmPassword.removeAttribute('disabled');
        regConfirmPassword.classList.replace('cursor-not-allowed', 'cursor');
        regConfirmPassword.value = "";
    } else {
        regConfirmPassword.setAttribute('disabled', '');
        regConfirmPassword.classList.replace('cursor', 'cursor-not-allowed');
        regConfirmPassword.value = "";
    }
}

let validateStepTwo = () => {
    if(regConfirmPassword.value != "" && regConfirmPassword.value == regPassword.value && regConfirmPassword.value.length >= 8) {
        regVerifCode.removeAttribute('disabled');
        regVerifCode.classList.replace('cursor-not-allowed', 'cursor');
        regSendCode.removeAttribute('disabled');
        regSendCode.classList.replace('cursor-not-allowed', 'cursor-pointer');
        regSendCode.classList.replace('bg-blue-300', 'bg-blue-400');
    } else {
        regVerifCode.setAttribute('disabled', '');
        regVerifCode.classList.replace('cursor', 'cursor-not-allowed');
        regVerifCode.value = "";
        regSendCode.setAttribute('disabled', '');
        regSendCode.classList.replace('cursor-pointer', 'cursor-not-allowed');
        regSendCode.classList.replace('bg-blue-400', 'bg-blue-300');
    }
}

let validateStepThree = () => {
    if(regVerifCode.value != "") {
        btnReg.removeAttribute('disabled');
        btnReg.classList.replace('cursor-not-allowed', 'cursor-pointer');
        btnReg.classList.replace('bg-blue-300', 'bg-blue-400');
    } else {
        btnReg.setAttribute('disabled', '');
        btnReg.classList.replace('cursor-pointer', 'cursor-not-allowed');
        btnReg.classList.replace('bg-blue-400', 'bg-blue-300');
    }
}

regEmail.addEventListener('input', validateStepOne);
regPassword.addEventListener('input', validateStepOne, validateStepTwo);
regConfirmPassword.addEventListener('input', validateStepTwo);
regVerifCode.addEventListener('input', validateStepThree);

regBack.addEventListener('click', () => {
    regOverlay.classList.replace('flex', 'hidden');
    regForm.reset();
    loginMethodOverlay.classList.replace('hidden', 'flex');
});

regClose.addEventListener('click', () => {
    regOverlay.classList.replace('flex', 'hidden');
    regForm.reset();
})

regSendCode.addEventListener('click', e => {
    setTimeout(() => {
        document.querySelector('meta[name="rand-token"]').setAttribute('content', Math.random().toString(36).substring(2, 7).toUpperCase());
    }, 10000);
    let email = regEmail.value;

    e.preventDefault();
    let baseUrl = document.URL;
    fetch(baseUrl+'getsignuptoken', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            email: email,
            token: randToken
        })
    });
    regSendCode.parentElement.nextElementSibling.innerHTML = 'Code sent, check your email!';
    regSendCode.parentElement.nextElementSibling.classList.replace('hidden', 'flex');

    fetch(document.URL+'savesignuptoken', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            email: email,
            token: randToken
        })
    });

    regSendCode.setAttribute('disabled', '');
    regSendCode.classList.replace('bg-blue-600', 'bg-blue-300');
    regSendCode.classList.replace('cursor-pointer', 'cursor-not-allowed');
    let count = 10;
    const sendCodeCooldown = setInterval(() => {  
        count--;
        regSendCode.innerHTML = count;
        if(!count > 0) {
            regSendCode.removeAttribute('disabled');
            regSendCode.classList.replace('bg-blue-300', 'bg-blue-600');
            regSendCode.innerHTML = "Resend Code";
            regSendCode.classList.replace('cursor-not-allowed', 'cursor-pointer');
            clearInterval(sendCodeCooldown);
        }
    }, 1000);
});

btnReg.addEventListener('click', e => {
    emailValidation(e, regForm, regEmail)

    e.preventDefault();

    fetch(document.URL+'getregistertoken', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            email: regEmail.value,
        })
    }).then((res) => {
        return res.json();
    }).then((json) => {
        console.log(json[0].token)
        console.log(regVerifCode.value)
        if(regVerifCode.value == json[0].token) {
            console.log('login success');
            
            // Register Request
            fetch(document.URL+'register', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email: regEmail.value,
                    password: regPassword.value,
                    confirmPassword: regConfirmPassword.value,
                })
            }).then((res) => {
                if (res.ok) {
                    return res.json();
                }
                throw new Error('Something went wrong');
            })
            .then((json) => {
                console.log(json.message)
                if(cbAgreeTosPpRegisterForm.checked) {
                    document.location.href = '/';
                } else {
                    regForm.firstChild.nextElementSibling.nextElementSibling.innerHTML = 'Please check Terms of Services & Privacy Policy'
                }
            })
            .catch((err) => {   
                console.error('Validation Error!', err);
                regForm.firstChild.nextElementSibling.nextElementSibling.innerHTML = 'Validation Error!'
                regForm.firstChild.nextElementSibling.nextElementSibling.classList.replace('hidden', 'flex');
                regForm.reset();
            });

        } else {
            console.error('login failed');
            regSendCode.parentElement.nextElementSibling.innerHTML = "Code Missmatch, check your mail or resend code!"
            regSendCode.parentElement.nextElementSibling.classList.replace('text-gray-400', 'text-red-500');
        }
    })
    
});