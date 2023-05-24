<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Column sorting with pagination example from scratch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            <th width="80px">@sortablelink('id')</th>
            <th>@sortablelink('created_at', 'Date')</th>
            <th>@sortablelink('email_id', 'Email')</th>
            <th>@sortablelink('event_type', 'Event Type')</th>
            <th>@sortablelink('user_id', 'User ID')</th>
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
    flatpickr("#from_date", {
        dateFormat: "d-m-Y"
    });
    flatpickr("#to_date", {
        dateFormat: "d-m-Y"
    });

    document.getElementById('submitBtn').addEventListener('click', function() {
    var fromDate = flatpickr("#from_date").selectedDates[0];
    var toDate = flatpickr("#to_date").selectedDates[0];

    var rows = document.getElementById('eventTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var dateCell = row.cells[1];
        var date = dateCell.innerText.trim();

        if (date) {
            var parts = date.split('-');
            var formattedDate = new Date(parts[2], parts[1] - 1, parts[0]); // Create a Date object

            if (formattedDate < fromDate || formattedDate > toDate) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        }
    }
});



</script>

</body>
</html>
