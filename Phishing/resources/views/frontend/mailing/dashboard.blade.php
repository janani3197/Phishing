@extends('layouts.main')

@section('content')

    <h3 class="text-center">DASHBOARD</h3>

    <form action="{{ route('users.dashboard') }}">
        <input type="hidden" name="sort" value="{{ Request::input('sort') }}">
        <input type="hidden" name="direction" value="{{ Request::input('direction') }}">
        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input name="from" value="{{ $from }}" type="date" id="from_date" class="form-control" placeholder="Select From Date">
        </div>
        <div class="form-group">
            <label for="to_date">To Date:</label>
            <input name="to" type="date" value="{{ $to }}" id="to_date" class="form-control" placeholder="Select To Date">
        </div>
        <button id="submitBtn" class="btn btn-primary">Submit</button>
    </form>
    <table id="eventTable" class="table table-bordered">
    <tr>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('email', 'Email')</th>
        <th>@sortablelink('mailings_count', 'Sent')</th>
        <th>@sortablelink('delivered_mailings_count', 'Delievered')</th>
        <th>@sortablelink('opened_mailings_count', 'Opened')</th>
        <th>@sortablelink('opened_rate', 'Open rate')</th>
        <th>@sortablelink('clicked_mailings_count', 'Clicked')</th>
    </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mailings_count }}</td>
                <td>{{ $user->delivered_mailings_count }}</td>
                <td>{{ $user->opened_mailings_count }}</td>
                <td>
                    {{ 
                        $user->delivered_mailings_count 
                            ? intval($user->opened_mailings_count * 100 / $user->delivered_mailings_count)
                            : 0 
                    }}
                </td>
                <td>{{ $user->clicked_mailings_count }}</td>
            </tr>
        @endforeach
    </table>
    {!! $users->appends(\Request::except('page'))->render() !!}

@endsection

@section('scripts')
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
@endsection

