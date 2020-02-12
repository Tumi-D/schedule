<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedule</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .chip {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #f1f1f1;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }

        table {
            width: 750px;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        /*
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            table {
                width: 100%;
            }

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                /* Label the data */
                content: attr(data-column);

                color: #000;
                font-weight: bold;
            }

        }

        /*
        .btn {
            font-size: 14px;
            padding: 6px 12px;
            margin-bottom: 0;

            display: inline-block;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
        }

        .btn:focus,
        .btn:active:focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn:hover,
        .btn:focus {
            color: #333;
            text-decoration: none;
        }

        .btn:active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }

        /* default
---------------------------- */
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .btn-default:focus {
            color: #333;
            background-color: #e6e6e6;
            border-color: #8c8c8c;
        }

        .btn-default:hover {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }

        .btn-default:active {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }

        */
    </style>
</head>
<?php ///dd($data) ?>

<body>
    <div class="container">
        <div class="jumbotron">
            <h4 class="display-20">Hello,{{ $user->name}}</h4>
            <p class="lead">This is a the programming schedule for {{ $meeting ?? ''}}</p>
            <hr class="my-4">
            @if($admin == $user->name)
            <p>Congrats {{$admin}} you are the in charge. </p>
            @else
            <p>And I am pleased to inform you that your in charge is
                <span style="font-size: bolder">{{  $admin ?? '' }}
            </p>
            @endif
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    {{-- @foreach($locations as $location)
                    <td>{{ $location->name }}</td>
                    @endforeach --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" @foreach ($locations as $location )>
                        <span class="chip"> {{ $location->name }} : </span>
                        <span>{{ $location->admin }}</span>
                        <span @foreach($location->users as $user)>
                            @if($user->id == $user->id)
                            <button type="button" class="btn btn-success btn-sm">
                                {{ $user->name }}
                            </button>
                            @else
                            <button type="button" class="btn btn-primary btn-sm">
                                {{ $user->name }}
                            </button>
                            @endif
                            &nbsp;&nbsp;&nbsp;
                        </span @endforeach>
                        <br />
                        <hr />
                    </td @endforeach>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
