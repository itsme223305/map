@extends('layouts.app')
@section('head')
    <x-stylesheet path="css/admin.css" />
@endsection
@section('content')
    <script>
        $(document).ready(function () {
            let height = $(window).height()
            $('body').attr({style: 'min-height: '+height+'px;'});
        });
    </script>

    <div class="dashboard-container mt-2">
        <div class="admin-header d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Menu
                </button>
                <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenuButton">
                    <form action="{{route('admin.logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item">Odjaviti se</button>
                    </form>
                </div>
            </div>
        </div>

        <form id="status-form" action="{{route('admin.dashboard.get')}}" method="get" class="d-flex justify-content-end mt-5">
            <label for="status-select" class="mr-2 mb-0 d-flex align-items-center text-white text-lg">Izaberite:</label><select id="status-select" name="filter" class="custom-select select-width cursor-pointer">
                <option selected value="" class="cursor-pointer">Izaberite Status</option>
                <option {{$filter === 'open' ? 'selected' : ''}} value="open">Otvoreno</option>
                <option {{$filter === 'merged' ? 'selected' : ''}} value="merged">Obedinjeno</option>
                <option {{$filter === 'in-review' ? 'selected' : ''}} value="in-review">Na cekanju</option>
            </select>

            <label for="order-select" class="ml-2 mr-1 mb-0 d-flex align-items-center text-white text-lg">Podredaj po:</label><select id="order-select" name="orderBy" class="custom-select select-width ml-2 cursor-pointer">
                <option selected value="">Podredaj Po</option>
                <option {{$orderBy === 'status' ? 'selected' : ''}} value="status">Status</option>
                <option {{$orderBy === 'type' ? 'selected' : ''}} value="type">Tip</option>
                <option {{$orderBy === 'address' ? 'selected' : ''}} value="address">Adresa</option>
            </select>
        </form>

        <div class="mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Tip</th>
                        <th scope="col">Status</th>
                        <th scope="col">Adresa</th>
                        <th scope="col">Child Emails</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <form id="form" action="" method="post">
                        @csrf
                        @foreach($problems as $problem)
                            <tr>
                                <th scope="row">{{ $problem->id }}</th>
                                <td>{{ $problem->name }}</td>
                                <td>{{ $problem->email }}</td>
                                <td>{{ $problem->description }}</td>
                                <td>{{ $problem->readable_type }}</td>
                                <td>{{ $problem->translated_status }}</td>
                                <td>{{ $problem->address }}</td>
                                <td>
                                    @foreach($problem->child_emails as $child_email)
                                        {{$child_email}}

                                        @if($loop->index < count($problem->child_emails) - 1)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td><input id="checkbox-{{ $problem->id }}" type="checkbox" name="problems[]" value="{{$problem->id}}"></td>
                            </tr>
                        @endforeach
                        <input type="hidden" id="status" name="status" value="">
                    </form>
                </tbody>
            </table>

            @if($errors->has('problem'))
                <div class="d-flex justify-content-end">
                    <p class="text-red">{{$errors->first('problem')}}</p>
                </div>
            @endif

            <div class="d-flex justify-content-end">
                <button type="button" id="delete-button" class="btn btn-dark">Izbrisi</button>
                <button type="button" id="merge-button" class="btn btn-dark ml-1">Spoji</button>
                <button type="button" id="close-button" class="btn btn-dark ml-1">Zatvori</button>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $problems->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document ).ready(function(){
            $('#delete-button').click(function (){
                $('#form').attr('action', '/admin/deleteProblems').submit()
            })

            $('#merge-button').click(function (){
                $('#status').val('merged')
                $('#form').attr('action', '/admin/setProblemStatus').submit()
            })

            $('#close-button').click(function (){
                $('#status').val('closed')
                $('#form').attr('action', '/admin/setProblemStatus').submit()
            })

            $('#status-select').on('change', function() {
                $('#status-form').submit();
            })

            $('#order-select').on('change', function() {
                $('#status-form').submit();
            })
        });
    </script>
@endsection
