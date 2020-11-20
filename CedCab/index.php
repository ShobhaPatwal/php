<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <title>CedCab - Book Cab Easily</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="images/cedcab.png" alt="cedcab"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link book" href="#book">BOOK CAB</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
       
        <!--book cab section-->
        <section id="book">
            <div class="container book-form">
                <div class="row booknow">
                    <div class="col-lg-12 col-md-12 col-sm-12 box">
                        <h3>Book a City Taxi to your destination in town</h3>
                        <p>Choose from range of categories and prices</p>
                    </div>
                </div>
                <div id="message">
                </div>
                <div class="row content-box">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <form class="form-box">
                            <img src="images/cedcab.png" alt="cedcab">
                            <div class="form">
                                <h6>Your everyday travel partner</h6>
                                <p>AC cabs for point to point travel</p>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">PICKUP</span>
                                    </div>
                                    <select class="custom-select" name="pickup" id="pickup" required>
                                        <option value="" selected>Current Location</option>
                                        <option value="Charbagh">Charbagh</option>
                                        <option value="Indira Nagar">Indira Nagar</option>
                                        <option value="BBD">BBD</option>
                                        <option value="Barabanki">Barabanki</option>
                                        <option value="Faizabad">Faizabad</option>
                                        <option value="Basti">Basti</option>
                                        <option value="Gorakhpur">Gorakhpur</option>
                                    </select>
                                </div>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DROP</span>
                                    </div>
                                    <select class="custom-select" name="drop" id="drop" required>
                                        <option value="" selected>Enter drop for ride estimate</option>
                                        <option value="Charbagh">Charbagh</option>
                                        <option value="Indira Nagar">Indira Nagar</option>
                                        <option value="BBD">BBD</option>
                                        <option value="Barabanki">Barabanki</option>
                                        <option value="Faizabad">Faizabad</option>
                                        <option value="Basti">Basti</option>
                                        <option value="Gorakhpur">Gorakhpur</option>
                                    </select>
                                </div>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">CAB TYPE</span>
                                    </div>
                                    <select class="custom-select" name="cabType" id="cabType" required>
                                        <option value="" selected>Drop down to select CAB Type</option>
                                        <option value="CedMicro">CedMicro</option>
                                        <option value="CedMini">CedMini</option>
                                        <option value="CedRoyal">CedRoyal</option>
                                        <option value="CedSUV">CedSUV</option>
                                    </select>
                                </div>
                                <div class="input-group flex-nowrap" id="luggage">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">LUGGAGE</span>
                                    </div>
                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight in KG" >
                                </div>
                                <div class="input-group">
                                    <input type="button" name="bookNow" id="bookNow" class="btn" value="Calculate Fare">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 left-box">
                        <h3>Book a City Taxi to your destination in town</h3>
                        <p>Choose from range of categories and prices</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer section-->
        <footer class="footer">
            <div class="container-fluid footer-top">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 first-box">
                        <ul>
                            <li>
                                <a><i class="fa fa-facebook"></i></a>  
                            </li>
                            <li>
                                <a><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 second-box">
                        <p class="mb-0"><img src="images/cedcab1.png" alt="cedcab"></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 third-box">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#book">BOOK NOW</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid footer-bottom">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><span><i class="fa fa-heart"></i></span> Designed By Shobha Patwal</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>