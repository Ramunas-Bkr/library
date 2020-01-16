@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">RAŠYTOJAI</div>
                    <div class="card-body">
                        @foreach ($authors as $author)
                    <div class="form-group" style="display:inline-block;">
                        <a href="{{route('author.list',[$author])}}"style="font-size:16px !important;"> {{$author->surname}} {{$author->name}} &nbsp &nbsp </a>
                    </div>
                    
                    <form action="{{route('author.edit',[$author])}}" style="display:inline-block;">
                        <button type="submit" class="btn btn-outline-dark btn-sm">KOREGUOTI</button>
                    </form>
                    <form method="POST" action="{{route('author.destroy', [$author])}}" style="display:inline-block">
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
