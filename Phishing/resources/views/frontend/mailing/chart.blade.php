@vite(['resources/js/pie.js'])
<!DOCTYPE html>
<html>
<head>
    <title>Phishing Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #emailChartContainer {
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }
        .button-container {
            padding-top: 20px;
        }
        .button-container .btn {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2>Email Statistics</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="emailChartContainer">
                    <canvas id="emailChart"></canvas>
                </div>
            </div>
        </div>
        <div class="row button-container">
            <div class="col-md-12 text-center">
                <a href="{{ route('mailings.create') }}" class="btn btn-primary">New Email</a>
            </div>
        </div>
        <div class="row button-container">
            <div class="col-md-12 text-center">
                <a href="{{ route('something') }}" class="btn btn-primary">Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3"></script>
    <script src="{{ asset('js/pie.js') }}"></script>
</body>
</html>
