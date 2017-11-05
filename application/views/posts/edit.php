<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/update'); ?>
    <input type="hidden" name='id' value="<?php echo $post['id']; ?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type='text' name='title' id='title' class='form-control' placeholder='Add Title' value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea name='body' id='body' row="16" class='form-control' placeholder='Add Body'><?php echo $post['body']; ?></textarea>
    </div>
    <label for="category">Category:</label>
    <select id="category" class="form-control" name='category_id'>
        <?php foreach($categories as $category): ?>
            <option value='<?php echo $category["id"]; ?>'>
                <?php echo $category['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type='submit' class="btn btn-primary">Submit</button>
</form>