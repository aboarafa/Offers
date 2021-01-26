@extends('layouts.app')

@section('content')
<div class="col col-lg-12">
  <div class="flex-center position-ref full-height">
           <div class="content">
              <div class="title m-b-md ">
                <center>
                  <h1> {{__('messages.Add Your Offers')}}</h1>
                </center>
              </div>  
              <div class="alert alert-success" id="success_msg" role="alert" style="display: none;">
              your offer added successfully 
            </div>                   
            <form class="formdata">
                @csrf
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.img')}}</label>
                <input type="file" name="img" class="form-control" placeholder="" >
                                
                <small id="img_error" class="text text-danger"></small>
                 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.titlename_ar')}}</label>
                <input type="text" name="title_ar" class="form-control" placeholder="{{__('messages.titelholder_ar')}}" >
                                  
                <small id="title_ar_error" class="text text-danger"></small>
                 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">{{__('messages.titlename_en')}}</label>
                <input type="text" name="title_en" class="form-control" placeholder="{{__('messages.titelholder_en')}}" >         
                 <small id="title_en_error" class="text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.detailsname_ar')}}</label>
                <input type="text" name="details_ar" class="form-control" placeholder="{{__('messages.detailsholder_ar')}}">
                <small id="details_ar_error" class="text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.detailsname_en')}}</label>
                <input type="text" name="details_en" class="form-control" placeholder="{{__('messages.detailsholder_en')}}">
                <small id="details_en_error" class="text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.pricename')}}</label>
                <input type="text" name="price" class="form-control" placeholder="{{__('messages.priceholder')}}">
                <small id="price_error" class="text text-danger"></small>     
              </div>
                
              <button  class="btn btn-primary crtajax">{{__('messages.offersave')}}</button>
            </form>
        </div>
  </div>

@stop

@section('scripts')
    <script>

        $('.crtajax').click(function (e) {
            e.preventDefault();

            $('#img_error').text('');
            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#price_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');

            var formData = new FormData($('.formdata')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('storeajax')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

    </script>
@stop