{!! Form::open(['url' => 'posts/create', 'method' => 'posts'])  !!}
    <div class="form-group">
        {!!Form::label('url','URL入力欄')!!}
        <div class="col-md-6">
            {!!Form::text('url', '', ['size' => '50', 'class' => 'text'])!!}
        </div>
        <div class="error">
            <p>{{ $errors->first('url') }}</p>
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('title','タイトル入力欄')!!}
        <div class="col-md-6">
            {!!Form::text('title', '', ['size' => '50', 'class' => 'text'])!!}
        </div>
        <div class="error">
            <p>{{ $errors->first('title') }}</p>
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('description','コメント入力欄')!!}
        <div class="col-md-6">
            {!! Form::textarea('description', '', ['size' =>'47x10', 'class' => 'text']) !!}
        </div>
        <div class="error">
            <p>{{ $errors->first('description') }}</p>
        </div>
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-block btn-primary mt-5']) !!}
{!! Form::close()  !!}
