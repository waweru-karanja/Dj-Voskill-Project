

    function readURL(input){
        if (input.files && input.files[0]){
            var reader= new FileReader();
                reader.onload=function (e){
                    $('#pro_image')
                    .attr('src',e.target.result);
                };
            reader.readAsDataURL(input.files[0]);
            }
             
        }



    //Upload Progress Bar 
    // const uploadform=document.getElementById("uploadform");
    // const pro_image=document.getElementById("pro_image");
    // const progressBarFill=document.queryselector("#ProgressBar >.progress-bar-fill");
    // const ProgressBarText=ProgressBarFill.queryselector("#ProgressBar >.progress-bar-text");
        
    // uploadform.addEventListener("submit",uploadfile);

    // function uploadfile (e){
    //     e.preventDefault();
    //     const xhr= new XMLHttpRequest();

    //     xhr.open("POST","products.store");
    //     xhr.upload.addEventListener("progress",e=>{
    //         const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
    //         progressBarFill.style.width = percent.toFixed(2) + "%";
    //         progressBarText.textContent = percent.toFixed(2) + "%";
    //     });
    //     xhr.setRequestHeader("Content-Type","multipart/form-data");
    //     xhr.send(new FormData(uploadform));
    // }

             //for the audio player
        let play = document.querySelector('#play');
        let recent_volume= document.querySelector('#volume');
        let slider = document.querySelector('#duration_slider');
        let show_duration = document.querySelector('#show_duration');
        
        let timer;
let autoplay = 0;

let index_no = 0;
let Playing_song = false;

//create a audio Element
let track = document.createElement('audio');


//All songs list
let All_song = [
   {
     name: "first song",
     path: "music/song1.mp3",
     img: "img/img1.jpg",
     singer: "1"
   },
   {
     name: "second song",
     path: "music/song2.mp3",
     img: "img/img2.jpg",
     singer: "2"
   },
   {
     name: "third song",
     path: "music/song3.mp3",
     img: "img/img3.jpg",
     singer: "3"
   },
   {
     name: "fourth song",
     path: "music/song4.mp3",
     img: "img/img4.jpg",
     singer: "4"
   },
   {
     name: "fifth song",
     path: "music/song5.mp3",
     img: "img/img5.jpg",
     singer: "5"
   }
];


// All functions


// function load the track
function load_track(index_no){
	clearInterval(timer);
	reset_slider();

	track.src = All_song[index_no].path;
	title.innerHTML = All_song[index_no].name;	
	track_image.src = All_song[index_no].img;
    artist.innerHTML = All_song[index_no].singer;
    track.load();

	timer = setInterval(range_slider ,1000);
	total.innerHTML = All_song.length;
	present.innerHTML = index_no + 1;
}

load_track(index_no);


//mute sound function
function mute_sound(){
	track.volume = 0;
	volume.value = 0;
	volume_show.innerHTML = 0;
}


// checking.. the song is playing or not
 function justplay(){
 	if(Playing_song==false){
 		playsong();

 	}else{
 		pausesong();
 	}
 }


// reset song slider
 function reset_slider(){
 	slider.value = 0;
 }

// play song
function playsong(){
  track.play();
  Playing_song = true;
  play.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
}

//pause song
function pausesong(){
	track.pause();
	Playing_song = false;
	play.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
}

// change volume
function volume_change(){
	volume_show.innerHTML = recent_volume.value;
	track.volume = recent_volume.value / 100;
}

// change slider position 
function change_duration(){
	slider_position = track.duration * (slider.value / 100);
	track.currentTime = slider_position;
}


function range_slider(){
	let position = 0;
        
        // update slider position
		if(!isNaN(track.duration)){
		   position = track.currentTime * (100 / track.duration);
		   slider.value =  position;
	      }
     }

$(document).ready(function() {
  $('#admindatatables').DataTable();
});

