function refreshMessenger(){ 

$.ajax({ 
    type: "GET", url: "refresh.php", data: "action=refresh", success: function(msg){ 
        document.getElementById("Tchat").innerHTML = msg; } 
    }); 

setTimeout("refreshMessenger()",10); 

} 
