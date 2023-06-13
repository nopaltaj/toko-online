<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if (Auth::user()->roles == 'ADMIN')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ Route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed " href="{{ Route('dashboard.category.index') }}">
          <i class="bi bi-handbag-fill"></i>
          <span>Category</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="{{ Route('dashboard.product.index') }}">
          <i class="bi bi-newspaper"></i>
          <span>Product</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="{{ Route('dashboard.transaction.index') }}">
          <i class="bi bi-currency-dollar"></i>
          <span>Transaction</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="{{ Route('dashboard.user.index') }}">
          <i class="bi bi-people"></i>
          <span>User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ Route('my-transaction.index') }}">
          <i class="bi bi-cart"></i>
          <span>My transaction</span>
        </a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ Route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ Route('my-transaction.index') }}">
          <i class="bi bi-cart"></i>
          <span>My transaction</span>
        </a>
      </li>
      @endif

     



    <!-- End Components Nav -->

      

    </ul>

  </aside>