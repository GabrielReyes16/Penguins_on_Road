<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
        <title>{{ config('app.name', 'Penguins on Road') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.css">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{ asset ('css/style-ticket-admin.css') }}">
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,300&display=swap" rel="stylesheet">
        @yield ('css-personalizado')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
    

    .container-dash {
            text-align: center;
            background-color: white;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        #admin-name,
        #current-time {
            font-size: 48px;
            margin-bottom: 10px;
        }

        #weather-info {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #chart-container {
            margin-top: 40px;
        }

        @media screen and (max-width: 768px) {
            #chart-container {
                margin-top: 20px;
            }
        }

        #chart {
            width: 100%;
            max-width: 800px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
    </head>
    <body >
        <div >
                    @include('layouts.navigation')

                                <!-- Page Heading -->
            @if (isset($header))
            <header class=" ">
                <div class="">
                    {{ $header }}
                </div>
            </header>
        @endif

            <!-- Page Content -->
            <main>
                {{$slot}}
            </main>
        </div>
    </body>
    
</html>
