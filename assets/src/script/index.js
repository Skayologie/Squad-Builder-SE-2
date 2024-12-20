
let image ;

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
                    url: "AddThisPlayer.php",
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
                            console.log(response)
                            alert(response)
                            
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
 
function updatePlayer(id){
    if (checkOptimale()) {
        $.ajax({
            type: "POST",
            url: "updateThisPlayerPer.php",
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
            },
            error: function(xhr, status, error) {
                console.error("Error archiving player:", error);
                alert("Error archiving player.");
            }
        });
    }else{
        alert("there is a problem on the input")
    }
}


function updateThisPlayer(id) {
        $.ajax({
            type: "POST",
            url: "updateThisPlayer.php",
            data: {
                id : id
            },
            success: function(response) {
                document.querySelector(".BannerTitle").innerHTML = "Update Player"
                document.getElementById("demo").innerHTML = response
            },
            error: function(xhr, status, error) {
                console.error("Error archiving player:", error);
                alert("Error archiving player.");
            }
        });
    }


function showFiltredData(){
        
        document.querySelector(".BannerTitle").innerHTML = "Dashboard (filtered by rating)"
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML =
            this.responseText;
        }
        xhttp.open("GET", "showFiltredData.php");
        xhttp.send();
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

