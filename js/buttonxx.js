// JavaScript Document
function myfunction() {
   var x = document.getElementById("button");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
    var x1 = document.getElementById("button1");
   var y1 = document.getElementById("lessondetails");
   var z1 = document.getElementById("updatelesdet");
   var x2 = document.getElementById("button2");
   var y2 = document.getElementById("learnerid");
   var z2 = document.getElementById("updatelearnerid");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
   var x3 = document.getElementById("button3");
   var y3 = document.getElementById("learnercontacts");
   var z3 = document.getElementById("updatelearnercont");
   
   
   
   
   if (y.style.display == 'block' &&  x.innerHTML== 'view learner info') {
        y.style.display = 'none';
        z.style.display ='block';
		y1.style.display = 'none';
        z1.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none'; x.innerHTML="LEARNER";
    } else {
        y.style.display = 'block';
        z.style.display = 'none';
		y1.style.display = 'none';
        z1.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none'; x.innerHTML="view learner info";
    }
}

function myfunction1() {
  var x = document.getElementById("button");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
    var x1 = document.getElementById("button1");
   var y1 = document.getElementById("lessondetails");
   var z1 = document.getElementById("updatelesdet");
   var x2 = document.getElementById("button2");
   var y2 = document.getElementById("learnerid");
   var z2 = document.getElementById("updatelearnerid");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
   var x3 = document.getElementById("button3");
   var y3 = document.getElementById("learnercontacts");
   var z3 = document.getElementById("updatelearnercont");
   
   
   
   
   if (y1.style.display == 'none' && x1.innerHTML=="details") {
        y1.style.display = 'block';
        z1.style.display ='none';
		y.style.display = 'none';
        z.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none';x1.innerHTML="edit";
    } else {
        y1.style.display = 'none';
        z1.style.display = 'block';
		y.style.display = 'none';
        z.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none';x1.innerHTML="details";
    }
}
function myfunction2() {
	var x = document.getElementById("button");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
    var x1 = document.getElementById("button1");
   var y1 = document.getElementById("lessondetails");
   var z1 = document.getElementById("updatelesdet");
   var x2 = document.getElementById("button2");
   var y2 = document.getElementById("learnerid");
   var z2 = document.getElementById("updatelearnerid");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
   var x3 = document.getElementById("button3");
   var y3 = document.getElementById("learnercontacts");
   var z3 = document.getElementById("updatelearnercont");
   
   
   if (y2.style.display == 'none' && x2.innerHTML=="learner id") {
        y2.style.display = 'block';
        z2.style.display ='none';
		y.style.display = 'none';
        z.style.display ='none';
		y1.style.display = 'none';
        z1.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none'; x2.innerHTML="edit";
    } else {
        y2.style.display = 'none';
        z2.style.display = 'block';
		y.style.display = 'none';
        z.style.display ='none';
		y1.style.display = 'none';
        z1.style.display ='none';
		y3.style.display = 'none';
        z3.style.display ='none'; x2.innerHTML="learner id";
    }
}
function myfunction3() {
	
   var x = document.getElementById("button");
   var y = document.getElementById("leanerinfo");
   var z = document.getElementById("updateleanerinfo");
    var x1 = document.getElementById("button1");
   var y1 = document.getElementById("lessondetails");
   var z1 = document.getElementById("updatelesdet");
   var x2 = document.getElementById("button2");
   var y2 = document.getElementById("learnerid");
   var z2 = document.getElementById("updatelearnerid");
   var x3 = document.getElementById("button3");
   var y3 = document.getElementById("learnercontacts");
   var z3 = document.getElementById("updatelearnercont");
   
  
   
   if (y3.style.display == 'none' && x3.innerHTML=="contacts") {
        y3.style.display = 'block';
        z3.style.display ='none';
		y.style.display = 'none';
        z.style.display ='none';
		y1.style.display = 'none';
        z1.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none'; x3.innerHTML="edit";
    } else {
        y3.style.display = 'none';
        z3.style.display = 'block';
		y.style.display = 'none';
        z.style.display ='none';
		y1.style.display = 'none';
        z1.style.display ='none';
		y2.style.display = 'none';
        z2.style.display ='none'; x3.innerHTML="contacts";
    }
}

function myFunction21() {
    var b = document.getElementById('standard');
    var c = document.getElementById('min');
    var d = document.getElementById('max');
    var e = document.getElementById('family');
    b.style.display = 'block';
	c.style.display = 'none'; 
    d.style.display = 'none'; 
    e.style.display = 'none';
}

function myFunction22() {
    var b = document.getElementById('standard');
    var c = document.getElementById('min');
    var d = document.getElementById('max');
    var e = document.getElementById('family');
    b.style.display = 'none';
	c.style.display = 'block'; 
    d.style.display = 'none'; 
    e.style.display = 'none';
}
function myFunction23() {
    var b = document.getElementById('standard');
    var c = document.getElementById('min');
    var d = document.getElementById('max');
    var e = document.getElementById('family');
    b.style.display = 'none';
	c.style.display = 'none'; 
    d.style.display = 'block'; 
    e.style.display = 'none';
}
  function myFunction24() {
    var b = document.getElementById('standard');
    var c = document.getElementById('min');
    var d = document.getElementById('max');
    var e = document.getElementById('family');
    b.style.display = 'none';
	c.style.display = 'none'; 
    d.style.display = 'none'; 
    e.style.display = 'block';
}  