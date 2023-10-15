 <?php $pager->setSurroundCount(2) ?>
 <div class="card-footer clearfix">
     <ul class="pagination pagination-sm m-0 float-right">
         <?php if ($pager->hasPrevious()) { ?>
             <li class="page-item"><a class="page-link" href="<?= $pager->getFirst() ?>">&laquo;</a></li>
             <li class="page-item"><a class="page-link" href="<?= $pager->getPrevious() ?>">&laquo;</a></li>
         <?php } ?>
         <?php
            foreach ($pager->links() as $link) {
                $activeclass = $link['active'] ? 'active' : '';
            ?>
             <li class="page-item"><a class="<?= $activeclass; ?>" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
         <?php } ?>
         <?php if ($pager->hasPrevious()) { ?>
             <li class="page-item"><a class="page-link" href="<?= $pager->getNext() ?>">&laquo;</a></li>
             <li class="page-item"><a class="page-link" href="<?= $pager->getLast() ?>">&laquo;</a></li>
         <?php } ?>
     </ul>
 </div>