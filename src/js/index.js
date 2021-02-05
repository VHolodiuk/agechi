window.addEventListener('DOMContentLoaded', function() {
    new fullpage('#main', {
        anchors: ['home', 'about', 'jobs', 'teams'],
        lockAnchors: false,
        parallax: true
    });
})
window.addEventListener('load', function() {
    slider();
    imageSlider();
    showPopup();
    activeMenu();
    showFullJob();
    animation();
})
window.addEventListener('resize', function() {
    jQuery('.jobs .slider-wrapper').slick('unslick');
    jQuery('.teams .slider-wrapper').slick('unslick');
    slider();
    imageSlider();
})
window.onhashchange = function() { 
    const list = document.querySelectorAll('header .menu-item a');
    const currentURL = window.location.href;
    const pages = document.querySelector('footer .pages');
    const number = pages.querySelector('.number');
    const name = pages.querySelector('.name');
    let num = 0, id = 1;

    list.forEach(element => {
        element.classList.remove("active");
        if (currentURL == element.href) {
            element.classList.add('active');
            
        }
    });
    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        if (element.classList.contains("active")) {
            num = index + 2; 
            if (index == list.length - 1) {
                num = index + 1;
                id = 0;
            }
            number.innerHTML = "0" + num;
            name.innerHTML = list[index + id].innerHTML;
        }
    }
}

function imageSlider() {
    const images = document.querySelectorAll('.slider-wrapper .img-wrapper .img');
    
    images.forEach(element => {
        element.style.height = element.clientWidth + 'px';
    })
}

function slider() {
    jQuery('.jobs .slider-wrapper').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
            {
              breakpoint: 993,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
    });

    jQuery('.teams .slider-wrapper').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
            {
              breakpoint: 993,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
    });

}

function showFullJob() {
    const buttons = document.querySelectorAll('.jobs .slider-wrapper .more');
    const popup = document.querySelector('.job-full');

    const buttonWrapper = document.querySelector('header .button-wrapper');
    const close = buttonWrapper.querySelector('.close');
    const menu = document.querySelector('header .menu-items');

    buttons.forEach((element, index) => {
        element.addEventListener('click', function() {
            menu.classList.add('hidden');
            popup.classList.add('show');
            jQuery('.job-full .job-slider-wrapper').slick({
                infinite: false,
                arrows: true
            });
            jQuery('.job-full .job-slider-wrapper').slick('slickGoTo', index,  true);
            buttonWrapper.classList.add('show');
        })
    });
    
    close.addEventListener('click', function() {
        popup.classList.remove('show');
        buttonWrapper.classList.remove('show');
        menu.classList.remove('hidden');
        jQuery('.job-full .job-slider-wrapper').slick("unslick");
    })
    

}

function showPopup() {
    const buttonWrapper = document.querySelector('header .button-wrapper');
    const popup = document.querySelector('footer .popup');
    const get = buttonWrapper.querySelector(".button");
    const close = buttonWrapper.querySelector('.close');
    const menu = document.querySelector('header .menu-items');

    get.addEventListener('click', function() {
        menu.classList.add('hidden');
        popup.classList.add('show');
        buttonWrapper.classList.add('show');
    })
    close.addEventListener('click', function() {
        popup.classList.remove('show');
        buttonWrapper.classList.remove('show');
        menu.classList.remove('hidden');
    })

}

function activeMenu() {
    const list = document.querySelectorAll('header .menu-item a');
    const currentURL = window.location.href;
    const pages = document.querySelector('footer .pages');
    const number = pages.querySelector('.number');
    const name = pages.querySelector('.name');
    let num = 0, id = 1;


    if (String(currentURL.indexOf('#')) > -1) {
        list.forEach(element => {
            element.classList.remove("active");
            if (currentURL == element.href) {
                element.classList.add('active');        
            }
        });
    }
    else{
        list[0].classList.add('active');
    }


    for (let index = 0; index < list.length; index++) {
        const element = list[index];
        if (element.classList.contains("active")) {
            num = index + 2; 
            if (index == list.length - 1) {
                num = index + 1;
                id = 0;
            }
            number.innerHTML = "0" + num;
            name.innerHTML = list[index + id].innerHTML;
        }
    }

}

function animation() {
    const moveLeft = document.querySelectorAll('.move-left');
    const moveDown = document.querySelectorAll('.move-down');
    const moveRight = document.querySelectorAll('.move-right');
    const moveUp = document.querySelectorAll('.move-up');
    moveLeft.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const time = element.dataset.time;
            const long = element.dataset.long;
            element.style.transitionDuration = time + 's';
            element.style.transform = "translateX(-" + long + ")";
            setTimeout(() => {
                element.style.transform = "translateX(0%)";
            }, (Number(time) * 1000));
        })
    });
    moveRight.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const time = element.dataset.time;
            const long = element.dataset.long;
            element.style.transitionDuration = time + 's';
            element.style.transform = "translateX(" + long + ")";
            setTimeout(() => {
                element.style.transform = "translateX(0%)";
            }, (Number(time) * 1000));
        })
    });
    moveDown.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const time = element.dataset.time;
            const long = element.dataset.long;
            element.style.transitionDuration = time + 's';
            element.style.transform = "translateY(" + long + ")";
            setTimeout(() => {
                element.style.transform = "translateY(0%)";
            }, (Number(time) * 1000));
        })
    });
    moveUp.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const time = element.dataset.time;
            const long = element.dataset.long;
            element.style.transitionDuration = time + 's';
            element.style.transform = "translateY(-" + long + ")";
            setTimeout(() => {
                element.style.transform = "translateY(0%)";
            }, (Number(time) * 1000));
        })
    });
}