<div class="wrapper container-fluid" style="margin:20px 50px 0px 50px;">
    {!! Form::open(['url' => route('bookEdit',array('portfolio'=>$data['id'])),'class'=>'form-horizontal createBook','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('title', 'Name:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Enter title']) !!}
        </div>
    </div>





    <div class="form-group">
        {!! Form::label('filter_alias', 'Author:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            <select class="form-control" name="author">
                @foreach($authors as $item)
                    <option @if($data['author'] == $item->name) selected  @endif value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('filter_alias', 'Genre:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            <select class="form-control" name="genre">
                @foreach($genres as $item)
                    <option @if($data['genre'] == $item->name) selected  @endif value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('language', 'Language:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('language', $data['language'], ['class' => 'form-control','placeholder'=>'Enter language']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('publication', 'Publication date:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('publication', $data['publication'], ['class' => 'form-control input-mask','placeholder'=>'Enter publication date', 'data-mask'=>'9999']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('isbn', 'Isbn number:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('isbn', $data['isbn'], ['class' => 'form-control input-mask','placeholder'=>'Enter isbn number', 'data-mask'=>'999-9999999999' ]) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('old_image', 'Image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/'.$data['image'],'',['class'=>'img-circle img-responsive','width'=>'350px']) !!}
            {!! Form::hidden('old_image', $data['image']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Change image','data-buttonName'=>"btn-primary",'data-placeholder'=>"File not"]) !!}
        </div>
    </div>



    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}




</div>