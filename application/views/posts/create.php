<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type='text' name='title' id='title' class='form-control' placeholder='Add Title' value=<?php echo set_value('title'); ?>>
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea name='body' id='body' class='form-control' placeholder='Add Body'><?php echo set_value('body'); ?></textarea>
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
    <div class="form-group">
        <label for="photo">Add image:</label>
        <input type="file" id="photo" name="userfile" size="20">
        <p class="help-block">Format: .gif .jpg .png </p>
        <p class="help-block">Maximum size: 2 MB</p>
    </div>
    <button type='submit' class="btn btn-primary">Submit</button>
</form>