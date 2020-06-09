
<?php $__env->startSection('title', 'Halaman Pengembalian'); ?>
<?php $__env->startSection('content'); ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-3">Cek Daftar Pengembalian Buku</h1>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Nama Penerbit</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $pengembalian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pngmbln): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($pngmbln->nama); ?></td>
                                <td><?php echo e($pngmbln->nim); ?></td>
                                <td><?php echo e($pngmbln->judul_buku); ?></td>
                                <td><?php echo e($pngmbln->nama_penerbit); ?></td>
                                <td><?php echo e($pngmbln->tgl_kembali); ?></td>

                                <td>
                                    <?php if($pngmbln->tgl_kembali == null): ?>
                                    <p>Belum Dikembalikan</p>
                                    <?php else: ?>
                                        <p>Telah Dikembalikan</p>
                                    <?php endif; ?></td>
                                <td>
                                <a href="/pengembalian/<?php echo e($pngmbln->id); ?>/edit" class="btn btn-sm btn-info">pengembalian</a>                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project2\resources\views/pengembalian/index.blade.php ENDPATH**/ ?>