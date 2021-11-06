@extends('layouts.app')

@section('content')
    @include('layouts.headers.simple')
{{--    @foreach($habits as $habit)--}}
        <div class="container">
            <div class="row">
                <div class="table-responsive my-5">
                    <div class="d-flex align-items-end mb-3 flex-column">
                        <div>
                            <a class="btn btn-default" href="{{route('habit.create')}}">Create Habit</a>
                        </div>
                    </div>
                    <div>
                        <table class="table align-items-center table-dark">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="title">Title</th>
                                <th scope="col" class="sort" data-sort="priority">Priority</th>
                                <th scope="col" class="sort" data-sort="why">Why</th>
                                <th scope="col" class="sort" data-sort="how">How</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($habits as $habit)
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
    {{--                                        <a href="#" class="avatar rounded-circle mr-3">--}}
    {{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/bootstrap.jpg">--}}
    {{--                                        </a>--}}
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$habit->title}}</span>
                                            </div>
                                        </div>
                                    </td>
{{--                                    <td>--}}
{{--                                    <span class="badge badge-dot mr-4">--}}
{{--                                      <i class="bg-warning"></i>--}}
{{--                                      <span class="status">pending</span>--}}
{{--                                    </span>--}}
{{--                                    </td>--}}

                                    <td class="w-25">
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">{{$habit->priority}}/10</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$habit->priority}}" aria-valuemin="0" aria-valuemax="10" style="width: {{($habit->priority * 10) . '%'}};"></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$habit->why}}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$habit->how}}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <div class="dropdown-item ">
                                                    <a href="{{route('habit.edit', $habit->id)}}" class="btn btn-link text-primary w-100">
                                                        Edit
                                                    </a>
                                                </div>
                                                <a class="btn btn-link text-danger w-100" data-toggle="modal" data-target="#modalDeleteHabit">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Delete Habit -->
                                <div class="modal fade" id="modalDeleteHabit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">You are sure to want delete this habit?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                This action does not delete the history of this habit, but the deletion will be permanent.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form id="formDeleteHabit{{$habit->id}}" method="POST" class="dropdown-items"
                                                      action="{{route('habit.destroy', $habit->id)}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" form="formDeleteHabit{{$habit->id}}" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
{{--    @endforeach--}}
@endsection
