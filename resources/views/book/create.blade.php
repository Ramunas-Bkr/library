@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PRIDĖTI NAUJĄ KNYGĄ</div>

               <div class="card-body">
                <form method = "POST" action = "{{route ('book.store')}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pavadinimas</label>
                        <input type="text" name="book_title"  class="form-control">
                        <small class="form-text text-muted">Knygos pavadinimas.</small>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" name="book_isbn"  class="form-control">
                        <small class="form-text text-muted">ISBN numeris</small>
                    </div>
                    <div class="form-group">
                        <label>Leidykla</label>
                        <input type="text" name="book_publisher"  class="form-control">
                        <small class="form-text text-muted">Knygą išleido</small>
                    </div>
                    <div class="form-group">
                        <label>Vertimas</label>
                        <input type="text" name="book_translate"  class="form-control">
                        <small class="form-text text-muted">Vertėjas ir originalo kalba</small>
                    </div>
                    <div class="form-group">
                        <label>Leidimo metai:</label>
                        <input type="text" name="book_date"  class="form-control">
                        <small class="form-text text-muted">Įvesti leidimo metus</small>
                    </div>
                    <div class="form-group">
                        <label>Puslapiai:</label>
                        <input type="text" name="book_pages"  class="form-control">
                        <small class="form-text text-muted">Puslapių skaičius</small>
                    </div>
                    <div class="form-group">
                        <label>Knygos viršelio fotografija:</label>
                        <input type="file" name="book_photo">
                    </div>
                    <div class="form-group">
                        <label> Trumpas knygos aprašymas: </label>
                        <textarea name="book_about" id="summernote"></textarea>
                    </div>
                    {{-- Title: <input type="text" name="book_title"> --}}
                    {{-- ISBN: <input type="text" name="book_isbn">
                    Pages: <input type="text" name="book_pages"> --}}
                    {{-- About: <textarea name="book_about" id="summernote"></textarea> --}}
                    <div class="form-group">
                        <label> Rašytojas: </label>
                        <select name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                        </select>
                    </div>
                   
                    <div class="form-group">
                        @csrf
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
