 var cloud = document.getElementById("cloud");
 var nav = document.getElementById("nav");
 var lis = nav.children[1].children;
 var current = 0;
 for (var i = 0; i < lis.length; i++) {
     lis[i].onmouseover = function() {
         target = this.offsetLeft;
     }
     lis[i].onmouseout = function() {
         target = current;
     }
     lis[i].onclick = function() {
         current = this.offsetLeft;
     }
 }
 var leader = 0,
     target = 0;
 setInterval(function() {
     leader = leader + (target - leader) / 10;
     cloud.style.left = leader + 42 + "px";

 }, 30);
