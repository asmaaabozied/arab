@extends('dashboard::layouts.admin.master')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Admins table</h6>
                    </div>
                    <div class="text-left">
                        <a href="{{route('admin.create.new.admin')}}" type="submit" class="btn bg-gradient-primary w-auto m-4">Create new admin </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
{{--                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile</th>--}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data) && $data->count() !=0)
                                @foreach($data as $datum)
                                <tr>

                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if(isset($datum->avatar))
                                                    <img src="{{Storage::url($datum->avatar)}}" class="avatar avatar-sm me-3" alt="avatar">
                                                @else
                                                    <img src="{{asset('assets/img/default/default-avatar.svg')}}" class="avatar avatar-sm me-3" alt="user1">
                                                    @endif

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$datum->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$datum->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$datum->role->name}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$datum->administrative_number}}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        @if($datum->status == 'accepted')
                                            <span class="badge badge-sm bg-gradient-success">{{$datum->status}}</span>
                                            @endif
                                        @if($datum->status == 'rejected')
                                            <span class="badge badge-sm bg-gradient-danger">{{$datum->status}}</span>
                                            @endif
                                        @if($datum->status == 'pending')
                                            <span class="badge badge-sm bg-gradient-warning">{{$datum->status}}</span>
                                            @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$datum->created_at->format('Y-m-d')}}</span>
                                    </td>
                                    <td class="align-middle text-center p-1">
                                        <a class="btn btn-link text-dark px-3 mb-0" href="{{route('admin.show.edit.form.admin',$datum->id)}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                        <a href="{{route('admin.destroy.admin',$datum->id)}}" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="far fa-trash-alt me-2"></i>Delete</a>

                                    </td>
                                </tr>

                                @endforeach

                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>


@stop

