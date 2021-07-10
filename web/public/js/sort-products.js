let sortList = document.getElementById('sort-list');
let sortTable = document.getElementById('sort-table');
let resultWrapper = document.querySelector('.result__wrapper');

// Sort by list
sortList.onclick = (e) => {
	e.preventDefault();
	sortList.classList.add('active');
	sortTable.classList.remove('active');
	resultWrapper.classList.add('list');
}

// Sort by table
sortTable.onclick = (e) => {
	e.preventDefault();
	sortTable.classList.add('active');
	sortList.classList.remove('active');
	resultWrapper.classList.remove('list');
}