@extends('templates.archive')

@section('above')
@stop

@section('before-layout')
    @if (get_field('archive_' . sanitize_title($postType) . '_filter_position', 'option') == 'top')

        <div class="container u-pt-6">
            <div class="grid grid-va-middle">
                <div class="grid-xs-12 grid-md-fit-content u-flex u-mb-1@xs u-mb-1@sm">
                    <h1 class="u-text-primary u-text-uppercase">Kulturkalender</h1>
                    <div class="o-arrow-right-red u-ml-2 u-hidden@xs u-hidden@sm"></div>
                </div>
                <div class="grid-xs-12 grid-md-auto">
                    @include('partials.archive-event-filters')
                </div>
            </div>
        </div>
    @endif
@stop


