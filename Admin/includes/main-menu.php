<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <br>
  <br>
  <br>
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Search" class="menu-search form-control round"/>
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class=" nav-item"><a href="index.php"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
        <ul class="menu-content">
          <li class="active"><a href="admin_home.php" data-i18n="nav.dash.main" class="menu-item">Dashboard</a>
          </li>
        </ul>
      </li>
      <?php 
    $id = Session::get('id');
      $query="SELECT  * FROM users where id ='$id'";
      $result=$dbcon->select($query);
     $value=$result->fetch_assoc();
    if ($value['user_type'] == 'super_admin' OR $value['user_type'] == 'admin') { ?>
         <li class=" nav-item">
        <a href="{{ url('inventory') }}"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Inventory</span>
        </a>
        <ul class="menu-content">
        <li> <a href="index.php">
          <i class="icon-eye4"></i>
          Inventory List</a>
          </li>
          <li><a href="add_product.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Item</a>
          </li>
          <li><a href="index_product.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Item List</a>
          </li>
           <li><a href="add_customer.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Customer</a>
          </li>
          <li><a href="index_customer.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Customer List</a>
          </li>
          
          <li><a href="add_supplier.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Supplier</a>
          </li>
          <li><a href="index_supplier.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Supplier List</a>
          </li>
          <li><a href="add_sales.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Sales</a>
          </li>
          <li><a href="index_sales.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Sales List</a>
          </li>
          <li><a href="add_purchase.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Purchase</a>
          </li>
          <li><a href="index_purchase" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Purchase List</a>
          </li>
         
          
        </ul>
      </li>
      <li class=" nav-item"><a href="hr_list.php"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">HR</span></a>
        <ul class="menu-content">
          
          <li><a href="add_employee.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Add Employee</a>
          </li>
          <li>
          <a href="index_employee.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Employee List</a>
          </li>
        </ul>
      </li>
       <li class=" nav-item"><a href="add_category.php"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Categories</span></a>
        <ul class="menu-content">
          <li><a href="add_category.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Categories</a>
          </li>
          <li><a href="index_category.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Categories List</a>
          </li>
       
        </ul>
      </li>
       <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Gift Card</span></a>
        <ul class="menu-content">
          <li><a href="add_gift.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Gift Card</a>
          </li>
          <li><a href="index_gift.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Gift Card List</a>
          </li>
       
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Users</span></a>
        <ul class="menu-content">
          <li><a href="add_user.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add User</a>
          </li>
          <li><a href="index_user.php" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Users List</a>
          </li>
       
        </ul>
      </li>
      <li class=" nav-item">
      <a href="report.php">
      <i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Reports</span></a>
      </li>

       <?php }

       ?>
      

      

    </ul>
  </div>
  <!-- /main menu content-->
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>