@extends('layout')

@section('content_loged')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<a href="{{ route('shares.create')}}" class="btn btn-primary" style="background-color: green;">+ Add</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>имя</td>
          <td>Stock Price</td>
          <td>Stock Quantity</td>
          <td>Fname</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td><?=$share->share_name;?></td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td>  <img src="{{ asset('images/'.$share->share_photo.'') }}" alt="" width="100px;" /> </td>
            <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
@section('content_not_loged')
	<section class="no-touch">

  <div class="wrap">
@foreach($shares as $share)
    <div class="box">
      <div class="boxInner">
        <img src="{{ asset('images/'.$share->share_photo.'') }}" />
        <div class="titleBox"><p><?=$share->share_name; ?></p><br /> <p>цена: {{$share->share_price}}</p> </div>
      </div>
    </div>
@endforeach
   
  </div>

</section>
@endsection