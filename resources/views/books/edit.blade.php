@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Book</h2>
            </div>

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

    <form action="{{ route('update_books', $book_data->id) }}" method="POST">
        @csrf


        <div class="row">


            <div class="form-group row">
                <label  class="col-sm-12 col-md-2 col-form-label" for="category_id">category</label>
                <div class="col-sm-12 col-md-10">
                    <select name="category_id" id="category_id" class="custom-select" required>
                        <option value="">category</option>
                        @foreach ($category_data as $category)
                            @if($book_data->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="book_name" value="{{ $book_data->book_name }}" class="form-control">
                </div>
            </div>







            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>author:</strong>
                    <input type="text" name="book_author" value="{{ $book_data->book_author }}" class="form-control">
                </div>
            </div>



            <div class="form-group row">
                <label  class="col-sm-12 col-md-2 col-form-label" for="publisher_id">publisher</label>
                <div class="col-sm-12 col-md-10">
                    <select name="publisher_id" id="publisher_id" class="custom-select" required>
                        <option value="">publisher</option>
                        @foreach ($publisher_data as $publisher)
                            @if($book_data->publisher_id == $publisher->id)
                                <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                            @else
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="ISBN" class="form-control"
                           value="{{ $book_data->ISBN }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Barcode:</strong>
                    <input type="text" name="barcode" class="form-control"
                           value="{{ $book_data->barcode }}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>key_words:</strong>
                    <input type="text" name="key_words" class="form-control"
                           value="{{ $book_data->key_words }}">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="Description">{{ $book_data->Description }}</textarea>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
@endsection