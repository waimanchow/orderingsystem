let index = 1;
display(index);

function addSlides(n) {
  display(index += n);
}

function screenSlides(n) {
  display(index = n);
}

function display(n) {
  let j;
  //get the element from the html
  let picture = document.getElementsByClassName("slides");
  if (n > picture.length) {index = 1}    
  if (n < 1) {index = picture.length}
  for (j = 0; j < picture.length; j++) {
    picture[j].style.display = "none";  
  }
  picture[index-1].style.display = "block";  

}