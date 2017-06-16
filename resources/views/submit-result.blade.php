@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Booking confirmation</h1>

        @if($result)

            <section>

                <h2>Thank you for booking!</h2>

                <p>We found the best cleaner in your area: {{$result->cleaner->full_name}}.</p>

            </section>

            <section>

            <h3>Your booking details:</h3>

            <table class="table table-bordered table-striped table-hover">

                <tbody>

                <tr>
                    <th>ID</th><td>{{ $result->id }}</td>
                </tr>
                <tr><th> Date </th>
                    <td> {{ $result->date }} </td>
                </tr>
                <tr>
                    <th> Cleaner </th>
                    <td> {{ $result->cleaner->full_name }} </td>
                </tr>
                <tr>
                    <th> Starts At </th>
                    <td> {{ $result->start_at }} </td>
                </tr>
                <tr>
                    <th> Ends At </th>
                    <td> {{ $result->end_at }} </td>
                </tr>

                </tbody>

            </table>

        </section>

        @else


            <h2>We are sorry :-(</h2>

            <p>Unfortunately we have not found any cleaner meeting your search criteria.</p>
            <p>Please, select different date, city or time or contact our support.</p>
            <a href="/" class="btn btn-primary">Back to search</a>

        @endif


    </div>

@endsection
