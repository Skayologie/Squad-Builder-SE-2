const SideBtn = document.querySelectorAll(".SideBtn")
const active = document.querySelectorAll(".active-nav-link")
function loadtable() {
    document.querySelector(".SideBtnTable").classList.add("active-nav-link")
    document.querySelector(".SideBtnDash").classList.remove("active-nav-link")
    document.querySelector(".SideBtnStad").classList.remove("active-nav-link")
    document.querySelector(".functionBar").classList.remove("hidden")
    document.querySelector(".BannerTitle").innerHTML = "Players Informations"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "table.php");
    xhttp.send();
}
function loadDashboard() {
    document.querySelector(".SideBtnTable").classList.remove("active-nav-link")
    document.querySelector(".SideBtnDash").classList.add("active-nav-link")
    document.querySelector(".SideBtnStad").classList.remove("active-nav-link")
    document.querySelector(".functionBar").classList.remove("hidden")
    document.querySelector(".BannerTitle").innerHTML = "Dashboard"

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "Dashboard.php");
    xhttp.send();
}
function loadstad() {
    document.querySelector(".functionBar").classList.add("hidden")
    document.querySelector(".SideBtnTable").classList.remove("active-nav-link")
    document.querySelector(".SideBtnDash").classList.remove("active-nav-link")
    document.querySelector(".SideBtnStad").classList.add("active-nav-link")
    document.querySelector(".BannerTitle").innerHTML = "Stadium"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "stadium.php");
    xhttp.send();
}