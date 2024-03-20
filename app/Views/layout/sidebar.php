<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper"><a href="<?= base_url("/") ?>">
        <div class="sidebar-main-title">
          <h3>Dashboard</h3>
        </div>
      </a>
    </div>
    <nav class="sidebar-main">
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="<?= base_url("/") ?>"><img class="img-fluid" src="<?= base_url() ?>/assets/images/logo/logo-icon.png" alt=""></a>
          </li>
          <li class="sidebar-main-title" style="margin-top: -20px;">
            <div>
              <h6>General</h6>
            </div>
          </li>
          <li class="sidebar-list">
            </i>
            <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("/") ?>">
              <span style="margin-left: 20px;">Dashboard</span>
            </a>
          </li>

          <li class="sidebar-main-title">
            <div>
              <h6>Data</h6>
            </div>
          </li>
          <li class="sidebar-list">
            </i>
            <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("karyawan") ?>">
              <span style="margin-left: 20px;">karyawan</span>
            </a>
          </li>
          <li class="sidebar-list">
            </i>
            <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("olahraga") ?>">
              <span style="margin-left: 20px;">Olahraga</span>
            </a>
          </li>
          <li class="sidebar-list">
            </i>
            <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("makanan") ?>">
              <span style="margin-left: 20px;">Makanan</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>