import './bootstrap';

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

const jstophpvar = () => {
    fetch('/', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ breakPoints: breakPoints })
        })
        .then(response => response.json())
        .then(data => {
            // Handle response from PHP
    });
}

// window.addEventListener('resize', () => {
//     // const width = window.innerWidth;
//     fetch('/', {
//             method: 'GET',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({ breakPoints: breakPoints })
//         })
//         .then(response => response.json())
//         .then(data => {
//             // Handle response from PHP
//     });
// })


hamMenu.addEventListener('click', () => {
    aside.classList.contains('w-18') ? aside.classList.replace('w-18', 'w-68') : aside.classList.replace('w-68', 'w-18');
    footer.classList.toggle('invisible');
    navs.forEach(nav => {
        nav.classList.toggle('flex-col');
        nav.classList.toggle('gap-4');
        nav.children[1].classList.toggle('text-xs');
    });
});

