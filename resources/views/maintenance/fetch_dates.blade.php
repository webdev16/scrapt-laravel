@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <table class="table">
        <thead>
          <tr>
            <th>Township</th>
            <th>Type</th>
            <th>Open Date</th>
            <th>Close Date</th>
            <th>Refresh Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dateAppeals as $obj)
            <tr>
              <td>{!! $obj->township->name !!}</td>
              <td>{!! $obj->type !!}</td>
              <td>{!! $obj->open ? $obj->open->format('Y-m-d') : '' !!}</td>
              <td>{!! $obj->close ? $obj->close->format('Y-m-d') : '' !!}</td>
              <td>{!! $obj->refresh ? $obj->refresh->format('Y-m-d') : '' !!}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
