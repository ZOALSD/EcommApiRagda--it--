<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('categories','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-location-arrow"></i>
        <span class="title">{{trans('admin.categories')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('categories','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('categories','active open')}}  "> 
            <a href="{{aurl('categories')}}" class="nav-link "> 
                <i class="fa fa-location-arrow"></i>
                <span class="title">{{trans('admin.categories')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('categories/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('color','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.color')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('color','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('color','active open')}}  "> 
            <a href="{{aurl('color')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.color')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('color/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('size','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-sliders"></i>
        <span class="title">{{trans('admin.size')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('size','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('size','active open')}}  "> 
            <a href="{{aurl('size')}}" class="nav-link "> 
                <i class="fa fa-sliders"></i>
                <span class="title">{{trans('admin.size')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('size/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('produactcoontroller','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cart-plus"></i>
        <span class="title">{{trans('admin.produactcoontroller')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('produactcoontroller','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('produactcoontroller','active open')}}  "> 
            <a href="{{aurl('produactcoontroller')}}" class="nav-link "> 
                <i class="fa fa-cart-plus"></i>
                <span class="title">{{trans('admin.produactcoontroller')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('produactcoontroller/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>