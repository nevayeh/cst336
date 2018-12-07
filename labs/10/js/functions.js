function setActiveNav(pageName)
{
    setAllPagesInactive();
    $("#" + pageName + "PageNav").addClass("activeNav");
    $("#" + pageName + "PageNav").css("color", "white");
}


function setAllPagesInactive()
{
    $("#homePageNav").removeClass("active");
    $("#petsPageNav").removeClass("active");
    $("#aboutPageNav").removeClass("active");
}