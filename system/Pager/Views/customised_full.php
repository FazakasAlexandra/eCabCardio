<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>

<nav class="page-navigation" aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="first-page">
				<a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
					<i class="fas fa-angle-double-left"></i>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
				<i class="fas fa-angle-left"></i>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="active"' : '' ?>>
				<a href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li>
				<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
				<i class="fas fa-angle-right"></i>
				</a>
			</li>
			<li class="last-page">
				<a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<i class="fas fa-angle-double-right"></i>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>