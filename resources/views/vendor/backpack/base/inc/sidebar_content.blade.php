<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class="la la-tag"></i> Tags</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
    <ul class="nav-dropdown-items">
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'><i class="la la-database"></i> Danh mục</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('posts') }}'><i class="la la-edit"></i> Bài viết</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories_child') }}'><i class="la la-database"></i> Danh mục con</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-user'></i> Người dùng</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comments') }}'> <i class="la la-comment"></i> Quản lý bình luận</a></li>
