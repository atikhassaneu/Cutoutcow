@extends('layouts.user')

@section('content')

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="upload my-3">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">start here </p><span class="small"> The first 3 images are free!</span>
                    </div>
                    <div class="card-body">
                        <form id="dropzoneFrom" class="dropzone" action="{{route('user.image-upload')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="watermark" name="watermark" value="0">
                            <input type="hidden" id="reflection" name="reflection" value="0">

                        </form>
                        <button id="submit-all" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>

            <div class="data"></div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="image-rate">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">CONFIGURE YOUR ORDER</p>  <span> <small>Choose your image output settings</small></span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td width="10%">
                                    <input checked  type="checkbox" disabled name="default">
                                </td>
                                <td width="60%">By default, both <b>JPG</b> and <b>PNG</b> are enabled</td>
                                <td width="5%"><a href="" class="btn btn-primary btn-sm">Info</a></td>
                                <td width="25%" class="text-center"><span id="defaultPrice">1.25</span> $ <br> <b>per image</b></td>

                            </tr>
                            <tr>
                                <td width="10%">
                                    <input type="checkbox" id="reflectionId" name="reflection">
                                </td>
                                <td width="60%">Enable <b>reflection</b> option for mirroring effect</td>
                                <td width="5%"><a href="" class="btn btn-primary btn-sm">Info</a></td>
                                <td width="25%" class="text-center" id="reflectionPrice">+.25 $ <br> <b>per image</b></td>

                            </tr>
                            <tr>
                                <td width="10%">
                                    <input type="checkbox" name="watermark" id="watermarkId">
                                </td>
                                <td width="60%">Enable <b>watermark</b> option to ensure ownership</td>
                                <td width="5%"><a href="" class="btn btn-primary btn-sm">Info</a></td>
                                <td width="25%" class="text-center" id="watermarkPrice">+.25 $ <br> <b>per image</b></td>
                            </tr>
                        </table>

                        <table class="table table-borderless">

                            <tr>
                                <td><span id="image">0</span> x</td>
                                <td colspan="2" id="title">JPG, PNG @ 1.25 $ per image</td>
                                <td><span id="imagePrice">0.00</span> $</td>
                            </tr>

                            <tr>
                                <td width="10%"></td>
                                <td width="60%"></td>
                                <td width="15%">TAX(0%)</td>
                                <td width="15%">0.00$</td>
                            </tr>

                            <tr>
                                <td width="10%"></td>
                                <td width="60%"></td>
                                <td width="15%"><b>TOTAL</b></td>
                                <td width="15%"><b id="total">0.00</b> $</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <form action="#" method="post">
                    <div class="card-header">
                        <p class="text-uppercase text-primary d-inline font-weight-bold">CHECKOUT</p> <span><small>Fulfill your order by choosing a payment method</small></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span><input type="radio" name="payment_method" id="paypal" class="mr-2"></span> <label for="paypal"><img src="{{asset('/images/paypal.png')}}" alt=""></label>
                            </div>
                            <div class="col-8">
                                <span><input type="radio" name="payment_method" id="creditCard" class="mr-2"></span> <label for="creditCard"><img src="{{asset('/images/creditcard.png')}}" alt=""></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Submit Order">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('js')

    <script>


        $('#reflectionId').change(function () {
           if($(this).is(":checked")){
               $("#reflection").val('1');
               calculatePrice();
               
           }else{
               $("#reflection").val('0');
               calculatePrice();
           }
        });

        $('#watermarkId').change(function () {
           if($(this).is(":checked")){
               $("#watermark").val('1');
               calculatePrice();
           }else{
               $("#watermark").val('0');
               calculatePrice();
           }
        });




        Dropzone.options.dropzoneFrom = {
            autoProcessQueue: false,
            preventDuplicates: true,
            acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            uploadMultiple:true,
            parallelUploads:20,
            maxFiles:20,


            init: function(){

                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                submitButton.addEventListener("click", function(){
                    myDropzone.processQueue();
                });
                this.on("drop", function(event) {
                    console.log(dropzoneFrom.files);
                });
                this.on("addedfile", function(file) {
                    calculatePrice();
                });
                this.on("removedfile", function(file) {
                    calculatePrice();
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }

                });
            },
        };

        
        
        function calculatePrice() {
            let defaultPrice = 1.25;
            let reflectionPrice = .25;
            let watermarkPrice = .25;
            let price = defaultPrice;
            var title = "JPG, PNG @ "+price+" $ per image";


            if($("#watermarkId").is(":checked")){
                price = price+watermarkPrice;
            }

            if($("#reflectionId").is(":checked")){
                price = price+reflectionPrice;
            }

            if($("#watermarkId").is(":checked") && $("#reflectionId").is(":checked")){
                 title = "JPG, PNG, reflection, watermark @ "+price+" $ per image";
            }else if ($("#watermarkId").is(":checked")){
                 title = "JPG, PNG, watermark @ "+price+" $ per image";
            }else if($("#reflectionId").is(":checked")){
                 title = "JPG, PNG, reflection @ "+price+" $ per image";
            }

            let image_length = $('.dz-preview').length;
            let totalPrice = image_length*price;

            $('#title').html(title);
            $('#image').html(image_length);
            $('#imagePrice').html(totalPrice);
            $('#total').html(totalPrice);
        }

    </script>

@endpush