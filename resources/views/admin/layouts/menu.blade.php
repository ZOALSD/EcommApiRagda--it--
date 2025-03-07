<li class="nav-item start {{ active_link(null, 'active open') }} ">
    <a href="{{ aurl('') }}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{ trans('admin.dashboard') }}</span>
        <span class="selected"></span>
    </a>
</li>
{{-- }}
<li class="nav-item start {{ active_link('settings', 'active open') }}  ">
    <a href="{{ aurl('settings') }}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{ trans('admin.settings') }}</span>
        <span class="selected"></span>
    </a>
</li>

--}}
@can('permisson')

    <li class="nav-item start {{ active_link('permission', 'active open') }}  ">
        <a href="{{ aurl('permission') }}" class="nav-link nav-toggle">
            <i class="fa fa-lock"></i>
            <span class="title">{{ trans('admin.permission') }}</span>
            <span class="selected"></span>
        </a>
    </li>
@endcan

@can('manager')

    <li class="nav-item start {{ active_link('SellerManage', 'active open') }}  ">
        <a href="{{ aurl('Selleres') }}" class="nav-link nav-toggle">
            <i class="fa fa-user-plus"></i>
            <span class="title">{{ trans('admin.SellerManage') }}</span>
            <span class="selected"></span>
        </a>
    </li>
@endcan
@can('seller')

    <li class="nav-item start {{ active_link('manger', 'active open') }}  ">
        <a href="{{ aurl('manger') }}" class="nav-link nav-toggle">
            <i class="fa fa-user-plus"></i>
            <span class="title">{{ trans('admin.manger') }}</span>
            <span class="selected"></span>
        </a>
    </li>
@endcan

{{--
<li class="nav-item start {{ active_link('report', 'active open') }}  ">
    <a href="{{ '#' }}" class="nav-link nav-toggle">
        <i class="fa fa-file"></i>
        <span class="title">{{ trans('admin.report') }}</span>
        <span class="selected"></span>
    </a>
</li> --}}

@can('produact')

    <li class="nav-item start {{ active_link('produactcoontroller', 'active open') }}  ">
        <a href="{{ aurl('produactcoontroller') }}" class="nav-link nav-toggle">
            <i class="fa fa-plus"></i>
            <span class="title">{{ trans('admin.produactcoontroller') }}</span>
            <span class="selected"></span>
        </a>
    </li>

