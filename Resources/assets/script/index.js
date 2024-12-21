// Get Image Se Form De base64 code
let image ;
function getImage(){
    let input = document.getElementById("file")
    let imageOutput = document.getElementById("imageOutput")
    const file = input.files[0]
    // Use FileReader to read the file and generate a URL
    const reader = new FileReader();
    reader.onload = function(e) {
        // Set the image src to the file URL
        image = e.target.result;
        if (imageOutput) {
            imageOutput.src = image
        }
    }
    reader.readAsDataURL(file);
}


// Load Table With All Data From table.php To The Index File
function loadtable() {
    document.querySelector(".functionBar").classList.remove("hidden")
    document.querySelector(".BannerTitle").innerHTML = "Players ffInformations"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "table.php");
    xhttp.send();
}


// Load Dashboard Content With To The Index File without refreshing The Page
function loadDashboard() {
    document.querySelector(".BannerTitle").innerHTML = "Dashboard"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
        
    }
    xhttp.open("GET", "./Players/Page/Dashboard.php");
    xhttp.send();
    
}

// Load Staduim
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

//---------------------------------------Add Player Section-------------------------------------------//
// Change The Content Of The Page To The Page Add Player For Adding Player To Database
function AddPlayer() {
    document.querySelector(".BannerTitle").innerHTML = "Add Player"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "./Players/Add/Add Player.php");
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

// Function That Execute The Add Player File Php To Add A New Player With All Data That Inserted From The user
function AddThisPlayer(method) {
    if (checkOptimale()) {
        var input_image = document.getElementById("file").files
        if (regexImg(input_image)) {
            data = {
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
                p_Rating : document.getElementById("playerRating").value,
                p_image : image
            }
            $.ajax({
                type: "POST",
                url: "./Players/Add/AddThisPlayer.php",
                data : {
                    p_name : data.p_name,
                    nation : data.nation,
                    Club : data.Club,
                    position : data.position,
        
                    DivPace : data.DivPace,
                    HandShot : data.HandShot,
                    KickPassing : data.KickPassing,
                    RefDrib : data.RefDrib,
                    SpeedDeff : data.SpeedDeff,
                    PositionPc : data.PositionPc,
                    p_Rating : data.p_Rating,
                    p_image : data.p_image
                } ,
                success: function(response) {
                    if (method === "update") {
                        loadDashboard()
                        console.log(response)
        
        
                    }else{
                        AddPlayer()
                        setTimeout(()=>{
                            document.getElementById("alertMSG").classList.remove("hidden")
                            setTimeout(()=>{
                                document.getElementById("alertMSG").classList.add("hidden")
                            },3000)
                        },500)
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error archiving player:", error);
                    alert("Error archiving player.");
                }
            });
        }else{
            alert("Please , Add The Image !")
        }
    }else{
        alert("there is a problem on the input !")
    }

}

//---------------------------------------Delete Player Section-------------------------------------------//
function deleteThisPlayer(id) {
    $.ajax({
        type: "GET",
        url: "./Players/Delete/deleteThisPlayer.php",
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
//----------------------------------------------------------------------------------------------------//

//---------------------------------Archive & Restore Player Section-----------------------------------//
// Load Archive With All Archived Players From Archive.php To The Index File without refreshing The Page
function loadArchive() {
    document.querySelector(".BannerTitle").innerHTML = "Archived Players"
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "./Players/Archive/Archive.php");
    xhttp.send();
}

function archiveThisPlayer(id) {
    $.ajax({
        type: "GET",
        url: "./Players/Archive/ArchiveThisPlayer.php",
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
        url: "./Players/Restore/RestoreThisPlayer.php",
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
//----------------------------------------------------------------------------------------------------//

// Function For Regex If it return True so thats means all good 
function checkOptimale(){
    data = {
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
        p_Rating : document.getElementById("playerRating").value,
        p_image : image,
    }
    if (regex(data.p_name) && regexN(data.DivPace) && regexN(data.HandShot) && regexN(data.KickPassing) && regexN(data.RefDrib) 
        && regexN(data.SpeedDeff) && regexN(data.PositionPc) && regexN(data.p_Rating) ) { 
        data = {}
        return true 
    }
    else{
        data = {}
        return false
    }

}

//---------------------------------Update Player Section-----------------------------------//
function updatePlayer(id){
    if (checkOptimale()) {
        $.ajax({
            type: "POST",
            url: "./Players/Modification/updateThisPlayerPer.php",
            data: {
                id : id ,
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
                p_Rating : document.getElementById("playerRating").value,
                p_image : image
            } ,
            success: function(response) {
                loadDashboard()
                setTimeout(()=>{
                    document.getElementById("alertMSG").classList.remove("hidden")
                    setTimeout(()=>{
                        document.getElementById("alertMSG").classList.add("hidden")
                    },3000)
                },500)
            },
            error: function(xhr, status, error) {
                setTimeout(()=>{
                    document.getElementById("alertMSG").classList.remove("hidden")
                    setTimeout(()=>{
                        document.getElementById("alertMSG").classList.add("hidden")
                    },3000)
                },500)
            }
        });
    }else{
        alert("there is a problem on the input")
    }
}

function updateThisPlayer(id) {
        $.ajax({
            type: "POST",
            url: "./Players/Modification/updateThisPlayer.php",
            data: {
                id : id
            },
            success: function(response) {
                document.querySelector(".BannerTitle").innerHTML = "Update Player"
                document.getElementById("demo").innerHTML = response
            },
            error: function(xhr, status, error) {
                console.log("Error archiving player:", error);
                alert("Error 11 archiving player.");
            }
        });
}
//----------------------------------------------------------------------------------------------------//

// Filter Function
function showFiltredData(){
        
        document.querySelector(".BannerTitle").innerHTML = "Dashboard (filtered by rating)"
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML =
            this.responseText;
        }
        xhttp.open("GET", "./Players/Filter/showFiltredData.php");
        xhttp.send();
}

// Search Part
$('#playerSearcher').on('input', function() {
    var searchText = $(this).val(); 

    
    if (searchText != "") {
        $.ajax({
            url: './Players/Search/PlayerLiveSearch.php', 
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

$("#closeAlertMSG").on("click",()=>{
    document.getElementById("alertMSG").classList.add("hidden")

})
