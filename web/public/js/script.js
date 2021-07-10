let burger = document.getElementById('burger-menu');
let menu = document.getElementById('menu');
let closed = document.getElementById('menu-close');
let body = document.getElementById('body');

burger.onclick = (e) => {
	e.preventDefault();
	open();
};

closed.onclick = (e) => {
	e.preventDefault();
	close();
};

// Open menu
function open() {
	menu.classList.add("menu-opened");
	body.classList.add("overflow--hidden")
}

// Close menu
function close() {
	menu.classList.remove("menu-opened");
	body.classList.remove("overflow--hidden");
}

// -----------------------------------------Subcategory list-------------------------------------------------------------

let dropdown = document.getElementsByClassName('dropdown-btn');

for (let i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener("click", function(e) {
		e.preventDefault();
		this.classList.toggle("active");
		let dropdownContent = this.nextElementSibling;

		if (dropdownContent.style.display === "block") {
			dropdownContent.style.display = "none";
		} else {
			dropdownContent.style.display = "block";
		}
	});
}

// ----------------------------------------Open text--------------------------------------------------------------------

// Buttons
let description = document.getElementById('description');
let technical = document.getElementById('technical');
// Text
let descriptionText = document.querySelector('.product__text');
let technicalText = document.querySelector('.product__technical');

technical.onclick = (e) => {
	e.preventDefault();

	technical.classList.add('active');
	description.classList.remove('active');
	descriptionText.style.display = "none";
	technicalText.style.display = "block";
}

description.onclick = (e) => {
	e.preventDefault();

	description.classList.add('active');
	technical.classList.remove('active');
	descriptionText.style.display = "block";
	technicalText.style.display = "none";
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