@endcan
@can('categor')


    <li class="nav-item start {{ active_link('categories', 'active open') }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-location-arrow"></i>
            <span class="title">{{ trans('admin.categories') }} </span>
            <span class="selected"></span>
            <span class="arrow {{ active_link('categories', 'open') }}"></span>
        </a>
        <ul class="sub-menu" style="{{ active_link('', 'block') }}">
            <li class="nav-item start {{ active_link('categories', 'active open') }}  ">
                <a href="{{ aurl('categories') }}" class="nav-link ">
                    <i class="fa fa-location-arrow"></i>
                    <span class="title">{{ trans('admin.categories') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ aurl('categories/create') }}" class="nav-link ">
                    <i class="fa fa-plus"></i>
                    <span class="title"> {{ trans('admin.create') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan

{{-- <li class="nav-item start {{ active_link('color', 'active open') }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-paint-brush "></i>
        <span class="title">{{ trans('admin.color') }} </span>
        <span class="selected"></span>
        <span class="arrow {{ active_link('color', 'open') }}"></span>
    </a>
    <ul class="sub-menu" style="{{ active_link('', 'block') }}">
        <li class="nav-item start {{ active_link('color', 'active open') }}  ">
            <a href="{{ aurl('color') }}" class="nav-link ">
                <i class="fa fa-paint-brush "></i>
                <span class="title">{{ trans('admin.color') }} </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('color/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{ trans('admin.create') }} </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li> --}}
@can('size')

    <li class="nav-item start {{ active_link('size', 'active open') }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-sliders"></i>
            <span class="title">{{ trans('admin.size') }} </span>
            <span class="selected"></span>
            <span class="arrow {{ active_link('size', 'open') }}"></span>
        </a>
        <ul class="sub-menu" style="{{ active_link('', 'block') }}">
            <li class="nav-item start {{ active_link('size', 'active open') }}  ">
                <a href="{{ aurl('size') }}" class="nav-link ">
                    <i class="fa fa-sliders"></i>
                    <span class="title">{{ trans('admin.size') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ aurl('size/create') }}" class="nav-link ">
                    <i class="fa fa-plus"></i>
                    <span class="title"> {{ trans('admin.create') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan

{{--
<li class="nav-item start {{ active_link('produactcoontroller', 'active open') }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cart-plus"></i>
        <span class="title">{{ trans('admin.produactcoontroller') }} </span>
        <span class="selected"></span>
        <span class="arrow {{ active_link('produactcoontroller', 'open') }}"></span>
    </a>
    <ul class="sub-menu" style="{{ active_link('', 'block') }}">
        <li class="nav-item start {{ active_link('produactcoontroller', 'active open') }}  ">
            <a href="{{ aurl('produactcoontroller') }}" class="nav-link ">
                <i class="fa fa-cart-plus"></i>
                <span class="title">{{ trans('admin.produactcoontroller') }} </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('produactcoontroller/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{ trans('admin.create') }} </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>--}}
@can('ads')

    <li class="nav-item start {{ active_link('ads', 'active open') }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-photo"></i>
            <span class="title">{{ trans('admin.ads') }} </span>
            <span class="selected"></span>
            <span class="arrow {{ active_link('ads', 'open') }}"></span>
        </a>
        <ul class="sub-menu" style="{{ active_link('', 'block') }}">
            <li class="nav-item start {{ active_link('ads', 'active open') }}  ">
                <a href="{{ aurl('ads') }}" class="nav-link ">
                    <i class="fa fa-photo"></i>
                    <span class="title">{{ trans('admin.ads') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ aurl('ads/create') }}" class="nav-link ">
                    <i class="fa fa-plus"></i>
                    <span class="title"> {{ trans('admin.create') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan
@can('area')

    <li class="nav-item start {{ active_link('area', 'active open') }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-map"></i>
            <span class="title">{{ trans('admin.area') }} </span>
            <span class="selected"></span>
            <span class="arrow {{ active_link('area', 'open') }}"></span>
        </a>
        <ul class="sub-menu" style="{{ active_link('', 'block') }}">
            <li class="nav-item start {{ active_link('area', 'active open') }}  ">
                <a href="{{ aurl('area') }}" class="nav-link ">
                    <i class="fa fa-map"></i>
                    <span class="title">{{ trans('admin.area') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ aurl('area/create') }}" class="nav-link ">
                    <i class="fa fa-plus"></i>
                    <span class="title"> {{ trans('admin.create') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan
@can('village')

    <li class="nav-item start {{ active_link('village', 'active open') }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-map-marker"></i>
            <span class="title">{{ trans('admin.village') }} </span>
            <span class="selected"></span>
            <span class="arrow {{ active_link('village', 'open') }}"></span>
        </a>
        <ul class="sub-menu" style="{{ active_link('', 'block') }}">
            <li class="nav-item start {{ active_link('village', 'active open') }}  ">
                <a href="{{ aurl('village') }}" class="nav-link ">
                    <i class="fa fa-map-marker"></i>
                    <span class="title">{{ trans('admin.village') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ aurl('village/create') }}" class="nav-link ">
                    <i class="fa fa-plus"></i>
                    <span class="title"> {{ trans('admin.create') }} </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan

<li class="nav-item start {{active_link('ireshif','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-file "></i>
        <span class="title">{{trans('admin.ireshif')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('ireshif','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('ireshif','active open')}}  "> 
            <a href="{{aurl('ireshif')}}" class="nav-link "> 
                <i class="fa fa-file "></i>
                <span class="title">{{trans('admin.ireshif')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('ireshif/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>