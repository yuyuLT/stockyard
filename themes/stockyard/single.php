<?php
if (have_posts()) :
    while (have_posts()) : the_post();

        if (has_category('blog')) {
            get_template_part('single', 'blog');
        } elseif (has_category('work')) {
            get_template_part('single', 'work');
        } else {
            get_template_part('single', 'default');
        }

    endwhile;
else :
    get_template_part('content', 'none');
endif;
