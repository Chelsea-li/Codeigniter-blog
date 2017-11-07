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
<button class="btn btn-sm btn-danger" type="submit">Delete</button>
</form>
<br>

<!-- show comment -->
<h3>Comments:</h3><hr>
<?php if($comments): ?>
    <?php foreach($comments as $comment): ?>
        <div class="well">
            <p><strong><?php echo $comment['name']; ?></strong> 
            <?php echo $comment['created_at']; ?>
            </p>
            <?php echo $comment['body']; ?>
        </div>
    <?php endforeach; ?> 
<?php else: ?>
    <p>Be the first one to comment.</p>
<?php endif; ?>
 

<!-- add comment  -->
<h3>Add comment</h3><hr>
<?php echo validation_errors(); ?>
<?php echo form_open("comments/create/".$post['id']); ?>
    <div class="form-inline">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="<?php echo set_value('name'); ?>">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?php echo set_value('email'); ?>">
    </div>
    <div class="form-group"></div>
        <label for="comment">Comment:</label>
        <textarea name="body" id="comment"><?php echo set_value('body'); ?></textarea>
        <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>"><br>
         <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>