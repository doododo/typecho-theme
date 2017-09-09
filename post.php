<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main class="container">
    <div class="wrap min">
        <section class="post-title">
            <h2><?php $this->title() ?></h2>
<?php if($this->authorId == $this->user->uid): ?>
            <a class="edit-link" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a>
<?php endif; ?>
            <div class="post-meta">
                <time class="date"><?php $this->date('Y.m.d'); ?></time>
<?php if (!empty($this->options->post_meta) && in_array('show_category', $this->options->post_meta)): ?>
                <span class="category"><?php $this->category('，'); ?></span>
<?php endif; ?>
<?php if (!empty($this->options->post_meta) && in_array('show_tags', $this->options->post_meta)): ?>
                <span class="tags"><?php $this->tags('，', true, 'none'); ?></span>
<?php endif; ?>
<?php if (!empty($this->options->post_meta) && in_array('show_comments', $this->options->post_meta)): ?>
                <span class="comments"><?php $this->commentsNum('%d °C'); ?></span>
<?php endif; ?>
            </div>
        </section>
        <article class="post-content">
            <?php $this->content(); ?>
        </article>

        <blockquote>
            <p>版权声明：<i class="fa fa-fw fa-creative-commons"></i>自由转载-非商用-非衍生-保持署名（<a href="https://blog.11010.net">bigface</a>）（<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）</p>
        </blockquote>

        <ul class="post-near">
            <li>上一篇: <?php $this->thePrev('%s','看完啦 (つд⊂)'); ?></li>
            <li>下一篇: <?php $this->theNext('%s','看完啦 (つд⊂)'); ?></li>
        </ul>
<?php if($this->options->show_author==1): ?>
        <section class="post-author">
            <figure>
                <?php $this->author->gravatar(200); ?>
            </figure>
            <div>
                <h4><?php $this->author(); ?></h4>
                <p><?php if ($this->options->author_text): ?><?php $this->options->author_text() ?><?php else: ?>此人很懒啥都没写<?php endif; ?></p>
            </div>
        </section>
<?php endif; ?>
        <?php $this->need('comments.php'); ?>
    </div>
</main>

<?php $this->need('footer.php'); ?>
