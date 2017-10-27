<div style="margin:20px 50px 0px 50px;">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



            <div class="row search-new-book">
                <div class="col-lg-6 col-sm-6">
                    <form action="" method="GET">
                        <input type="text" name="book" required placeholder="Search"/>
                        <button type="submit">Go</button>
                    </form>
                </div>

                <div class="new-book">
                    {!! Html::link(route('bookAdd'),'New Book') !!}
                </div>
            </div>


        @if($name)
            <div>
                <p>Result for search <b>"{{$name}}" :</b></p>
            </div>
        @endif


        @if ($books)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Genre</td>
                    <td>Language</td>
                    <td>Publication date</td>
                    <td>ISBN number</td>
                </tr>
                </thead>

                <tbody>
                    @foreach($books as $key => $book)
                        <tr class="poster">
                            <td><a href="{{route('showBook', array('book'=>$book->id))}}" class="link">{{ $book-> title }}</a> <a href="{{route('bookEdit', array('book'=>$book->id))}}" class="pencil-edit link"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td>{{ $book-> author }}</td>
                            <td>{{ $book-> genre }}</td>
                            <td>{{ $book-> language }}</td>
                            <td>{{ $book-> publication }}</td>
                            <td>{{ $book-> isbn }}</td>
                            <td class="img"><img src="{{asset('assets')}}/img/{{$book->image}}" alt="{{$book->title}}" title="{{$book->title}}" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="div-center">
                <div class="pagination">
                    @if($books->lastPage() > 1)
                        @if($books->currentPage() !== 1)
                            <a href="{{$books->url(($books->currentPage() -1 ))}}">{{Lang::get('pagination.previous')}}</a>
                        @endif

                        @for($i=1; $i<= $books->lastPage(); $i++ )
                            @if($books->currentPage() == $i)
                                <a href="{{$books->url($i)}}" class="selected disabled">{{$i}}</a>
                            @else
                                <a href="{{$books->url($i)}}">{{$i}}</a>
                            @endif
                        @endfor

                        @if($books->currentPage() !== $books->lastPage())
                            <a href="{{$books->url(($books->currentPage() + 1 ))}}">{{Lang::get('pagination.next')}}</a>
                        @endif
                    @endif
                </div>
            </div>

        @else
          Sorry,  No result!
        @endif

</div>




