<form id="deleteDoc" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <a href="<?php echo e(route('nilaisiswa.show', $row->id)); ?>" class="btn btn-sm mb-0 btn-info"><i class="fas fa-eye"></i></a>
    
</form>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/siswa/pages/nilai/component/action.blade.php ENDPATH**/ ?>