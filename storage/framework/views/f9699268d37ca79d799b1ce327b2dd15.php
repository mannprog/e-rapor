<form id="deleteDoc" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <a href="<?php echo e(route('kelola.gtk.show', $row->id)); ?>" class="btn btn-sm mb-0 btn-info"><i class="fas fa-eye"></i></a>
    <a href="javascript:void()" data-id="<?php echo e($row->id); ?>" id="editData" class="btn btn-sm mb-0 btn-warning"><i
            class="fas fa-pencil-alt"></i></a>
    <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn text-light" data-id="<?php echo e($row->id); ?>"><i
            class="fas fa-trash-alt"></i></button>
</form>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/users/gtk/component/action.blade.php ENDPATH**/ ?>