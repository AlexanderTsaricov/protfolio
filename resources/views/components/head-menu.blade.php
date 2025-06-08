<menu class="headMenuBox">
    <div class="headMenuBox_leftTabs">
        <button class="headMenuBox_button">alexander-vinokurov</button>
        <button
            class="headMenuBox_button @if (request()->getPathInfo() == '/') headMenuBox_button__active @endif" onclick="window.location.href='{{ url('/') }}'">_hello</button>
        <button
            class="headMenuBox_button @if (request()->segment(1) == 'about') headMenuBox_button__active @endif" onclick="window.location.href='{{ url('/about/personal-info') }}'">_about-me</button>
        <button
            class="headMenuBox_button @if (request()->segment(1) == 'projects') headMenuBox_button__active @endif" onclick="window.location.href='{{ url('/projects') }}'">_projects</button>
    </div>
    <div class="headMenuBox_contactBox">
        <button class="headMenuBox_button headMenuBox_button__last">_contact_me</button>
    </div>
</menu>
