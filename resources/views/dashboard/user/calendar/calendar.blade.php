@extends('layouts.app')

@section('requiredStyle')
    <link href="{{ asset('theme-v1/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/plugins/src/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme-v1/src/plugins/src/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css">

    {{-- <link href="{{ asset('theme-v1/src/assets/css/light/full-calendar.min.css') }}" rel="stylesheet" type="text/css"> --}}
@endsection

@section('contentUser')
    <div class="row layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="container">
                <div class="calendar" id="calendar"></div>
            </div>

            <!-- Modal Create -->
            <div class="modal fade" id="createCalendar" tabindex="-1" role="dialog" aria-labelledby="createCalendarLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createCalendarLabel">Add New Agenda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <form action="/admin/calendar" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Event Title">
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
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" id="submitButton">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal EDIT -->
            <div class="modal fade" id="editCalendar" tabindex="-1" role="dialog" aria-labelledby="editCalendarLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCalendarLabel">Edit Agenda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>

                        <form action="/admin/calendar" method="POST">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" id="calendarId" name="calendar_id">
                                <div class="form-group mb-3">
                                    <label for="editTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="editTitle" name="editTitle"
                                        placeholder="Event Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="editStart" class="form-label">Start Date</label>
                                    <input type="text" class="form-control" id="editStart" name="editStart"
                                        placeholder="Start Date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="editEnd" class="form-label">End Date</label>
                                    <input type="text" class="form-control" id="editEnd" name="editEnd"
                                        placeholder="End Date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" id="editButton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
        document.addEventListener('DOMContentLoaded', function() {

            var agenda = @json($agenda);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                showNonCurrentDates: false,
                contentHeight: 800,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: agenda,
            });
            calendar.render();
        });
    </script>
@endsection

@section('requiredScripts')
    <script src="{{ asset('theme-v1/src/plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- <script src="{{ asset('theme-v1/src/assets/js/full-calendar.min.js') }}"></script> --}}
@endsection
