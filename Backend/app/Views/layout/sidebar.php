 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #c1f8cf; color:#000;">
   <!-- Brand Logo -->
   <a href="/" class="brand-link text-center">
     <span class="brand-text font-weight-bold">Re-World</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="/../../assets/img/user/<?= user()->image ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="/user" class="d-block"><?= user()->username ?></a>
       </div>
     </div>


     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <?php if (has_permission('manage-all')) : ?>
           <li class="nav-item  <?= ($uri->getSegment(1) == "admin") ? 'menu-open' : '' ?>">
             <a href="/admin" class="nav-link  <?= ($uri->getSegment(1) == "admin") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Admin
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="/admin/index" class="nav-link  <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Dashboard</p>
                 </a>
               </li>
               <li class="nav-item ">
                 <a href="/admin/safoture" class="nav-link <?= ($uri->getSegment(2) == "safoture") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Safoture</p>
                 </a>
               </li>
               <li class="nav-item ">
                 <a href="/admin/gogreen" class="nav-link <?= ($uri->getSegment(2) == "gogreen") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Gogreen</p>
                 </a>
               </li>
               <li class="nav-item ">
                 <a href="/admin/shop" class="nav-link <?= ($uri->getSegment(2) == "shop") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Shop</p>
                 </a>
               </li>
               <li class="nav-item ">
                 <a href="/admin/poin" class="nav-link <?= ($uri->getSegment(2) == "poin") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Poin</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item  <?= ($uri->getSegment(1) == "shop_a") ? 'menu-open' : '' ?>">
             <a href="#" class="nav-link  <?= ($uri->getSegment(1) == "shop_a") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-shopping-bag"></i>
               <p>
                 Shop Admin
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item ">
                 <a href="/shop_a/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Data</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/shop_a/add" class="nav-link nav-link <?= ($uri->getSegment(2) == "add") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add Data</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item  <?= ($uri->getSegment(1) == "event") ? 'menu-open' : '' ?>">
             <a href="#" class="nav-link  <?= ($uri->getSegment(1) == "event") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-newspaper"></i>
               <p>
                 Event
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item ">
                 <a href="/event/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Data</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/event/add" class="nav-link nav-link <?= ($uri->getSegment(2) == "add") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add Data</p>
                 </a>
               </li>
             </ul>
           </li>
           <?php endif; ?>
           <li class="nav-item  <?= ($uri->getSegment(1) == "event") ? 'menu-open' : '' ?>">
             <a href="#" class="nav-link  <?= ($uri->getSegment(1) == "gogreen") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-tree"></i>
               <p>
                 Gogreen
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item ">
                 <a href="/gogreen/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Data</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/event" class="nav-link nav-link <?= ($uri->getSegment(2) == "add") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add Data</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item  <?= ($uri->getSegment(1) == "shop") ? 'menu-open' : '' ?>">
             <a href="#" class="nav-link  <?= ($uri->getSegment(1) == "shop") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-shopping-bag"></i>
               <p>
                 Shop
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item ">
                 <a href="/shop/index" class="nav-link <?= ($uri->getSegment(2) == "shop") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Shop</p>
                 </a>
               </li>
               <li class="nav-item ">
                 <a href="/shop/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Data</p>
                 </a>
               </li>
             </ul>
           </li>
         <li class="nav-item  <?= ($uri->getSegment(1) == "safoture") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "safoture") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-recycle"></i>
             <p>
               Safoture
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/safoture/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Data</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/safoture/add" class="nav-link <?= ($uri->getSegment(2) == "add") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Data</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item  <?= ($uri->getSegment(1) == "poin") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "poin") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-coins"></i>
             <p>
               Poin
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/poin/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Data</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item  <?= ($uri->getSegment(1) == "user") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "user") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-user-alt"></i>
             <p>
               User
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/user/index" class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Profile</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/logout" class="nav-link <?= ($uri->getSegment(1) == "logout") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Logout</p>
               </a>
             </li>
           </ul>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>