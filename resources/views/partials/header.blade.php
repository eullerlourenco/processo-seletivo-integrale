<header class="flex align-center justify-center w-full bg-white dark:bg-gray-800 py-4 px-2 duration-300 ease-in-out">
    <nav>
        <ul class="flex gap-x-10">
            <li class="hover:text-cyan-500 dark:text-white text-xl cursor-pointer duration-500 ease-in-out
                @if(request()->routeIs('contacts.create')) text-cyan-600 dark:text-cyan-600! @endif">
                <a href="{{ route('contacts.create') }}">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </li>
            <li class="hover:text-cyan-500 dark:text-white text-xl cursor-pointer duration-500 ease-in-out
                 @if(request()->routeIs('contacts.index')) text-cyan-600 dark:text-cyan-600! @endif">
                <a href="{{ route('contacts.index') }}">
                    <i class="fa-solid fa-list-ul"></i>
                </a>
            </li>
            <li
                class="hover:text-cyan-500 dark:text-white text-xl cursor-pointer duration-500 ease-in-out">
                <a id="btnChangeTheme">
                    <i class="fa-solid fa-moon"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnChangeTheme = document.getElementById('btnChangeTheme');
        const html = document.documentElement;
        const btnChangeThemeIcon = btnChangeTheme.querySelector('i');
        let isDark = localStorage.getItem('theme');
  
        if (isDark === 'dark') {
            html.classList.add('dark');
            btnChangeThemeIcon.classList.remove('fa-moon');
            btnChangeThemeIcon.classList.add('fa-sun');
        } else {
            html.classList.remove('dark');
            btnChangeThemeIcon.classList.remove('fa-sun');
            btnChangeThemeIcon.classList.add('fa-moon');
        }
        
        btnChangeTheme.addEventListener('click', function(event) {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                event.target.classList.remove('fa-sun');
                event.target.classList.add('fa-moon');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                event.target.classList.remove('fa-moon');
                event.target.classList.add('fa-sun');
            }
        });
    });
</script>
