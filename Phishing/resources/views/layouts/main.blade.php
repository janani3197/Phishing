<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Column sorting with pagination example from scratch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        .flatpickr-calendar {
            z-index: 9999 !important; /* Ensure the datepicker appears above other elements */
        }
    </style>
</head>
<body>
<div class="container">

    @yield('content')

</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@section('scripts')
@endsection


</body>
</html>
