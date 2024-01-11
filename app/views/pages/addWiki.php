<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/inc/header.php'; ?>

<body>

  <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Add a Wiki</h3>

    <form action="<?php echo URLROOT; ?>/addwiki/addWiki" method="post" enctype="multipart/form-data" class="p-5 bg-light">
      <div class="form-group">

        <label for="name">Title</label>
        <input type="text" name="title" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="message">Image</label>
        <input type="file" name="img" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="message">Content</label>
        <textarea name="content" id="message" cols="30" rows="10" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="message">Choose A Category:</label>
        <select name="category_id" id="">
          <?php foreach ($data["categories"] as $category) { ?>
            <option value="<?php echo $category->__get('id'); ?>"><?php echo $category->__get("name"); ?></option>
          <?php
          }  ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">Choose Tags:</label>
      <?php foreach ($data["tags"] as $tag) { ?>
        <input id="tag" name="tag_ids" type="checkbox" value="<?= $tag->__get("id"); ?>">
        <label for="tag"><?php echo $tag->__get("name"); ?></label>
        <?php } ?>
      </div>

      <div class="form-group">
        <input type="submit" value="Post" class="btn btn-primary">
      </div>

    </form>
  </div>









  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>