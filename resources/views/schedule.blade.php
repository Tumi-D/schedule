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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .chipb {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: darkgoldenrod;
            color: white;
        }

        .chip {
            font-weight: bolder;
            align-items: center;
            /* font-size: 20px; */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h4 class="display-20">Hello,{{ $user->name}}</h4>
            <p class="lead">This is a the programming schedule for {{ $meeting ?? ''}}</p>
            <hr class="my-4">
            @if( $admin == $user->name)
            <p>Congrats {{$admin}} you are the in charge. </p>
            @else
            <p>And I am pleased to inform you that your in charge is <a class="btn btn-danger" href="#"
                    role="button">{{  $admin ?? '' }}</a>
            </p>
            @endif
        </div>
        <table class="table">

            <tbody>
                @foreach ($locations as $location )
                <?php $i = 0; ?>

                <tr>
                    <td scope="row">
                        <span class="chip"> {{ $location->name }} : </span>
                        <span>{{ $location->admin }}</span>
                        @foreach($location->users as $user)
                        <span>
                            @if($user->id == $user->id)
                            {{-- <button type="button" class="btn btn-success btn-sm"> --}}
                            {{ $user->name }}
                            {{-- </button> --}}
                            @else
                            {{-- <button type="button" class="btn btn-primary btn-sm"> --}}
                            {{ $user->name }}
                            {{-- </button> --}}
                            @endif
                            &nbsp;&nbsp;&nbsp;
                        </span>
                        @endforeach
                        <br />
                        <br />
                        <hr />
                    </td>


                    <?php $i++; ?>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
