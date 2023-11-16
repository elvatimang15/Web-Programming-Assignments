<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6eeda3;">
    <div class="container mb-4 mt-4">
        <a class="navbar-brand" style="color:#000000" href="/">Classic Models</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-4" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active text-dark' : 'text-muted' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('product') ? 'active text-dark' : 'text-muted' }}" href="/product">Products</a>
                </li>
            </ul>
            <form class="d-flex align-items-end" action="{{ route('products.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="productLine" placeholder="Search by Product Line" aria-label="Search">
                <button class="btn btn-secondary" style="background-color: #45ce85; color: #000000" type="submit">Search</button>
            </form>            
        </div>
    </div>
</nav>