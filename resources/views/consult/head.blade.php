
<style>
    @import url('https://fonts.googleapis.com/css?family=Orbitron');


#clock {
 font-family: 'Orbitron', sans-serif;
 color: #66ff99;
 font-size: 36px;
 text-align: center;
 padding-top: 40px;
 padding-bottom: 40px;
 padding-left: 5px;
 padding-left: 5px;
}
   .w3-card-header{
       background-color: #cfb48a;

   }
   .trj{
       width: 35% !important;
       margin-top: -5% !important;


   }
   .w3-bd{
       border-radius: 53px;
       padding: 5px,5px,5px,5px;
   }

   /* for element */
   .myElement-pulse{
       animation: pulsate 4s ease-out;
       animation-iteration-count: infinite;
       opacity: 1;
   }
   @-webkit-keyframes pulsate {
   0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
   50% {opacity: 1.0;}
   100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
}
#date, #day{
   padding-right: 16px;
   text-align: right !important;
   font-family: 'Nunito';
   font-size: 15px;
}
    .gty{
        background-color: #c8c8a7;
        padding-left: 88px;
        padding-right: 88px;
    }
</style>
<br><br>
<div class="w3-row gty w3-padding-32">
    <div class="w3-col s4 w3-left">
        <div class="w3-card-4 w3-left w3-bd">
            <img src="/backimage/lgu.png" width="118px" height="118px" alt="">
        </div>
        <div class="w3-left"> &nbsp;
            &nbsp;
            &nbsp;
        </div>
        <div class="w3-card-4 w3-left w3-bd">
            <img src="/backimage/da2.png" width="118px" height="118px" alt="" style="border-radius: 65px;">
        </div>

    </div>
    <div class="w3-col s4  w3-center"><p>&nbsp;</p></div>
    <div class="w3-col s4 w3-brown w3-center">
        <div class="w3-padding-32 w3-card-4" id="clock"></div>
    </div>
  </div>

  <script>
    function currentTime() {
   var date = new Date(); /* creating object of Date class */
   var hour = date.getHours();
   var min = date.getMinutes();
   var sec = date.getSeconds();
   var amOrpm = hour >= 12 ? 'PM' : 'AM';
   hour = (hour % 12) || 12;
   hour = updateTime(hour);
   min = updateTime(min);
   sec = updateTime(sec);
   document.getElementById("clock").innerHTML = hour + " : " + min + " : " + sec +
   "&nbsp;" + amOrpm; /* adding time to the div */

     var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */

 }

 function updateTime(k) {
   if (k < 10) {
     return "0" + k;
   }
   else {
     return k;
   }
 }

 currentTime(); /* calling currentTime() function to initiate the process */
 </script>

 <div class="w3-row w3-margin w3-padding-8 w3-card-4 w3-brown trj">
     <div class="w3-col s12 w3-brown">
         <div>
             <h1 class="text-center" id="day"></h1>
             <h1 id="date"></h1>
         </div>
     </div>
 </div>
 <script>
 var d = new Date();
 var day = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

 var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 // document.getElementById("demo").innerHTML = months[d.getMonth()];

 document.getElementById('date').innerHTML = months[d.getMonth()] + "-" +
 d.getDate() + "-" + d.getFullYear();
 document.getElementById("day").innerHTML = day[d.getDay()];
 </script>


