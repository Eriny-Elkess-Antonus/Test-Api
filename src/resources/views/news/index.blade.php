@extends('layouts.app')

@section('content')

<div class="container">
    <div class= row>
        <div class="col-xs-12 col-md-12">
          <a href="{{ route('news.create') }}" class="btn btn-block btn-primary">
            AddNew
          </a>
          <br>
            <div class="box-body table-responsive">
               <table id="tbl-list-users" data-server="false" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th> title</th>
                        <th>action</th>
                      </tr>
                    </thead>
                  <tbody>
                      @foreach ($news as $key => $news)
                     <tr>
                      <td>{{$key + 1}}</td>
                      <td>
                            <a class="btn btn-link" href="{{ route('news.show',$news->id) }}">
                                {{$news->title}}
                            </a>
                        </td>
                     <td>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               action
                            </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop<1">
                               
                                        <a class="dropdown-item"
                                            href="{{ route('news.edit',$news->id) }}">
                                            edit
                                        </a>
                                   
                                        {{ Form::open(['route' => ['news.destroy',$news->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
                                        <button type="submit" onclick="return confirm('are you sure?')" class="dropdown-item">
                                            delete
                                        </button>
                                        {{ Form::close() }}
                                     </div>
                            </div>
                       </td>
                     </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection