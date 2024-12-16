
function loadtable() {
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
function loadArchive() {
    // document.querySelector(".functionBar").classList.remove("hidden")
    document.querySelector(".BannerTitle").innerHTML = "Archived Players"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "Archive.php");
    xhttp.send();
}
function loadDashboard() {
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
//------------------------------------------------------------------



// ------------------------Submit info-------------------------//
    // setTimeout(()=>{
    //     document.getElementById("SubmitPlayer").onclick = function() {
    //         let formdata = {
    //             playerName : document.getElementById("player_name").value,
    //             playerCountr : document.getElementById("results-nations").value,
    //             playerClub : document.getElementById("results-Club").value,
    //             playerPosition : document.getElementById("results-position").value,
    //             playerRating : document.getElementById("ratingRes").value
    //         }
           
    //         if (playerName != "") {
    //             $.ajax({
    //                 url: 'submitPlayer.php', // The PHP script to process the search
    //                 method: 'POST',
    //                 data: formdata ,
    //                 success: function () {
    //                     alert("Submited Succeffully")
    //                 },error: function () {
    //                     alert("An error occurred while adding the player.");
    //                 }


                

    //             });
    //         } else {
    //             loadDashboard(); // If the search box is empty, clear the results
    //         }
    //     }
    //     },500);
}

function deleteThisPlayer(id) {
    $.ajax({
        type: "GET",
        url: "deleteThisPlayer.php",
        data: {id : id} ,
        success: function(response) {
            loadArchive();
        },
        error: function(xhr, status, error) {
            console.error("Error archiving player:", error);
            alert("Error archiving player.");
        }
    });
}

function archiveThisPlayer(id) {
    $.ajax({
        type: "GET",
        url: "ArchiveThisPlayer.php",
        data: {id : id} ,
        success: function(response) {
            loadDashboard();
        },
        error: function(xhr, status, error) {
            console.error("Error archiving player:", error);
            alert("Error archiving player.");
        }
    });
}

function restoreThisPlayer(id) {
    $.ajax({
        type: "GET",
        url: "RestoreThisPlayer.php",
        data: {id : id} ,
        success: function(response) {
            loadArchive();
        },
        error: function(xhr, status, error) {
            console.error("Error archiving player:", error);
            alert("Error archiving player.");
        }
    });
}

function AddThisPlayer() {
    $.ajax({
        type: "POST",
        url: "AddThisPlayer.php",
        data: {
            p_name : document.getElementById("player_name").value,
            nation : document.getElementById("results-nations").value,
            Club : document.getElementById("playerClub").value,
            position : document.getElementById("playerPosition").value,

            DivPace : document.getElementById("divingpace").value,
            HandShot : document.getElementById("handlingShoting").value,
            KickPassing : document.getElementById("kickingpassing").value,
            RefDrib : document.getElementById("RefDribb").value,
            SpeedDeff : document.getElementById("speedDeff").value,
            PositionPc : document.getElementById("PositioningPhisical").value,
            p_Rating : document.getElementById("playerRating").value
        } ,
        success: function(response) {
            console.log(response)
            AddPlayer()
        },
        error: function(xhr, status, error) {
            console.error("Error archiving player:", error);
            alert("Error archiving player.");
        }
    });
}





 
 $('#playerSearcher').on('input', function() {
    var searchText = $(this).val(); 

    
    if (searchText != "") {
        $.ajax({
            url: 'PlayerLiveSearch.php', 
            method: 'GET',
            data: { searchText: searchText },
            success: function(response) {
                $('#playerSearchResult').html(response); 
            }
        });
    } else {
        loadDashboard(); 
    }
});

