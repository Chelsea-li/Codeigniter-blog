<h2><?php echo $post['title']; ?></h2>
<small class="date">Posted on: <?php echo $post['created_at']; ?></small>
<br>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" class="img-responsive">
    </div>
</div>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>
<hr>
<a class="btn btn-sm btn-info pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('posts/delete/'.$post['id']); ?>
<button class="btn btn-sm btn-danger pull-right" type="submit">Delete</button>
</form>