<?php global $post;

    $location = (get_field('location') && !empty(get_field('location'))) ? get_field('location') : false;
    $location = ($location && isset($location['title'])) ? $location['title'] : false;
?>

    <a href="{{ the_permalink() }}" class="c-card c-card--action u-text-center">
        @if (municipio_get_thumbnail_source(null,array(400,400), '1:1'))
        <img class="c-card__image" src="{{ municipio_get_thumbnail_source(null,array(400,400), '1:1') }}">
        @endif
        <div class="c-card__body" data-equal-item>
            @if (get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option') != 'false')
            <div class="u-mb-2">
            <time class="o-text-secondary o-text-small">
               {{ \Municipio\Helper\Event::formatEventDate($post->start_date, $post->end_date) }}
            </time>
            </div>
            @endif

            <h4 class="c-card__title">{{ the_title() }}</h4>
            <span class="c-card__sub">
                {{$location}}
            </span>
        </div>
    </a>

