<?php
/**
 * Template Name: Calendar Page
 *
 * @package Maja_Theme
 */

get_header();
?>

    <main id="main" class="site-main border-t border-gray-400 pt-8 mb:pt-16">

    <?php while (have_posts()) : ?>
        <?php
            the_post(); 
            $current_id = get_the_ID();
            $calendar = cub_subfields('calendar', $current_id, array('start_date', 'end_date', 'project', 'location'));
        ?>

        <article class="container mx-auto" >

            <header class="hidden">

                <h1 class=""><?php the_title(); ?></h1>
                
            </header>

            <div class="">

            <?php if (! empty($calendar)) : ?>

                <?php
                function cmp($a, $b)
                {
                    if ($a['start_date'] == $b['start_date']) {
                        return 0;
                    }
                    return ($a['start_date'] < $b['start_date']) ? -1 : 1;
                }
                usort($calendar, "cmp");
                $prev_year = '';
                $prev_month = '';
                if ('de' === ICL_LANGUAGE_CODE) {
                    setlocale(LC_TIME, "de_DE");
                } else {
                    setlocale(LC_TIME, "en_US");
                }
                ?>

                <?php foreach ($calendar as $date) : ?>

                    <?php $year = date('Y', strtotime($date['start_date'])); ?>
                        <?php if ($year != $prev_year) : ?>
                            <h2 class="gutter title-2"><?= $year ?></h2>
                        <?php endif; ?>
                        <?php $prev_year = $year; ?>
                    <?php $month = date('m', strtotime($date['start_date'])); ?>
                        <?php if ($month != $prev_month) : ?>
                            <h3 class="gutter mb-3 font-bold text-lg month">
                                <?= strftime('%B', strtotime($date['start_date'])); ?>
                            </h3>
                        <?php endif; ?>
                        <?php $prev_month = $month; ?>
                        <article class="gutter mb-6">

                            <div class="">
                                <?php if ( $date['location'] ) : ?>
                                    <span class="text-base tracking-wider uppercase pr-2"><?= $date['location']; ?></span>
                                <?php endif; ?>    
                                <?php if (! empty($date['project'])) : ?>
                                    <h4 class="inline text-lg font-bold">
                                        <a class="" href="<?= get_the_permalink($date['project'][0]); ?>">
                                            <?= get_the_title( $date['project'][0] ) ?>
                                        </a>
                                    </h4>
                                <?php endif; ?>
                            </div>
                            <div class="mb-4">
                                <?php if ($date['start_date']) : ?>
                                    <span class="text-base tracking-wider uppercase"><?= cub_date($date['start_date']); ?></span>
                                <?php endif; ?> 
                                <?php if ($date['end_date']) : ?>
                                    <span class="text-base tracking-wider uppercase"> - <?= cub_date($date['end_date']); ?></span>
                                <?php endif; ?>
                            </div>

                        </article>

                <?php endforeach; ?>

            <?php endif; ?>

            </div>

        </article>

    <?php endwhile; ?>

    </main>


<?php
get_footer();
