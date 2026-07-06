  @php
      $resource_pages = App\Models\ResourcePage::all();
      $blog_categories = App\Models\PostCategory::all();
  @endphp
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-xl site-nav">
      <div class="container" id="nav_bar">
          <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid">
              <!-- SILENT<span style="color: #fff">BET</span> -->
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>


          <div class="container collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto mt-0">
                  {{-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"
                          href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                          id="bonusesMenu" role="button" >Movers</a>
                      <ul class="dropdown-menu rounded-xxl shadow-lg">
                          <li><a class="dropdown-item" href="/mover-list"><span class="dot"><i
                                          class="fa fa-home"></i></span>Movers List A-Z</a></li>
                          <li><a class="dropdown-item" href="{{ route('company.movers') }}"><span class="dot"><i
                                          class="fa fa-list"></i></span>Movers By State</a></li>
                          <li><a class="dropdown-item" href="{{ route('company.company-search') }}"><span
                                      class="dot"><i class="fa fa-star"></i></span>Movers in USA</a></li>
                          <li><a class="dropdown-item" href="{{ route('route.page') }}"> <span class="dot"><i
                                          class="fa fa-handshake"></i></span>Movers By Route</a></li>
                      </ul>
                  </li> --}}
                  <li class="nav-item dropdown me-1">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">Movers</a>
                      <div class="dropdown-menu rounded-xxl shadow-lg" aria-labelledby="moversMenu">

                          <div class="mega">
                              <div class="mega-col">
                                  <p><strong>Interstate</strong></p>
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                                          class="d-flex gap-2 align-items-center"><span class="dot"><img
                                                  src="{{ asset('assets/img/best-long-distance-hd.png') }}"
                                                  alt="best-long-distance-hd"></span>
                                          Best Long Distance Movers</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="{{ route('company.movers') }}" class="d-flex gap-2 align-items-center">
                                          <span class="dot"><img
                                                  src="{{ asset('assets/img/moving-companies-in-usa-hd.png') }}"
                                                  alt="moving-companies"></span>Moving Companies
                                          in USA</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="{{ route('route.page') }}" class="d-flex gap-2 align-items-center">
                                          <span class="dot"><img
                                                  src="{{ asset('assets/img/popular-moving-routes-hd.png') }}"
                                                  alt="popular-moving-routes"></span>
                                          Popular Moving Routes</a>
                                  </div>



                              </div>
                              <div class="mega-col">
                                  <p><strong>Local</strong></p>
                                  <div class="mega-item">
                                      <a href="{{ route('company.mover-list') }}"
                                          class="d-flex gap-2 align-items-center"><span class="dot"><img
                                                  class="mover-list-hd"
                                                  src="{{ asset('assets/img/mover-list-hd.png') }}"
                                                  alt="mover-list"></span>
                                          Movers List A-Z</a>
                                  </div>
                                  {{-- <div class="mega-item">
                                      <a href="{{ route('company.company-search') }}"
                                          class="d-flex gap-2 align-items-center"> <span class="dot"><i
                                                  class="fa fa-star"></i></span>Local Movers By State</a>
                                  </div> --}}
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-local-moving-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><img
                                                  src="{{ asset('assets/img/best-local-moving-hd.png') }}"
                                                  alt="best-local-moving"></span>Best Local Moving
                                          Companies</a>
                                  </div>

                                  {{-- <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-state-to-state-moving-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-home"></i></span> Best State-to-State
                                          Moving
                                          Companies</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-commercial-moving-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-bolt"></i></span> Best Commercial Moving
                                          Companies</a>
                                  </div> --}}
                              </div>
                          </div>
                      </div>
                  </li>
                  <li class="nav-item dropdown me-1">
                      <a class="nav-link dropdown-toggle" href="#" id="moversMenu" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
                      <div class="dropdown-menu rounded-xxl shadow-lg" aria-labelledby="moversMenu">
                          <div class="mega">
                              <div class="mega-col">
                                  {{-- <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                                          class="d-flex gap-2 align-items-center"><span class="dot"><i
                                                  class="fa fa-list"></i></span>
                                          <span>Best Long Distance Moving Companies</span></a>
                                  </div> --}}
                                  {{-- <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-local-moving-companies"
                                          class="d-flex gap-2 align-items-center"> <span class="dot"><i
                                                  class="fa fa-list"></i></span> Best Local Moving
                                          Companies</a>
                                  </div> --}}
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-moving-container-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best Moving Container Companies</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"
                                          class="d-flex gap-2 align-items-center"> <span class="dot"><i
                                                  class="fa fa-list"></i></span>Best Packer & Movers</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-commercial-moving-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best Commercial Moving Companies</a>
                                  </div>
                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best Self-Storage Companies in USA</a>
                                  </div>
                              </div>
                              <div class="mega-col">

                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best
                                          Moving
                                          Truck Rental
                                          Companies</a>
                                  </div>

                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-international-moving-companies"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best International Moving Companies</a>
                                  </div>

                                  <div class="mega-item">
                                      <a href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"
                                          class="d-flex gap-2 align-items-center">
                                          <span class="dot"><i class="fa fa-list"></i></span>
                                          Best Specialty Movers in USA</a>
                                  </div>

                              </div>

                          </div>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">Moving Cost Calculator</a>
                      <ul class="dropdown-menu rounded-xxl shadow-lg">
                          <li><a class="dropdown-item" href="{{ route('company.cost-estimator') }}">Moving Cost
                                  Calculator</a></li>
                          <li><a class="dropdown-item" href="{{ route('packing-calculator') }}">Moving
                                  Box
                                  Calculator</a></li>
                          <li><a class="dropdown-item" href="{{ route('moveCostPage') }}">State-Specific
                                  Costs</a></li>
                          <li><a class="dropdown-item"
                                  href="https://mymovingjourney.com/blogs/how-much-does-an-international-move-cost">International
                                  Moving Cost</a></li>
                      </ul>
                  </li>
                  {{-- <li class="nav-item">
                      <a class="nav-link" href="{{ route('companies.comparePage') }}"> Compare Movers</a>
                  </li> --}}
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="{{ route('posts.index') }}" id="bonusesMenu"
                          role="button" data-bs-toggle="dropdown" aria-expanded="false">Move Wiki</a>
                      <ul class="dropdown-menu rounded-xxl shadow-lg">
                          <li><a class="dropdown-item "
                                  href="https://mymovingjourney.com/category/moving-guide">Moving
                                  Guide</a></li>
                          <li><a class="dropdown-item"
                                  href="https://mymovingjourney.com/category/moving-resources">Moving
                                  Resources</a></li>
                          <li><a class="dropdown-item"
                                  href="https://mymovingjourney.com/blogs/moving-terminology">Moving
                                  Glossary</a></li>
                          <li><a class="dropdown-item"
                                  href="https://mymovingjourney.com/blogs/moving-checklist">Moving
                                  Checklist</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="{{ route('posts.index') }}" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                      <ul class="dropdown-menu rounded-xxl shadow-lg">
                          <li><a class="dropdown-item "
                                  href="https://mymovingjourney.com/category/packing-tips">Packing tips</a></li>
                          <li><a class="dropdown-item "
                                  href="https://mymovingjourney.com/category/storage-guide">Storage Guide</a></li>
                          <li><a class="dropdown-item " href="https://mymovingjourney.com/category/city-guide">City
                                  Guide</a></li>
                          <li><a class="dropdown-item " href="https://mymovingjourney.com/category/state-guide">State
                                  Guide</a></li>
                      </ul>
                  </li>

              </ul>

              <div class="d-flex align-items-center nav-right">
                  {{-- <div class="icon-circle"><i class="fa fa-search"></i></div> --}}
                  <a href="{{ route('company.write-review') }}" class="btn btn-bonus">Write a Review</a>
                  <a href="{{ route('company.register') }}" class="icon-circle ms-3 " aria-label="Add Your Business"
                      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Your Business"><i
                          class="fa fa-plus"></i></a>
              </div>
          </div>
      </div>
  </nav>

  <script>
      document.addEventListener("DOMContentLoaded", function() {
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          tooltipTriggerList.map(function(tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl)
          })
      });
  </script>
