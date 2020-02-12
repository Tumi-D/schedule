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
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        <?php include(public_path().'/css/app.css');
        ?>
    </style>
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
    </style>
</head>
<?php ///dd($data) ?>

<body>
    <div class="container">
        <div class="jumbotron">
            <h4 class="display-20">Hello,{{ $locations['user']->name}}</h4>
            <p class="lead">This is a the programming schedule for {{ $locations['meeting'] ?? ''}}</p>
            <hr class="my-4">
            @if($locations['admin'] == $locations['user']->name)
            <p>Congrats {{$locations['admin']}} you are the in charge. </p>
            @else
            <p>And I am pleased to inform you that your in charge is <a class="btn btn-danger" href="#"
                    role="button">{{  $locations['admin'] ?? '' }}</a>
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
                    <td scope="row" @foreach ($locations['locations'] as $location )>
                        <span class="chip"> {{ $location->name }} : </span>
                        <span>{{ $location->admin }}</span>
                        <span @foreach($location->users as $user)>
                            @if($user->id == $locations['user']->id)
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
