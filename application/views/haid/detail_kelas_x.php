  <!---------------------------- Detail Murid beserta Poin --------------------------------------------  -->
  <div class="card m-5 shadow-sm mb-4" id="detailMurid">
      <div class="card-header py-3">

          <a href="<?= base_url('haid'); ?>" class="btn btn-primary btn-sm text-white"><i
                  class="fas fa-arrow-circle-left"></i> Kembali ke data haid</a>

          <a href="<?= base_url('haid/laporan_haid_pdf_x/') . $getSiswiById['nisn_id'] ; ?>" target="_blank"
              class="btn btn-info mr-5 btn-sm float-right"><i class="fas fa-fw fa-file-export"></i> Export to PDF</a>


          <!-- <a href="<?= base_url('haid/tambah_haid/') . $getSiswiById['nisn_id'] ; ?>" class="btn btn-success btn-sm "><i
                  class="far fa-plus-square"></i> Tambah Tanggal</a>
          <?php $this->session->set_flashdata('nisn', $getSiswiById['nisn_id'] ) ?> -->

          <br>
          <br>

          <div class="card">
              <div class="card-body text-center">
                  <a href="<?= base_url("haid/detail_kelas_x/") . $getSiswiById['nisn_id'];  ?>"
                      class="btn btn-light shadow-sm">Haid Kelas X</a>

                  <a href="<?= base_url("haid/detail_kelas_xi/") . $getSiswiById['nisn_id'];  ?>"
                      class="btn btn-primary">Haid Kelas XI</a>

                  <a href="<?= base_url("haid/detail_kelas_xii/") . $getSiswiById['nisn_id'];  ?>"
                      class="btn btn-primary">Haid Kelas XII</a>

              </div>
          </div>

      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table">
                  <?php if($this->session->flashdata('flash2')): ?>
                  <?= $this->session->flashdata('flash2'); ?>
                  <?php endif; ?>
                  <thead>
                      <tr>
                          <th colspan="5" class="border-bottom-0">
                              <h6 class="text-center text-uppercase">Laporan Absensi Haid</h6>
                          </th>
                      </tr>
                      <tr>
                          <th class="border-bottom-0 pt-3">
                              <h6><i class="fas fa-fw fa-user"></i> Detail Siswi</h6>
                          </th>
                      </tr>
                      <tr>
                          <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:12px">
                              Nis</th>
                          <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:12px">
                              Nama Lengkap</th>
                          <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:12px">
                              Kelas</th>
                          <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:12px">
                              Jurusan</th>
                      </tr>
                  </thead>
                  <tbody>

                      <tr>
                          <td class="p-0 border-top-0  text-center" style="font-size:10px">
                              <?= $getSiswiById['nisn_id'];  ?></td>
                          <td class="p-0 border-top-0  text-center" style="font-size:10px">
                              <?= $getSiswiById['nama'];  ?></td>
                          <td class="p-0 border-top-0  text-center" style="font-size:10px">
                              X

                          </td>
                          <td class="p-0 border-top-0  text-center" style="font-size:10px">
                              <?php if($getSiswiById['jurusan'] == 1): ?>
                              TKJ
                              <?php elseif ($getSiswiById['jurusan'] == 2) : ?>
                              AKL
                              <?php elseif($getSiswiById['jurusan'] == 3): ?>
                              OTKP
                              <?php endif; ?>
                          </td>
                      </tr>
                  </tbody>

              </table>

              <br>


              <!-- data haid pagi -->
              <table class="table">
                  <thead>
                      <tr>
                          <td class="p-1 border-top-0 border-bottom-0 font-weight-bold">
                              <h6>
                                  <li class="fas fa-fw fa-smile-wink"></li> Absen Pagi hari
                              </h6>
                          </td>
                      </tr>
                      <tr class="text-center">
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Tanggal
                              Haid</td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Hari Ke-
                          </td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Waktu absen
                          </td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Tindakan
                          </td>
                      </tr>
                  </thead>

                  <tbody class="text-center">
                      <?php if($getSiswiJoin_pagi ) : ?>
                      <?php foreach( $getSiswiJoin_pagi as $gsjp): ?>
                      <?php if($gsjp['kelasHaid'] == 1) : ?>
                      <tr>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <?php 
                                        if($gsjp['tanggal']) : 
                                        $bulan  =  date("m", strtotime($gsjp['tanggal']));
                            
                                        if( $bulan == "1"){
                                            $bulan = "Januari";
                                        }elseif($bulan == "2"){
                                            $bulan = "Februari";
                                        }elseif($bulan == "3"){
                                            $bulan = "Maret";
                                        }elseif($bulan == "4"){
                                            $bulan = "April";
                                        }elseif($bulan == "5"){
                                            $bulan = "May";
                                        }elseif($bulan == "6"){
                                            $bulan = "Juni";
                                        }elseif($bulan == "7"){
                                            $bulan = "Juli";
                                        }elseif($bulan == "8"){
                                            $bulan = "Agustus";
                                        }elseif($bulan == "9"){
                                            $bulan = "September";
                                        }elseif($bulan == "10"){
                                            $bulan = "Oktober";
                                        }elseif($bulan == "11"){
                                            $bulan = "November";
                                        }elseif($bulan == "12"){
                                            $bulan = "Desember";
                                        }
                                        
                                            echo date("d", strtotime($gsjp['tanggal'])). " " . $bulan . " " . date("Y", strtotime($gsjp['tanggal'])) ;
                                    
                                    endif ;
                                ?>

                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              Hari Ke- <?= $gsjp['harike']; ?>
                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <li class="fas fa-smile-wink"></li> Pagi hari
                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">

                              <?php if($gsjp['kelasMurid'] == 1) : ?>
                              <!-- Hanya bisa dihapus jika murid berada di kelas saat ini -->
                              <a href="<?= base_url('haid/hapus_haid/') . $gsjp['id'] ; ?>"
                                  onclick="return confirm('Yakin Ingin Hapus salah satu data Haid ' + '<?=  $getSiswiById['nama']; ?>') ;"><i
                                      class="fas fa-trash"></i> </a>
                              <?php else : ?>
                                <span class="font-weight-bold">-</span>
                              <?php endif ; ?>


                          </td>
                      </tr>
                      <?php endif ; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                      <tr>
                          <td colspan="4" class="text-center">Belum ada data absen haid pagi hari</td>
                      </tr>
                      <?php endif; ?>
                  </tbody>
              </table>


              <!-- data haid Siang -->
              <table class="table">
                  <thead>
                      <tr>
                          <td class="p-1 border-top-0 border-bottom-0 font-weight-bold">
                              <h6>
                                  <li class="fas fa-fw fa-grin"></li> Absen Siang hari
                              </h6>
                          </td>
                      </tr>
                      <tr class="text-center">
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Tanggal
                              Haid</td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Hari Ke-
                          </td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Waktu absen
                          </td>
                          <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:12px">Tindakan
                          </td>
                      </tr>
                  </thead>

                  <tbody class="text-center">
                      <?php if($getSiswiJoin_siang ) : ?>
                      <?php foreach( $getSiswiJoin_siang as $gsjs): ?>
                      <?php if($gsjs['kelasHaid'] == 1) : ?>
                      <tr>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <?php 
                                    if( $gsjs['tanggal']) : 
                                    $bulan  =  date("m", strtotime($gsjs['tanggal']));
                        
                                    if( $bulan == "1"){
                                        $bulan = "Januari";
                                    }elseif($bulan == "2"){
                                        $bulan = "Februari";
                                    }elseif($bulan == "3"){
                                        $bulan = "Maret";
                                    }elseif($bulan == "4"){
                                        $bulan = "April";
                                    }elseif($bulan == "5"){
                                        $bulan = "May";
                                    }elseif($bulan == "6"){
                                        $bulan = "Juni";
                                    }elseif($bulan == "7"){
                                        $bulan = "Juli";
                                    }elseif($bulan == "8"){
                                        $bulan = "Agustus";
                                    }elseif($bulan == "9"){
                                        $bulan = "September";
                                    }elseif($bulan == "10"){
                                        $bulan = "Oktober";
                                    }elseif($bulan == "11"){
                                        $bulan = "November";
                                    }elseif($bulan == "12"){
                                        $bulan = "Desember";
                                    }
                                    
                                    echo date("d", strtotime($gsjs['tanggal'])). " " . $bulan . " " . date("Y", strtotime($gsjs['tanggal'])) ;
                                
                                else :
                            ?>

                              <li class="fas fa-minus"></li>

                              <?php endif; ?>
                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <?php if($gsjs['harike']) : ?>
                              Hari Ke- <?= $gsjs['harike']; ?>
                              <?php else : ?>
                              <li class="fas fa-minus"></li>
                              <?php endif; ?>
                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <?php if($gsjs['waktu'] == 0) : ?>
                              <li class="fas fa-grin"></li> Siang hari
                              <?php else : ?>
                              <li class="fas fa-minus"></li>
                              <?php endif; ?>
                          </td>
                          <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px">
                              <?php if($gsjs['kelasMurid'] == 1) : ?>
                              <!-- Hanya bisa dihapus jika murid berada di kelas saat ini -->
                              <a href="<?= base_url('haid/hapus_haid/') . $gsjs['id'] ; ?>"
                                  onclick="return confirm('Yakin Ingin Hapus salah satu data Haid ' + '<?=  $getSiswiById['nama']; ?>') ;"><i
                                      class="fas fa-trash"></i> </a>
                              <?php else : ?>
                              <span class="font-weight-bold">-</span>
                              <?php endif ; ?>
                          </td>
                      </tr>
                      <?php endif; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                      <tr>
                          <td colspan="4" class="text-center">Belum ada data absen haid siang hari</td>
                      </tr>
                      <?php endif; ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>