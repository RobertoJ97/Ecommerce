<!DOCTYPE html>
<html>
  @include('layouts.css')
  <body>
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Ecommerce</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
                <!--Log out-->
            <div class="list-inline-item logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                     <input class="nav-link icon-logout" type="submit" value="logout">

                </form>

            </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
        @include('layouts.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 class="border-bottom text-center">Panel Admin Ecommerce</h3>
            </div>
            <div class="col-md-4"></div>
        </div>

        <section class="no-padding-top no-padding-bottom pt-2">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                      <div class="title">
                        <div class="icon"><i class="icon-user-1"></i></div><strong>Total Clients</strong>
                      </div>
                      <div class="number dashtext-1">{{ $user }}</div>
                    </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                      <div class="title">
                        <div class="icon"><i class="icon-contract"></i></div><strong>Total Products</strong>
                      </div>
                      <div class="number dashtext-2">{{ $product }}</div>
                    </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                      <div class="title">
                        <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Orders</strong>
                      </div>
                      <div class="number dashtext-3">{{ $order }}</div>
                    </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                      <div class="title">
                        <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Delivered</strong>
                      </div>
                      <div class="number dashtext-4">{{ $delivered }}</div>
                    </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


        <section class="margin-bottom-sm">
          <div class="container-fluid">
            <div class="row d-flex align-items-stretch">
              <div class="col-md-12">
                <div class="stats-with-chart-1 block">
                  <div class="title"> <strong class="d-block">Income Sales</strong><span class="d-block">Total Sales Income to Date</span></div>
                  <div class="row d-flex align-items-end justify-content-between">
                    <div class="col-5">
                      <div class="text"><strong class="d-block dashtext-3">US${{ $amount }}</strong><span class="d-block">Sep 2024</span><small class="d-block">{{ $delivered }} Sales</small></div>
                    </div>
                    <div class="col-7">
                      <div class="bar-chart chart">
                        <canvas id="salesBarChart1"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              </div>
            </div>
          </div>
        </section>


        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2024 &copy; WebArchitects Company</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    @include('layouts.js')
  </body>
</html>
