 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <!-- Brand Logo -->
     <a href="<?php echo base_url('admin') ?>/" class="brand-link">
       <span class="brand-text font-weight-bold">PENGGAJIAN</span>
     </a>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?php echo base_url('pegawai') ?>/" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-item menu-is-opening menu-open">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-database"></i>
             <p>
               Data
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview" style="display: block;">
             <li class="nav-item">
               <a href="<?php echo base_url('datapegawaiuser') ?>/" class="nav-link">
                 <p>
                   Data Pegawai
                 </p>
               </a>
             </li>
             <li class="nav-item menu-is-opening menu-open">
               <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-chart-pie"></i>
                 <p>
                   Laporan
                   <i class="right fas fa-angle-left"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview" style="display: block;">
                 <li class="nav-item">
                   <a href="<?php echo base_url('datagajipegawai') ?>/" class="nav-link">
                     <p>
                       Filter Data Gaji
                     </p>
                   </a>
                 </li>
               </ul>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('gantipass') ?>" class="nav-link">
                 <i class="fas fa-lock nav-icon"></i>
                 <p>Ganti Password</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('logout') ?>" class="nav-link">
                 <i class="fas fa-sign-out-alt nav-icon"></i>
                 <p>Log Out</p>
               </a>
             </li>
           </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>