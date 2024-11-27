<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
crossorigin="anonymous" />
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
crossorigin="anonymous" />

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: hsl(0, 0, 94%);
        }
    </style>
    <div class="container-fluid my-5">
       
        <div class="row" style="background-color: #BDC0BA;">
        <div class="col-md-4">
            <img src="images/fcontent1.jpeg" style="width:
            100%;" alt="">
        </div>
            <div class="col-8 m-auto">
                <div class="owl-carousel owl-theme">
                    <div class="item mb-4">
                        <div class="card border-0 shadow">
                            <img src="product_img/hscontent1.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-1</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/hscontent2.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-2</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/hscontent3.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-3</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/hscontent4.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-4</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/hscontent5.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-5</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/pic0202.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-6</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/pic0203.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-7</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="product_img/pic0204.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel-8</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:false,
            smartSpeed:1500,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>