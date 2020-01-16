@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KNYGŲ SĄRAŠAS</div>
                   <div class="card-body">
                        @foreach ($books as $book)
                            <div class="form-group" style="display:inline-block;">
                                <a href="{{route('book.list',[$book])}}" style="font-size:16px !important;"><b>{{$book->title}}</b> &nbsp <i> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</i> 	&nbsp  </a>
                            </div>
                    
                        <form action="{{route('book.edit',[$book])}}" style="display:inline-block;">
                            <button type="submit" class="btn btn-outline-dark btn-sm">KOREGUOTI</button>
                        </form>
                        <form method="POST" action="{{route('book.destroy', [$book])}}" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark btn-sm">IŠTRINTI</button>
                        </form>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

