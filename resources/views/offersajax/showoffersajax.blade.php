@extends('layouts.app')

@section('content')
     
  <div class="col col-lg-12">
    <div class="alert alert-success msg" role="alert" style="display:none">
        your offer deleted successfully
    </div>
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
        <?php $id=0 ?> 
        @foreach($selectall as $select)
        <tr class="delrow{{$select -> id}}">
          <td><?=++$id;?></td>
          <td>{{$select->title}}</td>
          <td>{{$select->details}}</td>
          <td>{{$select->price}}</td>
          <td>
            <img src="{{asset('images/offers/'.$select->img)}}" style="width: 50px;height: 50px; border-radius:50%;">
          </td>
          <td>
            <a href="{{url('editeajax/'.$select->id)}}" class="btn btn-primary ">{{__('messages.editeajaxname')}}</a>

             <button data_id ="{{$select->id}}" class="btn btn-danger delajax">{{__('messages.deleteajaxname')}}</button>
          </td> 
        </tr>
        @endforeach;

      </tbody>
    </table>
    </div> 
@stop
@section('scripts')

  <script>

        $('.delajax').click(function (e) {
            e.preventDefault();

              var offer_id =  $(this).attr('data_id');

            $.ajax({
                type: 'post',
                 url: "{{route('deleteajax')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id' :offer_id
                },
                success: function (data) {

                    if(data.status == true){
                        $('.msg').show();
                    }
                    $('.delrow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });


  </script>








@stop

