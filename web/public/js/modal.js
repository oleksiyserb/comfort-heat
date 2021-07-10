// Menu
let modalMenu = document.getElementById('modal-menu');
// Mobile
let modalClose = document.getElementById('modal-close');
let modalCatalog = document.getElementById('burger-catalog');
// Laptop
let modalLaptop = document.getElementById('modal-laptop');
let closeLaptop = document.getElementById('close-laptop');
// Search
let searchButton = document.getElementById('search-button');
let searchMenu = document.getElementById('search-menu');
let searchIcon = document.getElementById('search-icon');

//
// ---------------Mobile-------------------
//

// Burger catalog button
modalCatalog.onclick = (e) => {
	e.preventDefault();
	visible();
}

// Burger close button
modalClose.onclick = (e) => {
	e.preventDefault();
	unVisible();
}

function visible() {
	modalMenu.classList.add("catalog-visible");
}

function unVisible() {
	modalMenu.classList.remove("catalog-visible");
}

//
// ---------------Laptop-------------------
//

// Burger Laptop button when window > 768px
modalLaptop.onclick = (e) => {
	e.preventDefault();
	laptopVisible();
}

closeLaptop.onclick = (e) => {
	e.preventDefault();
	laptopUnvisible();
}

function laptopVisible() {
	modalMenu.classList.add("catalog-visible");
	body.classList.add("overflow--hidden");
}

function laptopUnvisible() {
	modalMenu.classList.remove("catalog-visible");
	body.classList.remove("overflow--hidden");
}

//
// ---------------Search-------------------
//

searchButton.onclick = (e) => {
	e.preventDefault();
	search();
}

searchIcon.onclick = (e) => {
	unvisivleSearch();
}

function search() {
	searchMenu.classList.add("open")
	body.classList.add("overflow--hidden");
}

function unvisivleSearch() {
	searchMenu.classList.remove("open")
	body.classList.remove("overflow--hidden");
}

// -------------------------------------------Product-----------------------------------------------------

let closeProduct = document.getElementById('close-product');
let modalProduct = document.getElementById('modal-product');

staticImage.onclick = (e) => {
	e.preventDefault();

	modalProduct.classList.add('open');
}

closeProduct.onclick = (e) => {
	e.preventDefault();

	modalProduct.classList.remove('open');
}