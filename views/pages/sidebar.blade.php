<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-warning">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link align-middle px-0">
          <span class="ms-1 d-none d-sm-inline text-custom">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="/products" class="nav-link align-middle px-0">
          <span class="ms-1 d-none d-sm-inline text-custom">Kelola Data Produk</span>
        </a>
      </li>
    </ul>
    <hr/>
    <div class="dropdown pb-4">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="d-flex align-items-center text-custom text-decoration-none bg-transparent border-0">
          <span class="d-none d-sm-inline mx-1">Logout</span>
        </button>
      </form>
    </div>
  </div>
</div>