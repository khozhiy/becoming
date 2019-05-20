<?php require('header.php')?>
<?php require('footer.php')?>
<style type="text/css">
    .comments{
        font-size: 0.8em;
        margin-bottom: 20px;
    }
    .comment-header{
        padding-bottom: 20px;
        font-size: 0.8em;
    }
    .comment-content{
        padding-left: 10px;
        margin-bottom: 5px;
    }
    .date, .author{
        margin-right: 10px;
    }
    .content{
        padding-left: 15px;
    }
    h2{
        margin-bottom: 10px;
    }
</style>
<h2><?=$ENTRY['header']?></h2>
        <div class="comments">
            <p class="content"><?=$ENTRY['content']?></p>
            <span class="date"><?=$ENTRY['date']?></span>
            <span class="author"><?=$ENTRY['author']?></span>
        </div>
        
<h2>Comments</h2>
<?php foreach ($comments as $row): ?> 
    <div class="comment">   
        <p class="comment-content"><?=$row['content']?></p>
        <div class="comment-header">
           <span class="date"><?=$row['date']?></span>
           <span class="author"><?=$row['author']?></b></span>
           <?php if(IS_ADMIN):?>
           <a href="?act=delete-comment&entry_id=<?=$ENTRY['id']?>&id=<?=$row['id']?>"><i class="icon-trash"></i></a>
           <?php endif?>
        </div>
    </div>
<?php endforeach ?>

<h2>Add new comment</h2>
<form action="?act=do-new-comment" method="POST" class="well">
    <input type="hidden" name="entry_id" value="<?=$id?>">
    <label>Author</label>
    <input name="author" type="text"/>
    <label>Content</label>
    <textarea name="content"/></textarea>
    <div style="padding-top: 5px;">
        <button type="submit" class="btn">
            Post
        </button>
    </div>
</form>