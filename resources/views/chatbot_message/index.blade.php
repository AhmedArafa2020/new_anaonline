@extends('layouts.app')

@section('page-title', __('Chatbot Message'))


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Chatbot Message') }}</li>
@endsection

@section('content')


{{--    @if (Auth::user()->type == 'superadmin' || Auth::user()->type == 'admin')--}}

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="text-align: start;">
                <h5 class=""> Chatbot Message </h5>
            </div>
            <div class="card-body p-4">
                <!-- Chatbot Message Form -->
                <form id="chatbotMessageForm" action="{{ url('chatbot-message') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="message_id" id="message_id"> <!-- Hidden input for ID -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="text-align: start;">
                                <label class="form-label">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="" disabled selected>{{ __('Select Type') }}</option>
                                    <option value="ask">Ask</option>
                                    <option value="say">Say</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" style="text-align: start">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group" style="text-align: start">
                                <input type="submit" value="Submit Message" class="btn btn-primary">
                                <button type="button" id="resetForm" class="btn btn-secondary">Cancel Edit</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Error and Success Messages -->
                <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
                <div id="successMessage" class="alert alert-success" style="display: none;"></div>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <h5></h5>
                <div class="table-responsive">
                    <table class="table dataTable">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $message)
                            <tr id="message-row-{{ $message->id }}">
                                <td>{{ ucfirst($message->type) }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-message"
                                            data-id="{{ $message->id }}"
                                            data-type="{{ $message->type }}"
                                            data-message="{{ $message->message }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger delete-message"
                                            data-id="{{ $message->id }}">
                                        <i class="fas fa-trash"></i> Delete
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
{{--@endif--}}


@endsection

@push('custom-script')
    <!-- AJAX Script -->
    <script>
        $(document).ready(function () {
            // Handle form submission (Add/Edit)
            $('#chatbotMessageForm').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                var formAction = $(this).attr('action');
                var formMethod = $('#formMethod').val();

                formData.append('_method', formMethod); // Ensure Laravel recognizes PUT
                formData.append('type', $('#type').val());
                formData.append('message', $('#message').val());

                console.log('Submitting Form:', { formAction, formMethod });

                $.ajax({
                    url: formAction,
                    type: 'POST', // Always use POST, Laravel handles PUT via _method
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#successMessage').text(data.message).show();
                        setTimeout(() => $('#successMessage').hide(), 3000);
                        location.reload(); // Reload to show changes
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '<ul>';
                        $.each(errors, function (key, value) {
                            errorHtml += '<li>' + value + '</li>';
                        });
                        errorHtml += '</ul>';
                        $('#errorMessage').html(errorHtml).show();
                    }
                });
            });

            // Handle edit button click
            $(document).on('click', '.edit-message', function () {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var message = $(this).data('message');

                console.log('Editing Message:', { id, type, message });

                // Populate the form with the selected message
                $('#type').val(type);
                $('#message').val(message);

                // Change form action for editing
                var editUrl = '{{ url("chatbot-message") }}/' + id;
                $('#chatbotMessageForm').attr('action', editUrl);
                $('#formMethod').val('PUT');

                // Change submit button text
                $('input[type="submit"]').val('Update Message');
            });

            // Handle delete button click
            $(document).on('click', '.delete-message', function () {
                var id = $(this).data('id');

                if (confirm('Are you sure you want to delete this message?')) {
                    $.ajax({
                        url: '{{ url("chatbot-message") }}/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (data) {
                            alert(data.message);
                            $('#message-row-' + id).remove(); // Remove row from table
                        },
                        error: function () {
                            alert('An error occurred while deleting the message.');
                        }
                    });
                }
            });
        });
    </script>



@endpush



