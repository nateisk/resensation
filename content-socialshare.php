<div class="social-icon">
            <div id="fb-root">
        	<script>(function(d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) return;
             js = d.createElement(s); js.id = id;
             js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
             fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));</script></div>
            
        <ul class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">

               <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i> Share</a></li>

               <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"data-size="large"target="_blank">
                <i class="fab fa-twitter"></i> Share</a></li>

                
              <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_title(); ?>"target="_blank"><i class="fab fa-linkedin-in"></i> Share</a>
              </li>         
        </ul>
</div> 