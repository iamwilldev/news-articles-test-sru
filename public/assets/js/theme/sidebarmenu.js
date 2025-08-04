var at = document.documentElement.getAttribute("data-layout");

if (at === "vertical") {
    var currentNewURL =
        window.location !== window.parent.location
            ? document.referrer
            : document.location.href;

    var current_link = document.getElementById("get-url");
    if (currentNewURL.includes("/")) {
        current_link.setAttribute("href", "../articles");
    } else if (currentNewURL.includes("/")) {
        current_link.setAttribute("href", "./");
    } else {
        current_link.setAttribute("href", "/articles");
    }

    function findMatchingElements(selector) {
        var currentUrl = window.location.href;
        var anchors = document.querySelectorAll(selector);
        var matched = [];
        for (var i = 0; i < anchors.length; i++) {
            var anchorHref = anchors[i].href;
            if (
                currentUrl === anchorHref ||
                currentUrl.startsWith(anchorHref + "/")
            ) {
                matched.push(anchors[i]);
            }
        }
        return matched;
    }

    var matchedElements = findMatchingElements("#sidebarnav a");

    matchedElements.forEach(function (el) {
        el.classList.add("active");
        var parentUl = el.closest("ul");
        if (parentUl) {
            parentUl.classList.add("in");
            var parentLi = parentUl.closest("li");
            if (parentLi) {
                parentLi.classList.add("selected");
                var parentAnchor = parentLi.querySelector("> a");
                if (parentAnchor) {
                    parentAnchor.classList.add("active");
                }
            }
        }
    });

    document.querySelectorAll("#sidebarnav a").forEach(function (link) {
        link.addEventListener("click", function (e) {
            var isActive = this.classList.contains("active");
            var parentUl = this.closest("ul");
            if (!isActive) {
                parentUl.querySelectorAll("ul").forEach(function (submenu) {
                    submenu.classList.remove("in");
                });
                parentUl.querySelectorAll("a").forEach(function (navLink) {
                    navLink.classList.remove("active");
                });

                var submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.add("in");
                }
                this.classList.add("active");
            } else {
                this.classList.remove("active");
                parentUl.classList.remove("active");
                var submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.remove("in");
                }
            }
        });
    });
}

if (at === "horizontal") {
    function findMatchingElements(selector) {
        var currentUrl = window.location.href;
        var anchors = document.querySelectorAll(selector);
        var matched = [];
        for (var i = 0; i < anchors.length; i++) {
            var anchorHref = anchors[i].href;
            if (
                currentUrl === anchorHref ||
                currentUrl.startsWith(anchorHref + "/")
            ) {
                matched.push(anchors[i]);
            }
        }
        return matched;
    }

    var matchedElements = findMatchingElements("#sidebarnavh ul#sidebarnav a");

    matchedElements.forEach(function (el) {
        el.classList.add("active");
        var parentLi = el.closest("li");
        if (parentLi) {
            parentLi.classList.add("selected");
            var parentUl = parentLi.closest("ul");
            if (parentUl) {
                parentUl.parentElement.classList.add("selected");
            }
        }
    });
}
