@extends('layouts.app')

@section('content')

    <div class="col col-lg-12">
     @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

     <table class="table">
      <thead>
        <tr>
          <th scope="col">{{__('messages.idname')}}</th>
          <th scope="col">{{__('messages.title')}}</th>
          <th scope="col">{{__('messages.details')}}</th>
          <th scope="col">{{__('messages.pricename')}}</th>
          <th scope="col">{{__('messages.img')}}</th>
          <th scope="col">{{__('messages.controles')}}</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=0; ?> 
        @foreach($selectall as $select)
        <tr>
          <td><?=++$id;?></td>
          <td>{{$select->title}}</td>
          <td>{{$select->details}}</td>
          <td>{{$select->price}}</td>
          <td>
            <img src="{{asset('images/offers/'.$select->img)}}" style="width: 50px;height: 50px; border-radius:50%;">
          </td>
          <td>
            <a href="{{url('edite/'.$select->id)}}" class="btn btn-primary">{{__('messages.editename')}}</a>

            <a href="{{route('delete',$select->id)}}" class="btn btn-danger">{{__('messages.deletename')}}</a>
          </td>
        </tr>
        @endforeach;

      </tbody>
    </table>
     <div class="d-flex justify-content-center"> {!! $selectall->links() !!} </div>
    </div>
@stop
  </body>
</html>
