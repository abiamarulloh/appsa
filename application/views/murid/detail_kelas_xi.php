  
<!---------------------------- Detail Murid beserta Poin --------------------------------------------  -->
<div class="card m-3 shadow-sm mb-4" id="detailMurid">
    <div class="card-header py-3">
        <a href="<?= base_url('murid/option_detail_murid/') . $getMuridKelasJurusanById['nisn_id']; ?>"  class="btn btn-primary btn-sm text-white"><i class="fas fa-arrow-circle-left"></i> Kembali</a> 
        

        <a href="<?= base_url('murid/laporan_poin_pdf_xi/') . $getMuridKelasJurusanById['nisn_id'] ; ?>" target="_blank" class="btn btn-success btn-sm mr-5 float-right"><i class="fas fa-fw fa-file-export"></i> Export PDF</a>

        <br>
        <br>

        <div class="card">
            <div class="card-body text-center">
                <a href="<?= base_url("murid/detail_kelas_x/") . $getMuridKelasJurusanById['nisn_id'];  ?>" class="btn btn-primary">Data Kelas X</a>

                <a href="<?= base_url("murid/detail_kelas_xi/") . $getMuridKelasJurusanById['nisn_id'];  ?>" class="btn btn-light shadow-sm">Data Kelas XI</a>

                <a href="<?= base_url("murid/detail_kelas_xii/") . $getMuridKelasJurusanById['nisn_id'];  ?>" class="btn btn-primary">Data Kelas XII</a>

            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h3>Data Kelas XI</h3>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
            <?php endif; ?>

            <!-- Detail Murid -->
            <thead>
                <tr>
                    <th colspan="5" class="p-1 border-0">
                        <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:14px">
                            <li class="fas fa-user"></li> Detail Murid
                        </h6>
                    </th>
                </tr>
                <tr>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:12px">Nis</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:12px">Nama Lengkap</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:12px">Kelas</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:12px">Jurusan</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:12px">Tindakan</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="p-1 text-center" style="font-size:12px">
                        <?= $getMuridKelasJurusanById['nisn_id'];  ?>
                    </td>
                    <td class="p-1 text-center" style="font-size:12px">
                        <?= $getMuridKelasJurusanById['nama'];  ?>
                    </td>
                    <td class="p-1 text-center" style="font-size:12px">
                        XI
                    </td>
                    <td class="p-1 text-center" style="font-size:12px">
                        <?php if($getMuridKelasJurusanById['jurusan'] == 1): ?>
                        TKJ
                        <?php elseif ($getMuridKelasJurusanById['jurusan'] == 2) : ?>
                        AKL
                        <?php elseif($getMuridKelasJurusanById['jurusan'] == 3): ?>
                        OTKP
                        <?php endif; ?>
                    </td>
                    
                    <!-- Tindakan -->
                    <td class="p-1 text-center" style="font-size:12px">
                            <!-- Jika kelas Poin Pelanggaran terakhir sama dengan kelas murid yang sekarang -->
                            <?php if( $getMuridKelasJurusanById['kelas_murid'] == 2) : ?>
                                <a href="<?= base_url('murid/edit_murid/') . $getMuridKelasJurusanById['nisn_id']; ?>"    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit Murid
                                </a>
                            <?php else : ?>
                                <small class="font-weight-bold">-</small>
                            <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>



        <!-- Detail Pelanggaran -->
        <table class="table mt-2">
            <thead>
                <tr>
                    <th colspan="5" class="p-1 border-0">
                        <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:14px">
                        <li class="fas fa-fw fa-gavel"></li> Detail Pelanggaran
                        </h6>
                    </th>
                </tr>
                <tr>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                        Pelanggaran
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                        Pasal
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                        Poin
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                        Tanggal Kejadian
                    </td>
                    <td class="p-1 border-top-0 border-bottom text-center font-weight-bold" style="font-size:12px">
                        Tindakan
                    </td>
                </tr>
            </thead>

            <tbody>
            
                <?php $total_poin = 0; ?>
                <?php $total_pelanggaran = 0; ?>

                <?php foreach( $getMuridKelasJurusanByIdPoin as $gmkjbi): ?>
                    
                    <!-- menampilkan data kelas dari tbl_murid dan tbl_murid_poin -->
                    <?php if( $gmkjbi['kelas_poin'] == 2) : ?>
                        <tr>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px;">
                                <?php if($gmkjbi['pelanggaran']) : ?>
                                    <?= $gmkjbi['pelanggaran'];  ?>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php  endif; ?>
                            </td>
                            
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px;">
                                <?php if($gmkjbi['pasal']) : ?>
                                    <?= $gmkjbi['pasal'];  ?>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php  endif; ?>
                            </td>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px;">
                                <?php if($gmkjbi['jumlah_poin']) : ?>
                                    <?= $gmkjbi['jumlah_poin'];  ?>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php  endif; ?>
                            </td>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px;">
                            
                                    <?php 
                                        if( $gmkjbi['date'] != NULL) : 
                                            $bulan  =  date("M", strtotime($gmkjbi['date']));
                                
                                                if( $bulan == "Jan"){
                                                    $bulan = "Januari";
                                                }elseif($bulan == "Feb"){
                                                    $bulan = "Februari";
                                                }elseif($bulan == "Mar"){
                                                    $bulan = "Maret";
                                                }elseif($bulan == "Apr"){
                                                    $bulan = "April";
                                                }elseif($bulan == "May"){
                                                    $bulan = "Mei";
                                                }elseif($bulan == "Jun"){
                                                    $bulan = "Juni";
                                                }elseif($bulan == "Jul"){
                                                    $bulan = "Juli";
                                                }elseif($bulan == "Aug"){
                                                    $bulan = "Agustus";
                                                }elseif($bulan == "Sep"){
                                                    $bulan = "September";
                                                }elseif($bulan == "Oct"){
                                                    $bulan = "Oktober";
                                                }elseif($bulan == "Nov"){
                                                    $bulan = "November";
                                                }elseif($bulan == "Dec"){
                                                    $bulan = "Desember";
                                                }
                                            
                                        
                                        echo date("d", strtotime($gmkjbi['date'])). " " . $bulan . " " . date("Y", strtotime($gmkjbi['date'])) ;
                                ?>


                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif; ?>
                                    
                            </td>

                            <?php $total_poin = $total_poin + $gmkjbi['jumlah_poin']; ?>
                            <?php $total_pelanggaran += 1; ?>


                            <td class="p-1 border-bottom-0 border-top-0 text-center" style="font-size:12px;">
                            
                                <?php if( $getMuridKelasJurusanById['kelas_murid'] == 2) : ?>
                                    <a href="<?= base_url('murid/hapus_poin_pelanggaran_murid/') . $gmkjbi['murid_poin_id'];  ?>" onclick="return confirm('Yakin Ingin Hapus salah satu Poin ' + '<?= $getMuridKelasJurusanByIdPoinAja['nama'];?>'  + ' ?')">
                                        <li class="fas fa-trash text-danger"></li>
                                    </a>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif;  ?>
                                    
                            </td>


                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                

                <tr>
                    <td colspan="5" class="p-1 text-center font-weight-bold" style="font-size:12px">Total Poin dan Pelanggaran</td>
                </tr>
                
                <tr>
                    <td class="p-1 text-center font-weight-bold" style="font-size:12px">Total Poin Pelanggaran</td>
                    <td colspan="3" class="p-1 text-center" style="font-size:12px">
                        <?php if($total_poin) : ?>
                            <?= $total_poin; ?> Poin
                        <?php else: ?>
                            <li class="fas fa-minus"></li>
                        <?php endif; ?>
                    </td>
                </tr>
             
                <tr>
                        <td class="p-1 text-center font-weight-bold border-top-0" style="font-size:12px">Total Pelanggaran</td>
                        <td colspan="3" class="p-1 text-center border-top-0" style="font-size:12px">
                            
                            <?php if($total_pelanggaran) : ?>
                                
                                <?php
                                    echo $total_pelanggaran . " Pelanggaran";                     
                                ?>
                            <?php else: ?>
                                <li class="fas fa-minus"></li>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                </tbody>
            </table>



            <!-- Detail Prestasi -->
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th colspan="5" class="p-1 border-0">
                            <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:14px">
                            <li class="fas fa-fw fa-trophy"></li> Detail Prestasi
                            </h6>
                        </th>
                    </tr>
                    <tr>
                        <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                            Jenis Prestasi
                        </td>
                        <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                            Detail Prestasi
                        </td>
                        <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                            Poin
                        </td>
                        <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">
                            Tanggal Kejadian
                        </td>
                        <td class="p-1 border-top-0 border-bottom text-center font-weight-bold" style="font-size:12px">
                            Tindakan
                        </td>
                    </tr>
                </thead>

                <tbody>
            
                    <?php $poin_prestasi = 0; ?>
                    <?php $banyak_prestasi = 0; ?>

                    <?php foreach( $poin_prestasi_by_id_poin_prestasi as $ppbipp): ?>
                        <?php if($ppbipp['kelas_prestasi'] == 2) : ?>

                        <tr>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px">
                                <?php if($ppbipp['jenis_prestasi']) : ?>
                                    <?= $ppbipp['jenis_prestasi'];  ?>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif; ?>
                            </td>
                            
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px">
                                <?php if($ppbipp['sub_jenis_prestasi']) : ?>
                                    <?= $ppbipp['sub_jenis_prestasi'];  ?> 
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif; ?>
                            </td>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px">
                                <?php if($ppbipp['poin']) : ?>
                                    <?= $ppbipp['poin'];  ?>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif; ?>
                            </td>
                            <td class="p-1 border-bottom-0 border-top-0" style="font-size:12px">
                            
                                <?php 
                                    if( $ppbipp['date'] != NULL) : 
                                        $bulan  =  date("M", strtotime($ppbipp['date']));
                            
                                            if( $bulan == "Jan"){
                                                $bulan = "Januari";
                                            }elseif($bulan == "Feb"){
                                                $bulan = "Februari";
                                            }elseif($bulan == "Mar"){
                                                $bulan = "Maret";
                                            }elseif($bulan == "Apr"){
                                                $bulan = "April";
                                            }elseif($bulan == "May"){
                                                $bulan = "Mei";
                                            }elseif($bulan == "Jun"){
                                                $bulan = "Juni";
                                            }elseif($bulan == "Jul"){
                                                $bulan = "Juli";
                                            }elseif($bulan == "Aug"){
                                                $bulan = "Agustus";
                                            }elseif($bulan == "Sep"){
                                                $bulan = "September";
                                            }elseif($bulan == "Oct"){
                                                $bulan = "Oktober";
                                            }elseif($bulan == "Nov"){
                                                $bulan = "November";
                                            }elseif($bulan == "Dec"){
                                                $bulan = "Desember";
                                            }
                                        
                                    
                                    echo date("d", strtotime($ppbipp['date'])). " " . $bulan . " " . date("Y", strtotime($ppbipp['date'])) ;
                                
                            ?>

                            <?php else :  ?>
                                <li class="fas fa-minus"></li>
                            <?php  endif; ?>
                            
                            </td>
                            <?php $poin_prestasi = $poin_prestasi + $ppbipp['jumlah_poin_prestasi'];?>
                            <?php $banyak_prestasi +=  1 ?>

                            <td class="p-1 border-bottom-0 border-top-0 text-center" style="font-size:12px;">
                                <?php if( $getMuridKelasJurusanById['kelas_murid'] == 2 ) : ?>
                                    <a href="<?= base_url('murid/hapus_poin_prestasi_murid/') . $ppbipp['murid_poin_prestasi_id'];  ?>" onclick="return confirm('Yakin Ingin Hapus salah satu Poin Prestasi  ' + '<?= $getMuridKelasJurusanByIdPoinAja['nama'];?>'  + ' ?')">
                                    <li class="fas fa-trash text-danger"></li>
                                    </a>
                                <?php else : ?>
                                    <li class="fas fa-minus"></li>
                                <?php endif;  ?>
                            </td>
                        </tr>
                        <?php endif;  ?>
                    <?php endforeach; ?>
                    

                    <tr>
                        <td colspan="5" class="p-1 text-center font-weight-bold" style="font-size:12px">
                            Total Poin dan Prestasi
                        </td>
                    </tr>
                    <tr>
                        <td class="p-1 text-center font-weight-bold" style="font-size:12px">Total Poin Prestasi</td>
                        <td colspan="3" class="p-1 text-center" style="font-size:12px">
                            <?php if($poin_prestasi) : ?>
                                <?= $poin_prestasi;  ?> Poin
                            <?php else : ?>
                                <li class="fas fa-minus"></li>
                            <?php endif; ?>
                        </td>
                    </tr>
        
                    <tr>
                        <td class="p-1 text-center font-weight-bold border-top-0" style="font-size:12px">Total Prestasi</td>
                        <td colspan="3" class="p-1 text-center border-top-0" style="font-size:12px">
                    
                            <?php if($banyak_prestasi) : ?>
                                
                                <?php
                                    echo $banyak_prestasi . " Prestasi";                     
                                ?>
                            <?php else: ?>
                                <li class="fas fa-minus"></li>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <ul class="list-group text-center">
                <li class="list-group-item active">Total Poin Pelanggaran - Total Poin Prestasi</li>
                <li class="list-group-item ">
                    <?php if($total_poin|| $poin_prestasi): ?>
                        <?= $total_poin . " Poin Pelanggaran <span class='font-weight-bold'> - </span> " . $poin_prestasi . " Poin Prestasi"; ?>
                    <?php else : ?>
                        <span class="font-weight-bold">-</span>
                    <?php endif; ?>
                </li>
                <li class="list-group-item">
                    <?php if($total_poin - $poin_prestasi >= 1) : ?>
                        <?= $total_poin - $poin_prestasi;  ?> Poin Pelanggaran
                    <?php elseif($total_poin - $poin_prestasi <= -1) : ?>
                        <?php $poin_rasional = $total_poin - $poin_prestasi;  ?>
                        <?= abs($poin_rasional);   ?> Poin Prestasi
                    <?php elseif(!$total_poin) : ?>
                        <span class="font-weight-bold">-</span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</div>