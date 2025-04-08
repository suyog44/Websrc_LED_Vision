<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

html{
  overflow: hidden;
}

div {
  background-color: black;
}
</style>
<script type="text/javascript">
var t='<?php require_once('con2.php');?>';

var array={

      11 : ['TAMIL'] ,
      5 : ['HINDI'],
      12 : ['TELUGU'],
      9 : ['ORIYA'],
      8 : ['NEPALI'],
      10 : ['MALAYALAM'],
      13 : ['URDU'],
      6  : ['KANNADA'],
      3 : ['BENGALI'],
      4 : ['GUJARATHI'],
      2 : ['ARABIC'],
      1 : ['ASSAMESE']


};

var var1;

function $_GET() {
    try{
var s =  window.location.search;
    var re = s.split('?')[1];
     var var1 = re.split('=')[1];
    }catch(x){
      var1 = 1
    }
    
     return var1;
}
var dGlobe=$_GET(); 


       var count=1;
        var col=6;
        var total=23;

        function right_click(){
          debugger;
          var temp=count;
          if (count % col == 0){  
              count = parseInt(count / col);
              count=parseInt((((count-1)*col)+1));
            }
          else
          count = count + 1;   
          if (count > total){
              var r1  = parseInt (count / col);
              if(count % col ==0)
                  r1=r1-1;
              count=parseInt(((r1*col)+1));
          }
          if(temp!=count)
          {
            var name="i"+temp;
            var name2="i"+count;
            var img=document.getElementById(name);
            var img2=document.getElementById(name2);
            img2.src=(count)+".gif";
            img.src=(temp)+".png";
            // img2.src="./main_gifs/"+gif[count-1];
            // img.src="./main_image/"+gif_img[temp-1]+".png";
          }
          
        }
        function left_click()
        {
          var temp=count;
          count = count - 1;
          if (count % col == 0) {
            count=parseInt((count/col));
            count=parseInt(((count+1)*col));
          }
          if (count > total){
            count = total;
          }
          if(temp!=count)
          {
            var name="i"+temp;
            var name2="i"+count;
            var img=document.getElementById(name);
            var img2=document.getElementById(name2);
             img2.src=(count)+".gif";
            img.src=(temp)+".png";
            // img2.src="./main_gifs/"+gif[count-1];
            // img.src="./main_image/"+gif_img[temp-1]+".png";
          }
        }
        function up_click()
        {
          var temp=count;
          var temp1=count-col;
          if (temp1 < 1)
          {
            if (total % col==0)
            {
                count=total+temp1;
            }          
            else
            {
                var temp2=parseInt((total/col)+1);
                var temp3=parseInt((temp2*col)+temp1);
                if (temp3 > total){
                    count=temp3-col;
                }          
                else{
                    count=temp3;
                }            
            }        
          }        
          else
          {
            count=temp1;
          }
          if(temp!=count)
          {
            debugger;
            var name="i"+temp;
            var name2="i"+count;
            var img=document.getElementById(name);
            var img2=document.getElementById(name2);
             img2.src=(count)+".gif";
            img.src=(temp)+".png";
          }
        
        }
        function down_click()
        {
          var temp=count;
          var temp1 = count + col; 
          if (temp1 > total)
          {
            temp2 = count % col;
            if (count % col ==0){
              count = col; 
            }
            else
            {
              count = temp2;
            }       
          }
          else{
            count = temp1;
          }
          if(temp!=count)
          {
            debugger;
            var name="i"+temp;
            var name2="i"+count;
            var img=document.getElementById(name);
            var img2=document.getElementById(name2);
             img2.src=(count)+".gif";
            img.src=(temp)+".png";
          }         
        }
        function enter_click()
        {
          debugger;
          
          if(dGlobe==1)
          {
             var t='<?php print updateLang2Value($con,'array[count][0]');?>';
          }
          // else if(dGlobe==2)
          // {
          //   <?php updateLang2Value($con , array[count][0]);?>
          // }
          //  else if(dGlobe==3)
          // {
          //   <?php updateLang3Value($con , array[count][0]);?>
          // }
          // alert('entered' + array[count][0] +" for language"+dGlobe);  
          window.history.back();
        }
        function back_click()
        {
              window.history.back();
        }
var key_p=0;
var key_pp=0;
        document.addEventListener('keydown',function(event){

    
if(key_pp == 0)
{
  key_pp=1;
  //giveSound();       
          switch(event.keyCode)
          {
              case 39:
                      right_click();
                      break;
              case 37:
                      left_click();
                      break;
              case 38:
                      up_click();
                      break;
              case 40:
                      down_click();
                      break;
              case 13:
                      enter_click();
                      break;
              case 8:
                      back_click();
                      break;
          }
        }
        },true);
                  document.addEventListener('keyup',function(event){
            key_pp=0;
          //  setTimeout(function(){flag_key=true ; }, 100);
            },true);
      var count=1;
      var total=14;
      var current=0;
      var row=14;



      function right1(){
        debugger;

        var name="i"+count;  
        count=count+1;
        var name2="i"+count;
        var img=document.getElementById(name);
        var img2=document.getElementById(name2);
        img2.src=(count)+".gif";
        img.src=(count-1)+".png";
      
      }



</script>
</head>
<body style="overflow:hidden;">
<div class="container" style="margin:0px;width:100%;height: 100%">
    

<div class="row"  style="height: 33.3%;padding:0px">
  <div class="col-sm-2" >
    <img src="1.gif" id="i1"  style="margin:30px;width:100%;" border="0" alt="Null"   /></a>
  </div>
  <div class="col-sm-2" >
     <img src="2.png" id="i2" style='margin:30px;width:100%;' border="0" alt="Null"    />
  </div>
  <div class="col-sm-2" >
     <img src="3.png" id="i3" style='margin:30px;width:100%;' border="0" alt="Null" />
  </div>
  <div class="col-sm-2" >
     <img src="4.png" id="i4" style='margin:30px;width:100%;' border="0" alt="Null"  />
  </div>
  <div class="col-sm-2" >
     <img src="5.png" id="i5" style='margin:30px;width:100%;' border="0" alt="Null"   />
  </div>
  <div class="col-sm-2" >
     <img src="6.png" id="i6" style='margin:30px;width:100%;' border="0" alt="Null"    />
  </div>
  </div>
  <div class="row" style="height: 33.3%" >
  <div class="col-sm-2" >
     <img src="7.png" id="i7" style='margin:30px;width:100%;' border="0" alt="Null"    />
  </div>
  <div class="col-sm-2" >
     <img src="8.png" id="i8" style='margin:30px;width:100%;' border="0" alt="Null"    />
  </div>
  <div class="col-sm-2" >
     <img src="9.png" id="i9" style='margin:30px;width:100%;' border="0" alt="Null"    />
  </div>
  <div class="col-sm-2" >
     <img src="10.png" id="i10" style='margin:30px;width:100%;' border="0" alt="Null"   />
  </div>
  <div class="col-sm-2" >
     <img src="11.png" id="i11" style='margin:30px;width:100%;' border="0" alt="Null"   />
  </div>
<div class="col-sm-2" >
     <img src="12.png" id="i12" style='margin:30px;width:100%;' border="0" alt="Null"  />
  </div>
</div>
 <div class="row" style="height: 33.3%" >
  <div class="col-sm-2" >
     <img src="13.png" id="i13" style='margin:30px;width:100%;' border="0" alt="Null"  />
  </div>
  

  
</div>


</div>
</body>
</html>