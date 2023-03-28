<?php
include("clientHeader.php");
?>
<html>
<head>
</head>
<body>
<style>
    .slideshow-container {
  position: relative;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
</style>
<div class="container" style="padding-top: 5%; padding-left: 20%; font-family: 'Open Sans', sans-serif; ">
        <div class="row">
            <div class="col-md-11">
                    <div class="form-horizontal" style="margin-left:0px;">
                        <p style="font-size: 20px;">Welcome to</p>
                        <p style="font-size: 80px;">Hera</p>
                        <p style="font-size: 40px;">The Perfect Place</p>
                    </div>
                <div class="slideshow-container">
                        <div class="mySlides">
                            <q>It's not what you sell that matters as much as how you sell it!</q>
                            <p class="author">- Brian Halligan</p>
                        </div>
                        <div class="mySlides">
                            <q>Many companies have forgotten they sell to actual people. Humans care about the entire experience, not just the marketing or sales or service. To really win in the modern age, you must solve for humans. </q>
                            <p class="author">- Dharmesh Shah</p>
                        </div>
                        <div class="mySlides">
                            <q>Ignoring online marketing is like opening a business but not telling anyone.</q>
                            <p class="author">- KB Marketing Agency</p>
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
                <div class="dot-container">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>

                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                         showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {slideIndex = 1}    
                        if (n < 1) {slideIndex = slides.length}
                        for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";  
                        dots[slideIndex-1].className += " active";
                    }
                </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
