<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @include('layouts.menu')
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

<style>
.sidebar .sidebar-nav {
    position: relative;
    -ms-flex: 1;
    flex: 1;
    width: 218px;
}
.sidebar .sidebar-minimizer {
    position: relative;
    -ms-flex: 0 0 50px;
    flex: 0 0 40px;
    cursor: pointer;
    background-color: rgba(0,0,0,.2);
    border: 0;
}
</style>
