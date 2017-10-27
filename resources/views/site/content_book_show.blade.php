<div style="margin:20px 50px 0px 50px;">

    <div class="row search-new-book">
        <div class="col-lg-6 col-sm-6">
            {!! Html::link(route('home'),'Back') !!}
        </div>

        <div class="new-book">
            {!! Html::link(route('bookAdd'),'New Book') !!}
        </div>
    </div>

    <table class="table table-bordered">
        <tr class="td-center">
            <td>Title</td>
            <td>Author</td>
            <td>Genre</td>
            <td>Language</td>
            <td>Publication date</td>
            <td>ISBN number</td>
            <td>Image</td>
        </tr>

        <tr class="td-center">
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->genre}}</td>
            <td>{{$book->language}}</td>
            <td>{{$book->publication}}</td>
            <td>{{$book->isbn}}</td>
            <td class="img-detail">
                <img src="{{asset('assets')}}/img/{{$book->image}}" alt="{{$book->title}}" title="{{$book->title}}" />
            </td>
        </tr>

    </table>
</div>


