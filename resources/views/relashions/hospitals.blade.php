@extends('layouts.app');

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Hospital Id</th>
          <th scope="col">Hospital Name</th>
          <th scope="col">Hospital Adress</th>
          <th scope="col">Controllers</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=0; ?> 
        @foreach($hospitals as $data)
        <tr>
          <td><?=++$id;?></td>
          <td>{{$data->name}}</td>
          <td>{{$data->adress}}</td>
          <td>
            <a href="{{route('showdoc',$data->id)}}" class="btn btn-info">Show Doctors</a>
            <a href="{{route('delhos',$data->id)}}" class="btn btn-danger">Delete Doctors</a>

            
          </td>
        </tr>
        @endforeach;

      </tbody>
    </table>















@stop