<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="templates.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <style>
        #btnContact {
  position: fixed;
  right: 30px;
  bottom: 100px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: none;
  background-color: #11ff00;
  font-size: 25px;
  font-weight: bolder;
  opacity: 80%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  cursor: pointer;
  outline: none;
}

#btnContact:hover {
  background-color: rgba(19, 95, 9, 0.8); /* Add a dark-grey background on hover */
}

#btnScrollToTop {
  position: fixed;
  right: 30px;
  bottom: 30px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: none;
  background-color: #ff6022;
  opacity: 80%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  color: white; /* Text color */
  cursor: pointer;
  outline: none;
}

#btnScrollToTop:hover {
  background-color: rgba(44, 43, 43, 0.8); /* Add a dark-grey background on hover */
}
    </style>
</head>
<body>


    <button onclick="topFunction()" id="btnScrollToTop">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <button id="btnContact">
        <a href="https://web.whatsapp.com/"><i class="fa-brands fa-whatsapp" style="color: white;"></i></a>
    </button>
    
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
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

        // Get the button:
        let mybutton = document.getElementById("btnScrollToTop");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        
    </script>
</body>
</html>