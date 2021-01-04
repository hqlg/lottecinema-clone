<template>
  <!-- Sidebar -->
  <ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar"
  >
    <!-- Sidebar - Brand -->
    <a
      class="sidebar-brand d-flex align-items-center justify-content-center"
      href="/admin"
    >
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a
      >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTwo"
        aria-expanded="true"
        aria-controls="collapseTwo"
      >
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
      </a>
      <div
        id="collapseTwo"
        class="collapse"
        aria-labelledby="headingTwo"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="buttons.html">Buttons</a>
          <a class="collapse-item" href="cards.html">Cards</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseUtilities"
        aria-expanded="true"
        aria-controls="collapseUtilities"
      >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
      </a>
      <div
        id="collapseUtilities"
        class="collapse"
        aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html"
            >Animations</a
          >
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Addons</div>

    <!-- Areas -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseAreas"
        aria-expanded="true"
        aria-controls="collapseAreas"
      >
        <i class="fas fa-fw fa-folder"></i>
        <span>Areas</span>
      </a>
      <div
        id="collapseAreas"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/areas">List</a>
          <a class="collapse-item" href="/admin/areas/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Cinemas -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseCinemas"
        aria-expanded="true"
        aria-controls="collapseCinemas"
      >
        <i class="fas fa-fw fa-folder"></i>
        <span>Cinemas</span>
      </a>
      <div
        id="collapseCinemas"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/cinemas">List</a>
          <a class="collapse-item" href="/admin/cinemas/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Movies -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseMovies"
        aria-expanded="true"
        aria-controls="collapseMovies"
      >
        <i class="fas fa-fw fa-video"></i>
        <span>Movies</span>
      </a>
      <div
        id="collapseMovies"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/movies">List</a>
          <a class="collapse-item" href="/admin/movies/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Gift  -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseGift"
        aria-expanded="true"
        aria-controls="collapseGift"
      >
        <i class="fas fa-fw fa-gift"></i>
        <span>Gift</span>
      </a>
      <div
        id="collapseGift"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/gifts">List</a>
          <a class="collapse-item" href="/admin/gifts/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Gift Category -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseGiftCategory"
        aria-expanded="true"
        aria-controls="collapseGiftCategory"
      >
        <i class="fas fa-fw fa-gifts"></i>
        <span>Gift Category</span>
      </a>
      <div
        id="collapseGiftCategory"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/gift-categories">List</a>
          <a class="collapse-item" href="/admin/gift-categories/create"
            >Create</a
          >
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Time -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTime"
        aria-expanded="true"
        aria-controls="collapseTime"
      >
        <i class="fas fa-fw fa-clock"></i>
        <span>Time </span>
      </a>
      <div
        id="collapseTime"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/times">List</a>
          <a class="collapse-item" href="/admin/times/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Tag -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTag"
        aria-expanded="true"
        aria-controls="collapseTag"
      >
        <i class="fas fa-fw fa-tag"></i>
        <span>Tag </span>
      </a>
      <div
        id="collapseTag"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/tags">List</a>
          <a class="collapse-item" href="/admin/tags/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Seat -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseSeat"
        aria-expanded="true"
        aria-controls="collapseSeat"
      >
        <i class="fas fa-fw fa-chair"></i>
        <span>Seat </span>
      </a>
      <div
        id="collapseSeat"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/seats">List</a>
          <a class="collapse-item" href="/admin/seats/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Customer -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseCustomer"
        aria-expanded="true"
        aria-controls="collapseCustomer"
      >
        <i class="fas fa-fw fa-user"></i>
        <span>Customer</span>
      </a>
      <div
        id="collapseCustomer"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/customers">List</a>
          <a class="collapse-item" href="/admin/customers/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Order -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseOrder"
        aria-expanded="true"
        aria-controls="collapseOrder"
      >
        <i class="fas fa-fw fa-shopping-bag"></i>
        <span>Order</span>
      </a>
      <div
        id="collapseOrder"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/orders">List</a>
          <a class="collapse-item" href="/admin/orders/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Order Detail -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseOrder"
        aria-expanded="true"
        aria-controls="collapseOrder"
      >
        <i class="fas fa-fw fa-folder"></i>
        <span>Order Detail</span>
      </a>
      <div
        id="collapseOrder"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/order-detail">List</a>
          <a class="collapse-item" href="/admin/order-detail/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>
    <!-- Room -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseRoom"
        aria-expanded="true"
        aria-controls="collapseRoom"
      >
        <i class="fas fa-fw fa-folder"></i>
        <span>Room</span>
      </a>
      <div
        id="collapseRoom"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Main Screens:</h6>
          <a class="collapse-item" href="/admin/rooms">List</a>
          <a class="collapse-item" href="/admin/rooms/create">Create</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>
  </ul>
  <!-- End of Sidebar -->
</template>

<script>
export default {};
</script>

<style>
</style>
