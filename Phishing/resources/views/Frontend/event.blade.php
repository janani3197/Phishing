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
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>Email Statistics</h1>
        <div id="emailChartContainer">
            <canvas id="emailChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3"></script>
    <script src="{{ asset('js/pie.js') }}"></script>
</body>
</html>
