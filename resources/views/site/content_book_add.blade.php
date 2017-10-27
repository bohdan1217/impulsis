<div class="wrapper container-fluid" style="margin:20px 50px 0px 50px;">

    <p class="form-result"></p>

    {!! Form::open(['url' => route('bookAdd'),'class'=>'form-horizontal createBook','method'=>'POST','enctype'=>'multipart/form-data']) !!}


    <div class="form-group">
        {!! Form::label('title','Title',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('title',old('title'),['class' => 'form-control','placeholder'=>'Enter title'])!!}
        </div>
    </div>



    <div class="form-group">
        {!! Form::label('author', 'Author:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            <select class="form-control" name="author">
                @foreach($authors as $author)
                    <option value="{{$author->name}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('genre', 'Genre:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            <select class="form-control" name="genre">
                @foreach($genres as $genre)
                    <option value="{{$genre->name}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('language','Language',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('language',old('language'),['class' => 'form-control','placeholder'=>'Enter language'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('publication','Publication Year',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('publication',old('publication'),['class' => 'form-control input-mask','placeholder'=>'Enter publication year', 'data-mask'=>'9999'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('isbn','ISBN number',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('isbn',old('isbn'),['class' => 'form-control input-mask','placeholder'=>'Enter isbn', 'data-mask'=>'999-9999999999' ])!!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('image', 'Image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Select image','data-buttonName'=>"btn-primary",'data-placeholder'=>"File not"]) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>



    {!! Form::close() !!}



</div>
