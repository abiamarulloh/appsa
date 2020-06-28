memperbarui status di index menu murid menjadi tiga 
Tampilkan Pelanggaran beserta poin
tampilkan Prestasi beserta poin
Tampilkan hasil Poin pelanggaran dikurang Poin Prestasi

   <!-- Status Poin 
    <!-- Poin Pelanggaran -->
    <?php if($gmkj['jumlah_poin']): ?>
        <span class="badge badge-pill badge-danger">
                <?= $gmkj['jumlah_pelanggaran'] ?> Pelanggaran & 
                <?= $gmkj['jumlah_poin']; ?>  Poin Pelanggaran
        </span>
    <?php else: ?>
        <span class="badge badge-pill badge-light">Tidak Memiliki Poin pelanggaran</span>
    <?php endif; ?>
    
    <br>
    
    <!-- Poin Prestasi -->
    <?php if($gDPk['jumlah_poin_prestasi']): ?>
        <span class="badge badge-pill  badge-primary">
            <?= $gDPk['jumlah_prestasi'] ?> Prestasi & 
        
            <?= $gDPk['jumlah_poin_prestasi']; ?>  
                Poin Pelanggaran
        </span>
    <?php else: ?>
        <span class="badge badge-pill  badge-light">Tidak Memiliki Poin Prestasi</span>
    <?php endif; ?>

    <br>
    
    <?php if($gmkj['jumlah_poin'] - $gDPk['jumlah_poin_prestasi'] >= 1 ): ?>
        <span class="badge badge-pill badge-success">
            <?= $gmkj['jumlah_poin']  - $gDPk['jumlah_poin_prestasi']; ?>  
            Poin Pelanggaran
        </span>

    <?php elseif ($gmkj['jumlah_poin'] - $gDPk['jumlah_poin_prestasi'] <= -1) : ?>
        <span class="badge badge-pill badge-success">
            <?php $rasional =  $gmkj['jumlah_poin']  - $gDPk['jumlah_poin_prestasi']; ?>
            <?= abs($rasional);   ?> Poin Prestasi
        </span>
    <?php elseif ($gmkj['jumlah_poin']) : ?>
        <!-- Cek apakah ada pelanggaran, jika ada tampilkan ini -->
        <?php if($gmkj['jumlah_poin'] - $gDPk['jumlah_poin_prestasi'] == 0 ): ?>
            <span class="badge badge-pill  badge-success">
                0 Poin Pelanggaran
            </span>
        <?php endif; ?>
    <?php endif; ?> -->