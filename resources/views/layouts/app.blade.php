<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- all css -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- all css -->
    <style>
        .dropdown-navigation-bar {
            z-index: 9999 !important;
        }

        :root {
            --primary-color: #F76B6A;
            --secondary-color: #F76B6A;

            --btn-primary-border-radius: 0.25rem;
            --btn-primary-color: #fff;
            --btn-primary-background-color: #F76B6A;
            --btn-primary-border-color: #F76B6A;
            --btn-primary-hover-color: #fff;
            --btn-primary-background-hover-color: #F76B6A;
            --btn-primary-border-hover-color: #F76B6A;
            --btn-primary-font-weight: 500;

            --btn-secondary-border-radius: 0.25rem;
            --btn-secondary-color: #00234D;
            --btn-secondary-background-color: transparent;
            --btn-secondary-border-color: #00234D;
            --btn-secondary-hover-color: #fff;
            --btn-secondary-background-hover-color: #F76B6A;
            --btn-secondary-border-hover-color: #F76B6A;
            --btn-secondary-font-weight: 500;

            --heading-color: #000;
            --heading-font-family: 'Poppins', sans-serif;
            --heading-font-weight: 700;

            --title-color: #000;
            --title-font-family: 'Poppins', sans-serif;
            --title-font-weight: 400;

            --body-color: #000;
            --body-background-color: #fff;
            --body-font-family: 'Poppins', sans-serif;
            --body-font-size: 14px;
            --body-font-weight: 400;

            --section-heading-color: #000;
            --section-heading-font-family: 'Poppins', sans-serif;
            --section-heading-font-size: 48px;
            --section-heading-font-weight: 600;

            --section-subheading-color: #000;
            --section-subheading-font-family: 'Poppins', sans-serif;
            --section-subheading-font-size: 16px;
            --section-subheading-font-weight: 400;
        }
    </style>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <body class="font-light antialiased">
        @include('layouts.partials.announment')
        @include('layouts.partials.header')
        @yield('hero')

        @include('layouts.partials.footer')

    </body>
    @stack('modals')

    @livewireScripts

    <!-- all js -->
    <script src="{{asset('/js/vendor.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>

    <script type="text/javascript">
          $(document).on("change", ".early_access", function () {
            // get id from the selected option
            var id = $(this).val();
            var checkboxs = document.getElementsByClassName('early_access');
            for (var i = 0; i < checkboxs.length; i++) {
                //uncheck all other checkboxes
                if (checkboxs[i].value != id) {
                    checkboxs[i].checked = false;
                }
            }

            // make the ajax call
            $.ajax({
                url: '/filter-products/' + id,
                type: 'get',
                data:"_token=<?php echo csrf_token(); ?>",
                success: function (response) {
                    //update the products
                    var products = response.data;
                    console.log(products);
                    var html = '';
                    $.each(products, function (index, value) {
                        html += '<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">';
                        html += '<div class="product-card">';
                        html += '<div class="product-card-image">';
                        html += '<img src="/storage/' + value.image_url + '" alt="' + value.name + '">';
                        html += '</div>';
                        html += '<div class="product-card-body">';
                        html += '<h6 class="product-card-title">' + value.name + '</h6>';
                        html += '<p class="product-card-price">$' + value.price + '</p>';
                        html += '<a href="/product/' + value.id + '" class="btn btn-primary">View Product</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    });
                    $('.product').html(html);

                    
                
                }
            });

        });

        // $(document).ready(function() {
         



        // });
    </script>
</body>

</html>