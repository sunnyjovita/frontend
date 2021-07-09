@extends('master')

@section('content')
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>My products</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/css/product.css">

</head>
 @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif


              @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('message') }}
              </div>
              @endif



<body style="height: 100%; ">
    <section>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>My products</h2>
            </div>
            <div class="pull-right">
                <button class="btn btn-success" id="btn-add">Create New Product</button>
                <!-- <a id="btn-add" class="btn btn-success" href="#"> Create New Product</a> -->
            </div>
        </div>
    </div>


    <table class="table table-bordered" >
        <tr>
            <!-- <th>No</th> -->
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <div class="trending-wrapper">

            @foreach($products as $item)
  
                <tr>
                    <td> <img width="150px" src="{{asset('storage/'.$item['image'])}}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/no-image.png';" /></td>

        <!--   <td><img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" width="150px"></td> -->
                    <td><a href="/clothes/details/{{$item['id']}}">
                        <h3>{{$item['title']}}</h3>
                    </a>
                    </td>

                    <td>{{$item['price']}}</td>

                    <td>
                        <form action="/delete/clothes/{{$item['id']}}" method="POST">
                            <button class="btn btn-info open-modal" value="{{$item['id']}}">Edit
                            </button>
                           
                            <!-- <a class="btn btn-primary" href="/update/clothes/{{$item['id']}}">Edit</a> -->
                        {{method_field('DELETE')}}
                        {!! csrf_field() !!}
                             <button class="btn btn-danger delete-link" value="{{$item['id']}}">Delete
                            </button>
                            <!-- <button type="submit" class="btn btn-danger" value="delete">Delete</button> -->
                        </form>
                    </td>
                </tr>
            @endforeach


    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

     <!-- <div class="modal fade" id="linkEditorModal" aria-hidden="true"> -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Add Product</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" name="type" -->
                                               <!-- placeholder="type" value=""> -->
                                        <select id="drop-down" name="type" class="browser-default custom-select" id="type">
                                            <option selected="" ></option>
                                            <option value="Clothes">Clothes</option>
                                            <option value="Automotive">Automotive</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Condition</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" name="type" -->
                                               <!-- placeholder="type" value=""> -->
                                        <select id="drop-down" name="type" class="browser-default custom-select" id="condition">
                                            <option selected="" ></option>
                                            <option value="New">New</option>
                                            <option value="Used">Used</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-8 control-label">Price 
                                        <h6>IDR (Indonesian rupiah)</h6>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control pricetag input-currency" type-currency="IDR" name="price" placeholder="Enter price" value="" id="price">
                                    </div>
                                </div>

                                 <script>
                                    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
                                        element.addEventListener('keyup', function(e) {
                                            let cursorPostion = this.selectionStart;
                                            let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                                            let originalLenght = this.value.length;

                                            if (isNaN(value)) {
                                                this.value = "";
                                            }
                                            else {    
                                                this.value = value.toLocaleString('id-ID', {
                                                    currency: 'IDR',
                                                    style: 'currency',
                                                    minimumFractionDigits: 0
                                                });
                                            cursorPostion = this.value.length - originalLenght + cursorPostion;
                                            this.setSelectionRange(cursorPostion, cursorPostion);
                                            }
                                        });
                                        });
                                </script>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" id="description" class="form-control" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="image" class="form-control" name="image" placeholder="image">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save product</button>
                            <input type="hidden" id="link_id" name="link_id" value="0">
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        

</section>
     <!--jQuery Library-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!--Popper JS-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!--compiled Javascript-->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!--owl carousel-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
    <!--javascript-->
    <!-- <script type="text/javascript" src="/js/main.js"></script> -->
</body>
</html>

@endsection
