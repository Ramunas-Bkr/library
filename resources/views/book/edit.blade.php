@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KNYGOS KOREGAVIMAS</div>

               <div class="card-body">
                <form method="POST" action="{{route('book.update',[$book])}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pavadinimas</label>
                        <input type="text" name="book_title"  class="form-control" value="{{$book->title}}">
                        <small class="form-text text-muted">Knygos pavadinimas.</small>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" name="book_isbn"  class="form-control" value="{{$book->isbn}}">
                        <small class="form-text text-muted">ISBN numeris</small>
                    </div>
                    <div class="form-group">
                        <label>Leidykla</label>
                        <input type="text" name="book_publisher"  class="form-control" value="{{$book->publisher}}">
                        <small class="form-text text-muted">Knygą išleido</small>
                    </div>
                    <div class="form-group">
                        <label>Vertimas</label>
                        <input type="text" name="book_translate"  class="form-control" value="{{$book->translate}}">
                        <small class="form-text text-muted">Vertėjas ir originalo kalba</small>
                    </div>
                    <div class="form-group">
                        <label>Leidimo metai</label>
                        <input type="text" name="book_date"  class="form-control" value="{{$book->date}}">
                        <small class="form-text text-muted">Leidimo metai</small>
                    </div>
                    <div class="form-group">
                        <label>Puslapiai:</label>
                        <input type="text" name="book_pages"  class="form-control" value="{{$book->pages}}">
                        <small class="form-text text-muted">Puslapių skaičius</small>
                    </div>
                    <div class="form-group">
                        <label>Knygos viršelio fotografija:</label>
                        <input type="file" name="book_photo">
                    </div>
                    <div class="form-group">
                        <label> Trumpas knygos aprašymas: </label>
                        <textarea name="book_about" id="summernote">{{$book->about}}</textarea>
                    </div>
                    {{-- <br> --}}
                    <div class="form-group">
                        <label> RAŠYTOJAS: </label>
                        <select name="author_id">
                        @foreach ($authors as $author)
                       
                            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                {{$author->name}} {{$author->surname}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark btn-sm">IŠSAUGOTI</button>
                    </div>
                </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>
@endsection
