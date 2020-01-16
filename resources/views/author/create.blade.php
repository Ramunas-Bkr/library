@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">NAUJAS RAŠYTOJAS</div>
                   <div class="card-body">
                     <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
                        Vardas: <input type="text" name="author_name" value="{{old('author_name')}}">
                        Pavardė: <input type="text" name="author_surname" value="{{old('author_surname')}}"><br><br>
                        Foto: <input type="file" name="author_photo">
                        @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">PRIDĖTI</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
