<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar ">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar ">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>assets/dist/img/user.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata("username") ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if ($this->session->userdata("role") == '1') { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Crud_area' || $this->uri->segment(1) == 'Crud_kontrak' || $this->uri->segment(1) == 'crud_paket'
                              || $this->uri->segment(1) == 'Crud_user' || $this->uri->segment(1) == 'crud_vendor' ? 'active' : '' ?>">
          <a href="#">
            <i class=" fa fa-edit"></i> <span>Pengelolaan Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Crud_area' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_area') ?>"><i class="fa fa-circle-o"></i> Data Area</a></li>
            <li <?= $this->uri->segment(1) == 'Crud_kontrak' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_kontrak') ?>"><i class="fa fa-circle-o"></i> Data Pagu Kontrak</a></li>
            <li <?= $this->uri->segment(1) == 'crud_paket' ? 'class="active"' : '' ?>><a href="<?php echo base_url('crud_paket') ?>"><i class="fa fa-circle-o"></i> Data Paket</a></li>
            <li <?= $this->uri->segment(1) == 'Crud_user' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
            <li <?= $this->uri->segment(1) == 'crud_vendor' ? 'class="active"' : '' ?>><a href="<?php echo base_url('crud_vendor') ?>"><i class="fa fa-circle-o"></i> Data Vendor</a></li>
            <li <?= $this->uri->segment(1) == 'Mapping_vendor' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Mapping_vendor') ?>"><i class="fa fa-circle-o"></i> Data Mapping Vendor</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'inp_addendum' || $this->uri->segment(1) == 'inp_spj_fin'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'kontrol_fin' ? 'class="active"' : '' ?>><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i>Kontrol Finansial</a></li>

            <li <?= $this->uri->segment(1) == 'inp_addendum' ? 'class="active"' : '' ?>><a href="<?php echo base_url('inp_addendum') ?>"><i class="fa fa-circle-o"></i>Addendum</a></li>
            <li <?= $this->uri->segment(1) == 'list_amandemen' ? 'class="active"' : '' ?>><a href="<?php echo base_url('list_amandemen') ?>"><i class="fa fa-circle-o"></i>List Amandemen</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'ba_survey' || $this->uri->segment(1) == 'monitoring' || $this->uri->segment(1) == 'pengajuan'
                              || $this->uri->segment(1) == 'perijinan' || $this->uri->segment(1) == 'retribusi' || $this->uri->segment(1) == 'skrd' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Pengelolaan Perizinan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'ba_survey' ? 'class="active"' : '' ?>><a href="<?php echo base_url('ba_survey') ?>"><i class="fa fa-circle-o"></i>BA Survey</a></li>
            <li <?= $this->uri->segment(1) == 'monitoring' ? 'class="active"' : '' ?>><a href="<?php echo base_url('monitoring') ?>"><i class="fa fa-circle-o"></i>Monitoring Perizinan</a></li>
            <li <?= $this->uri->segment(1) == 'pengajuan' ? 'class="active"' : '' ?>><a href="<?php echo base_url('pengajuan') ?>"><i class="fa fa-circle-o"></i>Pengajuan Perizinan Baru</a></li>
            <li <?= $this->uri->segment(1) == 'perijinan' ? 'class="active"' : '' ?>><a href="<?php echo base_url('perijinan') ?>"><i class="fa fa-circle-o"></i>Perizinan</a></li>
            <li <?= $this->uri->segment(1) == 'retribusi' ? 'class="active"' : '' ?>><a href="<?php echo base_url('retribusi') ?>"><i class="fa fa-circle-o"></i>Retribusi</a></li>
            <li <?= $this->uri->segment(1) == 'skrd' ? 'class="active"' : '' ?>><a href="<?php echo base_url('skrd') ?>"><i class="fa fa-circle-o"></i>SKRD</a></li>
          </ul>
        </li>


        <li class="treeview <?= $this->uri->segment(1) == 'Inp_pel_khs' || $this->uri->segment(1) == 'Inp_sanksi_spj' || $this->uri->segment(1) == 'Approve_pelanggaran'
                              || $this->uri->segment(1) == 'List_pelanggaran' || $this->uri->segment(1) == 'Upl_sanksi_khs' || $this->uri->segment(1) == 'Upl_sanksi_spj'
                              || $this->uri->segment(1) == 'List_sanksi' || $this->uri->segment(1) == 'List_sanksi_spj' || $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Pelanggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Inp_pel_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_pel_khs') ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggaran KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Inp_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Tambah Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'Approve_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Approve_pelanggaran') ?>"><i class="fa fa-circle-o"></i> Approve Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_pelanggaran') ?>"><i class="fa fa-circle-o"></i> List Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_sanksi' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_sanksi') ?>"><i class="fa fa-circle-o"></i> List Sanksi</a></li>
            <li <?= $this->uri->segment(1) == 'List_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> List Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Sanksi_siap_cetak') ?>"><i class="fa fa-circle-o"></i> Sanksi Siap Cetak</a></li>
            <li <?= $this->uri->segment(1) == 'Upl_sanksi_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Upl_sanksi_khs') ?>"><i class="fa fa-circle-o"></i> Unggah Sanksi KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Upl_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Upl_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Unggah Sanksi SPJ</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
            <li <?= $this->uri->segment(1) == 'Inp_progres_kerja' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_progres_kerja') ?>"><i class="fa fa-circle-o"></i> Tambah Progress</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>

            <li <?= $this->uri->segment(1) == 'Crud_skkio' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_skkio') ?>"><i class="fa fa-circle-o"></i> Data SKKI/O</a></li>
          </ul>
        </li>

      <?php } elseif ($this->session->userdata("role") == "2") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>



        <li class="treeview <?= $this->uri->segment(1) == 'Inp_pel_khs' || $this->uri->segment(1) == 'Inp_sanksi_spj' || $this->uri->segment(1) == 'Approve_pelanggaran'
                              || $this->uri->segment(1) == 'List_pelanggaran' || $this->uri->segment(1) == 'Upl_sanksi_khs' || $this->uri->segment(1) == 'Upl_sanksi_spj'
                              || $this->uri->segment(1) == 'List_sanksi' || $this->uri->segment(1) == 'List_sanksi_spj' || $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Pelanggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Inp_pel_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_pel_khs') ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggaran KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Inp_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Tambah Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'Approve_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Approve_pelanggaran') ?>"><i class="fa fa-circle-o"></i> Approve Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_pelanggaran') ?>"><i class="fa fa-circle-o"></i> List Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_sanksi' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_sanksi') ?>"><i class="fa fa-circle-o"></i> List Sanksi</a></li>
            <li <?= $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Sanksi_siap_cetak') ?>"><i class="fa fa-circle-o"></i> Sanksi Siap Cetak</a></li>
            <li <?= $this->uri->segment(1) == 'Upl_sanksi_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Upl_sanksi_khs') ?>"><i class="fa fa-circle-o"></i> Unggah Sanksi KHS</a></li>
          </ul>
        </li>



        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'progress' || $this->uri->segment(1) == 'progress' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
          </ul>
        </li>


        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>


          </ul>
        </li>

      <?php } elseif ($this->session->userdata("role") == "3") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
            <li <?= $this->uri->segment(1) == 'Anggaran/v_input_tagihan' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran/tambah_data') ?>"><i class="fa fa-circle-o"></i> Tambah Tagihan</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Inp_pel_khs' || $this->uri->segment(1) == 'Inp_sanksi_spj' || $this->uri->segment(1) == 'Approve_pelanggaran'
                              || $this->uri->segment(1) == 'List_pelanggaran' || $this->uri->segment(1) == 'Upl_sanksi_khs' || $this->uri->segment(1) == 'Upl_sanksi_spj'
                              || $this->uri->segment(1) == 'List_sanksi' || $this->uri->segment(1) == 'List_sanksi_spj' || $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Pelanggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Inp_pel_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_pel_khs') ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggaran KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Inp_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Tambah Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'List_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_pelanggaran') ?>"><i class="fa fa-circle-o"></i> List Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_sanksi' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_sanksi') ?>"><i class="fa fa-circle-o"></i> List Sanksi</a></li>
          </ul>
        </li>

      <?php } elseif ($this->session->userdata("role") == "4") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>
            <li <?= $this->uri->segment(1) == 'inp_spj_fin' ? 'class="active"' : '' ?>><a href="<?php echo base_url('inp_spj_fin') ?>"><i class="fa fa-circle-o"></i>Input SPJ</a></li>
            <li><a href="<?php echo base_url('inp_addendum') ?>"><i class="fa fa-circle-o"></i> Addendum</a></li>



          </ul>
        </li>

        <li class="treeview<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Pengelolaan Perizinan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('monitoring') ?>"><i class="fa fa-circle-o"></i> Monitoring Perizinan</a></li>
            <li><a href="<?php echo base_url('pengajuan') ?>"><i class="fa fa-circle-o"></i> Pengajuan Perizinan Baru</a></li>
          </ul>
        </li>


        <li class="treeview <?= $this->uri->segment(1) == 'Inp_pel_khs' || $this->uri->segment(1) == 'inp_sanksi_spj' || $this->uri->segment(1) == 'Approve_pelanggaran'
                              || $this->uri->segment(1) == 'List_pelanggaran' || $this->uri->segment(1) == 'Upl_sanksi_khs' || $this->uri->segment(1) == 'Upl_sanksi_spj'
                              || $this->uri->segment(1) == 'List_sanksi' || $this->uri->segment(1) == 'List_sanksi_spj' || $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Pelanggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Inp_pel_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_pel_khs') ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggaran KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Inp_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Tambah Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'Approve_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Approve_pelanggaran') ?>"><i class="fa fa-circle-o"></i> Approve Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_pelanggaran') ?>"><i class="fa fa-circle-o"></i> List Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_sanksi' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_sanksi') ?>"><i class="fa fa-circle-o"></i> List Sanksi</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
          </ul>
        </li>


      <?php } elseif ($this->session->userdata("role") == "5") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('inp_addendum') ?>"><i class="fa fa-circle-o"></i> Addendum</a></li>

            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>
            <li><a href="<?php echo base_url('list_amandemen') ?>"><i class="fa fa-circle-o"></i> List Amandemen</a></li>


          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
            <li <?= $this->uri->segment(1) == 'Anggaran/v_input_tagihan' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran/tambah_data') ?>"><i class="fa fa-circle-o"></i> Tambah Tagihan</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
          </ul>
        </li>
      <?php } elseif ($this->session->userdata("role") == "6") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('inp_addendum') ?>"><i class="fa fa-circle-o"></i> Addendum</a></li>

            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>


          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
          </ul>
        </li>
        <li class="treeview<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Pengelolaan Perizinan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('ba_survey') ?>"><i class="fa fa-circle-o"></i> BA Survey</a></li>
            <li><a href="<?php echo base_url('monitoring') ?>"><i class="fa fa-circle-o"></i> Monitoring Perizinan</a></li>
            <li><a href="<?php echo base_url('pengajuan') ?>"><i class="fa fa-circle-o"></i> Pengajuan Perizinan Baru</a></li>
            <li><a href="<?php echo base_url('retribusi') ?>"><i class="fa fa-circle-o"></i> Retribusi</a></li>
            <li><a href="<?php echo base_url('skrd') ?>"><i class="fa fa-circle-o"></i> SKRD</a></li>
          </ul>
        </li>

      <?php } elseif ($this->session->userdata("role") == "7") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Pengelolaan Perizinan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('ba_survey') ?>"><i class="fa fa-circle-o"></i> BA Survey</a></li>
            <li><a href="<?php echo base_url('monitoring') ?>"><i class="fa fa-circle-o"></i> Monitoring Perizinan</a></li>
            <li><a href="<?php echo base_url('pengajuan') ?>"><i class="fa fa-circle-o"></i> Pengajuan Perizinan Baru</a></li>
            <li><a href="<?php echo base_url('retribusi') ?>"><i class="fa fa-circle-o"></i> Retribusi</a></li>
            <li><a href="<?php echo base_url('skrd') ?>"><i class="fa fa-circle-o"></i> SKRD</a></li>
          </ul>
        </li>
        </li>
      <?php } elseif ($this->session->userdata("role") == "8") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Inp_pel_khs' || $this->uri->segment(1) == 'inp_sanksi_spj' || $this->uri->segment(1) == 'Approve_pelanggaran'
                              || $this->uri->segment(1) == 'List_pelanggaran' || $this->uri->segment(1) == 'Upl_sanksi_khs' || $this->uri->segment(1) == 'Upl_sanksi_spj'
                              || $this->uri->segment(1) == 'List_sanksi' || $this->uri->segment(1) == 'List_sanksi_spj' || $this->uri->segment(1) == 'Sanksi_siap_cetak' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Pelanggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Inp_pel_khs' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_pel_khs') ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggaran KHS</a></li>
            <li <?= $this->uri->segment(1) == 'Inp_sanksi_spj' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_sanksi_spj') ?>"><i class="fa fa-circle-o"></i> Tambah Sanksi SPJ</a></li>
            <li <?= $this->uri->segment(1) == 'Approve_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Approve_pelanggaran') ?>"><i class="fa fa-circle-o"></i> Approve Pelanggaran</a></li>
            <li <?= $this->uri->segment(1) == 'List_pelanggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('List_pelanggaran') ?>"><i class="fa fa-circle-o"></i> List Pelanggaran</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
            <li <?= $this->uri->segment(1) == 'Anggaran/v_input_tagihan' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran/tambah_data') ?>"><i class="fa fa-circle-o"></i> Tambah Tagihan</a></li>
            <li <?= $this->uri->segment(1) == 'Crud_skkio' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_skkio') ?>"><i class="fa fa-circle-o"></i> Data SKKI/O</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Crud_area' || $this->uri->segment(1) == 'Crud_kontrak' || $this->uri->segment(1) == 'crud_paket'
                              || $this->uri->segment(1) == 'Crud_user' || $this->uri->segment(1) == 'crud_vendor' ? 'active' : '' ?>">
          <a href="#">
            <i class=" fa fa-edit"></i> <span>Pengelolaan Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Crud_user' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>

          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'Progress' || $this->uri->segment(1) == 'Inp_progres_kerja' ? 'active' : '' ?>">

          <a href="#">
            <i class="fa fa-book"></i> <span>Pengelolaan Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Progress' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Progress') ?>"><i class="fa fa-circle-o"></i> Detail SPJ </a></li>
            <li <?= $this->uri->segment(1) == 'Inp_progres_kerja' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Inp_progres_kerja') ?>"><i class="fa fa-circle-o"></i> Tambah Progress</a></li>
          </ul>
        </li>
      <?php } elseif ($this->session->userdata("role") == "9") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>


          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Anggaran' || $this->uri->segment(1) == 'Anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Crud_area' || $this->uri->segment(1) == 'Crud_kontrak' || $this->uri->segment(1) == 'crud_paket'
                              || $this->uri->segment(1) == 'Crud_user' || $this->uri->segment(1) == 'crud_vendor' ? 'active' : '' ?>">
          <a href="#">
            <i class=" fa fa-edit"></i> <span>Pengelolaan Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Crud_user' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
            <li <?= $this->uri->segment(1) == 'Crud_kontrak' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_kontrak') ?>"><i class="fa fa-circle-o"></i> Data Pagu Kontrak</a></li>
          </ul>
        </li>
      <?php } elseif ($this->session->userdata("role") == "10") { ?>
        <li <?= $this->uri->segment(1) == 'Chart' || $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('Chart') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'kontrol_fin/tambah_addendum' || $this->uri->segment(1) == 'kontrol_fin/tambah'
                              || $this->uri->segment(1) == 'kontrol_fin' || $this->uri->segment(1) == 'list_amandemen' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pengelolaan Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('kontrol_fin') ?>"><i class="fa fa-circle-o"></i> Kontrol Finansial</a></li>


          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'anggaran' || $this->uri->segment(1) == 'anggaran/v_input_tagihan'
                              || $this->uri->segment(1) == 'Crud_skkio' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengelolaan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Anggaran' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Anggaran') ?>"><i class="fa fa-circle-o"></i> Penyerapan Anggaran</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'Crud_area' || $this->uri->segment(1) == 'Crud_kontrak' || $this->uri->segment(1) == 'crud_paket'
                              || $this->uri->segment(1) == 'Crud_user' || $this->uri->segment(1) == 'crud_vendor' ? 'active' : '' ?>">
          <a href="#">
            <i class=" fa fa-edit"></i> <span>Pengelolaan Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'Crud_user' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
            <li <?= $this->uri->segment(1) == 'Crud_kontrak' ? 'class="active"' : '' ?>><a href="<?php echo base_url('Crud_kontrak') ?>"><i class="fa fa-circle-o"></i> Data Pagu Kontrak</a></li>
          </ul>
        </li>
      <?php  } ?>


      <li <?= $this->uri->segment(1) == 'Login/logout' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
        <a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>