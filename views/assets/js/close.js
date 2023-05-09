const popupSearch = document.getElementById("my-popupS");
document.addEventListener("click", function(event) {
    if (event.target !== popupSearch && !popupSearch.contains(event.target)) {
        document.getElementById("demo").style.display = "none";
    }
});