<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img id="header-lang-img" src="{{ env('APP_ASSET_URL') }}assets/images/flags/us.jpg" alt="Header Language" height="16">
    </button>
    <div class="dropdown-menu dropdown-menu-end">

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
            <img src="{{ env('APP_ASSET_URL') }}assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
        </a>
        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
            <img src="{{ env('APP_ASSET_URL') }}assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
            <img src="{{ env('APP_ASSET_URL') }}assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
            <img src="{{ env('APP_ASSET_URL') }}assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
            <img src="{{ env('APP_ASSET_URL') }}assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
        </a>
    </div>
</div>