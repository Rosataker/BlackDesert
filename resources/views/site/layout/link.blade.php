                <div class="top-left links">
                    <a href="/ProfitConversion">利潤數據庫</a>
                    <a href="/">Home</a>
                </div>

            @if (Route::currentRouteName())
                <div class="Breadcrumbs-left links">
                    <span class="Breadcrumbs-font">現在位置： @yield('Breadcrumbs') </span>
                </div>
            @endif
