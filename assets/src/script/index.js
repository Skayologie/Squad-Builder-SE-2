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

function AddPlayer() {
    document.querySelector(".BannerTitle").innerHTML = "Add Player"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "Add Player.php");
    xhttp.send();
// ------------------------Clubs Search-------------------------//
    setTimeout(()=>{
        const searchBarClub = document.getElementById("default-search-clubs")
        const resultsClub = document.getElementById("results-clubs")
        searchBarClub.addEventListener("keyup",(e)=>{
            var inputClub = e.target.value ;
            if (inputClub != "") {
                $.ajax({
                    type: "GET",
                    url: "ClubsLiveSearch.php",
                    data: {inputClub:inputClub},
                    success: function (response) {
                        resultsClub.innerHTML = response;
                    }
                });
            }else{
                resultsClub.innerHTML="";
            }
        })
        searchBarClub.addEventListener("blur",(e)=>{
             resultsClub.innerHTML="";
        })
    },500)


// ------------------------Nations Search-------------------------//
    setTimeout(()=>{
        const searchBar = document.getElementById("results-nations")
        const results = document.getElementById("hereres")
        document.addEventListener("click",()=>{
                var input = "machi" ;
                $.ajax({
                    type: "GET",
                    url: "NationsLiveSearch.php",
                    data: {input:input},
                    success: function (response) {
                        results.innerHTML = response;
                    }
                });
           
    },500)})


    

}




// $(document).ready(function(){
//     $("#default-search").click(
//         function(){
//             var input = $(this).val();
//             alert(input)
//         }
//     )
// })
