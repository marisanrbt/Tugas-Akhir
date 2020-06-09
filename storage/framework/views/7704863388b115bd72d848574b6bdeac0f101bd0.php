
<?php $__env->startSection('title', 'Halaman Peminjaman'); ?>
<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-3">Daftar Peminjaman Buku</h1>

                    <a href="/peminjaman/create" class="btn btn-info my-3">Form Peminjaman Buku</a>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Nama Penerbit</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmjmn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($pmjmn->nama); ?></td>
                                <td><?php echo e($pmjmn->nim); ?></td>
                                <td><?php echo e($pmjmn->judul_buku); ?></td>
                                <td><?php echo e($pmjmn->nama_penerbit); ?></td>
                                <td><?php echo e($pmjmn->tgl_pinjam); ?></td>
                                <td>
                                    <a href="/peminjaman/<?php echo e($pmjmn->id); ?>/edit" class="btn btn-success">edit</a>
                                    <form action="/peminjaman/<?php echo e($pmjmn -> id); ?>" method="post" class="d-inline">
                                        <?php echo method_field('delete'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger">delete</a>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project2\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>