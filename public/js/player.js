
function play(i){
        
            var Player = document.getElementById('player-' +i);
            ActivePlayer = i;
            var ControlBtn = document.getElementById('control-icon-'+i);
            if(ControlBtn.innerHTML == 'pause'){
                Player.pause();
                ControlBtn.innerHTML = "play_arrow";
                changeCurrentTime(i);
            }
            else{
                Player.play();
                ControlBtn.innerHTML = "pause";
                changeCurrentTime(i);
            }
        
        
        
        
    
    

}

function setupTime(i){
    var Player = document.getElementById('player-'+i);
     document.getElementById('currentTimeSong-'+i).innerHTML= Player.currentTime + ":00";
     document.getElementById('durationTimeSong-'+i).innerHTML= parseInt(Player.duration /60) %60 + ":" + (Player.duration %60).toFixed();
    
}

function changeCurrentTime(i){
    var Player = document.getElementById('player-'+i);
    document.getElementById('currentTimeSong-'+i).innerHTML= parseInt(Player.currentTime / 59) %59 + ":" + (Player.currentTime %59).toFixed();
}





