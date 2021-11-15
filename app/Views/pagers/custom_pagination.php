<!-- -------------------------------- -->
<!-- XII RPLA_04_AKWANCAKRATAJIMALELA -->
<!-- -------------------------------- -->
<?php $pager->setSurroundCount(3) ?>

<!-- <nav aria-label="Page navigation example"> -->
<div class="center m-2">
    <div class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
        <a class="m-1" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
            <span aria-hidden="true"><?= lang('Pager.first') ?></span>
        </a>
        <a class="m-1" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
            <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
        </a>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
        <a class="m-1<?= $link['active'] ? ' active' : '' ?>" href="<?= $link['uri'] ?>">
            <?= $link['title'] ?>
        </a>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
        <a class="m-1" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
            <span aria-hidden="true"><?= lang('Pager.next') ?></span>
        </a>
        <a class="m-1" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
            <span aria-hidden="true"><?= lang('Pager.last') ?></span>
        </a>
        <?php endif ?>
    </div>
</div>