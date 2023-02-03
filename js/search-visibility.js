const searchElement = document.querySelector(".user .search");

const searchBar = document.querySelector(".user .search input");
const searchButton = document.querySelector(".user .search button");

searchElement.onmouseover = () => {
    searchButton.classList.toggle("active");
    searchBar.classList.toggle("active");
}

searchElement.onmouseout = () => {
    searchButton.classList.remove("active");
    searchBar.classList.remove("active");
}
