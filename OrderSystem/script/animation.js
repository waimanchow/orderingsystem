var canvas = document.getElementById("myCanvas");
var c = canvas.getContext('2d');

//use array to store pictures
var images = [];
images.length = 5;

//for loop for adding pictures
for(var i = 1 ; i < images.length ; i++){
    images[i] = new Image();
    images[i].src = 'img/animation' + i.toString() + '.jpg';

}
var i = 1;

const myInterval = setInterval(myTimer,1500);


//character running
function myTimer(){
    i++;
    if( i >= 5){
        i = 1;
    }
  
    c.drawImage(images[i],0,0,1200,380);

}







