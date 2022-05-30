<?php
/*
Template Name: Normal Flex-Page
*/
?>
<?php get_header(); ?>
    <div class="mainContent page-content home normal-flex">        

        <div class="fma">
            <div class="pre-loader">
                <div class="container">
                    <div class="loading-text">LOADING THE WRECKAGE</div>
                    <div class="loading-bar"></div>
                </div>
            </div>
            <div class="logo-wrap">
                <div class="flex-wrap">
                    <?php 
                        $wrecksLogo = get_field('header_main_logo');
                    ?>
                    <div class="audio-logo" style="background:url(<?php echo $wrecksLogo; ?>) no-repeat center center; background-size:contain;"></div>
                    <?php if( have_rows('header_social_media') ): ?>
                        <ul class="sm-list">
                        <?php while ( have_rows('header_social_media') ) : the_row(); 
                            $iconLink = get_sub_field('icon_link');
                            $socialTitle = get_sub_field('social_title');
                        ?>
                            <li class="social-icon"><a class="hvr-underline-from-middle-small-white" href="<?php echo $iconLink; ?>"><?php echo $socialTitle; ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="scroll-animation">
                <div class="scroll-dot"></div>
            </div>
        </div>

        <section id="section-1" class="section-1 mid-black blog-section" data-midnight="blog">
            <div class="container">
                <?php 
                    $instaFeedDesk = get_field('instagram_feed'); 
                    $instaFeedMobile = get_field('instagram_feed_mobile');
                ?>
                <div class="insta-feed desktop"><?php echo $instaFeedDesk; ?></div>
                <div class="insta-feed mobile"><?php echo $instaFeedMobile; ?></div>
            </div>
        </section> 

        <?php 
            $aboutImage = get_field('about_image');
        ?>
    	<section id="section-2" class="section-2 mid-white about-section" data-midnight="about" style="background-image:url(<?php echo $aboutImage; ?>); background-size:cover;">
            <?php if( have_rows('hometown_names') ): ?>
                <div class="name-wrapper">
                <?php while ( have_rows('hometown_names') ) : the_row(); 
                    $memberName = get_sub_field('member_name');
                    $hometown = get_sub_field('hometown');

                    $slugName = seoUrl($memberName); // replace spaces with -
                    $memberName = strtoupper($memberName); // uppercase
                    $hometown = strtoupper($hometown); // uppercase
                ?>
                    <h2 class="location-text hvr-underline-from-middle-about <?php echo $slugName; ?>"><?php echo $hometown; ?></h2><br/>
                    <script>
                      if (document.documentElement.clientWidth >= 450) {
                        $(".location-text.<?php echo $slugName; ?>").mouseover(function(){
                            TweenLite.to(".location-text.<?php echo $slugName; ?>", 0.6, {text:"<?php echo $memberName; ?>", ease:Linear.easeNone});
                        }).mouseout(function(){
                            TweenLite.to(".location-text.<?php echo $slugName; ?>", 0.6, {text:"<?php echo $hometown; ?>", ease:Linear.easeNone});
                        });
                      }
                    </script>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
    	</section> 

        <section id="section-3" class="section-3 mid-black single-section audio-bars" data-midnight="favorite-liar">
            
            <div class="single-video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/_kHjDNHEU5o?modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allowfullscreen>" frameborder="0" allowfullscreen></iframe>
                <div class="button-border white-button-border close-video"><a class="button white-button watch-video hvr-underline-from-middle-small-white">CLOSE</a></div>
            </div>

            <div class="container">
                <div class="favorite-liar single">
                    <h3>FAVORITE LIAR</h3>
                    <?php if( have_rows('records_social_media') ): ?>
                        <ul class="single-sm-list">
                        <?php while ( have_rows('records_social_media') ) : the_row(); 
                            $singleSocialLink = get_sub_field('social_media_link');
                            $singleSocialTitle = get_sub_field('social_media_title');
                        ?>
                            <li class="social-title"><a class="hvr-underline-from-middle-small-white" href="<?php echo $singleSocialLink; ?>"><?php echo $singleSocialTitle; ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="clear"></div>
                    <div class="button-box">
                        <div class="button-border black-button-border"><a class="button black-button watch-video hvr-underline-from-middle-small-black">WATCH VIDEO</a></div>
                        <div class="clear"></div>
                    </div>
                </div>                
                <div class="clear"></div>
            </div>
        </section> 

        <section id="section-4" class="section-4 mid-white record-section audio-bars" data-midnight="records">
            <div class="container">
                <div class="left">
                    <div class="album-cover">
                        <?php 
                            $albumCover = get_field('album_cover'); 
                            $albumCoverAlt = get_field('album_cover_alt_text');
                        ?>
                        <img src="<?php echo $albumCover; ?>" alt="<?php echo $albumCoverAlt; ?>" width="100%" />
                        <!-- <a href="http://itunes.com/"><div class="hvr-underline-from-middle-small-black">DOWNLOAD</div></a> -->
                    </div>
                </div>
                <div class="right">
                    <div class="album-title">WE ARE<br/>THE WRECKS</div>                    
                    <?php if( have_rows('album_tracks') ): 
                        $trackCounter = 0;
                    ?>
                        <ol class="tracklist">
                        <?php while ( have_rows('album_tracks') ) : the_row(); 
                            $trackTitle = get_sub_field('track_title');
                            $trackMedia = get_sub_field('track_media');
                            ++$trackCounter;
                        ?>
                            <li><a class="track track-<?php echo $trackCounter; ?> hvr-underline-from-middle-small-white" data-track="<?php echo $trackCounter; ?>" href="<?php $trackMedia; ?>"><?php echo $trackTitle; ?> - <span class="track-number">0<?php echo $trackCounter; ?></span></a></li>
                        <?php endwhile; ?>
                        </ol>
                    <?php endif; ?>
                    <div class="download-album button-border white-button-border"><a class="button white-button hvr-underline-from-middle-small-white" href="http://itunes.com/" target="_blank">DOWNLOAD</a></div>
                    <!-- <iframe src="https://embed.spotify.com/?uri=spotify:album:6erK5SKLmAcF78KQFh1zIA&theme=white" width="330" height="80" frameborder="0" allowtransparency="true"></iframe> -->                    
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="audio-player">
                <?php if( have_rows('album_tracks') ): $trackMediaCounter = 0; ?>
                    <?php while ( have_rows('album_tracks') ) : the_row(); 
                        $trackMedia = get_sub_field('track_media');
                        ++$trackMediaCounter;
                    ?>
                        <div class="controls controls-<?php echo $trackMediaCounter; ?>"><?php echo $trackMedia; ?></div>
                    <?php endwhile; ?>
                <?php endif; ?>                
            </div>
        </section>

        <section id="section-5" class="section-5 tour-section" data-midnight="tour">
            <div class="container">
                <div class="tour-featured">
                    <div class="tour-box tour-box-1">
                        <div class="tour-details">
                            <div class="date">9.14.16</div>
                            <div class="location">VANCOUVER, BC</div>
                            <div class="venue">VOGUE THEATRE</div>                            
                        </div>
                        <a class="tickets" href="http://ticketmaster/"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                    </div>
                    <div class="tour-box tour-box-2">
                        <div class="tour-details">
                            <div class="date">9.16.16</div>
                            <div class="location">EDMONTON, AB</div>
                            <div class="venue">THE STARLITE BALLROOM</div>                            
                        </div>
                        <a class="tickets" href="http://ticketmaster/"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                    </div>
                    <div class="tour-box tour-box-3">
                        <div class="tour-details">
                            <div class="date">9.17.16</div>
                            <div class="location">CALGARY, AB</div>
                            <div class="venue">COMMONWEALTH</div>                            
                        </div>
                        <a class="tickets" href="http://ticketmaster/"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php 
                    $tourDates = get_field('tour_calendar');
                    echo $tourDates; 
                ?>
            </div>
        </section>

        <section id="section-6" class="section-6 mid-white contact-section" data-midnight="contact">
            <div class="container">
                <?php 
                    $contactForm = get_field('contact_form');
                ?>
                <div class="contact-form"><?php echo $contactForm; ?></div>
                
                <div class="clear"></div>
            </div>
        </section>

    </div>
 

<?php get_footer(); ?>    

<script type="text/javascript">
    var loadCount = 0;
    function loadingBar(){
        $('.pre-loader .loading-bar').animate({left:'0px', right:'auto', width:'100%'},1000, 'easeInOutCirc', function(){
            $('.pre-loader .loading-bar').animate({right:'0px', left:'auto', width:'0%'},1000, 'easeInOutCirc', function(){
                $('.pre-loader .loading-bar').css({left:'0px', width:'0px'});
                loadCount++;
                if(loadCount<5){loadingBar();}
            });
        });
    }
    loadingBar();
</script>        

<?php /****************************** END ******************************/ ?>               


