@extends('layouts.app')

@section('content')
  <div class="col col-lg-12">
        <div class="flex-center position-ref full-height">
          <div class="content">
            <div class="title m-b-md">
                <center>
                  <h1>{{__('messages.Edite Your Offers')}}</h1>
                </center>
            </div> 
            <div class="alert alert-success msg" role="alert" style="display: none;">
              your offer updated successfully 
            </div>            
            <form class="edtform">
            @csrf
              <input type="hidden" name="offer_id" value="{{$offer->id}}">
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.img')}}</label>
                <input type="file" name="img"  class="form-control" placeholder="" >
                  @error('img')                  
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.titlename_ar')}}</label>
                <input type="text" name="title_ar" value="{{$offer->title_ar}}" class="form-control" placeholder="{{__('messages.titelholder_ar')}}" >
                  @error('title_ar')                  
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.titlename_en')}}</label>
                <input type="text" name="title_en" value="{{$offer->title_en}}" class="form-control" placeholder="{{__('messages.titelholder_en')}}" >
                  @error('title_en')                  
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.detailsname_ar')}}</label>
                <input type="text" name="details_ar" value="{{$offer->details_ar}}" class="form-control" placeholder="{{__('messages.detailsholder_ar')}}">
                  @error('details_ar')
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.detailsname_en')}}</label>
                <input type="text" name="details_en" value="{{$offer->details_en}}" class="form-control" placeholder="{{__('messages.detailsholder_en')}}">
                  @error('details_en')
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.pricename')}}</label>
                <input type="text" name="price" value="{{$offer->price}}" class="form-control" placeholder="{{__('messages.priceholder')}}">
                  @error('price')
                <small id="emailHelp" class="text text-danger">{{$message}}</small>
                 @enderror()
              </div>
              
              <button class="btn btn-primary edtajax">{{__('messages.offeredite')}}</button>
            </form>
        </div>
  </div>
</div>

@stop

@section('scripts')

   <script>

        $('.edtajax').click(function (e) {
         e.preventDefault();

            var formData = new FormData($('.edtform')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('offersupdateajax')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                   if(data.status == true){
                    $('.msg').show();
                   } 
                }, error: function (reject) {
                }
            });
        });


    </script>
  


@stop       

