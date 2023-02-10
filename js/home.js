const searchElement = document.querySelector(".user .search"),
  searchBar = document.querySelector(".user .search input"),
  searchButton = document.querySelector(".user .search button"),
  usersList = document.querySelector(".user .users");

searchElement.onmouseover = () => {
  searchButton.classList.toggle("active");
  searchBar.classList.toggle("active");
};

searchElement.onmouseout = () => {
  searchButton.classList.remove("active");
  searchBar.classList.remove("active");
};

searchBar.onkeyup = () => {
  let query = searchBar.value;
  if (query != "") {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          usersList.innerHTML = data;
        }
      }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("query=" + query);
  }
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 1000);
