@extends('adminmaster')

@section('title')
    Edit-Create Article
@endsection


@section('breadcrumb')
    <li class="active">Edit-Create Article</li>
@endsection


@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit-Create Article</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open( array('route' => array('admin.article.create'))) !!}
                <div class="row">
                  <div class="col-md-12">
                    @if ($errors->any())
                      {!! implode('', $errors->all('<div style=color:red><b>:message</b></div>')) !!}
                    @endif
                  </div>
                </div>
                <div class="box-body">
                      {!! Form::input('id','id', $article->id ? $article->id :0 , ['class' => 'form-control','class'=>'hidden']) !!}

                    <div class="form-group">
                        {!! Form::label('title_ar', 'Title AR') !!}
                        {!! Form::text('title_ar', $article->title_ar , ['class' => 'form-control','placeholder'=>'Title AR','maxlength'=>20]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title_en', 'Title EN') !!}
                        {!! Form::text('title_en', $article->title_en , ['class' => 'form-control ','placeholder'=>'Title EN','maxlength'=>20]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content_ar', 'Content AR') !!}
                        <div id="content_ar">
                        </div>
                        {!! Form::hidden('content_ar_pre', $article->content_ar , ['class' => 'form-control content-data','placeholder'=>'Content AR']) !!}
                        {!! Form::hidden('content_ar_custom', '' , ['class' => 'form-control content-data','placeholder'=>'Content AR']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content_en', 'Content EN') !!}
                        {!! Form::textarea('content_en', $article->content_en , ['class' => 'form-control content-data','placeholder'=>'Content EN']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::input('selected_user','selected_user', $article->user ? $article->user :'' , ['class' => 'form-control','class'=>'hidden']) !!}
                        {!! Form::label('user_id', 'User') !!}
                        {!! Form::select('user_id',[],$article->user_id,['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <div class="box-footer">
                      <button id="save" type="submit" class="btn btn-primary final-save">Save</button>
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </div>
    </div>

    <div class="modal fade" id="gif-modal" tabindex="-1" role="dialog" aria-labelledby="addSubscriptionModal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                              aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

          </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
  <script type="text/javascript" src={{ URL::asset('/js/editorjs/editor.js') }}></script>
  <script type="text/javascript" src={{ URL::asset('/js/editorjs/gif.js') }}></script>
  <script type="text/javascript" src={{ URL::asset('/js/admin/articles.create.js') }}></script>
@endsection
