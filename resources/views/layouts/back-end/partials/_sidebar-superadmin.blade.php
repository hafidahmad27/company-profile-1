<li
    class="sidebar-item 
                    {{ request()->is('be/products') ? 'active' : '' }}
                    {{ request()->is('be/products/*') ? 'active' : '' }} 
                    {{ request()->is('be/product-best-sellers') ? 'active' : '' }}
                    {{ request()->is('be/product-best-sellers/*') ? 'active' : '' }} 
                    {{ request()->is('be/product-categories') ? 'active' : '' }}
                    {{ request()->is('be/product-categories/*') ? 'active' : '' }} 
                    has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-tags"></i>
        <span>Products</span>
    </a>
    <ul class="submenu">
        <li
            class="submenu-item 
                            {{ request()->is('be/products') ? 'active' : '' }}
                            {{ request()->is('be/products/*') && !request()->is('be/products/best-sellers*') ? 'active' : '' }}">
            <a href="{{ route('be.products.index') }}" class='submenu-link'>
                <span>Product List</span>
            </a>
        </li>
        <li
            class="submenu-item 
                            {{ request()->is('be/products/best-sellers') ? 'active' : '' }}
                            {{ request()->is('be/products/best-sellers/*') ? 'active' : '' }}">
            <a href="{{ route('be.products.best-sellers.index') }}" class='submenu-link'>
                <span>Best Sellers</span>
            </a>
        </li>
        <li
            class="submenu-item 
                            {{ request()->is('be/product-categories') ? 'active' : '' }}
                            {{ request()->is('be/product-categories/*') ? 'active' : '' }}">
            <a href="{{ route('be.product-categories.index') }}" class='submenu-link'>
                <span>Categories</span>
            </a>
        </li>
    </ul>
</li>

<li
    class="sidebar-item 
                    {{ request()->is('be/articles') ? 'active' : '' }}
                    {{ request()->is('be/articles/*') ? 'active' : '' }} 
                    {{ request()->is('be/article-categories') ? 'active' : '' }}
                    {{ request()->is('be/article-categories/*') ? 'active' : '' }} 
                    has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Articles</span>
    </a>
    <ul class="submenu">
        <li
            class="submenu-item 
                            {{ request()->is('be/articles') ? 'active' : '' }}
                            {{ request()->is('be/articles/*') ? 'active' : '' }}">
            <a href="{{ route('be.articles.index') }}" class='submenu-link'>
                <span>Article List</span>
            </a>
        </li>
        <li
            class="submenu-item 
                            {{ request()->is('be/article-categories') ? 'active' : '' }}
                            {{ request()->is('be/article-categories/*') ? 'active' : '' }}">
            <a href="{{ route('be.article-categories.index') }}" class='submenu-link'>
                <span>Categories</span>
            </a>
        </li>
    </ul>
</li>

<hr>

<li
    class="sidebar-item 
                    {{ request()->is('be/pages') ? 'active' : '' }}
                    {{ request()->is('be/pages/*') ? 'active' : '' }} 
                    {{ request()->is('be/companies') ? 'active' : '' }}
                    {{ request()->is('be/companies/*') ? 'active' : '' }} 
                    has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-gear"></i>
        <span>Settings</span>
    </a>
    <ul class="submenu">
        <li
            class="submenu-item 
                            {{ request()->is('be/pages') ? 'active' : '' }}
                            {{ request()->is('be/pages/*') ? 'active' : '' }}
                            ">
            <a href="{{ route('be.pages.index') }}" class='submenu-link'>
                <span>Pages</span>
            </a>
        </li>
        <li
            class="submenu-item 
                            {{ request()->is('be/companies') ? 'active' : '' }}
                            {{ request()->is('be/companies/*') ? 'active' : '' }}
                            ">
            <a href="{{ route('be.companies.index') }}" class='submenu-link'>
                <span>Company</span>
            </a>
        </li>
    </ul>
</li>
