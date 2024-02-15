<?php $user = ActiveUserControl(); ?>

<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">

                    <img width="90px" height="50px" src="<?php echo base_url("uploads/users_V/$user->image_url"); ?>" alt="<?php echo $user->image_url; ?>" class="img-responsive">

                </div><!-- User image location -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="#" class="username"><?php echo($user->name . " " . $user->surname) ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="settings.html">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout")?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış Yap</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">


                <li>
                    <a href="<?php echo base_url("dashboard")?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                

                <!--
                <li class="has-submenu">
                    <a href="#" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Galeriler</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="#"><span class="menu-text">Resim Galerisi</span></a></li>
                        <li><a href="#"><span class="menu-text">Video Galerisi</span></a></li>
                        <li><a href="#"><span class="menu-text">Dosya Galerisi</span></a></li>
                    </ul>
                </li>
                 -->


                <li>
                    <a href="<?php echo base_url("products"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo base_url("customers"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Müşteriler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("appointments")?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">Randevular</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("services"); ?>">
                        <i class="menu-icon fa fa-gift"></i>
                        <span class="menu-text">işlemler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("branches")?>">
                        <i class="menu-icon fa fa-sitemap"></i>
                        <span class="menu-text">Şubeler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("users")?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("staff")?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Çalışanlar</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <i class="menu-icon fa fa-bank"></i>
                        <span class="menu-text">Kasa</span>
                    </a>
                </li>

                <li class="menu-separator"><hr></li>

                <li>
                    <a href="documentation.html">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popup Hizmeti</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("logout")?>">
                        <i class="menu-icon fa fa-sign-out"></i>
                        <span class="menu-text">Çıkış Yap</span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>