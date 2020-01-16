@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KNYGOS INFORMACIJA</div>
               <div class="card-body">
                    <div class="form-group">
                        <h2><b>{{$book->title}}</b></h2>
                        <h5>
                            <i>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</i>
                        </h5>
                    </div>
                    @if (!empty($book->photo))
                        <img src="{{asset('/img')}}/{{$book->photo}}" style="max-height: 350px; width: auto;"> <br><br><br>
                    @endif
                    <div class="form-group">
                        <label>ISBN: {{$book->isbn}}</label><br>
                        <label> <b> Leidėjas: </b> {{$book->publisher}} </label><br>
                        <label> <b> Leidimo metai: </b> {{$book->date}}</label><br>
                        <label> <b> Vertimas: </b> {{$book->translate}} </label> <br>
                        <label> <b> Puslapių skaičius: </b>{{$book->pages}}</label><br>
                    </div>
                    <div class="form-group">
                       <label><b>Knygos aprašymas:</b></label>
                       <div name="book_about">{!!$book->about!!}</div>
                    </div>
                    
                    <form action="{{route('book.edit',[$book])}}" style="display:inline-block;">
                        <button type="submit" class="btn btn-outline-dark btn-sm">KOREGUOTI</button>
                    </form>
                    <form method="POST" action="{{route('book.destroy', [$book])}}" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-sm">IŠTRINTI</button>
                    </form>
                    <form action="{{route('book.pdf',[$book])}}" style="display:inline-block;">
                        <button type="submit" class="btn btn-outline-dark btn-sm">GENERUOTI PDF</button>
                    </form>
               
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
