@extends('layouts.app');

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Services Id</th>
          <th scope="col">Services Name</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=0; ?> 
        @foreach($services as $docservices)
        <tr>
          <td><?=++$id;?></td>
          <td>{{$docservices->name}}</td>
        </tr>
        @endforeach;

      </tbody>
    </table>


@stop