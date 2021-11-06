@extends('layouts.app')

@section('content')
    @include('layouts.headers.simple')
    <div class="container">
        <div class="my-5">
            <div class="d-flex align-items-end mb-3 flex-column">
                <div>
                    <a class="btn btn-default" href="{{route('habit.index')}}">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
            <div class="bg-default rounded p-3">
                <form id="formCreateHabit" action="{{route('habit.store')}}" method="POST" class="kt-form">
                    @csrf
                    <div class="form-group text-white">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="example: Read Books">
                        <span class="text-white-50">Which habit you want create?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="priority" class="form-label">Priority</label>
                        <div class="d-flex">
                            <input name="priority" type="range" class="form-control form-range" id="priority" min="0" max="10" >
                            <span id="priority-output" class="ml-4 mt-2"></span>
                        </div>
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="why">Why</label>
                        <input type="text" name="why" class="form-control" id="why" placeholder="example: increase my knowledge">
                        <span class="text-white-50">Why you want make this habit?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="how">How</label>
                        <input type="text" name="how" class="form-control" id="how" placeholder="example: reed in kindle">
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="when">When</label>
                        <input type="text" name="when" class="form-control" id="when" placeholder="example: before i sleep in night, around 9pm">
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="how_much">How Much</label>
                        <input type="text" name="how_much" class="form-control" id="how_much" placeholder="example: more than 30min">
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="form-group text-white">
                        <label for="where">Where</label>
                        <input type="text" name="where" class="form-control" id="where" placeholder="example: bedroom">
                        <span class="text-white-50">Loren Ipusem?</span>
                    </div>

                    <div class="d-flex align-items-end flex-column-reverse">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    window.onload = function() {
        var priority = $("#priority");

        $("#priority-output").text(priority.val());

        priority.on('input', function() {
            $("#priority-output").text(priority.val());
        });
    }
</script>
