@extends('layouts.app');

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Doctors Id</th>
          <th scope="col">Doctors Name</th>
          <th scope="col">Doctors Adress</th>
          <th scope="col">Doctors Services</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=0; ?> 
        @foreach($doctors as $datadoc)
        <tr>
          <td><?=++$id;?></td>
          <td>{{$datadoc->name}}</td>
          <td>{{$datadoc->qesm}}</td>
          <td>
          <a href="{{route('showservices',$datadoc->id)}}" class="btn btn-info">Show Services</a>
            
          </td>
        </tr>
        @endforeach;

      </tbody>
    </table>


@stop