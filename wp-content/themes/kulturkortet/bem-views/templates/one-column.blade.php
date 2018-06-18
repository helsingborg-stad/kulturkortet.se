@extends('templates.master')

@section('layout')
    <div class="u-bg-background">
        <div class="container container--one-column u-bg-content">
            <div class="grid grid--columns">
                <div class="grid-xs-12">
                    <div class="featured-image container__collapse">
                        @if (get_field('post_single_show_featured_image') === true)
                            <img class="u-w-100" src="{{ municipio_get_thumbnail_source(null, array(960,540)) }}" alt="{{ the_title() }}">
                        @endif
                    </div>
                </div>
                <div class="grid-xs-auto grid-md-fit-content u-mx-auto">
                    @section('content')
                        @while(have_posts())
                            {!! the_post() !!}

                            @include('partials.article')
                        @endwhile

                        @include('partials.page-footer')
                    @show
                </div>
            </div>
        </div>
    </div>
@stop
