// JavaScript Document
// Get the modal
var modal = document.getElementById('myModal');

// caption content
var x = "We understand the fact that different students learn at different speed. If it has been so easy for students, they would have learnt it all even without the help of teachers. Fortunately, we do not only make learning easy and fun but we are also patient and committed to ensuring the student involved learns no matter how sooner or later. It is passion not just work."

var y = "In times like this, like in the days of the flood, even those at the highest mountain will get drowned except those who rise with the flood. Even though our teachers are so qualified and experienced, they are subject to acquiring more knowledge constantly, to teach you better and keep you updated. Why struggle again to learn. We have struggled for you. Just learn with ease."

var z = 'Though our services worth more than gold, and is of high standard, we offer them at affordable prices.Our prices ranges from as a little as N2,500 per month to as much as N30,000 per month.<a href="./register.php" class="link"> Register online</a> or in our <span title="El-shaddai plaza, China town, Ogui road, Enugu." style="color:brown">office</span> for more details and payment. Registration is always free'



// Get the image and insert it inside the modal - use its "alt" text as a caption
var mymod1 = document.getElementById('mymod1');
var mymod2 = document.getElementById('mymod2');
var mymod3 = document.getElementById('mymod3');
var mymod4 = document.getElementById('mymod4');

var captionText = document.getElementById("caption");
mymod1.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = x ;
}
mymod2.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = y ;
}
mymod3.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod4.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
