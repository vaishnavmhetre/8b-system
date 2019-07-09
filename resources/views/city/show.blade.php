@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col mt-3 px-2">
            <span class="h2">{{ $city->name }}</span>
            <button
                    class="btn btn-outline-primary btn-sm float-right text-capitalize mx-1">
                {{ __('views/city/show.create_8b') }}
            </button>
            <button
                    class="btn btn-outline-dark btn-sm float-right text-capitalize mx-1"
                    data-toggle="modal"
                    data-target="#moreDetailsModal">
                {{ __('views/city/show.more_details') }}
            </button>
        </div>
        <hr>
        <div class="row justify-content-center mt-4">
            <div class="col-12 px-4">
                @empty($aathBs)
                    <h5 class="text-center text-muted mt-2">{{ __('views/city/show.no_8b', ['cityName' => $city->name]) }}</h5>
                @else
                    <h5>{{ __('views/city/show.all_8b_list') }}</h5>
                    <div class="row justify-content-center mt-4">
                        {{$aathBs->links()}}
                    </div>
                    <div class="card-body">
                        @foreach($aathBs as $aathB)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-between px-2">
                                        <span class="text-capitalize">{{ __('models/names.tenure') }}: <strong>{{$aathB->tenure->name}}</strong></span>
                                        <span>{{ __('views/city/show.updated_at', ['updatedAt' => $aathB->updated_at->diffForHumans()]) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center">
                        {{$aathBs->links()}}
                    </div>
                @endempty
            </div>
        </div>

        <div class="modal fade" id="moreDetailsModal" tabindex="-1" role="dialog"
             aria-labelledby="moreDetailsModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize"
                            id="moreDetailsModalTitle">{{ __('views/city/show.more_details_about_city', ['cityName' => $city->name]) }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-capitalize"><strong>{{ __('models/names.taluka') }}</strong>
                            - {{ $city->taluka->name }}</div>
                        <hr>
                        <div class="text-capitalize"><strong>{{ __('models/names.district') }}</strong>
                            - {{ $city->taluka->district->name }}</div>
                        <hr>
                        <div class="text-capitalize"><strong>{{ __('models/names.talathi') }}</strong>
                            - {{ $city->talathi->name }}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-capitalize"
                                data-dismiss="modal">{{ __('views/city/show.close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection