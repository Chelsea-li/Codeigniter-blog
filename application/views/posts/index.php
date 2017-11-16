
	<div class="card">
		<div class="card-body">
			<?php foreach($posts as $post) :?>
			<h3 class="card-title">
				<?php echo ucfirst($post['title']); ?>
			</h3>
			<small class="date">Created at <?php echo $post['created_at']; ?><strong> By </strong><?php echo ucfirst($post['username']); ?>
            <span class="pull-right"><strong>
                <?php echo $post['name']; ?>    
            </strong></span>
          	</small>
          <br>
          <div class="row">
			<div class="col-sm-3">
				<img class="img-responsive" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'] ;?>">
			</div>
			<div class="col-sm-9">
				<p class="card-text"><?php echo word_limiter($post['body'], 80); ?></p>
				<a class="btn btn-sm btn-info" href="<?php echo site_url('posts/'.$post['slug']); ?>">See More</a>
            </div>
          </div>
          <hr>
		<?php endforeach; ?>
	</div>
</div>

