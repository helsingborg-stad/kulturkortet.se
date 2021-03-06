<?php global $post; ?>
<article class="c-article s-article">
    <h1>{{ the_title() }}</h1>

    @if (get_post_type() == 'article')
        <!-- <div class="u-mb-1">
            <time datetime="<?php echo the_time('Y-m-d H:i'); ?>">
                    <strong> <?php the_time('j F Y'); ?></strong>
            </time>
        </div> -->
    @endif

    @if (isset(get_extended($post->post_content)['main']) && strlen(get_extended($post->post_content)['main']) > 0 && isset(get_extended($post->post_content)['extended']) && strlen(get_extended($post->post_content)['extended']) > 0)
        {!! apply_filters('the_lead', get_extended($post->post_content)['main']) !!}
        {!! apply_filters('the_content', get_extended($post->post_content)['extended']) !!}

    @else
        @if (substr($post->post_content, -11) == '<!--more-->')
        {!! apply_filters('the_lead', get_extended($post->post_content)['main']) !!}
        @else
        {!! the_content() !!}
        @endif
    @endif
</article>
