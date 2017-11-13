
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <h2><?= $title; ?></h2>
        <ul class="list-group">
            <?php foreach($categories as $category): ?>
                    <li class="list-group-item">
                        <a href="<?php echo site_url("categories/posts/".$category['id']); ?>">
                            <?php echo $category['name']; ?>
                        </a>
                        <span class="label label-info pull-right">
                            <?php echo $category['total']; ?> Posts
                        </span> 
                    </li>
            <?php endforeach; ?>
        </ul>
    </div> 
</div>

