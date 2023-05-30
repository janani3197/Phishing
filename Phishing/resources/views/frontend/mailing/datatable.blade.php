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
    <h3 class="text-center">DASHBOARD</h3>
    <div class="form-group">
        <label for="from_date">From Date:</label>
        <input type="text" id="from_date" class="form-control" placeholder="Select From Date">
    </div>
    <div class="form-group">
        <label for="to_date">To Date:</label>
        <input type="text" id="to_date" class="form-control" placeholder="Select To Date">
    </div>
    <button id="submitBtn" class="btn btn-primary">Submit</button>
    <table id="eventTable" class="table table-bordered">
    <tr>
        <th width="80px">@sortablelink('id', 'ID')</th>
        <th>@sortablelink('created_at', 'Date')</th>
        <th>@sortablelink('email_id', 'Email')</th>
        <th>@sortablelink('event_type', 'Event Type')</th>
        <th>@sortablelink('user_id', 'Mail ID')</th>
    </tr>
        @if($events->count())
            @foreach($events as $key => $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->created_at->format('d-m-Y') }}</td>
                    <td>{{ $event->email_id }}</td>
                    <td>{{ $event->event_type }}</td>
                    <td>{{ $event->user_id }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $events->appends(\Request::except('page'))->render() !!}
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    var fromDateInput = flatpickr("#from_date", {
        dateFormat: "d-m-Y"
    });

    var toDateInput = flatpickr("#to_date", {
        dateFormat: "d-m-Y"
    });

    document.getElementById('submitBtn').addEventListener('click', function() {
        filterTableByDate();
    });

    function filterTableByDate() {
    var fromDate = moment(fromDateInput.selectedDates[0], "DD-MM-YYYY");
    var toDate = moment(toDateInput.selectedDates[0], "DD-MM-YYYY");

    var baseUrl = window.location.href.split('?')[0];
    var queryParameters = new URLSearchParams(window.location.search);

    var rows = document.getElementById('eventTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var dateCell = row.cells[1];
        var date = dateCell.innerText.trim();

        if (date) {
            var formattedDate = moment(date, "DD-MM-YYYY");

            if (fromDate.isValid() && toDate.isValid() && (formattedDate.isBefore(fromDate) || formattedDate.isAfter(toDate))) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        }
    }

    // Get the current sorting parameters from the URL
    var sortField = queryParameters.get('sort');
    var sortOrder = queryParameters.get('direction');

    // Update the URL with the sorting parameters and filtered dates
    queryParameters.set('sort', sortField);
    queryParameters.set('direction', sortOrder);
    queryParameters.set('from_date', fromDate.format("DD-MM-YYYY"));
    queryParameters.set('to_date', toDate.format("DD-MM-YYYY"));

    // Update the URL in the browser without reloading the page
    var newUrl = baseUrl + '?' + queryParameters.toString();
    window.history.replaceState(null, null, newUrl);
}

</script>
</body>
</html>