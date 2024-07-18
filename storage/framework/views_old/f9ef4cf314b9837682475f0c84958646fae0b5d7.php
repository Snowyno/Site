<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 

<style>
    .container{
        font-family: 'Open Sans', sans-serif !important;
    }
    .container-fluid{
        font-family: 'Open Sans', sans-serif !important;
    }

    .titulo{
        font-size: 2.2em;
        font-weight: lighter !important;
    }
    .seta{
        font-size: 2.2em;
        font-weight:  bolder !important;
    }

    .bnn_cpt_big{
        font-size: 3.5vw;
        font-weight: bold;
        margin: -15% 0% 0% 30%;
        position: absolute;
    }
    .bnn_cpt_med{
        font-size: 1.75vw;
        font-weight: bold;
        margin: -9% 0% 0% 30.2%;
        position: absolute;
    }
    .bnn_cpt_sml{
        font-size: 1vw;
        font-weight: bold;
        margin: -5% 0% 0% 30.4%;
        position: absolute;
    }

    .grow { 
    transition: all .2s ease-in-out; 
    cursor: pointer;
    }

    .grow:hover { 
    transform: scale(1.1); 
    cursor: pointer;
    }


    .image-caption{
        opacity:1;
        display: none;
        margin: -75px 30px 30px 50px;
        position: absolute;
        min-width: 85px;
        max-width: 85px;
        color: white;
        background-color: #ff8200;
        padding: 5px;
        font-size: 13px;
    }

    .image-container{
        opacity:1;
        cursor: pointer;
    }

    .image-container:hover{
        display: block;
        opacity:0.5;
        cursor: pointer;
    }

    .image-container:hover .image-caption{
        display: block;
        opacity:1;
        cursor: pointer;
        text-align: center;
        transform: translate(-50%,-50%);
    }

</style>

<!--nav-->
<?php //include('resources/views/livewire/main/home/includes/nav.php'); ?>
<!--carousel-->
<?php include('resources/views/livewire/main/home/includes/carousel.php'); ?>
<!--popular-->
<?php include('resources/views/livewire/main/home/includes/popular.php'); ?>
<!--gameitens-->
<?php include('resources/views/livewire/main/home/includes/gameitens.php'); ?>
<!--high-->
<?php include('resources/views/livewire/main/home/includes/high.php'); ?>
<!--bigbanner1-->
<?php //include('resources/views/livewire/main/home/includes/bigbanner1.php'); ?>
<!--carousel-->
<?php include('resources/views/livewire/main/home/includes/giftcards.php'); ?>
<!--carousel-->
<?php //include('resources/views/livewire/main/home/includes/newsUpdates.php'); ?>
<!--carousel-->
<?php include('resources/views/livewire/main/home/includes/bigbanner2.php'); ?>
<!--carousel-->
<?php //include('resources/views/livewire/main/home/includes/storegiftcards.php'); ?>
<!--carousel-->
<?php include('resources/views/livewire/main/home/includes/bestsellers.php'); ?>
<!--carousel-->
<?php include('resources/views/livewire/main/home/includes/warranty.php'); ?>
<!--carousel-->
<?php //include('resources/views/livewire/main/home/includes/bigbanner3.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


<?php $__env->startPush('scripts'); ?>

    
    <?php if(settings('appearance')->is_featured_categories && $categories && $categories->count()): ?>
        <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>



            document.addEventListener("DOMContentLoaded", function(){

            document.querySelector('body').classList.remove('dark'); 
            document.documentElement.classList.remove('dark');

            $("header").removeClass('bg-dark');
            $("header").addClass('bg-white') ;

            $(".container-fluid").removeClass('bg-dark');


                // Init featured categories slick
                $('#featured-categories-slick').slick({
                    dots          : false,
                    autoplay      : true,
                    infinite      : true,
                    speed         : 300,
                    slidesToShow  : 6,
                    slidesToScroll: 1,
                    arrows        : false,
                    responsive    : [
                        {
                        breakpoint: 1024,
                            settings: {
                                slidesToShow  : 4,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 800,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 600,
                            settings: {
                                slidesToShow  : 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 480,
                            settings: {
                                slidesToShow  : 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $('#featured-categories-slick').removeClass('hidden');
            });
        </script>
    <?php endif; ?>

    
    <?php if(settings('appearance')->is_best_sellers && $sellers && $sellers->count()): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(){

                document.querySelector('body').classList.remove('dark'); 
                document.documentElement.classList.remove('dark');

                $("header").removeClass('bg-dark');
                $("header").addClass('bg-white') ;

                $(".container-fluid").removeClass('bg-dark');

                // Init featured categories slick
                $('#top-sellers-slick').slick({
                    dots          : false,
                    autoplay      : true,
                    infinite      : true,
                    speed         : 300,
                    slidesToShow  : 5,
                    slidesToScroll: 1,
                    arrows        : false,
                    responsive    : [
                        {
                        breakpoint: 1024,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 800,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 600,
                            settings: {
                                slidesToShow  : 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 480,
                            settings: {
                                slidesToShow  : 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $('#top-sellers-slick').removeClass('hidden');
            });
        </script>
    <?php endif; ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

    
    <?php if(settings('appearance')->is_featured_categories): ?>
        <link rel="preload" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" as="style" onload="this.onload=null;this.rel='stylesheet';"/>
    <?php endif; ?>
        
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/livewire/main/home/home.blade.php ENDPATH**/ ?>