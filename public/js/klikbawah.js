
    function toggleMenuu() {
        var subMenu = document.getElementById("subMenuu");
        subMenu.classList.toggle("show");
    }

    // Close the dropdown menu when clicking outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.fa-ellipsis-h')) {
            var dropdowns = document.getElementsByClassName("wrap-komen-bawah");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

