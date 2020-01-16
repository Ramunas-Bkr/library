<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$book->title}} pdf</title>
    <style>
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: url({{asset('fonts/Roboto-Regular.ttf')}});
        }
        @font-face {
        font-family: 'Roboto';
        font-style: italic;
        font-weight: 400;
        src: url({{asset('fonts/Roboto-Regular.ttf')}});
        }
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: bold;
        src: url({{asset('fonts/Roboto-Bold.ttf')}});
        }
        @font-face {
        font-family: 'Roboto';
        font-style: italic;
        font-weight: bold;
        src: url({{asset('fonts/Roboto-Bold.ttf')}});
        }
        * {
            font-family: 'Roboto' !important; 
        }
    
    </style>
</head>
<body> 
    @if (!empty($book->photo))
    <br><br><br>
    <img src="{{asset('/img')}}/{{$book->photo}}" style="max-height: 350px; width: auto;"> 
    @endif
    <h1>{{$book->title}}</h1>
    <h2> <i>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</i></h2>
    <div class="form-group">
                        <label>ISBN: {{$book->isbn}}</label><br>
                        <label> <b> Leidėjas: </b> {{$book->publisher}} </label><br>
                        <label> <b> Leidimo metai: </b> {{$book->date}}</label><br>
                        <label> <b> Vertimas: </b> {{$book->translate}} </label> <br>
                        <label> <b> Puslapių skaičius: </b>{{$book->pages}}</label><br>
                    </div>
                    <div class="form-group">
                       <b>Knygos aprašymas:</b>
                       <div name="book_about">{!!$book->about!!}</div>
                    </div>

</body>
</html>