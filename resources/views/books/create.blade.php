@extends('layouts.app')
@if(isset($_GET['search']))
    @php($search = $_GET['search'])
@else
    @php($search = '')
@endif
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('books') }}" title="Go back"> <i class="fas fa-backward "></i> </a>--}}
{{--            </div>--}}
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <form  action="{{ route('search_books') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="search" aria-label="" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button  style="

    color: #fff;
    background-color: #0275d8;
    border-color: #0275d8;
    margin-top: 10px;
    position: absolute;
    left: 231px;
    bottom: 1px;


" class="btn btn-primary" type="submit">search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <form action="{{ route('store_books') }}" method="POST" >
        @csrf



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="category_id">Categories:</strong>
                    <select name="category_id" id="category_id" class="custom-select" required>
                        <option value="">@lang('tr.Select category')</option>
                        @foreach ($category_data as $allcat)
                            <option value="{{ $allcat->id }}">{{$allcat->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>



            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Book_Name:</strong>
                    <input type="text" name="book_name" class="form-control" placeholder="Name">
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="book_author" class="form-control" placeholder="Author">
                </div>
            </div>





            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="publisher_id">Publishers:</strong>
                    <select name="publisher_id" id="publisher_id" class="custom-select" required>
                        <option value="">@lang('tr.Select publisher')</option>
                        @foreach ($publisher_data as $allpublisher)
                            <option value="{{ $allpublisher->id }}">{{$allpublisher->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>



            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="ISBN" class="form-control" placeholder="ISBN">
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Barcode:</strong>
                    <input type="text" name="barcode" class="form-control" placeholder="barcode">
                </div>
            </div>




            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>key_words:</strong>
                    <input type="text" name="key_words" class="form-control" placeholder="key words">
                </div>
            </div>



            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:100px" name="Description"
                              placeholder="Description"></textarea>
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>

            <th>Book Name</th>
            <th>Categories</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>

                <td>{{ $book->book_name }}</td>
                <td>{{ $book->category->name }}</td>

                <td>

                        <a href="{{ route('edit_books', $book->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                </td>
            </tr>
        @endforeach
    </table>


@endsection