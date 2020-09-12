@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create_categories') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>

            <th>Name</th>

        </tr>
        @foreach ($categories as $category)
            <tr>

                <td>{{ $category->name }}</td>


            </tr>
        @endforeach
    </table>


@endsection