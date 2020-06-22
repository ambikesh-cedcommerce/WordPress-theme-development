<h1>taxonomy.php</h1>
<?php if ( is_category( 'News category' ) ) : ?>
      <p>This is the text to describe category A</p>
<?php elseif (is_category('news catgory')) : ?>
      <p>This is the text to describe category B</p>
<?php else : ?>
      <p>This is some generic text to describe all other category pages,
I could be left blank</p>
<?php the_content(); ?>
<?php endif; ?>