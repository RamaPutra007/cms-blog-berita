import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const open = document.getElementById('openSidebar');
    const close = document.getElementById('closeSidebar');

    if(open){
        open.addEventListener('click', function(){

            sidebar.classList.remove('-translate-y-full');
            overlay.classList.remove('hidden');

        });
    }

    if(close){
        close.addEventListener('click', function(){

            sidebar.classList.add('-translate-y-full');
            overlay.classList.add('hidden');

        });
    }

    overlay.addEventListener('click', function(){

        sidebar.classList.add('-translate-y-full');
        overlay.classList.add('hidden');

    });

});