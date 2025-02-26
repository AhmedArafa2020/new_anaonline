@extends('layouts.app')

@php
    $theme_name = !empty(env('DATA_INSERT_APP_THEME')) ? env('DATA_INSERT_APP_THEME') : APP_THEME();
    $out_of_stock_threshold =\App\Models\Utility::GetValueByName('out_of_stock_threshold',$theme_name);
@endphp
@section('page-title', __('Product Auto Poster'))

@section('action-button')
    <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
        {{-- @can('Manage Variants')
            <a href="{{ route('admin.product-variant.index') }}" class="btn btn-sm btn-primary mx-1" data-toggle="tooltip"
                title="{{ __('Create Variant') }}">
                {{ __('Add Variant') }}
            </a>
        @endcan --}}

{{--        @can('Create Products')--}}
{{--            <a href="#" class="btn btn-sm btn-primary mx-1" data-ajax-popup="true" data-size="lg" data-title="Add Product"--}}
{{--               data-url="{{ route('admin.product.create') }}" data-toggle="tooltip" title="{{ __('Create Product') }}">--}}
{{--                <i class="ti ti-plus"></i>--}}
{{--            </a>--}}
{{--        @endcan--}}
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Facebook Auto Poster ') }}</li>
@endsection

@section('content')
<link href="{{asset("autoposter/css/styles.css")}}" rel="stylesheet" type="text/css">
<div class="row">
    <div class="col-xl-4">
        <div class="LoginWithBTN">


            <a href="{{ url('/login/facebook') }}" class="loginBTN FAceBOOKLogin">
                <span><i class="fab fa-facebook-f"></i></span> Login With FaceBook
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="text-align: start;">
                <h5 class=""> Apage And Group Link </h5>
            </div>
            <div class="card-body p-4">


            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('store-group-page') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" style="text-align: start;">
                                <label class="form-label">Group Or Page Name</label>
                                <input class="form-control" placeholder="Name" name="name" type="text" id="name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group" style="text-align: start;">
                                <label class="form-label">Group Or Page Link</label>
                                <input class="form-control" placeholder="Link" name="link" type="url" id="link" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group" style="text-align: start">
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="text-align: start;">
                <h5 class="">  Add Post </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('social.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">



                        <div class="col-md-12 mt-3">
                                    <div class=""  style="text-align: start">
                                        <label class="form-label">Post Title</label>
                                        <input type="text" name="title" class="form-control" required>

                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group" style="text-align: start">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group" style="text-align: start"><label class="form-label">Post Image</label>
                                        <input  type="file" name="image"   class="form-control" required >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group" style="text-align: start">
                                    <label class="form-label">Post Time</label>
                                        <input type="datetime-local" name="post_time" class="form-control" required>

                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group" style="text-align: start">
                                        <label class="form-label">Post Where</label>
                                        <div class="d-flex">
                                            <select name="platform" class="form-control" required>
                                                <option value="facebook">Facebook</option>
                                                <option value="instagram">Instagram</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group" style="text-align: start">
                                        <label class="form-label">Select Page</label>
                                        <select name="page_id" class="form-control" required>
                                            @if(!empty($pages) && count($pages) > 0)
                                                @foreach($pages as $page)
                                                    <option value="{{ $page['id'] }}">{{ $page['name'] }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No pages found</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group" style="text-align: start">
{{--                                        <input type="submit" value="Create" class="btn btn-primary">--}}
                                        <button type="submit" class="btn btn-primary">Schedule Post</button>

                                    </div>
                                </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <h2>My Groups & Pages</h2>


                <div class="table-responsive">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>Page Name</th>
                                <th>Page Link</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @foreach($groupPages as $group)
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td><a href="{{ $group->link }}" target="_blank">{{ $group->link }}</a></td>
                                    <td class="text-end">

                                            <button class="btn btn-sm btn-primary me-2"
                                                data-url="" data-size="lg"
                                                data-ajax-popup="true" data-title="Edit Product">
                                                <i class="ti ti-pencil py-1" data-bs-toggle="tooltip" title="edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-sm btn-danger show_confirm">
                                                <i class="ti ti-trash text-white py-1"></i>
                                            </button>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div id="main-wrapper">

            <div class="page-wrapper">


            <div class="body-wrapper">
            <div class="">

            <div class="card">
                <div>
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <div class="p-4 calender-sidebar app-calendar">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Add / Edit Event</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class=""  style="text-align: start">
                                        <label class="form-label">Post Title</label>
                                        <input id="event-title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="" style="text-align: start">
                                        <label class="form-label">Description</label>
                                        <textarea id="event-description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="" style="text-align: start"><label class="form-label">Post Image</label>
                                        <input id="event-image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="" style="text-align: start"><label class="form-label">Post Time</label>
                                        <input id="event-start-date" type="datetime-local" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div  style="text-align: start"><label class="form-label">Post Where</label></div>
                                    <div class="d-flex">
                                        <div class="n-chk">
                                            <div class="form-check form-check-success form-check-inline">
                                                <input class="form-check-input" type="radio" name="event-level" value="Primary" id="modalPrimary" checked><label class="form-check-label" for="modalPrimary" >Face Book</label></div>
                                        </div>

                                        <div class="n-chk">
                                            <div class="form-check form-check-danger form-check-inline"><input class="form-check-input" type="radio" name="event-level" value="Warning" id="modalWarning"><label class="form-check-label" for="modalWarning">Instagram</label></div>
                                        </div>

            <!--
            <div class="n-chk">
                                            <div class="form-check form-check-primary form-check-inline"><input class="form-check-input" type="radio" name="event-level" value="Danger" id="modalDanger"><label class="form-check-label" for="modalDanger">Face Book</label></div>
                                        </div>
                                        <div class="n-chk">
                                            <div class="form-check form-check-success form-check-inline"><input class="form-check-input" type="radio" name="event-level" value="Primary" id="modalPrimary"><label class="form-check-label" for="modalPrimary">Primary</label></div>
                                        </div>
                                        <div class="n-chk">
                                            <div class="form-check form-check-warning form-check-inline"><input class="form-check-input" type="radio" name="event-level" value="Success" id="modalSuccess"><label class="form-check-label" for="modalSuccess">Instagram</label></div>
                                        </div>
            -->
                                    </div>
                                </div>
                                <div class="col-md-12 d-none">
                                    <div class=""><label class="form-label">Enter Start Date</label><input id="event-start-date" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-12 d-none">
                                    <div class=""><label class="form-label">Enter End Date</label><input id="event-end-date" type="text" class="form-control"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-success btn-update-event" data-fc-event-public-id="">Update changes</button><button type="button" class="btn btn-primary btn-add-event">Add Event</button></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-script1')

<script src="{{asset("autoposter/libs/jquery/jquery.min.js")}}"></script>
        <script src="{{asset("autoposter/js/app.min.js")}}"></script>
        <script src="{{asset("autoposter/js/app.init.js")}}"></script>
        <script src="{{asset("autoposter/libs/bootstrap/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("autoposter/libs/simplebar/simplebar.min.js")}}"></script>
        <script src="{{asset("autoposter/libs/js/sidebarmenu.js")}}"></script>
        <script src="{{asset("autoposter/libs/js/theme.js")}}"></script>
        <script src="{{asset("autoposter/libs/fullcalendar/index.global.min.js")}}"></script>
        <script src="{{asset("autoposter/libs/fullcalendar/calendar-init.js")}}"></script>

    <script>
        function add_more_customer_choice_option(i, name) {
            $('#customer_choice_options').append(
                '<div class="form-group"><input type="hidden" name="choice_no[]" value="' + i + '">' +
                '<label for="choice_attributes">' + name + ':</label>' +
                '<input type="text" class="form-control variant_choice" name="choice_options_' + i +
                '[]" __="{{ __('Enter choice values') }}"  data-role="tagsinput" id="variant_tag' + i +
                '" onchange="update_sku($(this).val())">' +
                '</div>');
            comman_function();
        }

        function add_more_choice_option(i, name) {

            $('#attribute_options').append(
                '<div class="card oprtion"><div class="card-body "><input type="hidden" class="abd" name="attribute_no[]" value="' +
                i + '"><input type="hidden" class="abd" name="option_no[]" value="' + i + '">' +

                '<div class="form-group row col-12">' +
                '<div class="form-group col-md-6">' +
                '<label for="choice_attributes" class="col-6">' + name + ':</label></div>' +

                '<div class="form-group col-md-6 text-end d-flex all-button-box justify-content-md-end justify-content-center">' +
                '<a href="#" class="btn btn-sm btn-primary add_attribute" data-ajax-popup="true" data-title="{{ __('Add Attribute Option') }}" data-size="md" ' +
                'data-url="{{ route('product-attribute-option.create') }}/' + i + '" ' +
                'data-toggle="tooltip">' +
                '<i class="ti ti-plus">{{ __('Add Attribute option') }}</i></a></div></div>' +

                '<div class="form-group row col-12 parent-clase">' +
                '<div class="form-group col-md-6">' +
                '<div class="form-chec1k form-switch">' +
                '<input type="hidden" name="visible_attribute_' + i + '" value="0">' +
                '<input type="checkbox" class="form-check-input attribute-form-check" name="visible_attribute_' + i +
                '" id="visible_attribute" value="1">' +
                '<label class="form-check-label" for="visible_attribute"></label>' +
                '<label for="product_page_option" class=""> Visible on the product page</label></div>' +

                ' <div style="margin-top: 9px;"></div>' +

                '<div class="for-variation_data form-chec1k form-switch d-none use_for_variation" id="use_for_variation"  data-id="' +
                i + '">' +
                '<input type="hidden" name="for_variation_' + i + '" value="0">' +
                '<input type="checkbox" class="form-check-input input-options attribute-form-check enable_variation_' +
                i + '" name="for_variation_' + i + '" id="for_variation" value="1" data-id="' + i +
                '" data-enable-variation=" enable_variation_' + i + ' ">' +
                '<label class="form-check-label" for="for_variation"></label>' +
                '<label for="product_page_option" class=""> Used for variations</label></div>' +
                '</div>' +

                '<div class="form-group col-md-6">' +
                '<select class="col-6 form-control attribute attribute_option_data" name="attribute_options_' + i +
                '[]" __="{{ __('Enter choice values') }}"  data-role="" multiple id="attribute' + i +
                '" data-id="' + i + '"></select></div></div>' +

                '</div></div>');

            if ($('.enable_product_variant').prop('checked') == true) {
                $(".use_for_variation").removeClass("d-none");
            }
            $(document).ready(function() {
                $(document).on("change", ".enable_product_variant", function() {
                    $(".use_for_variation").addClass("d-none");
                    if ($(this).prop('checked') == true) {
                        $(".use_for_variation").removeClass("d-none");
                    }
                });
            });
            comman_function();
        }

        // product image ajax
        {{--$(document).on('click', '.remove_image', function() {--}}
        {{--    var id = $(this).attr('data-id');--}}
        {{--    var data = {--}}
        {{--        id: id,--}}
        {{--    }--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route('product.image.remove') }}',--}}
        {{--        method: 'POST',--}}
        {{--        data: data,--}}
        {{--        context: this,--}}
        {{--        success: function(response) {--}}
        {{--            $(this).parent().parent().remove();--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        {{--$(document).on('change', '.product_image_update', function() {--}}
        {{--    var form = $(this).closest('form');--}}
        {{--    var url = form.attr('action');--}}
        {{--    var files = $('#sub_upload_image')[0].files;--}}
        {{--    var cover_file = $('#product_cover_upload_image')[0].files;--}}

        {{--    var formData = new FormData(form[0]);--}}
        {{--    formData.append('files', files);--}}
        {{--    formData.append('cover_file', cover_file);--}}

        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        method: 'POST',--}}
        {{--        data: formData,--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        },--}}
        {{--        success: function(data) {--}}
        {{--            if (data.response) {--}}
        {{--                show_toastr('{{ __('Success') }}', data.message, 'success');--}}
        {{--                $('.product_img').html(data.html);--}}

        {{--                if (data.cover_image_status == 1) {--}}
        {{--                    $('.product_cover_img').html(data.cover_image);--}}
        {{--                    console.log($('.cover_img' + data.product_id));--}}
        {{--                    $('.cover_img' + data.product_id).attr('src', data.cover_image_path);--}}
        {{--                }--}}
        {{--            } else {--}}
        {{--                show_toastr('{{ __('Error') }}', data.message, 'error');--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}


        {{--// get sub category--}}
        {{--$(document).on('change', '#maincategory', function() {--}}
        {{--    var maincategory = $(this).val();--}}
        {{--    var subcategory = $(this).attr('data-val');--}}
        {{--    var data = {--}}
        {{--        maincategory: maincategory,--}}
        {{--        subcategory: subcategory--}}
        {{--    }--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route('admin.get.subcategory') }}',--}}
        {{--        method: 'POST',--}}
        {{--        data: data,--}}
        {{--        context: this,--}}
        {{--        success: function(response) {--}}
        {{--            $('.subcategory_selct').html();--}}
        {{--            var select =--}}
        {{--                '<select class="form-control" data-role="tagsinput" id="subcategory_id" name="subcategory_id">' +--}}
        {{--                response.html + '</select>';--}}
        {{--            $('.subcategory_selct').html(select);--}}
        {{--            comman_function();--}}
        {{--            $(this).attr('data-val', '0');--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endpush
