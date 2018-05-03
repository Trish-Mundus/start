<div class="container">
      <div  class="slider">
         <div class="item"><img src="image.jpg"></div>
         <div class="item"><img src="image.jpg"></div>
         <div class="item"><img src="image.jpg"></div>
         <div class="item"><img src="image.jpg"></div>
         <div class="item"><img src="image.jpg"></div>
      </div>
      <button class="prev" id="button" onclick="Right2()"><<</button>
      <button class="next" id="button" onclick="Left2()">>></button></div>
</div>

<style type="text/css">
.container {margin: 0 auto;}
.slider {
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
    display: table;
    text-align: center;
    position: relative;
}
.item {
    display: table-cell;
    width: 25%;
    padding: 10px;
    text-align: center;
    position:relative;
}
#button {
    position: absolute;
    top: 35%;
}
.prev {left:0;}
.next {right:0;}
</style>

<script type="javascript">
$(document).ready(function(){
var wid = $('.item').width()*$('.item').length;
$('.container').css('width',$('.item').width()*$('.item').length+'px').css('height',$('.item').height()+'px');
function Left2() {

}
function Right2() {

}
</script>
