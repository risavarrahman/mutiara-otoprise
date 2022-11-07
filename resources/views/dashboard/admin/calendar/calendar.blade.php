@extends('layouts.app')

@section('requiredStyle')
    <link href="{{ asset('theme-v1/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/plugins/src/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/plugins/src/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/dark/elements/alert.css') }}">
    {{-- <link href="{{ asset('theme-v1/src/assets/css/light/full-calendar.min.css') }}" rel="stylesheet" type="text/css"> --}}
@endsection

@section('contentAdmin')
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="container">
                <div id="calendar"></div>
            </div>

            <!-- Modal Create -->
            <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="calendarModalLabel">Add New Agenda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <form action="/admin/calendar" method="POST" id="formCalendar">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Event Title" autofocus>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="start" class="form-label">Start Date</label>
                                    <input type="text" class="form-control" id="start" name="start"
                                        placeholder="Start Date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="end" class="form-label">End Date</label>
                                    <input type="text" class="form-control" id="end" name="end"
                                        placeholder="End Date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="notes" class="form-label">Notes</label>
                                    <input type="text" class="form-control" id="notes" name="notes"
                                        placeholder="Notes">
                                </div>
                                <div class="d-flex mt-4">
                                    <div class="n-chk">
                                        <div class="form-check form-check-success form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="green"
                                                id="rPersonal">
                                            <label class="form-check-label" for="rPersonal">Personal</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="blue"
                                                id="rDaily">
                                            <label class="form-check-label" for="rDaily">Daily</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-danger form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="red"
                                                id="rUrgent">
                                            <label class="form-check-label" for="rUrgent">Urgent</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submitButton">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="calendarEditModal" tabindex="-1" role="dialog"
                aria-labelledby="calendarEditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="calendarEditModalLabel">Edit Agenda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <form action="" method="POST" id="formEditCalendar">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="calendar_id" id="calendar_id">
                                <div class="form-group mb-3">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('edit_title') is-invalid @enderror"
                                        id="edit_title" name="edit_title" placeholder="Event Title" autofocus>
                                    @error('edit_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="edit_start" class="form-label">Start Date</label>
                                    <input type="text" class="form-control" id="edit_start" name="edit_start"
                                        placeholder="Start Date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="edit_end" class="form-label">End Date</label>
                                    <input type="text" class="form-control" id="edit_end" name="edit_end"
                                        placeholder="End Date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="edit_notes" class="form-label">Notes</label>
                                    <input type="text" class="form-control" id="edit_notes" name="edit_notes"
                                        placeholder="Notes">
                                </div>
                                <div class="d-flex mt-4">
                                    <div class="n-chk">
                                        <div class="form-check form-check-success form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="green"
                                                id="rPersonal">
                                            <label class="form-check-label" for="rPersonal">Personal</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="blue"
                                                id="rDaily">
                                            <label class="form-check-label" for="rDaily">Daily</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-danger form-check-inline">
                                            <input class="form-check-input" type="radio" name="color" value="red"
                                                id="rUrgent">
                                            <label class="form-check-label" for="rUrgent">Urgent</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="updateButton">Update</button>
                        </form>
                        <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    </div>


    <script>
        // const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
        document.addEventListener('DOMContentLoaded', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var agenda = @json($agenda);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                showNonCurrentDates: false,
                selectable: true,
                contentHeight: 800,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: agenda,
                select: function(info) {
                    $('#calendarModal').modal('toggle');
                    var start = $('#start').val(info.startStr);
                    var end = $('#end').val(info.endStr);
                },
                editable: true,
                eventDrop: function(info) {
                    var id = info.event.id;
                    var title = info.event.title;

                    $.ajax({
                        url: "/admin/calendar/" + id,
                        type: "PATCH",
                        dataType: "json",
                        data: {
                            id: info.event.id,
                            title: info.event.title,
                            start: info.event.startStr,
                            end: info.event.endStr,
                            notes: info.event.extendedProps.notes,
                        },
                    });
                },
                eventClick: function(info) {
                    var id = info.event.id;
                    $('#calendar_id').val(info.event.id);
                    $('#edit_title').val(info.event.title);
                    $('#edit_start').val(info.event.startStr);
                    $('#edit_end').val(info.event.endStr);
                    $('#edit_notes').val(info.event.extendedProps.notes);
                    $('#calendarEditModal').modal('show');
                    // var notes = info.event.extendedProps;
                    // console.log(id);

                    $('#deleteButton').click(function() {
                        $.ajax({
                            url: "/admin/calendar/" + id,
                            type: "DELETE",
                            dataType: "json",
                        });
                    });
                },
            });
            calendar.render();
        });
    </script>
@endsection

@section('requiredScripts')
    <script src="{{ asset('theme-v1/src/plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/assets/js/jquery-3.6.1.min.js') }}"></script>
    {{-- <script src="{{ asset('theme-v1/src/plugins/src/jquery-ui/jquery-ui.min.js') }}"></script> --}}
@endsection
