
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="image/<?php echo $img ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Produto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastro"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li class="active"><a href="?page=consulta"><i class="fa fa-circle-o"></i> Consulta</a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastro_cor"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
         <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tamanho</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastrar_tamanho"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Categoria</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastrar_categoria"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
  </aside>
