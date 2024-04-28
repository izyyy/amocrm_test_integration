
// add subject start ...
function pres(element) {
	 var i = element.id;
		var c = element.className;		
	   p = document.getElementById(i);
    var pp = p.parentNode;
	var pid = pp.id;
	var item = 'item'+pid;
	var pcN = pp.className;
	
	   	 r = document.getElementById(i);
		 if (r.innerHTML == '+Cart'){
			//window.alert(del);
			 // is  var xhttp; not missing?
  xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		//location.reload();
	//	document.getElementById(prod_id).innerHTML = this.responseText;;
		document.getElementById('cart_no').innerHTML = this.responseText;
		//document.getElementById(i).innerHTML = 'Added to cart';
 		//window.alert(uuu);
   }
  };
  //xhttp.open("GET", "gethint.php?ival="+st+"&dbrow="+a+"&dbcol="+z+"&fval="+str, true);
  xhttp.open("GET", "edit_cart.php?prod_id="+pid+"&prod_p="+pcN, true);
  xhttp.send();  
  	 r.innerHTML = 'xCart';
		 }	
	
	else if(r.innerHTML == 'xCart') {// code here!
	  var xhttp;
  xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		//location.reload();
	//	document.getElementById(prod_id).innerHTML = this.responseText;;
		document.getElementById('cart_no').innerHTML = this.responseText;;
 		//window.alert(uuu);
   }
  };
  //xhttp.open("GET", "gethint.php?ival="+st+"&dbrow="+a+"&dbcol="+z+"&fval="+str, true);
  xhttp.open("GET", "edit_cart.php?uns_id="+pid+"&uns_p="+pcN, true);
  xhttp.send();  
			 r.innerHTML = '+Cart';
			 }
	else { 
	var xhttp;
  xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		//location.reload();
	//	document.getElementById(prod_id).innerHTML = this.responseText;;
		document.getElementById(item).style.display = 'none';
 		//window.alert(uuu);
   }
  };
  //xhttp.open("GET", "gethint.php?ival="+st+"&dbrow="+a+"&dbcol="+z+"&fval="+str, true);
  xhttp.open("GET", "edit_cart.php?uns_id="+pid+"&uns_p="+pcN, true);
  xhttp.send();  }
	}
function myFunction() {
   x = document.getElementById("p");
   x.innerHTML = 'Application By:  EasyWork [RC:2602401]';
   x.style.color = '#333';
   x.style.fontSize = '20px';
   x.style.padding = '10px';
}
function inputsubject(adds) {
	as = adds.outerHTML;
	 var i = '<input id="inp1" type="text" style="width:100px" value="" onkeyup="addsubject(this, event)" \
	 ondblclick="addsubject2(this)"  />';
	 
	adds.innerHTML = i;
	document.getElementById('inp1').focus();
	/*b = window.screenY;
	alert(b);*/
}

function addsubject(subject, event) {
	su = subject.value;
	
	if (event.keyCode == 13) {
		  addsub();
          }
}
function addsubject2(subject) {
	su = subject.value;
		  addsub();
}


function addsub() {
	var subj = su;
	re = /^\w+$/;         
  // var re2 = /(?=.*\d)/;
   
    if(!re.test(subj)) { 
        alert("Subject can contain only letters, numbers or underscores.You must not add white spaces and other characters."); 
        
        return false; 
    }
	/* if(re2.test(subj)) { 
        alert('Subject can contain only letters, spaces or underscores. Please check your input'); 
        
        return false; 
    }*/
 
  var xhttp;
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
      document.getElementById("para").innerHTML = this.responseText;
	  		location.reload();

    }
  };
  xhttp.open("GET", "gethint.php?new_sub="+subj, true);
  xhttp.send(); 
 // document.getElementById('para').innerHTML = su +' '+'added successfully'; 
 document.getElementById('inpsub').outerHTML = as; 
  }
// ... add subject end! 


// add student start ...
function inputname(addn) {
	an = addn.outerHTML;
	var i = '<input id="inp" type="text" style="width:180px" onkeyup="addname(this, event)" ondblclick="addname2(this)"  />';
	addn.innerHTML = i;
	//document.getElementById('inp').value = stu;
	document.getElementById('inp').focus();
}
var an;
var stu;

function addname(student, event) {
	stud = student.value;
   if (event.keyCode == 13) {
		addnam();
      }
}

function addname2(student) {
	stud = student.value;
		  addnam();
}


