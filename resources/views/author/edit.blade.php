@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">RAŠYTOJO KOREGAVIMAS</div>

               <div class="card-body">
                <form method="POST" action="{{route('author.update',[$author])}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Vardas:</label>
                        <input type="text" name="author_name"  class="form-control" value="{{old('author_name',$author->name)}}">
                        <small class="form-text text-muted">Rašytojo vardas</small>
                    </div>
                    <div class="form-group">
                        <label>Pavardė:</label>
                        <input type="text" name="author_surname" class="form-control" value="{{old('author_name',$author->surname)}}">
                        <small class="form-text text-muted">Rašytojo pavardė</small>
                    </div>
                    <div>
                        <label>Foto:</label>
                        <input type="file" name="author_photo">
                        <small class="form-text text-muted">Rašytojo fotografija</small>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">IŠSAUGOTI</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
