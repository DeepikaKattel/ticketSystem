<nav class="main-menu">
    <div>
        <a class="logo" href="http://startific.com">
        </a>
    </div>
    <div class="settings">
        <ul>
            <i class="fa fa-bars fa-lg" style="margin-right: 195px;margin-top: 20px"></i>
        </ul>
    </div>
    @can('admin_access')
    <div class="scrollbar" id="style-1">
        <ul>
            <li>
                <a href="{{ url('/') }}/adminOnlyPage">
                    <i class="fa fa-home fa-lg"></i>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('staff.index') }}">
                    <i class="fa fa-users fa-lg"></i>
                    <span class="nav-text">Staff</span>
                </a>
            </li>
            <li>
                <a href="{{ route('agent.index') }}">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="nav-text">Agent</span>
                </a>
            </li>
            <li>
                <a href="{{ route('facility.index')}}">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                    <span class="nav-text">Vehicle Facilities</span>
                </a>
            </li>
            <li>
                <a href="{{ route('vehicleType.index')}}">
                    <i class="fa fa-bus fa-lg"></i>
                    <span class="nav-text">Vehicle Type</span>
                </a>
            </li>
            <li>
                <a href="{{ route('vehicle.index')}}">
                    <i class="fa fa-car fa-lg"></i>
                    <span class="nav-text">Vehicle</span>
                </a>
            </li>
            <li>
                <a href="{{ route('destination.index')}}">
                    <i class="fa fa-bike fa-lg"></i>
                    <span class="nav-text">Destination</span>
                </a>
            </li>
            <li>
                <a href="{{ route('route.index')}}">
                    <i class="fa fa-road fa-lg"></i>
                    <span class="nav-text">Routes</span>
                </a>
            </li>

{{--            <li>--}}
{{--                <a href="{{ url('/') }}/customerDetails">--}}
{{--                    <i class="fa fa-users fa-lg"></i>--}}
{{--                    <span class="nav-text">Customer</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/') }}/staffDetails">--}}
{{--                    <i class="fa fa-user fa-lg"></i>--}}
{{--                    <span class="nav-text">Staff</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/') }}/customerVehicles">--}}
{{--                    <i class="fa fa-user fa-lg"></i>--}}
{{--                    <span class="nav-text">Customer Details</span>--}}
{{--                </a>--}}
{{--            </li>--}}


{{--            <li>--}}
{{--                <a href="{{ route('content.index') }}">--}}
{{--                    <i class="fa fa-book fa-lg"></i>--}}
{{--                    <span class="nav-text">Content</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('products.index') }}">--}}
{{--                    <i class="fa fa-shopping-cart"></i>--}}
{{--                    <span class="nav-text">Products</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="{{ route('working_hours.index') }}">--}}
{{--                    <i class="fa fa-clock"></i>--}}
{{--                    <span class="nav-text">Working Hours</span>--}}
{{--                </a>--}}
{{--            </li>--}}

        </ul>
    </div>
    @endcan
    @can('customer_access')
{{--    <div class="scrollbar" id="style-1">--}}
{{--        <ul>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/') }}/customerOnlyPage">--}}
{{--                    <i class="fa fa-home fa-lg"></i>--}}
{{--                    <span class="nav-text">Home</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{route('customer.index')}}">--}}
{{--                    <i class="fa fa-user fa-lg"></i>--}}
{{--                    <span class="nav-text">Profile</span>--}}
{{--                </a>--}}
{{--            </li>--}}



{{--        </ul>--}}
{{--    </div>--}}
    @endcan

</nav>

