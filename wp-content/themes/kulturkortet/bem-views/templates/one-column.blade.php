@extends('templates.master')

@section('layout')
    <div class="u-bg-background">
        <div class="container container--one-column u-bg-content">
            <div class="grid grid--columns">
                <div class="grid-xs-12">
                    <div class="container__collapse">
                        @include('components.dynamic-sidebar', ['id' => 'slider-area'])

                        @if (get_field('post_single_show_featured_image') === true && has_post_thumbnail())
                        <div class="featured-image">
                            <img class="u-w-100" src="{{ municipio_get_thumbnail_source(null, array(960,540)) }}" alt="{{ the_title() }}">
                        </div>
                        @endif
                    </div>
                </div>
                @if (is_active_sidebar('above-article'))
                    <div class="grid-xs-12">
                        @include('components.dynamic-sidebar', ['id' => 'above-article'])
                    </div>
                @endif
                <div class="grid-xs-12">
                    <div class="o-content-width u-mx-auto">
                        @section('content')

                            @include('components.dynamic-sidebar', ['id' => 'content-area-top'])

                            @while(have_posts())
                                {!! the_post() !!}

                                @include('partials.article')
                            @endwhile

                            @include('components.dynamic-sidebar', ['id' => 'content-area'])

                            @include('partials.page-footer')
                        @show
                    </div>
                </div>

                @if (is_active_sidebar('below-article'))
                    <div class="grid-xs-12">
                        @include('components.dynamic-sidebar', ['id' => 'below-article'])
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
