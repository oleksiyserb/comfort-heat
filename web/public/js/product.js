let staticImage = document.getElementById('static-image');
let dynamicImages = document.getElementsByClassName('dynamic-image');

for (let i = 0; i < dynamicImages.length; i++) {
    dynamicImages[i].addEventListener("click", function() {
        let image = this.childNodes[1].getAttribute('src');
        let bigImage = staticImage.childNodes[1];

        staticImage.innerHTML = '<img src="' + image + '">';
    });
}

// ----------------------------------------Slider Swiper----------------------------------------------------------------

new Swiper('.modal__slider-container', {
    // Arrows
    navigation: {
        nextEl: '.modal__slider-next',
        prevEl: '.modal__slider-prev'
    },

    // Pagination
    pagination: {
        el: '.swiper-pagination',

        type: 'fraction',
    },
});