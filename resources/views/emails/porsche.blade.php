<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview Page</title>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap4-card-tables@1.2.0/dist/bootstrap4-card-tables.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap4-card-tables@1.2.0/dist/bootstrap4-card-tables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        /* .jumbotron {
            background: #002b45;
        } */
        /* .card {
            background: #002b45;
        } */
        /* .body {
            background: #002b45;

        } */
        .chip {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #f1f1f1;
        }

        .chipb {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #002b45;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <div class="jumbotron">
                        <center>
                            <h3> Data Preview</h3>
                        </center>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md d-flex">
                                    <div class="card card-body flex-fill">
                                        <div class="table-responsive">
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
                                                            @foreach($location->users as $user)
                                                            @if($user->id == $user->id)
                                                            {{ $user->name }}
                                                            @else
                                                            {{ $user->name }}
                                                            @endif
                                                            &nbsp;&nbsp;&nbsp;
                                                            @endforeach
                                                            <br />
                                                            <hr />
                                                        </td @endforeach>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>


</html>