function addnam() {
	var stu = stud; 
	
	re = /^(\w|\s)+$/; //text and space only   
   var re2 = /(?=.*\d)/; // contains at least one number!
   
   if(re2.test(stu)) { 
        alert('Name must not contain a number. Please check your input'); 
        
        return false; 
    }
   
    if(!re.test(stu)) { 
        alert("Name can contain only letters, spaces or underscores. Please check your input"); 
        
        return false; 
    }
	 
	
  var xhttp;
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
      document.getElementById("para").innerHTML = this.responseText;
		location.reload();
    }
  };
  xhttp.open("GET", "gethint.php?new_stu="+stu, true);
  xhttp.send();   
	//document.getElementById('para').innerHTML = stu +' '+'added successfully';
	document.getElementById('inpnam').outerHTML = an;
}


// ... add student end!

// edit score start ...
 function my(element) {
	//m = element.abbr;
	m = element.abbr;
	z = element.className;
	a = element.id;
	element.id = element.title;
	y = element.id;
  	
	
	  p = document.createElement("input");
	// p.createAttribute("value") = "ggg"; 
	   p.name = "score_input";
	   p.type = "text";
	  
	   p.placeholder = m;
	   p.style.width = "50px";
	   p.style.color = "black";
	   p.style.backgroundColor = "white";
	   
	  
  
  element.innerHTML = p.outerHTML;
  element.firstChild.value = m;
  element.firstChild.focus();
 
  
   element.firstChild.onblur = function () {
	   kk = element.firstChild.value;
	 show();
  }
	  
	  element.firstChild.ondblclick = function () {
	    kk = element.firstChild.value;
	  show();
   }  
   
   element.firstChild.onkeyup = function (event) {
	    kk = element.firstChild.value;
      if (event.keyCode == 13) {
		  show();
          }
   }  


function show() {
	var str = kk;
	  
	  re = /^\d+$/;    
        
    if(!re.test(str)) { 
		document.getElementById('para').style.color = 'red';

	document.getElementById('para').innerHTML = y +' '+"Not updated! Score can only be numbers!";
	
 var str = kk;
  var st = m;
   var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
      www = document.getElementById(y);
      www.outerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?ival="+st+"&dbrow="+a+"&dbcol="+z+"&fval="+str, true);
  xhttp.send();  
  
   return false; 
    }
	
     var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
      www = document.getElementById(y);
      www.outerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str+"&r="+a+"&s="+z, true);
  xhttp.send();  
	document.getElementById('para').style.color = 'black';
	document.getElementById('para').innerHTML = y + ' ' + "Updated successfully!";  
	 };
   }
   // edit score end ...
   
   // email verify start!
   var container = document.getElementsByClassName("container")[0];
container.onkeyup = function(e) {
    var target = e.srcElement || e.target;
    var maxLength = parseInt(target.attributes["maxlength"].value, 10);
    var myLength = target.value.length;
    if (myLength >= maxLength) {
        var next = target;
        while (next = next.nextElementSibling) {
            if (next == null)
                break;
            if (next.tagName.toLowerCase() === "input") {
                next.focus();
			document.next
                break;
            }
        }
    }
    // Move to previous field if empty (user pressed backspace)
    else if (myLength === 0) {
        var previous = target;
        while (previous = previous.previousElementSibling) {
            if (previous == null)
                break;
            if (previous.tagName.toLowerCase() === "input") {
                previous.focus();
                break;
            }
        }
    }
}
function vform(){
	window.alert('yes');
	//location.reload(true);
	this.form.submit();
	}
	   
	   
// Get the modal
var modal = document.getElementById('myModal');
var my = document.getElementById('myFunction');

// caption content
var z = '<h3>This is a demo package and does not allow most features. Upon complete payment, \
This feature and more will be integrated. \
Please contact us for more details</h3>'



// Get the image and insert it inside the modal - use its "alt" text as a caption
var mymod1 = document.getElementById('mymod1');
var mymod2 = document.getElementById('mymod2');
var mymod3 = document.getElementById('mymod3');
var mymod4 = document.getElementById('mymod4');
var mymod5 = document.getElementById('mymod5');
var mymod6 = document.getElementById('mymod6');

var captionText = document.getElementById("caption");
mymod1.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod2.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod3.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod4.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod5.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}
mymod6.onclick = function(){
    modal.style.display = "block";
    captionText.innerHTML = z ;
}

function mymod7() {
    modal.style.display = "block";
    captionText.innerHTML = z ;	
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
my.onclick = function() { 
    location.href = "./";
}

function toggle() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
 
 