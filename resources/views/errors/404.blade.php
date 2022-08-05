
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--=====Bootstrap CSS=====-->
        <link href="{{ asset('dashboard_assets/assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <!--=====FONTAWESOME ICON=====-->
        <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/icons/css/all.css" />
        <!--=====GOOGLE FONTS=====-->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!--====Vmap CSS=====-->
        <link href="{{ asset('dashboard_assets/assets') }}/plugins/vmap/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">
        <!--==========Data Tables CSS==========-->
        <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/jquery.dataTables.min.css">
        {{-- Toastr CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
        {{-- trix  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        {{-- select 2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        {{--=====Bootstrap Icons=====--}}
        {{-- <link rel="stylesheet" href="{{ asset('dashboard_assets/assets/bi/bootstrap-icons.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!--=====MAIN CSS=====-->
        <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/styles.css" />
        <!--==========Responsive CSS==========-->
        <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/responsive.css">

        
<style>
    
    /*======================
        404 page
    =======================*/
    
    
    .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
    }
    
    .page_404  img{ width:100%;}
    
    .four_zero_four_bg{
     
     background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
     }
     
     
     .four_zero_four_bg h1{
     font-size:80px;
     }
     
      .four_zero_four_bg h3{
        font-size:80px;
    }
                 
    .link_404{			 
        color: #fff!important;
        padding: 10px 20px;
        background: #0a58ca;
        margin: 20px 0;
        display: inline-block;
        text-decoration: none;
        text-transform: uppercase;
    }
    .contant_box_404{ 
        margin-top:-50px;
    }
    </style>
    

    </head>

<body>


<section class="page_404">
	<div class="container">
		<div class="row">	
            <div class="col-md-12 m-auto offset-6">
                <div class="col-md-12 text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center "><span style="color:#0a58ca">4</span> <span style="color:red">0</span> <span style="#39ad31">4</span> </h1>
                    </div>
                    
                    <div class="contant_box_404">
                        <h3>
                        The page you are requested
                        </h3>
                        
                        <h5 class="text-danger">Not Found</h5>
                        <hr>
                        
                        <a href="{{ url('/') }}" class="link_404 btn-primary">Go to Home Page</a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>


        <!--=====Jquery=====-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/jquery/jquery-git.min.js"></script> --}}
        <!--=====Bootstrap Js=====-->
        <script src=" {{ asset('dashboard_assets/assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"> </script>
        <!--=====Icon Js=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/icons/js/all.js">
        </script>
        <!--====Chart====-->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <!--=====Vmap Js=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.js"></script>
        <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.world.js"></script>
        <!--==========Data Tables==========-->
        <script src="{{ asset('dashboard_assets/assets') }}/js/jquery.dataTables.min.js"></script>
        <!--=====Main Js====-->
        <script src="{{ asset('dashboard_assets/assets') }}/js/script.js"></script>
        {{-- select 2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            // $(function () {
            //     $('.selectpicker').selectpicker();
            // });
        </script>

        {{-- toastr js--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- trix js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    </body>
</html>

